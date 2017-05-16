<?php 
if (isset($_GET['id']) && isset($_GET['url'])) {
    $id = $_GET['id'];
    $url = $_GET['url'];
}else{
    exit("Connection error, Check your network connection");
}

include ("php/db.php");

$result3 = mysql_query("SELECT * FROM user WHERE urlcomp='$url'",$db);

$roww = mysql_fetch_assoc($result3);

$namecomp = $roww['namecomp'];

$productq = mysql_query("SELECT * FROM products WHERE id=$id",$db);

$product = mysql_fetch_assoc($productq);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $product['nameprod']; ?></title>

    <meta name="robots" content="noindex" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <meta name="viewport" content="width=device-width">
            <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/general.css">
        <link rel="stylesheet" type="text/css" href="css/public.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/agent/font-awesome.min.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="css/agent/agency.css"> -->
        <link rel="stylesheet" type="text/css" href="css/slideme.css">
        <link href="css/jqcart.css" rel="stylesheet" type="text/css">
        <script src="js/jqcart.js"></script>
        <script>
          $(function(){
            'use strict';
            // инициализация плагина
            $.jqCart({
                buttons: '.add_item',
                handler: './php/handler.php',
                cartLabel: '.label-place',
                currency: 'тг.'
            }); 
            // Пример с дополнительными методами
            $('#open').click(function(){
              $.jqCart('openCart'); // открыть корзину
            });
            $('#clear').click(function(){
              $.jqCart('clearCart'); // очистить корзину
            });
          });
        </script>
        <style type="text/css">
        
            #wrapper {
                width: 50%;
                margin: 10px;
            }
            #label-place {
                margin: 10px 0;
            }
            .item_box {
                border: 1px solid #999;
                margin-bottom: 10px;
                padding: 5px;
            }
            .item_box::after {
              content:'';
              display: table;
              clear: left;
            }
            .item_box > img {
              float: left;
            }
            .shopping_list {
                width: 100%;
                margin-top: 10px;
                border-collapse: collapse;
            }
            .shopping_list td, .shopping_list th {
                padding: 10px;
                border: 1px solid #AAAAAA;
            }
        </style>
</head>

<body>
    
    <nav class="navbar navbar-default navbar-fixed-top navbar-best">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand"><?php echo $namecomp; ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категория<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <?php

                        $result3 = mysql_query ("SELECT * FROM razdel WHERE namecomp='$namecomp'", $db);

                            while ($row = mysql_fetch_assoc($result3))
                        {?>   
                        <li><a href="#<?php echo $row['razdel']; ?>"><?php echo $row['razdel']; ?></a></li>
                            
                        <?php
                            }
                        ?>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>
                    <li><p class="navbar-text">Контактные данные <?php echo $roww['tele']; ?></p></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    
                    <li><div class="label-place"></div></li>
                    <li>
                        <a href="public.php?url=<?php echo $url; ?>" >Назад</a>
                    </li>
                  </ul>
                </div>
              </div>
    </nav>
    <br>

    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $product['nameprod']; ?>
                    <small><?php echo $product['opis']; ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <?php
                if ( $product['filename'] != 1) {
                    $existFoto = TRUE;
                    echo "<img style='margin: auto' class = 'img-responsive' src='".$product['filename']."' alt=''>";
                }else{
                    $existFoto = FALSE;
                    echo "<img style='margin: auto' class = 'img-responsive' src='img/empty-hight.jpg' alt='Без фото'>";
                }
                ?>
            </div>

            <div class="col-md-4">
                <h3 style="color: #333">Полное описание товара</h3>
                <p><?php echo $product['opisfull']; ?></p>
                <a style="color: #000" href="#" class="add_item" role="button" data-id="<?php echo $product['id']; ?>" data-title="<?php

                    if (strlen($product['nameprod']) > 13) {
                        $top = strlen($product['nameprod']);
                        $top = $top - 13;
                        $cutted = substr($product['nameprod'], 0, -$top);
                        $cutted = $cutted."...";
                        }else{
                            $cutted = $product['nameprod'];
                        }

                     echo $cutted;

                     ?>" data-price="<?php echo $product['price']; ?>" data-img="<?php
                    if ($existFoto) {
                        echo $product['filename'];
                    }else{
                        echo "img/empty-cart.jpg";
                    }?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> В корзину</a>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->



</body>

</html>
