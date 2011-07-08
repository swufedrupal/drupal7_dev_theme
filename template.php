<?php

function default_css_alter(&$css) {
	$rm[] = drupal_get_path('module', 'system') . '/system.css';
	$rm[] = drupal_get_path('module', 'system') . '/system.menus.css';
	
	foreach($rm as $key => $value) {
		unset($css[$value]);
	}
}

?>