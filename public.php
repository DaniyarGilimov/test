<?php

include_once('jcart/jcart.php');

session_start();
?>
<?php
$url = $_GET["url"];

include ("php/db.php");

$result3 = mysql_query("SELECT * FROM user WHERE urlcomp='$url'",$db);

$roww = mysql_fetch_assoc($result3);

$namecomp = $roww['namecomp'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		 <?php
            include ("php/db.php");
            $result = mysql_query("SELECT * FROM products WHERE namecomp='$namecomp'",$db);            
            mysql_close() ;
            $row = mysql_fetch_assoc($result); ?>
		<title><?php echo $namecomp ?></title>
		<meta name="robots" content="noindex" />
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta name="viewport" content="width=device-width">
	    <script src="js/jquery.js"></script>
	    <script type="text/javascript" src="jcart/js/jcart.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    	<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link rel="stylesheet" type="text/css" href="css/public.css">
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
            $('#open').click(function(){
              $.jqCart('openCart'); 
            });
            $('#clear').click(function(){
              $.jqCart('clearCart'); 
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
			            <li><a href="#<?php echo $row['razdel']; ?>" style="<?php 

							$logins = $roww['login'];
			            	$razdel = $row['razdel'];

		            		$caster = mysql_query("SELECT id FROM products WHERE login='$logins' and razdel='$razdel'", $db);

						 	while ($ppap = mysql_fetch_array($caster)) {
						 	 	$zidane[] = $ppap['id']; 
						 	}
		            		if (sizeof($zidane) == 0) {
		            			echo "display: none";
		            		}
		            		unset($zidane);
			            ?>"><?php echo $row['razdel']; ?></a></li>
		                    
		                <?php
		                    }
		                ?>
			          </ul>
			        </li>
			         <li> <p class="navbar-text">Контактные данные <?php echo $roww['tele']; ?></p></li>
			      </ul>
			     <ul class="nav navbar-nav navbar-right">
			        <li><div class="label-place"></div></li>
			      </ul>
			    </div>
			     
			  </div>
		</nav>
		<div class="container main">
		
				<?php
                    $result1 = mysql_query ("SELECT * FROM razdel WHERE login='$logins' ", $db);

                    while ($row = mysql_fetch_assoc($result1))
                {?>   

            		<div id="<?php echo $row['razdel']; ?>" style="<?php 
            		$razdel = $row['razdel'];

            		$caster = mysql_query("SELECT id FROM products WHERE login='$logins' and razdel='$razdel'", $db);

				 	while ($ppap = mysql_fetch_array($caster)) {
				 	 	$zidane[] = $ppap['id']; 
				 	}
            		if (sizeof($zidane) == 0) {
            			echo "display: none";
            		}
            		unset($zidane);
            		?>">
            		
                    <h4 style="font-weight: 400" class="fifa"><?php echo $row['razdel']; ?></h4>        
                	<div class="row"> 
		              	<?php
		                	$razdel = $row['razdel'];
				 			$resul2t2 = mysql_query("SELECT id FROM products WHERE login='$logins' and razdel='$razdel'", $db);
				 				while ( $roww = mysql_fetch_array($resul2t2)) {
				 			 	$result2[] = $roww['id']; 
				 			}
				 			if (sizeof($result2) <= 10) {
				 				$sis = sizeof($result2);
				 			}
				 			else{
				 				$sis = 10;
				 			}
							for ($ij = 0; $ij < $sis; $ij++){
				 			$result22 = mysql_query("SELECT * FROM products WHERE id='$result2[$ij]' and razdel='$razdel'", $db);
				 			
		                    while ($row = mysql_fetch_array($result22))
		                {  ?>   
		                
			                <div class="col-lg-d5 no-padding">
				                	<div class="block-inf" >
											<?php 
												if ($row['filename'] == '1') {
													$existFoto = FALSE;
													echo "
													<a href='more.php?id=".$row['id']."&url=".$url."' class='portfolio-link' data-toggle='modal'> 
														<div class = 'yes-img ' style='background-image:url(img/empty.jpg)'>
														</div>
													</a>
													";
												}
												else {
													$existFoto = TRUE;
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
									            		<div class="col-sm-6 col-md-6 col-lg-5">
									            			<p class="price_p"><?php echo $row['price']; ?> тг.</p>
											            	
											            </div>
											            <div class="col-sm-6 col-md-6 col-lg-7">
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
		                }
		                unset($result2);
		                ?>
					</div> 
					</div>
					
                <?php
					if ($sis == 10) {
						echo "
							<div class='row'>
								<div class='col-lg-9'></div>
								<div class='col-lg-3'>
										<a href='others.php?razdel=".$razdel."&url=".$url."' class='btn btn-warning btn-half'>Показать все</a>
								</div>
							</div>
							<hr>
						";	
                    }
                }
                ?>

			
			<hr>
		</div>
	</body>
</html>