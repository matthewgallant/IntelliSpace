<?php include_once("resources/setupinfo.php"); ?>

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

        <br />

        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <div style="text-align: center;">
                        <h4>Student Check Ins</h4>
                        <br />
                        <button class="btn btn-block btn-primary" type="button" onclick="downloadSheet();">Download Spreadsheet</button>
                        <button class="btn btn-block btn-secondary" type="button" onclick="emailSheet();">Email Spreadsheet</button>
                        <br />
                        <small id="emailHelp" class="form-text text-muted">795 Total Entries Found</small>
                    </div>
                </div>
                <div class="col-sm-9">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Class</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Period</th>
                                <th scope="col">Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                // Set DB login info
                                $servername = "localhost";
                                $username = "root";
                                $password = "root";
                                $dbname = "unispace";

                                try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM students"); 
                                    $stmt->execute();
                                
                                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                                    $data = $stmt->fetchAll();

                                    foreach ($data as $student_data) {
                                        echo "<tr>";
                                        echo "<td>" . $student_data['name'] . "</td>";
                                        echo "<td>" . $student_data['grade'] . "</td>";
                                        echo "<td>" . $student_data['class'] . "</td>";
                                        echo "<td>" . $student_data['teacher'] . "</td>";
                                        echo "<td>" . $student_data['period'] . "</td>";
                                        echo "<td>" . $student_data['time'] . "</td>";
                                        echo "</tr>";
                                    }

                                }
                                catch(PDOException $e) {}

                                // Close connection to database
                                $conn = null;

                            ?>

                        </tbody>
                    </table>
                </div>

        </div>

        <br />

        <?php include_once("resources/footer.php"); ?>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>