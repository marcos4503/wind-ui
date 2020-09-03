<?php
    //Import core files and start fragment renderization.
    include_once("../../../../../.core/base/fragment/wind-ui-fragment-prepare.php");
    WindUiFragmentRenderer::startFragment(__DIR__);
?>
<!-- Start of fragment content modifiable and visible to user area -->


<center>
    <h1>Explicando o Funcionamento do Wind UI</h1>
</center>

Aqui, eu assumo que você conhece o conceito e funcionamento básico de um site dinâmico. Explicando de maneira rápida, um site dinâmico é um
 site que tem seu conteúdo atualizado dinâmicamente. Sem necessidade de ficar recarregando a página a cada solicitação ou ação executada pelo
 usuário. Isso torna a navegação mais intuitiva e até divertida. Sites que funcionam assim por exemplo, são o Facebook, MediaFire, Google Drive, Gmail
 e a lista continua ifinitamente.

<br>
<br>

Nos chamamos de aplicação/aplicativo Web, qualquer site, e existe um costume ainda maior de chamar sites dinâmicos de aplicativos, pois hoje em dia, esses
 sites se comportam de maneira muito similar aos aplicativos de celular por exemplo. Por isso, os sites criados com o Wind UI, podem ser chamados de simplesmente
 "apps".

<br>

Conforme você navegou por este app, você deve ter notado que a página só teve um carregamento inicial e depois não houveram mais recargas de página. Este app foi criado
 usando o Wind UI totalmente. O Wind UI tem um funcionamento baseado no conceito de Fragmentos (Fragments), FragmentsViewer (Janela de Visualização de Fragmentos), Componentes (Components) e o Client.php (Página única e principal).
 Agora falaremos sobre cada um desses conceitos.

<h3>Página principal, ou Client.php</h3>

Essa é a página ao qual o usuário acessa e nunca mais sai dela (claro que até fechar o site). Somente o conteúdo dessa página é trocado conforme o usuário navega. Mesmo que o
 usuário acesse um link de um fragmento por exemplo, ele será redirecionado pelo Wind UI, para o Client.php. Quando você quer enviar o link do seu site para alguém, você deve enviar
 o link da página Client.php do seu app. Você entenderá mais a frente como funciona o sistema de links do Wind UI, como você terá um link único para cada página do seu app.

<br>
<br>

Você deve pensar no Client.php como a cara do seu app. Você precisa criar o design para ele apenas uma vez. Digamos, você só precisa criar uma Toolbar, a área onde o conteúdo será exibido, aplicar um CSS e
 pronto. A cara do seu app já está pronta. Apenas o conteúdo do FragmentsViewer será atualizado/trocado. Continue lendo para entender melhor.

<h3>FragmentsViewer (Ou Janela de Visualização de Fragmentos)</h3>

Agora que você entendeu o que é o Client.php, vamos para o próximo conceito que é o FragmentsViewer. O FragmentsViewer é uma janela flexivel que você pode coloca-la em qualquer lugar do seu Client.php, dentro de DIV ou TAG que você
 preferir. Como o FragmentsViewer é flexivel, ele tomará o tamanho total da DIV ao qual ele estiver dentro. A única função do FragmentsViewer é a função de exibir Fragmentos (Você entenderá mais sobre eles no próximo tópico). Conforme
 os Fragmentos são trocados e carregados, eles serão exibidos SEMPRE dentro do FragmentsViewer, por isso você pode colocar o FragmentsViewer onde bem entender em seu Client.php. Você só não pode deixar de colocar um FragmentsViewer dentro
 do Client.php.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/x-ray-view-wind-ui-1.png")
    ), false);
?>

<br>
<br>

Na imagem acima, temos uma demonstração do que é o FragmentsViewer. Todos os blocos pretos são o Client.php. Colocamos uma Toolbox, uma DIV que mostra o conteúdo do site e um Rodapé no Client.php. Dentro da DIV que mostra o conteúdo do site,
 foi colocado o FragmentsViewer. Como o FragmentsViewer é muito flexível, ele tomou a forma dessa DIV. Agora que temos um FragmentsViewer, somente o conteúdo dentro do FragmentsViewer é trocado, dessa forma, o rodapé, toolbox e etc, continuam sempre
 os mesmos.

<h3>Fragments</h3>

