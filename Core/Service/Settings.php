<?php

namespace Concrete\Package\PackageStartingPoint\Core\Service;

use Concrete\Core\Foundation\Object;
use Concrete\Core\Database\Database;

class Settings extends Object {
	static function get($handle=null) {
		/*
		 * An example of adding a listener that is triggered when a
		 * page is updated.
		 */
		$database = Database::getActiveConnection();
		if ($handle) {
			$sql = "SELECT * FROM aoPackageStartingPointSettings WHERE handle=?";
			$values = array($handle);
			return $database->getArray($sql,$values);
		} else {
			$sql = "SELECT * FROM aoPackageStartingPointSettings WHERE 1=1";
			return $database->getArray($sql);
		}
	}	
	static function set($handle=null, $value=null) {
		/*
		 * An example of adding a listener that is triggered when a
		 * page is updated.
		 */
		$database = Database::getActiveConnection();
		if ($handle) {
			$sql = "UPDATE aoPackageStartingPointSettings SET value=? WHERE handle=?";
			$values = array($value, $handle);
			$database->execute($sql,$values);
			return $value;
		} else {
			return false;
		}
	}	
}
