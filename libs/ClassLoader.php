<?php
function classloader( $className ){
    $file = $className;
    if (is_file($file)) {
        require_once($file);
    }
    spl_autoload_register( 'classloader' );
}