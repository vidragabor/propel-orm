<?php

namespace source\util;

use Exception;

class Input
{
    static $errors = true;

    static function check(array $arr, $on = false)
    {
        if ($on === false) {
            $on = $_REQUEST;
        }
        foreach ($arr as $value) {
            if (empty($on[$value])) {
                self::throwError('Data is missing', 900);
            }
        }
    }

    static function int(string $val): int
    {
        $val = filter_var($val, FILTER_VALIDATE_INT);
        if ($val === false) {
            self::throwError('Invalid Integer', 901);
        }
        return $val;
    }

    static function str(string $val): string
    {
        if (!is_string($val)) {
            self::throwError('Invalid String', 902);
        }
        $val = trim(htmlspecialchars($val));
        return $val;
    }

    static function bool(string $val): bool
    {
        $val = filter_var($val, FILTER_VALIDATE_BOOLEAN);
        return $val;
    }

    static function email(string $val): string
    {
        $val = filter_var($val, FILTER_VALIDATE_EMAIL);
        if ($val === false) {
            self::throwError('Invalid Email', 903);
        }
        return $val;
    }

    static function url(string $val): string
    {
        $val = filter_var($val, FILTER_VALIDATE_URL);
        if ($val === false) {
            self::throwError('Invalid URL', 904);
        }
        return $val;
    }

    static function throwError(string $error = 'Error In Processing', int $errorCode = 0)
    {
        if (self::$errors === true) {
            throw new Exception($error, $errorCode);
        }
    }
}