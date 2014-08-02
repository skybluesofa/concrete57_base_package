<?php
// Image associated with this package was provided by dakirby309 at http://dakirby309.deviantart.com/.
namespace Concrete\Package\PackageStartingPoint;

use Concrete\Core\Package\Package;
use Concrete\Package\PackageStartingPoint\Core\Installer;
use Concrete\Package\PackageStartingPoint\Core\Service\Events as PackageEvents;

class Controller
	extends Package {

	protected $pkgHandle = 'package_starting_point';
	protected $appVersionRequired = '5.7';
	protected $pkgVersion = '0.1';

	public function getPackageName() {
		return t("Package Starting Point");
	}

	public function getPackageDescription() {
		return t("This is a starting point for a new concrete5.7 package.");
	}

	public function on_start() {
		//PackageEvents::addOnStart();
	}

	public function install() {
		$preInstallationIsOkay = Installer::preInstallationCheck();
		if ($preInstallationIsOkay) {
			$pkg = parent::install();
			Installer::install($pkg);
		} else {
			return $preInstallationIsOkay;
		}
	}

	public function upgrade() {
		Loader::model('geocode_installer', 'skybluesofa_geocode');
		$preInstallationIsOkay = Installer::preInstallationCheck();
		if ($preInstallationIsOkay) {
			parent::upgrade();
			$pkg = $this->getByID($this->getPackageID());
			Installer::upgrade($pkg);
		} else {
			return $preInstallationIsOkay;
		}
	}
}

?>