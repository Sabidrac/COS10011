
<?php
function OpenCon()
{
    $dbhost = "feenix-mariadb.swin.edu.au";
    $dbuser = "s103512168";
    $dbpass = "161003";
    $db = "s103512168_db";
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

?> 






	


	
	