<?php

$filename = "form.txt"; #CHMOD to 666
$forward = 0; # redirect? 1 : yes || 0 : no
## set time up ##

$date = date("l, F jS, Y");
$time = date("h:i A");

## mail message ##

$msg = "Below is the result of your feedback form. It was submitted on $date at $time.\n\n";

foreach ($_POST as $key => $value) {
    $msg .= ucfirst($key) . " : " . $value . "\n";
}

$msg .= "-----------\n\n";

$fp = fopen($filename, "a"); # w = write to the file only, create file if it does not exist, discard existing contents
if ($fp) {
    fwrite($fp, $msg);
    fclose($fp);
} else {
    $forward = 2;
}

if ($forward == 1) {
    header("Location:$location");
} else if ($forward == 0) {
    echo ("Thank you for submitting our form. We will get back to you as soon as possible.");
} else {
    "Error processing form. Please contact the webmaster";
}
?>
