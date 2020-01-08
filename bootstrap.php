<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class DoctrineBootstrap
{
    private $entityManager;

    public function __construct()
    {

        $config = Setup::createAnnotationMetadataConfiguration([],true);
        $conn=[
            'dbname'=> 'kdurdevic_19',
            'user'=> 'kdurdevic_19',
            'password'=> 'fh8N2X47',
            'host'=> '127.0.0.1',
            'driver'=> 'pdo_mysql',
            'charset'=> 'utf8',
            'driverOptions'=>[1002 => 'set names utf8']
        ];

        
            $this->entityManager = EntityManager::create($conn, $config);
        

    }

public function getEntityManager()
{
    return $this->entityManager;
}

public function getJson($podaci)
{
    $encoders = [new XmlEncoder(), new JsonEncoder()];
    $normalizers = [new DateTimeNormalizer(), new ObjectNormalizer()];
    $serializer = new Serializer($normalizers, $encoders);
    return $serializer->serialize($podaci, 'json');
}
}