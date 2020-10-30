<?php
class UsuarioPergunta
{
    public $usuario_id;
    public $pergunta_checklist_id;
    public $urgencia_id;
    public $complexidade_id;
    public $responsavel_id;
    public $atendida;
    public $plano_acao;
    public $prazo;
    public $escalonada;

    public function find(string $where = '', string $joins = '', string $fields = '*')
    {
        return find('usuario_pergunta up', $where, $joins, $fields);
    }
}
