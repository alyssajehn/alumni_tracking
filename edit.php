<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
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
            float: right;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            float:right;
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

   
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "alumni_tracking_system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<table>';
                echo '<div class="center-text">';
        echo '<p><b>REGISTRATION DATA</b></p>';
        echo '</div>';
                echo '<tr><th>ID: </th><td>' . $row["id"] . '</td></tr>';
                echo '<tr><th>Fullname: </th><td>' . $row["full_name"] . '</td></tr>';
                echo '<tr><th>Birthday: </th><td>' . $row["birthday"] . '</td></tr>';
                echo '<tr><th>Sex: </th><td>' . $row["sex"] . '</td></tr>';
                echo '<tr><th>Status: </th><td>' . $row["status"] . '</td></tr>';
                echo '<tr><th>Contact Number: </th><td>' . $row["contactnum"] . '</td></tr>';
                echo '<tr><th>Full Address: </th><td>' . $row["fulladd"] . '</td></tr>';
                echo '<tr><th>LRN: </th><td>' . $row["lrn"] . '</td></tr>';
                echo '<tr><th>Batch: </th><td>' . $row["batch"] . '</td></tr>';
                echo '<tr><th>Email: </th><td>' . $row["email"] . '</td></tr>';
                echo '<tr><th>Password: </th><td>' . $row["password"] . '</td></tr>';
                echo '<tr class="action-buttons">
                        <th>Actions</th>
                        <td>
                  
                            <a class="delete-btn" href="delete.php?id=' . $row["id"] . '">Delete</a>
                            <a class="update-btn" href="update.php?id=' . $row["id"] . '">Update</a>
                        </td>
                      </tr>';
                echo '</table>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>

    <footer>
        <p>&copy; 2024 CS Integrated School</p>
    </footer>
</body>
</html>
