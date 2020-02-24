<?php

// Setup Time Zone
date_default_timezone_set("America/New_York"); 

// Setup variables
$name = "";
$grade = "";
$class = "";
$teacher = "";
$period = "";
$time = "";
$error = FALSE;

// Check name
if (isset($_POST['nameField'])) {
    if ($_POST['nameField'] != "") {
        $name = $_POST['nameField'];
    }
}

// Check grade
if (isset($_POST['gradeSelect'])) {
    if ($_POST['gradeSelect'] != "") {
        $grade = $_POST['gradeSelect'];
    }
}

// Check class
if (isset($_POST['classField'])) {
    if ($_POST['classField'] != "") {
        $class = $_POST['classField'];
    }
}

// Check teacher
if (isset($_POST['teacherField'])) {
    if ($_POST['teacherField'] != "") {
        $teacher = $_POST['teacherField'];
    }
}

// Check period
if (isset($_POST['periodSelect'])) {
    if ($_POST['periodSelect'] != "") {
        $period = $_POST['periodSelect'];
    }
}

// Error checking
if ($name == "" || $grade == "" || $class == "" || $teacher == "" || $period == "") {
    $error = TRUE;
}

// Submit info to DB
if ($error == FALSE) {

    // Load database login
    $db_login = parse_ini_file("../../../database.conf");

    // Set DB login info
    $servername = $db_login['server'];
    $username = $db_login['user'];
    $password = $db_login['pass'];
    $dbname = $db_login['table'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO students (name, grade, class, teacher, period, time) VALUES (:name, :grade, :class, :teacher, :period, :time)");
        
        // Prepare row
        $stmt->bindParam(':name', $nameInsert);
        $stmt->bindParam(':grade', $gradeInsert);
        $stmt->bindParam(':class', $classInsert);
        $stmt->bindParam(':teacher', $teacherInsert);
        $stmt->bindParam(':period', $periodInsert);
        $stmt->bindParam(':time', $timeInsert);

        // Insert row
        $nameInsert = $name;
        $gradeInsert = $grade;
        $classInsert = $class;
        $teacherInsert = $teacher;
        $periodInsert = $period;
        $timeInsert = date("m/d/Y H:i A");

        // Execute statement
        $stmt->execute();

        echo "Success";

    } catch(PDOException $e) {
        echo "Error";
    }

    // Close connection to DB
    $conn = null;
} else {
    echo "Issue";
}

?>