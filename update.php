<?php
session_start();
 
require __DIR__ . '/library.php';
$app = new DemoLib();
 
$update_error_message = '';


if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $update_error_message = 'Name field is required!';
    } else if ($_POST['password'] == "") {
        $update_error_message = 'Password field is required!';
    } else {
        $app->UpdateUser($_SESSION['user_id'], $_POST['name'], $_POST['password']);
        header("Location: profile.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update user info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
                Update form
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 well">
            <h4>Update user data</h4>
            <?php
            if ($update_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $update_error_message . '</div>';
            }
            ?>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>	
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnRegister" class="btn btn-primary" value="Update"/>
                </div>
            </form>
        </div>
		</body>
</html>