<?php

if(! isset($gCms)) exit;
if(! $this->CheckPermission('IPLock Admin')){
	echo $this->Lang('accessdenied');
	return;
}

//print_r ($params);
//exit;
$returnparams = array();

if(isset($params['cancel'])){
	$returnparams['active_tab'] = $params['active_tab'];
	$this->Redirect($id, 'defaultadmin', $returnid, $returnparams);
}
else if(isset($params['submit'])){
	$this->_IPFilterInit();
	IPFilter::setIPComment($params['ip_id'], $params['ip_comment']);
	$returnparams['active_tab'] = $params['active_tab'];
	$this->Redirect($id, 'defaultadmin', $returnid, $returnparams);
}
else{
	$this->_IPFilterInit();
	
	$ip_id = $params['ip_id'];
	$ip_comment = IPFilter::getIPComment($ip_id);
	$ip_value = IPFilter::getIP($ip_id);
	
	echo '<fieldset><legend>'.$this->lang('edit_ip_comment_legend', $ip_value).'</legend>';
	echo $this->CreateFormStart($id, 'edit_ip_comment', $returnid).'<p>';
	echo $this->CreateInputHidden($id, 'active_tab', $params['active_tab']);
	echo $this->CreateInputHidden($id, 'ip_id', $params['ip_id']);
	echo $this->CreateInputText($id, 'ip_comment', $ip_comment, 100).'</p>';
	echo '<p>';
	echo $this->CreateInputSubmit($id, 'submit', $this->Lang('save'));
	echo $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel'));
	echo '</p>';
	echo $this->CreateFormEnd();
	echo '</fieldset>';
}