<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();


$sqlDelete = 'delete from students where id = ?;';
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 2, PDO::PARAM_INT); // O terceiro parâmetro deixa explícito que o número que estamos passando será tratado como inteiro e não como uma string
$preparedStatement->execute();

//OBS: Posso utilizar um preparedStatement mais de uma vez!