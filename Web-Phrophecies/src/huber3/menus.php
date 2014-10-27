<?php

// The navigation menu
$navMenu = array ();

// The Items of navMenu
$navMenu ["HOME"] = array (
		'text' => "Home",
		'link' => "./myindex.php",
		'subItems' => array (),
		'isSubItem' => FALSE 
);

$navMenu ["SHOP"] = array (
		'text' => "Shop",
		'link' => "",
		'subItems' => array (
				'FOOD',
				'BEVERAGE',
				'MENUS',
				'SPECIALS' 
		),
		'isSubItem' => FALSE 
);

$navMenu ["FOOD"] = array (
		'text' => "Food",
		'link' => "",
		'subItems' => array (),
		'isSubItem' => TRUE 
);

$navMenu ["BEVERAGE"] = array (
		'text' => "Beverage",
		'link' => "",
		'subItems' => array (),
		'isSubItem' => TRUE 
);

$navMenu ["MENUS"] = array (
		'text' => "Menus",
		'link' => ' ',
		'subItems' => array (),
		'isSubItem' => TRUE 
);

$navMenu ["SPECIALS"] = array (
		'text' => "Specials",
		'link' => "",
		'subItems' => array (),
		'isSubItem' => TRUE 
);

$navMenu ["ABOUTUS"] = array (
		'text' => "About us",
		'link' => "../html/aboutus.html",
		'subItems' => array (),
		'isSubItem' => FALSE 
);

$navMenu ["CONTACT"] = array (
		'text' => "Contact",
		'link' => "../html/contact.html",
		'subItems' => array (),
		'isSubItem' => FALSE 
);

$userMenu = array ();

$userMenu ["LOGIN"] = array (
		'text' => 'Login / User Menu',
		'link' => '',
		'subItems' => array (
				'BASKET',
				'USERPROFILE',
				'FILLER',
				'CHECKOUT',
				'ADMINISTRATION' 
		),
		'isSubItem' => FALSE 
);



$userMenu ["BASKET"] = array (
		'text' => 'Shopping Basket',
		'link' => '../html/basket.html',
		'subItems' => array (), // have 0 sub menu's
		'isSubItem' => TRUE 
);

$userMenu ["USERPROFILE"] = array (
		'text' => 'User Profile',
		'link' => '',
		'subItems' => array (), // have 0 sub menu's
		'isSubItem' => TRUE 
);

$userMenu ["FILLER"] = array (
		'text' => '...',
		'link' => '',
		'subItems' => array (), // have 0 sub menu's
		'isSubItem' => TRUE 
);

$userMenu ["CHECKOUT"] = array (
		'text' => 'Checkout',
		'link' => '',
		'subItems' => array (), // have 0 sub menu's
		'isSubItem' => TRUE 
);

$userMenu ["ADMINISTRATION"] = array (
		'text' => 'Administration',
		'link' => '',
		'subItems' => array (), // have 0 sub menu's
		'isSubItem' => TRUE 
);


function buildMenu($Menu, $cssStyle, $isSubMenu = False) {
	if ($isSubMenu) {
		return "<li><a href=" . $Menu ['link'] . ">" . $Menu ['text'] . "</a></li>";
	} else {
		$navMenu_html = "<ul class=" . $cssStyle . ">";
		foreach ( $Menu as $item ) {
			if (! $item ['isSubItem'] || (! empty ( $item ['subItems'] ))) {
				if ((empty ( $item ['subItems'] ))) {
					$navMenu_html .= "<li><a href=" . $item ['link'] . ">" . $item ['text'] . "</a></li>";
				} else {
					$navMenu_html .= "<li>" . $item ['text'] . "<ul class=" . $cssStyle . ">";
					foreach ( $item ['subItems'] as $subMenu ) {
						$navMenu_html .= buildMenu ( $Menu [$subMenu], $cssStyle, True );
					}
					$navMenu_html .= "</ul>";
				}
			}
		}
	}
	return $navMenu_html .= "</ul>";
}

?>