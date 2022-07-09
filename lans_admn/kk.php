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
echo "<h8>LANSCAPE is a technology cum cultural association of young innovative students and faculty of Computer Science and Engineering Department of SCTCE. The LANSCAPE members include department faculty members, post graduate students, under graduate students and alumni. It plays an influential role and promotes technical innovations, projects, research as well as national level cultural activities.

The mission of LANSCAPE is “to foster and conduct workshops and seminars to rejuvenate the research oriented thinking in the cutting edge field of computer science”.

LANSCAPE organizes seminars, workshops and provide sponsorship or technical support to the same. LANSCAPE seeks to encourage regional and international communication and collaboration, promotes professional interaction and life long learning. Lanscape formed a Code Club which encourages students to pursue group projects relevant to departmental as well as institutional requirements. It also recognizes the outstanding contribution of students and alumni of the department.

Live projects under Code Club are Department Website development, Staff Punching System development, Library Management Software development etc.

A FOSS Cell is also formed under landscape to promote Free and Open source Softwares among student which is in collaboration with ICFOSS, technopark.Hierarchy of faculties is given below
</h8>";
echo '<div class="table">';

echo '<div class="row header">';
echo '<div class="cell">';
echo '&nbsp;&nbsp;&nbsp;Faculty';
echo '</div>';
echo '<div class="cell">Email</div></div>';

$sql = "SELECT  * FROM lanscape order by heir ;";
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
