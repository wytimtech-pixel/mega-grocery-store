<?php
/**
 * Application Configuration File
 * Database and general settings
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mega_grocery');

// Application Configuration
define('APP_NAME', 'Mega Grocery Store');
define('APP_URL', 'http://localhost/mega-grocery-store');
define('APP_TIMEZONE', 'UTC');

// Session Configuration
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds

// File Upload Configuration
define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 5242880); // 5MB in bytes
define('ALLOWED_EXTENSIONS', array('jpg', 'jpeg', 'png', 'gif'));

// Security
define('PASSWORD_HASH_ALGO', PASSWORD_BCRYPT);
define('PASSWORD_HASH_OPTIONS', array('cost' => 10));

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set timezone
date_default_timezone_set(APP_TIMEZONE);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
