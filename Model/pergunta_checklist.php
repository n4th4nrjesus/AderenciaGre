<?php
class PerguntaChecklist
{
    public $id;
    public $artefato_id;
    public $descricao;

    public function find($where = null, string $joins = '', $fields = null)
    {
        return find('pergunta_checklist pc', $where, $joins, $fields);
    }
}
