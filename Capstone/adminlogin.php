<?php
$a=$_GET["name"];
$p=$_GET["pass"];
if($a=="rajesh" && $p=="12345")
{
    echo "admin login successfully";
    header("refresh:3; url=insertrestaurent.html");
}
else
{
    echo "only admins are  login";
}
?>