<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
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

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    <script src="js/bootstrap.js"></script>

		<!-- <link rel="stylesheet" type="text/css" href="css/page.css"> -->
		<link rel="stylesheet" type="text/css" href="css/general.css">

		

        <!-- <link rel="stylesheet" type="text/css" href="css/agent/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/agent/agency.css"> -->

	    <script type="text/javascript" src="js/notie.js"></script>
        <link rel="stylesheet" type="text/css" href="css/notie.css">
        
		<link href="css/jqcart.css" rel="stylesheet" type="text/css">
		<script src="js/jqcart.min.js"></script>
		
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
              $.jqCart('openCart'); // открыть корзину
            });
            $('#clear').click(function(){
              $.jqCart('clearCart'); // очистить корзину
            });
          });
        </script>
        <?php
        	if ($_GET['cond'] == '1') {
        		echo "
					<script type='text/javascript'>
						$(function(){
							notie.alert(1, 'Успешно изменен!', 3);
							}
						)
					</script> 


		        ";

        	}
        	if ($_GET['cond'] == '2') {
        		echo "
        			<script type='text/javascript'>
						$(function(){
							notie.alert(3, 'Удалено!', 3);
							}
						)
					</script>




        		";
        	}
        	if ($_GET['cond'] == '3') {
        		echo "
        			<script type='text/javascript'>
        			$(function(){
						notie.confirm('Если удалить раздел, исчезнет все продукты этого раздела <br> Продолжить?', 'Да, Удалить!', 'Отмена', function() {
						    $(function(){
						    	location.href = 'php/options-delete-razdel.php?razdel=".$_GET['razdel']."';
						    })
						});
						}
					)
					</script>
        		";
        	}
        	if (empty($_GET['cond'])) {
        		
        	}
        
        ?>
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
		<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a href="page.php" class="navbar-brand"><?php echo $user['namecomp']; ?></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="#">Помощь</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Изменить<span class="caret"></span></a>
			          
			          	
			          
			          <ul class="dropdown-menu"> 
			            <li class="Disabled" ><a href="#">Дизайн (На разработке)</a></li>
			          </ul>
			        </li>			      
			        <li><p class="navbar-text">Контактные данные <?php echo $user['tele']; ?></p></li>			        <li class=""><button onclick="document.getElementById('parent_popup').style.display='block';" class="btn btn-warning btn-half navbar-btn comp-dobav"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить</button></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="page.php">Назад</a></li>
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
            				<div class="group-options-razdel">
		                    <a href="page.php?razdel=<?php echo $razdel; ?>&cond=3" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Удалить раздел</a>
		                    <a href="options-razdel.php?razdel=<?php echo $razdel; ?>" class="btn btn-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Изменить раздел</a>
	                    	</div>
            			</div>
	                      
	                    
	                </div>
                	<div class="row"> 
	                	<table class="table table-hover">
							<thead>
								<tr>
							        <th>Название</th>
									<th>Описание</th>
									<th>Фото</th>
									<th>Изменить/Удалить</th>
							    </tr>
							</thead>

							<tbody>
							   
							
		                <?php
		                   	$result2 = mysql_query ("SELECT * FROM products WHERE razdel='$razdel' and login='$logins' ", $db);
				 			
		                    while ($row = mysql_fetch_array($result2))
		                {?>   
			            <tr>
							<td><?php echo $row['nameprod'];?></td>
							<td><?php echo $row['opis'];?></td>
							<td><a class="thumbnail" style="width: 70px; color: #bdbdbd; min-height: 70px">
								<?php 
								        	if ($row['filename'] == "1") {
								        		echo "Без фото";
								        	}else{
								        		echo "<img src = '".$row['filename']."'>";
								        	}
								        ?>
							</a></td>
							<td><a>Удалить</a> / <a>Изменить</a></td>
						</tr>  
		                <?php
		                    }
		                ?>
		            	</tbody>
				      	</table>

		                
					</div> 
					</div>
                

			
			<hr>
		</div>
		<div id="parent_popup">
			  <div id="popup">
			    <p class="mid" style="cursor: pointer;" onclick="document.getElementById('parent_popup').style.display='none';"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Закрыть</p>
			    <br>
			    <p class="mid white">
			    	<a class="white" href="dobraz.php">Добавить раздел</a>
			    		<br>
			    	<a class="white" href="dobprod.php">Добавить продукт</a>
			    </p>
			  </div>
		</div>
    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
	</body>
</html>