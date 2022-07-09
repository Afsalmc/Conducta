<html lang="en">
<head>
	<title>Table V02</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


<?php

$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$i=1;

$sql = "SELECT  * FROM admin;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
$nm=$row["fac_name"];
$em=$row["email"]; }
echo '<div class="limiter">';
echo '<div class="container-table100">';
echo '<div class="wrap-table100">';
echo "<h8>Cybots, the robotics club of SCTCE, formed by students interested in the field of robotics and latest advancements in the robotics industry. It was introduced to provide a knowledge dissemination platform for the students. It also guides their journey into the realm of technology that shapes and nurtures the creative thirst and sculpts the potential of Young Minds. Founded by the students of 2015-19 Electronics and Communication Engineering batch, it comprises of students from all years and works under the Department of Electronics and Communication Engineering. Being one of the youngest clubs of SCTCE, it was formed keeping in mind the competitive nature of today’s industry and the need of practical knowledge within students of Engineering. It aims to guide and mentor, students who are interested in the field of robotics, encourage their participation in robotic competitions at inter and intra-college level. Also, the club conducts numerous workshops and competitions in light of the same, on both peer to peer and professional level.Hierarchy of Cybots is given below 
</h8>";
echo '<div class="table">';

echo '<div class="row header">';
echo '<div class="cell">';
echo '&nbsp;&nbsp;&nbsp;Faculty';
echo '</div>';
echo '<div class="cell">Email</div></div>';

$sql = "SELECT  * FROM cybots order by heir ;";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)) {
$name=$row["fac_name"];
$email=$row["email"];
if(($email!='staff@staff.com') and ($email!='fin@fin.com')){
echo '<div class="row">';
echo '<div class="cell">';
							echo $name;/////////////////////////////////
							echo '</div><div class="cell">';
							echo $email;/////////////////////////////////
							echo '</div></div>';
$i=$i+1;    }}
							
							
							
							
                            ?>

					</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
