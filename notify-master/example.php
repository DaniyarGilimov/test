<!DOCTYPE html>
<html lang="ko">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<title>Example</title>
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/notify.css">
	<link rel="stylesheet" type="text/css" href="css/prettify.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style type="text/css">
		html, body{
			font-family: "Noto Sans","맑은 고딕","Malgun Gothic","Apple SD Gothic Neo","돋움",dotum,Arial,sans-serif;
			font-size: 14px;
			line-height: 1.428571429;
			color: #333;
			padding: 0;
			margin: 0;
		}
		h1.title{
			margin-bottom: 0;
		}
		h2{
			margin-bottom: 20px;
		}
		hr{
			margin-bottom: 30px;
		}
		small{
			background-color: #ddd;
			border-radius: 4px;
			padding: 2px 4px;
			color: #333;
		}
		.prettyprint{
			padding: 10px 15px;
			background-color: #FFF;
			border: 1px solid #e1e1e8;
		}
		.button-list{
			padding: 5px 0 15px 0;
		}
		.button-list > button{
			margin-right: 5px;
		}

		.bs-callout{
			padding: 20px;
			margin: 20px 0;
			border: 1px solid #eee;
			border-left-width: 5px;
			border-radius: 3px;
		}
		.bs-callout-warning{
			border-left-color: #aa6708;
		}
		.bs-callout-info{
			border-left-color: #1b809e;
		}
		.bs-callout h4{
			margin-top: 0;
			margin-bottom: 5px;
		}
		.bs-callout-warning h4{
			color: #aa6708;
		}
		.bs-callout-info h4{
			color: #1b809e;
		}
		.bs-callout p{
			line-height: 150%;
		}
		.bs-callout p:last-child{
			margin-bottom: 0;
		}
		.my-class{
			background: #304CD8;
			background: -webkit-linear-gradient(left, #304CD8 0%, #9F3762 100%);
			background: -ms-linear-gradient(left, #304CD8 0%, #9F3762 100%);
			background: linear-gradient(to right, #304CD8 0%, #9F3762 100%);
			color: #fff;
			font-size: 25px;
			padding: 35px;
			text-align: center;
		}
    </style>
    <script type="text/javascript">
   $.notify("Alert!", {type:"info"});
    </script>
</head>
<body>
<a href="https://github.com/yjseo29/notify"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
<div class="container">
	<h1 class="title">사용법</h1>
	<hr>
	<p>기본적인 알림창을 사용하는 방법입니다.</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="usage()">Alert!</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!");</pre>
</div>
<div class="container">
	<h1 class="title">옵션</h1>
	<hr>
	<h2>Type</h2>
	<p>
		<code>type</code> 옵션을 사용하여 알림창의 스타일을 지정합니다. <small>기본값 : <var>default</var></small><br>
		커스텀 스타일 적용을 위해서는 <code><a href="#color">color</a></code> <code><a href="#background">background</a></code> <code><a href="#class">class</a></code> 섹션을 참고하세요.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="api_type('default')">default</button>
		<button type="button" class="btn btn-default" onclick="api_type('toast')">toast</button>
		<button type="button" class="btn btn-default" onclick="api_type('info')">info</button>
		<button type="button" class="btn btn-default" onclick="api_type('success')">success</button>
		<button type="button" class="btn btn-default" onclick="api_type('danger')">danger</button>
		<button type="button" class="btn btn-default" onclick="api_type('warning')">warning</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {type:"info"});</pre>
</div>
<div class="container">
	<h2>Position</h2>
	<p>
		<code>align</code>&nbsp;<code>verticalAlign</code>&nbsp;옵션을 사용하여, 알림창의 위치를 지정합니다. <small>기본값 : <var>center, top</var></small>
	</p>
	<div class="bs-callout bs-callout-warning">
		<h4>모바일 안내</h4>
		<p>
			모바일에서 알림창의 가로크기는 100%으로 작동하기 때문에 <code>align</code>은 적용되지 않습니다.<br>
			<code>verticalAlign</code>값은 모두 작동하나, <var>middle</var>값에서는 알림창의 가로크기가 80%으로 적용됩니다.<br>
			자세한 사항은 모바일 섹션을 참고하세요.
		</p>
	</div>
	<div class="row">
		<div class="col-md-5">
			<table class="table">
				<tr>
					<th width="10%">align</th>
					<td>
						<label class="radio-inline">
							<input type="radio" name="align" value="left"> left
						</label>
						<label class="radio-inline">
							<input type="radio" name="align" value="center" checked> center
						</label>
						<label class="radio-inline">
							<input type="radio" name="align" value="right"> right
						</label>
					</td>
				</tr>
				<tr>
					<th>verticalAlign</th>
					<td>
						<label class="radio-inline">
							<input type="radio" name="verticalAlign" value="top" checked> top
						</label>
						<label class="radio-inline">
							<input type="radio" name="verticalAlign" value="middle"> middle
						</label>
						<label class="radio-inline">
							<input type="radio" name="verticalAlign" value="bottom"> bottom
						</label>
					</td>
				</tr>
				<tr align="center" style="background-color:#f9f9f9;">
					<td colspan="2"><button type="button" id="positionBtn" class="btn btn-default" onclick="api_position()">align : <var>center</var>, verticalAlign : <var>top</var></button></td>
				</tr>
			</table>
		</div>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {align:"center", verticalAlign:"top"});</pre>
	<table class="table table-bordered table-striped js-options-table">
		<thead>
			<tr>
				<th>이름</th>
				<th>값</th>
				<th>설명</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td rowspan="3" width="20%"><code>align</code> (가로위치)<br><small>기본값 : <var>center</var></small></td>
				<td><var>left</var></td>
				<td>알림창의 가로위치를 왼쪽에 위치시킵니다.</td>
			</tr>
			<tr>
				<td><var>center</var></td>
				<td>알림창의 가로위치를 가운데에 위치시킵니다.</td>
			</tr>
			<tr>
				<td><var>right</var></td>
				<td>알림창의 가로위치를 오른쪽에 위치시킵니다.</td>
			</tr>
			<tr>
				<td rowspan="3"><code>verticalAlign</code> (세로위치)<br><small>기본값 : <var>top</var></small></td>
				<td><var>top</var></td>
				<td>알림창의 세로위치를 상단에 위치시킵니다.</td>
			</tr>
			<tr>
				<td><var>middle</var></td>
				<td>알림창의 세로위치를 중간에 위치시킵니다.</td>
			</tr>
			<tr>
				<td><var>bottom</var></td>
				<td>알림창의 세로위치를 하단에 위치시킵니다.</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="container">
	<h2 id="delay">Delay</h2>
	<p>
		<code>delay</code>&nbsp;옵션을 사용하여, 알림창이 표시되는 시간을 설정합니다.<small>기본값 : <var>3000</var></small> <i>(단위 milliseconds)</i> 
	</p>
	<div class="bs-callout bs-callout-info">
		<h4>0초로 설정하는 경우</h4>
		<p>
			시간을 0으로 설정하게 되면 배경이 흐릿하게 표시되며, <code><a href="#close">close</a></code>옵션이 true로 변경됩니다.<br>
			알림창은 배경을 클릭하거나, 닫기아이콘을 클릭하면 알림창이 닫힙니다.<br>
			배경의 불투명도를 설정하려면 <code><a href="#blur">blur</a></code> 섹션을 참고하세요.
		</p>
	</div>
	<form class="form-inline" style="margin-bottom:15px;">
		<div class="form-group">
			<input class="form-control" id="delayValue" type="text" value="3000" placeholder="milliseconds" style="width:60px;display:inline-block;">
			<button type="button" class="btn btn-default" onclick="api_delay()">Alert!</button>
		</div>
	</form>
	<pre class="prettyprint">$.notify("Alert!", {delay:2000});</pre>
</div>
<div class="container">
	<h2>Animation</h2>
	<p>
		<code>animation</code>&nbsp;옵션을 사용하여, 에니메이션 사용여부를 설정합니다. <small>기본값 : <var>true</var></small>
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!')">Animation ('true')</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!',{animation:false})">Not Animation ('false')</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {animation:true});</pre>
</div>
<div class="container">
	<h2>AnimationType</h2>
	<p>
		<code>animationType</code>&nbsp;옵션을 사용하여, 에니메이션 효과를 선택합니다. <small>기본값 : <var>drop</var></small>
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!')">drop</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!',{animationType:'scale'})">scale</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!',{animationType:'fade'})">fade</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {animationType:"drop"});</pre>
</div>
<!--
<div class="container">
	<h2>Buttons</h2>
	<p>
		<code>buttons</code>&nbsp;옵션을 사용하여, 알림창에 버튼을 추가합니다.<br>
		※ 버튼은 최대 2개까지 추가할 수 있습니다.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {buttons:['확인'],delay:0})">1 Buttons</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {buttons:['확인','취소'],delay:0})">2 Buttons</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {buttons:['확인','취소'],delay:0});</pre>
