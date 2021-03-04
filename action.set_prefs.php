<?php

if(! isset($gCms)) exit;
if(! $this->CheckPermission('IPLock Admin')){
	echo $this->Lang('accessdenied');
	return;
}

if(isset($params['operating_process'])){
	$this->SetPreference('operating_process', $params['operating_process']);
}
if(isset($params['max_conn_min'])){
	if( is_numeric( $params['max_conn_min'] ) ){
		$max_conn_min = intval( $params['max_conn_min'] );
		if( $max_conn_min >= 0 ){
			$this->SetPreference('max_conn_min', $max_conn_min);
		}
	}
}
if(isset($params['notification'])){
	$this->SetPreference('notification', $params['notification']);
}

if(isset($params['banned_template'])){
$this->SetTemplate ('banned_template', $params['banned_template'], 'IPLock');
}
 
 
$returnparams['active_tab'] = 'prefs';
$this->Redirect($id, 'defaultadmin', $returnid, $returnparams);

?>