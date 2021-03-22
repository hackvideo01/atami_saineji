function onReady(){
var qrcode1 = document.getElementById("qrcode1");
var qrcode2 = document.getElementById("qrcode2");
var qrcode = new QRCode("qrcode1", {
	text:qrcode1,
	width:200,
	height:200,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}