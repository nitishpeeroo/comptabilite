<?php

require '../vendor/autoload.php';

/**
 * 
 * @param type $vars
 */
function dd(...$vars) {
    foreach ($vars as $var) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}

/**
 * 
 * @return \PDO
 */
function get_pdo() {
    return new PDO("mysql:dbname=comptabilite;host=localhost", "root", "GrandTheftAuto93@", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
}

/**
 * Alias de la fonction htmlentities
 * @param string $value
 * @return type
 */
function h(string $value) {
    if ($value === null) {
        return '';
    }
    return htmlentities($value);
}

/**
 * Page 404
 */
function e404() {
    require '../public/404.php';
    exit();
}

/**
 * 
 * @param string $view
 * @param type $parameters
 */
function render(string $view, $parameters = []) {
    extract($parameters);
    include "../views/{$view}.php";
}
