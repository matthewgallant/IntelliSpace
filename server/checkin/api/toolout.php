<?php

// Setup Time Zone
date_default_timezone_set("America/New_York"); 

// Setup variables
$name = "";
$tool = "";
$time = "";
$error = FALSE;

// Check name
if (isset($_POST['toolNameField'])) {
    if ($_POST['toolNameField'] != "") {
        $name = $_POST['toolNameField'];
    }
}

// Check tool
if (isset($_POST['toolOutIDField'])) {
    if ($_POST['toolOutIDField'] != "" && strlen($_POST['toolOutIDField']) == 6) {
        $tool = $_POST['toolOutIDField'];
    }
}

// Error checking
if ($name == "" || $tool == "") {
    $error = TRUE;
}

// Setup vars
$errors = FALSE;
$issues = FALSE;
$success = FALSE;

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
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tools WHERE asset = :asset"); 

        $stmt->bindParam(':asset', $assetInsert);

        $assetInsert = $tool;

        $stmt->execute();
    
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $data = $stmt->fetchAll();

        if (empty($data)) {
            $errors = TRUE;
        }

    }
    catch(PDOException $e) {
        $errors = TRUE;
    }

    // Close connection to database
    $conn = null;

    if ($errors == FALSE) {
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO toolout (name, asset, time) VALUES (:name, :asset, :time)");
            
            // Prepare row
            $stmt->bindParam(':name', $nameInsert);
            $stmt->bindParam(':asset', $assetInsert);
            $stmt->bindParam(':time', $timeInsert);

            // Insert row
            $nameInsert = $name;
            $assetInsert = $tool;
            $timeInsert = date("m/d/Y H:i A");

            // Execute statement
            $stmt->execute();

            $success = TRUE;

        } catch(PDOException $e) {
            $errors = TRUE;
        }

        // Close connection to DB
        $conn = null;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // prepare sql and bind parameters
            $stmt = $conn->prepare("UPDATE tools SET possesion = :poss WHERE asset = :asset");
            
            // Prepare row
            $stmt->bindParam(':poss', $possInsert);
            $stmt->bindParam(':asset', $assetInsert);
    
            // Insert row
            $possInsert = $name;
            $assetInsert = $tool;
    
            // Execute statement
            $stmt->execute();
    
            $success = TRUE;
    
        } catch(PDOException $e) {
            $errors = TRUE;
        }
    
        // Close connection to DB
        $conn = null;

    }
} else {
    $issues = TRUE;
}

if ($errors == TRUE) {
    echo "Error";
} else if ($issues == TRUE) {
    echo "Issue";
} else if ($success == TRUE) {
    echo "Success";
} else {
    echo "Error";
}

?>