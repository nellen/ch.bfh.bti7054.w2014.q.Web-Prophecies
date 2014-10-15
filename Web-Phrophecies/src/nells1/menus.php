<?php
$MENU = array ();

$MENU ["HOME"] = array (
		'parent' => true, // parent == true ? show in top level menu : do not show in top level
		'enabled' => true,
		'text' => 'Home',
		'link' => './index.php',
		'sub_modules' => array ()  // empty sub modules means no sub menus need to display
);

$MENU ["SHOP"] = array (
		'parent' => true,
		'enabled' => true,
		'text' => 'Shop',
		'link' => '',
		'sub_modules' => array (
				'FOOD',
				'BEVERAGE',
				'MENUS',
				'SPECIALS' 
		)  // FOOD is a sub menu of SHOP,which is also configured as another module
);

$MENU ["FOOD"] = array (
		'parent' => FALSE, // PARENT = FALSE (this is a sub menu of SHOP)
		'enabled' => true,
		'text' => 'Food',
		'link' => '',
		'sub_modules' => array ()  // have 0 sub menu's
);

$MENU ["BEVERAGE"] = array (
		'parent' => FALSE,
		'enabled' => true,
		'text' => 'Beverage',
		'link' => '',
		'sub_modules' => array () 
);

$MENU ["MENUS"] = array (
		'parent' => FALSE,
		'enabled' => true,
		'text' => 'Menus',
		'link' => '',
		'sub_modules' => array () 
);

$MENU ["SPECIALS"] = array (
		'parent' => FALSE,
		'enabled' => true,
		'text' => 'Specials',
		'link' => '',
		'sub_modules' => array () 
);

$MENU ["ABOUTUS"] = array (
		'parent' => true, // parent == true ? show in top level menu : do not show in top level
		'enabled' => true,
		'text' => 'About us',
		'link' => '../html/aboutus.html',
		'sub_modules' => array ()  // empty sub modules means no sub menus need to display
);

$MENU ["CONTACT"] = array (
		'parent' => true, // parent == true ? show in top level menu : do not show in top level
		'enabled' => true,
		'text' => 'Contact',
		'link' => '../html/contact.html',
		'sub_modules' => array ()  // empty sub modules means no sub menus need to display
);
?>

<?php

$USERMENU = array ();

$USERMENU ["LOGIN"] = array (
		'parent' => true, // parent == true ? show in top level menu : do not show in top level
		'enabled' => true,
		'text' => 'Login / User Menu',
		'link' => '',
		'sub_modules' => array (
				'BASKET',
				'USERPROFILE',
				'FILLER',
				'CHECKOUT',
				'ADMINISTRATION'
		)  // FOOD is a sub menu of SHOP,which is also configured as another module
)

;

$USERMENU ["BASKET"] = array (
		'parent' => false,
		'enabled' => true,
		'text' => 'Shopping Basket',
		'link' => '../html/basket.html',
		'sub_modules' => array ()  // have 0 sub menu's
);

$USERMENU ["USERPROFILE"] = array (
		'parent' => FALSE, // PARENT = FALSE (this is a sub menu of SHOP)
		'enabled' => true,
		'text' => 'User Profile',
		'link' => '',
		'sub_modules' => array ()  // have 0 sub menu's
);

$USERMENU ["FILLER"] = array (
		'parent' => FALSE, // PARENT = FALSE (this is a sub menu of SHOP)
		'enabled' => true,
		'text' => '...',
		'link' => '',
		'sub_modules' => array ()  // have 0 sub menu's
);

$USERMENU ["CHECKOUT"] = array (
		'parent' => FALSE, // PARENT = FALSE (this is a sub menu of SHOP)
		'enabled' => true,
		'text' => 'Checkout',
		'link' => '',
		'sub_modules' => array ()  // have 0 sub menu's
);

$USERMENU ["ADMINISTRATION"] = array (
		'parent' => FALSE, // PARENT = FALSE (this is a sub menu of SHOP)
		'enabled' => true,
		'text' => 'Administration',
		'link' => '',
		'sub_modules' => array ()  // have 0 sub menu's
);

?>