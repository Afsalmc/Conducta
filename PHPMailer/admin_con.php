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
 $mailu->setFrom('afsalrahman51@gmail.com', 'Conducta');
 
$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

if(isset($_GET['secret']) && !empty($_GET['secret'])){
$secret = ($_GET['secret']);
$sql = "SELECT  * FROM admin_temp WHERE secret='".$secret."';";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
$email=$row["email"];
$name=$row["name"];}
$sql= "update admin set email='$email', name='$name';";
mysqli_query($conn,$sql);
echo "Congrats! You are the new Admin of Conducta SCTCE .KINDLY RESET YOUR PASSCODE FROM Conducta Admin PANEL . All the best !"; 


    }
else {echo "URL expired/malformed !";}

}
else{

$sql = "SELECT  * FROM admin;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
$pass=$row["pass"] ; }
if ($pass == $_POST["pass"]){
$secret=random_int (10000 , 99999);
$email=$_POST["email"];
$name=$_POST["name"];
$sql= "update admin_temp set email='$email', name='$name', secret='$secret';";
mysqli_query($conn,$sql);
echo "Confirm from the given new admin email to complete the process";
$mailu->addAddress($email,$name);
$mailu->isHTML(true);
$mailu->Subject = 'Conducta Admin Change';

$url="http://www.conducta.rf.gd/PHPMailer/admin_con.php?secret=$secret";
$mailu->Body = "<br>The current Admin of Conducta SCTCE has nominated you as the next Admin . To accept and become the new Admin please click the url below<br>".$url;
$mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';
$mailu->send();

}else { echo "Wrong Passcode";} }
?>
