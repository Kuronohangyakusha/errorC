<?php
namespace Vendor\Challenge3\core;

class Validator {
    private static array $errors = [];

    public static function getErrors(): array {
        return self::$errors;
    }

    public static function addError(string $key, string $message=''): void {
        self::$errors[$key] = $message;
    }

    public static function isEmail(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isEmpty(string $value, string $key, string $message): bool {
        if (empty($value)) {
            self::addError($key, $message);
            return true;
        }
        return false;
    }

    public static function isValid(): bool {
        return  empty(self::$errors);
        
        
    }
}
