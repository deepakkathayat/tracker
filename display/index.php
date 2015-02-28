<!DOCTYPE html>
<html>
<head>
<title>Display</title>
<style>
h2 {
color: #3d3d3d;
       font-variant: small-caps;
}
h5 {
color: #3d3d3d;
       font-variant: small-caps;
}
body {
	font-family: "Helvetica";
}
#img_style {
position: absolute;
top: 0;
left: 70%;
width: 30%;
       text-align: center;
padding: 10px;
}
</style>

<script type="text/javascript">
function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp*1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = month + ' ' + date + ', ' + year + ' at ' + hour + ':' + min + ':' + sec ;
  return time;
}

function myFunction(arr) {
	var out = "";
	var i;
	for(i = 0; i < arr.length; i++) {
		out += '<a href="' + arr[i].site + '">' + 
			arr[i].site + '</a> visited on ' + timeConverter(arr[i].time) + '<br>';
	}
	document.getElementById("myDiv").innerHTML = out;
}
function loadXMLDoc() {
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var myArr = JSON.parse(xmlhttp.responseText);
			myFunction(myArr);
		}
	}
	xmlhttp.open("GET","http://54.148.46.18/display/Output.txt",true);
	xmlhttp.send();
}
</script>
</head>
<body>
<div id='img_style'>
<img src="http://54.148.46.18/tracker-1/picture.jpg" />
<h2>You're on Display website</h2>
</div>
<h2> Here's your history trace:</h2>
<div id="myDiv"><h4></h4></div>
<br>
<button type="button" onclick="loadXMLDoc(); getElementById('hidden-div').style.display = 'block'; this.style.display = 'none';">SHOW ME WHAT YOU'VE GOT</button>
<br>
<h5>Refresh to update the history.</h5>
</body>
</html>
