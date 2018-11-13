$(document).ready(function(){ 
    polaroids = document.getElementsByClassName("polaroid");
    for(var i=0; i<polaroids.length; i++){
	let degree = 5 - Math.floor(Math.random() * 11);
	let rotation = "transform:rotate(" + degree  + "deg);";
	polaroids[i].setAttribute("style", rotation);
    };
});
