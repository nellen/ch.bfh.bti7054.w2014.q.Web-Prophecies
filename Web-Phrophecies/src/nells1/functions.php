<?php

/**
 *
 * @param unknown $MENU
 * @param unknown $cssClass
 * @param string $subIndex
 * @return string
 */
function show_menu(&$MENU, $cssClass, $subIndex = false) {
	
	$menu_string = '<UL class="' . $cssClass . '">';

	if (! $subIndex) {
		foreach ( $MENU as $item ) {
			if ($item ['enabled'] && $item ['parent']) {
				$_subString = "";
				if (! empty ( $item ['sub_modules'] )) {
					foreach ( $item ['sub_modules'] as $sub ) {
						$_subString .= show_menu ( $MENU, $cssClass, $sub );
					}
				}
				$menu_string .= "<LI><A href =" . $item ['link'] . ">" . $item ['text'] . "</A>" . $_subString . '</LI>';
			}
		}
	} else {
		if (@$MENU [$subIndex] ['enabled'] && ! @$MENU [$subIndex] ['parent']) {
			$_subString = "";
			if (! empty ( $MENU [$subIndex] ['sub_modules'] )) {
				foreach ( $MENU [$subIndex] ['sub_modules'] as $sub ) {
					$_subString .= show_menu ( $MENU, "", $sub );
				}
			}
			$menu_string .= "<LI><A href =" . $MENU [$subIndex] ['link'] . ">" . $MENU [$subIndex] ['text'] . "</A>" . $_subString . '</LI>';
		}
	}

	return $menu_string . '</UL>';
}
?>