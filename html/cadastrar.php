<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">

    <title>Cadastrar</title>
</head>
<body>
    <section class="cadastrar__container">
        <div>
            <a href="index.php">
            <img class="cadastrar__imagem" src="../img/Logo.png" alt="Logo Easy House"> </a>
        </div>

        <div>
            <p class="cadastrar__texto">Ao me Cadastrar, aceito os <strong class="cadastrar__texto__destaque"> Termos de uso </strong> 
            e <strong class="cadastrar__texto__destaque"> Política de <br> privacidade </strong> do Grupo EASY HOUSE, receber comunicações do <br>  
            EASY HOUSE e afirmo ter 18 anos ou mais. </p>
        </div>
        
        <form method="post" action="login_cadastro_salvar.php">
            <div>
                <div>
                    <label for="nome">Nome</label>
                </div>
                    <input class="cadastrar__nome" type="text" id="nome" name="nome" placeholder="ex: Chen" required>
            </div>

            <div>
                <div>
                    <label for="usuario">E-mail</label>
                </div>
                    <input class="cadastrar__email" type="email" id="usuario" name="usuario" placeholder="ex: chen@hotmail.com" required> 
            </div>

            <div>
                <div>
                    <label for="senha">Senha</label>
                </div>
                    <input class="cadastrar__senha" type="password" id="senha" name="senha" placeholder="ex: Taiwan_1234" required>
            </div>

            <div>
                <div>
                    <label for="celular">Celular</label>
                </div>
                    <input class="cadastrar__celular" type="tel" id="celular" name="celular" placeholder="ex: (dd) 99999999" required>
            </div>

            <div>
                <input class="cadastrar__botao__entrar" type="submit" value="CADASTRAR"> <a class = "cadastrar__botao__entrar" href="index.php">Voltar</a>
            </div>

            <p class="link__logar">Já possui uma conta? <a href="login.php">Entre aqui</a></p>

        </form>
    </section>
</body>
</html>