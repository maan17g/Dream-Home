# Dream Home Real Estate 🏠

A full-stack real estate web application built with Laravel, designed to provide property browsing, property management, appointments, user authentication, and role-based dashboards for **Buyers, Agents, and Administrators**.

## 🚀 Features

### 🔐 Authentication & Authorization

* User registration and login
* OTP verification during registration
* Role-based access control
* Middleware-protected dashboards
* CSRF protection

### 👤 Buyer / User

* Browse available properties
* View detailed property information
* Save / favorite properties
* Prevent duplicate saved properties
* Request property appointments
* Manage appointment requests and statuses
* Submit inquiries to administrators

### 🏢 Agent Dashboard

* Manage agent profile
* Add properties
* Edit properties
* Delete properties
* Manage own property listings
* Upload property images
* Select property amenities
* Assign property city/location
* Manage property status
* Manage appointment requests

### 🛠️ Admin Dashboard

* Manage users
* Manage agents and buyers
* Manage properties
* Approve properties
* Manage cities / locations
* Manage amenities
* Manage featured properties
* Manage featured agents
* Manage featured reviews
* Manage user inquiries
* Manage appointments

### 🏡 Property Management

* Property creation and editing
* Property deletion
* Property details
* Multiple property images
* Property status
* Property approval workflow
* Agent-property relationship
* City/location relationship
* Property amenities

---

## 🧰 Tech Stack

* **Laravel 12.x**
* **PHP**
* **MySQL**
* **HTML5**
* **CSS3**
* **JavaScript**
* **Bootstrap**
* **jQuery**

---

## ⚙️ Local Installation

### 1. Install XAMPP

Install XAMPP and make sure Apache and MySQL are available.

### 2. Clone the Repository

```bash
git clone <your-repository-url>
cd dream-home
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Configure Environment

Create your `.env` file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 5. Configure MySQL

Create a MySQL database and update the following values in `.env`:

```env
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

Use the appropriate credentials for your local MySQL installation.

---

## 📧 Local OTP Email Testing with Mailpit

Dream Home uses OTP verification during user registration.

For local development, **Mailpit** can capture emails without sending real emails.

Download Mailpit from:

[Mailpit Official Website](https://mailpit.axllent.org/)

After installing Mailpit, run it according to its official documentation.

Then configure the mail settings in `.env` to use the local Mailpit SMTP server.

Typical local configuration:

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Mailpit's web interface is typically available at:

```text
http://localhost:8025
```

---

## 🗄️ Database Setup

Run the migrations:

```bash
php artisan migrate
```

Populate the application with demo data:

```bash
php artisan db:seed
```

The seeder creates sample application data such as properties and related real-estate information. Internet access may be required if external images are downloaded during seeding.

---

## 🖼️ Storage Setup

Create Laravel's public storage link:

```bash
php artisan storage:link
```

This allows uploaded property images stored in Laravel's public storage to be accessed by the application.

**Do not manually delete the `storage` directory or storage link.**

---

## ▶️ Run the Application

Start the Laravel development server:

```bash
php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

---

## 📋 Complete Setup Commands

After configuring `.env`, the main setup flow is:

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
```

For OTP testing, Mailpit should also be running.

---

## 📸 Screenshots

The project includes screenshots demonstrating the main parts of the application:

* Homepage
* Property listings
* Property details
* User dashboard
* Agent dashboard
* Admin dashboard
* Property management
* Appointment management

Screenshots focus on the major workflows rather than documenting every individual page.

---

## 🏗️ Project Architecture

Dream Home follows Laravel's MVC architecture:

```text
Routes
   ↓
Controllers
   ↓
Models
   ↓
MySQL Database
   ↓
Blade Views
```

The application uses Laravel's:

* Controllers
* Eloquent ORM
* Models & Relationships
* Migrations
* Seeders
* Middleware
* Blade Templates
* Authentication
* Validation
* File Storage

---

## 🎯 Project Purpose

Dream Home was developed as a practical full-stack Laravel project to demonstrate the development of a real-world property management platform.

The project focuses on:

* Backend development
* Database design
* Laravel MVC architecture
* Authentication and authorization
* CRUD operations
* Eloquent relationships
* Role-based dashboards
* File management
* Appointment workflows
* Admin management
* Responsive frontend development

---

## 👨‍💻 Developer

**Maan**

GitHub: https://github.com/maan17g

LinkedIn: https://www.linkedin.com/in/aman-ahmad-a8a675363/

---

