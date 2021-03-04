<?php 

$lang['friendlyname'] = 'IP Block';
$lang['postinstall'] = "IPLock was successfully installed";
$lang['manage'] = "IPLock Management";
$lang['preuninstall'] = 'Authorized IP list will be destroyed. Are you sure you wan\'t to uninstall IPLock ?';
$lang['postuninstall'] = 'IPLock was successfully unistalled';
$lang['moddescription'] = 'This module makes it possible to decide which IP is allowed to log on the admin panel.';
$lang['installed'] = 'Module version %s installed';
$lang['uninstalled'] = 'Module version %s uninstalled';

/*-General-*/
$lang['note'] = 'Note';





/*-Preferences tab-*/
$lang['general_pane_title'] = 'General parameters';
$lang['default_process'] = 'Adjustment of the operating process by default of IPLock';
$lang['process_example_all'] = "Authorize all: only IP's set are banished.";
$lang['process_example_only'] = "Prohibit all: only IP's set are authorized.";
$lang['allow_all'] = 'Authorize all';
$lang['deny_all'] = 'Prohibit all';

$lang['connection_limit'] = 'Connection Limit';
$lang['connection_limit_description'] = 'Number of authorized failed connexions per minutes (minimum 0).<br />If the limit is surpassed, the IP will be banished.';

$lang['notification_explanation'] = 'Display notification, when someone gets banned because of its own misbehavior ?';

/*-Authorized tab-*/
$lang['authorized_ip_explanation'] = 'This list is used when IPLock is set on "Prohibit all" mode';
$lang['authorized_ip_legend'] = 'List of IPs expressly authorized';
$lang['add_ip_legend'] = 'Add an IP (or IP range) to the exception list';
$lang['add_current_ip'] = 'Or add your current IP (%s)';

$lang['ip_comment'] = 'Comments';

$lang['syntax_legend'] = 'Syntax';
$lang['syntax_intro'] = 'An IP adress is made of four numbers, from 0 to 255. For each of these numbers, you can input :';
$lang['syntax_line1'] = 'A fixed value, between 0 and 255';
$lang['syntax_line2'] = "A range, such as 12-245";
$lang['syntax_line3'] = 'Everything, by typing down \'*\'';

/*-Prohibited tab-*/
$lang['prohibited_ip_explanation'] = 'This list is used whatever the operating process of IPLock is.';
$lang['prohibited_ip_legend'] = 'List of IPs expressly prohibited';


/*-banned template tab-*/

$lang['banned_template'] = 'Banned Template';
$lang['banned_template_legend'] = 'Change the banned template as you wish';

/*-edit_ip_comment-*/
$lang['edit_ip_comment_legend'] = 'Edit comments for IP %s';





$lang['help'] = <<<EOL
<h3>What does this do?</h3>
<p>IPLock filters which IP adress can log on the admin panel</p>
<h3>How do I use it?</h3>
<p>After install, you can find IPLock under the "Site Admin" menu.
Appart from that, I hope it's self explanatory</p>
<h3>Permissions</h3>
<p>IPLock adds a permission, "IPLock Management", and it should be checked if you wan't to administer IP locking.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2010, Benoît Vermont <a href="mailto:redwarp@gmail.com">&lt;redwarp@gmail.com&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
EOL;
$lang['accessdenied'] = <<<AOL
<h3>Access denied</h3>
<p>Be you sure to have the sufficient permissions? If so, contact your administrator so they can correct the problem</p>
AOL;
$lang['genericerror'] = <<<UAL
Hohoho. It seems that your last operation caused an error. Are you sure you did everything correctly?
UAL;
$lang['iperror'] = <<<AOL
Specified IP is not valid.
AOL;
$lang['delete'] = 'Remove';
$lang['edit'] = 'Edit comment';
$lang['cancel'] = 'Cancel';
$lang['deleteconfirm'] = 'Please confirm the removal';
$lang['emptylist'] = 'The list is empty';
$lang['wrongip'] = '%s : Unauthorized IP';
$lang['add'] = 'Add';
$lang['added_allowed_ip'] = '%s : IP authorized';
$lang['added_denied_ip'] = '%s : IP banished';
$lang['removed_ip'] = '%s : IP removed';
$lang['prefs'] = 'Preferences';
$lang['allowed_ip'] = 'IPs authorized';
$lang['denied_ip'] = 'IPs prohibited';
$lang['yes'] = 'Yes';
$lang['no'] = 'No';

$lang['save'] = 'Save modifications';

$lang['notification_message'] = 'Someone(s) failed to log in and got banned. Check %s\'s admin panel to remove this notification.'

?>