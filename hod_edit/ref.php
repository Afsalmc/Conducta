<?php
require 'PHPMailerAutoload.php';

$mailu = new PHPMailer;
$mailu->SMTPDebug = 0; // Enable verbose debug output
 $mailu->isSMTP(); // Set mailer to use SMTP
 $mailu->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
 $mailu->SMTPAuth = true; // Enable SMTP authentication
 $mailu->Username = 'afsalrahman51@gmail.com'; // SMTP username
 $mailu->Password = 'mhlxlbhpcnrlmgba'; // SMTP password
 $mailu->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mailu->Port = 587;
 
$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$sql = "SELECT  * FROM admin;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
$mail=$row["email"] ;
$name=$row["name"];
}
$pass=random_int (1000 , 9999);
$sql = "UPDATE admin SET pass = '".$pass."';";


$mailu->addAddress($mail,$name);
$mailu->isHTML(true);
$mailu->Subject = 'Conducta Admin Passcode';
$mailu->Body = $pass."<br>your new Conducta Admin Password<br>".$url;
$mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';
$mailu->send();?>

