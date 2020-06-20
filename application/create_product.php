<?php
require_once "bootstrap.php";
require_once "src/ds/Product.php";
//include '/var/www/test2/src/ds/Product.php';
$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";

