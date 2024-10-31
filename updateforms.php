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

function getStudentById($conn, $studentId) {
    $sql = "SELECT * FROM generic_information WHERE id = $studentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function updateStudent($conn, $id, $fullname, $age, $date_of_birth, $place_of_birth, $mobile, $email, $gender, $permanent_address, $provincial_add, $nos, $elem, $yrelem, $hs, $yrhs, $college, $courses, $yrc, $pg, $coursess, $yrcc, $others, $coursez, $yrg, $ah, $ad, $cs, $oc, $em, $ba, $tl, $los, $cp) {
    $sql = "UPDATE generic_information SET 
        fullname = '$fullname',
        age = '$age',
        date_of_birth = '$date_of_birth',
        place_of_birth = '$place_of_birth',
        mobile = '$mobile',
        email = '$email',
        gender = '$gender',
        permanent_address = '$permanent_address',
        provincial_add = '$provincial_add',
        nos = '$nos',
        elem = '$elem',
        yrelem = '$yrelem',
        hs = '$hs',
        yrhs = '$yrhs',
        college = '$college',
        courses = '$courses',
        yrc = '$yrc',
        pg = '$pg',
        coursess = '$coursess',
        yrcc = '$yrcc',
        others = '$others',
        coursez = '$coursez',
        yrg = '$yrg',
        ah = '$ah',
        ad = '$ad',
        cs = '$cs',
        oc = '$oc',
        em = '$em',
        ba = '$ba',
        tl = '$tl',
        los = '$los',
        cp = '$cp'
        WHERE id = $id";
          

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Error updating record: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // Assuming you have an input field with name="id" in your form

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


    $errors = array();

    $result = updateStudent($conn,$id, $fullname, $age, $date_of_birth, $place_of_birth, $mobile,$email, $gender, $permanent_address , $provincial_add, $nos, $elem, $yrelem ,$hs, $yrhs, $college, $courses ,$yrc, $pg, $coursess , $yrcc ,$others ,$coursez, $yrg, $ah, $ad, $cs, $oc, $em, $ba ,$tl , $los ,$cp);

    if ($result === true) {
        // Redirect to edit.php after successful update
        header("Location: editforms.php");
        exit();
    } else {
        echo "Error: " . $result;
    }
}

