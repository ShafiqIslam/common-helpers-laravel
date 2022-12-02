<?php

namespace Polygontech\CommonHelpers\Date;

use Carbon\Carbon;

class TimeRange
{
    public function __construct(private readonly Carbon $start, private readonly Carbon $end)
    {
    }

    public function getStart(): Carbon
    {
        return $this->start;
    }

    public function getEnd(): Carbon
    {
        return $this->end;
    }

    /**
     * @return array <int, Carbon>
     */
    public function toArray(): array
    {
        return [$this->start, $this->end];
    }

    /**
     * @return array <string>
     */
    public function toStringArray($format = "Y-m-d", $associative = false): array
    {
        return [
            ($associative ? "start" : 0) => $this->start->format($format),
            ($associative ? "end" : 1) => $this->end->format($format)
        ];
    }

    /**
     * @return array <string, string>
     */
    public function toAssocStringArray($format = "Y-m-d"): array
    {
        return $this->toStringArray($format, true);
    }

    /**
     * @return string
     */
    public function implode($format = "Y-m-d", $glue = " - "): string
    {
        $array = $this->toStringArray($format);
        return $array[0] . $glue . $array[1];
    }

    /**
     * @param string $start
     * @param string $end
     * @return TimeRange
     */
    public static function fromStrings(string $start, string $end): TimeRange
    {
        return new TimeRange(Carbon::parse($start), Carbon::parse($end));
    }

    /**
     * @param array<string, string> | array<int, string> $dates
     * @return TimeRange
     */
    public static function fromStringArray(array $dates): TimeRange
    {
        if (array_key_exists('start', $dates)) {
            return TimeRange::fromStrings($dates['start'], $dates['end']);
        }

        return TimeRange::fromStrings($dates[0], $dates[1]);
    }
}
