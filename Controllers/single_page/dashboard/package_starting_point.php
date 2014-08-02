<?php
namespace Concrete\Package\PackageStartingPoint\Controller\SinglePage\Dashboard;

use Concrete\Core\Validation\CSRF\Token as ValidationToken;
use Concrete\Core\Page\Controller\DashboardPageController;
use Concrete\Package\PackageStartingPoint\Core\Service\Settings;
use Concrete\Core\Database\Database;

class PackageStartingPoint extends DashboardPageController {
	public function on_start() {
		$this->token = new ValidationToken();
	}
	public function on_before_render() {
		$settings = Settings::get();
		$this->set('settings', $settings);
		parent::on_before_render();
	}
	
	public function update() {
		if ($this->token->validate("update")) {
			if ($this->isPost()) {
				$form_data = $_POST;
				$database = Database::getActiveConnection();
				foreach ($form_data as $key=>$value) {
					Settings::set($key, $value);
				}
				$this->redirect("/dashboard/package_starting_point", 'updated');
			}
		} else {
			$this->set('error', array($this->token->getErrorMessage()));
		}
	}

	public function updated() {
		$this->set('message', 'Package Starting Point settings have been updated.');
	}
	
	public function view() {
	}
}
?>