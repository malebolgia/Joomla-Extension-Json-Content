<?php
/*
 * @author: Aaron Jefferson Villanueva [aj_villanueva@shadowsonawall.net]
 * @created: December 09, 2012
 * 
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 
/**
 * Jsoncontents Controller
 */
class JsoncontentControllerJsoncontents extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	2.5
	 */
	public function getModel($name = 'Jsoncontent', $prefix = 'JsoncontentModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}