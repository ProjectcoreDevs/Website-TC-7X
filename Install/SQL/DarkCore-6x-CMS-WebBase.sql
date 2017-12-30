-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.28-log - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de table website. bugtracker
CREATE TABLE IF NOT EXISTS `bugtracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `autor` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL DEFAULT 'images/icons/bugicon.jpg',
  `solved` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `so_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. char_titles
CREATE TABLE IF NOT EXISTS `char_titles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. forum_category
CREATE TABLE IF NOT EXISTS `forum_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. forum_forums
CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. forum_topics
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `autor` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL DEFAULT 'images/forum/icons/topic.jpg',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. gm_application
CREATE TABLE IF NOT EXISTS `gm_application` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `a1` varchar(50) NOT NULL,
  `a2` varchar(50) NOT NULL,
  `a3` varchar(50) NOT NULL,
  `a4` text NOT NULL,
  `a5` text NOT NULL,
  `a6` text NOT NULL,
  `a7` text NOT NULL,
  `a8` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. guides
CREATE TABLE IF NOT EXISTS `guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `link` text,
  `link_body` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. item_display
CREATE TABLE IF NOT EXISTS `item_display` (
  `displayid` bigint(20) NOT NULL,
  `icon_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `autor_avatar` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. rules
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_title` varchar(50) NOT NULL DEFAULT '0',
  `body` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. spell_description
CREATE TABLE IF NOT EXISTS `spell_description` (
  `spellid` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. topic_comments
CREATE TABLE IF NOT EXISTS `topic_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. vote_logs
CREATE TABLE IF NOT EXISTS `vote_logs` (
  `account` int(11) NOT NULL,
  `site` int(11) NOT NULL,
  `voted` bigint(20) DEFAULT NULL,
  `expire` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`account`,`site`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.


-- Export de la structure de table website. vote_sites
CREATE TABLE IF NOT EXISTS `vote_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `link` varchar(500) NOT NULL,
  `postback` varchar(25) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `end_week_points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- L'exportation de données n'était pas sélectionnée.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
