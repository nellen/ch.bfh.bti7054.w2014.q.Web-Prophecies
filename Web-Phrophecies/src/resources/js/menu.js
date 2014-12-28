
var timeout = 500;
var timer;

function openMenu(menu){
	clearTimeout(timer);
	document.getElementById(menu).style.display = "block";
}

function closeMenu(menu){
	timer = setTimeout(function(){document.getElementById(menu).style.display = "none";}, timeout);
}

function showMenu(menu){
	document.getElementById(menu).style.display = "block";
}