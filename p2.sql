CREATE TABLE IF NOT EXISTS `user_info`(
  `id` int NOT NULL AUTO_INCREMENT,
  `is_admin` BOOLEAN,
  `passhash` varchar(255),
  `username` varchar(12),
  PRIMARY KEY (`id`)
);



CREATE TABLE IF NOT EXISTS `bushes`(
    `id` int NOT NULL AUTO_INCREMENT,
    `design` varchar(64),
    `img` varchar(255),
    PRIMARY KEY (`id`)

);

INSERT INTO `bushes`
(`design`, `img`)

VALUES
('sphere', 'linglong.jpg'),
('spiral', 'watersa.jpg'),
('maze', 'mazebsuh.jpg'),
('elephant', 'theelephants.jpg'),
('heart', 'heart.jpg'),
('tall', 'long.jpg');


CREATE TABLE IF NOT EXISTS `current_order`(
    `id` int NOT NULL AUTO_INCREMENT,
    `design` varchar(64),
    `img` varchar(255),
    `user` varchar(255),
    PRIMARY KEY (`id`)

);




CREATE TABLE IF NOT EXISTS `pastorders` (
  `id` in NOT NULL AUTO_INCREMENT,
  `username` varchar(12),
  `bushes_design` varchar(64),
  PRIMARY KEY (`id`)
);
