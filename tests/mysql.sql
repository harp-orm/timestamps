DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `User` (`id`, `name`, `createdAt`, `updatedAt`)
VALUES
  (1, 'User 1', '2007-02-20 11:23:11', '2012-02-20 22:10:00');
