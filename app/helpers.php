<?php

function formatBytes($size, $precision = 2): string
{
    if (!$size) return 0;
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');
    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function formatNumberInKNotation(int | null $number): string
{
    if (!$number) return 0;
    $suffixByNumber = function () use ($number) {
        if ($number < 1000) {
            return sprintf('%d', $number);
        }
        if ($number < 1000000) {
            return sprintf('%d%s', floor($number / 1000), 'K+');
        }
        if ($number >= 1000000 && $number < 1000000000) {
            return sprintf('%d%s', floor($number / 1000000), 'M+');
        }
        if ($number >= 1000000000 && $number < 1000000000000) {
            return sprintf('%d%s', floor($number / 1000000000), 'B+');
        }
        return sprintf('%d%s', floor($number / 1000000000000), 'T+');
    };
    return $suffixByNumber();
}
