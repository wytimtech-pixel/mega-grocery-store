<?php
/**
 * Main Dashboard
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/auth.php';

// Check if user is logged in
if (!$auth->isLoggedIn()) {
    header('Location: ' . APP_URL . '/auth/login.php');
    exit();
}

// Check session timeout
if (!$auth->checkSessionTimeout()) {
    header('Location: ' . APP_URL . '/auth/login.php?timeout=1');
    exit();
}

$user = $auth->getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/public/css/style.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="brand"><?php echo APP_NAME; ?></div>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="#">Employees</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="javascript:logout()">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="dashboard">
        <div class="dashboard-header">
            <h1>Welcome, <?php echo htmlspecialchars($user['fullname']); ?>!</h1>
            <div class="user-info">
                <p>Role: <strong><?php echo htmlspecialchars($user['role']); ?></strong> | Username: <strong><?php echo htmlspecialchars($user['username']); ?></strong></p>
            </div>
        </div>

        <div class="cards-container">
            <div class="card">
                <h3>Products</h3>
                <p>Manage your product inventory and stock levels.</p>
            </div>
            <div class="card">
                <h3>Sales</h3>
                <p>Process cash and credit sales transactions.</p>
            </div>
            <div class="card">
                <h3>Employees</h3>
                <p>Manage employee records and information.</p>
            </div>
            <div class="card">
                <h3>Reports</h3>
                <p>View sales, inventory, and financial reports.</p>
            </div>
        </div>
    </div>

    <script src="<?php echo APP_URL; ?>/public/js/app.js"></script>
</body>
</html>
