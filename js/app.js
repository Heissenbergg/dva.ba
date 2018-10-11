function setLogo(){
	var height = window.innerHeight;
	var width = window.innerWidth;
	var image = document.getElementById("logo");
	var imageHeight = image.clientHeight;
	var languages = document.getElementById("languagePart");
	var dicons = document.getElementById("dizajIcons");
	var vicons = document.getElementById("visualIcons");
	var aicons = document.getElementById("arhIcons");

	image.width = 1920;
	var left = (width - image.clientWidth) / 2;

	if( (width/height) > 1.77){
		image.width = 1920;
		image.style.left = left + 'px';
		image.style.top = ( (height / 2) - (imageHeight) +50 ) + 'px';
		languages.style.top = ((height / 2) + 50) + 'px';
		document.getElementById("loadingbar").style.display = 'none';
		dicons.style.top = ((height / 2) + 100) + 'px';
		vicons.style.top = ((height / 2) + 100) + 'px';
		aicons.style.top = ((height / 2) + 100) + 'px';
		return;
	}else if(width > 800 && width < 2560){
		image.style.left = left + 'px';
		image.style.top = ( (height / 2) - (imageHeight) ) + 'px';
	}else{
		image.style.top = ( (height / 2) - (imageHeight) + 20) + 'px';
		languages.style.top = ((height / 2) + 50) + 'px';
		document.getElementById("loadingbar").style.display = 'none';
		dicons.style.top = ((height / 2) + 110) + 'px';
		vicons.style.top = ((height / 2) + 110) + 'px';
		aicons.style.top = ((height / 2) + 110) + 'px';
		return;
	}
	document.getElementById("loadingbar").style.display = 'none';
	languages.style.top = ((height / 2)) + 'px';
	dicons.style.top = ((height / 2) + 80) + 'px';
	vicons.style.top = ((height / 2) + 80) + 'px';
	aicons.style.top = ((height / 2) + 80) + 'px';
}

function hideLoading(){
	document.getElementById("loadingbar").style.display = 'none';
}


function showDesignIcons(){
	hiddeAllIcons();
	document.getElementById("dizajIcons").style.display = 'block';
}

function showVisualisationIcons(){
	hiddeAllIcons();
	document.getElementById("visualIcons").style.display = 'block';
}

function showArhitectureicons(){
	hiddeAllIcons();
	document.getElementById("arhIcons").style.display = 'block';
}


function hiddeAllIcons(){
	document.getElementById("dizajIcons").style.display = 'none';
	document.getElementById("visualIcons").style.display = 'none';
	document.getElementById("arhIcons").style.display = 'none';
}


var menuVisibility = 0;

function mobileMenu(){
	if(menuVisibility == 0){
		menuVisibility = 1;
		document.getElementById("mobileDropDownMenu").style.display = 'block';
	}else{
		menuVisibility = 0;
		document.getElementById("mobileDropDownMenu").style.display = 'none';
	}
}

