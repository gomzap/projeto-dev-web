// ==========================================
// DADOS DOS PRODUTOS (Array de Objetos)
// ==========================================
const produtos = [
    { id: 1, nome: "PC Gamer FPS (Foco em Valorant/CS2)", categoria: "Hardware", preco: 3999.00, imagem: "https://images.unsplash.com/photo-1587202372634-32705e3bf49c?w=400&q=80" },
    { id: 2, nome: "Chave de Segurança Identiv uTrust FIDO2", categoria: "Seguranca", preco: 350.00, imagem: "http://googleusercontent.com/image_collection/image_retrieval/10515290138521873827" },
    { id: 3, nome: "Monitor Gamer 24\" 144Hz 1ms IPS", categoria: "Monitores", preco: 1199.00, imagem: "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&q=80" },
    { id: 4, nome: "Teclado Mecânico Switch Red RGB", categoria: "Perifericos", preco: 299.90, imagem: "https://images.unsplash.com/photo-1595225476474-87563907a212?w=400&q=80" },
    { id: 5, nome: "Mouse Gamer Ultra Leve 12000 DPI", categoria: "Perifericos", preco: 249.90, imagem: "https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=400&q=80" },
    { id: 6, nome: "SSD 1TB M.2 NVMe Kingston", categoria: "Hardware", preco: 449.00, imagem: "http://googleusercontent.com/image_collection/image_retrieval/9650731701016166186" },
    { id: 7, nome: "Headset Gamer 7.1 Surround Pro", categoria: "Perifericos", preco: 379.90, imagem: "https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?w=400&q=80" },
    { id: 8, nome: "Processador AMD Ryzen 5 5600", categoria: "Hardware", preco: 849.90, imagem: "https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=400&q=80" },
    { id: 9, nome: "Roteador Wi-Fi 6 c/ VPN Nativa", categoria: "Seguranca", preco: 849.00, imagem: "https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=400&q=80" },
    { id: 10, nome: "Placa de Vídeo RTX 4060 8GB", categoria: "Hardware", preco: 2099.00, imagem: "https://images.unsplash.com/photo-1591488320449-011701bb6704?w=400&q=80" }
];

// ==========================================
// MANIPULAÇÃO DE DOM (Renderização e Filtros)
// ==========================================
const containerProdutos = document.getElementById('produtos-container');
const selectFiltro = document.getElementById('filtro-categoria');
const selectOrdenacao = document.getElementById('ordenacao');

// Função para formatar moeda
const formatarMoeda = (valor) => {
    return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
};

// Função para renderizar os produtos na tela
const renderizarProdutos = (lista) => {
    if (!containerProdutos) return; // Só executa se estiver na página index
    
    containerProdutos.innerHTML = ''; // Limpa a lista atual
    
    lista.forEach(produto => {
        const li = document.createElement('li');
        li.className = 'card-produto';
        li.innerHTML = `
            <img src="${produto.imagem}" alt="${produto.nome}">
            <div class="card-info">
                <span class="categoria">${produto.categoria}</span>
                <h3>${produto.nome}</h3>
                <p class="preco">${formatarMoeda(produto.preco)}</p>
                <button class="btn-secundary" onclick="adicionarAoCarrinho(${produto.id})">Adicionar à Lista</button>
            </div>
        `;
        containerProdutos.appendChild(li);
    });
};

// Eventos de Filtro e Ordenação
if (selectFiltro && selectOrdenacao) {
    const atualizarVitrine = () => {
        let listaFiltrada = produtos;
        const categoria = selectFiltro.value;
        const ordem = selectOrdenacao.value;

        // Filtro
        if (categoria !== 'todos') {
            listaFiltrada = produtos.filter(p => p.categoria === categoria);
        }

        // Ordenação
        if (ordem === 'menor') {
            listaFiltrada.sort((a, b) => a.preco - b.preco);
        } else if (ordem === 'maior') {
            listaFiltrada.sort((a, b) => b.preco - a.preco);
        }

        renderizarProdutos(listaFiltrada);
    };

    selectFiltro.addEventListener('change', atualizarVitrine);
    selectOrdenacao.addEventListener('change', atualizarVitrine);
    
    // Renderiza inicialmente
    renderizarProdutos(produtos);
}

// ==========================================
// ARMAZENAMENTO LOCAL (Simulação de Carrinho)
// ==========================================
let carrinho = JSON.parse(localStorage.getItem('gtech_carrinho')) || [];

