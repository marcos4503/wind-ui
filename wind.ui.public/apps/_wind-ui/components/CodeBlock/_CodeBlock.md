COMPONENTE "CodeBlock"

O QUE ESTE COMPONENTE FAZ?

Este componente renderiza um código de programação dentro de uma caixa de texto. O código renderizado terá as suas partes devidamente destacadas e
coloridas de acordo com a linguagem de programação especificada ao instanciar este componente. É importante notar que para esse componente funcionar
é necessário que você tenha a Biblioteca "Rainbow" em seu app. Para isso, baixe a biblioteca, coloque o CSS na pasta "thirdparty-libs/css" e os
códigos JavaScript em "thirdparty-libs/js" e importe os arquivos JS e CSS no "app-settings.json" do seu app Wind UI.

VARIÁVEIS (PARÂMETROS) DESTE COMPONENTE

- language (String)
    A linguagem que você deseja inserir dentro do bloco. Você pode escolher qualquer uma dentre essas...
        - c
        - csharp
        - css
        - generic
        - go
        - html
        - java
        - javascript
        - json
        - lua
        - php
        - python
        - ruby
        - scheme
        - shell
        - sql
- codeToShow (String)
    O código que será renderizado dentro do bloco de códigos.

VARIAVEIS ESSENCIAS DESTE COMPONENTE

As variáveis citadas abaixo são variáveis indispensáveis para o funcionamento deste componente e sempre devem ser fornecidas ao renderizar este componente
usando a API PHP do Wind UI em seus fragmentos.

- language
- codeToShow

API JAVASCRIPT DESTE COMPONENTE

Veja abaixo todos os métodos JavaScript deste componente. Com a API JavaScript deste componente, seu App Wind UI, Client e Fragmentos serão capazes de
interagir com este componente, capaz de interagir individualmente com cada instância deste componente ou com multiplas instâncias.

- componentCodeBlock_updateAllColors()
    Chame este método JavaScript para que o Rainbow atualize as cores de todos os códigos presentes dentro de todas as caixas de códigos atualmente sendo
    exibidas no Client e seu Fragmento atual. Pode ser necessário chamar este método sempre que um novo fragmento for carregado.