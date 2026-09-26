# Al Ikthibar Repair
A modern and responsive automotive repair and service management website built for **Al Ikthibar Repair**, an automotive workshop in Abu Dhabi, UAE.
The website provides customers with information about automotive services, workshop locations, appointment booking, customer testimonials, and direct WhatsApp communication.

## Features

* 🏠 Modern and responsive homepage
* 🔧 Automotive repair and maintenance services
* 📅 Online appointment booking
* 📱 WhatsApp integration
* 📍 Workshop/location information
* 💬 Customer testimonials
* 📩 Contact and quotation form
* 🖥️ Admin management system
* 📊 Booking management
* 🛠️ Service management
* 🖼️ Hero slider and service images
* 📱 Mobile-friendly responsive design

## Technologies Used

* **PHP**
* **MySQL**
* **HTML5**
* **CSS3**
* **Bootstrap 5**
* **JavaScript**
* **PDO**
* **XAMPP**
* **Git & GitHub**

## Project Structure

```text
al-ikthibar-website/
│
├── admin/
│   ├── bookings.php
│   ├── services.php
│   └── ...
│
├── assets/
│   ├── style.css
│   └── app.js
│
├── config/
│   └── db.php
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── functions.php
│
├── uploads/
│   └── services/
│
├── index.php
├── services.php
├── book.php
├── contact.php
├── schema.sql
└── README.md
```

## Main Pages

### Home

Displays the workshop introduction, services, statistics, testimonials, and booking call-to-action.

### Services

Shows the available automotive repair and maintenance services.

### Book Appointment

Allows customers to submit their vehicle information, select a service, choose a workshop, and request an appointment.

### Contact

Provides workshop information, WhatsApp communication, and a quotation/contact form.

### Admin Panel

Provides management functionality for services and customer bookings.

## Database

The project uses **MySQL** for storing:

* Users
* Workshops
* Services
* Service categories
* Bookings
* Hero slides
* Statistics
* Testimonials
* Contact messages

The database structure and sample data are provided in:

```text
schema.sql
```

## Local Installation

### 1. Install XAMPP

Install XAMPP with:

* Apache
* MySQL
* PHP

### 2. Clone the Repository

```bash
git clone https://github.com/niloybasak1133/al-ikthibar-website.git
```

### 3. Move the Project

Place the project inside:

```text
C:\xampp\htdocs\
```

### 4. Create the Database

Open:

```text
http://localhost/phpmyadmin
```

Create/import the database using:

```text
schema.sql
```

The default database name is:

```text
ikthibar
```

### 5. Configure Database Connection

Update the database configuration in:

```text
config/db.php
```

Example:

```php
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'ikthibar');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 6. Run the Website

Start **Apache** and **MySQL** from XAMPP.

Then open:

```text
http://localhost/al-ikthibar-website/
```

## Git Workflow

To update the project after making changes:

```bash
git add .
git commit -m "Update website"
git push
```

## Future Improvements

* Customer login and registration
* Advanced admin dashboard
* Email notifications
* Online payment integration
* Appointment availability management
* Service search and filtering
* Better analytics and reporting
* Image optimization
* Production security improvements

## Author

**Niloy Basak**

GitHub:
https://github.com/niloybasak1133

## License

This project is developed for the **Al Ikthibar Repair** website and is intended for educational, internship, and project demonstration purposes.
