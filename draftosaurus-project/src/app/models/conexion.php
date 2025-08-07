<?php
class DatabaseConnection 
{
    private $pdo;

    public function __construct() 
    {

        $host = 'localhost';
        $port = '4306';
        $db = 'draftosaurusDB';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";

        try
        {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        catch (PDOException $e)
        {
            die("Error de conexión: " . $e->getMessage());
        }

    }

    public function prepare($sql) 
    {
        return $this->pdo->prepare($sql);
    }

    // Devuelve el objeto PDO para transacciones y acceso directo
    public function getPdo() {
        return $this->pdo;
    }

    // Método de prueba para verificar la conectividad
    public function testConnection() 
    {
        try 
        {
            $stmt = $this->pdo->query('SELECT 1');
            return $stmt !== false;
        } 
        
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }
    }
}
?>