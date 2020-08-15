COMPONENTE "FileField"

O QUE ESTE COMPONENTE FAZ?

Este componente cria um campo de arquivos customizável com validação totalmente automática. Você pode renderizar diversos FileField e manipula-los
individualmente ou não. Além disso, você não precisará escrever seu próprio validador, apenas será necessário fornecer os parâmetros que você
deseja e o próprio campo de arquivos se auto-validará. Com a API deste componente você pode checar se o campo é válido ou não com um simples método.
Este componente suporta multipla seleção de arquivos, assim, você pode fazer o upload de multiplos arquivos ao mesmo tempo.

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
- maxfiles (String Int)
    A quantidade máxima de arquivos que podem ser selecionados para upload.
- maxsizemebibytes (String Int)
    O tamanho máximo em MiB que cada arquivo pode ter.
- allowedextensions (String Array)
    Uma lista de extensões permitidas, separadas por virgula. Exemplo "mp4,png,jpg" ou "mp4". Caso não seja fornecido, o FileField aceitará todas extensões.
- allowempty (String Bool)
    Caso false, o FileField será inválido se não tiver nenhum arquivo selecionado.

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- id

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- FileField.isValid(id)
    Retorna true se o campo alvo, é válido.

- FileField.getInput(id)
    Retorna o elemento Input File do componente FileField alvo. Caso você utilize a API upload do Wind UI, você pode obter o Input File a partir deste método
    e informa-lo ao usar a API de upload.

- FileField.getFiles(id)
    Retorna uma matriz com os arquivos que estão atualmente selecionados no FileField.

- FileField.lockInterface(id)
    Trava a interface do FileField alvo ocultando o botão de seleção de arquivos e exibindo o status de "Aguarde".

- FileField.unlockInterface(id)
    Destrava a interface do FileField alvo

- FileField.updateProgress(id, fileIndex, value)
    Atualiza a barra de progresso do FileField alvo, onde "fileIndex" é o indice do arquivo, na lista de arquivos, ao qual você deseja mover a barra de progresso
    e "value" é um valor de 0.0 a 1.0 que informa o progresso.

- FileField.forceValidate(id)
    Força um campo FileField alvo, a se auto validar, mesmo sem interação do usuário. É altamente recomendado usar este método antes de coletar dados de
    um campo.

- FileField.setStatus(id, isGood, message)
    Define uma mensagem personalizada dentro do status de um campo alvo. Caso "isGood" seja true, o campo terá uma borda verde e a mensagem de status terá
    a coloração verde também, se não, estes terão colorações vermelha.
    A "message" é a mensagem que você quer exibir no status personalizado.
    Note que: Só é possível definir um status personalizaod, num campo que atualmente seja válido. Use .isValid(id) para verificar se o campo é válido,
    antes de definir um status personalizado.

- FileField.getStyle(id)
    Retorna a classe "style" de um componente alvo, para que você possa editar o estilo e alterar propriedades como altura, largura e etc.