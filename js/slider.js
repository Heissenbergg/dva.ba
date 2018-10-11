var i = 1;
var realWidth = window.innerWidth;
var realHeight = window.innerHeight;
var w = (window.innerWidth * 0.7) ;
var h = window.innerHeight - 200;
var numberOfslides;

function designSlider(){
	var section = document.getElementById("leftSection");
	var text = document.getElementById("leftSectionBody");
	var icons = document.getElementById("socialIcons");
	var sliderPart = document.getElementById("sliderPart");
	var image = document.getElementById("sliderPart").getElementsByClassName("sliderImages");
	sliderPart.style.position = "absolute";
	numberOfslides = image.length;
	for(var i=0;i<image.length;i++){
		var imageW = image[i].clientWidth;
		var imageH = image[i].clientHeight;
		if(realWidth > 1000){
			image[i].width = w;
			image[i].style.top = ((h - imageH) / 2) + 'px';
		}else if(realWidth > 700){
			sliderPart.style.top = (section.clientHeight) + 'px';
			icons.style.top = (section.clientHeight + sliderPart.clientHeight) + 'px';
			//console.log(section.clientHeight + sliderPart.clientHeight);
			image[i].width = realWidth - 100;
			image[i].style.top = ((h - imageH) / 2) + 'px';
		}else{
			sliderPart.style.top = (text.clientHeight) + 'px';
			icons.style.top = (text.clientHeight + sliderPart.clientHeight + 50) + 'px';
			//console.log(section.clientHeight + sliderPart.clientHeight - 200);
			image[i].width = realWidth;
			image[i].style.top = ((h - imageH) / 2) + 'px';
		}
	}
	for(i=0;i<numberOfslides + 1;i++){
		$("#" + i).fadeOut(1);
	}
	$("#" + numberOfslides).fadeIn();
	//console.log(numberOfslides);
	hideLoading();
}

function givehuge(){
	var slider = document.getElementById("sliderPart");
	slider.style.position = "fixed";
	slider.style.width = "100%";
	slider.style.top = "0px";
	slider.style.left = "0px";
	slider.style.height = "100%";
	slider.style.background ="#f6f6f6";
	slider.style.zIndex= "100000000000";
	var image = document.getElementById("sliderPart").getElementsByClassName("sliderImages");
	var realHee = window.innerHeight;
	var realWii = window.innerWidth;
	var top = realHee - image[0].clientHeight;
	console.log(realHee);
	for(var i=0;i<image.length;i++){
		image[i].width = realWii;
		//console.log("i : " + i + " - " + image[i].width);
		image[i].style.top = ((top) / 2) + 'px';
	}
}


function showNext(){
    if(i < numberOfslides){
	    $("#" + i).fadeOut();
	    i++;
	    $("#" + i).fadeIn();		    
	}else{
	    $("#" + i).fadeOut();
	    i=1;
	    $("#" + i).fadeIn();
	}
}
function showPrevious(){
    if(i == 1){
	    $("#" + i).fadeOut();
	    i = numberOfslides;
	    $("#" + i).fadeIn();		    
	}else{
	    $("#" + i).fadeOut();
	    i--;
	    $("#" + i).fadeIn();
	}
}


function hideLoading(){
	document.getElementById("loadingbar").style.display = 'none';
}

function showVideo(){
	for(i=0;i<numberOfslides + 1;i++){
		$("#" + i).fadeOut();
	}
	document.getElementById("leftArrow").style.display = 'none';
	document.getElementById("rightArrow").style.display = 'none';
	document.getElementById("iframe").style.display = 'block';
}


function showGallery(){
	$("#" + numberOfslides).fadeIn();
	document.getElementById("leftArrow").style.display = 'block';
	document.getElementById("rightArrow").style.display = 'block';
	document.getElementById("iframe").style.display = 'none';
}