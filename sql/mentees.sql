CREATE TABLE `mentees` (
 `id` int unsigned NOT NULL ,
 `name` varchar(100) NOT NULL,
 `age` int unsigned NOT NULL,
 `email` varchar(100) NOT NULL,
 `location` varchar(100) ,
 `gender` varchar(100) ,
 `picture` varchar(100),
 `password` varchar(100) NOT NULL,
 PRIMARY KEY (`id`),
 FOREIGN KEY (`id`) REFERENCES members(`id`)

);
