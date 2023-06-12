<?php
/**
 * Permet de récupérer un paramètre du fichier config.php
 * @param string $configIndex
 * @return mixed
 */
function config($configIndex)
{
    $configPath = getcwd() . "/config.php";
    if(file_exists($configPath)){
        $config = include $configPath;
        $indexes = explode(".", $configIndex);

        $tempConf = $config;
        foreach ($indexes as $index){
            if(array_key_exists($index, $tempConf)){
                $tempConf = $tempConf[$index];
            }else{
                return null;
            }
        }
        return $tempConf;
    } else {
        return null;
    }
}