</div>
<div class="container">
	<h2>ButtonAlign</h2>
	<p>
		<code>buttonAlign</code>&nbsp;옵션을 사용하여, 버튼을 정렬합니다. <small>기본값 : <var>center</var></small>
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {buttons:['확인','취소'],delay:0,buttonAlign:'left'})">'left'</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {buttons:['확인','취소'],delay:0,buttonAlign:'center'})">'center'</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {buttons:['확인','취소'],delay:0,buttonAlign:'right'})">'right'</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {buttons:['확인','취소'], delay:0, buttonAlign:"center"});</pre>
</div>
<div class="container">
	<h2>ButtonFunc</h2>
	<p>
		<code>buttonFunc</code>&nbsp;옵션을 사용하여, 버튼의 클릭이벤트 자바스크립트 함수를 지정합니다.<br>
		첫번째 배열의 값은 첫번째 버튼을 참조하며, 두번째 배열의 값은 두번째 버튼을 참조합니다.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('정말로 삭제하시겠습니까?', {buttons:['확인','취소'],delay:0,buttonAlign:'right',buttonFunc:['myFunc']})">buttonFunc</button>
	</div>
	<pre class="prettyprint">$.notify("정말로 삭제하시겠습니까?", {buttons:['확인','취소'], delay:0, buttonAlign:"right", buttonFunc:['myFunc']});

