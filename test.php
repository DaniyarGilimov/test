<html> 
<head>
	<title>sdsd</title>
		<link href="css/jqcart.css" rel="stylesheet" type="text/css">
		<script src="js/jquery.js"></script>
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
	    body{ margin:0; padding:0;}
	    .demo-code{ background-color:#ffffff; border:1px solid #333333; display:block; padding:10px;}
	    .option-table td{ border-bottom:1px solid #eeeeee;}
	    </style>
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
	        <style media="(max-width:1199px)">
      .makaz > li > a{
        display: none;
      }
    </style>
</head>
<body>
	<h3 class="item_title">Террор</h3>
            <p><b>Количество: 8 шт.</b></p>
             <p><b>Цена: <span class="item_price">1200</span>тг</b></p>
	<p><a href="#" class="btn btn-primary btn-half raised add_item" role="button" data-id="1" data-title="ska" data-price="1200" data-img="">В корзину</a></p>
	<br>

	<div class="label-place"></div>

    <!-- Bootstrap Core JavaScript -->
    <script src="grey/js/bootstrap.min.js"></script>
</body>
</html>