<?php
class UsuarioPergunta
{
    public $usuario_id;
    public $pergunta_checklist_id;
    public $urgencia_id;
    public $complexidade_id;
    public $cargo_responsavel_id;
    public $atendida;
    public $plano_acao;
    public $prazo;
    public $escalonada;

    public function find(string $where = '', string $joins = '', string $fields = '*')
    {
        return find('usuario_pergunta up', $where, $joins, $fields);
    }

    public function create()
    {
        return create(
            'usuario_pergunta',
            [
                'usuario_id' => $this->usuario_id,
                'pergunta_checklist_id' => $this->pergunta_checklist_id,
                'urgencia_id' => $this->urgencia_id,
                'complexidade_id' => $this->complexidade_id,
                'cargo_responsavel_id' => $this->cargo_responsavel_id,
                'atendida' => $this->atendida,
                'plano_acao' => $this->plano_acao,
                'prazo' => $this->prazo,
                'escalonada' => $this->escalonada
            ]
        );
    }
}
