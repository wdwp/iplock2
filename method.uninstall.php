<?php

$db = $this->getDb();

$dict = NewDataDictionary($db);
$sqlarray = $dict->DropTableSQL( $this->_GetDbName());
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL( $this->_GetDbName().'_watch');
$dict->ExecuteSQLArray($sqlarray);

//Remove permission
/* @var $this IPLock */
$this->RemovePermission('IPLock Admin');

$this->RemovePreference('operating_process');
$this->RemovePreference('max_conn_min');
$this->RemovePreference('new_banned_ip');
$this->RemovePreference('notification');

$this->RemoveEventHandler('Core', 'LoginFailed');
$this->RemoveEventHandler('Core', 'LoginPost');

$this->Audit(0, $this->GetName(), $this->Lang('uninstalled', $this->GetVersion()));

?>