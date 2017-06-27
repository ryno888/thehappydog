-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table loc_thehappydog.service
CREATE TABLE IF NOT EXISTS `service` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_title` varchar(256) NOT NULL DEFAULT '',
  `ser_website` varchar(256) NOT NULL DEFAULT '',
  `ser_contact_nr` varchar(256) NOT NULL DEFAULT '',
  `ser_email` varchar(256) NOT NULL DEFAULT '',
  `ser_location_link` varchar(256) NOT NULL DEFAULT '',
  `ser_location` text NOT NULL,
  `ser_details` text NOT NULL,
  `ser_is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table loc_thehappydog.service_file
CREATE TABLE `service_file` (
	`sef_id` INT(11) NOT NULL AUTO_INCREMENT,
	`sef_ref_service` INT(11) NULL DEFAULT NULL,
	`sef_ref_file` INT(11) NULL DEFAULT NULL,
	`sef_ref_file_thumb_tiny` INT(11) NULL DEFAULT NULL,
	`sef_ref_file_thumb_sm` INT(11) NULL DEFAULT NULL,
	`sef_ref_file_thumb_lg` INT(11) NULL DEFAULT NULL,
	`sef_type` TINYINT(4) NULL DEFAULT '0',
	PRIMARY KEY (`sef_id`),
	INDEX `fk_sef_ref_service` (`sef_ref_service`),
	INDEX `fk_sef_ref_file` (`sef_ref_file`),
	INDEX `fk_sef_ref_file_thumb_sm` (`sef_ref_file_thumb_sm`),
	INDEX `sef_ref_file_thumb_lg` (`sef_ref_file_thumb_lg`),
	INDEX `sef_ref_file_thumb_tiny` (`sef_ref_file_thumb_tiny`),
	CONSTRAINT `fk_sef_ref_file` FOREIGN KEY (`sef_ref_file`) REFERENCES `file` (`fil_id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `fk_sef_ref_file_thumb_sm` FOREIGN KEY (`sef_ref_file_thumb_sm`) REFERENCES `file` (`fil_id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `fk_sef_ref_service` FOREIGN KEY (`sef_ref_service`) REFERENCES `service` (`ser_id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `sef_ref_file_thumb_lg` FOREIGN KEY (`sef_ref_file_thumb_lg`) REFERENCES `file` (`fil_id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `sef_ref_file_thumb_tiny` FOREIGN KEY (`sef_ref_file_thumb_tiny`) REFERENCES `file` (`fil_id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=23
;


-- Data exporting was unselected.


-- Dumping structure for table loc_thehappydog.service_social
CREATE TABLE IF NOT EXISTS `service_social` (
  `ses_id` int(11) NOT NULL AUTO_INCREMENT,
  `ses_link` varchar(256) NOT NULL DEFAULT '',
  `ses_is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `ses_ref_service` int(11) DEFAULT NULL,
  PRIMARY KEY (`ses_id`),
  KEY `fk_ses_ref_service` (`ses_ref_service`),
  CONSTRAINT `fk_ses_ref_service` FOREIGN KEY (`ses_ref_service`) REFERENCES `service` (`ser_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

ALTER TABLE `service`
	ADD COLUMN `ser_type` TINYINT(4) NOT NULL DEFAULT '0' AFTER `ser_is_deleted`;
