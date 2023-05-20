<?php

namespace Polygontech\CommonHelpers\HTTP;

class URL
{
    /**
     * @param string $scheme
     * @param string $host
     * @param ?int $port
     * @param ?string $path
     * @param ?array<string, string> $queries
     */
    public function __construct(
        private readonly string $scheme,
        private readonly string $host,
        private readonly ?int $port = null,
        private readonly ?string $path = null,
        private readonly array $queries = [],
    ) {
    }

    /**
     * Returns new url without modifying original.
     *
     * @param string $path
     * @return URL
     */
    public function mutatePath(string $path): URL
    {
        return new URL(
            scheme: $this->scheme,
            host: $this->host,
            port: $this->port,
            path: $path,
            queries: $this->queries
        );
    }

    /**
     * Returns new url without modifying original.
     *
     * @param string $path
     * @return URL
     */
    public function addPath(string $path): URL
    {
	return $this->mutatePath($this->getPath() . '/' . trim($path, '/'));
    }

    /**
     * Returns new url without modifying original.
     *
     * @param string $name
     * @param string $value
     * @return URL
     */
    public function mutateQuery(string $name, string $value): URL
    {
        return new URL(
            scheme: $this->scheme,
            host: $this->host,
            port: $this->port,
            path: $this->path,
            queries: array_merge($this->queries, [$name => $value])
        );
    }

    public function getFQDN(): string
    {
        return $this->host . (is_null($this->port) ? "" : ":{$this->port}");
    }

    public function getPath(): string
    {
        return is_null($this->path) ? "" : trim($this->path, "/");
    }

    public function getQuery(string $queryKey): ?string
    {
        return $this->queries[$queryKey] ?? null;
    }

    public function getQueryString(): string
    {
        return (empty($this->queries)) ? "" : ("?" . http_build_query($this->queries, '', '&'));
    }

    public function getWithoutHost(): string
    {
        return $this->getPath() . $this->getQueryString();
    }

    public function getWithoutScheme(): string
    {
        $base = $this->getFQDN();
        if (!is_null($this->path)) $base .= "/";
        return $base . $this->getWithoutHost();
    }

    public function getFull(): string
    {
        return $this->scheme . "://" . $this->getWithoutScheme();
    }

    public function __toString()
    {
        return $this->getFull();
    }

    public static function parse(string $string): URL
    {
        $string = filter_var($string, FILTER_SANITIZE_URL);

        if (!filter_var($string, FILTER_VALIDATE_URL)) throw new InvalidURL();

        $url = parse_url($string);

        if (!array_key_exists("host", $url)) throw new InvalidURL("Host undefined.");

        $queries = [];
        if (array_key_exists("query", $url)) {
            parse_str($url['query'], $queries);
        }

        return new URL(
            scheme: $url['scheme'] ?? "http",
            host: $url['host'],
            port: $url['port'] ?? null,
            path: trim($url['path'] ?? ""),
            queries: $queries
        );
    }
}
