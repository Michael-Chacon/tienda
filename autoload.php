<?php

function controllers_autoload($class)
{
    include 'controllers/' . $class . '.php';
}
spl_autoload_register('controllers_autoload');
