COMPONENTE "DateField"

O QUE ESTE COMPONENTE FAZ?

Este componente cria um campo de Data customizável com validação totalmente automática. Você pode renderizar diversos DateField e manipula-los
individualmente ou não. Além disso, você não precisará escrever seu próprio validador, apenas será necessário fornecer os parâmetros que você
deseja e o próprio campo de data se auto-validará. Com a API deste componente você pode checar se o campo é válido ou não com um simples método.
Ao renderizar este componente, você pode definir se o tipo de data será Date, Time ou DateTime-Local. Continue lendo para entender as diferenças.
yyyy - Significa ano em números. Exemplo: 2020.
mm - Significa mês em números, de 1 a 12. Exemplo: 12.
dd - Significa dia em números, de 1 a 31. Exemplo: 16.
hh - Significa hora em números, de 00 a 23. Exemplo: 07.
mm - Significa minutos em números, de 00 a 59. Exemplo: 53.

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
- value (String)
    Um texto que pode vir pré-inserido dentro do campo.
- type (String)
    O tipo de data que esta instância do campo irá capturar. Você pode escolher uma das três abaixo, onde...
        - date
            O campo coletará apenas data, com o formato de yyyy/mm/dd.
        - time
            O campo coletará apenas hora, com o formato de hh:mm.
        - datetime-local
            O campo coletará data e hora, com o formato de yyyy/mm/ddThh:mm (Onde "T" é um separador entre a data e hora).
    Você só pode escolher entre um dos 3 acima.
- min (String Date)
    Será a data mínima exigida por este campo. Você deve definir a data usando o formato "yyyy/mm/dd", "hh:mm" ou "yyyy/mm/ddThh:mm" de acordo
    com o tipo de campo de data que você quis renderizar.
- max (String Date)
    Será a data máxima permitida por este campo. Você deve definir a data usando o formato "yyyy/mm/dd", "hh:mm" ou "yyyy/mm/ddThh:mm" de acordo
    com o tipo de campo de data que você quis renderizar.
- allowempty (String Bool)
    Caso falso, este campo não permitirá datas/valores vazias.

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- id (É muito importante que você defina um ID, caso contrário, algumas funções podem não funcionar como o espero, como Tooltips, status e etc)
- type

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- DateField.isValid(id)
    Retorna true se o conteúdo de um componente DateField é válido, de acordo com os parâmetros passados a ele no momento da renderização.

- DateField.getType(id)
    Retorna o tipo do componente DateTime alvo. Pode retornar o valor "datetime-local", "date" ou "time".

- DateField.getValue(id)
    Retorna o valor do campo DateTime alvo. Retorna um valor de data formatado em "yyyy/mm/dd", "hh:mm" ou "yyyy/mm/ddThh:mm" de acordo com o tipo do
    campo de data criado.

- DateField.getDate(id)
    Retorna um objeto JavaScript "Date" contendo a data do valor que estiver no campo DateTime alvo.

- DateField.getMilliseconds(id)
    Retorna a data que estiver no campo DateTime alvo, convertida para Milliseconds.

- DateField.forceValidate(id)
    Força um campo DateField alvo, a se auto validar, mesmo sem interação do usuário. É altamente recomendado usar este método antes de coletar dados de
    um campo.

- DateField.setStatus(id, isGood, message)
    Define uma mensagem personalizada dentro do status de um campo alvo. Caso "isGood" seja true, o campo terá uma borda verde e a mensagem de status terá
    a coloração verde também, se não, estes terão colorações vermelha.
    A "message" é a mensagem que você quer exibir no status personalizado.
    Note que: Só é possível definir um status personalizaod, num campo que atualmente seja válido. Use .isValid(id) para verificar se o campo é válido,
    antes de definir um status personalizado.

- DateField.getStyle(id)
    Retorna a classe "style" de um componente alvo, para que você possa editar o estilo e alterar propriedades como altura, largura e etc.