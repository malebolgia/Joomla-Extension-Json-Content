<?php
/*
 * @author: Aaron Jefferson Villanueva [aj_villanueva@shadowsonawall.net]
 * @created: December 09, 2012
 * 
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


if($_GET['jsonp']) { //JSONP
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers-Origin: x-requested-with');
	header('Access-Control-Request-Method: GET,POST');
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pragma: no-cache");
	header("Content-type: application/x-javascript");
	
	echo $_GET['jsonp'] . '('.json_encode($this->contents).')';
	
} else { //Simple Json
   header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
   header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT"); 
   header("Cache-Control: no-cache, must-revalidate"); 
   header("Pragma: no-cache");
   header("Content-type: application/json");
	
   echo json_encode($this->contents);
}