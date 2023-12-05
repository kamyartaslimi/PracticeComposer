<?php require 'vendor/autoload.php';
CreateRegisterSession();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<form method="post" action="/src/RegisterPageAction.php">
    <label for="RNameInput"> Name <input id="RNameInput" name="Name" value="<?= $_SESSION['User']?->Name ?? null  ?>"></label>
    <?php echo $_SESSION['Errors']['Name'] ?? null ;  ?><br>
    <label for="RUsernameInput"> Username <input id="RUsernameInput" name="Username" value="<?= $_SESSION['User']?->Username  ?? null ?>"></label>
    <?php echo $_SESSION['Errors']['Username'] ?? null;  ?><br>
    <label for="REmailInput"> Email <input id="REmailInput" name="Email" value="<?= $_SESSION['User']?->Email ?? null ?>"></label>
    <?php echo $_SESSION['Errors']['Email'] ?? null;  ?><br>
    <label for="RPhoneNumberInput"> PhoneNumber <input id="RPhoneNumberInput" name="PhoneNumber" value="<?= $_SESSION['User']?->PhoneNumber ?? null ?>"></label>
    <?php echo $_SESSION['Errors']['PhoneNumber'] ?? null;  ?><br>
    <label for="RPasswordInput"> Password <input id="RPasswordInput" name="Password" value="<?= $_SESSION['User']?->Password ?? null  ?>"></label>
    <?php echo $_SESSION['Errors']['Password'] ?? null;  ?><br>
    <button type="submit">Register</button>
</form>
</body>
</html>

<?php unset($_SESSION['Errors'] , $_SESSION['User']) ?>