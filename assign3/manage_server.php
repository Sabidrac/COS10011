<?php
include 'settings.php';
$conn = OpenCon();
//echo "Connected Successfully";

$data = array();
$success_message = '';
$total_rows = 0;
$referance_number = isset($_GET['referance_number']) ? $_GET['referance_number'] : null;
$first_name = isset($_GET['first_name']) ? $_GET['first_name'] : null;
$last_name = isset($_GET['last_name']) ? $_GET['last_name'] : null;
$deleteable_job_reference_number = isset($_GET['deleteable_job_reference_number']) ? $_GET['deleteable_job_reference_number'] : null;
$eoi_id = isset($_GET['eoi_id']) ? $_GET['eoi_id'] : null;
$status = isset($_GET['status']) ? $_GET['status'] : null;



if ($eoi_id) {
    $d_sql = "UPDATE eoi set status='" . $status . "' WHERE EOInumber=" . $eoi_id . "";
    $result = $conn->query($d_sql);
    $success_message = 'Successfully changed the status';
}


if ($deleteable_job_reference_number) {
    $d_sql = "delete  FROM eoi WHERE job_reference_number='" . $deleteable_job_reference_number . "'";
    $success_message = 'Successfully delete all job those have: ' . $deleteable_job_reference_number;
    $result = $conn->query($d_sql);

}


if ($referance_number) {
    $sql = "select * FROM eoi WHERE job_reference_number='" . $referance_number . "'";

} else if ($first_name || $last_name) {

    if ($first_name) {
        $sql = "select * FROM eoi WHERE first_name='" . $first_name . "'";

    }
    if ($last_name) {
        $sql = "select * FROM eoi WHERE last_name='" . $last_name . "'";

    }
    if ($first_name && $last_name) {
        $sql = "select * FROM eoi WHERE first_name='" . $first_name . "' and last_name='" . $last_name . "'";
    }

} else {
    $sql = "select * FROM eoi";
}



$result = $conn->query($sql);
if ($result)
$total_rows = mysqli_num_rows($result);
//echo $d_sql;


CloseCon($conn);


?>
