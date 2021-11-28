<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: IPLock2
#
#-------------------------------------------------------------------------
# A fork of
# Module: IPLock (c) 2010, Benoit Vermont (redwarp@gmail.com)
# Forked by Yuri Haperski (wdwp@yandex.ru)
#
#-------------------------------------------------------------------------
#
# CMSMS - CMS Made Simple is (c) 2006 - 2021 by CMS Made Simple Foundation
# CMSMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit the CMSMS Homepage at: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE
ini_set(
	'include_path',
	dirname(__FILE__) . '/class'
		. PATH_SEPARATOR . ini_get('include_path')
);
require_once('IPFilter.class.php');
class IPLock2 extends CMSModule
{
	function GetName()
	{
		return 'IPLock2';
	}

	function GetFriendlyName()
	{
		return $this->Lang('friendlyname');
	}
	function GetVersion()
	{
		return '1.1';
	}
	function MinimumCMSVersion()
	{
		return '2.1';
	}
	function GetAuthor()
	{
		return 'Benoit Vermont';
	}
	function GetAuthorEmail()
	{
		return 'redwarp@gmail.com';
	}

	function IsPluginModule()
	{
		return false;
	}

	function HasAdmin()
	{
		return true;
	}
	function GetHelp()
	{
		return $this->Lang('help');
	}

	function GetAdminDescription()
	{
		//return $this->Lang ( 'moddescription' );
		return $this->Lang('moddescription');
	}

	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	function UninstallPreMessage()
	{
		return html_entity_decode($this->Lang('preuninstall'), ENT_NOQUOTES, 'UTF-8');
	}
	function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}
	function GetAdminSection()
	{
		return 'siteadmin';
	}
	function VisibleToAdminUser()
	{
		return $this->CheckPermission('IPLock Admin');
	}
	function HandleEvents()
	{
		return true;
	}
	function DefaultLanguage()
	{
		return 'en_US';
	}

	function GetNotificationOutput($priority = 2)
	{
		if ($this->GetPreference('notification') == 'display' && $this->GetPreference('new_banned_ip') == 'not_verified' && $this->CheckPermission('IPLock Admin')) {
			$ret = new stdClass;
			$ret->priority = 3;
			$ret->html = $this->lang('notification_message', $this->CreateLink($id, 'defaultadmin', $returnid, $this->lang('friendlyname'), array('active_tab' => 'denied_ip')));
			return $ret;
		} else {
			return '';
		}
	}

	function _GetDbName()
	{
		return cms_db_prefix() . 'module_iplock';
	}
	function _GetWatchDbName()
	{
		return $this->_GetDbName() . '_watch';
	}
	function _IPFilterInit()
	{
		IPFilter::init($this);
	}

	//TODO
	///This should be pulled out at a smarty templete
	function _IPTable($id, array $ipArray, array $parameters = null)
	{
		global $id;
		$returnid = '';
		$rowcount = count($ipArray);
		$thead = $this->lang('ip_comment');
		$liste = <<<TBS
<table class='pagetable'>
	<thead>
		<tr>
			<th width='20%'>IP</th>
			<th width='100%'>$thead</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
TBS;
		if ($rowcount == 0) {
			$liste .= "<tr class='row1'><td colspan='4'>" . $this->Lang('emptylist') . "</tr>";
		} else {
			$i = 0;
			foreach ($ipArray as $ip_id => $ip_value) {
				$ip_comment = htmlspecialchars(IPFilter::getIPComment($ip_id));
				// Construction des paramètres à donner à chaque lien.
				foreach ($parameters as $paramName => $paramValue) {
					$params[$paramName] = $paramValue;
				}
				$params['ip_id'] = $ip_id;
				$liste .= "<tr class='row" . ($i % 2 + 1) . "'><td>$ip_value</td><td>$ip_comment</td><td>" .
					$this->CreateLink($id, 'edit_ip_comment', $returnid, '<img src="../modules/' . $this->GetName() . '/images/edit.gif" class="systemicon" alt="' . $this->Lang('edit') . '" title="' . $this->Lang('edit') . '" />', $params) .
					"</td>";
				if ($ip_value == '127.0.0.1') {
					$liste .= '<td></td>';
				} else {
					$liste .= "<td>" . $this->CreateLink($id, 'remove_ip', $returnid, '<img src="../modules/' . $this->GetName() . '/images/delete.gif" class="systemicon" alt="' . $this->Lang('delete') . '" title="' . $this->Lang('delete') . '" />', $params, $this->Lang('deleteconfirm')) . '</td></tr>';
				}
				$i++;
			}
		}
		$liste .= <<<TBE
	</tbody>
</table>
TBE;
		return $liste;
	}

	function _IPField($id, $action)
	{
		global $params;
		//$ipfield = $this->CreateFormStart($id, $action, $returnid). // $returnid is undefined should be passing in
		$ipfield = $this->CreateFormStart($id, $action) . '<p>' .
			$this->CreateInputText($id, 'field0', '', 5) . '.' .
			$this->CreateInputText($id, 'field1', '', 5) . '.' .
			$this->CreateInputText($id, 'field2', '', 5) . '.' .
			$this->CreateInputText($id, 'field3', '', 5) .
			$this->CreateInputSubmit($id, 'submit', $this->Lang('add')) .
			'</p>' . $this->CreateFormEnd();
		if (isset($params[$action . '_error'])) {
			$ipfield .= $this->ShowErrors($params[$action . '_error']);
		}
		if ($action == 'allow_ip') {
			$ipfield .= $this->CreateFormStart($id, $action) . '<p>' .
				$this->lang('add_current_ip', $_SERVER['REMOTE_ADDR']) . ' ' .
				$this->CreateInputHidden($id, 'ip', $_SERVER['REMOTE_ADDR']) .
				$this->CreateInputSubmit($id, 'submit', $this->lang('add')) .
				'</p>' . $this->CreateFormEnd();
		}
		return $ipfield;
	}
}
