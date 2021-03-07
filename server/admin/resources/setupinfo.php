<?php

    // Load database login
    $db_login = parse_ini_file("../../database.conf");

    // Set DB login info
    $servername = $db_login['server'];
    $username = $db_login['user'];
    $password = $db_login['pass'];
    $dbname = $db_login['table'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM setup WHERE id = 1"); 
        $stmt->execute();
    
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $data = $stmt->fetchAll();

        $system_name = $data[0]['system_name'];
        $system_theme = $data[0]['system_theme'];
        $system_pages = $data[0]['system_pages'];
        $system_version = $data[0]['system_version'];

    }
    catch(PDOException $e) {}

    // Close connection to database
    $conn = null;

    // Verify session details
    if ($_SERVER['PHP_SELF'] != "/admin/login.php") {

        session_start();

        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth'] != TRUE) {

                // Auth token incorrect
                header("Location: login.php?no_auth=true");

            }
        } else {

            // Auth token not set
            header("Location: login.php?no_auth=true");

        }
    }

?>