function myFunc(){
   alert('삭제하였습니다');
}</pre>
</div>
-->
<div class="container">
	<h2 id="color">Color</h2>
	<p>
		<code>color</code>&nbsp;옵션을 사용하여, 알림창의 글씨 색상을 정의합니다. <small>기본값 : <var>#000</var></small>
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#d44950'})" style="color:#d44950">#D44950</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#4B7EE0'})" style="color:#4B7EE0">#4B7EE0</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#20D67B'})" style="color:#20D67B">#20D67B</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#A5881B'})" style="color:#A5881B">#A5881B</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {color: "#D44950"});</pre>
</div>
<div class="container">
	<h2 id="background">Background</h2>
	<p>
		<code>background</code>&nbsp;옵션을 사용하여, 알림창의 배경 색상을 정의합니다.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#fff', background: '#D44950'})" style="background-color:#d44950;color:#fff;">#D44950</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#fff', background: '#4B7EE0'})" style="background-color:#4B7EE0;color:#fff;">#4B7EE0</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#fff', background: '#20D67B'})" style="background-color:#20D67B;color:#fff;">#20D67B</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {color: '#fff', background: '#A5881B'})" style="background-color:#A5881B;color:#fff;">#A5881B</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {color: "#fff", background: "#D44950"});</pre>
</div>

<div class="container">
	<h2 id="Icon">Icon</h2>
	<p>
		<code>icon</code>&nbsp;옵션을 사용하여, 메세지에 아이콘을 추가합니다.<br>
		아이콘을 사용하려면 <code><a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a></code>의 라이브러리를 추가해야합니다.<br>
		값으로 <code><a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a></code>의 아이콘 <code><a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank" style="color:#c7254e;">네임</a></code>을 사용합니다.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Success', {type: 'success', icon:'check'})">check</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Fail', {type: 'success', icon:'close'})">close</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Info', {type: 'success', icon:'exclamation'})">exclamation</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert', {type: 'success', icon:'bell'})">bell</button>
	</div>
	<pre class="prettyprint"><xmp><!-- Font Awesome Css Include -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"></xmp>$.notify("Success", {type: "info", icon:"check"});
	</pre>
