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
<th>UNI_NAME</th>
<th>P_AVAILABLE</th>
<th>WORLD_R</th>
<th>SUBJECT_R</th>
</tr>
<?php
  $ranking = $_GET["NATIONAL_R"];
  $country = $_GET["COUNTRY"];
  $sql = "SELECT UNI_NAME, P_AVAILABLE, WORLD_R, SUBJECT_R FROM UNI WHERE UNI.NATIONAL_R = '$ranking' AND UNI.COUNTRY = '$country';";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["UNI_NAME"]. $row["P_AVAILABLE"]. $row["WORLD_R"]. $row["SUBJECT_R"]."</td></tr>";
  }
  } else { echo "<tr><td> 0 results </td></tr>"; }
  echo "</table>";
  $connect->close();
?>
</table>
</body>
</html>
