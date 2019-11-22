<html>

<?php

  include 'top.php';

?>

<head>
  <title>Site de Criptografia</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>

<body>


<div>

<img src="images/header2.jpeg" class="header">

</div>

<div>
    <?php
    //include 'autenticacao.php';


    if (!isset($_SESSION['email'])) {
      $_SESSION['msg'] = "You must log in first";

      echo "
      
      
  <div class='row'>
      <div class='col s8 offset-s2'>
        <div class='card-panel blue-grey center-align'>
          <span class='white-text'>Entra na tua conta para ver os preços dos produtos.</span>
        </div>
      </div>
  </div>


      
      
      
      ";
    }

    if (isset($_SESSION['email'])){
      echo "
      
      <div class='row'>
      <div class='col s8 offset-s2'>
        <div class='card-panel blue-grey center-align'>
          <span class='white-text'> Bem-vindo " .$_SESSION['email']. "</span>
        </div>
      </div>
  </div>
      
      ";


    }
    


    ?>
</div>

    <div class="container">    
        <div class="row grey-light">
            <div class="col s3 center-align"><p><img class="materialboxed center-align" width="200" src="https://d36djlzg0xu24k.cloudfront.net/media/catalog/product/cache/90fd8fb282068e019a2820c65f8ccd15/W/D/WD10EZEX.jpg"></p></div>
            <div class="col s3 center-align"><img class="materialboxed center-align" width="200" src="https://d36djlzg0xu24k.cloudfront.net/media/catalog/product/cache/90fd8fb282068e019a2820c65f8ccd15/Y/D/YD2600BBAFBOX_1_1.jpg"></div>
            <div class="col s3 center-align"><img class="materialboxed " width="200" src="https://d36djlzg0xu24k.cloudfront.net/media/catalog/product/cache/90fd8fb282068e019a2820c65f8ccd15/S/A/SA400S37_2F240G.jpg"></div>
            <div class="col s3 center-align"><img class="materialboxed center-align" width="200" src="https://d36djlzg0xu24k.cloudfront.net/media/catalog/product/cache/90fd8fb282068e019a2820c65f8ccd15/M/I/MIBAND4_1.jpg"></div>
          </div>


        <?php
          if(isset($_SESSION['email'])){
             echo " 
             <div class='row grey'>
                <div class='col s3 center-align'><p class='white-text'>25.00€</p></div>
                <div class='col s3 center-align'><p class='white-text'>25.00€</p></div>
                <div class='col s3 center-align'><p class='white-text'>25.00€</p></div>
                <div class='col s3 center-align'><p class='white-text'>25.00€</p></div>
              </div>
              ";
            }else

            echo "
            
            <div class='row grey'>
                <div class='col s3 center-align'><p class='white-text'>--€</p></div>
                <div class='col s3 center-align'><p class='white-text'>--€</p></div>
                <div class='col s3 center-align'><p class='white-text'>--€</p></div>
                <div class='col s3 center-align'><p class='white-text'>--€</p></div>
              </div>
            
            ";
         ?>
  </div>

</body>



</html>
