<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        /* Your existing styles... */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #1F0F62;
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
            float: left;
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
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 20px; /* Adjust the padding as needed */
            box-sizing: content-box;
        }

        footer {
            color: #fff;
            text-align: center;
            padding: 10px;
            bottom: 0;
            width: 100%;
            position: fixed;
        }

        .container {
            width: 90%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
        }

        table {
            width: 100%;
            margin-top: 20px; /* Adjust the margin as needed */
            margin-bottom: 20px; /* Adjust the margin as needed */
            background-color: #f2f2f2;
            border-top: 2px solid #FBF9F1; /* Added border top */
            border-bottom: 2px solid #FBF9F1; /* Added border bottom */
        }

        th, td {
            padding: 10px;
            text-align: left;
            width: 50%; /* Set width to 50% for a vertical layout */
            box-sizing: border-box;
        }

        th {
            color: black;
        }

        /* Center align text in specific columns if needed */
        td.text-center {
            text-align: center;
        }

        td.text-right {
            text-align: right;
        }

        .action-buttons {
            text-align: center;
        }

        .update-btn,
        .delete-btn {
            padding: 8px 12px;
            margin: 5px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            display: inline-block;
        }

        .update-btn {
            background-color: green;
            color: white;
            
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            float: right;
        }
        .center-text {
    text-align: center;
  
    color: black;
    padding: 5px; 


    }
    </style>
</head>
<body>
    <header>
        <h1>CS Integrated School</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="generic_information.php">Forms</a>
        <a class="navbar-link" href="edit.php">Registration</a> 
        <a class="navbar-link" href="editforms.php">Edit Forms</a> 
        <a href="logout.php">Logout</a>
    </nav>

   

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alumni_tracking_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM generic_information";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="container">'; // Create a new container for each set of information
            echo '<div class="center-text">';
            echo '<p><b>DIRECTORY INFORMATION</b></p>';
            echo '</div>';
            echo '<h2>ID: ' . $row["id"] . '</h2>';
echo '<p><b>Fullname: </b>' . $row["fullname"] . '</p>';
echo '<p><b>Age:</b> ' . $row["age"] . '</p>';
echo '<p><b>Date of Birth: </b>' . $row["date_of_birth"] . '</p>';
echo '<p><b>Place of Birth: </b>' . $row["place_of_birth"] . '</p>';
echo '<p><b>Mobile: </b>' . $row["mobile"] . '</p>';
echo '<p><b>Email: </b>' . $row["email"] . '</p>';
echo '<p><b>Gender: </b>' . $row["gender"] . '</p>';
echo '<p><b>Permanent Address: </b>' . $row["permanent_address"] . '</p>';
echo '<p><b>Provincial Address:</b> ' . $row["provincial_add"] . '</p>';
echo '<p><b>Name of Spouse: </b>' . $row["nos"] . '</p>';

echo '<div class="center-text">';
        echo '<p><b>EDUCATIONAL ATTAINMENT</b></p>';
        echo '</div>';
echo '<p><b>Elementary: </b>' . $row["elem"] . '</p>';
echo '<p><b>Year Graduated (Elementary):</b> ' . $row["yrelem"] . '</p>';
echo '<p><b>High School: </b>' . $row["hs"] . '</p>';
echo '<p><b>Year Graduated (High School): </b>' . $row["yrhs"] . '</p>';
echo '<p><b>College:</b> ' . $row["college"] . '</p>';
echo '<p><b>Course: </b>' . $row["courses"] . '</p>';
echo '<p><b>Year Graduated (College):</b> ' . $row["yrc"] . '</p>';
echo '<p><b>Post Graduate:</b> ' . $row["pg"] . '</p>';
echo '<p><b>Course (Post Graduate): </b>' . $row["coursess"] . '</p>';
echo '<p><b>Year Graduated (Post Graduate): </b>' . $row["yrcc"] . '</p>';
echo '<p><b>Others: </b>' . $row["others"] . '</p>';
echo '<p><b>Course :</b> ' . $row["coursez"] . '</p>';
echo '<p><b>Year Graduated :</b> ' . $row["yrg"] . '</p>';
echo '<p><b>Academic Honors: </b>' . $row["ah"] . '</p>';
echo '<p><b>Awards/Distinction: </b>' . $row["ad"] . '</p>';
echo '<p><b>Civil Service/Board Exams/Bar Exams:</b> ' . $row["cs"] . '</p>';

echo '<div class="center-text">';
        echo '<p><b>EMPLOYMENT DETAILS </b></p>';
        echo '</div>';
echo '<p><b>Occupations: </b>' . $row["oc"] . '</p>';
echo '<p><b>Employer:</b> ' . $row["em"] . '</p>';
echo '<p><b>Business Address: </b>' . $row["ba"] . '</p>';
echo '<p><b>Tel No:</b> ' . $row["tl"] . '</p>';
echo '<p><b>Length of Service:</b> ' . $row["los"] . '</p>';
echo '<p><b>Civil, Professional, Fraternal, Religious or Business Organization: </b>' . $row["cp"] . '</p>';

                    // Add similar lines for other fields...

                    echo '<a class="update-btn" href="update.php?id=' . $row["id"] . '">Update</a>';
                    echo '<a class="delete-btn" href="deleteforms.php?id=' . $row["id"] . '">Delete</a>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            // Close your PHP tag if needed...
        ?>
    </div>

    <footer>
        <p>&copy; 2024 CS Integrated School</p>
    </footer>
</body>
</html>