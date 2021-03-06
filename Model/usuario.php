<?php
class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function find($where = null, string $joins = '', $fields = null)
    {
        return find('usuario u', $where, $joins, $fields);
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
