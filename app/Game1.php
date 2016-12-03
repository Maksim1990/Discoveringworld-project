<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
    <script>
	var target;
	var guess_color;
	var finished=false;
	var guesses=0;
	var colorr=["red","green","black","yellow","orange","gray","purple","white"];
    var color=colorr.sort();

	function do_game(){
		var random_number=Math.random()*color.length-1;
		var random_number_integer=Math.floor(random_number);
		target=color[random_number_integer+1];
		alert(target);
        
	while(!finished){
		var fin=false;
		while(!fin){
		guess_color=prompt("I am thinking of one of these colors:\n\n"+color.join()+"\n\n"+"What color am I thinking of?");
		guesses+=1;
		if (guess_color.indexOf("b")==0)
		fin=true;
		else if (guess_color.indexOf("r")==0)
		fin=true;
		else if (guess_color.indexOf("n")==4)
		fin=true;
		else if (guess_color.indexOf("y")==0)
		fin=true;
		else if (guess_color.indexOf("o")==0)
		fin=true;
		else if (guess_color.indexOf("y")==3)
		fin=true;
		else if (guess_color.indexOf("p")==0)
		fin=true;
		else if (guess_color.indexOf("w")==0)
		fin=true;
		else fin=false;
		}
		finished=check_color();
		}
	}
	function check_color(){
		if(!isNaN(guess_color)){
		alert("I can't recognize your color!!!!")
		return false;}

		if(guess_color>target){
		alert("Your color is alphabeticaly higher!!!")
		return false;}	
		if(guess_color<target){
		alert("Your color is alphabeticaly lawer!!!")
		return false;}
         myBody=document.getElementsByTagName("body")[0];
         myBody.style.backgroundColor=guess_color;
		 alert ("You are right!!!The color was!  "+target+"\n\nIt took you  "+guesses+"  attempts!!!");
		 return true;
		 
		}	
 	
	</script>
</head>

<body  onLoad="do_game()">
   <div clas="bbb"><script>
   	document.getElementById("bbb").style.backgroundColor = "lightblue";
</script>
</div>
</body>
</html>
