<?php include "layouts/header.php"; ?>

<?php include "layouts/navigation.php"; ?>

<main>

        <div class="container">

            <div class="main row bg-dark">

                <div class="col-lg-6 offset-3 ">

                    <form action="index.php" method="POST">

                        <div class="form-group">

                            <label class="text-white" for="username">Username:</label>

                            <input class="form-control w-75" type="text" name="username">

                            <label class="text-white" for="password">Password:</label>

                            <input class="form-control w-75" type="password" name="password">

                        </div>

                        <input class="btn btn-light" type="submit" name="potvrdi" value="Potvrdi">

                        <input class="btn btn-light" type="reset" value="Poništi">

                    </form>

                </div>

            </div>

        </div>

</main>

<?php include "layouts/footer.php"; ?>