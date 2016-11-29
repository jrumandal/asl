<?php
    $local_dir = __DIR__;
    $files= array(
                "db_connection.php"
            );
    foreach($files as $file)
        include_once($local_dir.'/'.$file);

    // GLOBAL VARIABLES

    $base_url = "https://ralphumandal.ddns.net/autoval/";
?>