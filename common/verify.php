<?php
session_start();

//echo $_SESSION['captcha_text'];

if ($_POST['captcha'] == $_SESSION['captcha_text'])
    echo "true";
else echo  "false";



?>