CREATE DATABASE mycode;
USE mycode;

CREATE TABLE IF NOT EXISTS mytable(
	id int unsigned NOT NULL AUTO_INCREMENT,
	mydate varchar(100) NOT NULL,
	amount int unsigned NOT NULL,
	percentage varchar(50) NOT NULL,
	fees varchar(50) NOT NULL,
	PRIMARY KEY (id)
);