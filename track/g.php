<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conducta Track</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Goldman&display=swap');
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
sp
{
color: #999909
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>

<?php
//my sql things////////////////////////////////////////
 
$conn = mysqli_connect("sql309.epizy.com", "epiz_27029530", "rpihQ8cIFE", "epiz_27029530_prog");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$sql = "SELECT  * FROM apps WHERE id='".$_POST["id"]."';";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
        $track=$row["track"];
        $event=$row["event"];
        $categ=$row["categ"];
        $name=$row["name"];
        $email=$row["email"];
    }
$p=0;
echo "<h1>Event name : ".$event."</h1>";
if ($track==0) { echo "waiting for self confirmarion";}
else{
$sql = "SELECT  * FROM $categ WHERE heir<'".$track."' order by heir;";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
$p=1;
echo "<table><tr><th>No.</th><th>Faculty</th><th>Status</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>".$row["heir"]."</td><td>".$row[fac_name]."</td><td>"."&#10004;"."</td></tr>";}}
$sql = "SELECT  * FROM $categ WHERE heir='".$track."';";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
if ($p==0){echo "<table><tr><th>No.</th><th>Faculty</th><th>Status</th></tr>";}
while($row = mysqli_fetch_assoc($result)) {
          if ($row["fac_name"]!='finish'){
          echo "<tr><td>".$row["heir"]."</td><td>".$row[fac_name]."</td><td>"."<sp>waiting for approval</sp>"."</td></tr>";
           echo "</table>";
         }
          else { 
           echo "</table>";
           echo "<br>Permission granted by all faculty involved !";}
    } }

}
}
else { echo "No record found" ; }
?>

</table>
</body>
</html>
