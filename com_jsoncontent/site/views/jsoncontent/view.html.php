<?php
/*
 * @author: Aaron Jefferson Villanueva [aj_villanueva@shadowsonawall.net]
 * @created: December 09, 2012
 * 
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the Json Content Component
 */
class JsoncontentViewJsoncontent extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		$id_content = JRequest::getInt('id_content', 0); //get request

		$model = $this->getModel('Jsoncontent');
        
        $this->contents = $model->getContents($id_content);
        
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
       
 
		// Display the view
		parent::display($tpl);
		
		//This will remove the header css/javascript -> good for ajax request
		$app = &JFactory::getApplication();
        $app->close();
		
	}
}