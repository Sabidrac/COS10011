<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Job Application Form of REVE"/>
    <meta name="keywords" content="Job,Apply"/>
    <meta name="author" content="s103512168 "/>
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <title>Apply</title>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .link {

        color: green;
    }
</style>
<body>

<?php
session_start();
include('manage_server.php');
include('header.inc');

?>
<div class="bred">
    <h1>Manage</h1>
</div>
<br>
<br>
<br>

<a href="manage.php" class="link">All</a> <br>
<a href="manage.php?referance_number=A12N5" class="link">A12N5</a>
<a href="manage.php?referance_number=123B2" class="link">123B2</a>

<br>
<form action="manage.php" method="GET">
    <label for="FName">First Name:</label>
    <input
        type="text"
        name="first_name"
        id="FName"

    />&nbsp;&nbsp;<label for="LName">Last Name:</label>
    <input
        type="text"
        name="last_name"
        id="LName"

    />&nbsp;&nbsp;

    <input name="submit" type="submit" value="Get Result" class="button"/>
</form>

<form action="manage.php" method="GET">
    <label for="FName">Job Reference Number:</label>
    <input
        type="text"
        name="deleteable_job_reference_number"
        id="job_reference_number"

    /> <input name="submit" type="submit" value="Delete all" class="button"/>
</form>
<p style="font-size: 25px;text-align: center;color: green;text-decoration: underline">Manage EOI
    <?php
    echo '(' . $total_rows . ')'

    ?>
</p>

<p style="font-size: 25px;text-align: center;color: green;">
    <?php    echo $success_message;    ?>
</p>


<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Job Reference</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>DOB</th>
        <!-- <th>Gender</th> --> 
        <th>Street Address</th>
        <th>Suburb Address</th>
        <th>State</th>
        <th>Postcode</th>
        <th>PN</th>
        <th>Skills</th> 
        <th>Status</th>
        <th>Email</th>
        <th>Status</th>
    </tr>
    </thead>

    <?php

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['EOInumber'] . "</td>";
        echo "<td>" . $row['job_reference_number'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . date_format(date_create($row['dob']), 'd/m/Y ') . "</td>";
        echo "<td>" . $row['street_address'] . "</td>";
        echo "<td>" . $row['suburb_address'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['postcode'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "<td>" . $row['skills'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td><nobr>

        <form action=\"manage.php\" method=\"GET\">
        <label  >".$row['status']."</label> <br>
        <input
        type=\"hidden\"
        name=\"eoi_id\" 
        value='" . $row['EOInumber'] . "'
    />
        
         <select name=\"status\" id=\"status\" >
                        <option value=\"New\">New</option>
                        <option value=\"current\">Current</option>
                        <option value=\"final\">Final</option>
                    </select
                    >&nbsp;&nbsp;
                       <input name=\"submit\" type=\"submit\" value=\"change\" class=\"button\"/>
        </form>
        </nobr></td>";
        echo "</tr>";
    }


    ?>
</table>

<?php
include 'footer.inc'
?>

</body>
</html>

























