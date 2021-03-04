<?php

define('IPFILTER_ERROR', -1);
define('IPFILTER_IP_ERROR', 0);
define('IPFILTER_SUCCESS', 1);
define('IPFILTER_NO_CHANGE', 2);
define('IPFILTER_ALLOW', 10);
define('IPFILTER_DENY', -10);

class IPFilter {
	protected static $db;
	protected static $tableName;
	protected static $watchTableName;
	protected static $max_conn_min;
	/* @var $iplock IPLock */
	protected static $iplock;
	
	public static function init(IPLock2 $iplock) {
		self::$iplock = $iplock;
		self::$db = $iplock->GetDb();
		self::$tableName = $iplock->_GetDbName();
		self::$watchTableName = $iplock->_GetWatchDbName();
	}
	
	
	private static function isIPInList($ip, $ip_mode){
		$ipList = self::getIPList($ip_mode);
		foreach ( $ipList as $ipFromList ) {
			$allIsGood = true;
			$ipListPart = explode ( '.', $ipFromList );
			$ipPart = explode ( '.', $ip );
			// Pas une IP ?
			if (count ( $ipPart ) != 4) {
				return false;
			}
			for($i = 0; $i < 4; $i ++) {
				// Si c'est une étoile, c'est bon, et donc on vérifie
				//l'élément suivant
				if (strcmp ( $ipListPart [$i], '*' ) == 0) {
					continue;
				}
				$plage = explode ( '-', $ipListPart [$i] );
				if (count ( $plage ) == 2) {
					$part = intval ( $ipPart [$i] );
					$min = intval ( $plage [0] );
					$max = intval ( $plage [1] );
					if ($part >= $min && $part <= $max)
						;
					else {
						$allIsGood = false;
						break;
					}
				} else {
					if (intval ( $ipPart [$i] ) == intval ( $ipListPart [$i] ))
						;
					else {
						$allIsGood = false;
						break;
					}
				}
			}
			if ($allIsGood) {
				return true;
			}
		}
		return false;
	}
	
	/**
	 * Défini si l'ip passée en argument est autorisée ou non à se logguer
	 * Petite erreur dans le code : continue(2) ne fonctionnant pas, j'ai du feinter.
	 *
	 * @param string L'IP a tester
	 * @return boolean Si l'IP est autorisée ou non.
	 */
	public static function isAllowedIP($ip) {
		return self::isIPInList($ip, IPFILTER_ALLOW);
	}
	
	public static function isDeniedIP($ip) {
		return self::isIPInList($ip, IPFILTER_DENY);
	}
	
	
	private static function getIPList($ip_mode) {
		$retour = array ();
		$q = "SELECT * FROM ".self::$tableName." WHERE `ip_mode` = '?' ORDER BY `ip_value`";
		$data = self::$db->Execute ( $q, array ( $ip_mode ));
		while ( $data && $donnee = $data->FetchRow () ) {
			$retour [$donnee ['ip_id']] = $donnee ['ip_value'];
		}
		return $retour;
	}
	/**
	 * Récupère la liste de toutes les IP ou plages d'IP autorisée à se
	 * logguer
	 *
	 * @return array Liste d'ip autorisées
	 */
	public static function getAllowedIPList() {
		return self::getIPList(IPFILTER_ALLOW);
	}
	
	public static function getDeniedIPList(){
		return self::getIPList(IPFILTER_DENY);
	}
	
