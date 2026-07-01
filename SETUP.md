# Setup Instructions for Mega Grocery Store

Follow these steps to set up the Mega Mining & Milling Employee Grocery Store on your XAMPP installation.

## Prerequisites

- XAMPP installed (Apache, MySQL, PHP 7.4+)
- Git installed
- Basic knowledge of command line

## Step-by-Step Installation

### 1. Clone the Repository

Open your terminal/command prompt and run:

```bash
cd C:\xampp\htdocs  # Windows
# or
cd /Applications/XAMPP/htdocs  # macOS
# or
cd /opt/lampp/htdocs  # Linux

git clone https://github.com/wytimtech-pixel/mega-grocery-store.git
cd mega-grocery-store
```

### 2. Start XAMPP Services

- **Windows:** Open XAMPP Control Panel and click "Start" for Apache and MySQL
- **macOS/Linux:** Run the XAMPP startup script

### 3. Create Database

1. Open your browser and go to: `http://localhost/phpmyadmin`
2. Click on "SQL" tab
3. Open the file `database/schema.sql` in a text editor
4. Copy all the SQL code
5. Paste it into the SQL tab in phpMyAdmin
6. Click "Go" to execute

**Alternative method:**
1. Open terminal/command prompt
2. Navigate to the project folder
3. Run:
```bash
mysql -u root -p < database/schema.sql
```
4. When prompted for password, leave it blank (just press Enter) if you haven't set one

### 4. Configure Database Connection

1. Open `config/config.php` in a text editor
2. Update the database credentials if needed:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Leave blank if no password
define('DB_NAME', 'mega_grocery');
```

### 5. Access the Application

1. Open your browser
2. Navigate to: `http://localhost/mega-grocery-store`
3. You should see the login page

### 6. Login with Default Credentials

- **Username:** `admin`
- **Password:** `admin123`
- **Role:** Administrator

## Folder Structure

```
mega-grocery-store/
├── auth/                    # Authentication pages (login, logout)
├── config/                  # Configuration files
│   ├── config.php          # App configuration
│   └── database.php        # Database connection
├── database/               # Database files
│   └── schema.sql          # Database schema
├── includes/               # PHP includes
│   └── auth.php            # Authentication class
├── pages/                  # Application pages (to be added)
├── public/                 # Public assets
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── images/            # Images
├── uploads/               # File uploads folder
├── index.php              # Dashboard/Home page
└── README.md              # Project documentation
```

## Troubleshooting

### Issue: "Connection refused" or "Database error"

**Solution:**
1. Make sure MySQL service is running in XAMPP
2. Check that database credentials in `config/config.php` are correct
3. Verify the database `mega_grocery` was created successfully

### Issue: "Page not found" or blank page

**Solution:**
1. Check that you're accessing the correct URL: `http://localhost/mega-grocery-store`
2. Make sure Apache is running in XAMPP
3. Check browser console for JavaScript errors (F12)

### Issue: Login not working

**Solution:**
1. Verify the database was imported correctly
2. Check that the default admin user was created (check in phpmyadmin > users table)
3. Clear browser cache and try again

### Issue: "uploads" folder permission denied

**Solution:**
1. Create an `uploads` folder in the project root if it doesn't exist
2. Right-click the folder → Properties → Security → Edit → allow full permissions

## Features Implemented

✅ User Authentication (Login/Logout)
✅ Role-Based Access Control
✅ Session Management
✅ Database Connection
✅ Dashboard with user greeting
✅ Responsive design

## Next Steps

The following features are ready to be developed:

- [ ] Product Management (CRUD)
- [ ] Employee Management (CRUD)
- [ ] Sales Processing
- [ ] Credit Management
- [ ] Inventory Tracking
- [ ] Reporting and Analytics
- [ ] User Management
- [ ] Department Management

## Support

For issues or questions:
1. Check the troubleshooting section above
2. Review the code comments in the files
3. Check XAMPP Apache and MySQL error logs

## Development Tips

1. Always validate user input before processing
2. Use the Database class methods for all queries
3. Check user authentication before accessing protected pages
4. Use the Auth class methods for user-related operations
5. Test thoroughly in your local environment before deploying

Good luck with your development!
