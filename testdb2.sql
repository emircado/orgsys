CREATE TABLE IF NOT EXISTS `SchoolYear` (
	`syid` INTEGER AUTO_INCREMENT,
	`name` VARCHAR(9) NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT 1,
	`reqstatus` BOOLEAN NOT NULL DEFAULT 0,
	`deadline1` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	`deadline2` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	`startdate` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	`enddate` TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	CONSTRAINT `SchoolYearPK` PRIMARY KEY (`syid`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `Requirement` (
	`reqid` INTEGER AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`description` TEXT,
	`userid` SMALLINT(99) NOT NULL,
	`syid` INTEGER NOT NULL,
	CONSTRAINT `RequirementPK` PRIMARY KEY (`reqid`),
	CONSTRAINT `RequirementFKUser` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`),
	CONSTRAINT `RequirementFKSchoolYear` FOREIGN KEY (`syid`) REFERENCES `SchoolYear` (`syid`)
) ENGINE=InnoDB;

INSERT INTO `SchoolYear` (`syid`, `name`) VALUES 
(1, '2013-2014');

INSERT INTO `Requirement` (`name`, `description`, `userid`, `syid`) VALUES 
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