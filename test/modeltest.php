<?php   
require_once ('../model.php');

class TestModel
{
    static function test_getMySQLConnection()
    {
        echo "\n" . ( (Model::getMySQLConnection() instanceOf mysqli) ? "Success " : "Failed " ) . "test_getMySQLConnection()";
    }

    static function test_getMySQLData()
    {
        echo "\n" . ( ( 4 == count(Model::getMySQLData()) ) ? "Success " : "Failed " ) . "test_getMySQLData()";
    }

    static function test_getMongoData()
    {
        echo "\n" . ( ( 4 == count(Model::getMongoData()) ) ? "Success " : "Failed " ) . "test_getMongoData()";   
    }
}

TestModel::test_getMySQLConnection();
TestModel::test_getMySQLData();
TestModel::test_getMongoData();