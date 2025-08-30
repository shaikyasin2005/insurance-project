<?php

session_start();

unset($_SESSION['name']);

header( "refresh:0;url=../index.php" ); 


?>