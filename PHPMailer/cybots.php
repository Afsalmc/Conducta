<?php
echo 'hello';

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
 //my sql things////////////////////////////////////////
 
$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



 if(isset($_GET['id']) && !empty($_GET['id']) AND isset($_GET['priv_id']) && !empty($_GET['priv_id'])){
 
 
 
 /////////////////////////////////////////////HEIR BEGINS////////////////////////////////////////
    // Verify data
    $id = ($_GET['id']); // Set email variable
    $priv_id = ($_GET['priv_id']); // Set hash variable
$sql = "SELECT  * FROM secret WHERE code='".$priv_id."';";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "link confirmed";
  // output data of each row
while($row = mysqli_fetch_assoc($result)) {
    $sql = "SELECT  * FROM apps WHERE priv_id='".$priv_id."';";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "track=".$row["track"];
        if ($row["track"] == 0) {
           $track = $row["track"] + 1 ; 
           $sql = "UPDATE apps SET track = '".$track."' where priv_id='".$priv_id."';";
           $result = mysqli_query($conn,$sql);
           $sql = "DELETE FROM secret where code='".$priv_id."';";
           $result = mysqli_query($conn,$sql);
           $sql = "SELECT  * FROM apps WHERE id='".$id."';";
           $result = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($result)) { 
              $cls= $row["class"] ;
              echo "class=".$cls;
              $sql = "SELECT  * FROM staff WHERE class='".$cls."';";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)) {
               $s= $row["email"];
               echo "next_email=".$s;
               $r=$row["name"];
               $priv_id=random_int (1000 , 9999);
                $sql = "INSERT INTO secret (faculty, code) VALUES ('".$row["fac_name"]."','.$priv_id.');";
                $result = mysqli_query($conn, $sql);
                $sql = "UPDATE apps SET priv_id = '".$priv_id."' where id='".$id."';";
                $result = mysqli_query($conn, $sql);
                $mailu->addAddress($s,$r);
                echo 'is the staff advisor mail';
                $mailu->isHTML(true);
                $mailu->Subject = 'Conducta Authorisation';
                $sql = "SELECT  * FROM apps WHERE id='".$id."';";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                     $url="http://www.conducta.rf.gd/PHPMailer/cybots.php?id=$id&priv_id=$priv_id";
                     $mailu->Body = $row["letter"]."<br>to accept please click the url below<br>".$url;
                     $mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';
                     $mailu->send();
                }
                 } } } 
        elseif ($row["track"] == 3) {
           $track = $row["track"] + 1 ; 
           $sql = "UPDATE apps SET track = '".$track."' where priv_id='".$priv_id."';";
           $result = mysqli_query($conn,$sql);
           $sql = "DELETE FROM secret where code='".$priv_id."';";
           $result = mysqli_query($conn,$sql);
           $sql = "SELECT  * FROM apps WHERE id='".$id."';";
           $result = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($result)) { 
              $cls= $row["class"] ;
              echo "your class=".$cls;
              if($cls[0]=='C'){ $dept="cs";}
              elseif($cls[0]=='T'){$dept="ec";}
              elseif($cls[0]=='M'){$dept="mech";}
              elseif($cls[0]=='U'){$dept="mech";}
              elseif($cls[0]=='P'){$dept="mech";}
              else{$dept="bt";}
              
              echo "your dept=".$dept;
              $sql = "SELECT  * FROM hod WHERE dept='".$dept."';";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)) {
               $s= $row["email"];
               echo "next_email=".$s;
               $r=$row["name"];
               $priv_id=random_int (1000 , 9999);
                $sql = "INSERT INTO secret (faculty, code) VALUES ('".$row["name"]."','.$priv_id.');";
                $result = mysqli_query($conn, $sql);
                $sql = "UPDATE apps SET priv_id = '".$priv_id."' where id='".$id."';";
                $result = mysqli_query($conn, $sql);
                $mailu->addAddress($s,$r);
                $mailu->isHTML(true);
                $mailu->Subject = 'Conducta Authorisation';
                $sql = "SELECT  * FROM apps WHERE id='".$id."';";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                     $url="http://www.conducta.rf.gd/PHPMailer/cybots.php?id=$id&priv_id=$priv_id";
                     $mailu->Body = $row["letter"]."<br>to accept please click the url below<br>".$url;
                     $mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';
                     $mailu->send();
                }
                 } } } 
        else {
              
           
        
        $track = $row["track"] + 1 ;
        $sql = "UPDATE apps SET track = '".$track."' where priv_id='".$priv_id."';";
        $result = mysqli_query($conn,$sql);
        $sql = "DELETE FROM secret where code='".$priv_id."';";
        $result = mysqli_query($conn,$sql);
        echo "deleted";
        $sql = "SELECT  * FROM cybots WHERE heir='".$track."';";
        $reslt = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($reslt)) {
           $s= $row["email"];
           $r=$row["fac_name"];
           if ($row["fac_name"] == finish){
                echo "mission complete";
                $sql = "SELECT  * FROM rec;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $numsucc = $row["numsucc"] + 1 ;
                    $sql = "UPDATE rec SET numsucc = '".$numsucc."';";
                    $result = mysqli_query($conn,$sql); }
                $sql = "UPDATE apps SET priv_id = 0000 where id='".$id."';";
                $result = mysqli_query($conn, $sql);
                $sql = "SELECT  * FROM apps WHERE id='".$id."';";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $e= $row["email"];
                    $n= $row["name"];
                    $ev=$row["event"];}
                $mailu->addAddress($e,$n);
                $mailu->isHTML(true);
                $mailu->Subject = 'Conducta Authorisation Complete !!';
                $mailu->Body = "your conducta Authorisation is complete ".$n." for the event ".$ev;
                $mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';
                $mailu->send();
                
                }
            else {
                $priv_id=random_int (1000 , 9999);
                $sql = "INSERT INTO secret (faculty, code) VALUES ('".$row["fac_name"]."','.$priv_id.');";
                $result = mysqli_query($conn, $sql);
                $sql = "UPDATE apps SET priv_id = '".$priv_id."' where id='".$id."';";
                $result = mysqli_query($conn, $sql);
                $mailu->addAddress($s,$r);
                $mailu->isHTML(true);
                $mailu->Subject = 'Conducta Authorisation';
                $sql = "SELECT  * FROM apps WHERE id='".$id."';";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                     echo $row["letter"];
                     $url="http://www.conducta.rf.gd/PHPMailer/cybots.php?id=$id&priv_id=$priv_id";
                     $mailu->Body = $row["letter"]."<br>to accept please click the url below<br>".$url;
                     $mailu->AltBody = 'You cant viewactual mail ! Kindly use a mail viewer that supports Html';
                     $mailu->send();
                }
                
                
                
              }
                 
                
        
        }
               
            } }
  }else {
  echo "appsil priv_id illa !";
}
} 
}else {
  echo "link expired !";
  echo 123333333;
}
}



