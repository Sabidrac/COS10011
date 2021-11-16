<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Job Application Form of REVE"/>
    <meta name="keywords" content="Job,Apply"/>
    <meta name="author" content="s103512168 "/>
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <title>Store Job Details</title>
</head>

<body>

<style>
.link {

color: green;
}
</style>







<?php
session_start();
include('job_server.php');

include('header.inc');

?>


<div class="bred">
    <h1>Store Job Details</h1>
</div>
<br/><br/>

<a href="phpenhancements.php" class="link"> Enahancement details</a> <br>


<div>
    <?php

    if (isset($errors['all_errors'])) {
        foreach ($errors['all_errors'] as $error) {
            echo '<span style="color: red">' . $error . '</span> </br>  ';
        }
    }


    echo '<span style="color: green;font-weight: bolder">' . $message . '</span> </br>  ';

    
    ?>
</div>

<article>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
          novalidate="novalidate"
          id='form'>
        <fieldset>
            <h2><?php echo $title ?> Job Description </h2>

            <br/><br/>

            <input
                type="hidden"
                name="id"
                value="<?php if ($data) echo $data['id'] ?>"

            />

            <label for="Rnumber">Job reference number</label>
            <input
                type="text"
                name="job_reference_number"
                id="Rnumber"
                value="<?php if ($data) echo $data['job_reference_number'] ?>"

            />
            <br/><br/><br/>
            <label for="FName">Position</label>
            <input
                type="text"
                name="position_title"
                value="<?php if ($data) echo $data['position_title'] ?>"
            />&nbsp;&nbsp;
            <label for="LName">Type</label>
            <input
                type="text"
                name="job_type"
                id="job_type"
                value="<?php if ($data) echo $data['job_type'] ?>"
            /><br/><br/>
            <label for="details">Salary Range</label>
            <input
                type="text"
                name="salary"
                value="<?php if ($data) echo $data['salary'] ?>"
                id="salary"/>
            <label for="Code">Report To</label>
            <input
                type="text"
                name="report_to"
                value="<?php if ($data) echo $data['report_to'] ?>"
                id="report_to"/>

            <br><br>
            <input name="submit" type="submit" value="Store" class="button"/>

            <input name="update" type="submit"  value="Update">
        </fieldset>
    </form>
</article>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Job Reference</th>
        <th>Position</th>
        <th>Type</th>
        <th>Salary</th>
        <th>Report</th>
        <th>
            Action
        </th>
    </tr>
    </thead>

    <?php
    if($result)
{
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['job_reference_number'] . "</td>";
        echo "<td>" . $row['position_title'] . "</td>";
        echo "<td>" . $row['job_type'] . "</td>";
        echo "<td>" . $row['salary'] . "</td>";
        echo "<td>" . $row['report_to'] . "</td>";
        echo "<td><nobr>

        <form action=\"store_job.php\" method=\"GET\">
        <input
        type=\"hidden\"
        name=\"id\" 
        value='" . $row['id'] . "'
    />
         <input name=\"submit\" type=\"submit\" value=\"Edit\" class=\"button\"/>
         <input name=\"submit\" type=\"submit\" value=\"Delete\" class=\"button\"/>
        </form>
        </nobr></td>";
        echo "</tr>";
    }
}

    ?>
</table>
<?php
include 'footer.inc'
?>

</body>
</html>

























