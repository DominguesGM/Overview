
/* set schema */
SET search_path TO lbaw;

/* create article's categories */
INSERT INTO Category(name) VALUES('Política');
INSERT INTO Category(name) VALUES('Mundo');
INSERT INTO Category(name) VALUES('Europa');
INSERT INTO Category(name) VALUES('Economia');
INSERT INTO Category(name) VALUES('Cultura');
INSERT INTO Category(name) VALUES('Ciência');
INSERT INTO Category(name) VALUES('Saúde');
INSERT INTO Category(name) VALUES('Tecnologia');
INSERT INTO Category(name) VALUES('Desporto');
INSERT INTO Category(name) VALUES('Cinema');
INSERT INTO Category(name) VALUES('Música');
INSERT INTO Category(name) VALUES('TV');
INSERT INTO Category(name) VALUES('VIP');
INSERT INTO Category(name) VALUES('Nacional');
INSERT INTO Category(name) VALUES('Opinião');

/* create images for accounts' pictures and articles */
INSERT INTO image(path) VALUES('images/users/profile_1.jpg');
INSERT INTO image(path) VALUES('images/users/profile_2.jpg');
INSERT INTO image(path) VALUES('images/users/profile_3.jpg');
INSERT INTO image(path) VALUES('images/users/profile_4.jpg');
INSERT INTO image(path) VALUES('images/users/profile_5.jpg');
INSERT INTO image(path) VALUES('images/users/profile_6.jpg');
INSERT INTO image(path) VALUES('images/users/profile_7.jpg');
INSERT INTO image(path) VALUES('images/users/profile_8.jpg');
INSERT INTO image(path) VALUES('images/users/profile_9.jpg');
INSERT INTO image(path) VALUES('images/users/profile_10.jpg');
INSERT INTO image(path) VALUES('images/users/profile_11.jpg');
INSERT INTO image(path) VALUES('images/users/profile_12.jpg');
INSERT INTO image(path) VALUES('images/users/profile_13.jpg');
INSERT INTO image(path) VALUES('images/users/profile_14.jpg');
INSERT INTO image(path) VALUES('images/users/profile_15.jpg');
INSERT INTO image(path) VALUES('images/articles/article_1-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_2-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_3-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_4-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_5-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_6-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_7-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_8-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_9-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_10-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_11-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_12-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_13-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_14-1.jpg');
INSERT INTO image(path) VALUES('images/articles/article_15-1.jpg');

