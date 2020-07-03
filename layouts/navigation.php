

<!-- NAVBAR START-->
    
<nav class="navbar navbar-expand-sm bg-dark fixed-top">

<div class="container">

    <!-- logo START -->

    <a href=""><img src="img/Logo black.png" class="navbar-brand"></a>

    <!-- logo END -->

    <!-- hamburger  START -->

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        
            <i class="fas fa-bars"></i>

    </button>

    <!-- hamburger  END -->

    <!-- nav list START -->

    <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav ml-auto">

            <!-- nav links START -->

            <?php 
            
           $page->pageLinks();
            
            
            ?>

            <!-- nav links END -->
        
        </ul>

    </div>

    <!-- nav list END -->

</div>

</nav>

<!-- NAVBAR END-->



<!-- HEADER START -->

<header id="header">

    <div class="container"> 
        
        <div class="row bg-dark">
            
            <div class="col-md-3">
            
                <img src="" alt="">
            
            </div>

            <div class="col-md-3 offset-6">

                <ul class="list-unstyled text-white">
                
                    <li>Naziv: xxxx</li>
                    <li>Ulica: Ulica xx</li>
                    <li>Mob: xx xxxxxxxxx</li>
                    <li>IBAN: xxxxxxxxxxx</li>
                    <li>SWIFT: xxxxxxxxx</li>
                    <li>MB: xxxxxxxxxx</li>
                    <li>OIB: xxxxxxxxxx</li>

                </ul>

            </div>
        
        </div>
        
    </div>

</header>