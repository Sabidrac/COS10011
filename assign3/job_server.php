<?php
include 'settings.php';
$conn = OpenCon();


$errors['all_errors'] = array();
$message = '';
$title = 'Store ';
$the_job = null;
$data = [];


if (isset($_GET["submit"]) && $_GET["submit"] == 'Edit' && $_SERVER["REQUEST_METHOD"] == "GET") {
    $title = 'Update';

    $id = $_GET['id']; // get id through query string
    $qry = $conn->query("select * from job_description where id='$id'"); // select query
    $data = mysqli_fetch_array($qry); // fetch data

}
// for Delete
if (isset($_GET["submit"]) && $_GET["submit"] == 'Delete' && $_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id']; // get id through query string

    $d_sql = "delete  FROM job_description WHERE id='" . $id . "'";
    $message = 'Successfully delete the job descripton.';
    $result = $conn->query($d_sql);


}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $sql = "CREATE TABLE IF NOT EXISTS job_description (
                          id int(11) AUTO_INCREMENT,
                          position_title varchar(255) NOT NULL,
                          job_reference_number varchar(255) NOT NULL UNIQUE,
                          job_type  varchar(255) NOT NULL,
                          salary  varchar(255) NOT NULL,
                          report_to  varchar(255) NOT NULL,
                          PRIMARY KEY  (id)
                          )";

    if ($conn->query($sql) === TRUE) {
        // echo "Table created successfully";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $errors = array();
    if (empty($_POST['job_reference_number']))
        $errors['job_reference_number'] = "Job ref number is required";
    if (strlen(validate_field($_POST['job_reference_number'])) != 5)
        $errors['job_reference_number'] = "Job ref number should be exactly 5 char";

    if (empty($_POST['position_title']))
        $errors['position_title'] = "position_title is required";

    if (empty($_POST['job_type']))
        $errors['job_type'] = "job_type is required";


    if (empty($_POST['salary']))
        $errors['job_type'] = "job_type is required";



    if (empty($_POST['report_to']))
        $errors['report_to'] = "report_to is required";


    $job_reference_number = $_POST['job_reference_number'];
    $position_title = $_POST['position_title'];
    $job_type = $_POST['job_type'];
    $report_to = $_POST['report_to'];
    $salary = $_POST['salary'];

    if (sizeof($errors) > 0) {// at least one error found
        $_SESSION["errors"] = $errors;
        $errors["all_errors"] = $errors;

    } else {

        // print_r($_POST);
        $in_or_up = '';
        if (isset($_POST['update'])) {
            $id = $_POST['id'];

            $sql = "update job_description set job_reference_number='$job_reference_number', position_title='$position_title',
                  report_to='$report_to',job_type='$job_type',salary='$salary' where id='$id'";

            $in_or_up = " updated";

        } else {
            $sql = "INSERT INTO job_description (job_reference_number,position_title,job_type,salary,report_to) 
              VALUES ('$job_reference_number','$position_title','$job_type','$salary','$report_to')";
            $in_or_up = " inserted";

        }


        if ($conn->query($sql) === TRUE) {
            $message = "Job Description " . $in_or_up . " successfully";
        } else {
            $errors["all_errors"] = ["Error: " . $sql . "<br>" . $conn->error];
        }

    }

}



$sql = "select * FROM job_description";
$result = $conn->query($sql);
if($result)
$total_rows = mysqli_num_rows($result);


function validate_field($data)
{
    if (is_array($data)) {
        return $data;
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