Os fragmentos são literalmente Fragmentos. São pedaços de páginas. Normalmente, ao criar uma nova página para um site comum, você precisa criar um novo arquivo HTML, inicializar com as Tags HTML, HEAD, BODY e etc... Ao criar um fragmento, você não precisa
 fazer nada disso, apenas precisa criar o seu conteúdo. Se você reparar na URL deste app, você verá um parâmetro escrito "fragment=submenu-docs%2Fwind-ui-docs-how-works". Esse parâmetro determina qual é o fragmento atualmente exibido pelo Client.php do seu app.
 O seu aplicativo tem um arquivo de configuração que define qual será o fragmento padrão a ser carregado, caso o parâmetro "fragment=" não esteja definido ou vazio, na URL do seu app. Quando o fragmento é trocado, o valor do "fragment=" é trocado também, para o caminho
 até o novo fragmento. É assim que o compartilhamento de links funciona no Wind UI. Você deve pensar nos Fragmentos, como se fossem páginas e sempre que um fragmento é trocado, um novo URL é exibido no navegador.

<br>
<br>

Os Fragmentos só são exibidos dentro do FragmentsViewer e a exibição, carregamento de Fragmentos é controlada pela API JavaScript do Wind UI. Dessa forma, ao invés de usar links &lta&gt com o HTML, você deverá chamar a API JavaScript do Wind UI, para trocar o fragmento.
 Tanto o Client.php quanto Fragmentos, ambos podem acessar as APIs Backend e Frontend do Wind UI, sem problemas. Você também pode analisar o código fonte deste app para aprender e entender melhor como as coisas funcionam. Essa página que você atualmente está lendo, é apenas
 um fragmento, sendo exibido dentro de um FragmentsViewer que por sua vez, está dentro do Client.php do app Wind UI!

<h3>Components</h3>

Os componentes são itens que podem ser renderizados quantas vezes você quiser, com o conteúdo variado e o conteúdo que você quiser. Se ainda não entendeu, vou dar um exemplo. Digamos que você criou um Botão, que toda vez que o usuário clicar nele, ele irá brilhar e piscar 2 vezes.
 Você quer colocar esse botão em todas as páginas do seu site, então você copia o código deste botão e cola em todas as páginas do seu site, mas alterando o que está escrito dentro dele, para fornecer um Botão com conteúdo diferente para cada página. Tudo bem. Agora, digamos que se passaram
 alguns meses e você quer editar esse Botão, alterar o código JavaScript, CSS e estrutura HTML deste Botão. Não adianta reclamar, você sabe que precisará editar o código do Botão, em TODAS as páginas aos quais você colocou este botão... É... Chato pra caramba...

<br>
<br>

Pensando nisso, os Components do Wind UI foram criados. Um componente nada mais é do que um código JavaScript, CSS e HTML. Você cria ou pode usar componentes criados por terceiros. Basta colocar o componente na pasta "components" do seu Wind UI e então chamar um método da API PHP do
 Wind UI, para renderizar o componente na área exata onde você desejar. Você só precisará informar o nome do componente que deseja renderizar. Os componentes só podem ser renderizados em Frgamentos, porém, podem ser renderizados quantas vezes você quiser.

<br>
<br>

<?php
    WindUiPhp::renderComponentHere("AdaptativeImage", (object)array(
        "src"=>WindUiPhp::getResourcePath("images/x-ray-view-wind-ui-2.png")
    ), false);
?>

<br>
<br>

Na imagem acima, vemos o Client.php, com o FragmentsViewer, dentro do FragmentsViewer, há um fragmento com 3 componentes renderizados, mas com conteúdos diferentes. A ideia central dos Componentes é a de reaproveitar código, mas as coisas não param por aí. Os Componentes
 possuem um sistema de variaveis, aos quais, ao renderizar um componente você pode passar um valor para as variaveis e esses valores serão colocados nos locais onde você colocou a variável no código do componente. Você também pode definir valores padrões para variaveis que não forem
 preenchidas ao renderizar o componente. Acredito que você agora já tenha uma noção do que da pra fazer com isso.

<br>

Essas imagens que estão sendo exibidas aqui, são um componente que só existe dentro do app Wind UI, um componente chamado de "AdaptativeImage". Este fragmento renderizou o componente "AdaptativeImage" duas vezes, porém, com diferentes imagens e a função deste componente, é renderizar
 imagens de forma adaptativa, tanto para celulares, ou PCs e assim, se no futuro for necessário editar algo no funcionamento deste componente, basta que eu edite o código do componente e a edição será aplicada em todos os fragmentos que usam este componente.

<br>
<br>

Isso é tudo sobre o básico e os conceitos do Wind UI.

<!-- End of fragment modifiable content and visible area -->
<?php
    //End of fragment renderization.
    WindUiFragmentRenderer::finishFragment();
?>