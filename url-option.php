<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$url = $_GET['url'];
?> 
<html>
	<head>
		 <?php
            include ("php/db.php");
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db);
           
            mysql_close() ;
            $row = mysql_fetch_assoc($result); ?>
		<title><?php echo $row['namecomp']; ?></title>
		<meta name="robots" content="noindex" />
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link rel="stylesheet" type="text/css" href="css/page.css">
		<script src="js/jquery.js"></script>
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
			      <a class="navbar-brand"><?php echo $row['namecomp']; ?></a>
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
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категории <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <?php

                		$namecomp = $row['namecomp'];
	                    $result3 = mysql_query ("SELECT * FROM razdel WHERE namecomp='$namecomp' and login='$logins' ", $db);

		                    while ($row1 = mysql_fetch_assoc($result3))
		                {?>   
			            <li><a href="#<?php echo $row['razdel']; ?>"><?php echo $row1['razdel']; ?></a></li>
		                    
		                <?php
		                    }
		                ?>
			          </ul>
			        </li>
			      
			      
			        <li><p class="navbar-text">Контактные данные <?php echo $row['tele']; ?></p></li>
			      
			      
			        <li class=""><button onclick="document.getElementById('parent_popup').style.display='block';" class="btn btn-warning btn-half navbar-btn comp-dobav"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить</button></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li>
                        <a href="page.php" >Назад</a>
                    </li>
			      </ul>
			    </div>
			  </div>
		</nav>
		<div class="container main">
			<div class="row"><?php $url = $_GET['url']; ?>
				<form action="php/options-save-url.php?url=<?php echo $url;?>" method="post">
					<div class="form-group" style="padding: 10px">
						
						<h4>Список ваших товаров доступен по ссылке:</h4>
						<div class="input-group">
						<span class="input-group-addon">2kz.kz/</span><input type="text" class="form-control" name="url" id="url" value="<?php echo $url; ?>" placeholder="Раздел"/>
						</div>
						
						<h4>Используйте эту ссылку для показа ваших товаров</h4>
						<br>
						<button type="submit" name="submit" class="btn btn-primary btn-lg ">Изменить</button>

					<a href="page.php" class="btn btn-success btn-lg ">назад</a>
					</div>
				</form>
			</div>
		</div>
	<script src="js/bootstrap.js"></script>
	</body>
</html>