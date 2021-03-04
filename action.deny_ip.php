<?php

if(! isset($gCms)) exit;
if(! $this->CheckPermission('IPLock Admin')){
	echo $this->Lang('accessdenied');
	return;
}

$ip = $params['field0'].'.'.$params['field1'].'.'.$params['field2'].'.'.$params['field3'];

$this->_IPFilterInit();

$check = IPFilter::denyIP($ip);

if($check == IPFILTER_SUCCESS){
	$this->Audit(0, $this->GetName(), $this->Lang('added_denied_ip', $ip));
}
else if($check == IPFILTER_ERROR){
	$returnparams['deny_ip_error'] = $this->Lang('genericerror');
}
else if($check == IPFILTER_IP_ERROR){
	$returnparams['deny_ip_error'] = $this->Lang('iperror');
}

$returnparams['active_tab'] = 'denied_ip';
$this->Redirect($id, 'defaultadmin', $returnid, $returnparams);