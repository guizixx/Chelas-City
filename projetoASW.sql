DROP TABLE IF EXISTS chat;
DROP TABLE IF EXISTS mensagem;
DROP TABLE IF EXISTS acao;
DROP TABLE IF EXISTS ocorrencia;
DROP TABLE IF EXISTS funcionario;
DROP TABLE IF EXISTS utilizador;

CREATE TABLE utilizador (
    id NUMERIC(9),
    email VARCHAR(40) UNIQUE NOT NULL,
    palavra_passe VARCHAR(25) NOT NULL,
    nif NUMERIC(9) NOT NULL,
    primeiro_nome_ut VARCHAR(15) NOT NULL,
    apelido_ut VARCHAR(15) NOT NULL,
    telemovel NUMERIC(9) NOT NULL,
    morada VARCHAR(50) NOT NULL,
--
    CONSTRAINT pk_utilizador
        PRIMARY KEY (id)
);

CREATE TABLE funcionario (
    id NUMERIC(9),
    primeiro_nome_fun VARCHAR(15) NOT NULL,
    apelido_fun VARCHAR(15) NOT NULL,
    telemovel NUMERIC(9) NOT NULL,

    CONSTRAINT pk_funcionario
        PRIMARY KEY(id)
);


CREATE TABLE ocorrencia (
    id NUMERIC(9),
    estado VARCHAR(40) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    categoria VARCHAR(40) NOT NULL,
    sub_categoria VARCHAR(40) NOT NULL,
    localizacao VARCHAR(50) NOT NULL,
    foto_ocorrencia NVARCHAR(1000) NOT NULL,
    id_utilizador NUMERIC(9) NOT NULL,
    id_funcionario NUMERIC(9),
    gravidade NUMERIC(2),
    urgencia NUMERIC(2),
    reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--
    CONSTRAINT pk_ocorrencia
PRIMARY KEY(id),
--  
    CONSTRAINT fk_ocorrencia_id_utilizador
FOREIGN KEY (id_utilizador)
    REFERENCES utilizador(id),
--
    CONSTRAINT fk_ocorrencia_id_funcionario
FOREIGN KEY (id_funcionario)
    REFERENCES funcionario(id),
--
    CONSTRAINT ck_ocorrencia_gravidade
        CHECK (0 > gravidade > 10),
--
    CONSTRAINT ck_ocorrencia_urgencia
        CHECK (0 > urgencia > 10)
);

CREATE TABLE acao (
    id NUMERIC(9),
    id_ocorrencia NUMERIC(9) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    data_acao DATETIME NOT NULL,
--
    CONSTRAINT pk_acao
        PRIMARY KEY(id),
--
    CONSTRAINT fk_acao_id_ocorrencia
FOREIGN KEY (id_ocorrencia)
    REFERENCES ocorrencia(id)
);

CREATE TABLE mensagem (
    id NUMERIC(9),
    data_mensagem DATETIME NOT NULL,
    id_funcionario NUMERIC(9) NOT NULL,
    id_utilizador NUMERIC(9) NOT NULL,
    mensagem VARCHAR(100) NOT NULL,
    emissor BIT NOT NULL, -- 0 se o emissor for o funcionário e 1 se o emissor for o utilizador/cliente

    CONSTRAINT pk_mensagem
PRIMARY KEY(id),

    CONSTRAINT fk_mensagem_id_utilizador
        FOREIGN KEY (id_utilizador)
        REFERENCES utilizador(id),

    CONSTRAINT fk_mensagem_id_funcionario
        FOREIGN KEY (id_funcionario)
        REFERENCES funcionario(id)
);

CREATE TABLE chat (
    id_chat NUMERIC(9),
    id_mensagem NUMERIC(9),

    CONSTRAINT pk_chat
        PRIMARY KEY(id_chat,id_mensagem),

    CONSTRAINT fk_chat_id_mensagem
        FOREIGN KEY (id_mensagem)
        REFERENCES mensagem(id)
);


