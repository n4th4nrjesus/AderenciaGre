<?php
class CargoResponsavel
{
    public $id;
    public $nome;
    public $usuario_id;

    public function find($where = null, string $joins = '', $fields = null)
    {
        return find('cargo_responsavel cr', $where, $joins, $fields);
    }

    public function create()
    {
        return create(
            'cargo_responsavel',
            [
                'nome' => $this->nome,
                'usuario_id' => $this->usuario_id,
            ]
        );
    }
}
