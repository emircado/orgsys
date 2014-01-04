-- Implementaiton of Database Design 1.2
-- by Emir Mercado
-- Dec 25, 2013

-- TABLE OF USER ROLES
CREATE TABLE IF NOT EXISTS `Role` (
	`roleid` SMALLINT(9),
	`name` VARCHAR(20) UNIQUE,
	CONSTRAINT `RolePK` PRIMARY KEY (`roleid`)
) ENGINE=InnoDB;

-- TABLE OF USERS
CREATE TABLE IF NOT EXISTS `User` (
	`userid` INTEGER AUTO_INCREMENT,
	`username` VARCHAR(20) UNIQUE NOT NULL,
	`name` VARCHAR(100) NOT NULL,
	`password` VARCHAR(20) NOT NULL,
	`roleid` SMALLINT(9) NOT NULL,
	`status` BOOLEAN DEFAULT 1,		--if disabled or not
	CONSTRAINT `UserPK` PRIMARY KEY (`userid`),
	CONSTRAINT `UserFK` FOREIGN KEY (`roleid`) REFERENCES `Role` (`roleid`)
) ENGINE=InnoDB;

INSERT INTO `Role` (`roleid`, `name`) VALUES
(1, 'Associate Dean'),
(2, 'Reviewer'),
(3, 'Unit Head');

INSERT INTO `User` (`username`, `name`, `password`, `roleid`) VALUES
('sirji', 'Ji Reyes', 'password', 0),
('dcshead', 'Cedric Festin', 'password', 2),
('eeeihead', 'Someone Cool', 'password', 2),
('reviewer1', 'Sir Mark', 'password', 1);