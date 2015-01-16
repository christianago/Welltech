<?php

session_start();

include_once('../config.php');

$lang = 0; #ENGLISH
if ( isset($_SESSION['lang']) && @$_SESSION['lang'] == 'GR' ){
	$lang = 1;
} else{
	$lang = 0;
}

$stmt = $dbh->prepare("SELECT main, title FROM pages WHERE filename='head_e' AND lang=:l LIMIT 1");
$stmt->bindValue(':l', $lang);
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k=>$v){
	$main = $v['main'];
}
$menu = array();
$menu = explode(',', $main);
//print_r($menu);

$URL = explode('/', $_SERVER['REQUEST_URI']);
$URL = str_replace('.php', '', $URL[count($URL)-1]);

$result = $main = $stmt = null;
$stmt = $dbh->prepare("SELECT main, title FROM pages WHERE filename=:f AND lang=:l");
$stmt->bindValue(':f', $URL);
$stmt->bindValue(':l', $lang);
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $k=>$v){
	$main = $v['main'];
}
$dbh = null;

?>

<html>

<head>
<meta charset="UTF-8" />

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	background-image: url(../image/bg_2.gif);
}
-->
</style>
<link href="../css/link.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style8 {font-size: 9px; color: #FFFFFF; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style9 {font-size: 11px}

.menu_e{
	margin-left: 10px;
	margin-right: 10px;
}

.lang{
	text-decoration: none;
	margin: 5px;
}

.header{
	border: 1px solid gray;
}

td[class^="txt_"] a, ul li[class^="txt_"] a, ul[class^="txt_"] li a, ul li a[class^="txt_"], span[class^="txt_"] a{
	text-decoration: none;
	color: #3366FF;
}


-->
</style>
</head>

<body>
<div class="header">
<table width="760" height="67" border="0" cellpadding="0" cellspacing="0" bgcolor="#ADD2E7">
<tr>
       <td width="380" height="67"><div align="left"><a href="index.php" target="_top"><img src="../image/logo.gif" width="165" height="50" border="0"></a></div></td>
       <td width="380" height="67" valign="middle">
       <div align="right">
			<a href="../lang.php?lang=EN" target="_parent" class="lang">English</a>
	       <a href="../lang.php?lang=GR" target="_parent" class="lang">Ελληνικά</a>
	   </div>
       </td>
</tr>
</table>   


<table border="0" width="760" cellspacing="0" cellpadding="0" height="22" background="image/bg_1.gif">
  <tr>
    <td width="760" background="../image/menu_bar.gif" bgcolor="#284987">
      <p align="center" style="margin-left: 25">
      <b>
   	  <a href="../index.php" target="_top" class="menu_e"><?php echo $menu[0]; ?></a>
   	  <a href="../product_e.php" target="_top" class="menu_e"><?php echo $menu[1]; ?></a>
   	  <a href="../product_e_31.php" target="_top" class="menu_e"><?php echo $menu[2]; ?></a>
   	  <a href="support.php" target="_top" class="menu_e"><?php echo $menu[3]; ?></a>
   	  <a href="../about_e.php" target="_top" class="menu_e"><?php echo $menu[4]; ?></a>
   	  <a href="../contact.php" target="_top" class="menu_e"><?php echo $menu[5]; ?></a>
   	  <a href="../app_note.php" target="_top" class="menu_e"><?php echo $menu[6]; ?></a>
   	  </b></td>
  </tr>
</table>
</div>

</body>

</html>


