<?php
session_start();
require 'authenticate.php'; // Uncomment Page will authenticate whether user is logged in
$windowTitle = "D&D Character Info - Create Group"; // Window title for each page, used inside header.php include.
$pageTitle = "Create Group"; // Page title goes here, used inside the nav.php include.

require 'resources/tools.php';
?>
    <!doctype html>
    <html lang="en">
<?php
include 'templates/header.php' // Header to handle css links and


?>

        <body>
            <div class="wrapper">
                <?php
                include 'templates/nav.php'; // Nav template

                // Content Start
                ?>
                <div class="container">
                    <form action="groupUpdate.php" method="post">
                        <fieldset>
                            <legend>Group up!</legend>


                            <input type="text" id="groupName" name="groupName" value="" placeholder="Group name">
                            <button type='button' id='createGroup'>Create Group</button>
                        </fieldset>
                    </form>
                </div>
                <?php
                // Content End
                ?>
            </div>
        <?php
        include "templates/js.php"; // Javascript script includes
        ?>
        </body>
    </html><?php
