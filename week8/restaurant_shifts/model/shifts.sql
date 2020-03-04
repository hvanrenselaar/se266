/*
	Edit - Preferences - SQL Editor - Uncheck Safe Updates
        Query - Reconnect  to Server
*/
CREATE TABLE IF NOT EXISTS restaurant_employees (
	employeeId INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        employeeName VARCHAR(150) DEFAULT NULL
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO restaurant_employees (employeeName) VALUES ('Mickey Mouse');
INSERT INTO restaurant_employees (employeeName) VALUES ('Donald Duck');
INSERT INTO restaurant_employees (employeeName) VALUES ('Minnie Mouse');
INSERT INTO restaurant_employees (employeeName) VALUES ('Goofy');

CREATE TABLE restaurant_shifts (
	shiftId INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	employeeId INT unsigned,
    shiftNumber INT unsigned,
    shiftDay INT
);

INSERT INTO restaurant_shifts (employeeId, shiftNumber, shiftDay) VALUES (1, 1, 1);
INSERT INTO restaurant_shifts (employeeId, shiftNumber, shiftDay) VALUES (2, 2, 2);
INSERT INTO restaurant_shifts (employeeId, shiftNumber, shiftDay) VALUES (3, 1, 3);
INSERT INTO restaurant_shifts (employeeId, shiftNumber, shiftDay) VALUES (4, 1, 3);
INSERT INTO restaurant_shifts (employeeId, shiftNumber, shiftDay) VALUES (1, 2, 1);