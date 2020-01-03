<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $system_name; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./">Home</a>
            </li>

            <?php

            // Get available pages into an array
            $system_pages = explode(", ", $system_pages);

            ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Check Ins</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <?php if (in_array("students", $system_pages)): ?>
                        <a class="dropdown-item" href="students.php">Students</a>
                    <?php endif; ?>
                    <?php if (in_array("classes", $system_pages)): ?>
                        <a class="dropdown-item" href="classes.php">Classes</a>
                    <?php endif; ?>
                    <?php if (in_array("tools", $system_pages)): ?>
                        <a class="dropdown-item" href="tools.php">Tools</a>
                    <?php endif; ?>

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Management</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <?php if (in_array("tools", $system_pages)): ?>
                        <a class="dropdown-item" href="managetools.php">Manage Tools</a>
                    <?php endif; ?>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="settings.php">Software Preferences</a>

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>