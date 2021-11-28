<?php

if (!isset($gCms)) exit;
if (!$this->CheckPermission('IPLock Admin')) exit;

/* @var $this IPLock */
$this->SetPreference('new_banned_ip', 'verified');

$this->_IPFilterInit();

if (isset($params['active_tab'])) {
	$active_tab = $params['active_tab'];
} else if (isset($_GET['active_tab'])) {
	$active_tab = $_GET['active_tab'];
} else {
	$active_tab = '';
}

$tab_start = $this->StartTabHeaders();
$tab_start .= $this->SetTabHeader('prefs', $this->Lang('prefs'), ($active_tab == 'prefs' ? true : false));
$tab_start .= $this->SetTabHeader('allowed_ip', $this->Lang('allowed_ip'), ($active_tab == 'allowed_ip' ? true : false));
$tab_start .= $this->SetTabHeader('denied_ip', $this->Lang('denied_ip'), ($active_tab == 'denied_ip' ? true : false));
//$tab_start.= $this->SetTabHeader('banned_template', $this->Lang('banned_template'), ($active_tab == 'banned_template' ? true : false));
$tab_start .= $this->EndTabHeaders();
$tab_start .= $this->StartTabContent();

$this->smarty->assign('tabs_start', $tab_start);
$this->smarty->assign('tab_end', $this->EndTab());
$this->smarty->assign('tabs_end', $this->EndTabContent());
$this->smarty->assign('form_end', $this->CreateFormEnd());

$this->smarty->assign('prefs_tab_start', $this->StartTab('prefs', $params));
$this->smarty->assign('prefs_form_start', $this->CreateFormStart($id, 'set_prefs', $returnid));
$this->smarty->assign('prefs_radio', $this->CreateInputRadioGroup($id, 'operating_process', array($this->Lang('allow_all') . '<br />' => 'allow', $this->Lang('deny_all') => 'deny'), $this->GetPreference('operating_process')));
$this->smarty->assign('prefs_input', $this->CreateInputText($id, 'max_conn_min', $this->GetPreference('max_conn_min')));

$this->smarty->assign('prefs_notification_radio', $this->CreateInputRadioGroup($id, 'notification', array($this->lang('yes') . '<br />' => 'display', $this->lang('no') => 'hide'), $this->GetPreference('notification')));

$this->smarty->assign('prefs_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('save')));

$this->smarty->assign('allowed_ip_tab_start', $this->StartTab('allowed_ip', $params));
$this->smarty->assign('allowed_ip_table', $this->_IPTable($id, IPFilter::getAllowedIPList(), array('active_tab' => 'allowed_ip')));
$this->smarty->assign('allowed_ip_field', $this->_IPField($id, 'allow_ip'));

$this->smarty->assign('denied_ip_tab_start', $this->StartTab('denied_ip', $params));
$this->smarty->assign('denied_ip_table', $this->_IPTable($id, IPFilter::getDeniedIPList(), array('active_tab' => 'denied_ip')));
$this->smarty->assign('denied_ip_field', $this->_IPField($id, 'deny_ip'));

$this->smarty->assign('banned_template_form_start', $this->CreateFormStart($id, 'set_prefs', $returnid));
$this->smarty->assign('banned_template_tab_start', $this->StartTab('banned_template', $params));
$this->smarty->assign('banned_template_textarea', $this->CreateTextArea(1, $id, $this->GetTemplate('banned_template', 'IPLock'), 'banned_template', 'banned_template', '', '', '30', '80', '', 'html'));



/*----LANG----*/
/*-general-*/
$this->smarty->assign('note', $this->lang('note'));

/*-Preferences tab-*/
$this->smarty->assign('general_pane_title', $this->lang('general_pane_title'));
$this->smarty->assign('default_process', $this->lang('default_process'));
$this->smarty->assign('process_example_all', $this->lang('process_example_all'));
$this->smarty->assign('process_example_only', $this->lang('process_example_only'));

$this->smarty->assign('connection_limit', $this->lang('connection_limit'));
$this->smarty->assign('connection_limit_description', $this->lang('connection_limit_description'));
$this->smarty->assign('notification_explanation', $this->lang('notification_explanation'));

/*-IPs authorized tab-*/
$this->smarty->assign('authorized_ip_explanation', $this->lang('authorized_ip_explanation'));
$this->smarty->assign('authorized_ip_legend', $this->lang('authorized_ip_legend'));
$this->smarty->assign('add_ip_legend', $this->lang('add_ip_legend'));

$this->smarty->assign('syntax_legend', $this->lang('syntax_legend'));
$this->smarty->assign('syntax_intro', $this->lang('syntax_intro'));
$this->smarty->assign('syntax_line1', $this->lang('syntax_line1'));
$this->smarty->assign('syntax_line2', $this->lang('syntax_line2'));
$this->smarty->assign('syntax_line3', $this->lang('syntax_line3'));

/*-IPs prohibited tab-*/
$this->smarty->assign('prohibited_ip_explanation', $this->lang('prohibited_ip_explanation'));
$this->smarty->assign('prohibited_ip_legend', $this->lang('prohibited_ip_legend'));


/*-banned_template tab-*/
$this->smarty->assign('banned_template_legend', $this->lang('banned_template_legend'));



echo $this->ProcessTemplate('adminpanel.tpl');
