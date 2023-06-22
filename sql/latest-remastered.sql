DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Beginning` varchar(100) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `parents`;
CREATE TABLE `parents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `family` varchar(100) DEFAULT NULL,
  `student_class` varchar(100) DEFAULT NULL,
  `student_class_number` int DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`student_class`, `student_class_number`) REFERENCES `students` (`class`, `class_number`)
);

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `family_name` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `class_number` int NOT NULL,
  `mail` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `English_absences` int NOT NULL DEFAULT '0',
  `Math_absences` int NOT NULL DEFAULT '0',
  `Bulgarian_absences` int NOT NULL DEFAULT '0',
  `Physical_Education_absences` int NOT NULL DEFAULT '0',
  `Music_absences` int NOT NULL DEFAULT '0',
  `English` int DEFAULT NULL,
  `Math` int DEFAULT NULL,
  `Bulgarian` int DEFAULT NULL,
  `Music` int DEFAULT NULL,
  `Data_bases_absences` int NOT NULL DEFAULT '0',
  `Software` int DEFAULT NULL,
  `Software_absences` int NOT NULL DEFAULT '0',
  `Web` int DEFAULT NULL,
  `Web_absences` int NOT NULL DEFAULT '0',
  `Systems` int DEFAULT NULL,
  `Systems_absences` int NOT NULL DEFAULT '0',
  `Mop` int DEFAULT NULL,
  `Mop_absences` int NOT NULL DEFAULT '0',
  `Physical_Education` int DEFAULT NULL,
  `Data_bases` varchar(45) DEFAULT NULL,
  `Programming` varchar(45) DEFAULT NULL,
  `Programming_absences` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(100) DEFAULT NULL,
  `English` varchar(100) DEFAULT NULL,
  `Bulgarian` varchar(100) DEFAULT NULL,
  `Math` varchar(100) DEFAULT NULL,
  `Programming` varchar(100) DEFAULT NULL,
  `Physical_Education` varchar(100) DEFAULT NULL,
  `Software` varchar(100) DEFAULT NULL,
  `Mop` varchar(100) DEFAULT NULL,
  `Data_bases` varchar(100) DEFAULT NULL,
  `Web` varchar(100) DEFAULT NULL,
  `Systems` varchar(100) DEFAULT NULL,
  `Music` varchar(100) DEFAULT NULL,
  FOREIGN KEY (`class`) REFERENCES `students` (`class`),
  FOREIGN KEY (`English`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Bulgarian`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Math`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Programming`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Music`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Software`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Web`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Systems`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Mop`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Physical_Education`) REFERENCES `teachers` (`mail`),
  FOREIGN KEY (`Data_bases`) REFERENCES `teachers` (`mail`),
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `family_name` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `class_teacher` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
  