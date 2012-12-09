<?php
/*
 * @author: Aaron Jefferson Villanueva [aj_villanueva@shadowsonawall.net]
 * @created: December 09, 2012
 * 
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * Jsoncontent Model
 */
class JsoncontentModelJsoncontent extends JModelItem
{
	/**
	 * @var string msg
	 */
	protected $msg;
	protected $ramen;
	protected $item;
	
   /**
	 * Method to auto-populate the model state.
	 *
	 * This method should only be called once per instantiation and is designed
	 * to be called on the first call to the getState() method unless the model
	 * configuration flag to ignore the request is set.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return	void
	 * @since	2.5
	 */
	protected function populateState() 
	{
		$app = JFactory::getApplication();
		// Get the message id
		$input = JFactory::getApplication()->input;
		$id = $input->getInt('id');
		$this->setState('title.id', $id);
 
		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
		parent::populateState();
	}
	
    /**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	2.5
	 */
	public function getTable($type = 'Jsoncontent', $prefix = 'JsoncontentTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
    
	
	/**
	 * @return Object Array
	 * Get cotents
	 */
    public function getContents($id_content)
	{
		/*
		 * Content fields
		 * id
		 * asset_id
		 * title
		 * alias
		 * title_alias
		 * introtext
		 * state
		 * sectionid
		 * mask
		 * catid
		 * created	
		 * created_by
		 * created_by_alias
		 * modified
		 * modified_by
		 * checked_out
		 * checked_out_time
		 * publish_up
		 * publish_down
		 * images
		 * urls
		 * attribs
		 * version
		 * parentid
		 * ordering
		 * metakey
		 * metadesc
		 * access
		 * hits
		 * metadata
		 * featured
		 * language
		 * xreference
		 */
		
	    if($id_content){	 
    	  $the_query = 'id=' . (int)$id_content . ' AND state = 1';
    	}
    	else {
    	  $the_query = '1=1 AND state = 1';	
    	}
 

		
		//Query Contents
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,
		                asset_id,
		                title,
		                alias,
		                title_alias,
		                introtext,
		                state,
		                sectionid,
		                mask,
		                catid,
		                created,
		                created_by,
		                created_by_alias,
		                modified,
		                modified_by,
		                checked_out,
		                checked_out_time,
		                publish_up,
		                publish_down,
		                images,
		                urls,
		                attribs,
		                version,
		                parentid,
		                ordering,
		                metakey,
		                metadesc,
		                access,
		                hits,
		                metadata,
		                featured,
		                language,
		                xreference');
		$query->from('#__content');
		$query->where($the_query);
		$db->setQuery((string)$query);
		$contents = $db->loadObjectList();
		
		return $contents;
	}
	
}