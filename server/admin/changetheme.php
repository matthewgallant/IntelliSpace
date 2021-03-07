<?php include_once("resources/setupinfo.php"); ?>

<?php

// Setup variables
$theme = "";
$error = FALSE;

// Check name
if (isset($_POST['themeRadio'])) {
    if ($_POST['themeRadio'] != "") {

        $theme = $_POST['themeRadio'];

        // Load database login
        $db_login = parse_ini_file("../../database.conf");

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
            $stmt = $conn->prepare("UPDATE setup SET system_theme = :system_theme WHERE id = 1");
            
            // Prepare row
            $stmt->bindParam(':system_theme', $themeInsert);

            // Insert row
            $themeInsert = $theme;

            // Execute statement
            $stmt->execute();

            $success = TRUE;

        } catch(PDOException $e) {
            //$error = TRUE;
        }

        // Close connection to DB
        $conn = null;
    } else {
        $error = TRUE;
    }

    if ($error == FALSE) {
        header("Location: changetheme.php");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>

        <!-- CSS -->
        <?php if ($system_theme == "dark"): ?>
            <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha384-rCA2D+D9QXuP2TomtQwd+uP50EHjpafN+wruul0sXZzX/Da7Txn4tB9aLMZV4DZm" crossorigin="anonymous">
        <?php else: ?>
            <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-yrfSO0DBjS56u5M+SjWTyAHujrkiYVtRYh2dtB3yLQtUz3bodOeialO59u5lUCFF" crossorigin="anonymous">
        <?php endif; ?>
        
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/369f05b1b5.js" crossorigin="anonymous"></script>

        <!-- Other Meta -->
        <title><?php echo $system_name; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>

        <?php include_once("resources/navigation.php"); ?>

        <?php if ($error == TRUE): ?>
            <p>Error</p>
        <?php endif; ?>

        <br />

            <div style="text-align: center;">
                <h3>Change Theme</h3>
                <br />
                <form action="changetheme.php" method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="themeRadio" id="lightRadio" value="light" <?php if ($system_theme == "light") { echo "checked"; } ?>>
                        <label class="form-check-label" for="lightRadio">
                            Light Theme
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="themeRadio" id="darkRadio" value="dark" <?php if ($system_theme == "dark") { echo "checked"; } ?>>
                        <label class="form-check-label" for="darkRadio">
                            Dark Theme
                        </label>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary">Change Theme</button>
                </form>
            </div>

        <br />

        <?php include_once("resources/footer.php"); ?>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>