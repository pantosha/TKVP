<?php

    function generate_fibonacci($count) {
        if (!is_int($count) || $count < 0)
            return null;
        $result = array();
        for ($i = 0; $i < $count; $i++) {
            if ($i < 2)
                $result[] = $i;
            else
                $result[] = $result[$i - 2] + $result[$i - 1];
        }
        return $result;
    }

    function generate_progression($count, $first, $denominator) {
        if (!is_int($count) || $count < 0 || !is_numeric($first) || !is_numeric($denominator))
            return null;
        $result = array();
        for ($i = 0; $i < $count; $i++) {
            if ($i == 0)
                $result[] = $first;
            else
                $result[] = $result[$i - 1] * $denominator;
        }
        return $result;
    }

    function to_html($array) {
        if (!is_array($array))
            return $array;
        $result = '<ul>';
        foreach ($array as $key => $value) {
            $result .= "<li>$key - " . to_html($value) . '</li>';
        }
        return $result . '</ul>';
    }

    function to_string($array) {
        if (!is_array($array))
            return $array;
        $result = '{ ';
        foreach ($array as $key => $value) {
            $result .= "<$key - " . to_string($value) . '>';
        }
        return $result . ' }';
    }