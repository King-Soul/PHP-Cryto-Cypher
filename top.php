

<style>
<?php 
// 'css/menu.css';
include 'autenticacao.php';
?>
</style>    
    
<nav class="grey darken-4">
    <div class="nav-wrapper">
        <ul class="right hide-on-med-and-down">
            <?php

                if(isset($_SESSION['email']))
                {
                    echo "<li><a href='logout.php' name='logout'>Terminar Sessão</a></li>";

                    
                }else
                {
                    echo "<li><a href='login.php' name='logout'>Iniciar Sessão</a></li>";
                    echo "<li><a href='register.php' name='registo'>Registar</a></li>";
                }
            ?>
        </ul>
    </div>


    
</nav>