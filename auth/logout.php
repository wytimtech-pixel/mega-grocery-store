<?php
/**
 * Logout Handler
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/auth.php';

$result = $auth->logout();
header('Location: ' . APP_URL . '/auth/login.php');
exit();
