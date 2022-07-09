<?php
$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$sql = "SELECT  * FROM admin;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
$pass=$row["pass"] ; }
if ($pass == $_POST["pass"])
{
$i=1;
$sql = "SELECT  * FROM hod order by no ;";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res)) {
if (!empty($_POST["name$i"])){
$no=$row["no"];
$name=$_POST["name$i"];
$sql= "update hod set name='$name' where no='$no';";
mysqli_query($conn,$sql);
}
if (!empty($_POST["email$i"])){
$no=$row["no"];
$email=$_POST["email$i"];
$sql= "update hod set email='$email' where no='$no';";
mysqli_query($conn,$sql);
}

$i=$i+1;
}
echo "success";
}
?>

