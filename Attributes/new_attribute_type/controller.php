<?php
namespace Concrete\Package\PackageStartingPoint\Attribute\NewAttributeType;
use Concrete\Core\Utility\Service\Text as TextHelper;
use Concrete\Core\Form\Service\Form as FormHelper;
use \Concrete\Core\Attribute\Controller as AttributeTypeController;

class Controller extends AttributeTypeController  {

	protected $searchIndexFieldDefinition = array('type' => 'string', 'options' => array('length' => 255, 'default' => null, 'notnull' => false));

	public function form() {
		$formHelper = new FormHelper();
		if (is_object($this->attributeValue)) {
			$textHelper = new TextHelper();
			$value = $textHelper->entities($this->getAttributeValue()->getValue());
		}
		print $formHelper->text($this->field('value'), $value);
	}
	
	public function composer() {
		if (is_object($this->attributeValue)) {
			$textHelper = new TextHelper();
			$value = $textHelper->entities($this->getAttributeValue()->getValue());
		}
		print $formHelper->text($this->field('value'), $value, array('class' => 'span5'));
	}


}