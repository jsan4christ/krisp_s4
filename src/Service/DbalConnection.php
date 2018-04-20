<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/20
 * Time: 17:16
 */

namespace App\Service;


use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DbalConnection
{
  private function getDbConnection(Configuration $config)
  {
      $connParams = [
          'dbname' => 'demo',
          'host' => 'localhost',
          'user' => 'root',
          'password' => 'theReal@dmin85!',
          'driver' => 'pdo_mysql'

      ];

      $conn =  DriverManager::getConnection($connParams, $config);

      return $conn;
  }
}