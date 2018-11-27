CREATE TABLE `members` (
 `id` int unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `age` int unsigned NOT NULL,
 `email` varchar(100) NOT NULL,
 `location` varchar(100) ,
 `gender` varchar(100) ,
 `password` varchar(100) NOT NULL,
 `mentor` int unsigned NOT NULL,
 PRIMARY KEY (`id`)
);
