<?php

function simplifyDate(DateTime $date): string
{
    $dateTime = new DateTime(); 

    $paramDate = $date->format('o-m-d');
    $currentDateTime = $dateTime->format('o-m-d');
    if ($paramDate !== $currentDateTime) {
        return $paramDate;
    } else {
        return $date->format('h:i A');
    }
}

function formatDateTime(DateTime $dateTime): string {
    return $dateTime->format('o-m-d H:i:s');
}

function formatNumber(int|float $number): string
{
    $stringNumber = (string) $number;
    if (strlen($stringNumber) < 4) {
        return $stringNumber;
    }

    // Search whether the param is float
    $decimalIndex = strpos($stringNumber, '.');
    $decimal = null;
    if (is_int($decimalIndex)) {
        // Extract the decimal part
        $decimal =  round($number - floor($number), 2); 
        // Remove the decimal part
        $stringNumber = substr($stringNumber, 0, $decimalIndex);
    }

    // Apply comma on string number
    $formatted = '';
    for ($i = strlen($stringNumber); $i > 0; ) {
        for ($j = 0; $j < 3; ++$j) {
            if ($i > 0) {
                $formatted = "{$stringNumber[--$i]}$formatted";
            }
        }

        // Check if there is / are more number upfront to apply comma
        // Second condition is to check if there is a negative sign
        if ($i > 0 && (is_numeric($stringNumber[$i - 1]))) {
            $formatted = ",$formatted";
        }
    }

    if ($decimal) {
        // Offset to 1 to remove the leading zero of the decimal part
        $formatted .= substr((string) $decimal, 1, 3);
    }
    return $formatted;
}
