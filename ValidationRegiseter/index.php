<?php require './vendor/autoload.php';
CreateLoginSession();
$SessionExist = isset($_SESSION['LoginStatus']);
if ($SessionExist) {
    if ($_SESSION['LoginStatus'] === true) {
        echo 'You Are Register Successfully';
    } else {
        header("Location:Register.php");
    }
}
else {
    header("Location:Register.php");
}