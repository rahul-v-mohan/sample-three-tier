<?php
define('PROJECT', true);
// Database Connection Variables
define('DOMAIN', "192.168.1.3");
define('USERNAME', "admin");
define('PASSWORD', "redhat");
define('DATABASE', "parking_assist");
///////////////////////////////////////////////////////

//  Base URL
define('BASEURL', "http://192.168.1.3/sample-three-tier");
////////////////////////////////////////////////////////


//  Mail credentials
define('GMAIL_USERNAME', "");
define('GMAIL_PASSWORD', "");
/* mail path  root_directory/HELPERS/GMAIL/index.php
 * Parameters:  mail_to|mail_subject|mail_content
 */
///////////////////////////////////////////////////////
require_once("DB_BUSINESS_LAYER/business_layer.php");