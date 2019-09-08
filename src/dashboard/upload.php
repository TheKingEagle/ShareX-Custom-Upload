<?php

include 'functions.php';
$config = include 'config.php';

$key = $config['secure_key'];
$uploadhost = $config['output_url'];
$redirect = $config['redirect_url'];

if ('/robot.txt' === $_SERVER['REQUEST_URI']) {
    die("User-agent: *\nDisallow: /");
}

if (isset($_POST['key'])) {
    if ($_POST['key'] === $key) {
        $parts = explode('.', $_FILES['d']['name']);

        $first_run = true;
        $files_exist_counter = 0;

        while($first_run || file_exists($target)){
            $first_run = false;

            if ($config['enable_random_name']) {
                $target = dirname(getcwd()).'/'.generateRandomName(end($parts), $config['random_name_length']);
            } else {
                if($files_exist_counter++ < 1){
                    $target = dirname(getcwd()).'/'.$_POST['name'].'.'.end($parts);
                }else{
                    $target = dirname(getcwd()).'/'.$_POST['name'].'_'.$files_exist_counter.'.'.end($parts);
                }
            }
        }

        if (move_uploaded_file($_FILES['d']['tmp_name'], $target)) {
            $target_parts = explode('/', $target);
            echo $uploadhost.end($target_parts);
        } else {
            echo 'File upload failed, ensure permissions are writeable on the directory (777), see full config: https://github.com/JoeGandy/ShareX-Custom-Upload/blob/master/README.md#automatic-setup';
        }
    } else {
        echo 'The key provided does not match your config.php, see full config: https://github.com/JoeGandy/ShareX-Custom-Upload/blob/master/README.md#automatic-setup';
    }
} else {
    echo 'You may not upload without the key parameter, see full config: https://github.com/JoeGandy/ShareX-Custom-Upload/blob/master/README.md#automatic-setup';
}
