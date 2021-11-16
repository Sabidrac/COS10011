<?php
include 'settings.php';
$conn = OpenCon();


$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strstr($actual_link, 'processEOI.php')) {
    header("Location: jobs.php");
}



$errors['all_errors'] = array();
$message = '';
$state_list = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];



if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {




    $sql = "CREATE TABLE IF NOT EXISTS eoi (
                          EOInumber int(11) AUTO_INCREMENT,
                          job_reference_number varchar(255) NOT NULL,
                          first_name  varchar(255) NOT NULL,
                          last_name  varchar(255) NOT NULL,
                          dob  DATE NOT NULL,
                          street_address  varchar(255) NOT NULL,
                          suburb_address  varchar(255) NOT NULL,
                          state varchar(255) NOT NULL,
                          postcode  varchar(255) NOT NULL,
                          email varchar(255) NOT NULL,
                          phone_number  varchar(255) NOT NULL,
                          gender varchar(255) NOT NULL,
                          skills varchar(255) NOT NULL,
                          other_skills  VARCHAR (1000) NOT NULL,
                          status VARCHAR (255) DEFAULT 'new',
                          PRIMARY KEY  (EOInumber)
                          )";

    if ($conn->query($sql) === TRUE) {
        
    } else {
      
    }


    $errors = array();
    $job_reference_number = validate_field($_POST['job_reference_number']);
    $first_name = validate_field($_POST['first_name']);
    $last_name =validate_field( $_POST['last_name']);
    $date = validate_field($_POST['date']);
    $street_address = validate_field($_POST['street_address']);
    $suburb_address =validate_field( $_POST['suburb_address']);
    $state =validate_field( $_POST['state']);
    $postcode = validate_field($_POST['postcode']);
    $email = validate_field($_POST['email']);
    $phone_number = validate_field($_POST['phone_number']);
    $gender =validate_field( $_POST['gender']);
    $skills =isset($_POST['skills']) ? implode(',', validate_field($_POST['skills'])) : null;
    $otherskills_text =validate_field( $_POST['other_skills']);



    if (empty($job_reference_number))
        $errors['job_reference_number'] = "Job ref number is required";
    if (strlen($job_reference_number) != 5)
        $errors['job_reference_number'] = "Job ref number should be exactly 5 char";


    if (!strlen($first_name))
        $errors['first_name'] = "First Name is required";
    if (strlen($first_name) > 20)
        $errors['first_name'] = "Max 20 alpha character is allowed for first name!";


    if (empty($last_name))
        $errors['last_name'] = "Last Name is required";
    if (strlen($last_name) > 20)
        $errors['last_name'] = "Max 20 alpha character is allowed for first name!";



    $age = date_diff(date_create($date), date_create('now'))->y;
    if ($age < 15 || $age > 80)
        $errors['date'] = "Date must be between 15-80 years";

    if (empty($date))
        $errors['date'] = "Date is required";


    if (trim($street_address)==false)
        $errors['street_address'] = "Street address is required";
    if (strlen($street_address) > 40)
        $errors['street_address'] = "Max 40 alpha character is allowed for street address !";


    if (trim($suburb_address)==false)
        $errors['suburb_address'] = "Suburb address is required";
    if (strlen($suburb_address) > 40)
        $errors['suburb_address'] = "Max 40 alpha character is allowed for suburb_address!";


    if (trim($state)==false)
        $errors['state'] = "State is required";
    if (!trim($state)==false && !in_array($state, $state_list))
        $errors['state'] = "State must be in: " . implode(',', $state_list);


    if (!trim($state)==false && !isPostcodeValidForTheState($state, $postcode))
        $errors['postcode'] = "The Postcode " . $postcode . " is not allowed for the state: " . $state;

    if (strlen($postcode) != 4)
        $errors['postcode'] = "Exactly 4 digit is allowed for Postcode";
    if (trim($postcode)==false)
        $errors['postcode'] = "Postcode is required";


    if (trim($email)==false)
        $errors['email'] = "Email address is required";

    if (!trim($email)==false && !valid_email($email))
        $errors['email'] = "Invalid email format";


    if (trim($phone_number)==false && $phone_number != ' ')
        $errors['phone_number'] = "Phone Number is required";

    if (!trim($phone_number)==false && (strlen($phone_number) < 8 && strlen($phone_number) > 12))
        $errors['phone_number'] = "Phone Number must be between 8 to 12";

    if (!isset($_POST['skills']) || !count($_POST['skills']))
        $errors['skills'] = "Skill is needed to be selected";

    if (isset($_POST['skills']) && in_array('Other Skills', $_POST['skills']) && trim($_POST['other_skills'])==false)
        $errors['other_skills'] = "Other Skill is needed ";



    if (sizeof($errors) > 0) {
        $_SESSION["errors"] = $errors;
        $errors["all_errors"] = $errors;

    } else {

      

        $sql = "INSERT INTO eoi (job_reference_number,first_name, last_name,dob, street_address,suburb_address,state,postcode,email,phone_number,gender,skills) 
              VALUES ('$job_reference_number','$first_name','$last_name','$date','$street_address','$suburb_address','$state','$postcode','$email','$phone_number',
              '$gender','$skills')";

        if ($conn->query($sql) === TRUE) {
            $message = "New EOI created successfully";
        } else {
            $errors["all_errors"] = ["Error: " . $sql . "<br>" . $conn->error];
        }

        CloseCon($conn);
    }

} else {
    
    $errors['all_errors'] = array();
    $message = '';
   
}



// this function sanitizes all input data by user
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

// thsi function ensures the valid email is input
function valid_email($email)//https://www.w3schools.com/PHP/php_form_url_email.asp
{
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = false;;
    }

    return $result;
}


// this function check whether the postcode is valid for the selected state
function isPostcodeValidForTheState($state, $postcode)
{
    $postcode_list =array
    (
        'VIC' => '(3|8)',
        'NSW' => '1|2',
        'QLD' => '4|9',
        'NT' => '0',
        'WA' => '6',
        'SA' => '5',
        'TAS' => '7',
        'ACT' => '0'
    );


   
    if (!array_key_exists($state, $postcode_list))//https://www.w3schools.com/php/func_array_key_exists.asp
        return false;

    $splited_post_code = substr($postcode, 0, 1);
    $validation_rule = $postcode_list[$state];
    return (preg_match("/^$validation_rule$/", $splited_post_code) == 1);
}

?>
