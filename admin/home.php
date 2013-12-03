<?php 
include('header.php');
include('session.php');
?>





<div class="card">


    <h2 class="card-heading simple">
        <span aria-hidden="true" class="icon-filter-2"></span> Already registred visitor
    </h2>

    <div class="card-body">


        <?php 
        if (isset($_GET["p"])){
            $page=$_GET["p"];
            switch ($page) {
                case 'visitors':
                include('visitors.php');
                break;
                
                case 'users':
                include('users.php');

                break;
                default:
                echo "Hello Admin";
                break;
            }
        }
        ?>
        <?php
        ?>





    </div>
</div>
<?php 
include('modal.php');
?>	
</div>
</body>
</html>