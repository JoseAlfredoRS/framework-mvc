<?php
class Base
{
    private $host = DB_HOST;
    private $usuario = DB_USER;
    private $password = DB_PASSWORD;
    private $name_bd = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //Confiurar Conexion
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name_bd;
        // $dsn = 'pgsql:host=' . $this->host . ';port=5432' . ';dbname=' . $this->name_bd;
        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );
        //Crear una instancia de PDO
        try {
            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Preparamos la consulta
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Vinculamos la consulta con bind
    public function bind($parametro, $valor, $tipo = null)
    {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    //Ejecuta la consulta
    public function execute()
    {
        return $this->stmt->execute();
    }

    //Obtener registros
    public function getAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Obtener un solo registro
    public function get()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Obtener la cantidad de filas
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function __destruct()
    {
        $this->stmt = null;
        $this->pdo = null;
    }
}
