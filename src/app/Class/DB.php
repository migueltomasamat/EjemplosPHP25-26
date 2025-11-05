<?php

namespace App\Class;

use App\Exceptions\BaseDatosException;
use PDO;

class DB
{
    private string $host;
    private string $dbname;
    private string $port;
    private string $username;
    private string $password;

    public function __construct(string $host=DB_SERVER,string $dbname=DB_NAME, string $username=DB_USERNAME, string $password=DB_PASSWORD,int $port=DB_PORT)
    {
        $this->host=$host;
        $this->dbname=$dbname;
        $this->username=$username;
        $this->password=$password;
        $this->port=$port;
    }

    public function crearConexion():?PDO{

        try{
            $dns="mysql:host=".$this->host.";dbname=".$this->dbname.";port=".$this->port;
            return new PDO($dns,$this->username,$this->password);
        }catch(\PDOException $error){
            throw new BaseDatosException('Error de conexión a la base de datos');
        }

    }

    public function cerrarConexion():bool{

        $conexion=null;
        return true;

    }



}