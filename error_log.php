<?php

    if(isset($_POST['reset'])){
        $blank_text = "";

        $file = '/var/www/error_log';

        file_put_contents($file, $blank_text);
    }        

    // http://stackoverflow.com/questions/3173201/sudo-in-php-exec
?>
<form method="post"><input type="button" name="reset" value="Reset"/></form>
<br/>
<?php
    include_once("../error_log");
?>