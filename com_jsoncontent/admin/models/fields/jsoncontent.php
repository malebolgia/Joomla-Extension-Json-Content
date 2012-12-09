<?php
/*
 * @author: Aaron Jefferson Villanueva [aj_villanueva@shadowsonawall.net]
 * @created: December 09, 2012
 * 
 */
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Jsoncontent Form Field class for the Jsoncontent component
 */
class JFormFieldJsoncontent extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Jsoncontent';
 
	
}