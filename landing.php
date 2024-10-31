<?php   


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumni_tracking_system";

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "";
} else {
    echo "" . $conn->error . "<br>";
}

// Select the database
$conn->select_db($dbname);

// SQL statements for table creation
$sqlCreateGenericInformationTable = " CREATE TABLE IF NOT EXISTS generic_information (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(30) NOT NULL,
        age INT NOT NULL,
        date_of_birth DATE NOT NULL,
        sex VARCHAR(10) NOT NULL,
        civil_status VARCHAR(20) NOT NULL,
        permanent_address VARCHAR(100) NOT NULL,
        contact_number VARCHAR(15) NOT NULL,
        religion VARCHAR(50) NOT NULL,
        email_address VARCHAR(50) NOT NULL
    )";

$sqlCreateEducationalProfileTable = "CREATE TABLE IF NOT EXISTS educational_profile (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(30) NOT NULL,
        jhs_year_graduated VARCHAR(4) NOT NULL,
        jhs_school VARCHAR(50) NOT NULL,
        jhs_address VARCHAR(50) NOT NULL,
        shs_year_graduated VARCHAR(50) NOT NULL,
        shs_school VARCHAR(100) NOT NULL,
        shs_address VARCHAR(100) NOT NULL,
        shs_strand VARCHAR(20) NOT NULL,
        college_classification VARCHAR(20) NOT NULL,
        college_program VARCHAR(50) NOT NULL,
        college_degree VARCHAR(50) NOT NULL,
        college_campus_name VARCHAR(50) NOT NULL
    )";

$sqlCreateEmployedDataTable = " CREATE TABLE IF NOT EXISTS employed_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(255) NOT NULL,
        employment_status VARCHAR(10) NOT NULL,
        organization VARCHAR(255) NOT NULL,
        qualifications VARCHAR(255) NOT NULL,
        income VARCHAR(255) NOT NULL,
        skills VARCHAR(255) NOT NULL
    )";

$sqlCreateSelfEmployedDataTable = " CREATE TABLE IF NOT EXISTS self_employed_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(255) NOT NULL,
        business VARCHAR(255) NOT NULL,
        related VARCHAR(255) NOT NULL,
        reasons VARCHAR(255) NOT NULL,
        no_of_employee VARCHAR(10) NOT NULL,
        skills VARCHAR(255) NOT NULL
    )";

$sqlCreateUnemployedDataTable = "CREATE TABLE IF NOT EXISTS unemployed_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(255) NOT NULL,
        reason VARCHAR(255) NOT NULL,
        seek VARCHAR(10) NOT NULL,
        doing VARCHAR(255) NOT NULL,
        finance VARCHAR(100) NOT NULL,
        desire VARCHAR(10) NOT NULL,
        consider VARCHAR(10) NOT NULL
    )";

// Execute table creation queries
$conn->query($sqlCreateGenericInformationTable);
$conn->query($sqlCreateEducationalProfileTable);
$conn->query($sqlCreateEmployedDataTable);
$conn->query($sqlCreateSelfEmployedDataTable);
$conn->query($sqlCreateUnemployedDataTable);

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Tracking System</title>
</head>


    <style>
        body {
       font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-image: url('mybg.jpg'); /* Replace 'your-image.jpg' with the path to your background image */
        background-size: cover;
        background-position: center;
        }

        header {
           
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav {
           
            overflow: hidden;
            text-align: right;
            border-bottom: 2px solid #FBF9F1;
            border-top: 2px solid #FBF9F1;
            
        }

        nav a {
            float: right;
            display: block;
            color: white;
            text-align: right;
            padding: 14px 16px;
            text-decoration: none;
            
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
            
        }

        main {
            padding: 20px;
        }

        h1 {
            color: #F1F1F1;
        }

        .content {
    
    background-size: cover; /* This ensures that the background image covers the entire container */
    background-position: center;
    color: #fff; /* Set text color to be visible on the background image */
    padding: 100px;
    padding-bottom:200px;
    box-sizing: content-box; 

        }

        footer {
           
            color: #fff;
            text-align: center;
            padding: 10px;
           
            bottom: 0;
            width: 100%;
            position:fixed;
        }
    </style>
</head>
<body> 

<header>
    <h1>CS Integrated School</h1>
</header>


<nav>
    <a href="login.php">Login</a>
     <a class="navbar-link" href="registration.php"> Registration</a>
    <a href="landing.php">Home</a>
   

</nav>

<main>
    
    <div class="content">
        
        
</main>

<footer>
    <p>&copy; 2024 CS Integrated School</p>
</footer>

</body>
</html>
