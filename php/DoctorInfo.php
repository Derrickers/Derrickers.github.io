<?php
header("Content-Type:text/html;charset=utf-8");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
if(empty($q)) {
    echo "请输入检索条件";
    exit;
}

//$con = mysqli_connect('10.203.209.240','root','25981745');
$con = new MySQLi("localhost","root","25981745","data");
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
}elseif ($tok == "2") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE doc_name = '".$tok."'";
}elseif ($tok == "3") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE doc_id = '".$tok."'";
}elseif ($tok == "4") {
  $tok = strtok(" ");
  $sql="SELECT * FROM doc_info WHERE department = '".$tok."'";
}else {
  echo "请输入检索条件";
  exit;
}

$result = mysqli_query($con,$sql);
if($result){
  echo "<br><br><br><table border='1'><tr><th>url</th><th>id</th><th>hospital</th><th>name</th><th>faculty</th></tr>"；
  while($row = mysqli_fetch_array($result))
  {
  echo "<br><br><br><table border='1'><tr><th> $row['link'] </th><th> $row['doc_id'] </th><th> $row['hos_name'] </th><th> $row['doc_name'] </th><th> $row['department'] </th></tr>";
  }
  echo "</table><br><br><br><br> ";
}
mysqli_close($con);

?>
