<?php
$servername="localhost";
$username="root";
$password="";
$dbname="restaurant";
$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
 die('Could not connect: '.mysqli_connect_error());
}
else
{
echo "connected sucessfully";
}
$s=0;
$u=$_POST["name"];
$p=$_POST["password"];
$sql="SELECT email,pws FROM table2 where email= '{$u}' ";
$result=$conn->query($sql);
if($result->num_rows>0)
{
 while($row=$result->fetch_assoc())
{
 if($row["email"]==$u && $row["pws"]==$p)
 {
   echo "You have been Successfully validated";
   $s=1;
   }
else
{
 echo "Credentials Wrong, Try again";
}
}
}
else
{
 echo "User name given was not exist";
}
$conn->close();
if ($s==1)
 header("refresh:3; url=p2.html");
else
header("refresh:3; url=p1.html");
?>