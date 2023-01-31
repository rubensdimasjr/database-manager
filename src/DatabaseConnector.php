<?php

namespace Rubensdimas\DatabaseManager;

use \PDO;
use \PDOException;

class DatabaseConnector
{

  /**
   * Host de conexão com o banco de dados
   * @var string
   */
  private static $host;

  /**
   * Nome do banco de dados
   * @var string
   */
  private static $name;

  /**
   * Usuário do banco
   * @var string
   */
  private static $user;

  /**
   * Senha de acesso ao banco de dados
   * @var string
   */
  private static $pass;

  /**
   * Porta de acesso ao banco
   * @var integer
   */
  private static $port;

  /**
   * Instancia de conexão com o banco de dados
   * @var PDO
   */
  private static $connection;

  /**
   * Instancia da própria classe
   */
  private static $instance;

  /**
   * Método responsável por configurar a classe
   * @param  string  $host
   * @param  string  $name
   * @param  string  $user
   * @param  string  $pass
   * @param  integer $port
   */
  public static function config($host, $name, $user, $pass, $port = 3306)
  {
    self::$host = $host;
    self::$name = $name;
    self::$user = $user;
    self::$pass = $pass;
    self::$port = $port;
  }

  /**
   * Define a tabela e instancia e conexão
   * @param string $table
   */
  private final function __construct()
  {
    self::$connection = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$name . ';port=' . self::$port, 'root', '') or die('Banco de Dados não conectado');
  }

  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  public static function getDBConnection()
  {
    if (!isset(self::$instance)) {
      self::$instance = new DatabaseConnector;
    }/*  else {
      echo "Banco de dados já está conectado";
    } */

    return self::$connection;
  }
}

// Primeira conexão

/* $conn = DatabaseConnector::getDBConnection();

// Segunda conexão
$conn = DatabaseConnector::getDBConnection();

exit;   */



