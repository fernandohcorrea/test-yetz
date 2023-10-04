<p align="center"><a href="https://yetz.com.br" target="_blank"><img src="https://yetz.com.br/wp-content/uploads/2021/09/Logos-Yetz_logo_yetz_original-3-1.svg" width="400" alt="Yetz Logo"></a></p>


# Teste PHP Back-End

## PROCESSO SELETIVO PARA VAGA DE PROGRAMADOR BACK END

### DEFINIÇÕES INICIAIS

a) PRAZO: 1 Semana, a partir do recebimento desse documento.

b) Não é necessário que você desenvolva tudo que está descrito nos requisitos, você pode focar naquilo que considera mais
importante. Fique à vontade para entrar em contato e tirar dúvidas e/ou nePgociar o prazo de desenvolvimento;

c) Você deve subir seu projeto em um repositório no GitHub.

d) Você deve colocar sua aplicação em produção em um webserver de sua escolha, por exemplo AWS ou HEROKU.

e) Ao final responda o e-mail com suas considerações, apontando dificuldades e como as contornou.

### TAREFA
Para o processo seletivo precisamos que você desenvolva uma aplicação usando o framework LARAVEL em sua versão mais recente e um
banco de dados MySQL. Como a atividade tem por objetivo demonstrar suas habilidades como desenvolvedor Back End, o Front End precisa
apenas ser funcional.


### DESCRIÇÃO DA APLICAÇÃO
Um grupo de amigos, desenvolvedores, resolveram jogar futebol toda semana em um campo Society de Poços de Caldas.
Após montar um grupo no WhatsApp com 25 pessoas, perceberam duas coisas:

1. Em média 15 a 17 pessoas confirmavam presença no jogo.

2. Sempre perdiam 10 minutos de jogo para escolher os times com 5 jogadores de linha e 1 goleiro. Logo ficou claro que poderiam
desenvolver uma aplicação que sorteasse as equipes, com base nas habilidades de cada jogador e assim poupar tempo.
Essa é sua tarefa.

### REQUISITOS
* Armazenar dados dos jogadores: Nome, nível (de 1 a 5, sendo 1 o pior e 5 o melhor) e se o jogador é goleiro(sim/não).
* Permitir ao usuário marcar quem confirmou presença.
* Definir o número de jogadores por time.
* Sortear os jogadores em pelo menos dois times, considerando a quantidade de jogadores definidos e os que foram marcados como
presentes.
* Quando houver mais de dois times completos, é permitido ao último time ficar com o número de jogadores menor do que aquele definido
pelo usuário.
* Não permitir que um time tenha um número maior de jogadores do que foi determinado pelo usuário antes do sorteio.
* Não permitir o sorteio, caso o número total de confirmados seja menor que Nj*2, sendo 'Nj' o número de jogadores por time (ex: para
um sorteio com 5 jogadores por time, o mínimo de confirmados deve ser 10).
* Não permitir mais de 1 goleiro no mesmo time.
- Será um diferencial para o desenvolvedor, se a aplicação considerar o nível dos jogadores ao executar o sorteio, deixando os times o mais
balanceado possível (ninguém quer jogar no time dos "perebas", nem jogar contra o time da "panelinha").
