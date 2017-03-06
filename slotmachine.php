<?php

 session_start();

// Check if Score Variable exists, else init session score var with 100

if (!isset($_SESSION['score'])){
  $_SESSION['score'] = 100;
}
// Check if Slot1,Slot2, & Slot3 Variables exists, else inits random slot sessions 
// We are not using $index2,5,8 because we need to access these variables globally
// for checkWinningValues()

if (!isset($_SESSION['slot1'])){
  $_SESSION['slot1'] = mt_rand(0,6);
}

if (!isset($_SESSION['slot2'])){
  $_SESSION['slot2'] = mt_rand(0,6);
}

if (!isset($_SESSION['slot3'])){
  $_SESSION['slot3'] = mt_rand(0,6);
}

 // Randomizes indexes on page reload
 // These variables are used to dynamically select icons for slot wheels

 $index1 = mt_rand(0,6);
 //$index2 = mt_rand(0,6); 
 $index3 = mt_rand(0,6);
 $index4 = mt_rand(0,6);
 //$index5 = mt_rand(0,6); 
 $index6 = mt_rand(0,6);
 $index7 = mt_rand(0,6);
 //$index8 = mt_rand(0,6); 
 $index9 = mt_rand(0,6);

// Array of Image Strings, ordered by increasing points

 $images = array
 (

    "icons/Linux_100.png",
    "icons/Firefox_100.png",
    "icons/Elephant_100.png",
    "icons/Chrome_100.png",
    "icons/Christmas_100.png",
    "icons/Cherry_100.png",
    "icons/Android_100.png",

 );


 // Handles event of the POST METHOD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if ($_SESSION['score'] == 0){
        // Launch Modal window here, saying Game Over and prompt user to restart!
        $_SESSION['score'] = $_SESSION['score'] + 100;
    }else{
    pullLever();
    }
    
}


function pullLever(){
    
//    if ($_SESSION['slot1'] == $_SESSION['slot2'] && $_SESSION['slot2'] == $_SESSION['slot3'] ){
//        checkForWinningValues();
//    }else{
//        $_SESSION['score']--;
//        resetSlots();
//    }
    
    // Decrement Score by 1 for Lever Pull
    // Check combos for winning values
    // Reset Slots
    
    $_SESSION['score']--;
    checkForWinningValues();
    resetSlots();

}

function resetSlots(){
    $_SESSION['slot1'] = mt_rand(0,6);
    $_SESSION['slot2'] = mt_rand(0,6);
    $_SESSION['slot3'] = mt_rand(0,6);
}


function checkForWinningValues(){
    
    // Concatentate all indexes to check against Switch Statement
    
    $result = $_SESSION['slot1']."|".$_SESSION['slot2']."|".$_SESSION['slot3'];
    
    
    // Switch statement for all winning combos    
    // If matching case exists, increment score counter
    switch($result){
        case "0|0|0":
        $_SESSION['score'] = $_SESSION['score'] + 10;
        break;
        case "1|1|1":
        $_SESSION['score'] += 50;
        break;
        case "2|2|2":
        $_SESSION['score'] = $_SESSION['score'] + 100;
        break;
        case "3|3|3":
        $_SESSION['score'] = $_SESSION['score'] + 150;
        break;
        case "4|4|4":
        $_SESSION['score'] = $_SESSION['score'] + 300;
        break;
        case "5|5|5":
        $_SESSION['score'] = $_SESSION['score'] + 500;
        break;
        case "6|6|6":
        $_SESSION['score'] = $_SESSION['score'] + 1000;
        default:
        break;
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
        <img id="icon" src= <?php echo $images[$_SESSION['slot1']]; ?> >
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
        <img id="icon" src=  <?php echo $images[$_SESSION['slot2']]; ?> >
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
        <img id="icon" src=  <?php echo $images[$_SESSION['slot3']]; ?> >
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
    <center> Your Score : <?php echo $_SESSION['score']; ?> </center>
</div>


</div>


</body>


</html>
