<?php
namespace app\library;

$dell = new Brand('Dell', '5*');
$acer = new Brand('Acer', '5*');
$lenovo = new Brand('Lenovo', '4*');
$samsung = new Brand('Samsung', '4*');
$fujitsu = new Brand('Fujitsu', '3*');
$hp = new Brand('HP', '2*');

$storageList = new StorageList();
$storageList->addStorage('Budapest', 'Budapest, Bécsi út', 10);
$storageList->addStorage('Békéscsaba', 'Békéscsaba, Tavasz utca', 5);

$storageList->addProduct(1, 'Laptop', '80000', $acer, 5);
$storageList->addProduct(2, 'Monitor', '25000', $samsung, 10);
// $storageList->addProduct(2, 'Monitor', '25000', $samsung, 5);
$storageList->remProductById(1, 5);
$storageList->remProductById(2, 10);

$fakeData = [];
$fakeData['brands'] = [
    'dell' => $dell,
    'acer' => $acer,
    'lenovo' => $lenovo,
    'samsung' => $samsung,
    'fujitsu' => $fujitsu,
    'hp' => $hp
];
$fakeData['storageList'] = $storageList;
$_SESSION['fakeData'] = $fakeData;
