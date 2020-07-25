<?php
    require_once("../includes/initialize.php");
    // $imageUrl = "http://nazimbrothers.shlokcare.com/items_images/";
    $imageUrl = EXISTING_IMAGE_VIEW;

    $jsonarray = array();
    
    $where = "";
    $amount = sanitize_input($_POST["amount"]);
    $page = sanitize_input($_POST["page"]);
    $items_per_page = sanitize_input($_POST["items_per_page"]);
    $offset = ($page - 1) * $items_per_page;
    $amount = str_replace("$", "", $amount);
    $amount = explode("-", $amount);
    if(isset($amount[0]))
    {
        $amount1 = intval(trim($amount[0]));
        $where .= "sale_price >= ". $amount1." AND ";
    }

    $new_arrival = sanitize_input($_POST["new_arrival"]);
    $pairs = sanitize_input($_POST["pairs"]);
    $featured = sanitize_input($_POST["featured"]);

    if ($new_arrival==1) {
        $where .= "new_arrival = 1 AND ";
    }
    if ($pairs == 1) {
        $where .= "pairs = 1 AND ";
    }
    if ($featured == 1) {
        $where .= "featured = 1 AND ";
    }

    if(isset($amount[1]))
    {
        $amount2 = intval(trim($amount[1]));
        $where .= "sale_price <= ". $amount2." AND ";
    }
    
    $clarity = array();
    $lusture = array();
    $origin = array();
    $treatment = array();
    
    $cat = sanitize_input($_POST["cat"]);
    $subcat = sanitize_input($_POST["subcat"]);
    $clarity = $_POST["clarity"];
    $lusture = $_POST["lusture"];
    $origin = $_POST["origin"];
    $treatment = $_POST["treatment"];
    if(is_array($clarity))
    {    
        if(count($clarity))
        {
            $clarity = "'" . implode("','", $clarity) . "'";
            $where .= "clarity in ($clarity) AND ";
        }
    }
    
    if(is_array($lusture))
    {
        if (count($lusture)) {
            $lusture = "'" . implode("','", $lusture) . "'";
            $where .= "lusture in ($lusture) AND ";
        }
    }
    
    if(is_array($origin))
    {
        if (count($origin)) {
            $origin = "'" . implode("','", $origin) . "'";
            $where .= "origin in ($origin) AND ";
        }
    }
    
    if(is_array($treatment))
    {
        if (count($treatment)) {
            $treatment = "'" . implode("','", $treatment) . "'";
            $where .= "treatment in ($treatment) AND ";
        }
    }    
    if($cat!="")
    {
        $where .= "category_id = $cat AND ";
    }
    if($subcat!="")
    {
        $where .= "subcategory_id = $subcat AND ";
    }

    $sql = "SELECT * from product where $where active=1 limit $offset, $items_per_page";
    
//    echo $sql;exit;

    $result = mysqli_query($con, $sql);
    $products = [];
    while ($myrow = mysqli_fetch_array($result)) {
        $image_array = explode("|", $myrow["itemimage"]);
        $one_image = $image_array[0];
        $myrow["itemimage"] = $imageUrl. $one_image;
        $products[] = $myrow;
    }
    echo json_encode($products);
    exit;
?>