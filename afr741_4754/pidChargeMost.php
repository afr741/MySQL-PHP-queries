<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
$servername = "mysql.cs.mun.ca";
$username = "cs4754_afr741";
$password = "MmU4MDEw";
$dbname = "cs4754_afr741";
// Create connection
$input=$_POST['p_pid'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT P.pid, S.sname, S.address
FROM Parts P, Suppliers S, Catalog C
WHERE C.pid = '" .$input."'
AND C.sid = S.sid
AND C.cost = ( 
SELECT MAX( C1.cost ) 
FROM Catalog C1
WHERE C1.pid = P.pid )";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Part's ID</th><th>Supplier's NAME</th><th>Supplier's ADDRESS</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["pid"]."</td><td>". $row["sname"]."</td><td>". $row["address"]."</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results"."<br>";
}
	echo "<a href=\"javascript:history.go(-1)\">GO BACK</a><br>";
	echo "<a href=\"javascript:history.go(-2)\">GO TO THE MAIN MENU</a>";
$conn->close();
?>
</body>
	</html>
