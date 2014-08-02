<?php

namespace Concrete\Package\PackageStartingPoint\SinglePage\Dashboard;
use Concrete\Core\Routing\URL as urlsHelper;
use Concrete\Core\Validation\CSRF\Token as ValidationToken;
use Concrete\Core\Form\Service\Form as FormHelper;
use Concrete\Core\Form\Service\Widget\PageSelector;
use Concrete\Core\Form\Service\Widget\UserSelector;
use Concrete\Core\Form\Service\Widget\DateTime;

$url = new UrlsHelper();
$validationToken = new ValidationToken();
$form = new FormHelper();
?>
<form method="post" id="package_starting_point_form" action="<?php echo $this->action('update') ?>">
	<?php echo $validationToken->output('update'); ?>
	<div class="ccm-dashboard-content-full">

		<table cellspacing="0" cellpadding="0" style="width:100%;" class="ccm-search-results-table">
			<thead>
				<tr>
					<th><?php echo t('Setting'); ?></th>
					<th><?php echo t('Value'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($settings as $setting) {
					?>
					<tr>
						<td><?php echo $setting['handle']; ?></td>
						<td><input type="text" class="form-control" value="<?php echo $setting['value'];?>" name="<?php echo $setting['handle']; ?>">
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>

	</div>
	<div class="ccm-dashboard-form-actions-wrapper">
		<div class="ccm-dashboard-form-actions">
			<button class="pull-right btn btn-success" type="submit" ><?php echo t('Update Settings') ?></button>
			<button class="pull-left btn" type="button" onclick="location.href = '<?php echo $url->to('/dashboard'); ?>';"><?php echo t('Go to the Dashboard') ?></button>
		</div>
	</div>
</form>