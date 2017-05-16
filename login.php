<html>
	<head>
		<title>Login</title>
		<meta name="robots" content="noindex" />
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta name="viewport" content="width=device-width">
		<script src="js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrapflat.css">
		<link rel="stylesheet" type="text/css" href="css/page.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
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
			      <a class="navbar-brand">2KZ.KZ</a>
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
			      
			        <li><p class="navbar-text">Контактные данные 8(705)158-18-95</p></li>
			      
			      
			        
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>	
		<section id="login-php">
		<div class="container-fluid">
			<form action="php/test_user.php" method="post">
				<div class="form-group" >
					<input type="text" class="form-control" name="login" id="login"  placeholder="login или номер телефона для входа в систему"/>
					<br>

					<input type="password" class="form-control" name="password" id="password"  placeholder="password"/>
					<br>
					<button type="submit" name="submit" class="btn btn-primary btn-lg ">Войти</button>

				<a href="index.html" class="btn btn-success btn-lg" style="margin-left: 10px;"> Назад</a>
				</div>
			</form>
		</div>		
		</section>	



    <script src="js/bootstrap.js"></script>
	</body>
</html>