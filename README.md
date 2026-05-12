# G-Tech | Hardware & Security

## 📌 Visão Geral do Projeto
O **G-Tech** é um projeto de website voltado para comércio eletrônico, desenvolvido como requisito parcial para a disciplina de Desenvolvimento Web. O sistema está sendo construído em três etapas incrementais: HTML5/CSS, JavaScript e PHP com Banco de Dados. Atualmente, o projeto encontra-se na **Etapa 2**, com a implementação de interatividade e validações no lado do cliente (client-side).

## 🎯 Definições do Projeto
* **Tema do site:** Mini-ecommerce especializado em hardware de alta performance (focado em jogos competitivos como CS2 e Valorant) e soluções corporativas de Segurança da Informação (como chaves FIDO2).
* **Público-alvo:** Gamers, entusiastas de tecnologia, profissionais e estudantes de cibersegurança que buscam equipamentos de ponta.

## 🗺️ Mapa de Páginas e Arquivos
A navegação foi estruturada de forma simples e direta, contemplando os requisitos das Etapas 1 e 2:

1. `/index.html`: **Página Principal (Home).** Apresentação institucional e catálogo de produtos. Na versão atual, a vitrine é renderizada dinamicamente via JavaScript, contando com filtros de categoria, ordenação por preço e botões para salvar itens na memória do navegador.
2. `/carrinho.html`: **Minha Lista.** Página dinâmica que lê o `localStorage` para exibir os produtos adicionados pelo usuário. Realiza o cálculo automático do valor total e permite a remoção de itens individuais ou a limpeza completa da lista.
3. `/contato.html`: **Página de Atendimento.** Formulário completo para contato comercial e orçamentos. Utiliza as validações nativas do HTML5 combinadas com um script de validação customizada (JS) que bloqueia envios incorretos, aplica máscara de formatação no telefone e exibe feedback de erro no próprio DOM.
4. `/css/estilos.css`: **Folha de Estilos Externa.** Responsável por toda a identidade visual, tipografia, cores e layout responsivo do projeto.
5. `/js/app.js`: **Script Principal.** Arquivo central contendo a base de dados em array, funções de renderização de DOM, lógica de armazenamento local e validação de formulários.

## 🚀 Instalação e Execução
Para esta **Etapa 2 (JavaScript client-side)**, o projeto continua rodando diretamente no lado do cliente e não requer a instalação de servidores locais ou banco de dados. 

**Roteiro para testar a aplicação:**
1. Faça o download ou clone o repositório do projeto.
2. Extraia os arquivos mantendo a estrutura original (garanta que as pastas `/css` e `/js` estejam junto aos arquivos HTML).
3. Dê um duplo clique no arquivo `index.html` ou abra-o no navegador de sua preferência.
4. **Testes de Interatividade (DOM):** Na página inicial, utilize os menus suspensos (`<select>`) acima dos produtos para testar os filtros e a ordenação.
5. **Testes de Memória (Storage):** Clique em "Adicionar à Lista" em alguns produtos. Navegue até "Minha Lista" pelo menu superior, confira o cálculo do total e teste os botões de remover produtos. Recarregue a página (F5) para atestar a persistência dos dados.
6. **Testes de Validação:** Navegue até a página de Atendimento e tente enviar o formulário apenas com o primeiro nome ou com um telefone incompleto para visualizar o bloqueio e as mensagens de erro geradas pelo JavaScript.

## 🛠️ Tecnologias e Padrões Utilizados
* **HTML5:** Estrutura construída com tags semânticas para melhor indexação, organização e acessibilidade básica.
* **CSS3:** Estilização desenvolvida em folha externa, com efeitos de transição (`hover`) e foco na experiência do usuário (UX).
* **JavaScript (ES6+):** Utilizado para manipulação dinâmica do DOM, iteração de arrays, `localStorage` e eventos (listeners), sem dependência de bibliotecas externas (Vanilla JS).
* **Boas Práticas:** Separação estrita de responsabilidades (HTML para estrutura, CSS para visual e JS para comportamento), código limpo e indentado.