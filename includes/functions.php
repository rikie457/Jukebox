<?php
function autoloadClasses($classname)
{
        $directories = array();
        $directories[] = 'classes';
        $directories = array_merge($directories, explode('\\', $classname));
        $filepath = join('/', $directories) . '.php';
        require("../" . $filepath);

}

spl_autoload_register('autoloadClasses');

function messages(){
    if (isset($_SESSION['warning']) && $_SESSION['warning'] != ''){
        foreach ($_SESSION['warning'] as $warning){
            echo $warning;
        }
        $_SESSION['warning'] = "";
    }
if (isset($_SESSION['message']) && $_SESSION['message'] != ''){
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
}
}
/* made by Menno & Tycho */