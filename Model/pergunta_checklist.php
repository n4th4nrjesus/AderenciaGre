<?php
class PerguntaChecklist
{
    public $id;
    public $artefato_id;
    public $descricao;

    public function find(string $where = '', string $joins = '', string $fields = '*')
    {
        return find('pergunta_checklist pc', $where, $joins, $fields);
    }
}
