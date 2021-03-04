<?php

/* @var $this IPLock */
if (!isset($gCms)) exit;

$current_version = $oldversion;
$db =& $this->GetDb();

switch($current_version){
	case '0.3':
		$this->RemovePreference("testIPLock");
		$this->SetPreference("IPLock_mode", "deny");
		$this->SetPreference("max_conn_min", 3);
	//TODO
	///remove _seq tables.. just nice cleanup
	case '0.3.4':
	case '0.3.5':
	case '0.3.5.1':
		$db->DropSequence ($this->_GetDbName().'_seq');
		$db->DropSequence ($this->_GetWatchDbName().'_seq');
		$dict = NewDataDictionary($db);
		$sqlarray = $dict->AddColumnSQL($this->_GetDbName(), "ip_comment C(255)");
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->AlterColumnSQL($this->_GetDbName(), 'ip_id I AUTOINCREMENT PRIMARY');
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->AlterColumnSQL($this->_GetWatchDbName(), 'ipwatch_id I AUTOINCREMENT PRIMARY');
		$dict->ExecuteSQLArray($sqlarray);
		
		$this->SetPreference('operating_process', $this->GetPreference('IPLock_mode'));
		$this->RemovePreference('IPLock_mode');
		$this->SetPreference('new_banned_ip', 'verified');
		$this->SetPreference('notification', 'display');
}