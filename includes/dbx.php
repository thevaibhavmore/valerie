<?php
    if($_SERVER['HTTP_HOST'] != 'localhost')
    { 
       /*db : weldrive
       username: weldrive
       password : a@Aweldrive786 */
       $hostname = 'localhost';
       $username = 'codeweight';
       $password = 'a@Acodeweightdb';
       $dbname = 'nazim_brothers_test'; 
        $con = @mysqli_connect($hostname, $username, $password, $dbname);
        if(mysqli_connect_errno())
        {
            echo 'Error in connecting to DB ' . mysqli_connect_error();
            exit;
        }
    }
    else
    {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'nazim_brothers';    
        $con = @mysqli_connect($hostname, $username, $password, $dbname);
        if(mysqli_connect_errno())
        {
            echo 'Error in connecting to DB ' . mysqli_connect_error();
            exit;
        }
		
    }     
?>