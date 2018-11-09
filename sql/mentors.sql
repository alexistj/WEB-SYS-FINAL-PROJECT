CREATE TABLE `mentors` (
 `id` int unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `age` int unsigned NOT NULL,
 `email` varchar(100) NOT NULL,
 `location` varchar(100) NOT NULL,
 `gender` varchar(100) NOT NULL,
 `picture` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `occupation` varchar(100) NOT NULL,
 `num_mentees` int unsigned NOT NULL,
 PRIMARY KEY (`id`)
);
