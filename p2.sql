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
('donutbush', 'https://backyardgadget.com/wp-content/uploads/2018/12/round-bushes-in-rock-garden-1024x597.jpg'),
('spiralbush', 'https://www.homestratosphere.com/wp-content/uploads/PhenomHome/Images/Topiary/121689387.jpg'),
('mazebush', 'https://images-production.gardenvisit.com/uploads/images/15911/glendurgan_garden_118_jpg_original.jpg'),
('elephantbush', 'https://plantcaretoday.com/wp-content/uploads/topiary-art-elephants-150-t1-min-1024x538.jpeg'),
('heartbush', 'https://thumbs.dreamstime.com/b/green-bush-heart-shape-standing-line-nature-backgrond-54817509.jpg'),
('tallbush', 'https://www.thespruce.com/thmb/qB_EZAyyGuCLmGecx5yf4BJ3zpc=/2121x1414/filters:no_upscale():max_bytes(150000):strip_icc()/thujas-515317612-266bd8cf3f42419eb0718a2373215260.jpg');

CREATE TABLE IF NOT EXISTS `current_order`(
    `id` int NOT NULL AUTO_INCREMENT,
    `design` varchar(64),
    `img` varchar(255),
    PRIMARY KEY (`id`)

);
