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
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL 
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

- **Important**: After inserting users, make sure to delete these scripts (`create_admin.php` and `create_user.php`) to prevent unauthorized access.


### 5. Start the Server

- Open **XAMPP** and start **Apache** and **MySQL**.
- Access the project in your browser by navigating to http://localhost/project.


### Notes
- **Database Name**: Make sure to update the database name in `db/db_connect.php` to the actual name you used during the setup (`DBprojeto` is used in the examples).
- **User Roles**: Ensure that the `role` field is correctly set in the database (`admin` or `viewer`) to control user access.


### 6. CRUD Functionality

- **Create Model**: Add new rubik's cube models by filling out the form in the Create section.
- **View Models**: Display all registered rubik's cube models in the View section.
- **Update Model**: Edit existing cube model details through the Update section.
- **Delete Model**: Remove a cube model from the database using the Delete section.

- **View Models (for viewers)**: Viewer users can only access the `view_only.php` page, which displays all Rubik's cube models without any editing or deletion permissions.


### 7. Security

- **Role-Based Access Control (RBAC)**: The system restricts access to specific pages based on the user's role (admin or viewer). Admin users have full CRUD permissions, while viewer users can only view the models.
- **Login Protection**: **All** CRUD pages are protected by the login system. Unauthorized users will be redirected to the login page.
- **Logout**: The logout functionality ensures that users can securely end their session, preventing unauthorized access to protected areas.



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
│   ├── view_only.php          # Page to view models for 'viewer' users
│
├── scripts/                   # Temporary scripts folder (delete after use)
│   ├── create_admin.php       # Script to insert an admin user
│   └── create_user.php        # Script to insert a viewer user
│
├── index.php                  # Login page
├── logout.php                 # Logout script
└── README.md                  # Project instructions
```



## How to Use

- **Login**: Use the username and password you created (admin/admin123 for admin users, viewer/viewer123 for viewer users).
- **Admin Access**: Once logged in as an admin, you can create, view, update, and delete Rubik's cube models.
- **Viewer Access**: Users with viewer roles can only view the registered models in the `view_only.php` page.
- **Logout**: Use the logout button in the navigation bar to securely end your session and return to the login page.



## Future Improvements

- **Password Encryption**: Implement password hashing (e.g., using `password_hash` in PHP) to protect user credentials.
- **Search Filters & Pagination**: Add search functionality to easily find specific models and paginate results for better navigation.




## Author

Created and maintained by [Rogério Junyor](https://github.com/rogeriojunyorrf) and [Arthur Arêas](https://github.com/arthuramata).

Feel free to reach out if you have any questions or suggestions!

