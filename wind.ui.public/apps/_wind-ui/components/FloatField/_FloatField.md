COMPONENTE "FloatField"

O QUE ESTE COMPONENTE FAZ?

Este componente cria um campo de numero com validação totalmente automática. Você pode renderizar diversos FloatField e manipula-los individualmente
ou não. Além disso, você não precisará escrever seu próprio validador, apenas será necessário fornecer os parâmetros que você deseja e o próprio
campo de números se auto-validará. Com a API deste componente você pode checar se o campo é válido ou não com um simples método. Este componente
trabalha com números inteiros e flutuadores, aceitando virgulas ou pontos.

VARIÁVEIS (PARÂMETROS) DESTE COMPONENTE

- id (String)
    O ID do campo. Esta variável é muito importante para gerenciar os campos individualmente ou não.
- style (CSS)
    Um código CSS personalizado que você queira implementar.
- placeholder (String)
    Um texto que será exibido enquanto este campo estiver vazio.
- onchangecontent (Função JavaScript)
    Um código JS que você queira rodar sempre que o conteúdo for alterado pelo usuário.
    NOTA: USE APENAS ASPAS SIMPLES CASO VÁ FORNECER UM TEXTO DENTRO DO MÉTODO AO RENDERIZAR ESTE COMPONENTE, EXEMPLO DO PHP: "onchangecontent"=>"functionName('textoaqui');"
    NOTA: O método registrado em "onchangecontent" só será chamado quando o conteúdo for alterado pelo usuário, e for válido de acordo com os parâmetros
          passados para o campo, ao renderiza-lo com a API PHP. Note também que, funções passando o próprio campo, podem não funcionar, conforme o esperado...
          Exemplo: "onchangecontent"=>"functionName(this);"
    NOTA: Não use a função "forceValidate()" dentro da função dentro do "onchangecontent", pois pode gerar um loop de chamadas.
- autocomplete (String Bool)
    Caso seja "off" desativará as sugestões de autocomplete do Browser. Se desejar manter as sugestões do navegador, deixe como "on". Por padrão, este valor é "off".
- tooltip (String)
    Aqui você pode definir um texto de ajuda ou algo similar. Esse texto será exibido dentro de um balão, acima do campo, sempre que o usuário passar o mouse ou tocar
    em cima deste campo.
- value (String)
    Um texto que pode vir pré-inserido dentro do campo.
- minchars (String Int)
    Numero minimo de caracteres necessários para que esse campo seja válido.
- maxchars (String Int)
    Numero máximo de caracteres suportados para que esse campo seja válido.
- minvalue (String Int)
    Valor númerico minimo, exigido para que o campo seja válido.
- maxvalue (String Int)
    Valor númerico máximo, exigido para que o campo seja válido.
- allowzero (String Bool)
    Caso falso, o campo não aceitará o valor de zero.
- allownegative (String Bool)
    Caso falso, o campo não aceitará valores negativos, abaixo de zero.
- allowempty (String Bool)
    Caso falso, o campo não aceitará que o valor fique vazio.

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- id (É muito importante que você defina um ID, caso contrário, algumas funções podem não funcionar como o espero, como Tooltips, status e etc)

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- FloatField.isValid(id)
    Retorna true se o conteúdo de um componente FloatField é válido, de acordo com os parâmetros passados a ele no momento da renderização.

- FloatField.setNumber(id, novoNumero)
    Altera o numero do FloatField alvo, para o texto que você passar no parâmetro "novoNumero".

- FloatField.getNumber(id)
    Retorna o numero que atualmente está dentro do FloatField alvo.

- FloatField.forceValidate(id)
    Força um campo FloatField alvo, a se auto validar, mesmo sem interação do usuário. É altamente recomendado usar este método antes de coletar dados de
    um campo.

- FloatField.setStatus(id, isGood, message)
    Define uma mensagem personalizada dentro do status de um campo alvo. Caso "isGood" seja true, o campo terá uma borda verde e a mensagem de status terá
    a coloração verde também, se não, estes terão colorações vermelha.
    A "message" é a mensagem que você quer exibir no status personalizado.
    Note que: Só é possível definir um status personalizaod, num campo que atualmente seja válido. Use .isValid(id) para verificar se o campo é válido,
    antes de definir um status personalizado.

- FloatField.getStyle(id)
    Retorna a classe "style" de um componente alvo, para que você possa editar o estilo e alterar propriedades como altura, largura e etc.