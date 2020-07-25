<?php
    require_once("../includes/initialize.php");    
    
    $jsonarray = array();
    
    $name = ($_POST["name"]);
    $email_addr = ($_POST["email"]);
    $phone = ($_POST["phone"]);
    $subject = ($_POST["subject"]);
    $message = ($_POST["message"]);
    
    if($name == "" || $phone == "")
    {
        $error = 1;
        $error_msg = "Please fill mandatory fields.";
        $jsonarray["code"] = $error;
        $jsonarray["msg"] = $error_msg;
        echo json_encode($jsonarray);
        exit;
    }
    
    
    if($phone != '')
    {
        if(!is_numeric($phone))    
        {
           $error = 1;
           $error_msg = "Please provide valid Phone Number.";
           $jsonarray["code"] = $error;
           $jsonarray["msg"] = $error_msg;
           echo json_encode($jsonarray);
           exit;
        }
        
        if(strlen($phone) < 10)
        {
           $error = 1;
           $error_msg = "Mobile number should be minimum 10 digits ";
           $jsonarray["code"] = $error;
           $jsonarray["msg"] = $error_msg;
           echo json_encode($jsonarray);
           exit;
        }
    }
    if($email_addr != "")
    {    
        if(!filter_var($email_addr, FILTER_VALIDATE_EMAIL))
        {
            $error = 1;
            $error_msg = "Please provide valid email address.";
            $jsonarray["code"] = $error;
            $jsonarray["msg"] = $error_msg;
            echo json_encode($jsonarray);
            exit;
        }
    }    
    
    
    require_once("../includes/class.phpmailer.php");
    $email_subject = "".SITE_NAME."";

    
    $mailbody = "Hi Admin, you have a new enquiry. details are given below :<br/><br/>
                        Name - ".$name."<br/>  
                        Email - ".$email_addr."<br/>
                        Phone - ".$phone."<br/>
                        Subject - ".$subject."<br/>
                        Message - ".$message."<br/>";
    
    
    
    $mailbody .= "  Thanks & Regards <br/>                 
                   <strong>Team " . SITE_NAME . "</strong>";
    $reply_address = CONTACTUS_REPLY_ADD;
    $reply_person_name = CONTACTUS_REPLY_NAME;
    $from_address = CONTACTUS_FROM_ADD;
    $from_name = CONTACTUS_FROM_NAME;
    $alt_body = "To view the message, please use an HTML compatible email viewer!";

    $mail = new PHPMailer(); // defaults to using php "mail()"

    if(USE_SMTP_SERVER==1)
    {
        $mail->IsSMTP(); // telling the class to use SMTP
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPDebug  = SMTP_DEBUGGING;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = SMTP_HOST; // sets the SMTP server
        $mail->Port       = SMTP_HOST_PORT;                    // set the SMTP port for the GMAIL server
        $mail->Username   = SMTP_HOST_USERNAME; // SMTP account agent_username
        $mail->Password   = SMTP_HOST_PASSWORD;        // SMTP account password                
    }                

    $body = $mailbody;
    $mail->SetFrom($from_address, $from_name);
    $mail->AddReplyTo($reply_address,$reply_person_name);

    $mail->AddAddress(ADMIN_EMAIL_ADDRESS);

    $mail->Subject = $email_subject;
    $mail->AltBody = $alt_body; // optional, comment out and test
    $mail->MsgHTML($body);
    if(!$mail->Send())
    {       
        if($_SERVER['HTTP_HOST'] != 'localhost')
        {
            $error = 1;
            $error_msg = "Something went wrong while sending an enquiry, Please try again later !!!";
            $jsonarray["code"] = $error;
            $jsonarray["msg"] = $error_msg;
            echo json_encode($jsonarray);
            exit;
        } 
    }
    
    
    /*
    $sql_insert = "INSERT INTO enquiry_ssom (name , email, phone, subject, message , resume , post_applied_for , nationality , current_location)
                   VALUES ('".$name."','".$email_addr."','".$phone."','".$subject."','".$message."' , '".$filename."' , '".$post."' , '".$nationality."', '".$current_location."')";
     
//     echo $sql_insert;exit;
     $result_insert = mysqli_query($con, $sql_insert);
    */
    $error = 0;
    $error_msg = "Your enquiry is successfully received , our team will get back to you shortly.";
    $jsonarray["code"] = $error;
    $jsonarray["msg"] = $error_msg;
    echo json_encode($jsonarray);
    exit;  
    
?>