const adicionarAoCarrinho = (id) => {
    const produto = produtos.find(p => p.id === id);
    carrinho.push(produto);
    localStorage.setItem('gtech_carrinho', JSON.stringify(carrinho));
    alert(`${produto.nome} adicionado à sua lista de interesse!`);
};

// Função para renderizar o carrinho na tela
const renderizarCarrinho = () => {
    const listaCarrinho = document.getElementById('lista-carrinho');
    if (!listaCarrinho) return; // Só executa se estiver na página carrinho.html

    listaCarrinho.innerHTML = '';

    if (carrinho.length === 0) {
        listaCarrinho.innerHTML = '<p>Sua lista está vazia.</p>';
        return;
    }

    let total = 0;

    carrinho.forEach((produto, index) => {
        total += produto.preco;
        const li = document.createElement('li');
        li.style.display = 'flex';
        li.style.justifyContent = 'space-between';
        li.style.alignItems = 'center';
        li.style.padding = '10px 0';
        li.style.borderBottom = '1px solid #eee';
        
        li.innerHTML = `
            <div style="display: flex; align-items: center; gap: 15px;">
                <img src="${produto.imagem}" alt="${produto.nome}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                <div>
                    <h4 style="margin: 0;">${produto.nome}</h4>
                    <span style="color: #666; font-size: 0.9em;">${formatarMoeda(produto.preco)}</span>
                </div>
            </div>
            <button onclick="removerDoCarrinho(${index})" style="background: transparent; border: none; color: #dc3545; cursor: pointer; padding: 5px; font-weight: bold;">Remover</button>
        `;
        listaCarrinho.appendChild(li);
    });

    // Adiciona o valor total no final da lista
    const liTotal = document.createElement('li');
    liTotal.style.marginTop = '20px';
    liTotal.style.textAlign = 'right';
    liTotal.style.fontWeight = 'bold';
    liTotal.style.fontSize = '1.2rem';
    liTotal.innerHTML = `Total: ${formatarMoeda(total)}`;
    listaCarrinho.appendChild(liTotal);
};

// Função para remover apenas um item do carrinho
const removerDoCarrinho = (index) => {
    carrinho.splice(index, 1);
    localStorage.setItem('gtech_carrinho', JSON.stringify(carrinho));
    renderizarCarrinho(); // Atualiza a tela após remover
};

// Função para limpar todos os itens
const limparCarrinho = () => {
    carrinho = [];
    localStorage.setItem('gtech_carrinho', JSON.stringify(carrinho));
    renderizarCarrinho(); // Atualiza a tela após limpar
};

// Renderiza o carrinho assim que a página carrega
renderizarCarrinho();

// ==========================================
// VALIDAÇÃO DE FORMULÁRIO (Cliente-side)
// ==========================================
const formContato = document.querySelector('.contato-form');
const inputTelefone = document.getElementById('telefone');

if (inputTelefone) {
    // Máscara de Telefone Simples (Ex: (21) 99999-9999)
    inputTelefone.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
        if (valor.length > 11) valor = valor.slice(0, 11); // Limita a 11 dígitos
        
        if (valor.length > 2) {
            valor = `(${valor.slice(0, 2)}) ${valor.slice(2)}`;
        }
        if (valor.length > 9) {
            valor = `${valor.slice(0, 10)}-${valor.slice(10)}`;
        }
        e.target.value = valor;
    });
}

if (formContato) {
    formContato.addEventListener('submit', function (e) {
        let formValido = true;
        const msgErro = document.getElementById('erro-feedback');
        msgErro.innerHTML = '';

        // Prevenção de envio padrão para validar via JS
        e.preventDefault();

        // Validação customizada de Nome (mínimo de palavras)
        const nome = document.getElementById('nome').value.trim();
        if (nome.split(' ').length < 2) {
            msgErro.innerHTML += '<p>Por favor, insira seu nome completo.</p>';
            formValido = false;
        }

        // Validação de Telefone (tamanho mínimo após máscara)
        if (inputTelefone.value.length < 14) {
            msgErro.innerHTML += '<p>Insira um telefone válido com DDD.</p>';
            formValido = false;
        }

        // Se válido, simula o envio e exibe pop-up de feedback
        if (formValido) {
            alert('Mensagem validada com sucesso via JavaScript! Preparando envio...');
            formContato.submit(); // Libera o envio real
        } else {
            msgErro.style.color = 'red';
            msgErro.style.marginBottom = '15px';
        }
    });
}