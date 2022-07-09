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
echo "<h3><i>Hod list editing panel</h3></i>";
echo "<h6>Admin :".$nm." (".$em.")<h6>";
echo '<div class="table">';

echo '<div class="row header">';
echo '<div class="cell">';
echo 'Department';
echo '</div>';
echo '<div class="cell">';
echo '&nbsp;&nbsp;&nbsp;Current Faculty';
echo '</div>';
echo '<div class="cell">Email</div><div class="cell">New Faculty</div><div class="cell">email</div></div>';

$sql = "SELECT  * FROM hod order by no ;";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)) {
$name=$row["name"];
$email=$row["email"];
$dept=$row["dept"];
echo '<div class="row"><div class="cell">';
							echo $dept;
echo '</div><div class="cell">';
							echo $name;/////////////////////////////////
							echo '</div><div class="cell">';
							echo $email;/////////////////////////////////
							echo '</div><div class="cell"><form action="hod.php" method="POST"><INPUT background-color="red" TYPE="TEXT" NAME="name'.$i.'" SIZE="12"></div><div class="cell"><INPUT TYPE="email" NAME="email'.$i.'" SIZE="20"></div></div>';
$i=$i+1;    }
							
							
							
							
							echo '<div class="cell"><INPUT TYPE="password" class="form-control" NAME="pass" SIZE="12" required placeholder="Admin Passcode"></div>';
                            ?><div class="text-center">
                           <button class="btn btn-primary" type="submit">Save Changes</button>
                           </form>
                           <form id="form" name="form" action="/PHPMailer/pass.php" method="POST">
                           <button class="btn btn-danger" type="submit">Request new pass code</button>
                           
                           
                           

						
						</div>

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
