<html>
<head>
  <style>
  </style>

  <link rel="stylesheet" type="text/css" href="css/Style_Main.css">

<?php
session_start();
?>

<ul>
  <li><a class="active">Welcome: <?php echo "" .$_SESSION['name'];  ?></a></li>
  <li><a href = '\name'>Change Username</a></li>
  <li><a href = '\password'>Change Password</a></li>
  <li><a href="">Help</a></li>
  <li><a href="\">Log out</a></li>
</ul>


<div id="controls">
<form id="#form" method="post" name="#form">
  <table style="width:15%">
<tr>
  <td></td>
  <td><button class = "btnStyle"id="up" name="btnUp" onClick="up" value="up">^</button></td>
  <td></td>
</tr>
<tr>
  <td><button class = "btnStyle" id="left" name="btnLeft" onClick="left" value="left"><</button></td>
  <td><button class = "btnStyle" id="stop" name="btnStop" onClick="stop" value="stop">o</button></td>
  <td><button class = "btnStyle" id="right" name="btnRight" onClick="right" value="right">></button></td>
</tr>
<tr>
  <td></td>
  <td><button class = "btnStyle" id="down" name="btnDown" onClick="down" value="down">V</button></td>
  <td></td>
</tr>
</table>

</form>
</div>

</head>
</html>
