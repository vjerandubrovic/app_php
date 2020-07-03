<?php include "layouts/header.php"; ?>

<?php 

//check logIn
$user->logInUser(); 

//logout
if(isset($_GET['logout'])){
    $user->logOutUser();
}

?>

<?php include "layouts/navigation.php"; ?>

<main>

    <div class="container">

        <div class="row">

            <div class="col-12 bg-dark p-5">

                <h4 class="text-light">WELCOME <em><strong><?php echo $_SESSION['name']; ?></strong></em>!</h4>
            
            </div>

        </div>

        <div class="row bg-dark">

            <div class="col-3 text-center">

                    <a class="btn btn-light" href="ponude.php">Ponude</a>

            </div>

            <div class="col-3 text-center">

                <a class="btn btn-light" href="ponude.php">Otpremnice</a>

            </div>

            <div class="col-3 text-center">

                <a class="btn btn-light" href="ponude.php">Kontakt</a>

            </div>

            <div class="col-3 text-center">

                <a class="btn btn-light" href="ponude.php">Račun</a>

            </div>

        </div>
    
    </div>


</main>


<?php include "layouts/footer.php"; ?>