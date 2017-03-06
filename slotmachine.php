<?php

 session_start();

 $index1 = mt_rand(0,7);
 $index2 = mt_rand(0,7); 
 $index3 = mt_rand(0,7);
 $index4 = mt_rand(0,7);
 $index5 = mt_rand(0,7); 
 $index6 = mt_rand(0,7);
 $index7 = mt_rand(0,7);
 $index8 = mt_rand(0,7); 
 $index9 = mt_rand(0,7);

 $images = array
 (
    '/Icons/Android OS_100.png',
    '/Icons/Cherry_100.png',
    '/Icons/Christmas Star_100.png',
    '/Icons/Chrome_100.png',
    '/Icons/Firefox_100.png',
    '/Icons/Linux_100.png',
    '/Icons/Safari_100.png',
    '/Icons/Cherry_100.png',
    '/Icons/Elephant_100.png',
 );


// Create Score session variable if doesn't exist

if (isset($_SESSION['score']))
{
    $_SESSION['score'] = 100;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
}


function pullLever(){
 

}

?>