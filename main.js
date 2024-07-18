document.addEventListener("DOMContentLoaded", function() {
    const imagens = document.querySelectorAll('.banner__imagem');
    let indiceAtual = 0;

    function mostrarImagem(indice) {
        imagens.forEach((imagem, index) => {
            imagem.style.display = index === indice ? 'block' : 'none';
        });
    }

    function mudarImagem(direcao) {
        if (direcao === 'anterior') {
            indiceAtual = (indiceAtual === 0) ? imagens.length - 1 : indiceAtual - 1;
        } else {
            indiceAtual = (indiceAtual + 1) % imagens.length;
        }
        mostrarImagem(indiceAtual);
    }

    mostrarImagem(indiceAtual);

    document.getElementById('anterior').addEventListener('click', () => mudarImagem('anterior'));
    document.getElementById('proximo').addEventListener('click', () => mudarImagem('proximo'));

    setInterval(() => mudarImagem('proximo'), 2500);
});

function mostrarNomeArquivo(input) {
    const nomeArquivoSpan = document.getElementById('nome-arquivo-selecionado');
    if (input.files && input.files.length > 0) {
        nomeArquivoSpan.textContent = input.files[0].name;
    } else {
        nomeArquivoSpan.textContent = '';
    }
}

