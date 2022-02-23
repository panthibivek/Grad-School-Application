<?php include './connect.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Name of Test</th>
</tr>
<?php
  $test = $_GET["TYPE_OF_TEST"];
  $country = $_GET["COUNTRY"];
  $sql = "SELECT NAME_OF_TESTS FROM TESTS WHERE TESTS.TYPE_OF_TEST = '$test' AND TESTS.COUNTRY = '$country';";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["NAME_OF_TESTS"]. "</td></tr>";
  }
  } else { echo "<tr><td> 0 results </td></tr>"; }
  echo "</table>";
  $connect->close();
?>
</table>
</body>
</html>
