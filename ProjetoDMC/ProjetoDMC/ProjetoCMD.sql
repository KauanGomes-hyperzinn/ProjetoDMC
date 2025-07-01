-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS bd_construcao;
USE bd_construcao;

-- Tabela de Clientes
CREATE TABLE tb_cliente (
    cd_cliente INT PRIMARY KEY AUTO_INCREMENT,
    documento_cliente VARCHAR(20),
    nm_cliente VARCHAR(45),
    nr_telefone CHAR(11),
    email_cliente VARCHAR(45),
    nm_endereco VARCHAR(45),
    nr_endereco INT,
    nm_bairro VARCHAR(45)
);

-- Tabela de Fornecedores
CREATE TABLE tb_fornecedor (
    cd_fornecedor INT PRIMARY KEY AUTO_INCREMENT,
    documento_fornecedor VARCHAR(20),
    nm_fornecedor VARCHAR(45),
    nr_telefone CHAR(11),
    email_fornecedor VARCHAR(45),
    nm_endereco VARCHAR(45),
    nr_endereco INT,
    nm_bairro VARCHAR(45),
    nm_cidade VARCHAR(45)
);

-- Tabela de Depósitos
CREATE TABLE tb_deposito (
    cd_deposito INT PRIMARY KEY AUTO_INCREMENT,
    nm_deposito VARCHAR(45),
    nr_telefone VARCHAR(15),
    nm_bairro VARCHAR(45),
    nr_endereco INT,
    nm_endereco VARCHAR(45),
    nm_cidade VARCHAR(45)
);

-- Tabela de Produtos (com materiais de construção)
CREATE TABLE tb_produto (
    cd_produto INT PRIMARY KEY AUTO_INCREMENT,
    nm_produto VARCHAR(45),
    nm_marca_produto VARCHAR(45),
    vl_produto DECIMAL(10,2),
    ds_produto TEXT
);

-- Tabela de Estoque
CREATE TABLE tb_estoque (
    cd_estoque INT PRIMARY KEY AUTO_INCREMENT,
    qt_estoque INT,
    dt_estoque DATE,
    cd_produto INT,
    cd_deposito INT,
    FOREIGN KEY (cd_produto) REFERENCES tb_produto(cd_produto),
    FOREIGN KEY (cd_deposito) REFERENCES tb_deposito(cd_deposito)
);

-- Tabela de Pedidos
CREATE TABLE tb_pedido (
    cd_pedido INT PRIMARY KEY AUTO_INCREMENT,
    vl_total_pedido DECIMAL(10,2),
    dt_pedido DATE,
    cd_cliente INT,
    FOREIGN KEY (cd_cliente) REFERENCES tb_cliente(cd_cliente)
);
INSERT INTO tb_produto (nm_produto, nm_marca_produto, vl_produto, ds_produto) VALUES
('Cimento CP II 40kg', 'Votoran', 39.90, 'Cimento Portland para construção civil'),
('Tijolo Baiano', 'Cerâmica Forte', 1.10, 'Tijolo cerâmico para alvenaria'),
('Areia Lavada m³', 'AreiaMix', 120.00, 'Areia fina para reboco e acabamento'),
('Brita 1 m³', 'BritaSul', 95.00, 'Pedra britada para concreto e drenagem'),
('Vergalhão 12mm 12m', 'Gerdau', 119.00, 'Aço CA-50 nervurado para estruturas'),
('Bloco de Concreto 39x19x14cm', 'BlocoMix', 3.80, 'Bloco para alvenaria estrutural'),
('Caixa d\'água 500L', 'Fortlev', 299.90, 'Caixa d\'água de polietileno'),
('Tinta Acrílica 18L', 'Coral', 199.00, 'Tinta para pintura interna e externa'),
('Tubulação PVC 100mm 6m', 'Tigre', 89.00, 'Tubo para esgoto sanitário'),
('Rejunte Branco 1kg', 'Quartzolit', 10.50, 'Rejunte para cerâmicas e porcelanatos');
