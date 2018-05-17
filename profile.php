<?php
session_start();
 
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}
require __DIR__ . '/library.php';
$app = new DemoLib();
 
$user = $app->UserDetails($_SESSION['user_id']); 
 
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
            <h2>
                Profile
            </h2>
            <h3>Hello <?php echo $user->name ?>, this is your personal page, here you can manage your account</h3>
            <a href="logout.php" class="btn btn-primary">Logout</a><a href="delete.php" class="btn btn-danger">Delete</a><a href="update.php" class="btn btn-primary">Update</a>
			
        </div>
    </div>
</body>
</html>
