
var timeout = 500;
var timer;
var disabled=true;

function openMenu(menu){
	if(disabled){
		clearTimeout(timer);
		document.getElementById(menu).style.display = "block";
	}
}

function closeMenu(menu){
	if(disabled){
		timer = setTimeout(function(){document.getElementById(menu).style.display = "none";}, timeout);
	}
}

function showMenu(menu){
	disabled = false;
	document.getElementById(menu).style.display = "block";
}