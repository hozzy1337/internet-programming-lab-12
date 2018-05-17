<?php
session_start();
 
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}
require __DIR__ . '/library.php';
$app = new DemoLib();

$app->DeleteUser($_SESSION['user_id']);
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="well">
            <h3>Account deleted succesfully</h3>
            <a href="index.php" class="btn btn-primary">Log in</a>
        </div>
    </div>
</body>
</html>