/* create contributors, moderators and administrator accounts */
INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('lbaw1566@fe.up.pt', 'd1475bf97c233b79b446dcfb09b20924120f4cc12a196571ab060eaeea79b09c', 'lbaw', 'g66', 'Olá. Sou o administrador do sistema. Podem chamar-me @dmin. :)', 1, 'Administrator', 'Active', '3fe9e3a8ef78541244a9df0e9867eea6fa8c91c569100d00edeaf6f85c3ee3a6');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('hugo_fontes@gmail.com', 'd02d2d261f311581805b19ff66816f271498e03520ff23c0d3efa9fc243d6f02', 'Hugo', 'Fontes', 'Hello world!', 2, 'Contributor', 'Active', '802d7dae59ab5facd80db8db6f7d34d9ed09e24a28e5ac3448497202e2b5b4d8');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('ana_rocha@hotmail.com', '316b5f87f831698d57c248ddcab50d4ac762506859d9cdd224d1eef080e71082', 'Ana', 'Rocha', 'Gosto de dormir até tarde. Por isso, não me chateiem até às 13h', 3, 'Contributor', 'Active', '9810648a239e0f5c680bd0d8654275c1ef645a052897b523ee0fafacbd736eb5');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('filipe_rodrigues@publico.pt', 'b1e0968918f575ed833dca0e44671560e9a4011383518cb8ff2acaf7d34c824a', 'Filipe', 'Rodrigues', 'Jornalista no Público', 4, 'Moderator', 'Active', '6e547cee169c27bc54f57bfa265f7f49164e02d7cf6c9975bac9bd3f03ddf5a0');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('andreia_brito@uminho.pt', '422b15945dcaa52683dd9008a98db1e601b14bf25e39ee0b28a17a5db21e527a', 'Andreia', 'Brito', 'Professora na Universidade do Minho', 5, 'Moderator', 'Active', '7ce824546fe5aa1f18f0858fcf27bd58ab511a39da89f28b779935775ec62765');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('daniel_parente@gmail.com', 'c023e803208e923f63faef2995873758d582c693b154208fc73b616c9cc1fb98', 'Daniel', 'Parente', 'Este campo é obrigatório?', 6, 'Contributor', 'Active', '4264f5d783a485868c601c8719059caf9728c14498817192ffeaa5a9041f7cb2');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('eduardo_teixeira@gmail.com', '268a9d68ee3cc8671460aad0694180247754348e1444c55615d10c2c4b690658', 'Eduardo', 'Teixeira', 'Veni, vidi, vici.', 7, 'Contributor', 'Active', 'f2159b2e81ae31a2ec18f854de660a718c74a3ff176da4ed552c0fe3fb389979');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('joao_morais@wikipedia.org', '7ededbad3b4daab4b771a49272c95027a732c51356f611b4a2855ef8bc0cdca7', 'João', 'Morais', 'Apoiem a Wikipédia!', 8, 'Contributor', 'Active', '64ca2a16f5456aaf4ee34a982b2d40113e9262e9bd2cb365651b70fe8061204b');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('filipa_monteiro@live.com.pt', 'e447fcdae306c6e05d56b44ec96d293ac771ad9304fd5e6fa096efe7bf0ffa35', 'Filipa', 'Monteiro', '«As notícias são o que move o mundo»', 9, 'Contributor', 'Active', 'c11a111b2a82716093addfccfee00f83ce6d9c185713591e9287dacde4501ad5');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('joana_fernandes@hotmail.com', 'eb442139fa1083e538594512b74aaee72c51bd325a58a50036b2f90a3cc5023c', 'Joana', 'Fernandes', 'Cidadã do mundo ;)', 10, 'Contributor', 'Active', '28100beaf9959e74e178625cd3f361660615ad2e17e2459913134a5cc3dd5ed5');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('sofia_lima@gmail.com', '060765030a6f4a06e9870ca5577e014bcc80d278b24827192a9324aa802b5fe1', 'Sofia', 'Lima', 'Sobre mim? Não sei que dizer...', 11, 'Contributor', 'Active', 'af05d70bfee519a1a70e3f70110caeebfa2a272260d50e6e0150cf397fe6d317');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('pontes.pedro@fe.up.pt', '2ba3b8d4bf6799848092e61da3df3eefb2ae7e0270b021018b1366209ba0f824', 'Pedro', 'Pontes', 'Estudante no MIEIC, FEUP.', 12, 'Moderator', 'Active', '356abed8f7d0bdaeacec7583548fbf64bb3c49cac190bdf97057f566904212cf');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('gil.domingues@fe.up.pt', '6579ca3555cf8972097b42423307584f28e0ae94835a07bb8354b697ef6c55ae', 'Gil', 'Domingues', 'Estudante na FEUP. Adoro vinís.', 13, 'Moderator', 'Active', 'cedca7214f8659cf9397584990379db2efea95f2e6599d2d7b61752d992505b5');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code) 
VALUES ('maria_coimbra@gmail.com', '5b7b503d285b59a4f328e80a31c6b409464d1b7795e2e49104119471889bd2f2', 'Maria', 'Coimbra', 'Aluna na Universidade Lusófona do Porto.', 14, 'Contributor', 'Active', '9d57bb4ee823bcdf8bfda70bb7075ed99ddec283acfdba6ab2cf6cc3ed035308');

INSERT INTO contributor(email, password, first_name,last_name,about,picture,type,status,validation_code)
VALUES ('manuel_cavaleiro@gmail.com', '6efdf2e35ccbbd7602d9e7b77f0f9f2d070bc5d390dbc64a982d092e6008c4f3', 'Manuel', 'Cavaleiro', 'Adoro escrever...', 15, 'Contributor', 'Active', 'c659444949606f7d828660835e16d8ea1997fbb95f7d13218518d1aecebb316a');

/* create relations among the users */
INSERT INTO follows(follower, followee) VALUES(1, 12);
INSERT INTO follows(follower, followee) VALUES(1, 5);
INSERT INTO follows(follower, followee) VALUES(1, 6);
INSERT INTO follows(follower, followee) VALUES(1, 7);
INSERT INTO follows(follower, followee) VALUES(3, 2);
INSERT INTO follows(follower, followee) VALUES(4, 2);
INSERT INTO follows(follower, followee) VALUES(5, 3);
INSERT INTO follows(follower, followee) VALUES(5, 7);
INSERT INTO follows(follower, followee) VALUES(2, 15);
INSERT INTO follows(follower, followee) VALUES(9, 4);
INSERT INTO follows(follower, followee) VALUES(7, 2);
INSERT INTO follows(follower, followee) VALUES(2, 1);
INSERT INTO follows(follower, followee) VALUES(14, 1);

