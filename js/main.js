$(document).ready(function() {

$("#login_btn").on( "click", function() {
		$("#register_div").hide();
		$("#login_div").show();
		console.log('login btn was pressed');
});

$("#register_btn").on( "click", function() {
	$("#login_div").hide();
	$("#register_div").show();
});


let modal = document.getElementById("modal");
let img =  document.getElementsByClassName("myImage");
let imgModal =  document.getElementById("modal_img");
let close =  document.getElementById("close");
let closingNav = document.getElementById("closingNav");

img.onclick = function(){
	modal.style.display ="flex";
	closingNav.style.display ="none";
	imgModal.src = this.src;
}

close.onclick = function(){
	modal.style.display='none';
	closingNav.style.display ="block";
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

});