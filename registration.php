<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: landing.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
.container{
    max-width: 600px;
    margin:0 auto;
    padding:50px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    background-color: #F1F1F1;
    order-radius: 8px;
}
.form-group{
    margin-bottom:30px;
}
.center-text {
    text-align: center;
   
    color: #333;
    padding: 1px; 

    
}
    </style>
</head>
<body>
    <div class="container">
    <div class="center-text">
  <h3><b>Register Here</b></h3>


    
    <?php
if (isset($_POST["submit"])) {
    $fullName = $_POST["fullname"];
    $birthday = $_POST["birthday"];
    $sex = $_POST["sex"];
    $status = $_POST["status"];
    $contactnum = $_POST["contactnum"];
    $fulladd = $_POST["fulladd"];
    $lrn = $_POST["lrn"];
    $batch = $_POST["batch"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($fullName) || empty($birthday) || empty($sex) || empty($status) || empty($contactnum) || empty($fulladd) || empty($lrn) || empty($batch) || empty($email) || empty($password) || empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            array_push($errors, "Email already exists!");
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Something went wrong: " . mysqli_error($conn));
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO users (full_name, birthday, sex, status, contactnum, fulladd, lrn, batch, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ssssssssss", $fullName, $birthday, $sex, $status, $contactnum, $fulladd, $lrn, $batch, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong: " . mysqli_error($conn));
        }
    }
}
?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<form action="registration.php" method="post">


                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo htmlspecialchars($studentData['fullname'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="birthday" placeholder="Birthday">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sex" placeholder="Sex">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="status" placeholder="Status">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="contactnum" placeholder="Contact Number">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="fulladd" placeholder="Full Address">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="lrn" placeholder="LRN">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="batch" placeholder="Batch">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                </div>
            </form>
        <div>
        <div><p>Already Registered <a href="landing.php">Home</a></p></div>
      </div>
    </div>
</body>
</html>