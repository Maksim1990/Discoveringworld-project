<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
    body{background-color:#c3defe ;}
  #leftSide  {background-color:#D4FC65;
 border:1px solid #080808;
  margin-left: 40px;}
  #rightSide {background-color:#080 ;
  border:1px solid #080808;
  margin-left: 40px;}
</style>
<script>
function  generateFaces(){
	var counter=0;
	var numberOfFaces=0;
	var theLeftSide =document.getElementById("leftSide");
	var theRightSide =document.getElementById("rightSide");
	while(numberOfFaces<5){
	
	var pict=document.createElement("img");
	pict.src="http://home.cse.ust.hk/~rossiter/mooc/matching_game/smile.png";

	var x_position=Math.random()*400;
	x_position=Math.floor(x_position);
	var y_position=Math.random()*400;
	y_position=Math.floor(y_position);
    pict.style.left=x_position+"px";
	pict.style.top=y_position+"px";
	theLeftSide.appendChild(pict);

	numberOfFaces+=1;
	counter+=1;
	}

		
	var leftSideImages = theLeftSide.cloneNode(true);
	leftSideImages.removeChild(leftSideImages.lastChild);
		theRightSide.appendChild(leftSideImages);
		
	var theBody = document.getElementsByTagName("body")[0];
	theLeftSide.lastChild.onclick= function nextLevel(event){

        event.stopPropagation();
        numberOfFaces += 5;
        generateFaces();
}
theBody.onclick = function gameOver() {
    alert("Game Over!");
    alert("Your Score is  "+counter);
    theBody.onclick = null;
    theLeftSide.lastChild.onclick = null;
   
} 

}
</script>
<style>
div {position:absolute;
		width:500px;
		height:500px;}
img {position:absolute;}
#rightSide { left: 500px; 
            border-left: 1px solid black }
</style>
</head>

<body id="theBody" onLoad="generateFaces()">
<h2>Matching Game</h2>
<p>Click on the extra smiling face on the left.</p>
  <div id="leftSide"></div>

    <div id="rightSide"></div>
</body>
</html>
