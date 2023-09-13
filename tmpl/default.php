<?php
/**
 * mod_last_weblinks
* mod_latest_weblinks
* Version			: 2.1.0
* Package			: Joomla 4.x/5.x
* copyright 		: Copyright (C) 2023 ConseilGouz. All rights reserved.
* license    		: https://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$displaydate =  $params->get('displaydate', 'show');
?>
<ul class="latestlinks<?php echo $moduleclass_sfx; ?>">
<?php 

foreach ($list as $item) {
		$tag_display = "";
        echo '<li>';
		$click = $item->hits;
		echo '<a href="'.$item->link.'" target="_blank" rel="noopener noreferrer">'.$item->title.'</a>&nbsp;';
		if ($displaydate == "show") {
			$created = Text::_("LASTWL_CREATION");
			$dateformat = Text::_("LASTWL_DATEFORMAT");
			echo '<br/>('.$created.HTMLHelper::_('date', $item->created,$dateformat).')';
		}
	echo '</li>';
}

?>

</ul>
