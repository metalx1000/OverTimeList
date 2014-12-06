<?php
include("connect.php");
$table="mydata2";

$_GET = array_map('strip_tags', $_GET);
$_GET = array_map('htmlspecialchars', $_GET);

//date format and time zone
date_default_timezone_set('America/New_York');
$date = date('l jS \of F Y h:i:s A');

$udate = date_create();
$pid = date_timestamp_get($udate);

$sql="INSERT INTO $table (pid) VALUES ('$pid')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

foreach($_GET as $key => $value) {
    echo 'Current value in $_GET["' . $key . '"] is : ' . $value . '<br>';
    $entry = mysqli_real_escape_string($con, $value);
    //$sql="UPDATE WHERE pid='$pid' $table ($key) VALUES ('$entry')";
    $sql="UPDATE $table SET $key='$entry' WHERE pid='$pid'";

    mysqli_query($con,$sql);
    //if (!mysqli_query($con,$sql)) {
    //  die('Error: ' . mysqli_error($con));
    //}
}

$sql="UPDATE $table SET date='$date' WHERE pid='$pid'";
mysqli_query($con,$sql);
//if (!mysqli_query($con,$sql)) {
//  die('Error: ' . mysqli_error($con));
//}

mysqli_close($con);

echo "<br>$date";
?>
