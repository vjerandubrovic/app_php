<?php 

require_once("database/db.php");

class Ponuda{

    private $db;
    private $table = "template_ponuda";
    private $table1;

    function __construct(){
        $this->db = new Database();
    }

    function getPonuda(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    function getPonudaById($id){
        $this->db->query("SELECT * FROM $this->table WHERE ponude_id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    function inputPonuda(){
        echo "<form id='form1' action='ponude.php' method='POST'>

                        <tr>
                            <td>
                                <input type='text' name='artikl' class='rounded'>
                            </td>
                            
                            <td>
                                <input type='text' name='mat' class='rounded'>
                            </td>

                            <td>
                                <input type='number' name='usluga' class='rounded' step='any'>
                            </td>

                            <td>
                                <input type='number' name='kol' class='rounded'>
                            </td>

                            <td>
                                <p>--------</p>
                            </td>

                            <td>
                                <button class='btn btn-light' type='submit' name='submit' value='Potvrdi'>Potvrdi</button>
                                <input id='reset' class='btn btn-light' type='reset' value='Resetiraj'>
                            </td>

                        </tr>

                        </form>";
    }

    function addPonuda($data){
        $this->db->query("INSERT INTO $this->table (artikl, mat, usluga, kol, zbroj) VALUES(:artikl, :mat , :usluga, :kol, :izracun)");
        $this->db->bind(":artikl", $data["artikl"]);
        $this->db->bind(":mat", $data["mat"]);
        $this->db->bind(":usluga", $data["usluga"]);
        $this->db->bind(":kol", $data["kol"]);
        $this->db->bind(":izracun", $data["usluga"] * $data["kol"]);
        if($this->db->execute()){
            header("Location: ponude.php#inputi");
            return true;
        }else{
            return false;
        }
    }

    function inputUpdatePonuda($id){

        $getById = $this->getPonudaById($id);

        echo "<form action='ponude.php' method='POST'>

        <tr>
            <td>
                <input type='text' name='artikl' class='rounded' value='$getById[artikl]'>
            </td>
            
            <td>
                <input type='text' name='mat' class='rounded' value='$getById[mat]'>
            </td>

            <td>
                <input type='number' name='usluga' class='rounded' step='any' value='$getById[usluga]'>
            </td>

            <td>
                <input type='number' name='kol' class='rounded' value='$getById[kol]'>
            </td>

            <td>
                <p>$getById[zbroj]</p>
            </td>

            <td>
                <button class='btn btn-light' type='submit' name='update' value='$getById[ponude_id]'>Update</button>
            </td>

        </tr>

        </form>";

    }

    function updatePonuda($id, $data){
        $this->db->query("UPDATE $this->table SET artikl = :artikl, mat = :mat, usluga = :usluga, kol = :kol, zbroj = :izracun WHERE ponude_id = :id");       
        $this->db->bind(":id", $id);
        $this->db->bind(":artikl", $data["artikl"]);
        $this->db->bind(":mat", $data["mat"]);
        $this->db->bind(":usluga", $data["usluga"]);
        $this->db->bind(":kol", $data["kol"]);
        $this->db->bind(":izracun", $data["usluga"] * $data["kol"]);
        if($this->db->execute()){
            $this->returnToPrevious($id);
            return true;
        }else{
            return false;
        }

    }

    function deletePonuda($id){
        $this->db->query("DELETE FROM $this->table WHERE ponude_id = :id");
        $this->db->bind(":id", $id);
        if($this->db->execute()){            
            $this->returnToPrevious($id);
            return true;           
        }else{
            return false;
        }        
    }

    function returnToPrevious($id){
        $this->db->query("SELECT ponude_id FROM $this->table WHERE ponude_id = (SELECT MAX(ponude_id) FROM $this->table WHERE ponude_id < $id)");
        $get_previous_id = $this->db->single();;
        $previous_id = $get_previous_id["ponude_id"];
        header("Location: ponude.php#$previous_id");
    }

    function clearTable(){
        $this->db->query("TRUNCATE TABLE $this->table");
        $this->db->execute();
        header("Location: ponude.php");
    }

    function add_ponuda_id(){
        $this->table1 = "ponude";
        $this->db->query("INSERT INTO $this->table1 (naziv) VALUES('ponuda')");
        $this->db->execute();
    }

    function get_last_ponude_id(){ 
        $this->db->query("SELECT MAX(id) FROM $this->table1");
        return $this->db->resultSet();
    }
}

class Ponuda_save extends Ponuda{
    function __construct(){
        $this->db = new Database1();
        $this->table = "ponuda";
    }

    function add_Ponuda($ponuda_id, $artikl, $mat, $usluga, $kol, $zbroj){
        $this->db->query("CREATE TABLE IF NOT EXISTS `$this->table$ponuda_id` (
            `ponuda_id` int(11) NOT NULL,
            `artikl` varchar(50) COLLATE utf8_croatian_ci DEFAULT NULL,
            `mat` varchar(50) COLLATE utf8_croatian_ci DEFAULT NULL,
            `usluga` float DEFAULT NULL,
            `kol` int(11) DEFAULT NULL,
            `zbroj` float NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;");      
        $this->db->execute();
        $this->db->query("INSERT INTO $this->table$ponuda_id (artikl, mat, usluga, kol, zbroj) VALUES('$artikl', '$mat', $usluga, $kol, $zbroj)");
        $this->db->execute();
    }

    function get_Ponuda($table){
        $this->db->query("SELECT * FROM `$table`");
        return $this->db->resultSet();
    }

    function show_Ponude(){
        $this->db->query("SHOW TABLES");
        return $this->db->resultSet();
    }
}

?>



