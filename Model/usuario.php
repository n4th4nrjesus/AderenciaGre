<?php
class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function find(string $where = '', string $joins = '', $fields = '*')
    {
        return find('usuario', $where, $joins, $fields);
    }

    public function create()
    {
        return create(
            'usuario',
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha
            ]
        );
    }
}