	/**
	 * Enlève une IP ou plage d'IP autorisée de la base de donnée, en
	 * l'identifiant par son ID
	 *
	 * @param int l'ID de l'IP a oter.
	 * @return boolean Vrai si l'opération s'est bien déroulé, Faux sinon
	 */
	public static function removeIP($ip_id) {
		if (! is_numeric ( $ip_id )) {
			return IPFILTER_ERROR;
		}
		
		$q = "SELECT ip_value FROM " . self::$tableName . " WHERE ip_id = ?";
		$row = self::$db->GetRow( $q, array(intval($ip_id)) );
		$ip = $row ['ip_value'];
		
		if ($ip == '127.0.0.1') {
			return IPFILTER_NO_CHANGE;
		}
		else {
			$q = "DELETE FROM " . self::$tableName . " WHERE ip_id = ?";
			$qresult = self::$db->Execute ( $q, array(intval($ip_id)) );
			
			if (! $qresult) {
				return IPFILTER_ERROR;
			}
			else {
				return IPFILTER_SUCCESS;
			}
		}
	}
	
	public static function getIP($ip_id) {
		$q = "SELECT ip_value FROM ".self::$tableName." WHERE ip_id = ?";
		$row = self::$db->GetRow ( $q, array(intval($ip_id)) );
		if (! $row){
			return IPFILTER_ERROR;
		}
		else {
			return $row['ip_value'];
		}
	}
	
	
	private static function addIP($ip, $ip_mode){
		if (! self::checkIP ( $ip )) {
			return IPFILTER_IP_ERROR;
		} else {
			$ipInList = self::isIPInList ( $ip, $ip_mode );
			if (! $ipInList) {
				$q = "INSERT INTO " . self::$tableName . " (ip_value, ip_mode) VALUES (?,?)";
				$qresult = self::$db->Execute ( $q, array ($ip, $ip_mode) );
				if (! $qresult) {
					return IPFILTER_ERROR;
				}
			}else{
				$query = 'UPDATE '.cms_db_prefix().'module_iplock SET ip_mode=? WHERE ip_value =?';
				$result = self::$db->Execute($query,array(IPFILTER_ALLOW,$ip));	
			}
			return IPFILTER_SUCCESS;
		}
	}
	
	
	/**
	 * Ajoute une IP autorisée à la base de donnée, après avoir vérifié sa
	 * validité
	 *
	 * @param string L'IP à ajouter
	 * @return int Faux si erreur, Vrai sinon, -1 si erreur.
	 */
	public static function allowIP($ip) {
		return self::addIP($ip, IPFILTER_ALLOW);
	}
	
	public static function denyIP( $ip ) {
		if ( $ip == '127.0.0.1' ) {
			return IPFILTER_NO_CHANGE;
		}
		else {
			return self::addIP( $ip, IPFILTER_DENY );
		}
	}
	
	/**
	 * Vérifie qu'une chaine de caractère a le bon format, correspondant
	 * bien à une ip ou une chaine d'ip.
	 *
	 * @param string L'IP à vérifier
	 * @return boolean Si l'IP est du bon format ou non.
	 */
	public static function checkIP($IP) {
		// Divise la chaine de caractère selon les '.'
		$ip_field = explode ( '.', $IP );
		// Si on n'a pas quatres parties dans l'adresse, ce n'est pas la
		// peine de continuer : ce n'est pas une IPv4
		if (count ( $ip_field ) != 4) {
			return false;
		}
		
		// Sinon, on va vérifier chaqun des champs
		foreach ( $ip_field as $field ) {
			// Si c'est une étoile, c'est acceptable.
			if (strcmp ( $field, '*' ) == 0) {
				continue;
			} // Sinon
else {
				$plage = explode ( '-', $field );
				// Si c'est une plage, séparé par '-'
				if (count ( $plage ) == 2) {
					if (! IPFilter::checkField ( $plage [0] )) {
						return false;
					}
					if (! IPFilter::checkField ( $plage [1] )) {
						return false;
					}
					if (intval ( $plage [0] ) > intval ( $plage [1] )) {
						return false;
					}
				} else {
					if (! IPFilter::checkField ( $field )) {
						return false;
					}
				}
			
			}
		}
		return true;
	}
	
