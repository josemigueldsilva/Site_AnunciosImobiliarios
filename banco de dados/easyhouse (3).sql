-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2024 às 09:24
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `easyhouse`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imovel`
--

CREATE TABLE `imovel` (
  `id` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `situacao` varchar(15) NOT NULL,
  `pathImagem` varchar(100) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `contato` varchar(20) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imovel`
--

INSERT INTO `imovel` (`id`, `endereco`, `valor`, `cidade`, `estado`, `numero`, `situacao`, `pathImagem`, `descricao`, `contato`, `usuario_id`) VALUES
(18, 'Rua Araújo Leite, Centro', 5000, 'Bauru', 'SP', '26-60', 'Aluguel', 'arquivos/665e2113357c0.jpg', '3 banheiros, 3 quartos, 1 sala, 1 cozinha e 1 piscina', '(14) 98235-4523', 2),
(20, 'Rodrigues Alves, Centro', 2000000, 'Bauru', 'SP', '10-87', 'Venda', 'arquivos/665e621043111.jpg', '3 quartos, 5 banheiros, 1 cozinha, 1 sala e 1 piscina', '(14) 98657-4321', 1),
(24, 'Gustavo Maciel, Centro', 3000000, 'Bauru', 'SP', '18-45', 'Venda', 'arquivos/665ff5ccf1d00.jpg', '2 quartos, 1 banheiro, 1 sala', '(14) 99988-7878', 1),
(25, 'Rua José Triglia, Vl. Augusta', 3500, 'Guarulhos', 'SP', '97', 'Aluguel', 'arquivos/665ff686e5f84.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(11) 93562-5342', 1),
(26, 'Avenida Tiradentes, Bom Clima', 5000000, 'Guarulhos', 'SP', '3000', 'Venda', 'arquivos/665ff7b633ecb.jpg', 'Garagem para 2 carros, 1 sala, 1 cozinha, 3 quartos e 3 banheiros', '(14) 98765-4555', 1),
(27, 'Avenida Paulo Faccini, Macedo', 4000, 'Guarulhos', 'SP', '1900', 'Aluguel', 'arquivos/665ff85ba9cd2.jpg', '1 sala, 1 cozinha, 3 quartos, 3 banheiros', '(14) 99333-7654', 2),
(28, 'Rua Dr. Quirino, Centro', 600000, 'Campinas', 'SP', '800', 'Venda', 'arquivos/665ff955885dd.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-4388', 2),
(29, 'Rua José Paulino, Centro', 2300, 'Campinas', 'SP', '1300', 'Aluguel', 'arquivos/665ffb1d2f22a.jpg', '3 quartos, 1 sala, 1 cozinha, 2 banheiros e 1 piscina', '(14) 98733-7654', 7),
(30, 'Avenida Barão de Itapura, Jd. Guanabara', 300001, 'Campinas', 'SP', '1900', 'Venda', 'arquivos/665ffaab50749.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-5555', 7),
(31, 'Avenida Presidente Kennedy, Centro', 1500, 'São Gonçalo', 'RJ', '4250', 'Aluguel', 'arquivos/665ffc179c373.jpg', '3 quartos, 1 sala, 1 cozinha e 1 piscina', '(14) 98765-4311', 7),
(32, 'Rua Doutor Nilo Peçanha, Centro', 54000, 'São Gonçalo', 'RJ', '520', 'Venda', 'arquivos/665ffc7c5e857.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-6333', 8),
(33, 'Avenida Maricá, Bairro Alcântara', 1200, 'São Gonçalo', 'RJ', '2100', 'Aluguel', 'arquivos/665fffad85d3c.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-3333', 8),
(34, 'Avenida Governador Roberto Silveira, Centro', 670000, 'Nova Iguaçu', 'RJ', '1350', 'Venda', 'arquivos/6660002eabf96.jpg', '2 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-3321', 8),
(35, 'Rua Coronel Bernardino de Melo, Centro', 2300, 'Nova Iguaçu', 'RJ', '2150', 'Aluguel', 'arquivos/666000cb562f1.jpg', '2 quartos, 2 salas, 1 cozinha e 1 banheiro', '(14) 98765-4222', 1),
(36, 'Rua Nilo Peçanha, Centro', 560000, 'Nova Iguaçu', 'RJ', '250', 'Venda', 'arquivos/6660015224815.jpg', '5 quartos, 1 sala, 1 cozinha e 3 banheiros', '(14) 99988-6999', 1),
(37, 'Avenida Joaquim da Costa Lima, Centro', 2000000, 'Belford Roxo', 'RJ', '2300', 'Venda', 'arquivos/66600260025e1.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-2222', 2),
(38, 'Rua José Mariano dos Passos, Centro', 1500, 'Belford Roxo', 'RJ', '500', 'Aluguel', 'arquivos/6660029f2aa8e.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-4321', 2),
(39, 'Avenida Automóvel Clube, Centro', 6000000, 'Belford Roxo', 'RJ', '950', 'Venda', 'arquivos/666002da50831.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-8887', 2),
(40, 'Avenida Champagnat, Centro', 500000, 'Vila Velha', 'ES', '515', 'Venda', 'arquivos/666003df099a3.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-4122', 7),
(41, 'Rua Henrique Moscoso, Praia da Costa', 4500, 'Vila Velha', 'ES', '315', 'Aluguel', 'arquivos/6660043b1c5fc.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-2333', 7),
(42, 'Rua Luciano das Neves, Glória', 700000, 'Vila Velha', 'ES', '820', 'Venda', 'arquivos/6660049a431f1.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-6542', 7),
(43, 'Av. Nossa Senhora da Penha, Sta. Lúcia', 3200, 'Vitória', 'ES', '1495', 'Aluguel', 'arquivos/666005690fc35.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-8888', 8),
(44, 'Rua Sete de Setembro, Centro', 460000, 'Vitória', 'ES', '100', 'Venda', 'arquivos/666005ca322f2.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 92232-9821', 8),
(45, 'Avenida Fernando Ferrari, Goiabeiras', 1200, 'Vitória', 'ES', '1080', 'Aluguel', 'arquivos/66600633e349d.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-3432', 8),
(46, 'Avenida Jones dos Santos Neves, Centro', 500000, 'São Mateus', 'ES', '1240', 'Venda', 'arquivos/6660069b9f70b.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-1234', 1),
(47, 'Rua Coronel Constantino Cunha, Centro', 1230, 'São Mateus', 'ES', '55', 'Aluguel', 'arquivos/6660070e850a2.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-6378', 1),
(48, 'Rua Joaquim Fonseca, Boa Vista', 3400, 'São Mateus', 'ES', '30', 'Aluguel', 'arquivos/6660078994d27.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-2227', 1),
(49, 'Avenida Afonso Pena, Centro', 5000, 'Belo Horizonte', 'MG', '1000', 'Aluguel', 'arquivos/66600835cd6fb.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-1233', 2),
(50, 'Rua da Bahia, Lourdes', 600000, 'Belo Horizonte', 'MG', '1200', 'Venda', 'arquivos/6660088239835.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-8743', 2),
(51, 'Avenida Contorno, Funcionários', 2200, 'Belo Horizonte', 'MG', '9000', 'Aluguel', 'arquivos/666008dc343b3.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-1832', 2),
(52, 'Avenida João Naves de Ávila, Santa Mônica', 300000, 'Uberlândia', 'MG', '2121', 'Venda', 'arquivos/66600950907ec.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-1832', 7),
(53, 'Rua Duque de Caxias, Centro', 20000, 'Uberlândia', 'MG', '650', 'Aluguel', 'arquivos/66600995806aa.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-6151', 7),
(54, 'Avenida Rondon Pacheco, Cazeca', 400000, 'Uberlândia', 'MG', '5000', 'Venda', 'arquivos/666009e593242.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-1337', 7),
(55, 'Avenida Barão do Rio Branco, Centro', 2200, 'Valinhos', 'MG', '2000', 'Aluguel', 'arquivos/66600a5096bff.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-4738', 8),
(56, 'Rua Halfeld, Centro', 3000, 'Valinhos', 'MG', '600', 'Aluguel', 'arquivos/66600ac2e8b5c.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 98765-1321', 8),
(57, 'Av. Presidente Itamar Franco, São Mateus', 500000, 'Valinhos', 'MG', '1800', 'Venda', 'arquivos/66600bca19017.jpg', '3 quartos, 1 sala, 1 cozinha e 1 banheiro', '(14) 99988-1372', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `usuario`, `senha`, `nome`, `celular`) VALUES
(1, 'gabriel@gmail.com', 'gabriel123', 'Gabriel', '(14) 91234-6538'),
(2, 'jose@gmail.com', 'jose123', 'José', '(14) 97654-8124'),
(7, 'escobar@gmail.com', 'TeAmoAbelFerreira', 'Escobar', '(14) 51515-1515'),
(8, 'chen@gmail.com', 'taiwan', 'Chenaldo', '(44) 97654-2326'),
(13, 'teste@gmail.com', '123', 'Teste', '(14) 97654-3212'),
(14, 'teste2@gmail.com', '123', 'teste2', '(14) 98762-5432');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_adm`
--

CREATE TABLE `login_adm` (
  `id_ADM` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login_adm`
--

INSERT INTO `login_adm` (`id_ADM`, `codigo`, `senha`) VALUES
(1, '010623031', '12345678'),
(2, '010623018', '87654321');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`usuario_id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login_adm`
--
ALTER TABLE `login_adm`
  ADD PRIMARY KEY (`id_ADM`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `login_adm`
--
ALTER TABLE `login_adm`
  MODIFY `id_ADM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
