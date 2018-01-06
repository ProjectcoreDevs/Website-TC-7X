CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `battlenet_account` int(11) NOT NULL DEFAULT '0',
  `auth_account` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(50) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT '0',
  `register_date` int(11) DEFAULT NULL,
  `lastIP` varchar(50) DEFAULT NULL,
  `lastConnect` int(11) DEFAULT NULL,
  `isActive` int(11) DEFAULT '0',
  `isAdmin` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
