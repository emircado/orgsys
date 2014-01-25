-- Implementaiton of Database Design 1.2
-- by Emir Mercado
-- Dec 25, 2013

-- TABLE OF USER ROLES
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
	`roleid` SMALLINT(9),
	`name` VARCHAR(20) UNIQUE,
	CONSTRAINT `rolePK` PRIMARY KEY (`roleid`)
) ENGINE=InnoDB;

-- TABLE OF USERS
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
	`userid` INTEGER AUTO_INCREMENT,
	`username` VARCHAR(20) UNIQUE NOT NULL,
	`name` VARCHAR(100) NOT NULL,
	`password` VARCHAR(20) NOT NULL,
	`email` VARCHAR(20) NOT NULL,
	`roleid` SMALLINT(9) NOT NULL,
	`status` BOOLEAN DEFAULT 1,
	CONSTRAINT `userPK` PRIMARY KEY (`userid`),
	CONSTRAINT `userFK` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`)
) ENGINE=InnoDB;

INSERT INTO `role` (`roleid`, `name`) VALUES
(1, 'Associate Dean'),
(2, 'Reviewer'),
(3, 'Unit Head');

INSERT INTO `user` (`username`, `name`, `password`, `roleid`) VALUES
('sirji', 'Ji Reyes', 'password', 1),
('dcshead', 'Cedric Festin', 'password', 3),
('eeeihead', 'Someone Cool', 'password', 3),
('reviewer1', 'Sir Mark', 'password', 2);

DROP TABLE IF EXISTS `schoolyear`;
CREATE TABLE IF NOT EXISTS `schoolyear` (
	`syid` INTEGER AUTO_INCREMENT,
	`name` VARCHAR(9) NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT 1,
	`reqstatus` BOOLEAN NOT NULL DEFAULT 0,
	`deadline1` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	`deadline2` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	`startdate` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	`enddate` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	CONSTRAINT `schoolyearPK` PRIMARY KEY (`syid`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `requirement`;
CREATE TABLE IF NOT EXISTS `Requirement` (
	`reqid` INTEGER AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`description` TEXT,
	`userid` INTEGER NOT NULL,
	`syid` INTEGER NOT NULL,
	CONSTRAINT `requirementPK` PRIMARY KEY (`reqid`),
	CONSTRAINT `requirementFKuser` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
	CONSTRAINT `requirementFKschoolyear` FOREIGN KEY (`syid`) REFERENCES `schoolyear` (`syid`)
) ENGINE=InnoDB;

INSERT INTO `schoolyear` (`syid`, `name`) VALUES 
(1, '2013-2014');

INSERT INTO `requirement` (`name`, `description`, `userid`, `syid`) VALUES 
('Report on previous AY\'s activities',
	'Description1||Description2||Description3||Description4',
	1, 1),
('Approved plan of activities for the incoming school year',
	'Description1||Description2||Description3||Description4',
	1, 1),
('Consent form of faculty adviser',
	'Description1||Description2||Description3||Description4',
	1, 1),
('List of org officers',
	'Description1||Description2||Description3||Description4',
	1, 1),
('List of members',
	'Description1||Description2||Description3||Description4',
	1, 1),
('Location plan of tambayan',
	'Description1||Description2||Description3||Description4',
	1, 1);

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
	`deptid` SMALLINT(19),
	`name` VARCHAR(100) UNIQUE,
	`userid` INTEGER NOT NULL
	CONSTRAINT `rolePK` PRIMARY KEY (`roleid`)
) ENGINE=InnoDB;