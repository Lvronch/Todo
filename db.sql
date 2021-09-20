CREATE DATABASE IF NOT EXISTS todolist;
USE todolist;
DROP TABLE list;
CREATE TABLE IF NOT EXISTS list (
    Listid int(11) NOT NULL AUTO_INCREMENT,
    Title varchar(255),
    Comment varchar(2000),
    Checkbox boolean DEFAULT 0,
    Created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT list_pk_index PRIMARY KEY(listid)
);

