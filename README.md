# G-Tech | Hardware & Security

## 📌 Visão Geral do Projeto
O **G-Tech** é um projeto de website voltado para comércio eletrônico, desenvolvido como requisito parcial para a disciplina de Desenvolvimento Web. O sistema foi construído em três etapas incrementais: HTML5/CSS, JavaScript e PHP com Banco de Dados. Atualmente, o projeto encontra-se na **Etapa 3**, com a integração de um banco de dados MySQL via PHP para operações completas de CRUD.

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
Para esta **Etapa 3 (PHP + BD)**, o projeto requer um servidor local (como XAMPP, WAMP ou Laragon) e um banco de dados MySQL.

**Roteiro para testar a aplicação:**
1. Mova a pasta do projeto para o diretório público do seu servidor web (ex: `htdocs` no XAMPP).
2. Inicie os serviços do **Apache** e **MySQL** pelo painel de controle do servidor local.
3. Acesse o seu SGBD (ex: **phpMyAdmin**) e execute o conteúdo do arquivo `/db/script.sql` para criar o banco `gtech_db` e a respectiva tabela.
4. Acesse o projeto no navegador pela URL: `http://localhost/gtech`
5. **Testes (Create):** Preencha e envie o formulário em "Atendimento" (`contato.html`). O PHP fará a inserção no banco de dados.
6. **Testes (Read, Update, Delete):** Acesse diretamente a URL `http://localhost/gtech/views/listar_pedidos.php` para visualizar o painel de administração e gerenciar os pedidos cadastrados no banco.

## 🛠️ Tecnologias e Padrões Utilizados
* **HTML5:** Estrutura construída com tags semânticas para melhor indexação, organização e acessibilidade básica.
* **CSS3:** Estilização desenvolvida em folha externa, com efeitos de transição (`hover`) e foco na experiência do usuário (UX).
* **JavaScript (ES6+):** Utilizado para manipulação dinâmica do DOM, iteração de arrays, `localStorage` e eventos (listeners), sem dependência de bibliotecas externas (Vanilla JS).
* **Boas Práticas:** Separação estrita de responsabilidades (HTML para estrutura, CSS para visual e JS para comportamento), código limpo e indentado.