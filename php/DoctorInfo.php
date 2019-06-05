<?php
header("Content-Type:text/html;charset=utf-8");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

if(empty($q)) {
    echo '请输入检索条件';
    exit;
}

//$con = mysqli_connect('10.203.209.240','root','25981745');
$con = new MySQLi("10.203.209.240","root","25981745","data");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"data");

//mysqli_set_charset($con, "utf8");

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

$T = "<table border='1'>
<tr>
<th>url</th>
<th>id</th>
<th>hospital</th>
<th>name</th>
<th>department</th>
</tr>";

html_entity_decode($T,ENT_QUOTES, 'UTF-8');

echo $T;

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['link'] . "</td>";
  echo "<td>" . $row['doc_id'] . "</td>";
  echo "<td>" . $row['hos_name'] . "</td>";
  echo "<td>" . $row['doc_name'] . "</td>";
  echo "<td>" . $row['department'] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>
