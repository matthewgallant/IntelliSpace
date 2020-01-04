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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $system_name; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
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

                    <a class="dropdown-item" href="admins.php">Manage Administrators</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="settings.php">Software Preferences</a>

                </div>
            </li>

            <li class="nav-item">
                <a type="button" class="nav-link" data-toggle="modal" data-target="#copyrightModal">About</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>