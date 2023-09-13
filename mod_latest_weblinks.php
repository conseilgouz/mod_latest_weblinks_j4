<?php
/**
* mod_latest_weblinks
* Version			: 2.1.0
* Package			: Joomla 4.x/5.x
* copyright 		: Copyright (C) 2023 ConseilGouz. All rights reserved.
* license    		: https://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
use ConseilGouz\Module\LatestWeblinks\Site\Helper\LatestWeblinksHelper;
use Joomla\CMS\Helper\ModuleHelper;

$list = LatestWeblinksHelper::getWebLinks($params);
if (!$list) return false; // on a eu une erreur: on sort
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx',''), ENT_COMPAT, 'UTF-8');

require ModuleHelper::getLayoutPath('mod_latest_weblinks', $params->get('layout', 'default'));
