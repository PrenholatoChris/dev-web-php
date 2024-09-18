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


);
-- , `is_product` INTEGER(1)

-- CREATE TABLE `services` (
--   `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
--   `name` VARCHAR(255),
--   `description` VARCHAR(255),
--   `image` BLOB
-- );

-- CREATE TABLE `types` (
--   `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
--   `description` VARCHAR(255),
--   `service_id` INTEGER
-- );

CREATE TABLE `product_sizes` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `product_id` INTEGER
);

-- IMPRESSAO
a4 e pretobranco

-- PRETO OU BRANCO
-- GRANDE OU PEQUENO



CREATE TABLE `service_prop` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `valor` VARCHAR(255),
  `service_id` INTEGER
);

CREATE TABLE `orders` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `user_id` INTEGER,
  `address_id` INTEGER,
  `date` TIMESTAMP
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

CREATE TABLE `order_products` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `product_id` INTEGER,
  `order_id` INTEGER,
  `quantity` INTEGER,
  `type` VARCHAR(255),
  `size` VARCHAR(255),
  `value_on_sell` DOUBLE
);

CREATE TABLE `order_services` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `service_id` INTEGER,
  `order_id` INTEGER,
  `quantity` INTEGER,
  `type` VARCHAR(255),
  `size` VARCHAR(255),
  `value_on_sell` DOUBLE
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
  --prop values
  `amount` INTEGER NOT NULL,
  `totalValue` float NOT NULL,
  `sale_id` INTEGER NOT NULL
);

prd_size(
  "id",
  "nome do tamanho",
  "prd_id",
)


CREATE TABLE `sales` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `address_id` INTEGER NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `saleDate` date NOT NULL,
  `totalValue` float NOT NULL
);

ALTER TABLE `addresses` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `orders` ADD FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);

ALTER TABLE `order_products` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
ALTER TABLE `order_products` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

-- ALTER TABLE `types` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

ALTER TABLE `product_sizes` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `order_services` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
-- ALTER TABLE `order_services` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

-- ALTER TABLE `service_sizes` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

ALTER TABLE `items`
  ADD FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `sales` ADD FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);

INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("admin", "99999999999","$2y$10$V.4J0RupdVNqKszWaqMwNOpCn2NqjHIgKXwiV7MaxfqkAdKxASXCW", "admin@email", 1);
INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("chris", "99999999900", "$2y$10$V.4J0RupdVNqKszWaqMwNOpCn2NqjHIgKXwiV7MaxfqkAdKxASXCW", "chris@email", 0);
INSERT INTO `users` (username, cpf, password, email, is_admin) VALUES ("daniel", "99999999901", "$2y$10$V.4J0RupdVNqKszWaqMwNOpCn2NqjHIgKXwiV7MaxfqkAdKxASXCW", "daniel@email", 0);

INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("1", "29500000", "ES", "Alegre", "Rua Quinze de Agosto", "Casa", "Centro", "181", "27981711010", "Casa de alegre");
INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("2", "29500000", "ES", "Alegre", "Rua Quinze de Agosto", "Casa", "Centro", "171", "27981611010", "Casa de alegre");
INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("2", "29166894", "ES", "Vitoria", "Rua Algusto robert", "Apartamento", "Jardim da penha", "11", "27981611010", "Casa de vitoria");
INSERT INTO `addresses` (user_id, postal_code, uf, city, street, complement,neighborhood, number, phone, receiver) VALUES ("3", "29500000", "ES", "Alegre", "Rua Quinze de Agosto", "Casa", "Centro", "190", "27988711010", "Casa de alegre");

INSERT INTO `products` (name, description, stock, price, ref, type) VALUES ("daniel", "descricao do produto grande caro", 900, 99.99, "1", "p");
INSERT INTO `products` (name, description, stock, price, ref, type) VALUES ("daniel2.0", "Produto muito caro e gigantesco", 10, 999.99, "2", "p");
INSERT INTO `products` (name, description, stock, price, ref, type) VALUES ("Celular", "celular hightec de alta tecnologia", 2, 99.99, "3", "p");