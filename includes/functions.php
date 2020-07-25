<?php
    function logincheck($role)
    {
        global $con;
        $return = 0;
        if(isset($_SESSION["USER_FNAME"]) && isset($_SESSION["USER_ID"]) &&  isset($_SESSION["ROLE"]))
        {
            $sql = 'SELECT lname FROM user WHERE id="'.$_SESSION["USER_ID"].'" AND token ="'.$_SESSION["USER_TOKEN"].'" AND role="'.$role.'"';
//            $sql = 'SELECT lname FROM user WHERE id="'.$_SESSION["USER_ID"].'" AND role="'.$role.'"';
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
        }
        return $return;
    }
    
    function logincheck_website($role)
    {
        global $con;
        $return = 0;
        if(isset($_SESSION["USER_FNAME"]) && isset($_SESSION["USER_ID"]) &&  isset($_SESSION["USER_ROLE"]))
        {
            $sql = 'SELECT lname FROM user WHERE id="'.$_SESSION["USER_ID"].'" AND role="'.$role.'"';
//            $sql = 'SELECT lname FROM user WHERE id="'.$_SESSION["USER_ID"].'" AND role="'.$role.'"';
//            echo $sql;exit;
            $result = mysqli_query($con, $sql);
            if($myrow = mysqli_fetch_array($result))
            {
                $return = 1;
            }
            else
            {
                $return = 0;
            }
        }
        return $return;
    }
   
    function checkMaterialStock($con,$id)
    {
        //$id = 1;
        // finding available qty
           /*    formula : available_qty = ((processed_product + existing_qty) - sale ) + return */
           
        
           // qty from material  purchase orders 
           $sql_material_purchase_1 = "SELECT sum(quantity) as total_material_po
                                    FROM material_purchase_order_detail
                                    WHERE material_id = '".$id."'";
           $result_material_purchase_1 = mysqli_query($con, $sql_material_purchase_1);
           if($result_material_purchase_1 && $myrow_material_purchase_1 = mysqli_fetch_array($result_material_purchase_1))
           {
               $total_purchased_mat = $myrow_material_purchase_1['total_material_po'];
           }
           else
           {
               $total_purchased_mat = 0;
           }    
           
           if($total_purchased_mat == "" || $total_purchased_mat == NULL)
           {
              $total_purchased_mat = 0; 
           }
        
        
           // first we will get processed product
           
           $sql_material_purchase = "SELECT sum(quantity) as total_material_purchase
                                    FROM material_details
                                    WHERE material_id = '".$id."'";
           $result_material_purchase = mysqli_query($con, $sql_material_purchase);
           if($result_material_purchase && $myrow_material_purchase = mysqli_fetch_array($result_material_purchase))
           {
               $total_purchased_material = $myrow_material_purchase['total_material_purchase'];
           }
           else
           {
               $total_purchased_material = 0;
           }    
           
           if($total_purchased_material == "" || $total_purchased_material == NULL)
           {
              $total_purchased_material = 0; 
           } 
           
           $total_purchased_material = $total_purchased_material + $total_purchased_mat;
           
           // now getting total sale 
           
           $sql_get_total_material_sale = "SELECT sum(quantity) as total_material_sale
                                            FROM material_sale_order_detail
                                            WHERE material_id = '".$id."'";
           $result_get_total_material_sale = mysqli_query($con, $sql_get_total_material_sale);
           if($result_get_total_material_sale && $myrow_get_total_material_sale = mysqli_fetch_array($result_get_total_material_sale))
           {
               $total_material_sale = $myrow_get_total_material_sale['total_material_sale'];
           }
           else
           {
              $total_material_sale = 0; 
           }    
           if($total_material_sale == "" || $total_material_sale == NULL)
           {
               $total_material_sale = 0; 
           }    
           
           
           // now getting total return
           $sql_get_total_material_return = "SELECT sum(quantity) as total_material_return
                                            FROM material_sale_order_returns
                                            WHERE material_id = '".$id."'";
           $result_get_total_material_return = mysqli_query($con, $sql_get_total_material_return);
           if($result_get_total_material_return && $myrow_get_total_material_return = mysqli_fetch_array($result_get_total_material_return))
           {
               $total_material_return = $myrow_get_total_material_return['total_material_return'];
           }
           else
           {
               $total_material_return = 0;
           }    
           
           if($total_material_return == "" || $total_material_return == NULL)
           {
               $total_material_return = 0;
           }
           
           // now finding consumed material if manufacturer
           $sql_get_total_consumed = "SELECT sum(quantity) as total_consumed
                                            FROM material_consumed
                                            WHERE material_id = '".$id."'";
           $result_get_total_consumed = mysqli_query($con, $sql_get_total_consumed);
           if($result_get_total_consumed && $myrow_get_total_consumed = mysqli_fetch_array($result_get_total_consumed))
           {
               $total_consumed = $myrow_get_total_consumed['total_consumed'];
           }
           else
           {
               $total_consumed = 0;
           }    
           
           if($total_consumed == "" || $total_consumed == NULL)
           {
               $total_consumed = 0;
           }
           
           $available_material_qty = ($total_purchased_material - $total_material_sale) + $total_material_return;
           $available_material_qty = $available_material_qty - $total_consumed;
           //$available_material_qty  = $available_material_qty + $total_purchased_mat;
           
           return $available_material_qty;
    }
    
    function checkStock($con,$id)
    {
        //$id = 1;
        // finding available qty
           /*    formula : available_qty = ((processed_product + existing_qty) - sale ) + return */
           
           // first we will get processed product
           
           $sql_get_processed = "SELECT sum(total_qty) as total_processed_product
                                FROM process_product
                                WHERE product_id = '".$id."' AND manufacturing_status = 1";
           $result_get_processed = mysqli_query($con, $sql_get_processed);
           if($result_get_processed && $myrow_get_processed = mysqli_fetch_array($result_get_processed))
           {
               $total_processed_product = $myrow_get_processed['total_processed_product'];
           }
           else
           {
               $total_processed_product = 0;
           }    
           if($total_processed_product == "" || $total_processed_product == NULL)
           {
               $total_processed_product = 0;
           }
           
           // now we will get purchased product
           
           $sql_get_purchased = "SELECT sum(quantity) as total_purchased_product
                                FROM product_purchase_order_detail
                                WHERE product_id = '".$id."'";
           $result_get_purchased = mysqli_query($con, $sql_get_purchased);
           if($result_get_purchased && $myrow_get_purchased = mysqli_fetch_array($result_get_purchased))
           {
               $total_purchased_product = $myrow_get_purchased['total_purchased_product'];
           }
           else
           {
               $total_purchased_product = 0;
           }    
           if($total_purchased_product == "" || $total_purchased_product == NULL)
           {
               $total_purchased_product = 0;
           }    
           
           
           // now getting existing qty
            $sql_get_existing_qty = "SELECT old_stock 
                                    FROM product 
                                    WHERE id = '".$id."'";
            
            //echo $sql_get_existing_qty;exit;
            $result_get_existing_qty = mysqli_query($con, $sql_get_existing_qty);
            if($result_get_existing_qty && $myrow_get_existing_qty = mysqli_fetch_array($result_get_existing_qty))
            {
                $existing_qty = $myrow_get_existing_qty['old_stock'];
            }
            else
            {
                $existing_qty = 0;
            }
            if($existing_qty == "" || $existing_qty == NULL)
            {
                $existing_qty = 0;
            }    
           
            //echo "existing qty is ".$existing_qty;exit;
           // now getting total sale 
           
           $sql_get_total_sale = "SELECT sum(quantity) as total_sale_product
                                    FROM sale_order_detail
                                    WHERE product_id = '".$id."'";
           $result_get_total_sale = mysqli_query($con, $sql_get_total_sale);
           if($result_get_total_sale && $myrow_get_total_sale = mysqli_fetch_array($result_get_total_sale))
           {
               $total_sale_product = $myrow_get_total_sale['total_sale_product'];
           }
           else
           {
               $total_sale_product = 0;
           }
           if($total_sale_product == "" || $total_sale_product == NULL)
           {
               $total_sale_product = 0;
           }
           
           
           // now getting total online sale 
           
           $sql_get_total_online_sale = "SELECT sum(quantity) as total_online_sale_product
                                    FROM online_sale_order_detail
                                    WHERE product_id = '".$id."'";
           $result_get_total_online_sale = mysqli_query($con, $sql_get_total_online_sale);
           if($result_get_total_online_sale && $myrow_get_total_online_sale = mysqli_fetch_array($result_get_total_online_sale))
           {
               $total_online_sale_product = $myrow_get_total_online_sale['total_online_sale_product'];
           }
           else
           {
               $total_online_sale_product = 0;
           }
           if($total_online_sale_product == "" || $total_online_sale_product == NULL)
           {
               $total_online_sale_product = 0;
           }
           
           
           
           // now getting total return from buyer to you
           $sql_get_total_return = "SELECT sum(quantity) as total_return_product
                                    FROM sale_order_returns
                                    WHERE product_id = '".$id."'";
           $result_get_total_return = mysqli_query($con, $sql_get_total_return);
           if($result_get_total_return && $myrow_get_total_return = mysqli_fetch_array($result_get_total_return))
           {
               $total_return_product = $myrow_get_total_return['total_return_product'];
           }
           else
           {
               $total_return_product = 0;
           }    
           if($total_return_product == "" || $total_return_product == NULL)
           {
               $total_return_product = 0;
           }
           
           // now getting total return by you to the supplier , this quantity will deduct from stock
           $sql_get_total_prod_purchase_return = "SELECT sum(quantity) as total_prod_purchase_return
                                                FROM product_purchase_order_returns
                                                WHERE product_id = '".$id."'";
           $result_get_total_prod_purchase_return = mysqli_query($con, $sql_get_total_prod_purchase_return);
           if($result_get_total_prod_purchase_return && $myrow_get_total_prod_purchase_return = mysqli_fetch_array($result_get_total_prod_purchase_return))
           {
               $total_prod_purchase_return = $myrow_get_total_prod_purchase_return['total_prod_purchase_return'];
           }
           else
           {
               $total_prod_purchase_return = 0;
           }    
           if($total_prod_purchase_return == "" || $total_prod_purchase_return == NULL)
           {
               $total_prod_purchase_return = 0;
           }    
           
           $available_qty = (($total_processed_product + $existing_qty + $total_purchased_product) - $total_sale_product ) + $total_return_product;
           $available_qty = $available_qty - $total_prod_purchase_return;
           $available_qty = $available_qty - $total_online_sale_product;
           /*if($available_qty <= 0)
           {
               $available_qty = "<span class='label label-danger'>Out Of Stock</span>";
               
           }
           */
           //$available_qty = 10;
           return $available_qty;
    }
    
    function getIndianCurrencyintoWords($number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') .$paise;
    }
    
    function is_valid_gstin($gstin) 
    {
        $regex = "/^([0][1-9]|[1-2][0-9]|[3][0-5])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$/";
        return preg_match($regex, $gstin);
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
    function send_sms($mobile_no, $message)
    {
        global $sms_gateway_url;
        
        $send_sms_url = $sms_gateway_url;
        
        $send_sms_url = str_replace("{mobile_no}", $mobile_no, $send_sms_url);
        $send_sms_url = str_replace("{msg}", urlencode($message), $send_sms_url);
        
        $sms_msg_id = file_get_contents($send_sms_url);
        return $sms_msg_id;
    }

    function sendJsonError($error_code = "1305", $error = "Some error occurred try again some time.")
    {
        $response["response"] = "error";
        $response["response_data"]["error_code"] = $error_code;
        $response["response_data"]["error_description"] = $error;
        
        echo json_encode($response);exit;
    }
?>