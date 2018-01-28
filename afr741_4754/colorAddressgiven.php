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
$input=$_POST['c_color'];
$input2=$_POST['a_address'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT P.pname, P.color\n"
    . "FROM Parts P\n"
    . "WHERE P.color='" .$input."'AND NOT EXISTS\n"
    . "(\n"
    . "SELECT S.sid\n"
    . "FROM Suppliers S\n"
    . "WHERE S.address='" .$input2."' AND S.sid NOT IN\n"
    . "(\n"
    . "SELECT C.sid\n"
    . "FROM Catalog C\n"
    . "WHERE C.pid=P.pid\n"
    . "))";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Part's NAME</th><th>Part's COLOR</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["pname"]."</td><td>".$row["color"]."</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
	
}
	echo "<a href=\"javascript:history.go(-1)\">GO BACK</a><br>";
	echo "<a href=\"javascript:history.go(-2)\">GO TO THE MAIN MENU</a>";
$conn->close();
?>
</body>
	</html>
