<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$statement = $pdo->query('select * from students');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC); // Devolve um array associativo
$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student($studentData['id'], 
        $studentData['name'], 
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);

