-- =====================================================
-- MEGA MINING & MILLING EMPLOYEE GROCERY STORE
-- Database: mega_grocery
-- =====================================================

CREATE DATABASE IF NOT EXISTS mega_grocery;
USE mega_grocery;

-- ===========================
-- USERS
-- ===========================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Administrator','Manager','Cashier','Accounts','Auditor') NOT NULL,
    status ENUM('Active','Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- DEPARTMENTS
-- ===========================
CREATE TABLE IF NOT EXISTS departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL
);

INSERT INTO departments (department_name) VALUES
('Mining'),
('Milling'),
('Processing'),
('Security'),
('Transport'),
('Administration');

-- ===========================
-- EMPLOYEES
-- ===========================
CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_no VARCHAR(20) UNIQUE NOT NULL,
    fullname VARCHAR(150) NOT NULL,
    department_id INT,
    position VARCHAR(100),
    phone VARCHAR(30),
    salary DECIMAL(10,2) DEFAULT 0,
    credit_limit DECIMAL(10,2) DEFAULT 0,
    current_balance DECIMAL(10,2) DEFAULT 0,
    photo VARCHAR(255),
    status ENUM('Active','Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);

-- ===========================
-- CATEGORIES
-- ===========================
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

INSERT INTO categories(category_name) VALUES
('Groceries'),
('Drinks'),
('Cleaning'),
('Toiletries'),
('Snacks'),
('Stationery');

-- ===========================
-- SUPPLIERS
-- ===========================
CREATE TABLE IF NOT EXISTS suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(150),
    phone VARCHAR(30),
    email VARCHAR(100),
    address TEXT
);

-- ===========================
-- PRODUCTS
-- ===========================
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    barcode VARCHAR(100) UNIQUE,
    product_name VARCHAR(150) NOT NULL,
    category_id INT,
    supplier_id INT,
    buying_price DECIMAL(10,2),
    selling_price DECIMAL(10,2),
    quantity INT DEFAULT 0,
    reorder_level INT DEFAULT 5,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

-- ===========================
-- SALES
-- ===========================
CREATE TABLE IF NOT EXISTS sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(30) UNIQUE,
    employee_id INT NULL,
    sale_type ENUM('Cash','Credit'),
    total DECIMAL(10,2),
    user_id INT,
    sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(employee_id) REFERENCES employees(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

-- ===========================
-- SALE ITEMS
-- ===========================
CREATE TABLE IF NOT EXISTS sale_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10,2),
    total DECIMAL(10,2),
    FOREIGN KEY(sale_id) REFERENCES sales(id) ON DELETE CASCADE,
    FOREIGN KEY(product_id) REFERENCES products(id)
);

-- ===========================
-- CREDIT TRANSACTIONS
-- ===========================
CREATE TABLE IF NOT EXISTS credit_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    sale_id INT,
    amount DECIMAL(10,2),
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(employee_id) REFERENCES employees(id),
    FOREIGN KEY(sale_id) REFERENCES sales(id)
);

-- ===========================
-- PAYROLL DEDUCTIONS
-- ===========================
CREATE TABLE IF NOT EXISTS payroll_deductions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    amount DECIMAL(10,2),
    deduction_month VARCHAR(20),
    deduction_year INT,
    status ENUM('Pending','Paid') DEFAULT 'Pending',
    FOREIGN KEY(employee_id) REFERENCES employees(id)
);

-- ===========================
-- AUDIT LOGS
-- ===========================
CREATE TABLE IF NOT EXISTS audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    activity TEXT,
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- SETTINGS
-- ===========================
CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(150),
    address TEXT,
    phone VARCHAR(30),
    email VARCHAR(100),
    currency VARCHAR(10)
);

INSERT INTO settings
(company_name,address,phone,email,currency)
VALUES
(
'Mega Mining & Milling Employee Store',
'Bedford Mine',
'',
'',
'USD'
);

-- ===========================
-- DEFAULT ADMIN
-- Username: admin
-- Password: admin123 (bcrypt hashed)
-- ===========================

INSERT INTO users(fullname,username,password,role)
VALUES
(
'System Administrator',
'admin',
'$2y$10$OW.qvanJnmHnZA7hVGPyKuqOenVYjFI.JCLdvHrWlpKqRgqlGxotW',
'Administrator'
);
