# Mega Mining & Milling Employee Grocery Store

A comprehensive web-based grocery store management system designed for employees of Mega Mining & Milling. This application enables efficient management of inventory, sales, employee credit, and payroll deductions.

## 🎯 Project Overview

This system is built to serve the Mega Mining & Milling company's employee grocery store, allowing employees to purchase items on cash or credit basis, with automatic payroll deductions for credit purchases.

**Company:** Mega Mining & Milling  
**Location:** Bedford Mine  
**Currency:** USD

## ✨ Key Features

### Authentication & Security
- Secure user login system with password hashing
- Role-based access control (5 user roles)
- Session management with timeout protection
- Activity logging and audit trails

### User Roles
1. **Administrator** - Full system access and management
2. **Manager** - Oversee operations and reports
3. **Cashier** - Process sales transactions
4. **Accounts** - Manage financial records
5. **Auditor** - View-only access for auditing

### Core Functionality
- **Product Management** - Track inventory with categories and suppliers
- **Employee Management** - Manage employee records and departments
- **Sales Processing** - Handle cash and credit sales
- **Credit Management** - Track employee credit limits and balances
- **Payroll Integration** - Automatic deduction of credit purchases
- **Reporting** - Sales, inventory, and financial reports
- **Audit Logs** - Complete activity tracking

## 🏗️ Technology Stack

- **Backend:** PHP (Plain)
- **Frontend:** HTML5, CSS3, JavaScript
- **Database:** MySQL
- **Server:** Apache (XAMPP)
- **Version Control:** Git & GitHub

## 📋 Database Schema

The system includes 11 main tables:

1. **users** - System users and authentication
2. **departments** - Company departments
3. **employees** - Employee records
4. **categories** - Product categories
5. **suppliers** - Supplier information
6. **products** - Product inventory
7. **sales** - Sales transactions
8. **sale_items** - Individual items in sales
9. **credit_transactions** - Employee credit records
10. **payroll_deductions** - Salary deductions
11. **audit_logs** - System activity logs
12. **settings** - Application configuration

## 🚀 Quick Start

### Prerequisites
- XAMPP (PHP 7.4+, MySQL 5.7+)
- Git
- Web browser

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/wytimtech-pixel/mega-grocery-store.git
   cd mega-grocery-store
   ```

2. **Place in XAMPP:**
   ```bash
   # Copy to XAMPP htdocs folder
   cp -r mega-grocery-store /path/to/xampp/htdocs/
   ```

3. **Create Database:**
   - Go to `http://localhost/phpmyadmin`
   - Import `database/schema.sql`
   - Or run: `mysql -u root -p < database/schema.sql`

4. **Configure (if needed):**
   - Edit `config/config.php` with your database credentials

5. **Access Application:**
   ```
   http://localhost/mega-grocery-store
   ```

### Default Login
- **Username:** `admin`
- **Password:** `admin123`

See [SETUP.md](SETUP.md) for detailed installation instructions.

## 📁 Project Structure

```
mega-grocery-store/
├── auth/                    # Authentication pages
│   ├── login.php           # Login page
│   └── logout.php          # Logout handler
├── config/                  # Configuration
│   ├── config.php          # Application settings
│   └── database.php        # Database connection
├── database/               # Database files
│   └── schema.sql          # Database schema & initial data
├── includes/               # PHP utilities
│   └── auth.php            # Authentication class
├── pages/                  # Application pages (to be developed)
├── public/                 # Public assets
│   ├── css/               # Stylesheets
│   │   └── style.css      # Main stylesheet
│   ├── js/                # JavaScript files
│   │   └── app.js         # Main app script
│   └── images/            # Images and media
├── uploads/               # User-uploaded files
├── index.php              # Dashboard/Home page
├── README.md              # This file
├── SETUP.md               # Setup instructions
├── .gitignore             # Git ignore rules
└── LICENSE                # License file
```

## 🔐 Security Features

- **Password Hashing:** Bcrypt algorithm with salt
- **SQL Injection Prevention:** Prepared statements and input escaping
- **Session Management:** Automatic timeout after inactivity
- **Activity Logging:** All actions logged for audit purposes
- **Role-Based Access:** Fine-grained permission control

## 📋 Current Implementation

### ✅ Completed
- User authentication system
- Database schema with all tables
- Login/logout functionality
- Session management
- Dashboard with user greeting
- Responsive UI with CSS
- Configuration management

### 🔄 In Development
- Product management module
- Employee management module
- Sales processing system
- Credit management
- Inventory tracking
- Reporting dashboard

### 📅 Planned Features
- Advanced analytics
- Mobile app version
- Email notifications
- Backup & restore utilities
- Multi-language support

## 🛠️ Development Guide

### Adding New Pages

1. Create your page in the appropriate directory
2. Include the necessary config files:
   ```php
   require_once __DIR__ . '/../config/config.php';
   require_once __DIR__ . '/../includes/auth.php';
   ```
3. Check authentication:
   ```php
   if (!$auth->isLoggedIn()) {
       header('Location: ' . APP_URL . '/auth/login.php');
       exit();
   }
   ```

### Using the Database

```php
// Query examples
$db = new Database();

// Simple query
$result = $db->query("SELECT * FROM users WHERE id = 1");
$user = $result->fetch_assoc();

// Escaped input
$username = $db->escape($_POST['username']);
$sql = "SELECT * FROM users WHERE username = '$username'";
```

### Using Authentication

```php
// Check if logged in
if ($auth->isLoggedIn()) {
    $user = $auth->getCurrentUser();
    echo "Welcome " . $user['fullname'];
}

// Check user role
if ($auth->hasRole('Administrator')) {
    // Admin-only code
}
```

## 📚 File Documentation

### Key Files

- **config/config.php** - Application settings, database credentials, security options
- **config/database.php** - Database connection and utility methods
- **includes/auth.php** - Authentication class with login, logout, and session methods
- **auth/login.php** - Login form page
- **index.php** - Dashboard page
- **public/css/style.css** - Application styling
- **public/js/app.js** - Client-side utilities

## 🐛 Troubleshooting

### Common Issues

**"Database connection failed"**
- Ensure MySQL is running in XAMPP
- Check credentials in `config/config.php`
- Verify database `mega_grocery` exists

**"Page not found"**
- Check XAMPP is running
- Verify correct URL: `http://localhost/mega-grocery-store`
- Clear browser cache

**"Login not working"**
- Check database was imported correctly
- Verify admin user in users table
- Try credentials: admin / admin123

See [SETUP.md](SETUP.md) for more troubleshooting.

## 📞 Support & Contribution

This is a private project for Mega Mining & Milling.

For issues, questions, or feature requests:
1. Check existing documentation
2. Review code comments
3. Contact the development team

## 📄 License

This project is proprietary and intended for Mega Mining & Milling employees only.

## 👥 Team

**Developer:** wytimtech-pixel  
**Repository:** https://github.com/wytimtech-pixel/mega-grocery-store

---

**Last Updated:** July 1, 2026  
**Version:** 1.0.0 (Beta)
