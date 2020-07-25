<?php
    function logincheck($role)
    {
        global $con;
        $return = 0;
        if(isset($_COOKIE["USER_FNAME"]) && isset($_COOKIE["USER_ID"]) && isset($_COOKIE["USER_TOKEN"]))
        {
            
            //sql query
            $sql = 'SELECT lname FROM user WHERE id="'.$_COOKIE["USER_ID"].'" AND token ="'.$_COOKIE["USER_TOKEN"].'" AND role="'.$role.'"';     
            //echo $sql;exit; 
            $result = mysqli_query($con, $sql);
            if($myrow = mysqli_fetch_array($result))
            {
                $return = 1;
            }
            else
            {
                $return = 0;
            }
            //echo "return is ".$return;
        }
        return $return;
    }
    
    function randomPassword() 
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    //generate random username
    function generate_alphanum_5char() 
    {
        $generate_alphanum_5char = strtoupper(substr(uniqid(), 1, 5));
        return $generate_alphanum_5char;
    }
    
    function sanitize_input($data)
    {
        global $con;
        $data = trim($data);  
        $data = mysqli_real_escape_string($con, $data);
        return $data;
    }
?>