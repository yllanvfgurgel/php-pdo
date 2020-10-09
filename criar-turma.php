<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Student;

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction(); // Utilizando transações eu garanto que meus dados só serão enviados se todos os comandos do bando derem certo

try {

    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeImmutable('1985-05-01')
    );
    
    $studentRepository->save($aStudent);
    
    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeImmutable('1985-02-10')
    );
    
    $studentRepository->save($anotherStudent);
    
    $connection->commit(); // Finaliza a transação se as instruções ao banco forem corretas

} catch (PDOException $e) {

    echo $e->getMessage();
    $connection->rollBack();
    
}

