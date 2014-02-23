-- TABLE OF USER ROLES
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
	`roleid` SMALLINT(9),
	`name` VARCHAR(20) UNIQUE,
	CONSTRAINT `rolePK` PRIMARY KEY (`roleid`)
) ENGINE=InnoDB;

INSERT INTO `role` (`roleid`, `name`) VALUES
(1, 'Associate Dean'),
(2, 'Reviewer'),
(3, 'Unit Head');

-- TABLE OF SCHOOLYEARS
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

-- DATA FOR TESTING
INSERT INTO `schoolyear` (`syid`, `name`) VALUES 
(1, '2013-2014');

-- TABLE OF USERS
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
	`userid` INTEGER AUTO_INCREMENT,
	`username` VARCHAR(20) UNIQUE NOT NULL,
	`name` VARCHAR(100) NOT NULL,
	`password` VARCHAR(20) NOT NULL,
	`email` VARCHAR(30) DEFAULT NULL,
	`roleid` SMALLINT(9) NOT NULL,
	`syid` INTEGER NOT NULL,
	`status` BOOLEAN DEFAULT 1,
	CONSTRAINT `userPK` PRIMARY KEY (`userid`),
	CONSTRAINT `userFKrole` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`),
	CONSTRAINT `userFKschoolyear` FOREIGN KEY (`syid`) REFERENCES `schoolyear` (`syid`)
) ENGINE=InnoDB;

INSERT INTO `user` (`username`, `name`, `password`, `roleid`, `syid`) VALUES
('sirji', 'Ji Reyes', 'password', 1, 1),
('dcshead', 'Sir Festin', 'password', 3, 1);

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

-- FOR TESTING
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
	`deptid` INTEGER AUTO_INCREMENT,
	`deptcode` VARCHAR(15) UNIQUE NOT NULL,
	`name` VARCHAR(100) UNIQUE NOT NULL,
	`userid` INTEGER NOT NULL,
	`syid` INTEGER NOT NULL,
	CONSTRAINT `departmentPK` PRIMARY KEY (`deptid`),
	CONSTRAINT `departmentFKuser` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
	CONSTRAINT `departmentFKschoolyear` FOREIGN KEY (`syid`) REFERENCES `schoolyear` (`syid`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
	`orgid` INTEGER AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`code` VARCHAR(20) NOT NULL,
	`viewkey` VARCHAR(10) UNIQUE NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT 1,
	`userid` INTEGER NOT NULL,
	`syid` INTEGER NOT NULL,
	CONSTRAINT `organizationPK` PRIMARY KEY (`orgid`),
	CONSTRAINT `organizationFKuser` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
	CONSTRAINT `organizationFKschoolyear` FOREIGN KEY (`syid`) REFERENCES `schoolyear` (`syid`)
) ENGINE=InnoDB;

-- DATA FOR TESTING
INSERT INTO `organization` (`name`, `code`, `viewkey`, `status`, `userid`, `syid`) VALUES 
('UP Association of Computer Science Majors', 'upcursor', 'key1', 1, 1, 1);