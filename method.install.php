<?php

require_once('class/IPFilter.class.php');  //doesn't seem to be need here... was causing Fatal error: Class 'IPFilter' not found 

if (!isset($gCms)) exit; // added for protection.. 
//$db = $this->getDb(); // not need here
	$config =& $gCms->GetConfig(); 
	$taboptarray = array('mysql' => 'TYPE=MyISAM');
	$dict = NewDataDictionary($db);

	//come back to Class needs work to not be seq dependent
///*---------------------------------------------------------------------------------------------------*/
//	$flds = "
//			ip_id I KEY AUTO,
//			ip_value C(100),
//			ip_mode I
//		";
//
//	$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_iplock',
//			$flds, $taboptarray);
//	$dict->ExecuteSQLArray($sqlarray);
///*---------------------------------------------------------------------------------------------------*/
//
//	$flds = "
//			ipwatch_id I KEY,
//			ip_value C(100),
//			first_try ".CMS_ADODB_DT.",
//			try_count I,
//			total_try_count I
//		";
//
//	$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_iplock_watch',
//			$flds, $taboptarray);
//	$dict->ExecuteSQLArray($sqlarray);
///*---------------------------------------------------------------------------------------------------*/



/*

This is the old style.  The seuence is not needed as CMSMS doen't support setups that don't hand it.


*/
$flds = "
	ip_id I AUTOINCREMENT PRIMARY,
	ip_value C(100),
	ip_comment C(255),
	ip_mode I
";

$sqlarray = $dict->CreateTableSQL($this->_GetDbName(),
		$flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);


$flds = "
	ipwatch_id I AUTOINCREMENT PRIMARY,
	ip_value C(100),
	first_try ".CMS_ADODB_DT.",
	try_count I,
	total_try_count I
";
//first_try ".CMS_ADODB_DT.",
$sqlarray = $dict->CreateTableSQL($this->_GetWatchDbName(),
		$flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);


$this->_IPFilterInit();
IPFilter::allowIP('127.0.0.1');

//Création des permissions
$this->CreatePermission('IPLock Admin', $this->Lang("manage"));

$this->SetPreference('operating_process', "allow");
$this->SetPreference('max_conn_min', 3);
$this->SetPreference('new_banned_ip', 'visited');
$this->SetPreference('notification', 'display');

$this->AddEventHandler('Core', 'LoginFailed', false);
$this->AddEventHandler('Core', 'LoginPost', false);

$this->Audit(0, $this->GetName(), $this->Lang('installed', $this->GetVersion()));

?>