CREATE TABLE `mitarbeiter` (
	`u_id` int(11) NOT NULL AUTO_INCREMENT,
	`u_name` varchar(255) NOT NULL,
	`u_pwd` varchar(255) NOT NULL,
	`u_rights` int(11) NOT NULL,
	`u_mail` varchar(255) NOT NULL,
	`anrede` enum('Herr','Frau') NOT NULL DEFAULT 'Herr',
	`vorname` varchar(255) NOT NULL,
	`zweitname` varchar(255) NOT NULL,
	`nachname` varchar(255) NOT NULL,
	`gruppe` int(11) NOT NULL,
	`last_login` DATETIME NOT NULL,
	`last_change_pwd` DATE NOT NULL,
	PRIMARY KEY (`u_id`)
);

CREATE TABLE `kinder` (
	`k_id` bigint(20) NOT NULL AUTO_INCREMENT,
	`anrede` enum('Herr','Frau') NOT NULL DEFAULT 'Herr',
	`vorname` varchar(255) NOT NULL,
	`zweitname` varchar(255) NOT NULL,
	`nachname` varchar(255) NOT NULL,
	`eintritt` DATE NOT NULL,
	`vormund_1` bigint(20) NOT NULL,
	`vormund_2` bigint(20) NOT NULL,
	`gruppe` int(11) NOT NULL,
	PRIMARY KEY (`k_id`)
);

CREATE TABLE `vormund` (
	`v_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `anrede` enum('Herr','Frau') NOT NULL DEFAULT 'Herr',
	`vorname` varchar(255) NOT NULL,
	`zweitname` varchar(255) NOT NULL,
	`nachname` varchar(255) NOT NULL,
	`strasse` varchar(255) NOT NULL,
	`hausnummer` varchar(10) NOT NULL,
	`plz` varchar(10) NOT NULL,
	`ort` varchar(255) NOT NULL,
	`telefon` varchar(100) NOT NULL,
	`mobil` varchar(100) NOT NULL,
	`mail` varchar(100) NOT NULL,
	PRIMARY KEY (`v_id`)
);

CREATE TABLE `gruppen` (
	`g_id` bigint(20) NOT NULL AUTO_INCREMENT,
	`gruppen_name` varchar(255) NOT NULL,
	`standort_id` int(11) NOT NULL,
	PRIMARY KEY (`g_id`)
);

CREATE TABLE `standort` (
	`s_id` int(11) NOT NULL AUTO_INCREMENT,
	`s_id` varchar(255) NOT NULL,
	PRIMARY KEY (`s_id`)
);

CREATE TABLE `buchung` (
	`b_id` bigint(20) NOT NULL AUTO_INCREMENT,
	`date` DATE NOT NULL,
	`k_id` bigint(20) NOT NULL,
	PRIMARY KEY (`b_id`)
);

CREATE TABLE `urlaub` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`von` DATE NOT NULL,
	`bis` DATE NOT NULL,
	`u_id` bigint(20) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `kinder` ADD CONSTRAINT `kinder_fk0` FOREIGN KEY (`vormund_1`) REFERENCES `vormund`(`v_id`);

ALTER TABLE `kinder` ADD CONSTRAINT `kinder_fk1` FOREIGN KEY (`vormund_2`) REFERENCES `vormund`(`v_id`);

ALTER TABLE `kinder` ADD CONSTRAINT `kinder_fk2` FOREIGN KEY (`gruppe`) REFERENCES `gruppen`(`g_id`);

ALTER TABLE `gruppen` ADD CONSTRAINT `gruppen_fk0` FOREIGN KEY (`standort_id`) REFERENCES `standort`(`s_id`);

ALTER TABLE `buchung` ADD CONSTRAINT `buchung_fk0` FOREIGN KEY (`k_id`) REFERENCES `kinder`(`k_id`);

ALTER TABLE `urlaub` ADD CONSTRAINT `urlaub_fk0` FOREIGN KEY (`u_id`) REFERENCES `mitarbeiter`(`u_id`);

