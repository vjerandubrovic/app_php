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

$ponude = new Ponuda_save(); 

$select = $ponude->show_Ponude();

?>

<main>

    <div class="container">
    
        <div class="row">
        
            <div class="col-lg-12 bg-dark">
            
                <form id="form1" action="show_ponude.php" method="POST">

                    <div class="form-group row">

                        <label for="show_ponuda" class="col-sm-1 col-form-label text-white">Ponuda:</label>

                        <div class="col-sm-4">
                        
                        <select class="form-control row" name="show_ponuda">

                           <?php foreach ($select as $selectkey => $selectvalue){ ?>

                           <option value=<?php echo "$selectvalue[Tables_in_ponude]"; ?> <?php if(isset($_POST['submit']))if($_POST['show_ponuda'] == $selectvalue['Tables_in_ponude'])echo "selected" ?> ><?php echo "$selectvalue[Tables_in_ponude]"; ?></option>

                           <?php } ?>
                        
                        </select>
                        
                        </div>

                        <div class="form-group row">
                
                            <div class="col-sm-4">

                                <button id="prikazi" class="btn btn-light" type="submit" name="submit" value="Prikazi">Prikazi</button>

                            </div>
                            
                        </div>

                    </div>

                </form>
            
            </div>

            <div class="col-lg-12 bg-dark">

                <table class="table table-dark">

                    <thead >

                        <tr>

                            <th>Naziv artikla:</th>
                            <th>Materijal:</th>
                            <th>Cijena usluge:</th>
                            <th>Kolicina:</th>
                            <th>Cijena:</th>
                                
                        </tr>

                    </thead>

                    <tbody>

                        <?php 
        
                            if(isset($_POST['submit'])){

                                $show = $ponude->get_Ponuda($_POST['show_ponuda']);
                        
                                $zbroj = 0;
                      
                                foreach($show as $showkey => $showvalue) {

                                echo "<tr><td>$showvalue[artikl]</td>";
                                echo "<td>$showvalue[mat]</td>";
                                echo "<td>$showvalue[usluga]</td>";
                                echo "<td>$showvalue[kol]</td>";
                                echo "<td>$showvalue[zbroj]</td></tr>";

                                $zbroj += $showvalue['zbroj'];

                                }

                                echo "<tr><th>Ukupno:</th><td>$zbroj</td>";
                            }
                            ?>   
                                
                    </tbody>

                    <tfoot>
                                
                    </tfoot>

                </table>

            </div>

        </div>
     
    </div>

</main>

<?php include "layouts/footer.php"; ?>