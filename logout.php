<?php
include_once 'dbh.php';
session_unset();
session_destroy();
//echo $_SESSION["uid"]."dbh<br>";
header("Location: ../login.php");

?>