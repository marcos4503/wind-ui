COMPONENTE "SelectField"

O QUE ESTE COMPONENTE FAZ?

Este componente cria um campo de seleção customizável com validação totalmente automática. Você pode renderizar diversos SelectField e manipula-los
individualmente ou não. Além disso, você não precisará escrever seu próprio validador, apenas será necessário fornecer os parâmetros que você
deseja e o próprio campo de seleção se auto-validará. Com a API deste componente você pode checar se o campo é válido ou não com um simples método.

VARIÁVEIS (PARÂMETROS) DESTE COMPONENTE

- id (String)
    O ID do campo. Esta variável é muito importante para gerenciar os campos individualmente ou não.
- style (CSS)
    Um código CSS personalizado que você queira implementar.
- label (String)
    O titulo que será exibido em cima deste campo.
- onchangecontent (Função JavaScript)
    Um código JS que você queira rodar sempre que o conteúdo for alterado pelo usuário.
    NOTA: USE APENAS ASPAS SIMPLES CASO VÁ FORNECER UM TEXTO DENTRO DO MÉTODO AO RENDERIZAR ESTE COMPONENTE, EXEMPLO DO PHP: "onchangecontent"=>"functionName('textoaqui');"
    NOTA: O método registrado em "onchangecontent" só será chamado quando o conteúdo for alterado pelo usuário, e for válido de acordo com os parâmetros
          passados para o campo, ao renderiza-lo com a API PHP. Note também que, funções passando o próprio campo, podem não funcionar, conforme o esperado...
          Exemplo: "onchangecontent"=>"functionName(this);"
- optionshtml (HTML)
    Código HTML para exibir as opções. Para exibir uma opção, use o código <option value="valor">Nome</option>. Use o atributo "selected" para definir
    como opção padrão.
- allowempty (String Bool)
    Caso false, este campo só será válido caso o usuário tenha selecionado alguma opção que não seja a opção de indice padrão (0).

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- id
- optionshtml

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- SelectField.isValid(id)
    Retorna true se a opção selecionada no campo alvo, é válida.

- SelectField.getValue(id)
    Retorna o valor de acordo com a opção atualmente selecionada no SelectField alvo.

- SelectField.getSelectedOptionIndex(id)
    Retorna o indice correspondente a atual opção selecionada no SelectField alvo.

- SelectField.forceValidate(id)
    Força um campo SelectField alvo, a se auto validar, mesmo sem interação do usuário. É altamente recomendado usar este método antes de coletar dados de
    um campo.

- SelectField.setStatus(id, isGood, message)
    Define uma mensagem personalizada dentro do status de um campo alvo. Caso "isGood" seja true, o campo terá uma borda verde e a mensagem de status terá
    a coloração verde também, se não, estes terão colorações vermelha.
    A "message" é a mensagem que você quer exibir no status personalizado.
    Note que: Só é possível definir um status personalizaod, num campo que atualmente seja válido. Use .isValid(id) para verificar se o campo é válido,
    antes de definir um status personalizado.

- SelectField.getStyle(id)
    Retorna a classe "style" de um componente alvo, para que você possa editar o estilo e alterar propriedades como altura, largura e etc.