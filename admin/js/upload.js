var iconName;
var photos = new Array();
function uploadPicture(){
	var fileInput = document.getElementById("file");
	var data = new FormData();
	data.append('file', fileInput.files[0]);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	/*var nameOfImage = this.responseText;*/
	      	iconName = this.responseText;
	      	var profileImage = document.getElementById("iconName");
	      	profileImage.setAttribute("src", "icons/" + iconName); 	      	
	    }
	};
	xml.open('POST', 'includes/profilePictureUpload.php');
	//xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.send(data);

}

function uploadAllPictures(){
	var fileInput = document.getElementById("file");
	var data = new FormData();
	data.append('file', fileInput.files[0]);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	/*var nameOfImage = this.responseText;*/
	      	var imageName = "photos/" + this.responseText; 	  
	      	//Ubaci ime slike u niz photos
	      	photos.push(this.responseText);
	      	//Kreira div-wrapper za sliku i ubacuje ga u div slikeeeeeeeeeee :D
	      	var div = document.createElement("div");
	      	div.className = "slika";
	      	div.id = photos.length - 1;
	      	document.getElementById("slikeeeee").appendChild(div);
	      	//Kreira sliku i ubacuje je u kreirani div
	      	var image = document.createElement("img");
	      	image.setAttribute("src", imageName);
	      	div.appendChild(image);
	      	//Kreiraj delete button
	      	var deleteButton = document.createElement("div");
	      	deleteButton.className = "deletebutton";
	      	deleteButton.setAttribute("onclick", 'deleteImage('+(photos.length - 1)+')');
	      	//deleteButton.onclick = function() { deleteImage(); };
	      	deleteButton.innerHTML = "X";
	      	div.appendChild(deleteButton);
	      	writeAll();
	    }
	};
	xml.open('POST', 'includes/allphotos.php');
	//xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.send(data);
}

function writeAll(){
	console.log("Ikona : ");
	console.log(iconName);
	console.log("Photos : ");
	for(var i=0;i<photos.length;i++) console.log(photos[i]);
}

function deleteImage(id){
	console.log(id);
	photos.splice(id, 1);
	document.getElementById(id).remove();
	writeAll();
	console.log("Broj slika = " + photos.length);
}

function savePost(idofpost = null){
	var header = document.getElementById("header").value;
	var x = document.getElementById("mySelect");
    var category = x.options[x.selectedIndex].text;
	var bos = document.getElementById("bos").value;
	var eng = document.getElementById("eng").value;
	var njem = document.getElementById("njem").value;
	var video = document.getElementById("video").value;
	var xhttp = new XMLHttpRequest();
	if(idofpost){
		xhttp.open("POST","includes/update.php",true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("header="+header+"&category="+category+"&bos="+bos+"&eng="+eng+"&njem="+njem+"&photos="+photos+"&iconName="+iconName+"&video="+video+"&idofpost="+idofpost);
	}else{
		xhttp.open("POST","includes/insert.php",true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("header="+header+"&category="+category+"&bos="+bos+"&eng="+eng+"&njem="+njem+"&photos="+photos+"&iconName="+iconName+"&video="+video);
	}	    
    xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	if(category == "DIZAJN"){
	    		window.location = 'design.php';
	    	}else if(category == "ARHITEKTURA"){
	    		window.location = 'arhitecture.php';
	    	}else if(category == "VIZUALIZACIJA"){
	    		window.location = 'visualisation.php';
	    	}

	    }
	};
}

function setElements(){
	writeAll();
}

//document.getElementById("my-element").remove();

//Brisanje slika iz div-a

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

