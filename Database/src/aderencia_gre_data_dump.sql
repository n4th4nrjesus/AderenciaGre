/* Instancias iniciais do banco de dados aderencia_gre */
ALTER TABLE aderencia_gre.artefato AUTO_INCREMENT = 1;

INSERT INTO aderencia_gre.artefato (nome, tipo)
VALUES 
    ("Diagrama de Caso de Uso", "Diagrama")
    , ("Especificação de Resquisitos", "Arquivo em Texto");


INSERT INTO aderencia_gre.complexidade (nome, dias_prazo)
VALUES
    ("Baixa", 1)
    , ("Média", 2)
    , ("Alta", 3)


INSERT INTO aderencia_gre.urgencia (nome, dias_prazo)
VALUES
    ("Baixa", 3)
    , ("Média", 2)
    , ("Alta", 1)
    , ("Urgente", 0)

INSERT INTO aderencia_gre.pergunta_checklist (artefato_id, descricao)
VALUES
    (1, "As funcionalidades estão coerentes com o que foi obtido com os fornecedores")
    , (1, "O Diagrama possui atores")
    , (1, "Os atores estão de acordo com o contexto do sistema")
    , (1, "O Diagrama possui casos de uso")
    , (1, "Os casos de uso estão descritos corretamentamente de acordo com o sistema")
    , (1, "A descrição dos casos de uso não possuem erros de semântica")
    , (1, "A descrição dos casos de uso não possuem erros de gramática")
    , (1, "Os casos de uso possuem identificadores únicos")
    , (1. "Os identificadores estão descritos corretamente (curtos, sem espaçamento, numerados)")
    , (1, "O Diagrama possui associações entre atores/casos de uso")
    , (1, "O Diagrama possui relacionamento include")
    , (1, "O relacionamento include está ligado corretamente entre os casos de uso")
    , (1, "O Diagrama possui relacionamento extend")
    , (1, "O relacionamento extend está ligado corretamente entre os casos de uso")
    , (1, "O Diagrama possui relacionamentos de herança")
    , (1, "O relacionamento de herança foi aplicado corretamente entre os atores")
    , (1, "O Diagrama possui comentários para casos de uso")
    , (1, "O Diagrama está localizado em algum pacote")
    , (1, "Os pacotes estão nomeados")
    , (1, "Os pacotes estão nomeados corretamente de acordo com os casos de uso internos")
    , (1, "O Diagrama possui cardinalidades")
    , (1, "As cardinalidades estão atribuidas corretamente entre ator/caso de uso")
    , (1, "Os casos de uso descrevem corretamente as funcionalidades do sistema")
    , (1, "Os casos de uso não descrevem um passo-a-passo do sistema")
    , (1, "O Diagrama não possui casos de uso sobrepostos")
    , (1, "O Diagrama não possui linhas cruzadas")
    , (1, "O Diagrama está atualizado de acordo com os requisitos")
    
    , (2, "A Especificação possui o título do projeto")
    , (2, "A Especificação de requisitos ")
    , (2, "A Especificação mantêm uma linguagem formal")
    , (2, "A Especificação utiliza uma tabela para organizar os requisitos")
    , (2, "A Especificação possuí identificadores únicos para cada requisito")
    , (2, "Os identificadores estão descritos corretamente (curtos, sem espaçamento, numerados)")
    , (2, "A Especificação possuí campos para a descrição do requisito")
    , (2, "A Especificação possui requisitos funcionais")
    , (2, "A Especificação descreve corretamente requisitos funionais")
    , (2, "A Especificação possui requisitos não funcionais")
    , (2, "A Especificação descreve corretamente requisitos não funionais")
    , (2, "A Especificação identifica a origem do requisito")
    , (2, "A Especificação identifica o tipo de requisito(processo, projeto, produto)")
    , (2, "A Especificação descreve detalhes de requisitos de processo")
    , (2, "A Especificação descreve detalhes de requisitos de projeto")
    , (2, "A Especificação descreve detalhes de requisitos de produto")
    , (2, "A Especificação apresenta um glossário para definir termos usados")
    , (2, "A Especificação de requisitos apresenta informações de tempo detalhadas")
    , (2, "A Especificação contem requisitos testáveis")
    , (2, "A Especificação trata exceções para os requisitos")
    , (2, "")