///////////////////////////////////////////////////////EMAIL CONFI//////////////////////////////////////////////////////////////////////////////////




else { 


$letter = '<h1>Request letter</h1> <b>Respected sir .. i am </b>'. $_POST["name"] .'&nbsp;'.'&nbsp;'.'of class'.$_POST["class"]. 'i want to conduct an event called'.'&nbsp;' . $_POST["event"] .'&nbsp;'. 'in our clg.' .'&nbsp;'.'&nbsp;'.'more info about our event is given below'.'<br>'.$_POST["more"].'<br>Kindly grant Permission';




$id=random_int (10000 , 99999);
$priv_id=random_int (1000 , 9999);

///////////////////////////////////////
echo $_POST["class"];
$sql = "INSERT INTO apps (id,name, email, letter,track,priv_id,event,categ,class) VALUES ('.$id.','".$_POST["name"]."','".$_POST["email"]."','.$letter.',0,'.$priv_id.','".$_POST["event"]."','cybots','".$_POST["class"]."');";
$worked=mysqli_query($conn,$sql);
if (!$worked) 
{
    echo "Error : error in application registration step";
}
else
{
    echo "Application registered<br>";
}      

$sql = "INSERT INTO secret (faculty, code) VALUES ('".$_POST["name"]."','.$priv_id.');";
$result = mysqli_query($conn, $sql);
if (!$result) 
{
    echo "Error : error in secret step";
}
else
{
    echo "secret registered<br>";
}

$url="http://www.conducta.rf.gd/PHPMailer/cybots.php?id=$id&priv_id=$priv_id";
$sql = "SELECT  * FROM rec;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
        $numtot = $row["numtot"] + 1 ;
        $sql = "UPDATE rec SET numtot = '".$numtot."';";
        $result = mysqli_query($conn,$sql); }

try {
//////////////user mail/////////////////////
//Recipients
 $mailu->addAddress($_POST["email"], $_POST["name"]); // Add a recipient
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
}
?>
 
