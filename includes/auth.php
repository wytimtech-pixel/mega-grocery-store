<?php
/**
 * Authentication Handler
 * Manages user login, logout, and session
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

class Auth {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Login user
     */
    public function login($username, $password) {
        $username = $this->db->escape($username);
        $sql = "SELECT * FROM users WHERE username = '$username' AND status = 'Active' LIMIT 1";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['login_time'] = time();

                // Log activity
                $this->logActivity($user['username'], 'User login');

                return array('success' => true, 'message' => 'Login successful');
            } else {
                return array('success' => false, 'message' => 'Invalid password');
            }
        } else {
            return array('success' => false, 'message' => 'User not found or inactive');
        }
    }

    /**
     * Logout user
     */
    public function logout() {
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Unknown';
        $this->logActivity($username, 'User logout');

        session_destroy();
        return array('success' => true, 'message' => 'Logout successful');
    }

    /**
     * Check if user is logged in
     */
    public function isLoggedIn() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }

    /**
     * Get current user
     */
    public function getCurrentUser() {
        if ($this->isLoggedIn()) {
            return array(
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'],
                'fullname' => $_SESSION['fullname'],
                'role' => $_SESSION['role']
            );
        }
        return null;
    }

    /**
     * Check session timeout
     */
    public function checkSessionTimeout() {
        if ($this->isLoggedIn()) {
            if (time() - $_SESSION['login_time'] > SESSION_TIMEOUT) {
                $this->logout();
                return false;
            }
            $_SESSION['login_time'] = time();
            return true;
        }
        return false;
    }

    /**
     * Register new user
     */
    public function register($fullname, $username, $password, $role = 'Cashier') {
        // Validate input
        if (empty($fullname) || empty($username) || empty($password)) {
            return array('success' => false, 'message' => 'All fields are required');
        }

        // Check if username exists
        $username = $this->db->escape($username);
        $check_sql = "SELECT id FROM users WHERE username = '$username'";
        $result = $this->db->query($check_sql);

        if ($result->num_rows > 0) {
            return array('success' => false, 'message' => 'Username already exists');
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_HASH_ALGO, PASSWORD_HASH_OPTIONS);

        // Insert new user
        $fullname = $this->db->escape($fullname);
        $hashed_password = $this->db->escape($hashed_password);
        $role = $this->db->escape($role);

        $sql = "INSERT INTO users (fullname, username, password, role) 
                VALUES ('$fullname', '$username', '$hashed_password', '$role')";

        if ($this->db->query($sql)) {
            $this->logActivity($username, 'New user registered');
            return array('success' => true, 'message' => 'User registered successfully');
        } else {
            return array('success' => false, 'message' => 'Registration failed');
        }
    }

    /**
     * Log activity
     */
    private function logActivity($username, $activity) {
        $username = $this->db->escape($username);
        $activity = $this->db->escape($activity);
        $sql = "INSERT INTO audit_logs (username, activity) VALUES ('$username', '$activity')";
        $this->db->query($sql);
    }

    /**
     * Verify user role
     */
    public function hasRole($required_role) {
        if (!$this->isLoggedIn()) {
            return false;
        }

        $user_role = $_SESSION['role'];

        // Admin can access everything
        if ($user_role === 'Administrator') {
            return true;
        }

        return $user_role === $required_role;
    }
}

// Create auth instance
$auth = new Auth();
