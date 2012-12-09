<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of Jsoncontent component
 */
class JsoncontentController extends JController
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false) 
	{
		// set default view if not set
 
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'Jsoncontents'));
 
		// call parent behavior
		parent::display($cachable);
		
		// Set the submenu
		JsoncontentHelper::addSubmenu('servings');
	}
}