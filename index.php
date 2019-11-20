<?php

$pathFiles = 'hotel-files';

//Templates
$agenciesTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "agencies_template.txt");
$citiesTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "cities_template.txt");
$countriesTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "countries_template.txt");
$hotelsTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "hotels_template.txt");
$passengersTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "passengers_template.txt");
$detailsTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "details_template.txt");
$reservationsTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "reservations_template.txt");
$ttlTemplate = file_get_contents($pathFiles . DIRECTORY_SEPARATOR . "ttl_template.txt");

//DbConnection
$params = parse_ini_file('config/database.ini');
$conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s", 
    $params['host'], 
    $params['port'], 
    $params['database'], 
    $params['user'], 
    $params['password']);

try{
    $pdo = new PDO($conStr);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log("Conexion exitosa");
} catch (PDOException $e) {
    die("Error conectando con base de datos");
}

$individuals = include('agencies.php');
$individuals .= include('cities.php');
$individuals .= include('countries.php');
$individuals .= include('hotels.php');
$individuals .= include('passengers.php');
$individuals .= include('details.php');
$individuals .= include('reservations.php');
header("content-type: text/turtle");
echo sprintf($ttlTemplate, $individuals);