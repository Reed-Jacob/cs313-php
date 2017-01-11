function clickMe() {
	alert("Clicked!");
}

function changeColor() {
	// Retrive data from input
	var textbox_id = "textColor";
	var textbox = document.getElementById(textbox_id);

	// Set which div will recieve changes
	var div_id = "div1";
	var div = document.getElementById(div_id);

	// Verify and set new value
	var color = textbox.value;
	div.style.backgroundColor = color;

}

// Change Visiblity jQuery //
$(document).ready(function(){
    $("#fade").click(function(){
		$("#div3").fadeToggle("slow");
	});
});