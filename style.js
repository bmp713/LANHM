
// Open new expense tab, hide expenses list
function tab_1(){
    console.log("document.querySelector('#tab_1')");
    document.querySelector('#box_2').style.display = "none";
    document.querySelector('#box_1').style.display = "block";
}
// Open expenses list, hide new expense
function tab_2(){
    console.log("document.querySelector('#tab_2')");
    document.querySelector('#box_2').style.display = "block";
	document.querySelector('#box_1').style.display = "none";
}
function logOut(){
	console.log("LOGOUT");
}
// Zoom in and out of background
window.onload = function (){
	var zoom = true;
	var backgroundSize = 100;
	if ( window.matchMedia("(min-width: 768px)" ).matches ){

		var timer = setInterval( function(){
			if( backgroundSize < 150 && zoom ){
				document.querySelector("#wrapper").setAttribute("style","background-size:"+ (backgroundSize+=0.1) +"%;");
			}
			else{
				zoom = false;
				if( backgroundSize < 101 ){
					zoom = true;
				}
				document.querySelector("#wrapper").setAttribute("style","background-size:"+ (backgroundSize-=0.1) +"%;");
			}
		}, 50);
	}
}



