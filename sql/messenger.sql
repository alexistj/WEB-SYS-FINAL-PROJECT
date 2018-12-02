CREATE TABLE `messenger` (
  `SenderID` int(11) NOT NULL,
  `ReceiverID` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
