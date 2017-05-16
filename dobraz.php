<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
?> 
<html>
	<head>
		 <?php
            include ("php/db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db); //извлекаем из базы все данные о пользователе с введенным логином
           
            mysql_close() ;
            $row = mysql_fetch_assoc($result); ?>
		<title><?php echo $row['namecomp']; ?></title>

		<meta name="robots" content="noindex" />
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/bootstrapflat.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<script src="js/jquery.js"></script>
		
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
			      <a class="navbar-brand"><?php echo $row['namecomp']; ?></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Изменить<span class="caret"></span></a>
			          <ul class="dropdown-menu"> 
			            <li class="active" ><a href="#">Бесплатно</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">20</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">30</a></li>
			          </ul>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категории <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <?php

                		//$namecomp = $row['namecomp'];
                		//$count1 = mysql_query("SELECT count(1) FROM radel WHERE namecomp='$namecomp' and login='$logins' ", $db);
                		
	                    $result3 = mysql_query ("SELECT * FROM razdel WHERE namecomp='$namecomp' and login='$logins' ", $db);

		                    while ($roww = mysql_fetch_assoc($result3))
		                {?>   
			            <li><a href="#"><?php echo $roww['razdel']; ?></a></li>
		                    
		                <?php
		                    }
		                ?>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>
			      
			      
			        <li><p class="navbar-text">Контактные данные <?php echo $row['tele']; ?></p></li>
			      
			      
			        
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><p class="navbar-text"><div class="zakaz"><div class="label-place"></div></div></p></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>
		<div class="container main">
			
				<form action="php/save_raz.php" method="post">
					<div class="form-group" >
						<input type="text" class="form-control" name="razdel" id="razdel"  placeholder="Раздел"/>
						<br>

						<button type="submit" name="submit" class="btn btn-primary btn-lg ">Добавить</button>

						<a href="page.php" class="btn btn-warning btn-lg ">назад</a>

					</div>
				</form>
			
		</div>
    <!-- jQuery -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	</body>
</html>