</div>
<div class="container">
	<h2 id="class">Class</h2>
	<p>
		<code>class</code>&nbsp;옵션을 사용하여, 커스텀 스타일 시트를 정의합니다.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('<h1>Hello World!</h1>', {class:'my-class', delay:0, align:'center', verticalAlign:'middle', animationType:'scale'})">Alert!</button>
	</div>
	<pre class="prettyprint">$.notify("<code><span>Hello World!</code>", {class:"my-class", delay:0, align:"center", verticalAlign:"middle", animationType:"scale"});
	
/* 스타일 정의 */
.my-class{
   background: #304CD8;
   background: -webkit-linear-gradient(left, #304CD8 0%, #9F3762 100%);
   background: -ms-linear-gradient(left, #304CD8 0%, #9F3762 100%);
   background: linear-gradient(to right, #304CD8 0%, #9F3762 100%);
   color: #fff;
   font-size: 25px;
   padding: 35px;
   text-align: center;
}
</pre>
</div>
<div class="container">
	<h2 id="blur">Blur</h2>
	<p>
		<code>blur</code>&nbsp;옵션을 사용하여, 알림창의 뒷배경 불투명도를 조절합니다. <small>기본값 : <var>0.2</var></small>
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {blur: 0.2, delay: 0})">0.2</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {blur: 0.4, delay: 0})">0.4</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {blur: 0.6, delay: 0})">0.6</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {blur: 0.8, delay: 0})">0.8</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {blur: 0.2, delay: 0});</pre>
</div>
<div class="container">
	<h2 id="close">Close</h2>
	<p>
		<code>close</code>&nbsp;옵션을 사용하여, 알림창을 닫을 수 있는 닫기아이콘을 추가합니다. <small>기본값 : <var>false</var></small><br>
		<code><a href="#delay">delay</a></code> 값이 <var>0</var>인경우 <code>close</code>의 값이 자동으로 <var>true</var>로 설정됩니다.
	</p>
	<div class="button-list">
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {close: true})">true</button>
		<button type="button" class="btn btn-default" onclick="$.notify('Alert!', {close: false})">false</button>
	</div>
	<pre class="prettyprint">$.notify("Alert!", {close: true});</pre>
</div>
<script src="js/jquery-1.11.0.js"></script>
<script src="js/notify.js"></script>
<script src="js/prettify.js"></script>
<script type="text/javascript">
	
	function usage(){
		$.notify("Alert!");
	}

	function api_type(type){
		$.notify("Alert!", {type:type});
	}

	function api_position(){
		var an = $(":radio[name=align]:checked").val();
		var vn = $(":radio[name=verticalAlign]:checked").val();
		$.notify("Alert!", {align:an, verticalAlign:vn});
	}

	function api_delay(){
		$.notify("Alert!", {delay: $("#delayValue").val()});	
	}

	function myFunc(){
		alert("삭제하였습니다");
	}

	function example1(){
		$.notify({
			delay : 999999,
			message : "hello world!hello world!hello world!hello world!hello world!hello world!hello world!hello world!hello world!hello world!",
			type : "warning",
			close : "true",
			animation : true,
			animationType : "scale",
			align: "center",
			verticalAlign: "middle",
			color: "#777",
			background: "#eee"
		});
	}

	function example2(){
		$.notify({
			delay : 0,
			message : "hello world!",
			animation : true,
			align: "center",
			verticalAlign: "middle",
			buttons: ["확인","취소"],
			buttonFunc: ["test"],
			buttonAlign: "right",
			blur: 0.2
		});
	}

	function test(){
		alert("확인");
	}

	$(function(){
		$("input[name=align]:radio").change(function(){
			$("#positionBtn").html("align : <var>"+$(this).val()+"</var>, verticalAlign : <var>"+$(":radio[name=verticalAlign]:checked").val()+"</var>");
		});
		$("input[name=verticalAlign]:radio").change(function(){
			$("#positionBtn").html("align : <var>"+$(":radio[name=align]:checked").val()+"</var>, verticalAlign : <var>"+$(this).val()+"</var>");
		});
	});


	!function ($) {
		$(function(){
			window.prettyPrint && prettyPrint()   
		})
	}(window.jQuery)



</script>
</body>
</html>