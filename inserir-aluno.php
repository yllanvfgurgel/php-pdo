<?php

use Alura\Pdo\Domain\Model\Student;


require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();


$student = new Student(null, 'Yllan Gurgel', new DateTimeImmutable('1991-07-30'));


$sqlInsert = "insert into students (name, birth_date) values (?, ?);";
$statement = $pdo->prepare($sqlInsert); // Esse comando me devolve um statement para que eu possa definir os parâmetros da minha instrução
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo 'Aluno incluído';
};
