<?php

// Setup Time Zone
date_default_timezone_set("America/New_York"); 

// Setup variables
$teacher = "";
$class = "";
$period = "";
$description = "";
$time = "";
$error = FALSE;

// Check teacher
if (isset($_POST['teacherField'])) {
    if ($_POST['teacherField'] != "") {
        $teacher = $_POST['teacherField'];
    }
}

// Check class
if (isset($_POST['classField'])) {
    if ($_POST['classField'] != "") {
        $class = $_POST['classField'];
    }
}

// Check period
if (isset($_POST['periodSelect'])) {
    if ($_POST['periodSelect'] != "") {
        $period = $_POST['periodSelect'];
    }
}

// Check description
if (isset($_POST['descriptionArea'])) {
    if ($_POST['descriptionArea'] != "") {
        $description = $_POST['descriptionArea'];
    }
}

// Error checking
if ($teacher == "" || $class == "" || $period == "" || $description == "") {
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
        $stmt = $conn->prepare("INSERT INTO classes (teacher, class, period, description, time) VALUES (:teacher, :class, :period, :desc, :time)");
        
        // Prepare row
        $stmt->bindParam(':teacher', $teacherInsert);
        $stmt->bindParam(':class', $classInsert);
        $stmt->bindParam(':period', $periodInsert);
        $stmt->bindParam(':desc', $descInsert);
        $stmt->bindParam(':time', $timeInsert);

        // Insert row
        $teacherInsert = $teacher;
        $classInsert = $class;
        $periodInsert = $period;
        $descInsert = $description;
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