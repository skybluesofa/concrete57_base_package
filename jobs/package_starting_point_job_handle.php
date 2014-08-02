<?php
/*
 * Ads for Page List+ for c5
 *
 * @package Ads for Page List+
 * @author Dave Rogers <connect@skybluesofa.com>
 * @version 5.5.0.0.1
 * @copyright Copyright (c) 2014, Dave Rogers
 * @license http://www.concrete5.org/help/legal/commercial_add-on_license/ c5 Commercial Add-On License
 */
namespace Concrete\Package\PackageStartingPoint\Jobs;

use Concrete\Core\Job\Job as AbstractJob;
use Concrete\Core\Database\Database;

class UpdateAdStatistics extends AbstractJob {

	public $jNotUninstallable=1;
	
	public function getJobName() {
		return t("Basic Job as a Starting Point");
	}
	
	public function getJobDescription() {
		return t("A basic Job so you get the idea how to install");
	}
	
	public function run() {
		$db = Database::getActiveConnection();
		$sql = "SELECT count(cID) as pageCount FROM Collections";
		$pageCount = $db->getOne($sql);

		return t('Counting completed.').' '.t2('There is %d page on your site.', 'There are %d pages on your site.', $pageCount, $pageCount);
	}

}

?>