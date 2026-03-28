CREATE DATABASE bg_closet_gestao;


-- 1. Tabela de Usuários
CREATE TABLE usuarios (
   id SERIAL PRIMARY KEY,
   nome VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL UNIQUE,
   senha VARCHAR(255) NOT NULL
);
-- 2. Tabela de Clientes
CREATE TABLE clientes (
   id SERIAL PRIMARY KEY,
   nome VARCHAR(100) NOT NULL,
   telefone VARCHAR(20) NOT NULL
);
-- 3. Tabela de Produtos
CREATE TABLE produtos (
   id SERIAL PRIMARY KEY,
   nome_descricao VARCHAR(150) NOT NULL,
   categoria_produto VARCHAR(50) NOT NULL,
   marca VARCHAR(50),
   tamanho VARCHAR(10),
   valor_custo DECIMAL(10,2) NOT NULL,
   valor_venda DECIMAL(10,2) NOT NULL,
   quantidade_estoque INT NOT NULL
);
-- 4. Tabela de Categorias Financeiras
CREATE TABLE categorias_financeiras (
   id SERIAL PRIMARY KEY,
   nome VARCHAR(50) NOT NULL,
   tipo VARCHAR(20) NOT NULL
);
-- 5. Tabela de Vendas
CREATE TABLE vendas (
   id SERIAL PRIMARY KEY,
   cliente_id INT NOT NULL,
   data_venda DATE NOT NULL,
   valor_total DECIMAL(10,2) NOT NULL,
   status VARCHAR(20) NOT NULL,
   FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);
-- 6. Tabela de Itens da Venda
CREATE TABLE itens_venda (
   id SERIAL PRIMARY KEY,
   venda_id INT NOT NULL,
   produto_id INT NOT NULL,
   quantidade INT NOT NULL,
   preco_unitario DECIMAL(10,2) NOT NULL,
   status_item VARCHAR(20) NOT NULL,
   FOREIGN KEY (venda_id) REFERENCES vendas(id),
   FOREIGN KEY (produto_id) REFERENCES produtos(id)
);
-- 7. Tabela de Movimentação Financeira
CREATE TABLE movimentacao_financeira (
   id SERIAL PRIMARY KEY,
   categoria_id INT NOT NULL,
   venda_id INT,
   tipo_movimentacao VARCHAR(20) NOT NULL,
   valor DECIMAL(10,2) NOT NULL,
   data_ocorrencia DATE NOT NULL,
   descricao VARCHAR(255),
   FOREIGN KEY (categoria_id) REFERENCES categorias_financeiras(id),
   FOREIGN KEY (venda_id) REFERENCES vendas(id)
);

