<?php

session_start();

if($_POST['tokensv']==$_SESSION['tokensv']){

  $_SESSION['id'] = $_POST['id'];
  $_SESSION['coin'] = $_POST['coin'];
  $_SESSION['nick'] = $_POST['nick'];
  $_SESSION['clase'] = $_POST['clase'];

}

 ?>
