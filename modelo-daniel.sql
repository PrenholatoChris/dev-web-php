DROP DATABASE grafica;
CREATE DATABASE grafica;
USE grafica;

CREATE TABLE `products` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `description` VARCHAR(255),
  `stock` INTEGER,
  `price` DOUBLE,
  `ref` VARCHAR(11),
  `type` VARCHAR(1), 
  `category` VARCHAR(30)
);

CREATE TABLE `service_prop` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `price` DOUBLE,
  `type` VARCHAR(255),
  `service_id` INTEGER
);

CREATE TABLE `users` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `cpf` VARCHAR(11),
  `username` VARCHAR(255),
  `password` VARCHAR(255),
  `email` VARCHAR(255),
  `is_admin` BOOLEAN,
  `created_at` TIMESTAMP
);

CREATE TABLE `addresses` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `user_id` INTEGER,
  `postal_code` VARCHAR(255),
  `uf` VARCHAR(2),
  `city` VARCHAR(255),
  `street` VARCHAR(255),
  `complement` VARCHAR(255),
  `neighborhood` VARCHAR(255),
  `number` INTEGER,
  `phone` VARCHAR(11),
  `receiver` VARCHAR(255)
);

CREATE TABLE `items` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `product_id` INTEGER NOT NULL,
  `amount` INTEGER NOT NULL,
  `totalValue` float NOT NULL,
  `sale_id` INTEGER NOT NULL
);


CREATE TABLE `sales` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `address_id` INTEGER NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `totalValue` float NOT NULL,
  `status` varchar(15) NOT NULL
);

ALTER TABLE `addresses` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `items`
  ADD FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `sales` ADD FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);

INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("admin", "99999999999","$2y$10$V.4J0RupdVNqKszWaqMwNOpCn2NqjHIgKXwiV7MaxfqkAdKxASXCW", "admin@email", 1);
INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("chris", "99999999900", "$2y$10$yQcbF0A/d2vxKgC5t9VDRuDSbvrt8HumGXrWduyOJy0w2wJCsSht.", "chris@email", 0);
INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("daniel", "99999999901", "$2y$10$yUI2tyLB3Pger1K/mBYXZOLxy2GOB4GVtGoqtD7jfJIoxkBF6lY5y", "daniel@email", 0);
INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("tales", "99999959901", "$2y$10$fdUSxO3b8Uwz5sdqQSwgUOpERxrBrs3lnFe3LnCwnsvSdQQeQvrbC", "tales@email", 0);

INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("1", "29500000", "ES", "Alegre", "Rua Quinze de Agosto", "Casa", "Centro", "181", "27981711010", "Casa de alegre");
INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("2", "29500000", "ES", "Alegre", "Rua Quinze de Agosto", "Casa", "Centro", "171", "27981611010", "Casa de alegre");
INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("2", "29166894", "ES", "Vitoria", "Rua Algusto robert", "Apartamento", "Jardim da penha", "11", "27981611010", "Casa de vitoria");
INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("3", "29500000", "ES", "Alegre", "Rua Quinze de Agosto", "Casa", "Centro", "190", "27988711010", "Casa de alegre");

INSERT INTO `products` (name, description, stock, price, ref, type, category) VALUES ("daniel", "descricao do produto grande caro", 900, 99.99, "1", "p", "eu");
INSERT INTO `products` (name, description, stock, price, ref, type, category) VALUES ("daniel2.0", "Produto muito caro e gigantesco", 10, 999.99, "2", "p", "eu");
INSERT INTO `products` (name, description, stock, price, ref, type, category) VALUES ("Celular", "celular hightec de alta tecnologia", 2, 99.99, "3", "p", "eu");

INSERT INTO `products` (name, description, stock, price, ref, type, category) VALUES ("Impressao", "Impressão de documentos e imagens em diversos tamanhos", 0, 1, "a", "s", "impressao");
INSERT INTO `service_prop` (name, price, service_id, type) VALUES ("A4", 0.5, 4, "tamanho");
INSERT INTO `service_prop` (name, price, service_id, type) VALUES ("A3", 1, 4, "tamanho");
INSERT INTO `service_prop` (name, price, service_id, type) VALUES ("A2", 2, 4, "tamanho");

INSERT INTO `products` (name, description, stock, price, ref, type, category) VALUES ("Desenho Personalizado", "Fazemos desenhos personalizados a sua escolha e preferencia", 0, 50.50, "a", "s", "arte");
INSERT INTO `service_prop` (name, price, service_id, type) VALUES ("A4", 0, 5, "tamanho");
INSERT INTO `service_prop` (name, price, service_id, type) VALUES ("A3", 5, 5, "cor");