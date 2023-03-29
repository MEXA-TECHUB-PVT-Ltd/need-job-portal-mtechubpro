
<?php
session_start();

include('include/db.php');


session_unset();





if (session_destroy()) {
    header('location:login.php');
}



?>