
<?php ob_start(); ?>

<?php include "database/db.php"; ?>

<?php include "controller/ponuda.php"; ?>

<?php include "controller/users.php"; ?>

<?php include "controller/page.php"; ?>

<?php 

$page = new Page();

$user = new User();

if(isset($_POST["potvrdi"])){  

    $user->checkUser($_POST['username'], $_POST['password']);

}

//log in
//$user->logInUser();

//logout
// if(isset($_GET['logout'])){
//     $user->logOutUser();
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title><?php echo $page->pageName();?></title>

</head>

<body>
