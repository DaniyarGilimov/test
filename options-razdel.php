<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$razdel = $_GET['razdel'];
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
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Изменить<span class="caret"></span></a>
			          <ul class="dropdown-menu"> 
			            <li class="Disabled" ><a href="#">Дизайн (На разработке)</a></li>
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
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>
		<div class="container main">
			<div class="row">
				<form action="php/options-save-razdel.php?razdel=<?php echo $razdel; ?>" method="post">
					<div class="form-group" style="padding: 5px">
						<input type="text" class="form-control" name="razdel" id="razdel" value="<?php echo $razdel; ?>" placeholder="Раздел"/>
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