/* create notifications */
INSERT INTO notification(sender, receiver, message)
VALUES(1, 2, 'Um comentário colocado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(1, 3, 'Um artigo publicado por si foi mudado por estar erradamente categorizado.');

INSERT INTO notification(sender, receiver, message)
VALUES(1, 2, 'Um artigo publicado por si foi mudado por estar erradamente categorizado.');

INSERT INTO notification(sender, receiver, message)
VALUES(1, 9, 'Um artigo publicado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(12, 13, 'Um artigo publicado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(12, 10, 'Um comentário colocado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(12, 10, 'Um comentário colocado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(12, 10, 'Devido a repetidas violações dos Termos de Uso, a sua conta foi bloqueada. Não poderá publicar artigos ou colocar comentários.');

INSERT INTO notification(sender, receiver, message)
VALUES(12, 11, 'Um comentário colocado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(13, 9, 'Um comentário colocado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(13, 9, 'Devido a repetidas violações dos Termos de Uso, a sua conta foi bloqueada. Não poderá publicar artigos ou colocar comentários.');

INSERT INTO notification(sender, receiver, message)
VALUES(13, 5, 'Um comentário colocado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(13, 6, 'Um artigo publicado por si foi mudado por estar erradamente categorizado.');

INSERT INTO notification(sender, receiver, message)
VALUES(12, 9, 'Um artigo publicado por si foi removido por violar os Termos de Uso');

INSERT INTO notification(sender, receiver, message)
VALUES(13, 9, 'Devido a repetidas violações dos Termos de Uso, a sua conta foi bloqueada. Não poderá publicar artigos ou colocar comentários.');

/* create notifications */
INSERT INTO Article(author, title, summary, content)
VALUES (1, 'Primeiro, Putin riscou os oligarcas. Depois, tornou-se no maior deles todos', 'O investidor Bill Browder foi expulso da Rússia depois de cruzar o caminho dos oligarcas e de Putin.', 'Há poucos investidores de topo do mundo que podem dizer que são netos de um antigo líder de um partido comunista. Em 1926, Earl Browder era um reputado sindicalista de Wichita, no estado norte-americano do Kansas, quando foi convidado para visitar a União Soviética, então uma nação jovem. Apaixonou-se por uma advogada russa, com a qual rapidamente se casou. Tiveram um filho, que nasceu em Moscovo em 1927. Naqueles anos, Estaline consolidava o seu poder e Trotsky estava quase a fugir do país. Em 1932, Earl Browder deslocou-se com a família para os EUA. Foi lá que fundou o Partido Comunista dos Estados Unidos, com o qual concorreu à Casa Branca em 1936 e 1940, sem sorte.
E, depois, há o seu oposto — que curiosamente era o seu neto. 70 anos depois de o avô assentar malas em Moscovo, Bill Browder fez o mesmo, mas para dar início àquela que viria a ser, pouco depois, o Hermitage Capital Management, que em tempos chegou a ser o maior fundo de investimento estrangeiro na Rússia. Estávamos em 1996, Boris Ieltsin preparava-se para ser reeleito depois de dar início àquela que foi, possivelmente, a maior onda de privatizações da História. Foi neste campo, e sobretudo na compra de ações subvalorizadas de empresas já privatizadas, que Bill Browder fez fortuna.
É, portanto, de opostos que falamos. Se, por um lado, o avô Earl Browder não teve sucesso em transformar a maior democracia capitalista do planeta num país comunista, o neto Bill Browder vingou com a chegada do capitalismo àquela que fora a maior potência marxista-leninista de sempre.');

INSERT INTO Article(author, title, summary, content)
VALUES (2, 'Socialista denuncia negócios de amigo de Costa com o Estado', 'António Galamba, que foi da direcção de António José Seguro, acusa Costa de "falta de transparência e rigor na gestão da coisa pública".', 'As presenças do advogado Diogo Lacerda Machado em negócios com o Estado são enumeradas por António Galamba, membro da comissão política nacional do PS e antigo membro da direção de António José Seguro. A intervenção do amigo pessoal de António Costa em processos com o Estado – que tem estado sob forte polémica nos últimos dias – é criticada pelo socialista que dá como exemplos de “confusão entre política e negócios” a intervenção do mesmo advogado no negócio de adjudicação do Sistema Integrado das Redes de Emergência e Segurança de Portugal (SIRESP) ou na compra dos helicópteros Kamov.
Num artigo de opinião publicado no jornal i (intitulado “Temos paquiderme na loja”), António Galamba avisa que “não há opacidade má de direita e opacidade boa de esquerda. Há falta de transparência, de rigor, na gestão da coisa pública, e a expectativa de que os portugueses possam ser tomados por parvo, pro bono ou por 2 mil euros brutos. Tudo o resto é como se tivéssemos uma manada de elefantes numa loja de porcelanas”, diz logo depois de falar nos dois negócios polémicos onde diz que Lacerda Machado interveio.');

INSERT INTO Article(author, title, summary, content)
VALUES (3, 'O estranho feminismo de Deus', 'Quanto mais pessoas levam a religião a sério maior a desigualdade de género. A correlação é de 79%.', 'Num artigo muito bem-humorado, o Padre Gonçalo Portocarrero de Almada argumenta que Deus é obviamente feminista. Só assim se compreende que a mulher seja tão favorecida em relação ao homem em tantos aspectos. Amadurecem mais depressa, vivem mais, têm a graça da maternidade, são mais bonitas entre várias outras bênçãos. É esta a justificação que P. Portocarrero de Almada encontra para Jesus Cristo reservar o ministério sacerdotal aos homens. Para os compensar de tanta inferioridade. Ou seja, “essa prerrogativa masculina não pode ser entendida como confirmação de um inexistente machismo divino, (…) mas apenas como um prémio de consolação”.
Também Pedro Arroja tem uma tese semelhante, se bem que aplicada num outro domínio da nossa vida social. Segundo Arroja, as mulheres não servem para líderes partidárias (sendo a sua ascensão à liderança um “sinal da degenerescência dos partidos”) por não serem tão sectárias como os homens.');

INSERT INTO Article(author, title, summary, content)
VALUES (4, 'O poder corrompe? O PCP e o BE respondem', 'Sabemos quem mais lucrou com o BANIF não ter chegado a 2016: os detentores de depósitos superiores a 100.000€ e de obrigações seniores.', 'Partidos que estão sistematicamente fora do poder, e que a ele não ambicionam, são partidos descomprometidos. Isso permite-lhes ser irresponsáveis. O que, dependendo das circunstâncias, pode ser bom ou mau. Durante décadas quer o Partido Comunista Português quer o Bloco de Esquerda estiveram fora do chamado arco de governação. Actualmente, apesar de não estarem no governo, estão comprometidos com a governação. Isso enriquece a democracia por um lado, mas tenho medo que a empobreça por outro.
Com o PCP e o BE fora do poder, estes partidos puderam ficar fora de parte da teia de interesses que capturou o Estado. Mais livre o BE do que o PCP, que sempre foi um partido mais institucional (por causa quer da sua importância autárquica e sindical, quer da sua lealdade para com países com governos ditatoriais comunistas). E, naturalmente, por motivos ideológicos, mais livres das teias lançadas pelos interesses empresariais privados do que das teias associadas ao sector público, incluindo o Sector Empresarial do Estado.');

INSERT INTO Article(author, title, summary, content)
VALUES (5, 'Sete truques para dominar a arte de pesquisar no Google', 'O Google é o motor de buscas mais utilizado e faz parte do quotidiano de toda a gente.', 'Se usar aspas para pesquisar uma frase ou expressão, o Google procura a expressão toda e não as palavras separadas.
Um sinal de menos antes de uma palavra faz com que essa palavra seja ignorada.
Pesquisar em modo incógnito permite esconder o seu endereço IP e a sua localização.
Quando faz uma compra, para saber o estado da sua encomenda sem ter que entrar no site da transportadora, basta inserir o número da encomenda na barra de pesquisa.
Quando não se lembra de uma palavra, use um asterisco para substitui-la.
Para procurar sites semelhantes a uma página qualquer escreva “related:” e insira o endereço da página.
Para procurar gifs através do Google Imagens, vá a ferramentas de pesquisa. Clique em “tipo” e selecione a opção “Animado”.');

INSERT INTO Article(author, title, summary, content)
VALUES (6, '“Uncharted 4”, o adeus do ladrão mais amado da indústria', 'O Rubber Chicken esteve em Madrid na apresentação de "Uncharted 4 - O Fim de um Ladrão”, o último capítulo da saga.', 'No passado dia 28 de Março de 2016, a Sony Computer Entertainment Ibéria organizou na sua sede, em Madrid, o evento de apresentação de um dos videojogos mais aguardados deste ano: Uncharted 4: A Thief’s End, ou, traduzido na língua de Camões, “o Fim de um Ladrão”. Como se o lançamento do novo título de uma das sagas de videojogos mais mediáticas e marcantes dos últimos anos não fosse o suficiente para fazer palpitar o sangue a quem esteve presente, neste evento pudemos também contar com a presença de dois membros da equipa da Naughty Dog, empresa responsável pelo desenvolvimento da saga Uncharted. Arne Meyer (Relações Públicas) e Rick Cambier (Lead Designer da Naughty Dog – responsável por jogos como The Last of Us, um dos jogos mais premiados de sempre na indústria, e também os 3 primeiros títulos de Uncharted).
Para que se possa entender a importância de um evento destes e do lançamento de Uncharted, vamos a alguns números: Uncharted – Drake’s Fortune, o jogo original da série, foi lançado em 2007 como exclusivo para a PlayStation 3. Desde então, sempre fiel à sua relação de exclusividade com a gigante Sony PlayStation, foram lançados mais dois títulos para a consola que o viu nascer e um jogo (prequela) para a consola portátil PS Vita. Em nove anos, a série Uncharted vendeu mais de 20 milhões de cópias em todo o mundo, valendo um lucro para a Naughty Dog de muitos milhões de euros, números que mostram não só o poder da indústria de videojogos no mundo do entretenimento, mas sobretudo a importância desta franquia no mercado atual.');

INSERT INTO Article(author, title, summary, content)
VALUES (7, 'Cibersegurança. “Estamos em guerra, meus senhores”', 'A segurança digital é um assunto sério e foi motivo de debate esta terça-feira, em Lisboa.', 'Que a segurança digital é um tema de interesse público, poucas dúvidas restam. Mas estará o assunto a ser tratado com a devida seriedade? Foi esta a pergunta que orientou a conferência “Estratégias de Segurança”, que decorreu em Lisboa esta terça-feira. Embora ligeiramente distintas no conteúdo, as opiniões convergem num ponto: nem os consumidores nem a maioria das empresas estão conscientes do risco que representam certas ameaças na internet.
Vivemos numa era de “transformação digital”, explica Timóteo Figueiró, da consultora IDC Portugal. Uma era que introduziu no vocabulário termos como “nuvem”, big data, social business e mobilidade, mas que também serviu de mote à “emergência do crime-as-a-service” — este último conceito, menos conhecido. “Já não é só o hacktivismo”, diz o investigador, enquanto aponta para uma espécie de catálogo onde crimes digitais são oferecidos a troco de dinheiro. Uma realidade um tanto ou quanto obscura.');

INSERT INTO Article(author, title, summary, content)
VALUES (8, 'Multa por excesso de velocidade? Não, é um novo vírus informático', 'Uma nova burla informática usa o GPS do telemóvel para enviar notificações de excesso de velocidade.', 'Mensagens de e-mail falsas e supostamente enviadas pelas autoridades são tudo menos novidade. A burla é conhecida e são já poucos os que caem no conto do vigário. Mas mensagens de e-mail falsas com conteúdo real, essas sim, são novas.
O caso foi registado na localidade de Tredyffrin, no estado norte-americano da Pensilvânia. Alguns residentes terão recebido mensagens supostamente enviadas pela polícia a dar conta de multas por excesso de velocidade, conta o site The Verge. No entanto, apesar de falsas, essas notificações incluíam informações reais. Entre elas, a estrada por onde o condutor passou (com a respetiva data e hora), limite de velocidade nesse troço e até a velocidade real detetada.
As mensagens exigiam o pagamento de uma coima “no prazo máximo de cinco dias úteis”, mas não era indicado qualquer método de pagamento. Antes, vinham acompanhadas de uma hiperligação que deveria apontar para uma “imagem da chapa de matrícula” do veículo e que, em vez disso, descarregava um programa malicioso (vírus) para o dispositivo da vítima.');

INSERT INTO Article(author, title, summary, content)
VALUES (9, 'KeyRanger. O novo vírus que infeta computadores Mac', 'Chama-se "KeyRanger" e é um novo vírus criado especialmente para computadores Mac. Bloqueia o disco rígido e, para o desbloquear, tem de pagar.', 'Longe vão os tempos em que, no universo dos computadores, os Mac eram considerados os mais seguros. Aliás, os mais céticos em relação à segurança dos computadores da Apple têm agora um novo argumento a seu favor: foi detetado o primeiro vírus do tipo ransomware para estes dispositivos.
Não faz a mínima ideia do que estamos a falar? Então imagine que, por exemplo, tem um trabalho importante para fazer no computador. E qual não é o seu espanto quando, ao ligá-lo, percebe que o disco está bloqueado. Assim, sem mais nem menos. E mais: é-lhe pedido que pague uma quantia bem choruda para o desbloquear.
Isto aconteceu a vários utilizadores de Mac com a aplicação Transmission instalada (um aplicativo de download de ficheiros por torrent). Na semana passada foi lançada uma atualização que prometia várias melhorias ao programa. Mas esta terá sido infetada com código malicioso — o vírus “KeyRanger” — que foi descarregado e instalado nos computadores dos utilizadores.
Durante dois dias, o vírus permaneceu quietinho e escondido no seu canto. Porém, ao terceiro dia, desencadeou secretamente uma série de processos que resultaram na encriptação e bloqueio dos discos rígidos onde estavam instalados. Ou seja, os utilizadores ficaram sem acesso aos seus ficheiros e, para desencriptar o disco, o programa obrigava ao pagamento de uma taxa avultada. É assim o negócio dos hackers por detrás do “KeyRanger”: encriptam maliciosamente os discos dos utilizadores e, claro, cobram para os desencriptar.');

INSERT INTO Article(author, title, summary, content)
VALUES (10, 'Microsoft lança ferramenta de segurança para empresas', 'A Microsoft lançou uma nova ferramenta de segurança para empresas que alerta os utilizadores caso estejam a ser alvo de ataques informáticos. O objetivo é identificar ataques e reduzir os danos.', 'Diz-se com frequência que os responsáveis pelos vírus informáticos estão sempre um passo à frente dos antivírus. A pensar nisto, a Microsoft tem um novo truque na manga: o Windows Defender Advanced Threat Protection (ATP), que é uma ferramenta que, entre outras coisas, promete ajudar a identificar e travar ataques informáticos em ambiente profissional.
Os utilizadores mal-intencionados têm sempre encontrado formas diferentes de penetrar as barreiras de segurança. Por isso, segundo a CNN Money, a lógica do ATP assenta no facto de que ninguém está livre de ser atacado — pode acontecer e é preciso estar preparado para agir caso isso aconteça.
A nova ferramenta faz parte do antivírus de origem dos sistemas operativos Windows 10 — o Windows Defender — e usa informação recolhida de um milhão de ficheiros suspeitos, mais de mil milhões de dispositivos Windows e 2.5 biliões de websites. Toda esta quantidade de dados é usada pelo ATP para reduzir eventuais danos provocados por um ataque informático.
Por outras palavras: supondo que a ferramenta deteta uma ligação suspeita — por exemplo, um endereço de IP suspeito –, é enviado de imediato um alerta ao utilizador ou ao administrador da rede. Além disso, a ferramenta alerta também outros utilizadores cujos sistemas possam estar em risco.
Espera-se que o Windows Defender ATP ajude as empresas a detetar mais rapidamente eventuais ataques. É que o Windows Defender ATP só vai estar disponível para clientes empresariais da Microsoft que tenham licenças do Windows 10. Para já, de acordo com o TechTudo, a atualização estará disponível para os membros do Windows Insider, o programa de testes da Microsoft.');

INSERT INTO Article(author, title, summary, content)
VALUES (11, 'Ativar revoluções silenciosas', 'Palco de um encontro entre as principais incubadoras, aceleradores, investidores e as mais promissoras startups nacionais.', 'Em dia de balanço do primeiro ano do Programa Ativar Portugal Startups, houve casa cheia na sede da Microsoft Portugal, no Parque das Nações, em Lisboa. Antes da abertura da sessão, ainda em tempo de cafés e de montagem de stands, um burburinho no ar antecipava já o que iria ser este momento de trocas, encontros, prémios e testemunhos em torno de um ecossistema que é cada vez mais português: o das startups de base tecnológica.
Impressoras 3d, mesas sensíveis ao toque, objetos wireless e máquinas produtoras de hologramas podiam ser vistas lado a lado com incubadoras oriundas de vários pontos do país. A língua oficial era o inglês que, aliás, só não foi falada pelo Presidente da República, Marcelo Rebelo de Sousa, que encontrou espaço na agenda para entregar os prémios Microsoft de «melhor startup do ano» e de empresa com «melhor contribuição para o ecossistema».');

INSERT INTO Article(author, title, summary, content)
VALUES (12,  'Startups e inovação: que caminho?', 'O empreendedorismo português está na moda e as startups em muito têm contribuído para isso. Luís Calado, Startup Lead na Microsoft Portugal, explica-nos porquê.', 'Foi há pouco mais de um ano e meio que a Microsoft Portugal decidiu ouvir as startups nacionais e perceber de que forma é que uma empresa com a respetiva dimensão poderia apoiá-las, para além de toda a tecnologia que já disponibilizavam até então. Foi deste périplo que nasceu a ideia do programa Ativar Portugal, que reuniu várias entidades no evento do passado dia 6 de abril, em Lisboa. Segundo Luís Calado, a Microsoft percebeu que havia um conjunto de necessidades que podiam ser correspondidas, sendo que “o Ativar Portugal nasce assim como uma iniciativa não apenas da Microsoft, mas sim de todo o ecossistema empreendedor nacional para capacitar as startups em todas estas áreas de forma a que possam atingir o sucesso global”.
O programa assume-se assim como uma startup dentro da própria empresa, tendo sido recentemente considerado como um dos melhores exemplos de apoio ao ecossistema. Apesar de ser um programa único no universo da Microsoft, Luís Calado revela que “existem já outras subsidiárias que estão a colocar programas semelhantes em prática, iniciativas que estamos a apoiar com a nossa experiência, mas a verdade é que Portugal foi o pioneiro neste caminho”.');

INSERT INTO Article(author, title, summary, content)
VALUES (13,  'EUA voltam a apontar más condições das cadeias e abusos policiais em Portugal', 'Para os EUA, os "maiores problemas de direitos humanos" em Portugal continuaram a ser os abusos policiais, as condições e sobrelotação das cadeias e a violência contra mulheres e crianças.', 'No Relatório Anual de Direitos Humanos do Departamento de Estado norte-americano, divulgado hoje, os EUA referem ainda o encarceramento de delinquentes juvenis com adultos, o tempo que, na prática, tem a prisão preventiva em Portugal e o facto de presos preventivos e condenados estarem juntos nas cadeias.
A discriminação dos ciganos e o aumento do fosso salarial entre homens e mulheres voltam também a ser apontados. Sobre as forças de segurança, o relatório diz que no ano passado houve de novo “relatos credíveis” de uso “excessivo” da força pela polícia e de tratamento desadequado e “outras formas de abuso” de presos por parte de guardas prisionais.
A este propósito, refere, porém, que a Inspeção-Geral da Administração Interna (IGAI) investigou todas as queixas e puniu os agentes considerados culpados.
Em relação às cadeias, o relatório insiste nas más condições de algumas delas e na sobrelotação, sublinhando que funcionam, no global, a 113% da sua capacidade.
A este propósito, destaca o caso da cadeia de Ponta Delgada, nos Açores, com uma taxa de ocupação de 180%.
Referindo os dez suicídios em cadeias entre janeiro e setembro, o relatório aponta não haver notícia de melhorias introduzidas em prisões como a de Paços de Ferreira ou Linhó depois de, em anos anteriores, terem sido denunciadas más condições por organismos internacionais.');

INSERT INTO Article(author, title, summary, content)
VALUES (14, 'Prazo de inscrição para leilão de energia da DECO termina na sexta-feira', 'O prazo de inscrição para o 3º leilão de energia da DECO, que se realiza dia 21, termina sexta-feira, com tarifários a nível de eletricidade (simples e bi-horária), gás natural ou oferta conjunta.', 'A associação de defesa dos consumidores afirma que “o interesse demonstrado por diversos comercializadores” do mercado permite a realização do leilão, com propostas a nível nacional e regional e convida os consumidores interessados a inscreverem-se no ‘site’ Pague Menos Energia.
A DECO pretende apresentar “os melhores preços atuais para dois cenários: os mais baratos, mas com condições associadas (débito direto ou fatura eletrónica, por exemplo), e os tarifários livres destas condições”.
Segundo a associação, considerando uma potência e consumo que abrangem o perfil médio de quase metade dos consumidores portugueses (3,45 kVA – Kilovoltampere e 1700 kWh – quilowatt-hora), a fatura anual é superior a 450 euros para quem ainda não saiu da tarifa regulada.
O primeiro leilão de energia da DECO realizou-se em maio de 2013, tendo-se inscrito 600 mil consumidores, e o segundo foi em junho de 2014, que contou com mais de 150 mil inscrições.');

INSERT INTO Article(author, title, summary, content)
VALUES (5, 'Preços pagos aos produtores de leite caíram 16% desde o fim das quotas', 'A queda do consumo, o embargo russo aos produtos agrícolas europeus e o fim do regime das quotas leiteiras ditaram um ano negro para os produtores nacionais de leite, que viram os preços cair 16% desde abril de 2015.', 'A queda do consumo, o embargo russo aos produtos agrícolas europeus e o fim do regime das quotas leiteiras ditaram um ano negro para os produtores nacionais de leite, que viram os preços cair 16% desde abril de 2015.
Segundo os dados da Associação Nacional dos Industriais de Laticínios (ANIL), Portugal produziu no ano passado mais cerca de 3,5% de leite, com a produção a situar-se perto dos 2 mil milhões de litros no final do ano, enquanto o preço pago aos produtores sofreu um decréscimo de cerca de 16%.
Entre abril e dezembro, o preço pago aos produtores de leite do Continente passou de 0,334 euros para 0,282 euros, o que significa uma redução de cinco cêntimos.
“Temos a forte perceção de que tendo baixado o preço do leite ao produtor aumentou o endividamento das explorações “, diz Carlos Neves, da Associação dos Produtores de Leite de Portugal (APROLEP), sublinhando que os produtores “procuraram investir para serem mais eficientes e produzirem leite de qualidade”.
O presidente da ANIL, Carlos Leite, salienta que “a concorrência que mais tem penalizado a indústria nacional tem-se destacado somente pelo preço” e não por outras mais-valias para o consumidor, como a qualidade e a diferenciação.
Reconhece, no entanto, que ainda há caminho a percorrer no que diz respeito à internacionalização e na “adequação da oferta nacional às exigências de um consumo muito mais diversificado e com especificidades distintas das do mercado interno”.');

/* associate an atricle to a category */
INSERT INTO category_article(category_id, article_id) VALUES(1, 1);
INSERT INTO category_article(category_id, article_id) VALUES(1, 2);
INSERT INTO category_article(category_id, article_id) VALUES(15, 3);
INSERT INTO category_article(category_id, article_id) VALUES(1, 4);
INSERT INTO category_article(category_id, article_id) VALUES(8, 5);
INSERT INTO category_article(category_id, article_id) VALUES(8, 6);
INSERT INTO category_article(category_id, article_id) VALUES(8, 7);
INSERT INTO category_article(category_id, article_id) VALUES(8, 8);
INSERT INTO category_article(category_id, article_id) VALUES(8, 9);
INSERT INTO category_article(category_id, article_id) VALUES(8, 10);
INSERT INTO category_article(category_id, article_id) VALUES(8, 11);
INSERT INTO category_article(category_id, article_id) VALUES(2, 12);
INSERT INTO category_article(category_id, article_id) VALUES(13, 13);
INSERT INTO category_article(category_id, article_id) VALUES(4, 14);
INSERT INTO category_article(category_id, article_id) VALUES(4, 15);

/* associate images to an atricle */
INSERT INTO article_image(article_id, image_id) VALUES(1, 16);
INSERT INTO article_image(article_id, image_id) VALUES(2, 17);
INSERT INTO article_image(article_id, image_id) VALUES(3, 18);
INSERT INTO article_image(article_id, image_id) VALUES(4, 19);
INSERT INTO article_image(article_id, image_id) VALUES(5, 20);
INSERT INTO article_image(article_id, image_id) VALUES(6, 21);
INSERT INTO article_image(article_id, image_id) VALUES(7, 22);
INSERT INTO article_image(article_id, image_id) VALUES(8, 23);
INSERT INTO article_image(article_id, image_id) VALUES(9, 24);
INSERT INTO article_image(article_id, image_id) VALUES(10, 25);
INSERT INTO article_image(article_id, image_id) VALUES(11, 26);
INSERT INTO article_image(article_id, image_id) VALUES(12, 27);
INSERT INTO article_image(article_id, image_id) VALUES(13, 28);
INSERT INTO article_image(article_id, image_id) VALUES(14, 29);
INSERT INTO article_image(article_id, image_id) VALUES(15, 30);

/* create up-votes on articles */
INSERT INTO article_up_vote(article_id, voted_by) VALUES(1, 12);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(2, 12);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(3, 11);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(4, 13);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(5, 13);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(1, 5);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(1, 7);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(5, 1);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(9, 13);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(7, 4);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(12, 4);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(11, 1);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(13, 1);
INSERT INTO article_up_vote(article_id, voted_by) VALUES(6, 5);

/* create down-votes on articles */
INSERT INTO article_down_vote(article_id, voted_by) VALUES(12, 1);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(12, 2);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(11, 3);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(13, 4);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(13, 5);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(9, 1);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(5, 1);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(7, 1);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(1, 5);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(13, 9);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(4, 7);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(4, 12);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(1, 11);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(1, 13);
INSERT INTO article_down_vote(article_id, voted_by) VALUES(5, 6);

/* create comments on articles */
INSERT INTO comment(posted_by, article_id, content) VALUES(5, 6, 'este mundo não muda!');
INSERT INTO comment(posted_by, article_id, content) VALUES(12, 1, 'excelente artigo. tema apaixonante. muito bem escrito.');
INSERT INTO comment(posted_by, article_id, content) VALUES(13, 4, 'talvez seja só eu, mas a tua escrita é terrível...');
INSERT INTO comment(posted_by, article_id, content) VALUES(9, 4, 'acho que és só tu, mesmo, idiota!');
INSERT INTO comment(posted_by, article_id, content) VALUES(5, 4, 'that escalated quickly...');
INSERT INTO comment(posted_by, article_id, content) VALUES(9, 3, 'isto até parece mesmo verdade...');
INSERT INTO comment(posted_by, article_id, content) VALUES(8, 3, 'concordo 110%!');
INSERT INTO comment(posted_by, article_id, content) VALUES(7, 3, 'li recentemente um artigo interessante que sugeria exatamente o oposto...');
INSERT INTO comment(posted_by, article_id, content) VALUES(7, 5, 'quão falso é isto!?!?!?');
INSERT INTO comment(posted_by, article_id, content) VALUES(3, 14, 'falso? é só estúpido lololol');
INSERT INTO comment(posted_by, article_id, content) VALUES(8, 5, 'até que enfim que alguém fala sobre isto!');
INSERT INTO comment(posted_by, article_id, content) VALUES(10, 15, 'acho que não vou sair de casa por uns tempos...');
INSERT INTO comment(posted_by, article_id, content) VALUES(10, 3, 'só porque tem um mac penso que sabem escrever...');
INSERT INTO comment(posted_by, article_id, content) VALUES(1, 3, 'tem que se tirar partido ...');
INSERT INTO comment(posted_by, article_id, content) VALUES(13, 3, 'não sei onde vai este mundo parar...');
INSERT INTO comment(posted_by, article_id, content) VALUES(5, 3, 'isto realmente.... dá vontade de chorar lol');

/* create up-votes on comments */
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(5, 1);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(5, 2);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(5, 3);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(5, 4);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(8, 5);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(9, 1);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(7, 1);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(1, 5);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(13, 9);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(4, 7);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(4, 12);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(1, 11);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(1, 13);
INSERT INTO comment_up_vote(comment_id, voted_by) VALUES(15, 6);

/* create down-votes on comments */
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(4, 1);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(4, 2);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(4, 3);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(4, 4);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(4, 5);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(1, 9);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(1, 7);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(5, 1);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(9, 13);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(7, 4);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(12, 4);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(11, 1);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(13, 1);
INSERT INTO comment_down_vote(comment_id, voted_by) VALUES(6, 15);

/* create reports */
INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(5, FALSE, NULL, 4, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(7, FALSE, NULL, 4, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(14, FALSE, NULL, 4, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(3, FALSE, NULL, 4, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(3, FALSE, 1, NULL, 'Erradamente categorizado..');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(8, TRUE, 1, NULL, 'Erradamente categorizado..');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(5, TRUE, NULL, 3, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(4, TRUE, 3, NULL, 'Conteúdo impróprio.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(4, TRUE, NULL, 9, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(4, TRUE, 1, NULL, 'Conteúdo impróprio.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(4, TRUE, 12, NULL, 'Conteúdo impróprio.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(4, TRUE, NULL, 15, 'Conteúdo impróprio.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(4, TRUE, NULL, 12, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(12, FALSE, NULL, 4, 'Linguagem inapropriada.');

INSERT INTO report(reported_by, is_resolved, article_id, comment_id, description)
VALUES(12, FALSE, NULL, 4, 'Linguagem inapropriada.');