// Fetch the student data for the given student ID
$studentId = $_GET["id"];
$studentData = getStudentById($conn, $studentId);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Forms</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        #navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            box-sizing: border-box;
            font-weight: bold;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        #brand {
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            margin-left: 20px;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .navbar-link {
            margin: 10px;
            padding: 10px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h4 class="display-4 text-center">Update Forms</h4>
            <hr><br>

           
            <?php if ($studentData !== null) { ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $studentData['id']; ?>">

                    <div class="form-group">
    <label for="fullname">Full Name:</label>
    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($studentData['fullname'] ?? ''); ?>" required>
</div>

<div class="form-group">
    <label for="age">Age:</label>
    <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($studentData['age'] ?? ''); ?>" required>
</div>

<div class="form-group">
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo htmlspecialchars($studentData['date_of_birth'] ?? ''); ?>" required>
</div>

<!-- Add the value attribute to other input fields similarly -->

<div class="form-group">
    <label for="place_of_birth">Place of Birth:</label>
    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?php echo htmlspecialchars($studentData['place_of_birth'] ?? ''); ?>" required>
</div>
    <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($studentData['mobile'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email"value="<?php echo htmlspecialchars($studentData['email'] ?? ''); ?>" required>
    </div>

    

    <div class="form-group">
        <label for="gender">gender:</label>
    
        <select name="gender" value="<?php echo htmlspecialchars($studentData['gender'] ?? ''); ?>" required>
            <option  value="">--Select--</option>
            <option value="FEMALE">FEMALE</option>
            <option value="MALE">MALE</option>
            
            
        </select>
        
    </div>

    <div class="form-group">
        <label for="permanent_address">Permanent Address:</label>
        <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="<?php echo htmlspecialchars($studentData['permanent_address'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="provincial_add">Provincial Address:</label>
        <input type="text" class="form-control" id="provincial_add" name="provincial_add" value="<?php echo htmlspecialchars($studentData['provincial_add'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="nos">Name of Spouse:</label>
        <input type="text" class="form-control" id="nos" name="nos" value="<?php echo htmlspecialchars($studentData['nos'] ?? ''); ?>" required>
    </div>
    <div class="center-text">
  <h3><b> EDUCATIONAL ATTAINMENT</b></h3>
</div>  

<div class="form-group">

  <h3><b> ELEMENTARY </b></h3>
 
        <label for="elem">Elementary  :</label>
        <input type="text" class="form-control" id="elem" name="elem" value="<?php echo htmlspecialchars($studentData['elem'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="yrelem">Year Graduated  :</label>
        <input type="number" class="form-control" id="yrelem" name="yrelem" value="<?php echo htmlspecialchars($studentData['yrelem'] ?? ''); ?>" required>
    </div>
 
    <h3><b> HIGH SCHOOL </b></h3>
    <div class="form-group">
        <label for="hs">High School  :</label>
        <input type="text" class="form-control" id="hs" name="hs" value="<?php echo htmlspecialchars($studentData['hs'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="yrhs">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrhs" name="yrhs" value="<?php echo htmlspecialchars($studentData['yrhs'] ?? ''); ?>" required>
    </div>

    <h3><b>  COLLEGE </b></h3>

    <div class="form-group">
        <label for="college">College:</label>
        <input type="text" class="form-control" id="college" name="college" value="<?php echo htmlspecialchars($studentData['college'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="courses">Course:</label>
        <input type="text" class="form-control" id="courses" name="courses" value="<?php echo htmlspecialchars($studentData['courses'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="yrc">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrc" name="yrc" value="<?php echo htmlspecialchars($studentData['yrc'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="pg">Post Graduate :</label>
        <input type="text" class="form-control" id="pg" name="pg" value="<?php echo htmlspecialchars($studentData['pg'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="coursess">Course:</label>
        <input type="text" class="form-control" id="coursess" name="coursess" value="<?php echo htmlspecialchars($studentData['coursess'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="yrcc">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrcc" name="yrcc" value="<?php echo htmlspecialchars($studentData['yrcc'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="others">Others:</label>
        <input type="text" class="form-control" id="others" name="others" value="<?php echo htmlspecialchars($studentData['others'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="coursez">Course:</label>
        <input type="text" class="form-control" id="coursez" name="coursez" value="<?php echo htmlspecialchars($studentData['coursez'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="yrg">Year Graduated   :</label>
        <input type="number" class="form-control" id="yrg" name="yrg" value="<?php echo htmlspecialchars($studentData['yrg'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="ah">Academic Honors  :</label>
        <input type="text" class="form-control" id="ah" name="ah" value="<?php echo htmlspecialchars($studentData['ah'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="ad">Awards/Distinction   :</label>
        <input type="text" class="form-control" id="ad" name="ad" value="<?php echo htmlspecialchars($studentData['ad'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="cs">Civil Service/Board Exams/Bar Exams (State the year taken/passed) :</label>
        <input type="text" class="form-control" id="cs" name="cs" value="<?php echo htmlspecialchars($studentData['cs'] ?? ''); ?>" required>
    </div>

    <h3><b>  EMPLOYMENT DETAILS  </b></h3>

    <div class="form-group">
        <label for="oc">Occupation:</label>
        <input type="text" class="form-control" id="oc" name="oc" value="<?php echo htmlspecialchars($studentData['oc'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="em">Employer:</label>
        <input type="text" class="form-control" id="em" name="em" value="<?php echo htmlspecialchars($studentData['em'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="ba">Business Address:</label>
        <input type="text" class="form-control" id="ba" name="ba" value="<?php echo htmlspecialchars($studentData['ba'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="tl">Tel No. :</label>
        <input type="number" class="form-control" id="tl" name="tl" value="<?php echo htmlspecialchars($studentData['tl'] ?? ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="los">Length of Service:</label>
        <input type="text" class="form-control" id="los" name="los" value="<?php echo htmlspecialchars($studentData['los'] ?? ''); ?>" required>
    </div>
    
    <div class="form-group">
        <label for="cp">Civil , Professional, Fraternal, Religious or Business Organization and Affiliations (State the position held and term of office):</label>
        <input type="text" class="form-control" id="cp" name="cp" value="<?php echo htmlspecialchars($studentData['cp'] ?? ''); ?>" required>
    </div>
    

               
                
               

                    <button type="submit" class="btn btn-primary" name="submit">Update </button>
                </form><br><br>

                <a href="editforms.php" id="back-button">Back to Edit</a>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    Student not found.
                </div>

                <a href="editforms.php" id="back-button">Back to Edit</a>
            <?php } ?>
        </div>
    </div>
</body>
</html>
