<?php
$CMS_ADMIN_PAGE=1;
require_once("../../include.php");
global $gCms;
$IPLock=$gCms->modules['IPLock']['object'];;
$temp=$IPLock->GetTemplate('banned_template','IPLock');
echo $IPLock->ProcessTemplateFromData($temp);
?>