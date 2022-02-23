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
<th>Professors</th>
</tr>
<?php
  $uni = $_GET["uni"];
  $country = $_GET["country"];
  $sql = "SELECT PROF_NAME FROM PROFESSOR_DETAILS WHERE PROFESSOR_DETAILS.UNI_NAME = '$uni' AND PROFESSOR_DETAILS.COUNTRY = '$country';";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["PROF_NAME"]. "</td></tr>";
  }
  } else { echo "<tr><td> 0 results </td></tr>"; }
  echo "</table>";
  $connect->close();
?>
</table>
</body>
</html>
