<?php
namespace Vendor\Challenge3\core;

class SessionManager {
    
    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function set(string $key, $value): void {
        self::start();
        $_SESSION[$key] = $value;
    }
    
    public static function get(string $key, $default = null) {
        self::start();
        return $_SESSION[$key] ?? $default;
    }
    
    public static function has(string $key): bool {
        self::start();
        return isset($_SESSION[$key]);
    }
    
    public static function remove(string $key): void {
        self::start();
        unset($_SESSION[$key]);
    }
    
    public static function destroy(): void {
        self::start();
        session_destroy();
    }
    
    public static function isLoggedIn(): bool {
        return self::has('user_id') && self::has('user_login');
    }
    
    public static function requireAuth(): void {
        if (!self::isLoggedIn()) {
            header('Location: /');
            exit;
        }
    }
    
    public static function getCurrentUser(): ?array {
        if (self::isLoggedIn()) {
            return [
                'id' => self::get('user_id'),
                'login' => self::get('user_login'),
                'nom' => self::get('user_nom'),
                'matricule' => self::get('user_matricule')
            ];
        }
        return null;
    }
}