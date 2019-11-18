
CREATE TABLE if not exists test (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        dataone VARCHAR(100) DEFAULT NULL,
        datatwo VARCHAR(100)  DEFAULT NULL,
        date VARCHAR(100) DEFAULT NULL

        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO test (dataone, datatwo) VALUES ('test1', 'test2');
INSERT INTO test (dataone, datatwo) VALUES ('test3', 'test4');
