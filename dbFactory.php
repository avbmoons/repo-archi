<?php

class Application
{

    protected $connection;
    protected $recorder;
    protected $queryBuilder;

    public function __construct(ServiceFactoryInterface $serviceFactory)
    {
        $this->connection = $serviceFactory->createConnection();
        $this->recorder = $serviceFactory->createRecorder();
        $this->queryBuilder = $serviceFactory->createQueryBuilder();
    }

    public function run()
    {
    }
}

interface ConnectionInterface
{
};
interface RecorderInterface
{
};
interface QueryBuilderInterface
{
};

//  определяем классы для MySql
class MysqlDBConnection implements ConnectionInterface
{
}

class MysqlDBRecord implements RecorderInterface
{
}

class MysqlDBQueryBuilder implements QueryBuilderInterface
{
}

//  определяем классы для PostgreSql
class PostgreSqlConnection implements ConnectionInterface
{
}

class PostgreSqlRecorder implements RecorderInterface
{
}

class PostgreSqlQueryBuilder implements QueryBuilderInterface
{
}

//  определяем классы для Oracle
class OracleConnection implements ConnectionInterface
{
}

class OracleRecorder implements RecorderInterface
{
}

class OracleQueryBuilder implements QueryBuilderInterface
{
}


interface ServiceFactoryInterface
{

    public function createConnection(): ConnectionInterface;
    public function createRecorder(): RecorderInterface;
    public function createQueryBuilder(): QueryBuilderInterface;
}

//  формируем объекты для MySql
class MysqlServiceFactory implements ServiceFactoryInterface
{

    public function createConnection(): ConnectionInterface
    {
        return new MysqlDBConnection();
    }

    public function createRecorder(): RecorderInterface
    {
        return new MysqlDBRecord();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new MysqlDBQueryBuilder();
    }
}

//  формируем объекты для PostgreSql
class PostgreSqlServiceFactory implements ServiceFactoryInterface
{

    public function createConnection(): ConnectionInterface
    {
        return new PostgreSqlConnection();
    }

    public function createRecorder(): RecorderInterface
    {
        return new PostgreSqlRecorder();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new PostgreSqlQueryBuilder();
    }
}

//  формируем объекты для Oracle
class OracleServiceFactory implements ServiceFactoryInterface
{

    public function createConnection(): ConnectionInterface
    {
        return new OracleConnection();
    }

    public function createRecorder(): RecorderInterface
    {
        return new OracleRecorder();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new OracleQueryBuilder();
    }
}

$applicationMysql = new Application(
    new MysqlServiceFactory()
);

$applicationPostgreSql = new Application(
    new PostgreSqlServiceFactory()
);

$applicationOracle = new Application(
    new OracleServiceFactory()
);
