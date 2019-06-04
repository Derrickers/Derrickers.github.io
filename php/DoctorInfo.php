<?php
header("Access-Control-Allow-Origin：http://Derrickers.github.io");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

if(empty($q)) {
    echo '请输入检索条件';
    exit;
}

$con = mysqli_connect('10.203.209.240','root','25981745','data');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"test");

mysqli_set_charset($con, "utf8");

$tok = strtok($q," ");
if ($tok == "1") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE hos_name = '".$tok."'";
}
elseif ($tok == "2") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE doc_name = '".$tok."'";
}
elseif ($tok == "3") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE doc_id = '".$tok."'";
}
elseif ($tok == "4") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE department = '".$tok."'";
}
else {
  echo '请输入检索条件';
  exit;
}

$result = mysqli_query($con,$sql);

echo "<br>
<br><hr><br><table border='1'>
<tr>
<th>url</th>
<th>id</th>
<th>hospital</th>
<th>name</th>
<th>faculty</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['url'] . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['hospital'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['faculty'] . "</td>";
    echo "</tr>";
}
echo "</table><br><hr><br><br><br>";

mysqli_close($con);
?>
