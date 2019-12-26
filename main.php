<!DOCTYPE html>
<html>
    <head>

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/369f05b1b5.js" crossorigin="anonymous"></script>

        <!-- Other Meta -->
        <title>IntelliSpace SMT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>

        <br />

        <div style="text-align: center;">
            <h3><b>Mt. Blue</b> Success & Innovation Center</h3>
        </div>

        <br />

        <ul class="nav nav-tabs justify-content-center" id="navTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="students-tab" data-toggle="tab" href="#students" role="tab">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="classes-tab" data-toggle="tab" href="#classes" role="tab">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tools-tab" data-toggle="tab" href="#tools" role="tab">Tools</a>
            </li>
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

        <!-- Footer -->
        <div style="text-align: center;">
            <p>&copy <?php echo date("Y"); ?> <a href="https://gallantmedia.us" target="_BLANK">Gallant Media</a>. All Rights Reserved.</p>
        </div>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>