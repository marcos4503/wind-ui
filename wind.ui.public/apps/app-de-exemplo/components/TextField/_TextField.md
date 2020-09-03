COMPONENTE "TextField"

O QUE ESTE COMPONENTE FAZ?

Este componente cria uma area de texto com validação totalmente automática. Você pode renderizar diversos TextField e manipula-los individualmente
ou não. Além disso, você não precisará escrever seu próprio validador, apenas será necessário fornecer os parâmetros que você deseja e a própria
area de texto se auto-validará. Com a API deste componente você pode checar se o campo é válido ou não com um simples método.
O componente de área de texto reajusta a sua altura automaticamente de acordo com o tamanho do texto dentro dele, porém, se você precisa renderizar
estes componentes com um texto padrão dentro, no carregar da página, você pode usar a API deste componente para forçar a todos os TextField
se redimensionarem automaticamente.

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
    NOTA: Não use a função "forceValidate()" dentro da função dentro do "onchangecontent", pois pode gerar um loop de chamadas.
- autocomplete (String Bool)
    Caso seja "off" desativará as sugestões de autocomplete do Browser. Se desejar manter as sugestões do navegador, deixe como "on". Por padrão, este valor é "off".
- tooltip (String)
    Aqui você pode definir um texto de ajuda ou algo similar. Esse texto será exibido dentro de um balão, acima do campo, sempre que o usuário passar o mouse ou tocar
    em cima deste campo.
- placeholder (String)
    Um texto que será exibido enquanto este campo estiver vazio.
- value (String)
    Um texto que pode vir pré-inserido dentro do campo.
- minchars (String Int)
    Numero minimo de caracteres necessários para que esse campo seja válido.
- maxchars (String Int)
    Numero máximo de caracteres suportados para que esse campo seja válido.
- allowespecialchars (String Bool)
    Caso falso, o campo só será valido se não contiver caracteres especiais.
- allownumbers (String Bool)
    Caso falso, o campo só será valido se não contiver números.
- allowuppercase (String Bool)
    Caso falso, o campo só será valido se não contiver letras maiúsculas.
- allowlowercase (String Bool)
    Caso falso, o campo só será valido se não contiver letras minúsculas.
- allowhtml (String Bool)
    Caso falso, o campo só será valido se não contiver código HTML.
- allowempty (String Bool)
    Caso falso, o campo só será válido se não estiver vazio.
- specialcharsallowed (String Array)
    Caso "allowespecialchars" seja false, você pode definir aqui, quais serão os caracteres especiais que ainda serão aceitos. Caso deixe vazio, nenhum
    caractere especial será aceito.
    NOTA: Cada caractere especial deve ser separado por virgula. Exemplo "!,@,#,_,-".
    NOTA: Aspas simples ou aspas dupla não serão aceitos mesmo que estejam em "specialcharsallowed".
    NOTA: Caso queira permitir virgulas, ao invés de acrescentar o caractere "," em sua lista, adicione a palavra "comma". Exemplo: "!,@,comma,#,&"

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- id (É muito importante que você defina um ID, caso contrário, algumas funções podem não funcionar como o espero, como Tooltips, status e etc)

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- TextField.isValid(id)
    Retorna true se o conteúdo de um componente TextField é válido, de acordo com os parâmetros passados a ele no momento da renderização.

- TextField.setText(id, novoTexto)
    Altera o texto do TextField alvo, para o texto que você passar no parâmetro "novoTexto".

- TextField.getText(id)
    Retorna o texto que atualmente está dentro do TextField alvo.

- TextField.forceAutoResizeInAll()
    Força todos os componentes TextField a se redimensionarem automaticamente de acordo com o tamanho do conteúdo dentro de cada um.

- TextField.forceValidate(id)
    Força um campo TextField alvo, a se auto validar, mesmo sem interação do usuário. É altamente recomendado usar este método antes de coletar dados de
    um campo.

- TextField.setStatus(id, isGood, message)
    Define uma mensagem personalizada dentro do status de um campo alvo. Caso "isGood" seja true, o campo terá uma borda verde e a mensagem de status terá
    a coloração verde também, se não, estes terão colorações vermelha.
    A "message" é a mensagem que você quer exibir no status personalizado.
    Note que: Só é possível definir um status personalizaod, num campo que atualmente seja válido. Use .isValid(id) para verificar se o campo é válido,
    antes de definir um status personalizado.

- TextField.getStyle(id)
    Retorna a classe "style" de um componente alvo, para que você possa editar o estilo e alterar propriedades como altura, largura e etc.