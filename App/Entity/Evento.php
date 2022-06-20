<?php

namespace App\Entity;
use App\DB\Database;
use PDO;

class Evento {
    public $id;
    public $titulo;
    public $descricao;
    public $comecaEm;
    public $terminaEm;

    public function cadastrarEvento(): bool
    {
        $stmt = new Database('events');
        //Se o insert for realizado com sucesso, ira preencher o id
        $this->id = $stmt->insert([
            'title' => $this->titulo,
            'description' => $this->descricao,
            'startsAt' => $this->comecaEm,
            'endsAt' => $this->terminaEm
        ]);

        return true;
    }

    public function atualizarEvento(): bool
    {
        return (new Database('events'))->update('id = ' . $this->id, [
            'title' => $this->titulo,
            'description' => $this->descricao,
            'startsAt' => $this->comecaEm,
            'endsAt' => $this->terminaEm
        ]);
    }

    public function deletarEvento(): bool
    {
        return (new Database('events'))->delete('id = ' . $this->id);
    }

    public static function listarEventos($where = null, $order = null): array
    {
        return (new Database('events'))->select($where,$order)
                                            ->fetchAll(PDO::FETCH_CLASS, Evento::class); //transformar em array

    }

    public static function getEvento($id): Evento
    {
        return (new Database('events'))->select('id = ' . $id)
                                            ->fetchObject(Evento::class); //transformar em objeto
    }
}