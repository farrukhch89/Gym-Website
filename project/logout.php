
<?php
session_start();
$ending = "Successfully logout";
session_destroy();
require('index.php');

?>

