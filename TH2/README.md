# OnlineCourse (Minimal MVC PHP Project)

## Quick start

1. Copy project folder `onlinecourse` into your web root:
   - XAMPP: `C:\xampp\htdocs\onlinecourse`
   - Or place in your server docroot.

2. Create database and import schema:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create database `onlinecourse` (utf8mb4_unicode_ci)
   - Import `database.sql` (file provided)

   OR from terminal:
mysql -u root -p
CREATE DATABASE onlinecourse CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit
mysql -u root -p onlinecourse < path/to/database.sql
   
3. Configure DB connection:
- Edit `config/Database.php` to set your DB username/password/host.

4. Access app:
- `http://localhost/onlinecourse/` or `http://localhost/onlinecourse/index.php`

## Features included
- Simple MVC router (index.php)
- PDO-based DB connection
- User register/login (password hashed)
- Course listing & detail
- Student enrollment
- Instructor create course (basic)
- Views, layouts, sidebar, basic CSS/JS

## Notes & Next steps
- Add input validation & CSRF protection for production.
- Implement file uploads, pagination, search improvements.
- Use composer & PSR autoload in bigger projects.

