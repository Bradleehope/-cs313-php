CREATE DATABASE calendar;
\c calendar;

CREATE TABLE birthdays
(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(100) NOT NULL,
	month VARCHAR(20) NOT NULL,
	day INT NOT NULL,
	year INT, 
	address VARCHAR(100) NOT NULL,
	current_age INT
);

INSERT INTO birthdays(name, month, day, year, address, current_age) VALUES
	('Bradlee', 'October', 20, 1997, '5537 Cottontree Ln', '22');

CREATE USER project2 WITH PASSWORD 'pass';

GRANT SELECT, INSERT, UPDATE ON birthdays to project2;

GRANT USAGE, SELECT ON SEQUENCE birthdays_id_seq to project2;
