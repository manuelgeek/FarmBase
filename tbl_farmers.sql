CREATE TABLE IF NOT EXISTS `tbl_farmers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `farmer_posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `photo` (`photo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `tbl_consultants` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `message_posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  
  `description` varchar(500) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `photo` (`photo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `comment_posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `like` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `photo` (`photo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `message_fav` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` varchar(100) NOT NULL,
  
  `email` varchar(100) NOT NULL,

  `favourite` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `product_fav` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` varchar(100) NOT NULL,
  
  `email` varchar(100) NOT NULL,

  `favourite` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sent_messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT, 
  `name` varchar(100) NOT NULL,
  `senderEmail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `receiverEmail` varchar(100) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sent_messages_cons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT, 
  `name` varchar(100) NOT NULL,
  `senderEmail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `postID` varchar(100) NOT NULL,
  `receiverEmail` varchar(100) NOT NULL,
  `cartegory` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;