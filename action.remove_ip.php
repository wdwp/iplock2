<?php

if (! isset ( $gCms ))
	exit ();
if (! $this->CheckPermission ( 'IPLock Admin' )) {
	echo $this->Lang ( 'accessdenied' );
	return;
}

if( isset( $params['ip_id'] ) ){
	$ip_id = $params['ip_id'];
	$this->_IPFilterInit();
	
	// Protège au cas ou un petit malin essairai de passer autre chose qu'un chiffre
	// en argument.
	
	$ip = IPFILTER::getIP($ip_id);
	$check = IPFILTER::removeIP($ip_id);
	if($check == IPFILTER_ERROR){
		echo $this->Lang ( 'genericerror' );
		exit ();
	}
	else if($check == IPFILTER_SUCCESS){
		$this->Audit ( 0, $this->GetName (), $this->Lang ( 'removed_ip', $ip ) );
	}
}

$this->Redirect ( $id, 'defaultadmin', $returnid, array('active_tab' => $params['active_tab']) );

?>