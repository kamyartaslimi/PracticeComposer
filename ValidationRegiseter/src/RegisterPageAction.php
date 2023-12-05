<?php require './../vendor/autoload.php';

use App\validation\UserValidation;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $UserValidation = UserValidation::StartValidation($_POST);
    if ($UserValidation->ActionResult()) {
        CreateLoginSession();
        $_SESSION['LoginStatus'] = true;
        header("Location: ./../index.php");
    } else {
        CreateRegisterSession();
        $_SESSION['Errors'] = $UserValidation->getErrors();
        $_SESSION['User'] = $UserValidation->getUser();
        header("Location: ./../Register.php");

    }
}