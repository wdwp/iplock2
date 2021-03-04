<?php
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#-------------------------------------------------------------------------
if( !isset($gCms) ) exit();

$this->_IPFilterInit ();
$ip = $_SERVER ["REMOTE_ADDR"];

if ($this->GetPreference ( 'operating_process' ) == 'allow') {
	$allowedIP = !IPFilter::isDeniedIP ( $ip );
} else {
	
	// L'ip est elle dans la liste des IPs autorisées ?
	$allowedIP = IPFilter::isAllowedIP ( $ip );
	// Et surtout, n'est elle pas bannie ?
	$allowedIP = $allowedIP && ! IPFilter::isDeniedIP ( $ip );
}			
// A ce stade là, l'utilisateur est considéré comme logué.
// Mais si son IP est incorrecte, on le redirige vers la page logout.php, ce qui le dégage.
if (! $allowedIP) {
	$this->Audit ( 42, $this->GetName (), $this->Lang ( 'wrongip', $ip ) );
	redirect ( 'logout.php' );
}

/* Pur paranoïa : on redirige également l'utilisateur sur logout
 * au cas ou il aurait fourni des mauvais identifiants. */
global $password, $oneuser;
if (($oneuser->id == '' || $password == "")) {			
	IPFilter::watchIP($ip, $this->GetPreference('max_conn_min'));
	redirect ( 'logout.php' );
} else {
	IPFilter::watchIPFlush($ip);
}

?>

