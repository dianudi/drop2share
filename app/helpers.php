<?php
function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function formatNumberInKNotation(int $number): string
{
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
