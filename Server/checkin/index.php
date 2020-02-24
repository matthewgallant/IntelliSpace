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

        <br />

        <div style="text-align: center;">
            <h3><?php echo $system_name; ?></h3>
        </div>

        <br />

        <ul class="nav nav-tabs justify-content-center" id="navTabs" role="tablist">

            <?php

                // Get available pages into an array
                $system_pages = explode(", ", $system_pages);

            ?>

            <?php if (in_array("students", $system_pages)): ?>
                <li class="nav-item">
                    <a class="nav-link active" id="students-tab" data-toggle="tab" href="#students" role="tab">Students</a>
                </li>
            <?php endif; ?>
            <?php if (in_array("classes", $system_pages)): ?>
                <li class="nav-item">
                    <a class="nav-link" id="classes-tab" data-toggle="tab" href="#classes" role="tab">Classes</a>
                </li>
            <?php endif; ?>
            <?php if (in_array("tools", $system_pages)): ?>
                <li class="nav-item">
                    <a class="nav-link" id="tools-tab" data-toggle="tab" href="#tools" role="tab">Tools</a>
                </li>
            <?php endif; ?>

        </ul>

        <br />

        <!-- Main Content -->
        <div class="container">
            <div class="tab-content" id="navTabsContent">
                <div class="tab-pane fade show active" id="students" role="tabpanel"><?php include_once("students.php"); ?></div>
                <div class="tab-pane fade" id="classes" role="tabpanel"><?php include_once("classes.php"); ?></div>
                <div class="tab-pane fade" id="tools" role="tabpanel"><?php include_once("tools.php"); ?></div>
            </div>
        </div>

        <br />

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
                            <img src="../admin/resources/gallant-media.png" class="img-fluid" alt="Gallant Media Logo">
                        </div>
                        <div class="col-sm-9">
                            <h3><b>IntelliSpace SMT</b></h3>
                            <h6>Version <?php echo $system_version; ?></h6>
                            <h6>&copy <?php echo date("Y"); ?> <a href="https://gallantmedia.us" target="_BLANK">Gallant Media</a>. All rights reserved.</h6>
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

        <!-- Footer -->
        <div style="text-align: center;">
            <p><a data-toggle="modal" data-target="#copyrightModal">Powered by <b>IntelliSpace SMT</b></a></p>
        </div>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>