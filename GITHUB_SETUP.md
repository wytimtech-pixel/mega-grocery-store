# Running Mega Grocery Store from GitHub

This guide explains how to run the application directly from your GitHub repository using XAMPP.

## Method 1: Clone from GitHub (Recommended)

### Prerequisites
- Git installed on your computer
- XAMPP installed and running

### Steps

1. **Open Command Prompt/Terminal**

2. **Navigate to XAMPP htdocs:**
   ```bash
   # Windows
   cd C:\xampp\htdocs
   
   # macOS
   cd /Applications/XAMPP/htdocs
   
   # Linux
   cd /opt/lampp/htdocs
   ```

3. **Clone the Repository:**
   ```bash
   git clone https://github.com/wytimtech-pixel/mega-grocery-store.git
   cd mega-grocery-store
   ```

4. **Create Required Folders:**
   ```bash
   mkdir uploads
   mkdir sessions
   mkdir cache
   mkdir logs
   ```

5. **Start XAMPP Services**
   - Open XAMPP Control Panel
   - Click "Start" for Apache
   - Click "Start" for MySQL

6. **Import Database Schema**
   - Open browser: `http://localhost/phpmyadmin`
   - Click "SQL" tab
   - Open file: `database/schema.sql`
   - Copy and paste the SQL code
   - Click "Go"

7. **Access the Application**
   ```
   http://localhost/mega-grocery-store/
   ```

8. **Login with Default Credentials**
   - Username: `admin`
   - Password: `admin123`

## Method 2: Download ZIP from GitHub

1. Go to: https://github.com/wytimtech-pixel/mega-grocery-store
2. Click "Code" → "Download ZIP"
3. Extract to `C:\xampp\htdocs\mega-grocery-store`
4. Follow steps 4-8 from Method 1

## Method 3: GitHub Desktop (GUI)

1. **Install GitHub Desktop** (if not already installed)
   - Download from: https://desktop.github.com/

2. **Clone Repository:**
   - Open GitHub Desktop
   - Click "File" → "Clone repository"
   - Enter: `wytimtech-pixel/mega-grocery-store`
   - Choose local path: `C:\xampp\htdocs\mega-grocery-store`
   - Click "Clone"

3. **Continue with steps 4-8 from Method 1**

## Keeping Your Local Copy Updated

### Using Git Command Line

```bash
cd C:\xampp\htdocs\mega-grocery-store

# Fetch latest changes
git fetch origin

# Update your local copy
git pull origin main
```

### Using GitHub Desktop

1. Open GitHub Desktop
2. Click on "mega-grocery-store" repository
3. Click "Fetch origin" (or "Pull origin")

## File Structure After Cloning

```
C:\xampp\htdocs\mega-grocery-store\
├── auth/
├── config/
├── database/
├── includes/
├── pages/
├── public/
├── uploads/           (created in step 4)
├── sessions/          (created in step 4)
├── cache/             (created in step 4)
├── logs/              (created in step 4)
├── index.php
├── README.md
├── SETUP.md
├── .gitignore
└── ...other files
```

## Configuration Adjustment (if needed)

If database connection fails, edit `config/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');           // Leave blank if no password
define('DB_NAME', 'mega_grocery');
```

## Troubleshooting GitHub Setup

### Issue: "Permission denied" when cloning

**Solution:**
1. Make sure Git is installed
2. Check internet connection
3. Try using HTTPS (it's used by default)

### Issue: "Apache showing 404 error"

**Solution:**
1. Verify file path is correct:
   ```bash
   dir C:\xampp\htdocs\mega-grocery-store
   ```
2. Check URL has trailing slash: `http://localhost/mega-grocery-store/`
3. Clear browser cache (Ctrl+F5)

### Issue: "Database connection failed"

**Solution:**
1. Verify MySQL is running in XAMPP
2. Check database was imported from schema.sql
3. Verify credentials in config/config.php

### Issue: "Page shows but no styling/styling broken"

**Solution:**
1. Clear browser cache
2. Check if files were extracted completely
3. Verify public/css/style.css exists

## Making Changes and Pushing Back

If you want to contribute changes back:

```bash
# Check status
git status

# Add changes
git add .

# Commit changes
git commit -m "Description of changes"

# Push to GitHub
git push origin main
```

## Useful Git Commands

```bash
# Check current branch
git branch

# See commit history
git log --oneline

# Check for uncommitted changes
git status

# Discard local changes
git checkout .

# Sync with latest from GitHub
git pull origin main
```

## Quick Start Summary

```bash
# 1. Navigate to XAMPP
cd C:\xampp\htdocs

# 2. Clone repository
git clone https://github.com/wytimtech-pixel/mega-grocery-store.git
cd mega-grocery-store

# 3. Create folders
mkdir uploads sessions cache logs

# 4. Start XAMPP services (Apache & MySQL)

# 5. Import database at http://localhost/phpmyadmin

# 6. Access application at http://localhost/mega-grocery-store/
```

## Getting Help

- Check [README.md](README.md) for project overview
- Check [SETUP.md](SETUP.md) for detailed setup
- Review code comments in PHP files
- Check XAMPP error logs if issues occur

Happy coding! 🚀
