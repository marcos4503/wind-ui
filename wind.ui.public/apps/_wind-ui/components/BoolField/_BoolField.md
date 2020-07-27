COMPONENTE "BoolField"

O QUE ESTE COMPONENTE FAZ?

Este componente cria um campo marcável customizável com validação totalmente automática. Você pode renderizar diversos BoolField e manipula-los
individualmente ou não. Além disso, você não precisará escrever seu próprio validador, apenas será necessário fornecer os parâmetros que você
deseja e o próprio campo marcável se auto-validará. Com a API deste componente você pode checar se o campo é válido ou não com um simples método.
Este campo não suporta o fornecimento de um valor padrão ao renderiza-lo, sendo assim, você deve usar a API JavaScript deste componente para
definir um valor.

VARIÁVEIS (PARÂMETROS) DESTE COMPONENTE

- id (String)
    O ID do campo. Esta variável é muito importante para gerenciar os campos individualmente ou não.
- style (CSS)
    Um código CSS personalizado que você queira implementar.
- onchangecontent (Função JavaScript)
    Um código JS que você queira rodar sempre que o conteúdo for alterado pelo usuário.
    NOTA: USE APENAS ASPAS SIMPLES CASO VÁ FORNECER UM TEXTO DENTRO DO MÉTODO AO RENDERIZAR ESTE COMPONENTE, EXEMPLO DO PHP: "onchangecontent"=>"functionName('textoaqui');"
    NOTA: O método registrado em "onchangecontent" só será chamado quando o conteúdo for alterado pelo usuário, e for válido de acordo com os parâmetros
          passados para o campo, ao renderiza-lo com a API PHP. Note também que, funções passando o próprio campo, podem não funcionar, conforme o esperado...
          Exemplo: "onchangecontent"=>"functionName(this);"
- label (String)
    O titulo que será exibido em cima deste campo.
- message (String)
    O texto que será exibido ao lado da caixa marcável.
- requirechecked (String Bool)
    Caso verdadeiro, a caixa só será válida caso esteja marcada.
- requireunchecked (String Bool)
    Caso verdadeiro, a caixa só será válida caso esteja desmarcada.

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- id
- message

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- BoolField.isValid(id)
    Retorna true se o conteúdo de um componente BoolField é válido, de acordo com os parâmetros passados a ele no momento da renderização.

- BoolField.getValue(id)
    Retorna o valor booleano de BoolField alvo.
    
- BoolField.setValue(id, newValue)
    Define o novo valor booleano de um BoolField alvo.

- BoolField.forceValidate(id)
    Força um campo BoolField alvo, a se auto validar, mesmo sem interação do usuário. É altamente recomendado usar este método antes de coletar dados de
    um campo.

- BoolField.setStatus(id, isGood, message)
    Define uma mensagem personalizada dentro do status de um campo alvo. Caso "isGood" seja true, o campo terá uma borda verde e a mensagem de status terá
    a coloração verde também, se não, estes terão colorações vermelha.
    A "message" é a mensagem que você quer exibir no status personalizado.
    Note que: Só é possível definir um status personalizaod, num campo que atualmente seja válido. Use .isValid(id) para verificar se o campo é válido,
    antes de definir um status personalizado.

- BoolField.getStyle(id)
    Retorna a classe "style" de um componente alvo, para que você possa editar o estilo e alterar propriedades como altura, largura e etc.