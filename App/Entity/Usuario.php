<?php

namespace App\Entity;
use App\DB\Database;

class Usuario {
    public $id;
    public $usuario;
    public $senha;

    public function cadastrarUsuario(): bool
    {
        $stmt = new Database('users');
        $table = 'users';
        $this->id = $stmt->insertUser([
                'user' => $this->usuario,
                'password' => $this->senha],
                $table);

        return true;
    }
}