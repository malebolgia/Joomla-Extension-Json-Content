<?php
/*
 * @author: Aaron Jefferson Villanueva [aj_villanueva@shadowsonawall.net]
 * @created: December 09, 2012
 * 
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jsoncontent')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Set some global property
//$document = JFactory::getDocument();
//$document->addStyleDeclaration('.icon-48-jsoncontent {background-image: url(../media/com_jsoncontent/images/joosoon.png);}');



// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by Jsoncontent
$controller = JController::getInstance('Jsoncontent');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();