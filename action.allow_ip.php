<?php

if(! isset($gCms)) exit;
if(! $this->CheckPermission('IPLock Admin')){
	echo $this->Lang('accessdenied');
	return;
}

if(isset($params['ip'])){
	$ip = $params['ip'];
}
else {
	$ip = $params['field0'].'.'.$params['field1'].'.'.$params['field2'].'.'.$params['field3'];
}

$this->_IPFilterInit();

$check = IPFilter::allowIP($ip);

if($check == IPFILTER_SUCCESS){
	$this->Audit(0, $this->GetName(), $this->Lang('added_allowed_ip', $ip));
}
else if($check == IPFILTER_ERROR){
	$returnparams['allow_ip_error'] = $this->Lang('genericerror');
}
else if($check == IPFILTER_IP_ERROR){
	$returnparams['allow_ip_error'] = $this->Lang('iperror');
}

$returnparams['active_tab'] = 'allowed_ip';
$this->Redirect($id, 'defaultadmin', $returnid, $returnparams);