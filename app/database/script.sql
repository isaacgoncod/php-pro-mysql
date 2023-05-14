DROP DATABASE IF EXISTS lumem;

CREATE DATABASE lumem CHARSET = UTF8 COLLATE utf8_general_ci;

USE lumem;

CREATE TABLE
  users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
  );

INSERT INTO
  users
VALUES
  (
    DEFAULT,
    "Isaac",
    "Gonçalves",
    "isaac@goncod",
    "abc123"
  );

INSERT INTO
  users
VALUES
  (
    DEFAULT,
    "Gustavo",
    "Gonçalves",
    "gustavo@goncod",
    "abc123"
  );

INSERT INTO
  users
VALUES
  (
    DEFAULT,
    "melissa",
    "Próspero",
    "melissa@goncod",
    "abc123"
  );

INSERT INTO
  users
VALUES
  (
    DEFAULT,
    "Bruno",
    "jokubauakas",
    "bruno@goncod",
    "abc123"
  );