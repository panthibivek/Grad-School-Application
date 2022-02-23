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
<th>Student Name</th>
<th>Funding Received</th>
<th>Prospective Supervisor</th>
</tr>
<?php
  $uni = $_GET["uni"];
  $country = $_GET["country"];
  $program = $_GET["program"];
  $sql = "SELECT STUDENT_NAME, FUNDING_RECEIVED, PROSPECTIVE_SUPERVISOR
          FROM STUDENT_DETAILS
          WHERE STUDENT_DETAILS.UNI_APPLIED_TO = '$uni'
          AND STUDENT_DETAILS.COUNTRY = '$country' AND STUDENT_DETAILS.MS_OR_PHD = '$program';";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["STUDENT_NAME"]. "<td>". $row["FUNDING_RECEIVED"]. "</td>" . "<td>". $row["PROSPECTIVE_SUPERVISOR"]. "</td>". "</td></tr>";
  }
  } else { echo "<tr><td> 0 results </td></tr>"; }
    echo "</table>";
  $connect->close();
?>
</table>
</body>
</html>
