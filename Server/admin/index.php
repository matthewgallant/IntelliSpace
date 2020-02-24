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

        <div style="text-align: center;">
            <h3>Welcome, Person</h3>
            <br />
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <a href="students.php" class="btn btn-primary btn-block"><br /><i class="fas fa-school fa-10x"></i><br /><br />Student Check Ins<br /><br /></a>
                    <br /><br />
                </div>
                <div class="col-sm-3">
                    <a href="classes.php" class="btn btn-primary btn-block"><br /><i class="fas fa-user-friends fa-10x"></i><br /><br />Class Check Ins<br /><br /></a>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <a href="tools.php" class="btn btn-primary btn-block"><br /><i class="fas fa-hammer fa-10x"></i><br /><br />Tool Check Outs<br /><br /></a>
                    <br /><br />
                </div>
                <div class="col-sm-3">
                    <a href="managetools.php" class="btn btn-primary btn-block"><br /><i class="fas fa-hand-paper fa-10x"></i><br /><br />Manage Tools<br /><br /></a>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>

        <?php include_once("resources/footer.php"); ?>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>