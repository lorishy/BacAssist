<?php

if(isset($_POST["AcceptCookie"])){

    setcookie("AcceptCookie", "true", time() + 60 * 60 * 24 * 30, "/");
    $url = $_POST["url"];
    header("location: ..$url");
}