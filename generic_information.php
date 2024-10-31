<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumni_tracking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function addGeneric($conn, $fullname, $age, $date_of_birth, $place_of_birth, $mobile, $email, $gender, $permanent_address, $provincial_add, $nos, $elem, $yrelem, $hs, $yrhs, $college, $courses, $yrc, $pg, $coursess, $yrcc, $others, $coursez, $yrg, $ah, $ad, $cs, $oc, $em, $ba, $tl, $los, $cp) {
    $sql = "INSERT INTO generic_information (fullname, age, date_of_birth, place_of_birth, mobile, email, gender, permanent_address, provincial_add, nos, elem, yrelem, hs, yrhs, college, courses, yrc, pg, coursess, yrcc, others, coursez, yrg, ah, ad, cs, oc, em, ba, tl, los, cp) 
            VALUES ('$fullname', '$age', '$date_of_birth', '$place_of_birth','$mobile', '$email', '$gender', '$permanent_address', '$provincial_add', '$nos', '$elem', '$yrelem', '$hs', '$yrhs', '$college', '$courses', '$yrc', '$pg', '$coursess', '$yrcc', '$others', '$coursez', '$yrg', '$ah','$ad', '$cs', '$oc', '$em', '$ba' ,'$tl' , '$los' ,'$cp')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $age = $_POST["age"];
    $date_of_birth = $_POST["date_of_birth"];
    $place_of_birth = $_POST["place_of_birth"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $permanent_address = $_POST["permanent_address"];
    $provincial_add = $_POST["provincial_add"];
    $nos = $_POST["nos"];   
$elem = $_POST["elem"];
$yrelem = $_POST["yrelem"];
$hs = $_POST["hs"];
$yrhs = $_POST["yrhs"];
$college = $_POST["college"];
$courses = $_POST["courses"];
$yrc = $_POST["yrc"];
$pg = $_POST["pg"];
$coursess = $_POST["coursess"];
$yrcc = $_POST["yrcc"];
$others = $_POST["others"];
$coursez = $_POST["coursez"];
$yrg = $_POST["yrg"];
$ah = $_POST["ah"];
$ad = $_POST["ad"];
$cs = $_POST["cs"];
$oc = $_POST["oc"];
$em = $_POST["em"];
$ba = $_POST["ba"];
$tl = $_POST["tl"];
$los = $_POST["los"];
$cp = $_POST["cp"];


    

    $result = addGeneric($conn, $fullname, $age, $date_of_birth, $place_of_birth, $mobile,$email, $gender, $permanent_address , $provincial_add, $nos, $elem, $yrelem ,$hs, $yrhs, $college, $courses ,$yrc, $pg, $coursess , $yrcc ,$others ,$coursez, $yrg, $ah, $ad, $cs, $oc, $em, $ba ,$tl , $los ,$cp);

    if ($result === true) {
        // Redirect to index.php after successful addition
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $result;
    }
}

$conn->close();
?>

<!-- Rest of your HTML code remains unchanged -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-image: url('mybg.jpg'); /* Replace 'your-image.jpg' with the path to your background image */
        background-size: cover;
        background-position: top;
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

    .container {
        width: 90%;
        margin: 50px auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-color: white;
        border: 2px solid  #1F0F62;

        
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-left: 95%; /* Add this line to move the button to the right */
}
     

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 15px;
    }

    #back-button {
        background-color: #333;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-right: 20px;
    }

    .title {
        text-align: center;
    }

    footer {
        color: #fff;
            text-align: center;
            padding: 10px;
           
            bottom: 0;
            width: 100%;
            position:fixed;
    }
    .styled-select {
        font-size: 16px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        cursor: pointer;
    }
    .center-text {
    text-align: center;
  
    color: #333;
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
    <a href="forms.php">Forms</a>
    <a class="navbar-link" href="edit.php">Registration</a>
    <a class="navbar-link" href="editforms.php">Edit Forms</a>
    <a href="login.php">Logout</a>

</nav>

 
    <div class="container">
        <div class="box">



            <?php if (isset($_POST['submit'])) {
                if ($result === true) { ?>
                    <div class="alert alert-success" role="alert">   
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $result; ?>
                    </div>
                <?php }
            } ?>

            
    <div class="center-text">
  <h3><b>DIRECTORY  INFORMATION</b></h3>
</div>



        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Rest of your form remains unchanged -->
        </form>
    </div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">



        <label for="fullname">Full Name:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" required>
    </div>

    <div class="form-group">
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
    </div>

    <div class="form-group">
        <label for="place_of_birth">Place of Birth:</label>
        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
    </div>

    <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="number" class="form-control" id="mobile" name="mobile" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    

    <div class="form-group">
        <label for="gender">Gender:</label>
    
        <select name="gender" required>
            <option  value="">--Select--</option>
            <option value="FEMALE">FEMALE</option>
            <option value="MALE">MALE</option>
            
            
        </select>
        
    </div>

    <div class="form-group">
        <label for="permanent_address">Permanent Address:</label>
        <input type="text" class="form-control" id="permanent_address" name="permanent_address" required>
    </div>

    <div class="form-group">
        <label for="provincial_add">Provincial Address:</label>
        <input type="text" class="form-control" id="provincial_add" name="provincial_add" required>
    </div>

    <div class="form-group">
        <label for="nos">Name of Spouse:</label>
        <input type="text" class="form-control" id="nos" name="nos" required>
    </div>
    <div class="center-text">
  <h3><b> EDUCATIONAL ATTAINMENT</b></h3>
</div>  

<div class="form-group">

  <h3><b> ELEMENTARY </b></h3>
 
        <label for="elem">Elementary  :</label>
        <input type="text" class="form-control" id="elem" name="elem" required>
    </div>

    <div class="form-group">
        <label for="yrelem">Year Graduated  :</label>
        <input type="number" class="form-control" id="yrelem" name="yrelem" required>
    </div>
 
    <h3><b> HIGH SCHOOL </b></h3>
    <div class="form-group">
        <label for="hs">High School  :</label>
        <input type="text" class="form-control" id="hs" name="hs" required>
    </div>

    <div class="form-group">
        <label for="yrhs">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrhs" name="yrhs" required>
    </div>

    <h3><b>  COLLEGE </b></h3>

    <div class="form-group">
        <label for="college">College:</label>
        <input type="text" class="form-control" id="college" name="college" required>
    </div>

    <div class="form-group">
        <label for="courses">Course:</label>
        <input type="text" class="form-control" id="courses" name="courses" required>
    </div>

    <div class="form-group">
        <label for="yrc">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrc" name="yrc" required>
    </div>

    <div class="form-group">
        <label for="pg">Post Graduate :</label>
        <input type="text" class="form-control" id="pg" name="pg" required>
    </div>

    <div class="form-group">
        <label for="coursess">Course:</label>
        <input type="text" class="form-control" id="coursess" name="coursess" required>
    </div>

    <div class="form-group">
        <label for="yrcc">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrcc" name="yrcc" required>
    </div>

    <div class="form-group">
        <label for="others">Others:</label>
        <input type="text" class="form-control" id="others" name="others" required>
    </div>

    <div class="form-group">
        <label for="coursez">Course:</label>
        <input type="text" class="form-control" id="coursez" name="coursez" required>
    </div>

    <div class="form-group">
        <label for="yrg">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrg" name="yrg" required>
    </div>

    <div class="form-group">
        <label for="ah">Academic Honors  :</label>
        <input type="text" class="form-control" id="ah" name="ah" required>
    </div>

    <div class="form-group">
        <label for="ad">Awards/Distinction   :</label>
        <input type="text" class="form-control" id="ad" name="ad" required>
    </div>

    <div class="form-group">
        <label for="cs">Civil Service/Board Exams/Bar Exams (State the year taken/passed) :</label>
        <input type="text" class="form-control" id="cs" name="cs" required>
    </div>

    <h3><b>  EMPLOYMENT DETAILS  </b></h3>

    <div class="form-group">
        <label for="oc">Occupation:</label>
        <input type="text" class="form-control" id="oc" name="oc" required>
    </div>

    <div class="form-group">
        <label for="em">Employer:</label>
        <input type="text" class="form-control" id="em" name="em" required>
    </div>

    <div class="form-group">
        <label for="ba">Business Address:</label>
        <input type="text" class="form-control" id="ba" name="ba" required>
    </div>

    <div class="form-group">
        <label for="tl">Tel No. :</label>
        <input type="number" class="form-control" id="tl" name="tl" required>
    </div>

    <div class="form-group">
        <label for="los">Length of Service:</label>
        <input type="text" class="form-control" id="los" name="los" required>
    </div>
    
    <div class="form-group">
        <label for="cp">Civil , Professional, Fraternal, Religious or Business Organization and Affiliations (State the position held and term of office):</label>
        <input type="text" class="form-control" id="cp" name="cp" required>
    </div>
    

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

            
            
        </div>

        <footer>
    <p>&copy; 2024 CS Integrated School</p>
</footer>
    

   
</body>
</html>

