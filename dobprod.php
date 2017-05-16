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
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link rel="stylesheet" type="text/css" href="css/page.php">
        <link rel="stylesheet" type="text/css" href="css/notie.css">
		<script src="grey/js/jquery.js"></script>
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
        ?>
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
			            $namecomp = $row['namecomp'];
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
			<div class="row">
				<form action="php/save_prod.php"  method="post" enctype="multipart/form-data">
					
						
						<div style="padding:10px;">
							<label class="control-label">Название товара:</label>
						<input type="text" class="form-control" name="namep" id="name"  placeholder="название товара"/>
						<br>
						<div class="input-group">
						<span class="input-group-addon">тг.</span><input type="text" class="form-control" name="price" id="price"  placeholder="Цена товара"/>
						</div>
						<br>
						<textarea onkeydown="checker()" maxlength="30" id="soviet" name="opis" cols="40" rows="3" placeholder="Короткий описание товара"></textarea>
						<p id="nana"></p>
						<br>
						<textarea maxlength="200" name="opisfull" cols="40" rows="5" placeholder="Полное описание товара"></textarea>
						<br>
						<p>
							<?php
							$namecomp = $row['namecomp'];
		                    $result = mysql_query ("SELECT * FROM razdel WHERE namecomp='$namecomp' and login='$logins'", $db);
		                    $myrow = mysql_fetch_array($result);
		                    if (!empty($myrow['razdel'])) {
		                    	echo "Выберите раздел";
		                    }
		                    else {
		                    	echo "Нет разделов!";
		                    }
		                    ?>
						</p>

		                <select class="form-control" name="razdel">
					    
					    <?php

			            $result1 = mysql_query ("SELECT * FROM razdel WHERE namecomp='$namecomp' and login='$logins'", $db);
			                    

				        while ($row = mysql_fetch_assoc($result1))
				        {?>            
				        <option ><?php echo $row['razdel'] ; ?></option>            
				        <?php
				        }
				        ?>
					    </select>




		                <br>
		                <br>
		                <br>
		                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
						<label for="user_pic">Главное изображние:</label>
						<input type="file" name="user_pic" size="30">

						<label for="">Допалнительные изображения:</label>
						<input type="file" name="user_pic2" size="30"><br>
						<input type="file" name="user_pic3" size="30"><br>
						<input type="file" name="user_pic4" size="30"><br>
						<input type="file" name="user_pic5" size="30"><br>
						<br>
						<br>
						<br>
						<button type="submit" name="submit" class="btn btn-primary btn-lg ">Добавить</button>
						<a href="page.php" class="btn btn-success btn-lg">назад</a>
					</div>
					
					
				</form>
			</div>
		</div>
		<script type="text/javascript">
		function checker() {
			    var x = document.getElementById("soviet").value;
			    var y = x.length;
			    if (y > 28) {
			    	document.getElementById("nana").innerHTML = "Вы ввели максимальное количество символов";
			    }else{
			    	document.getElementById("nana").innerHTML = "";
			    }
			}
		</script>
    <script src="grey/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/notie.js"></script>
	</body>
</html>