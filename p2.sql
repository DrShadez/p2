CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_admin` BIT,
  `passhash` varchar(255),
  `username` varchar(12),
  PRIMARY KEY (`id`)
);
