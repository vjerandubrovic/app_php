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

<?php

// include object ponuda
$ponuda = new Ponuda();

// Get ponuda from db
$get = $ponuda->getPonuda();

// Delete ponuda from db
if(isset($_GET["delete"])){
    $delete = $ponuda->deletePonuda($_GET["delete"]);
}

// Clear table
if(isset($_GET["clear"])){   
    $clear = $ponuda->clearTable();
}

// Update table
if(isset($_POST["update"])){
    $update = $ponuda->updatePonuda($_POST["update"], $_POST);
} 

// Save table
if(isset($_GET["save"])){

    $ponuda_save = new Ponuda_save();

    $ponuda = new Ponuda();

    $ponuda->add_ponuda_id();

    $get = $ponuda->getPonuda();

    $get_id = $ponuda->get_last_ponude_id();

    foreach ($get_id as $k => $v) {

        foreach ($get as $key => $value) {

            $ponuda_save->add_Ponuda($v['MAX(id)'], $value['artikl'], $value['mat'], $value['usluga'], $value['kol'], $value['zbroj']);  
        
        }

    }

    $ponuda->clearTable();

}
?>

    <main>

        <div class="container">

            <div class="row">

                <div class="col-lg-12 bg-dark">

                    <table class="table table-dark">

                        <thead >

                            <tr>

                                <th>Naziv artikla:</th>
                                <th>Materijal:</th>
                                <th>Cijena usluge:</th>
                                <th>Kolicina:</th>
                                <th>Cijena:</th>
                                <th><a id="test" class="btn btn-light" href="ponude.php?clear">Clear Table</a></th>
                            
                            </tr>

                        </thead>

                        <tbody>

                         <?php $zbroj =0;
                         
                         foreach ($get as $key => $value) {
                         
                         echo "<tr><td id=$value[ponude_id]>$value[artikl]</td>";
                         echo "<td>$value[mat]</td>";
                         echo "<td>$value[usluga]</td>";
                         echo "<td>$value[kol]</td>";
                         echo "<td>$value[zbroj]</td>";
                         echo "<td><a class='btn btn-light' href='ponude.php?edit={$value['ponude_id']}#edit'>Edit</a>";
                         echo "<a class='btn btn-light ml-2' href='ponude.php?delete={$value['ponude_id']}'>Delete</a></td></tr>";
                        
                        $zbroj += $value['zbroj'];
                        
                        ?>   
                            
                        <?php } ?>  

                        <tr id="inputi">

                            <?php // Add ponuda to db
                                if(isset($_POST["submit"])){

                                    if(empty($_POST["artikl"]) || empty($_POST["mat"]) || empty($_POST["usluga"]) || empty($_POST["kol"])){
                                
                                        foreach ($_POST as $key => $value) {

                                            if($key == "artikl" && empty($value)){
                                                echo "<td class='text-warning font-italic'>*Unesi Naziv artikla!</td>";
                                            }else if($key == "artikl" && !empty($value)){
                                                echo "<td>$value</td>";
                                            }
                                            if($key == "mat" && empty($value)){
                                                echo "<td class='text-warning font-italic'>*Unesi Materijal!</td>";
                                            }else if($key == "mat" && !empty($value)){
                                                echo "<td>$value</td>";
                                            }
                                            if($key == "usluga" && empty($value)){
                                                echo "<td class='text-warning font-italic'>*Unesi Cijenu Usluge!</td>";
                                            }else if($key == "usluga" && !empty($value)){
                                                echo "<td>$value</td>";
                                            }
                                            if($key == "kol" && empty($value)){
                                                echo "<td class='text-warning font-italic'>*Unesi Kolicinu!</td>";
                                            }else if($key == "kol" && !empty($value)){
                                                echo "<td>$value</td>";
                                            }    
                                        }                               
                                    }else{
                                    $ponuda->addPonuda($_POST);
                                    }
                                }
                            ?>   

                        </tr>

                        <?php 
                        if(!isset($_GET["edit"])){
                            $ponuda->inputPonuda();
                        }

                        if(isset($_GET["edit"])){
                            $ponuda->inputUpdatePonuda($_GET["edit"]);
                        }

                        ?>

                        </tbody>

                        <tfoot>
                        
                            <?php echo "<tr><th>Ukupno:</th><td>$zbroj</td>";
                        
                            if(!isset($_GET["edit"])){

                            echo "<td><a class='btn btn-light' href='ponude.php?save'>Spremi ponudu</a></td></tr>";

                            }

                            ?>
                            
                        </tfoot>

                    </table>

                </div>

            </div>

        </div>

    </main>

<?php include "layouts/footer.php"; ?>