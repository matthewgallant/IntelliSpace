<?php include_once("resources/setupinfo.php"); ?>

<?php

// Setup variables
$name = "";
$asset = "";
$error = FALSE;
$success = FALSE;

// Check name
if (isset($_POST['toolNameField'])) {
    if ($_POST['toolNameField'] != "") {
        $name = $_POST['toolNameField'];
    } else {
        $error = TRUE;
    }
}

// Check grade
if (isset($_POST['assetNumberField'])) {
    if ($_POST['assetNumberField'] != "" && strlen($_POST['assetNumberField']) == 6) {

        // Set DB login info
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "unispace";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tools WHERE asset = :asset"); 

            // Prepare row
            $stmt->bindParam(':asset', $assetInsert);

            // Insert row
            $assetInsert = $_POST['assetNumberField'];

            $stmt->execute();
        
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $data = $stmt->fetchAll();

            if (empty($data)) {
                $asset = $_POST['assetNumberField'];
            } else {
                $error = TRUE;
            }

        }
        catch(PDOException $e) {
            $error = TRUE;
        }

        // Close connection to database
        $conn = null;

    } else {
        $error = TRUE;
    }
}

// Submit info to DB
if ($error == FALSE) {

    // Set DB login info
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "unispace";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO tools (name, asset) VALUES (:name, :asset)");
        
        // Prepare row
        $stmt->bindParam(':name', $nameInsert);
        $stmt->bindParam(':asset', $assetInsert);

        // Insert row
        $nameInsert = $name;
        $assetInsert = $asset;

        // Execute statement
        $stmt->execute();

        $success = TRUE;

    } catch(PDOException $e) {
        //$error = TRUE;
    }

    // Close connection to DB
    $conn = null;
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

        <br />

        <div class="container">

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <br />
                        <?php if ($error == TRUE): ?>
                            <div class="alert alert-danger" role="alert">
                                An error occured. Please try again later. <a href="managetools.php">Go back to manage tools page</a>
                            </div>
                        <?php elseif ($success == TRUE): ?>
                            <div class="alert alert-success" role="alert">
                                The tool has been successfully added. <a href="managetools.php">Go back to manage tools page</a>
                            </div>
                        <?php endif; ?>
                    <br />
                    <div style="text-align: center;">
                        <h4>Add A Tool</h4>
                    </div>
                    <br />
                    <form action="addtool.php" method="POST">
                        <div class="form-group">
                            <label for="toolNameField">Tool Name</label>
                            <input type="text" class="form-control" id="toolNameField" name="toolNameField" placeholder="Ex: Dremel Kit">
                        </div>
                        <div class="form-group">
                            <label for="assetNumberField">Asset #</label>
                            <input type="text" class="form-control" id="assetNumberField" name="assetNumberField" placeholder="Ex: 111222">
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary">Add Tool</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
                
        </div>

        <br />

        <?php include_once("resources/footer.php"); ?>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>

            function downloadCSV(csv, filename) {
                var csvFile;
                var downloadLink;
                // CSV file
                csvFile = new Blob([csv], {type: "text/csv"});
                // Download link
                downloadLink = document.createElement("a");
                // File name
                downloadLink.download = filename;
                // Create a link to the file
                downloadLink.href = window.URL.createObjectURL(csvFile);
                // Hide download link
                downloadLink.style.display = "none";
                // Add the link to DOM
                document.body.appendChild(downloadLink);
                // Click download link
                downloadLink.click();
            }

            function downloadSheet() {
                var csv = [];
                var rows = document.querySelectorAll("table tr");
                
                for (var i = 0; i < rows.length; i++) {
                    var row = [], cols = rows[i].querySelectorAll("td, th");
                    
                    for (var j = 0; j < cols.length; j++) 
                        row.push(cols[j].innerText);
                    
                    csv.push(row.join(","));        
                }
                // Download CSV file
                downloadCSV(csv.join("\n"), "toolsout.csv");
            }

        </script>
    </body>
</html>