INSERT INTO utilizador (id, email, palavra_passe, nif, primeiro_nome_ut, apelido_ut, telemovel, morada)
VALUES 
    (1, 'john@gmail.com', 'pass12world123', 123456789, 'John', 'Doe', 123456789, 'Rua Augusta, 100, 1100-053 Lisboa, Portugal'),
    (2, 'jane@gmail.com', 'pas19181sdae123', 987654321, 'Jane', 'Smith', 987654321, 'Avenida da Liberdade, 200, 1250-001 Lisboa, Portugal'),
    (3, 'alice@gmail.com', 'aliceppk10s', 345678912, 'Alice', 'Johnson', 345678912, 'Praça do Comércio, 1, 1100-148 Lisboa, Portugal'),
    (4, 'bob@gmail.com', 'bobp01923ss', 567891234, 'Bob', 'Williams', 567891234, 'Rua Garrett, 120, 1200-203 Lisboa, Portugal'),
    (5, 'emma@gmail.com', 'paswdead123', 789123456, 'Emma', 'Brown', 789123456, 'Avenida Infante Dom Henrique, 1950-376 Lisboa, Portugal'),
    (6, 'mike@gmail.com', 'pass123', 912345678, 'Mike', 'Jones', 912345678, 'Rua do Carmo, 150, 1200-093 Lisboa, Portugal'),
    (7, 'sara@gmail.com', 'xh123', 654321987, 'Sara', 'Garcia', 654321987, 'Rua de São Julião, 150, 1100-527 Lisboa, Portugal'),
    (8, 'david@gmail.com', 'padfdkpaedaexss123', 876543219, 'David', 'Lee', 876543219, 'Rua dos Douradores, 150, 1100-020 Lisboa, Portugal'),
    (9, 'lisa@gmail.com', '12345ooladeuas6', 987654321, 'Lisa', 'Martinez', 987654321, 'Praça Dom Pedro IV, 1100-201 Lisboa, Portugal'),
    (10, 'kevin@gmail.com', '6543daed21', 123456789, 'Kevin', 'Scott', 123456789, 'Rua do Alecrim, 200, 1200-018 Lisboa, Portugal');


INSERT INTO funcionario (id, primeiro_nome_fun, apelido_fun, telemovel)
VALUES 
    (1, 'Manel', 'Carvalho', 987654321),
    (2, 'Tomás', 'Pinto', 123456789),
    (3, 'Josué', 'Oliveira', 456789123),
    (4, 'Tiago', 'Maria', 789123456),
    (5, 'Guilherme', 'Lopes', 654321987),
    (6, 'Afonso', 'Batista', 321987654),
    (7, 'Miguel', 'Costa', 987654321),
    (8, 'Santiago', 'Miranda', 654987321),
    (9, 'Luís', 'Soares', 321456987),
    (10, 'Fernando', 'Ribeiro', 987654321);


INSERT INTO ocorrencia (id, estado, descricao, categoria, sub_categoria, localizacao, foto_ocorrencia, id_utilizador, id_funcionario, gravidade, urgencia)
VALUES 
    (1, 'registado', 'Buraco na Rua Augusta causa perigo para pedestres.', 'Manutenção de Infraestrutura', 'Buracos', 'Rua Augusta', 'RuaAugusta.jpg', 1, NULL, NULL, NULL),
    (2, 'aberto', 'Mau funcionamento da iluminação pública na Praça do Comércio.', 'Segurança Pública', 'Iluminação', 'Praça do Comércio', 'PraçadoComercio.jpg', 2, 1, 3, 8),
    (3, 'registado', 'Lixeiras transbordando ao longo da Avenida da Liberdade criando condições inestéticas.', 'Problemas Ambientais', 'Transbordo de lixo', 'Avenida da Liberdade', 'AvenidadaLiberdade.jpg', 3, NULL, NULL, NULL),
    (4, 'aberto', 'Vandalismo de grafite visto em prédios ao longo da Rua Garrett.', 'Segurança Pública', 'Vandalismo', 'Rua Garrett', 'RuaGarrett.jpg', 4, 2, 4, 6),
    (5, 'registado', 'Ladrilhos quebrados da Avenida Infante Dom Henrique causando risco de tropeços.', 'Manutenção de Infraestrutura', 'Danos de infraestruturas', 'Avenida Infante Dom Henrique', 'AvenidaInfanteDomHenrique.jpg', 5, NULL, NULL, NULL),
    (6, 'resolvido', 'Bancos de parque público danificados no Jardim da Estrela, afetando o conforto dos visitantes.', 'Manutenção de Infraestrutura', 'Danos de infraestururas', 'Jardim da Estrela', 'JardimdaEstrela.jpg', 6, 3, 5, 8),
    (7, 'registado', 'Congestionamento de trânsito relatado na Praça Dom Pedro IV em horário de pico.', 'Transporte e Trânsito', 'Trânsito', 'Praça Dom Pedro IV', 'PracaDomPedroIV.jpg', 7, NULL, NULL, NULL),
    (8, 'resolvido', 'Inundações observadas na Rua dos Douradores devido a fortes chuvas.', 'Problemas Ambientais', 'Inundações', 'Rua dos Douradores', 'RuadosDouradores.jpg', 8, 4, 2, 9),
    (9, 'registado', 'Perturbação sonora proveniente de obras na Rua do Carmo que afeta residentes próximos.', 'Qualidade de Vida e Bem-Estar Comunitário', 'Perturbação sonora', 'Rua do Carmo', 'RuadoCarmo.jpg', 9, NULL, NULL, NULL),
    (10, 'aberto', 'Atividade suspeita perto da estação ferroviária do Rossio, suscitando preocupações de segurança.', 'Segurança Pública', 'Assaltos', 'Estação ferroviária do Rossio', 'EstacaoferroviariadoRossio.jpg', 10, 5, 1, 7);

