<?php
namespace app\library;

//brands
$brands = [];
$brands[] = [
    'name' => 'Dell',
    'category' => '5*'
];
$brands[] = [
    'name' => 'Acer',
    'category' => '5*'
];
$brands[] = [
    'name' => 'Lenovo',
    'category' => '4*'
];
$brands[] = [
    'name' => 'Samsung',
    'category' => '4*'
];
$brands[] = [
    'name' => 'Fujitsu',
    'category' => '3*'
];
$brands[] = [
    'name' => 'HP',
    'category' => '2*'
];

//storages
$storages = [];
$storages[] = [
    'name' => 'Pesti Raktár',
    'addr' => 'Budapest, Bécsi út',
    'capacity' => 10
];
$storages[] = [
    'name' => 'Békéscsabai Raktár',
    'addr' => 'Békéscsaba, Tavasz utca',
    'capacity' => 5
];

//products
$products = [];
$products[] = [
    'id' => 1,
    'name' => 'Personal Computer',
    'price' => 120000,
    'brand' => 'Acer',
    'amount' => 3,
    'type' => 'Pc',
    'p' => 'KDE Neon'
];
$products[] = [
    'id' => 2,
    'name' => 'Monitor',
    'price' => 80000,
    'brand' => 'Samsung',
    'amount' => 8,
    'type' => 'Display',
    'p' => 'AMOLED'
];

$fakeData = [];
$fakeData['brands'] = $brands;
$fakeData['storages'] = $storages;
$fakeData['products'] = $products;
$_SESSION['fakeData'] = $fakeData;
