<?php 
namespace App\Models;

class Usuario
{
    private \PDO $connection;

    public ?int $id = null;
    public string $nome = '';
    public string $login = '';
    public string $senha = '';
    public string $email = '';
    public string $foto_path = '';


    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }



     public function createUser(): bool
    {
        $sql = "INSERT INTO usuario (nome, login, senha, email, foto_path)
                VALUES (:nome, :login, :senha, :email, :foto_path)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            ':nome' => $this->nome,
            ':login' => $this->login,
            ':senha' => $this->senha,
            ':email' => $this->email,
            ':foto_path' => $this->foto_path
        ]);
    }

    

    

     public function getAlluser() : ?array 
    {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->connection->prepare($sql);
        return $stmt->fetch();    
    }


    public function getByuserID(int $id): ?array 
    {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }




}


?>