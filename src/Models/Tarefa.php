<?php 
namespace App\Models;

class Tarefa
{
    public ? int $id = null;
    public string $titulo = "";
    public string $descricao = "";
    public bool $status = false;
    public int $user_id = 0;
}


?>