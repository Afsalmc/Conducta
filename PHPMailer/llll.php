<?php

require 'PHPMailerAutoload.php';

$mailu = new PHPMailer;
echo "hello";

$letter = '<h1>Request letter</h1> <b>hii sir .. i am </b>'. $_POST["first_name"] .'&nbsp;'. $_POST["last_name"] .'&nbsp;'. 'i want to conduct an event called'.'&nbsp;' . $_POST["event"] .'&nbsp;'. 'in our clg for' .'&nbsp;'.$_POST["days"].'&nbsp;'.'days'.'&nbsp;'.'<br>onn enikk permission thanoode ponn muthee';


//my sql things////////////////////////////////////////
$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=random_int (10000 , 99999);
$priv_id=random_int (1000 , 9999);

///////////////////////////////////////
$sql = "INSERT INTO apps (id,name, email, letter,track,priv_id) VALUES ('.$id.','".$_POST["first_name"]."','".$_POST["email"]."','.$letter.',0,'.$priv_id.');";
$worked=mysqli_query($conn,$sql);
if (!$worked) 
{
    echo "Error : error in application registration step";
}
else
{
    echo "Application registered<br>";
}      

$sql = "INSERT INTO secret (faculty, code) VALUES ('".$_POST["first_name"]."','.$priv_id.');";
$result = mysqli_query($conn, $sql);
if (!$result) 
{
    echo "Error : error in secret step";
}
else
{
    echo "secret registered<br>";
}

$url="http://www.conducta.rf.gd/PHPMailer/lanscape.php?id=$id&priv_id=$priv_id";
$sql = "SELECT  * FROM rec;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
        $numtot = $row["numtot"] + 1 ;
        $sql = "UPDATE rec SET numtot = '".$numtot."';";
        $result = mysqli_query($conn,$sql); }

try {
//////////////user mail/////////////////////
 $mailu->SMTPDebug = 0; // Enable verbose debug output
 $mailu->isSMTP(); // Set mailer to use SMTP
 $mailu->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
 $mailu->SMTPAuth = true; // Enable SMTP authentication
 $mailu->Username = 'afsalrahman51@gmail.com'; // SMTP username
 $mailu->Password = 'mhlxlbhpcnrlmgba'; // SMTP password
 $mailu->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mailu->Port = 587; // TCP port to connect to
//Recipients
 $mailu->setFrom('maakri@gmail.com', 'Mailer');
 $mailu->addAddress($_POST["email"], $_POST["first_name"]); // Add a recipient
 //$mail->addReplyTo('maaaan@example.com', 'Information');
 //$mail->addCC('cc@example.com');
 //$mail->addBCC('bcc@example.com');
// Attachments
 //$mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
 //$mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

// Content
$mailu->isHTML(true); // Set email format to HTML
$mailu->Subject = $_POST["event"];

$mailu->Body = "<h1>A Conducta authorisation is initialized from your email id.</h1> <h2>if it was you ,click the url</h2>".$url."<h2>to confirm and  you can Track your progress with id :</h2>".$id."<br>"."<h3>if it wasn't you , you can simply avoid this email , probably somebody is just spaming . Copy of request letter generated is given below . Thanks !!</h3>".$letter;
$mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';

$mailu->send();
echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
 
