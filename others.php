<?php
$url = $_GET["url"];
include ("php/db.php");
$result3 = mysql_query("SELECT * FROM user WHERE urlcomp='$url'",$db);
$roww = mysql_fetch_assoc($result3);
$namecomp = $roww['namecomp'];
$logins = $roww['login']; 
$names = $roww['name'];
?>

<html>
	<head>   
		 <?php
            include ("php/db.php");
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db);
           
            mysql_close() ;
            $user = mysql_fetch_assoc($result); ?>
		<title><?php echo $user['namecomp']; ?></title>
		<meta name="robots" content="noindex" />
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta name="viewport" content="width=device-width">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    

		<link rel="stylesheet" type="text/css" href="css/general.css">

        <link rel="stylesheet" type="text/css" href="css/public.css">
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
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a href="2kz.kz/<?php echo $url; ?>" class="navbar-brand"><?php echo $namecomp; ?></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="#">Помощь</a></li>
			        <li class="dropdown">
			          
			          
			          	
			          
			          <ul class="dropdown-menu"> 
			            <li class="Disabled" ><a href="#">Дизайн (На разработке)</a></li>
			          </ul>
			        </li>
			       
			      
			      
			        <li><p class="navbar-text">Контактные данные <?php echo $user['tele']; ?></p></li>
			      
			      
			        
			      </ul>
			      <ul class="nav navbar-nav navbar-right">

			        <li><div class="zakaz"><div class="label-place"></div></div></li>
			        <li>
                        <a href="public.php?url=<?php echo $url; ?>" >Назад</a>
                    </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>
		<div class="container main">
				<?php

                    $razdel = $_GET['razdel'];
                ?>   
            		<div>
            		<div class="row">
            			<div class="col-lg-5 col-md-3"></div>
            			<div class="col-lg-2 col-md-4"><h1><?php echo $razdel; ?></h1></div>
            			<div class="col-lg-5 col-md-5">
            			</div>
	                      
	                    
	                </div>
                	<div class="row"> 
	                	
		                <?php
		                	
		                   	$result2 = mysql_query ("SELECT * FROM products WHERE razdel='$razdel' and login='$logins' ", $db);
				 			
		                    while ($row = mysql_fetch_array($result2))
		                {  ?>   
		                
			                 <div class="col-lg-d5 no-padding">
				                	<div class="block-inf" >
											<?php 
												if ($row['filename'] == '1') {
													echo "
													<a href='more.php?id=".$row['id']."&url=".$url."' class='portfolio-link' data-toggle='modal'> 
														<div class = 'yes-img ' style='background-image:url(img/empty.jpg)'>
														</div>
													</a>
													";
												}
												else {
													echo "
													<a href='more.php?id=".$row['id']."&url=".$url."' class='portfolio-link' data-toggle='modal'> 
														<div class = 'yes-img ' style='background-image:url(" .$row['filename'] .")'>
														</div>
													</a>
													";
												}
											?>
						                <div class="caption">
								            <div class="caption-text">    
								                <a class="mid" href="<?php echo "more.php?id=".$row['id']."&url=".$url.""; ?>">
								                	<?php 
								                		if (strlen($row['nameprod']) > 13) {
								                			$top = strlen($row['nameprod']);
								                			$top = $top - 13;
								                			$cutted = substr($row['nameprod'], 0, -$top);
								                			$cutted = $cutted."...";
								                		}else{
								                			$cutted = $row['nameprod'];
								                		}
								                	?>
								                	<?php echo $cutted; ?>
								                </a>
								            </div>
								            <div class="caption-bottom ">	
									            	<div class="row">
									            		<div class="col-xm-12 col-sm-6 col-md-6 col-lg-5">
									            			<p class="price_p"><?php echo $row['price']; ?> тг.</p>
											            	
											            </div>
											            <div class="col-xm-12 col-sm-6 col-md-6 col-lg-7">
											            	<a style="color: #000" href="#" class="add_item" role="button" data-id="<?php echo $row['id']; ?>" data-title="<?php echo $cutted;; ?>" data-price="<?php echo $row['price']; ?>" data-img="<?php
											            	 if ($existFoto) {
											            	 	echo $row['filename'];
											            	 }else{
											            	 	echo "img/empty-cart.jpg";
											            	 }
											            	  ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> В корзину</a>
									            		</div>
									            	</div>
								            </div>
						                </div>
				                	</div>
				                </a>
			                </div>
		                <?php
		                    }
		                
		                ?>


		                
					</div> 
					</div>
                

			
			<hr>
		</div>


	</body>
</html>