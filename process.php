<?php
if ($_POST['name']) {

    $file_name = "form.txt";
    $open_file = fopen($file_name, "a+");

    $file_contents = $_POST['name'] . "," . $_POST['url'] . "\n";

    fwrite($open_file, $file_contents);

    fclose($open_file);

//    echo "Form data successfully written to file";
    
    $response = array(
        message => 'success'
    );
    
    return json_encode($response);
}
?>