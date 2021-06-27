<?php
    header('Content-type: image/png');
    session_start();
  /*  $myImage = imagecreate(200, 100);
    $myGray = imagecolorallocate($myImage, 204, 204, 204);
    $myBlack = imagecolorallocate($myImage, 0, 0, 0);
    imageline($myImage, 15, 35, 120, 60, $myBlack);

    imagepng($myImage);
    imagedestroy($myImage);
*/


$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
function generate_string($input, $strength = 5) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);


    $image = imagecreatetruecolor(200, 50); 
    imageantialias($image, true);
    $colors = [];
    $red = rand(125, 175);
    $green = rand(125, 175);
    $blue = rand(125, 175);

    for($i = 0; $i < 5; $i++) {
        $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
    }

    imagefill($image, 0, 0, $colors[0]);

    for($i = 0; $i < 10; $i++) {
        imagesetthickness($image, rand(2, 10));
        $rect_color = $colors[rand(1, 4)];
    imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
    }





$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
 
$fonts = [dirname(__FILE__).'\fonts\Acme.ttf', dirname(__FILE__).'\fonts\Ubuntu.ttf', dirname(__FILE__).'\fonts\excocet.ttf', dirname(__FILE__).'\fonts\13ghosts.ttf'];
 
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);
$_SESSION['captcha_text'] = $captcha_string;
 
for($i = 0; $i < $string_length; $i++) {
  $letter_space = 170/$string_length;
  $initial = 15;
   
  imagettftext($image, 20, rand(-15, 15), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
}






    //echo $captcha_string;

    imagepng($image);
    imagedestroy($image);

    
?>