COMO FUNCIONA A PÁGINA CLIENT.PHP

Como já viu anteriormente, a Client.php é apenas a página principal do seu app Wind UI, a página que nunca será trocada por outra e que apenas
atualizará seu conteúdo trocando fragmentos e etc. Nesta página Client.php, você pode utilizar HTML, CSS, JS e PHP normalmente, o seu código só deve
estar depois da seguinte demarcação...
<!-- Start of client.php modifiable area -->
e antes da seguinte demarcação...
<!-- End of client.php modifiable area -->
Sendo assim, você está livre para digitar textos, inserir um código HTML, CSS JS ou PHP sem problemas. Você também pode usar a API PHP do Wind UI
nesta área.







COMO RENDERIZAR UM COMPONENTE NUM FRAGMENTO, INDEX.PHP OU DENTRO DE OUTRO COMPONENTE

Para renderizar um componente, você deve usar um método da API PHP do Wind UI. Basta chamar o método abaixo, da API PHP do Wind UI...
renderComponentHere("ComponentName");

O código PHP/HTML do componente será renderizado no local onde você chamar este método. A estrutura dos componentes é feita em PHP e HTML. O HTML da a estrutura ao
componente, já o PHP pode trazer ferramentas de processamento de hypertexto que podem lhe ajudar, como suporte a APIs do PHP e etc, tudo dentro do seu componente.
Devido a isso, você tem a possibilidade de definir váriaveis PHP dentro do código do seu componente, e assim, você pode definir o valor dessas variaveis antes de
instanciar o seu componente, assim você pode renderizar o mesmo componente várias vezes, porém, com conteúdos diferentes, veja o exemplo a seguir...

code.php (Este é o arquivo PHP de código do meu componente. Meu componente apenas exibe uma mensagem dentro de uma tag h1)

<h1>Meu nome é <?php echo($nome); ?></h1>

No exemplo do meu code.php acima, eu usei HTML e PHP para criar este pequeno componente exibidor de nomes.
Agora, para renderizar este mesmo componente diversas vezes, mas com textos diferentes...

$nome = "Gabriel";
renderComponentHere("ComponentName");
$nome = "Marcos";
renderComponentHere("ComponentName");

Assim, o meu componente será renderizado duas vezes, mas exibirá textos diferentes!


CRIANDO O SEU PRÓPRIO COMPONENTE