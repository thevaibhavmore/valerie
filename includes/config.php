<?php
session_start();
set_time_limit(0);

defined("HOST") ? null : define("HOST", $_SERVER['HTTP_HOST']);

if ($_SERVER['HTTP_HOST'] != 'localhost') {
    defined("SITE_URL") ? null : define("SITE_URL", "http://" . HOST . "/");
} else {
    defined("SITE_URL") ? null : define("SITE_URL", "http://" . HOST . "/nazimbrothers/");
}
if ($_SERVER['HTTP_HOST'] != 'localhost') {
    $SERVER_DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
} else {
    $SERVER_DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"] . "/6teen";
}

defined("MEMBERS_PAGE_URL") ? null : define("MEMBERS_PAGE_URL", SITE_URL . "/connect/");
define("DEFAULT_CURRENCY", "&#x20B9;");
defined("SITE_NAME") ? null : define("SITE_NAME", "Nazim Brothers");

defined("LOCAL_FOLDER_NAME") ? null : define("LOCAL_FOLDER_NAME", "nazimbrothers");

$scriptname = $_SERVER['SCRIPT_FILENAME'];

$pagetitle = strtolower(trim(substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/") + 1)));



/*dwetails */
defined("SHORT_LOCATION") ? null : define("SHORT_LOCATION", "Mumbai , INDIA");
defined("TITLE") ? null : define("TITLE", "Weldrive");
defined("PHONE_1") ? null : define("PHONE_1", "+91 9221860717");
defined("PHONE_1_CLICK") ? null : define("PHONE_1_CLICK", "9221860717");
defined("EMAIL_1") ? null : define("EMAIL_1", "contact@weldrive.group");
defined("ADDRESS_1") ? null : define("ADDRESS_1", "Room No 03, Ground Floor , Geeta Sadan Building, Samrat Nagar Behind Icon Hospital , Mumbra Thane 400612");
defined("TIMING") ? null : define("TIMING", "9:00 am - 7:00 pm");

//change email address here
// define("ADMIN_EMAIL_ADDRESS", "asif.codew@gmail.com");

//temp folder root
/*define("POST_PER_PAGE" , 12);
    define("EDIT_IMAGES_FOLDER_PATH_FROM_PROCESSREQ", "../../../".IMAGES_FOLDER_NAME);
    define("EDIT_IMAGES_FOLDER_PATH_TMP_FROM_PROCESSREQ", "../../../".TMP_FOLDER_ROOT);
    */
define("TEMP_ZIP_FILES", "temp_zip_files");


//existing folder location
define("EXISTING_IMAGE_FOLDER_ROOT", "items_images/");
define("EXISTING_IMAGE_VIEW", SITE_URL . "/" . EXISTING_IMAGE_FOLDER_ROOT);

define("THUMB_ITEM_IMAGE", "items_images_thumb/");
define("VIEW_THUMB_ITEM_IMAGE", SITE_URL . "/" . THUMB_ITEM_IMAGE);
// echo ALBUM_THUMB_IMAGE_GALLERY; exit;
define("UNLINK_THUMB_ITEM_IMAGE_PATH", "../../" . THUMB_ITEM_IMAGE);

//gem lab logo folder
define("GEM_LAB_LOGO_FOLDER_ROOT", "gem_lab_logo/");
define("GEM_LAB_LOGO_VIEW", SITE_URL . "/" . GEM_LAB_LOGO_FOLDER_ROOT);

//certificate folder
define("CERTIFICATE_FOLDER_ROOT", "certificate/");
define("CERTIFICATE_VIEW", SITE_URL . "/" . CERTIFICATE_FOLDER_ROOT);


//temp image config
define("TMP_IMAGE_FOLDER_ROOT", "backend-images/gallery_thumb_image");
define("TMP_IMAGE_GALLERY", SITE_URL . "/backend-images/gallery_thumb_image");
define("UNLINK_TMP_IMAGE_PATH", "../../" . TMP_IMAGE_FOLDER_ROOT);

//gallery  image upload config
define("GALLERY_IMAGE_FOLDER_ROOT", "backend-images/gallery_images");
define("GALLERY_IMAGE_GALLERY", SITE_URL . "/" . GALLERY_IMAGE_FOLDER_ROOT);
define("GALLERY_IMAGE_WIDTH", 350);
define("GALLERY_IMAGE_HEIGHT", 300);
define("GALLERY_IMAGE_QUALITY", 100);
define("UNLINK_GALLERY_IMAGE_PATH", "../../" . GALLERY_IMAGE_FOLDER_ROOT);


define("PDF_LINK", SITE_URL . "invoice/sale_order_invoice/");

define("PRODUCT_IMAGE_FOLDER_ROOT", "backend-images/product");
define("PRODUCT_IMAGE_GALLERY", SITE_URL . "/" . PRODUCT_IMAGE_FOLDER_ROOT);
define("PRODUCT_IMAGE_WIDTH", 450);
define("PRODUCT_IMAGE_HEIGHT", 400);
define("PRODUCT_IMAGE_QUALITY", 100);
define("UNLINK_PRODUCT_IMAGE_PATH", "../../" . PRODUCT_IMAGE_FOLDER_ROOT);
// package image folders

define("THUMB_IMAGE_FOLDER_ROOT", "backend-images/product_thumb");
define("THUMB_IMAGE_GALLERY", SITE_URL . "/" . THUMB_IMAGE_FOLDER_ROOT);
// echo ALBUM_THUMB_IMAGE_GALLERY; exit;
define("UNLINK_THUMB_IMAGE_PATH", "../../" . THUMB_IMAGE_FOLDER_ROOT);
// album cover image upload config

/* no image found*/
define("NO_IMAGE_FOLDER_ROOT", "backend-images/no_image");
define("NO_IMAGE_GALLERY", SITE_URL . THUMB_IMAGE_FOLDER_ROOT);


/* a starts */

define("INVOICE_RECEIPT_DIR", "/invoice/sale_order_invoice");
define("INVOICE_RECEIPT_DIR_LINK", SITE_URL . "/" . INVOICE_RECEIPT_DIR);
defined("COMPANY_LOGO") ? null : define("COMPANY_LOGO", "../../logo_location/logo.png");
defined("COMPANY_SIGN") ? null : define("COMPANY_SIGN", "../../logo_location/sign.png");

defined("COMPANY_LOGO2") ? null : define("COMPANY_LOGO2", "../../../logo_location/logo.png"); // this will be for processreq folder
defined("COMPANY_SIGN2") ? null : define("COMPANY_SIGN2", "../../../logo_location/sign.png"); // this will be for processreq folder

defined('ADDRESS_FOR_INVOICE') ? null : define("ADDRESS_FOR_INVOICE", "Amrut Nagar Mumbra Thane 400612.");
defined('PHONE_FOR_INVOICE') ? null : define("PHONE_FOR_INVOICE", "+91 9967318412");
defined('EMAIL_FOR_INVOICE') ? null : define("EMAIL_FOR_INVOICE", "contact@6teenbeauty.com");
defined('EMAIL_FOR_INVOICE_FAME') ? null : define("EMAIL_FOR_INVOICE_FAME", "contact@6teenbeauty.com");
defined("SITE_NAME_FOR_INVOICE") ? null : define("SITE_NAME_FOR_INVOICE", "6TEEN BEAUTY");
defined("SITE_NAME_FOR_INVOICE_FAME") ? null : define("SITE_NAME_FOR_INVOICE_FAME", "FAME CREATION");
defined("WEBSITE_FOR_INVOICE") ? null : define("WEBSITE_FOR_INVOICE", "www.6teenbeauty.com");
defined("GST_FOR_INVOICE") ? null : define("GST_FOR_INVOICE", "27BDEPS0619F1ZN");
defined("GST_FOR_INVOICE_FAME") ? null : define("GST_FOR_INVOICE_FAME", "27AAGPF5832M1ZH");


defined("BANK_NAME_FAME") ? null : define("BANK_NAME_FAME", "Indian Bank");
defined("ACC_NO_FAME") ? null : define("ACC_NO_FAME", "993078523");
defined("BRANCH_FAME") ? null : define("BRANCH_FAME", "Dharavi Mumbai");
defined("IFSC_FAME") ? null : define("IFSC_FAME", "IDIB000S190");

defined("BANK_NAME_CLIMAX") ? null : define("BANK_NAME_CLIMAX", "Union Bank");
defined("ACC_NO_CLIMAX") ? null : define("ACC_NO_CLIMAX", "564001010050577");
defined("BRANCH_CLIMAX") ? null : define("BRANCH_CLIMAX", "Dharavi Mumbai");
defined("IFSC_CLIMAX") ? null : define("IFSC_CLIMAX", "UBIN0556408");

/* a ends */



$scriptname = $_SERVER['SCRIPT_FILENAME'];
$pagetitle = strtolower(trim(substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/") + 1)));

defined('CONTACTUS_REPLY_ADD') ? null : define("CONTACTUS_REPLY_ADD", "no-reply@6teenbeauty.com");
defined('CONTACTUS_REPLY_NAME') ? null : define("CONTACTUS_REPLY_NAME", "Team " . SITE_NAME);
defined('CONTACTUS_FROM_ADD') ? null : define("CONTACTUS_FROM_ADD", "no-reply@6teenbeauty.com");
defined('CONTACTUS_FROM_NAME') ? null : define("CONTACTUS_FROM_NAME", "Team " . SITE_NAME);
defined('ADMIN_EMAIL_ADDRESS') ? null : define("ADMIN_EMAIL_ADDRESS", "asif.codew@gmail.com");
$appDetails = [
    'phone' => [
        '9930268872', '9930269270'
    ]
];

// Other configuration related to email
// 1 : Use; 0: Use default php mail function settings
defined('USE_SMTP_SERVER') ? null : define("USE_SMTP_SERVER", "0");
defined('SMTP_HOST') ? null : define("SMTP_HOST", "");
defined('SMTP_HOST_PORT') ? null : define("SMTP_HOST_PORT", "");
defined('SMTP_HOST_USERNAME') ? null : define("SMTP_HOST_USERNAME", "");
defined('SMTP_HOST_PASSWORD') ? null : define("SMTP_HOST_PASSWORD", "");
// 1 = errors and messages; 2 = messages only
defined('SMTP_DEBUGGING') ? null : define("SMTP_DEBUGGING", "2");

//app download links
$itunes_store_link = "https://itunes.apple.com/in/app/my-vision-photography/id1122525430?mt=8";
$play_store_link = "https://play.google.com/store/apps/details?id=com.spryox.mvp";
$website_app_link = "";

//sms gateway url
//$sms_gateway_url = "http://smshorizon.co.in/api/sendsms.php?user=mvpapps&apikey=FABzdEVEvY6WS42EVryG&mobile={mobile_no}&message={msg}&senderid=MVPAPP&type=txt";   

//http://smshorizon.co.in/api/sendsms.php?user=6teenbeautyworld&apikey=iROxfm0GegwdWFRzHx4E&mobile=xxyy&message=xxyy&senderid=xxyy&type=txt

$sms_gateway_url = "http://smshorizon.co.in/api/sendsms.php?user=6teenbeautyworld&apikey=iROxfm0GegwdWFRzHx4E&mobile={mobile_no}&message={msg}&senderid=STEENB&type=txt";

/*defined('USERNAME') ? null : define("USERNAME", "mykidzography@gmail.com");
    defined('HASH') ? null : define("HASH", "8209a527d5672bcd3f3bafcd9d11365aef6833ac01ca0dfb24a5199cf2f4d127");
    defined('SMS_TEST') ? null : define("SMS_TEST", "0");
    defined('SENDER') ? null : define("SENDER", "KIDZOG");*/
date_default_timezone_set("Asia/Kolkata");
defined('ADDEDON') ? null : define("ADDEDON", date("Y-m-d h:i:s"));



/*
    
    defined('CONTACTUS_REPLY_ADD') ? null : define("CONTACTUS_REPLY_ADD", "no-reply@asif.com");
    defined('CONTACTUS_REPLY_NAME') ? null : define("CONTACTUS_REPLY_NAME", SITE_NAME);
    defined('CONTACTUS_FROM_ADD') ? null : define("CONTACTUS_FROM_ADD", "no-reply@asif.com");
    defined('CONTACTUS_FROM_NAME') ? null : define("CONTACTUS_FROM_NAME", SITE_NAME);  
    
    //temp image config
    define("LOGO_FOLDER_ROOT", "backend-images/logo");    
    define("LOGO_GALLERY", SITE_URL."/".LOGO_FOLDER_ROOT);
    define("UNLINK_LOGO_GALLERY_PATH", "../../".LOGO_FOLDER_ROOT);
    define("LOGO_WIDTH", 150);
    define("LOGO_HEIGHT", 90);
    define("LOGO_QUALITY", 100);
    define("POST_PER_PAGE", 9);
    //temp image config
    define("TMP_IMAGE_FOLDER_ROOT", "backend-images/tmp");
    define("ALBUM_TMP_IMAGE_GALLERY", SITE_URL."/".TMP_IMAGE_FOLDER_ROOT);
    // echo ALBUM_TMP_IMAGE_GALLERY; exit;
    define("UNLINK_TMP_IMAGE_PATH", "../../".TMP_IMAGE_FOLDER_ROOT);
    // album cover image upload config
   
   
   //album cover image upload config
    define("PRODUCT_IMAGE_FOLDER_ROOT", "backend-images/product");
    define("PRODUCT_IMAGE_GALLERY", SITE_URL."/".PRODUCT_IMAGE_FOLDER_ROOT);
    define("PRODUCT_IMAGE_WIDTH", 350);
    define("PRODUCT_IMAGE_HEIGHT", 300);
    define("PRODUCT_IMAGE_QUALITY", 70);
    define("UNLINK_PRODUCT_IMAGE_PATH", "../../".PRODUCT_IMAGE_FOLDER_ROOT);
    
    define("NEWS_LIMIT", 3);
    define("COMPANY_ID", 4);

        
    define("BLOG_IMAGE_FOLDER_ROOT", "backend-images/blog_images");
    define("BLOG_IMG_GALLERY", SITE_URL."/".BLOG_IMAGE_FOLDER_ROOT);
    
    define("BLOG_THUMB_IMAGE_FOLDER_ROOT", "backend-images/blog_backend-images/thumbnails");
    define("BLOG_THUMB_IMAGE_GALLERY", SITE_URL."/".BLOG_THUMB_IMAGE_FOLDER_ROOT);
    define("BLOG_THUMB_IMAGE_WIDTH", 360);
    define("BLOG_THUMB_IMAGE_HEIGHT", 200);
    define("BLOG_THUMB_IMAGE_QUALITY", 100);
    defined("BLOG_UNLINK_PATH") ? null : define("BLOG_UNLINK_PATH", BLOG_IMG_GALLERY);
    defined("BLOG_THUMB_UNLINK_PATH") ? null : define("BLOG_THUMB_UNLINK_PATH", BLOG_THUMB_IMAGE_GALLERY);
    // 1 : Use; 0: Use default php mail function settings
    defined('USE_SMTP_SERVER') ? null : define("USE_SMTP_SERVER", "0");
    defined('SMTP_HOST') ? null : define("SMTP_HOST", "");
    defined('SMTP_HOST_PORT') ? null : define("SMTP_HOST_PORT", "");
    defined('SMTP_HOST_USERNAME') ? null : define("SMTP_HOST_USERNAME", "");
    defined('SMTP_HOST_PASSWORD') ? null : define("SMTP_HOST_PASSWORD", "");
    // 1 = errors and messages; 2 = messages only
    defined('SMTP_DEBUGGING') ? null : define("SMTP_DEBUGGING", "2");
     * 
     */


/** Newly added config */

define("CATEGORY_IMAGE_FOLDER_ROOT", "backend-images/category");
define("CATEGORY_IMAGE_GALLERY", SITE_URL . "/" . CATEGORY_IMAGE_FOLDER_ROOT);
define("CATEGORY_IMAGE_WIDTH", 500);
define("CATEGORY_IMAGE_HEIGHT", 500);
define("CATEGORY_IMAGE_QUALITY", 70);
define("UNLINK_CATEGORY_IMAGE_PATH", "../../" . CATEGORY_IMAGE_FOLDER_ROOT);

define("THUMB_CATEGORY_FOLDER_ROOT", "backend-images/category_thumb");
define("THUMB_CATEGORY_GALLERY", SITE_URL . "/" . THUMB_CATEGORY_FOLDER_ROOT);
define("UNLINK_THUMB_CATEGORY_PATH", "../../" . THUMB_CATEGORY_FOLDER_ROOT);

define("BANNER_IMAGE_FOLDER_ROOT", "backend-images/banner");
define("BANNER_IMAGE_GALLERY", SITE_URL . "/" . BANNER_IMAGE_FOLDER_ROOT);
define("BANNER_IMAGE_WIDTH", 800);
define("BANNER_IMAGE_HEIGHT", 250);
define("BANNER_IMAGE_QUALITY", 70);
define("UNLINK_BANNER_IMAGE_PATH", "../../" . BANNER_IMAGE_FOLDER_ROOT);

define("THUMB_BANNER_FOLDER_ROOT", "backend-images/banner_thumb");
define("THUMB_BANNER_GALLERY", SITE_URL . "/" . THUMB_BANNER_FOLDER_ROOT);
define("UNLINK_THUMB_BANNER_PATH", "../../" . THUMB_BANNER_FOLDER_ROOT);

define("API_KEY", "ff12e5a1bb313abbc54d874346183f5a");
define("PRODUCT_OFFSET", "20");
define("ORDER_OFFSET", "10");

// define('PAYPAL_ID', 'sb-fz75f2192289@business.example.com');
// define('PAYPAL_ID', 'sb-6qouh2609919@business.example.com');
define('PAYPAL_ID', 'nbgemsebay@gmail.com');


define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
define('PAYPAL_RETURN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/success.php');
define('PAYPAL_CANCEL_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/cancel.php');
// define('PAYPAL_NOTIFY_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/ipn.php');
define('PAYPAL_CURRENCY', 'USD');
define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");
define("PROOF_FOLDER_ROOT", "assets/images/proof");