INSERT INTO acao (id, id_ocorrencia, descricao, data_acao)
VALUES 
    (1, 1, 'Pedido foi registado e em breve será visto.', '2024-03-13 10:00:00'),
    (2, 2, 'O processo de arranjo começa no dia 152024-03-.', '2024-03-12 11:00:00'),
    (3, 3, 'Pedido foi registado e em breve será visto.', '2024-03-13 12:00:00'),
    (4, 4, 'As autoridades foram chamadas e começaram a averiguar o caso.', '2024-03-11 13:00:00'),
    (5, 5, 'Pedido foi registado e em breve será visto.', '2024-03-14 14:00:00'),
    (6, 6, 'Os bancos de jardim já foram arranjados.', '2024-03-09 15:00:00'),
    (7, 7, 'Pedido foi registado e em breve será visto.', '2024-03-14 16:00:00'),
    (8, 8, 'Sistema de esgotos já conseguiu aliviar as inundações.', '2024-03-05 17:00:00'),
    (9, 9, 'Pedido foi registado e em breve será visto.', '2024-03-12 18:00:00'),
    (10, 10, 'As autoridades foram chamadas ao local.', '2024-03-10 19:00:00');


INSERT INTO mensagem (id, data_mensagem, id_funcionario, id_utilizador, mensagem, emissor)
VALUES 
    (1, '2024-03-10 12:00:00', 1, 2, 'Em relação ao buraco na Rua Augusta, qual é a estimativa de tempo que demore a ser resolvido?', 1),
    (2, '2024-03-10 12:50:00', 1, 2, 'Boa tarde, estimamos que em dez dias o problema esteja resolvido.', 0),
    (3, '2024-03-09 14:00:00', 3, 4, 'Recebeu uma nova notificação sobre o estado da ocorrencia.', 0),
    (4, '2024-03-16 15:00:00', 4, 3, 'Ainda não limparam os grafites, vai demorar muito?', 1),
    (5, '2024-03-17 16:00:00', 1, 5, 'Recebeu uma nova notificação sobre o estado da ocorrencia.', 0),
    (6, '2024-03-18 17:00:00', 2, 6, 'Boa tarde, não seria melhor meterem umas luzes mais brancas do que as que estão a colocar agora? Sempre melhoraria a iluminação.', 1),
    (7, '2024-03-19 18:00:00', 3, 7, 'Recebeu uma nova notificação sobre o estado da ocorrencia.', 0),
    (8, '2024-03-20 19:00:00', 4, 8, 'Recebeu uma nova notificação sobre o estado da ocorrencia.', 1),
    (9, '2024-03-21 20:00:00', 5, 9, 'Recebeu uma nova notificação sobre o estado da ocorrencia.', 0),
    (10, '2024-03-22 21:00:00', 6, 10, 'Obrigado por resolverem rápidamente este problema.', 1);
