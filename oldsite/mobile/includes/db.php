<?php 


$db['db_host'] = "localhost";
$db['db_user'] = "claudiavieira";
$db['db_pass'] = "dMWH3Nsr";
$db['db_name'] = "mase_website";


foreach($db as $key => $value) {
    
    
    define(strtoupper($key), $value);
    
    
    
}



$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);



if($connection) {
    
    
    echo "We are connected";
    
   
}


?>


