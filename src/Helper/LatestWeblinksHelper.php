<?php
/**
* mod_latest_weblinks
* Version			: 2.0.0
* Package			: Joomla 4.x.x
* copyright 		: Copyright (C) 2021 ConseilGouz. All rights reserved.
* license    		: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
namespace Joomla\Module\LatestWeblinks\Site\Helper;
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;

class  LatestWeblinksHelper
{

	public static function getWebLinks($params) {
		$app = Factory::getApplication();
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select('u.*,c.alias as catalias')
			->from('#__weblinks AS u')
			->join('INNER','#__categories as c ON c.id = u.catid ')
			->where('u.state = 1 AND (u.language = "*" OR u.language like "'.$app->getLanguage()->getTag().'")')
			->order('u.created desc')
			->setLimit($params->get('count','5'))
			;
		$db->setQuery($query);
		$items= $db->loadObjectList();
		if ($items)
		{
			foreach ($items as $item)
			{
				$item->link	= Route::_('index.php?option=com_weblinks&task=weblink.go&catid=' . $item->catid . ':'.$item->catalias.'&id=' . $item->id.':'.$item->alias);
				$result[] = $item;
			}
			return $result;
		}

		return false;
		}


}