	/**
	 * Vérifie qu'une partie de plage ou d'IP est bien comprise entre 0 et 255
	 * ou étoile
	 * @param string Le champ à vérifier
	 * @return boolean Si le champ est valide
	 */
	private static function checkField($field) {
		if (! is_numeric ( $field )) {
			return false;
		}
		$field = intval ( $field );
		if ($field < 0 || $field > 255) {
			return false;
		} else {
			return true;
		}
	}
	
	public static function watchIP ($ip, $max_conn_min){
		
		$q = "SELECT * FROM ".self::$watchTableName." WHERE ip_value = ?";
		// Check if there is already a entry in the table
		$row = self::$db->GetRow ( $q, array( $ip ) );
		// If not, let's create one !
		if (! $row){
			$q = "INSERT INTO ".self::$watchTableName."(ip_value, first_try, try_count, total_try_count) VALUES (?, CURRENT_TIMESTAMP -10 ,?,?)";
			$array = array($ip, 0, 0);
			$qresult = self::$db->Execute ( $q, $array );
			if (! $qresult) {
				return IPFILTER_ERROR;
			}
			// A bit redundant but well...
			$q = "SELECT * FROM ".self::$watchTableName." WHERE ip_value = ?";
			// Check if there is already a entry in the table
			$row = self::$db->GetRow ( $q, array( $ip ) );
		}
		
		/* Now that we are sure to have an entry to work on...
		 * If the login try count was initiated less than a minute ago
		 * we take the count into acount.
		 * If it's older, we reset the count to 0.
		 * Well, actually, one : the present try that failed
		 */
		$q = "SELECT * FROM ".self::$watchTableName." WHERE ipwatch_id = ? AND first_try > CURRENT_TIMESTAMP - 100";
		$qresult2 = self::$db->GetRow ( $q, array( $row['ipwatch_id']));
		/* If the count was older than a minute ago, we make it start at the
		 * current time.
		 */
		if( count($qresult2) == 0 ){
			$row['first_try'] = 'CURRENT_TIMESTAMP';
			$row['try_count'] = 1;
		}
		/* If it's newer than a minute ago, we take the old count and increase it.
		 */
		else{
			$row['first_try'] = "'".$row['first_try']."'";
			$row['try_count'] ++ ;
		}
		// If the user tried and failed to log in more than the number
		// specified in prefs (max_conn / minute), we bann it's IP
		if ($row['try_count'] > $max_conn_min){
			self::denyIP($ip);
			self::$iplock->SetPreference('new_banned_ip', 'not_verified');
			return IPFILTER_DENY;
		}
		$row['total_try_count']++;
		$q = "UPDATE ".self::$watchTableName." SET first_try = $row[first_try], try_count = ?, total_try_count = ? WHERE ipwatch_id = ?";
		$array = array( $row['try_count'], $row['total_try_count'], $row['ipwatch_id'] );
		$qresult = self::$db->Execute($q, $array);
		
		if(! $qresult){
			return IPFILTER_ERROR;
		}
		else{
			return IPFILTER_NO_CHANGE;
		}
	}
	
	public static function watchIPFlush($ip){
		$q = "UPDATE ".self::$watchTableName." SET try_count = 0 WHERE ip_value = ?";
		$row = self::$db->GetRow($q, array($ip));
	}
	
	public static function getIPComment($ip_id){
		if (! is_numeric ( $ip_id )) {
			return IPFILTER_ERROR;
		}
		$q = "SELECT ip_comment FROM ".self::$tableName." WHERE ip_id = ?";
		$row = self::$db->GetRow ( $q, array($ip_id) );
		if (! $row){
			return IPFILTER_ERROR;
		}
		else {
			return $row['ip_comment'];
		}
	}
	
	public static function setIPComment($ip_id, $comment){
		if (! is_numeric ( $ip_id )) {
			return IPFILTER_ERROR;
		}
		$q = "UPDATE ".self::$tableName." SET ip_comment = ? WHERE ip_id = ?";
		$qresult = self::$db->Execute($q, array($comment, $ip_id));
		if (! $qresult) {
			return IPFILTER_ERROR;
		}
	}
	
}
