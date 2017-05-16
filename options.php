<?php
session_start();
$logins = $_SESSION['login']; 
$names = $_SESSION['name'];
$nameprod = $_GET['nameprod'];
?>

<html>
	<head>   
		 <?php

            include ("php/db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
            $result = mysql_query("SELECT * FROM user WHERE login='$logins'",$db); //извлекаем из базы все данные о пользователе с введенным логином
           
            mysql_close() ;
            $user = mysql_fetch_assoc($result); ?>
		<title><?php echo $user['namecomp']; ?></title>
		<meta name="robots" content="noindex" />
  		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta name="viewport" content="width=device-width">
		<script src="js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/page.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
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
			      <a href="page.php" class="navbar-brand"><?php echo $user['namecomp']; ?></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			      </ul>
			      <ul class="nav navbar-nav">
			        <li><p class="navbar-text">Контактные данные <?php echo $user['tele']; ?></p></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><p class="navbar-text"><div class="zakaz"><div class="label-place"></div></div></p></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>
					<?php
					
					$prod = mysql_query("SELECT * FROM products WHERE login = '$logins' and nameprod = '$nameprod'",$db);
					$myprod = mysql_fetch_array($prod);
					?>
		<div class="container main">
			<div class="row">
				<div class="col-lg-2">

					<a href="page.php" class="btn btn-primary btn-half">Назад</a>
				</div>
			<div class="col-lg-10">
			<form action="php/options_save.php?id=<?php echo $myprod['id']?>" id="options" method="post" enctype="multipart/form-data">
				<div class="form-group" >
					

					<div class="block-opt">
						<div class="imgchange">
							<img src="<?php echo $myprod['filename']; ?>" alt="Изображение не выбрано">
							<div class="imgchoose">
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
								<label for="user_pic"><h2>Выберите изображение:</h2></label>
								<input type="file" name="user_pic" size="30">
							</div>
						</div>
						<p>
							<h4>Название</h4>
							<input name="nameprod" value="<?php echo $nameprod; ?>">
						    
						</p>
						<br>
							<h4>Цена</h4>
							<input name="price" type="number" value="<?php echo $myprod['price']; ?>">
						<br>
						<br>
						<div class="row" >
					      <h4 for="select" class="col-lg-1 control-label">Раздел:</h4>
					      <div class="col-lg-4">
					        <select class="form-control" form="options" name="razdel">
					          <?php
					          	$result11 = mysql_query ("SELECT * FROM products WHERE login='$logins' and nameprod='$nameprod'", $db);
					          	$myresult11 = mysql_fetch_array($result11);
					          	echo "<option  class='active-option'> " .$myresult11['razdel']. " </option>";
					          ?>
					          <?php

			                    $result1 = mysql_query ("SELECT * FROM razdel WHERE namecomp='$namecomp' and login='$logins'", $db);
			                    

				                    while ($row = mysql_fetch_assoc($result1))
				                {?>            
				                <option ><?php echo $row['razdel'] ; ?></option>            
				                <?php
				                    }
				                ?>
					        </select>
					       </div>
					    </div>
						<p>
							<h4>Описание</h4>
							<textarea name="opis" maxlength="30" cols="40" rows="3"><?php echo $myprod['opis']; ?></textarea>
						</p>
						<p>
							<h4>Полное описание</h4>
							<textarea name="opisfull" maxlength="200" cols="40" rows="5"><?php echo $myprod['opisfull']; ?></textarea>
						</p>
						<button type="submit" name="submit" class="btn btn-primary btn-md ">Изменить</button>
					</div>
					
				</div>
			</form>
			</div>
			</div>
		</div>
    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	</body>
</html>