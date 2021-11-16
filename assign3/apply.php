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

<body>


<?php
include('processEOI.php');
include('header.inc');

?>


<div class="bred">
    <h1>Job Apply</h1>
</div>
<br/><br/>


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
            <h2>Apply for a position</h2>
            <h3>
                Please complete the form below to apply for a position with us
            </h3>
            <br/><br/>

            <label for="Rnumber">Job reference number</label>
            <input
                type="text"
                name="job_reference_number"
                id="Rnumber"
                pattern="[a-zA-Z0-9]{5}"
                readonly
                required="required"

            />
            <br/><br/><br/>
            <label for="FName">First Name</label>
            <input
                type="text"
                name="first_name"
                id="FName"
                pattern="[a-zA-Z]{1,20}"
                required="required"


            />&nbsp;&nbsp;
            <label for="LName">Last Name</label>
            <input
                type="text"
                name="last_name"
                id="LName"
                pattern="[a-zA-Z]{1,20}"

                required="required"
            /><br/><br/><br/>

            <label for="Date">Date of Birth</label>
            <input
                type="date"
                name="date"
                id="Date"
                onfocusout="dateValidation()"
            /> <span class="required" id="datevalid">Your age should between 15 to 80</span><br/><br/>

            <fieldset>
                <legend>Gender</legend>
                <br><br>
                <p>
                    <label>
                        <input
                            type="radio"
                            name="gender"
                            value="Male"
                            required="required"
                        />Male</label>

                    <label>
                        <input checked type="radio" name="gender" value="Female"/>Female</label>
                </p><br><br><br>
            </fieldset>
            <br/>
            <label for="address">Street Address</label>
            <input
                type="text"
                name="street_address"
                id="address"
                maxlength="40"
                required="required"
            />

            <label for="taddress">Subrub Adress</label>
            <input
                type="text"
                name="suburb_address"
                id="taddress"
                maxlength="40"
                required="required"
            /><br/><br/>

            <label for="State">State</label>
            <select name="state" id="state" required="required">
                <option value="">please select</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>

                <option value="ACT">ACT</option>
            </select
            >&nbsp;&nbsp;
            <label for="Code">Postcode</label>
            <input
                type="text"
                name="postcode"
                id="Code"
                pattern="[0-9]{4}"

                onfocusout="postcodeValidation()"
            /><span class="required" id="postCodeValid">Post code is not valid</span><br/><br/>
            <label for="email">Enter your email:</label>
            <input
                type="email"
                id="email"
                name="email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                required="required"
            />&nbsp;&nbsp;

            <label for="phone">Phone Number</label>
            <input
                type="text"
                id="phone"
                name="phone_number"
                pattern="[0-9\s]+{8,10}"
                required="required"
            /><br/><br/>

            <label>Skills(You can choose multiple ones):</label><br/><br/>
            <label
            ><input
                    type="checkbox"
                    name="skills[]"
                    value="Resilience"
                    checked="checked"
                />Resilience</label
            >
            <label
            ><input
                    type="checkbox"
                    name="skills[]"
                    value="Good communication"
                />Good communication</label
            >
            <label
            ><input
                    type="checkbox"
                    name="skills[]"
                    value="Teamwork and interpersonal skills"
                />Teamwork and interpersonal skills</label
            >
            <label
            ><input
                    type="checkbox"
                    name="skills[]"
                    value="Adaptability"
                />Adaptability</label
            >
            <label
            ><input
                    type="checkbox"
                    name="skills[]"
                    value="Effective leadership and management."
                />Effective leadership and management.</label
            >
            <label
            ><input type="checkbox" name="skills[]" value="Other Skills" onclick="Otherskills()" id="otherskills"/>Other
                Skills</label
            ><br><br>

            <p>
                <label>Other Skills</label><br/>
                <textarea
                    rows="8"
                    cols="80"
                    placeholder="Write about your other skills"
                    name="other_skills"
                    id="otherSkills"
                ></textarea>
            </p>

            <input name="submit" type="submit" value="Apply" class="button"/>
            <input type="reset" class="button" value="Reset"/>
        </fieldset>
    </form>
</article>
<?php
include 'footer.inc'
?>

<script src="scripts/apply.js">
</script>
</body>
</html>

























