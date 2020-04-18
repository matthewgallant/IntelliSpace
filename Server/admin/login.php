<?php include_once("resources/setupinfo.php"); ?>

<?php

session_start();

$generalErr = FALSE;
$emptyField = FALSE;
$wrongCreds = FALSE;

// Check if data has posted
if (isset($_POST['emailInput']) && isset($_POST['passwordInput'])) {

    // Check for blank inputs
    if (!empty($_POST['emailInput']) && !empty($_POST['passwordInput'])) {
        
        // Fields are filled, proceed with login attempt

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
            $stmt = $conn->prepare("SELECT * FROM logins WHERE email = :email");

            $stmt->bindParam(':email', $email);
            $email = $_POST['emailInput'];

            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $data = $stmt->fetchAll();

            if (!empty($data)) {

                // Parse data
                $password_hash = $data[0]['passwd'];
                $name = $data[0]['name'];

                // Check password input against database version
                if (password_verify($_POST['passwordInput'], $password_hash)) {
                    
                    // Password is valid, proceed with login

                    // Authentication session with token
                    $_SESSION['auth'] = TRUE;

                    // Proceed to home page
                    header("Location: index.php");

                } else {

                    // Incorrect password
                    $wrongCreds = TRUE;

                }

            } else {

                // Email not found in database
                $wrongCreds = TRUE;

            }

        }
        catch(PDOException $e) {
            $generalErr = TRUE;
        }

        // Close connection to database
        $conn = null;

    } else {

        // At least one empty field, show error
        $emptyField = TRUE;

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

        <!-- Copyright Modal -->
        <div class="modal fade" id="copyrightModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="copyrightModalLabel">About <b>IntelliSpace SMT</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="resources/gallant-media.png" class="img-fluid" alt="Gallant Media Logo">
                        </div>
                        <div class="col-sm-9">
                            <h3><b>IntelliSpace SMT</b></h3>
                            <h6>Version <?php echo $system_version; ?></h6>
                            <h6>&copy <?php echo date("Y"); ?> <a href="https://westernmaineweb.com" target="_BLANK">Western Maine Web</a>. All rights reserved.</h6>
                            <h6>Licensed to: <?php echo $system_name; ?></h6>
                        </div>
                    </div>
                    <br />
                    <b>Warning:</b> This software is protected by copyright law and international treaties. Unauthorized reproduction or distribution of this program, or any portion of it, may result in severe civil and criminal penalties, and will be prosecuted to the maximum extent possible under law.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <div class="container">
            <br />
            <div style="text-align: center;">
                <h1><?php echo $system_name; ?> <small>Login</small></h1>
            </div>
            <br />

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <?php if ($emptyField == TRUE): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Empty Fields:</strong> Please fill out all of the fields below.
                        </div>
                        <br />
                    <?php elseif ($generalErr == TRUE): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Database Error:</strong> There was an error contacting the database. Please try again later.
                        </div>
                        <br />
                    <?php elseif ($wrongCreds == TRUE): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Wrong Credentials:</strong> Incorrect or invalid credentials were entered. Please try again.
                        </div>
                        <br />
                    <?php elseif ($_GET['no_auth'] == "true"): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Login Required:</strong> A login is required to view the page requested.
                        </div>
                        <br />
                    <?php elseif ($_GET['logout'] == "true"): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Logout Completed:</strong> You have been logged out successfully.
                        </div>
                        <br />
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="emailInput">Email Address</label>
                                    <input type="email" class="form-control" id="emailInput" name="emailInput">
                                </div>
                                <div class="form-group">
                                    <label for="passwordInput">Password</label>
                                    <input type="password" class="form-control" id="passwordInput" name="passwordInput">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <div class="col">
                                        <p style="text-align: right; margin-top: 8px; color: green;"><i class="fas fa-lock"></i> &nbsp;Secure Login</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <br />
        </div>

        <?php include_once("resources/footer.php"); ?>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>