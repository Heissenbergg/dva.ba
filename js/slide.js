var numberOfslides;
var i=1;
function init(){
	numberOfslides = document.getElementById("numOfImages").innerHTML;
	document.getElementById("loadingbar").style.display = 'none';
	console.log("num of " + numberOfslides);
}

function hideLoadingbar(){
	document.getElementById("loadingbar").style.display = 'none';
}

function showNext(){
	console.log(i);
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