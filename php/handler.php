<?php
include "../includes/declaration.php";

if ($_POST['target'] == "login"){
    user::login($_POST['email'], $_POST['password']);
}else if ($_POST['target'] == "register"){
    user::register($_POST);
}
header("location: index.php");
/* made by Menno & Tycho */