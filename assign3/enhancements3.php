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
include('enhancement3_server.php');
include('header.inc');

?>

<div class="bred">
    <h1>Manage Enahancement</h1>
</div>

<br>
<a href="phpenhancements.php" class="link"> Enahancement details</a> <br>

<p style="font-size: 25px;text-align: center;color: green;text-decoration: underline">Manage EOI
</p>



<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    <label for="FName">Select Sorting column:</label>

    <select name="sort_key" id="state" required="required">

       
        <option selected value="first_name">first name</option>
        <option value="EOInumber">ID</option>
        <option value="last_name">last Name</option>
        <option value="job_reference_number">Job Ref no</option>
        <option value="street_address">Street Address</option>
        <option value="suburb_address">Suburb Address</option>
        <option value="dob">DOB</option>
        <option value="state">State</option>
        <option value="postcode">Postcode</option>
        <option value="email">Email</option>
        <option value="phone_number">PN</option>
        <option value="skills">Skills</option>
        
       
    </select
    >&nbsp;&nbsp;

    <input name="submit" type="submit" value="Get Result" class="button"/>
</form>




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

        echo "</tr>";
    }


    ?>
</table>


<?php
include 'footer.inc'
?>

</body>
</html>

























