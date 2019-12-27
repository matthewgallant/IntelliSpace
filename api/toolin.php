<?php

// Setup Time Zone
date_default_timezone_set("America/New_York"); 

// Setup variables
$tool = "";
$time = "";
$error = FALSE;

// Check tool
if (isset($_POST['toolInIDField'])) {
    if ($_POST['toolInIDField'] != "" && strlen($_POST['toolInIDField']) == 6) {
        $tool = $_POST['toolInIDField'];
    }
}

// Error checking
if ($tool == "") {
    $error = TRUE;
}

// Setup vars
$errors = FALSE;
$issues = FALSE;
$success = FALSE;

// Submit info to DB
if ($error == FALSE) {

    // Set DB login info
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "unispace";

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
            $stmt = $conn->prepare("UPDATE tools SET possesion = NULL WHERE asset = :asset");
            
            // Prepare row
            $stmt->bindParam(':asset', $assetInsert);
    
            // Insert row
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