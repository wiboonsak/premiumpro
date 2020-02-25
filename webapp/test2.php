<html>

<head>
<script>
function menu (whichMenu,whatState){
if (document.getElementById)
{document.getElementById(whichMenu).style.visibility = whatState;}

else {document[whichMenu].visibility = whatState;}

}
function details(what){
myInfo={"google":"the best search engin on the web","yahoo":"this is too","about":"good place to visit"}
detailsBox.innerHTML=myInfo[what]
}
</script>
</head>
<body>
<div id="search">
<a onmouseover="details('google')" href="http://www.google.com/" target="_blank" class="menulink">Google</a>
<a onmouseover="details('yahoo')" href="http://www.yahoo.com/" target="_blank" class="menulink">Yahoo!</a>
<a onmouseover="details('about')" href="http://www.about.com/" target="_blank" class="menulink">About.com</a>
<a href="java script://" onmouseover="menu('search','hidden')" class="menulink">CLOSE</a>
</div>

<div id="detailsBox"></div>
</body>
</html>
