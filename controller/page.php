<?php 

Class Page{

    private $pageName;

    function __construct(){
        $pageName = basename($_SERVER['PHP_SELF']);
        if($pageName != "index.php"){
        $pageName = explode(".", $pageName);
        $this->pageName = $pageName[0];
        }else{
            $this->pageName = "application";
        }
    }

    function pageName(){
        return $this->pageName;
    }

    function pageLinks(){
        if($this->pageName =="ponude" || $this->pageName == "show_ponude"){
            echo "
            <li class='navbar-item text-center'>

                <a href='home.php' class='nav-link'>Home</a>

            </li>

            <li class='navbar-item text-center'>

                <a href='ponude.php' class='nav-link'>Izrada Ponude</a>

            </li>

            <li class='navbar-item text-center'>

                <a href='show_ponude.php' class='nav-link'>Ponude</a>

            </li>
            <li class='navbar-item text-center'>

                <a href='$this->pageName.php?logout' class='nav-link'>Log Out</a>
    
            </li>";

        }else if($this->pageName =="home"){
            echo "
            <li class='navbar-item text-center'>

                <a href='home.php' class='nav-link'>Home</a>

            </li>
            <li class='navbar-item text-center'>

                <a href='$this->pageName.php?logout' class='nav-link'>Log Out</a>
    
            </li>";

        }
    }
}

?>