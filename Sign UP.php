<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Regístrate - Formoid web forms</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" background="3409778.jpg">



<!-- Start Formoid form-->
<link rel="stylesheet" href="signup_files/formoid1/formoid-solid-orange.css" type="text/css" />
<script type="text/javascript" src="signup_files/formoid1/jquery.min.js"></script>

<br>

<form action="<?php echo constant('URL');?>/nuevo/registrarUsuario" enctype="multipart/form-data" class="formoid-solid-orange" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2><img src="iconos/009-team-1.png" width="30px" height="30px" >Regístrate</h2></div>
	<div class="element-name">
		<label class="title">
			<span class="required">*</span>
		</label>
		<span class="nameFirst">
			<input placeholder=" Nombre" type="text" size="8" name="name[first]" required="required"/>
			<span class="icon-place"></span>
		</span>
		<span class="nameLast">
			<input placeholder=" Apellido" type="text" size="14" name="name[last]" required="required"/>
			<span class="icon-place"></span>
		</span>
	</div>
	<div class="element-email">
		<label class="title">
			<span class="required">*</span>
		</label><div class="item-cont">
			<input class="large" type="email" name="email" value="" required="required" placeholder="Email"/>
			<span class="icon-place"></span>
		</div>
	</div>
	<div class="element-password">
		<label class="title"><span class="required">*</span></label>
		<div class="item-cont">
			<input class="large" type="password" name="password" value="" required="required" placeholder="Password"/>
			<span class="icon-place"></span>
		</div>
	</div>
<div class="submit"><input type="submit" value="Enviar"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">web forms</a> Formoid.com 2.9</p><script type="text/javascript" src="signup_files/formoid1/formoid-solid-orange.js"></script>
<!-- Stop Formoid form-->



</body>
</html>
