<?php

 session_start();

 // Randomizes indexes on start

 $index1 = mt_rand(0,6);
 $index2 = mt_rand(0,6); 
 $index3 = mt_rand(0,6);
 $index4 = mt_rand(0,6);
 $index5 = mt_rand(0,6); 
 $index6 = mt_rand(0,6);
 $index7 = mt_rand(0,6);
 $index8 = mt_rand(0,6); 
 $index9 = mt_rand(0,6);

// Image Array

 $images = array
 (

    "icons/Linux_100.png",
    "icons/Android_100.png",
    "icons/Christmas_100.png",
    "icons/Cherry_100.png",
    "icons/Firefox_100.png",
    "icons/Chrome_100.png",
    "icons/Elephant_100.png"

 );

 // Initial Score Value

    $_SESSION['score'] = 100;

 // Response to POST METHOD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    checkForWinningValues();
}


// BROKEN

function checkForWinningValues(){
        
    if ($index2 = $index5 && $index5 = $index8){
        $_SESSION['score'] = 99;
    }else{
        $_SESSION['score']--;
    }
    
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="style.css">


<!Creating Title>

<title> Main Page </title>

<h1 id="heading">Welcome to CSC 4370 Project 2</h1>
<style>
iframe {
    display: none;
}
</style>

</head>


<body>

<div id="slotContainer">    
    <p id="description">
        This game gives you the chance to win the big coins! Please test your luck with our Slot Machine, Good Luck!
    </p>    
    <p>
        Please Pull the Lever:
    </p>

    <img id="table" src="Icons/SlotMachineTable.png">

<div id="wheelbox">
        
    <div id="wheel" class="clickable">
        <br>
        <img id="icon" src= <?php echo $images[$index1]; ?> >
        <br><br>
        <img id="icon" src= <?php echo $images[$index2]; ?> >
        </img>
        <br><br>
        <img id="icon" src= <?php echo $images[$index3]; ?>>
        </img>
    </div>
    
    <div id="wheel" class="clickable">
        <br>
        <img id="icon" src= <?php echo $images[$index4]; ?> >
        </img>
        <br><br>
        <img id="icon" src=  <?php echo $images[$index5]; ?> >
        </img>
        <br><br>
        <img id="icon" src= <?php echo $images[$index6]; ?> >
        </img>
    </div>

    <div id="wheel" class="clickable">
        <br>
        <img id="icon" src= <?php echo $images[$index7]; ?> >
        </img>
        <br><br>
        <img id="icon" src=  <?php echo $images[$index8]; ?> >
        </img>
        <br><br>
        <img id="icon" src= <?php echo $images[$index9]; ?> >
        </img>
    </div>


    <div class="clickable">
        
      <iframe  name="imgbox" id="imgbox" > </iframe>        
        <a href="sound.mp3" target="imgbox"> 
            <img id="lever" src="icons/Lever Up.png"></img>
            <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
                <input type="submit" >
            </form>
        </a>
    </div>

    <img id="cartoon" src="icons/slotImage.jpg">
    <center> Your Score : <?php echo $_SESSION['score'] ; ?> </center>
</div>


</div>


</body>


</html>
