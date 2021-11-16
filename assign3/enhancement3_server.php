<?php
include 'settings.php';
$conn = OpenCon();
//echo "Connected Successfully";

$data = array();
$total_rows = 0;
$sort_key = isset($_GET['sort_key']) ? $_GET['sort_key'] : null;


if (isset($_GET['sort_key']) && $_GET['sort_key']) {
    $sql = "select * FROM eoi ORDER by " . $sort_key;

} else {
    $sql = "select * FROM eoi";
}


$result = $conn->query($sql);

if ($result)
    $total_rows = mysqli_num_rows($result);


CloseCon($conn);


?>
