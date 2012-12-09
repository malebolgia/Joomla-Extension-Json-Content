<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * Jsoncontent View
 */
class JsoncontentViewAbout extends JView
{
	/**
	 * View form
	 *
	 * @var		form
	 */
	protected $form = null;
	
	/**
	 * display method of Jsoncontent view
	 * @return void
	 */
	public function display($tpl = null) 
	{
	
 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

       // Set the toolbar
		$this->addToolBar();
 
		// Display the template
		parent::display($tpl);
		

	}
	
/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{		
	    $canDo = JsoncontentHelper::getActions();
		JToolBarHelper::title(JText::_('COM_JSONCONTENT_ABOUT_JSONCONTENT'), 'jsoncontent');
		
	}
 
	
}