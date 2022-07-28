
CREATE TABLE IF NOT EXISTS `current_order`(
    `id` int NOT NULL AUTO_INCREMENT,
    `design` varchar(64),
    `img` varchar(255),
    `user` varchar(255),
    `cost` int(12),
    PRIMARY KEY (`id`)

);
