CREATE TABLE `messenger` (
  `SenderEmail` varchar(100) NOT NULL,
  `ReceiverEmail` varchar(100) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
