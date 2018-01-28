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
$input=$_POST['p_name'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT Suppliers.sname, Suppliers.sid, Suppliers.address, Catalog.cost\n"
    . "FROM Catalog, Suppliers, Parts\n"
    . "WHERE Parts.pname='" .$input."' AND Parts.pid=Catalog.pid AND Suppliers.sid=Catalog.sid";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr><th>Sailor's ID</th><th>Sailor's name</th><Th>Sailor's address</th><th>Cost of a Part</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["sid"]."</td><td>". $row["sname"]."</td><td>". $row["address"]."</td><td>". $row["cost"]."</td></tr>";
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

