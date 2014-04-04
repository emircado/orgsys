-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2013 at 06:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `191test`
--
CREATE DATABASE IF NOT EXISTS `191test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `191test`;

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE IF NOT EXISTS `orgs` (
  `oid` int(11) NOT NULL,
  `orgname` varchar(50) NOT NULL,
  `deptid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`oid`, `orgname`, `deptid`, `status`) VALUES
(0, 'SharmOrg', 0, 1),
(1, 'EmirOrg', 1, 0),
(2, 'PatOrg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`rid`, `rname`, `description`) VALUES
(0, 'Report on Previous AY''s Activities', 'Attach to this report all documentary evidence (photographs, photocopies of certificates, receipts, etc.) of all accomplished activities. These evidence will be cited in the "Remarks" portion of each accomplished activity.\r\nFor unaccomplished activities, write under the "Remarks" heading the reason for non-accomplishment.\r\nSigned by current org head and noted by faculty adviser\r\nFormat is that of previous year''s proposed plan'),
(1, 'Approved Plan of Activities for the Incoming AY', 'Concerns all activities with parties outside of the organization (GA''s are not included)\r\nMust include Eng''g Week activities\r\nPresented first to unit heads for their comments, amendments, and subsequent approval\r\nSigned by org head, noted by faculty adviser and approved by the unit head\r\nSee format here'),
(2, 'Signed Consent of the Faculty Adviser', 'Listed duties and responsibilities of the adviser\r\nSigned by the adviser and noted by the unit head\r\nIf proposed adviser refuses to sign form, that person forfeits the privilege of being the faculty adviser\r\nSee form here'),
(3, 'List of Organization Officers', 'Complete list\r\nIncludes contact details (email addresses and mobile phone numbers)\r\nMust be updated in the 2nd sem\r\nWill be kept confidential'),
(4, 'List of Members ', 'Summarized list (names in alphabetical order) of ALL members\r\nInclude courses (for engg-wide orgs)\r\nForm 5 attached\r\nmust be updated in the 2nd semester\r\nWill be kept confidential by the ADSA\r\nDo not black-out schedules of members who belong to frats, sororities, and other groups'),
(5, 'Location Plan of Tambayan', 'Indicate actual location\r\nCite landmarks within tambayan vicinity\r\nArea measurements NOT included here (separate item, for Associate Dean of Administration requirements)');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `oid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`oid`, `rid`, `link`, `status`) VALUES
(0, 0, '#', 2),
(0, 1, '#', 2),
(0, 2, '#', 2),
(0, 3, '#', 2),
(0, 4, '#', 2),
(0, 5, '#', 2),
(1, 0, '#', 0),
(1, 1, '#', 1),
(1, 2, '#', 0),
(1, 3, '#', 0),
(1, 4, '#', 2),
(1, 5, '#', 0),
(2, 0, '#', 0),
(2, 1, '#', 0),
(2, 2, '#', 0),
(2, 3, '#', 0),
(2, 4, '#', 0),
(2, 5, '#', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
