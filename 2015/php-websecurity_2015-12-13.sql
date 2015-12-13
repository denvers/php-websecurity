# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`)
VALUES
	(1,'denver','Mijn-uber-moeilijke-password!##(*&#(@*#!&@3'),
	(2,'wassink','toegang'),
	(3,'henk','gehackt'),
	(4,'sjonnie','anita');