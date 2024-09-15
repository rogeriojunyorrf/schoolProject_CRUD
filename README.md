# Rubik's Cube Management System with Login and CRUD Functionality

This project is a simple **CRUD** (Create, Read, Update, Delete) system for rubik's cubes with a basic login authentication. The school project is developed using **PHP** and **MySQL**, and uses **Bootstrap** for styling.

## Features

- **Login System**: Only authenticated users can access the CRUD functionalities.
- **Full CRUD**: Allows users to create, view, update, and delete rubik's cube models.
- **Responsive Design**: The project uses Bootstrap to ensure a responsive layout.

## Technologies Used

- **PHP**: Backend of the project.
- **MySQL**: Database to store cubes and user data.
- **Bootstrap**: For styling and responsive design.
- **HTML**: For the user interface and structure.
- **XAMPP**: To run the project locally.

## How to Set Up the Project

### 1. Clone the Repository

Clone this repository to your local environment:

```bash
git clone https://github.com/junyorrf/schoolProject_CRUD.git
```
### 2. Database Setup

- Create a MySQL database (I used XAMPP for that) and import the following tables:

```sql
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Cubes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelName VARCHAR(100) NOT NULL,
    releaseYear INT NOT NULL,
    cubeType VARCHAR(7) NOT NULL,
    cubeSize FLOAT NOT NULL,
    cubeWeight FLOAT NOT NULL,
    cubePrice FLOAT NOT NULL,
    brandName VARCHAR(50) NOT NULL
);
```
### 3. Configure Database Connection

- In the file db/db_connect.php, configure the connection to your MySQL database:

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";  # I used DBprojeto

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### 4. Insert Users

- To test the login system, manually insert an admin user by using the following scripts:

#### 4.1 Insert Admin

```php
<?php
include 'db/db_connect.php';

$username = "admin";
$password = "admin123";
$role = "admin"; 

$sql = "INSERT INTO Users (username, password, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $role);
$stmt->execute();

echo "Admin user inserted successfully.";

$stmt->close();
$conn->close();
?>
```

#### 4.2 Insert Viewer

```php
<?php
include 'db/db_connect.php';

$username = "viewer";
$password = "viewer123";
$role = "viewer"; 

$sql = "INSERT INTO Users (username, password, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $role);
$stmt->execute();

echo "Usuário viewer inserido com sucesso.";

$stmt->close();
$conn->close();
?>
```

- After inserting, you can delete these scripts.

### 5. Start the Server

- Open **XAMPP** and start **Apache** and **MySQL**.
- Access the project in your browser by navigating to http://localhost/project.

### 6. CRUD Functionality

- **Create Model**: Add new rubik's cube models by filling out the form in the Create section.
- **View Models**: Display all registered rubik's cube models in the View section.
- **Update Model**: Edit existing cube model details through the Update section.
- **Delete Model**: Remove a cube model from the database using the Delete section.

### 7. Security

- **All** CRUD pages are protected by the login system. If a user tries to access these pages without logging in, they will be redirected to the login page.
- Logout functionality ensures that users can securely end their session.



## Directory Structure

```bash
project/
│
├── db/
│   └── db_connect.php         # Database connection file
│
├── pages/
│   ├── create.php             # Page to create new cube models
│   ├── update.php             # Page to update existing models
│   ├── delete.php             # Page to delete models
│   ├── view.php               # Page to view all models
│   ├── view_only.php          # Page to view all models (for users with "viewer" role)
│
├── create_admin.php           # Script to insert an admin user (you can delete after use)
├── create_user.php            # Script to insert an viewer user (you can delete after use)
├── index.php                  # Login page
├── logout.php                 # Logout script
└── README.md                  # Project instructions
```



## How to Use

- **Login**: Use the username and password you created (admin/admin123) or another user you registered.
- **CRUD**: Navigate through the Create, View, Update, and Delete functionalities after logging in.
- **Logout**: Use the logout button to securely end the session.




## Future Improvements

- **Password Encryption**: Implement password hashing (e.g., using `password_hash` in PHP) to protect user credentials.
- **Search Filters & Pagination**: Add search functionality to easily find specific models and paginate results for better navigation.




## Author

Created and maintained by [Rogério Junyor](https://github.com/junyorrf).

Feel free to reach out if you have any questions or suggestions!

