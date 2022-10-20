CREATE TABLE test (
  id SERIAL PRIMARY KEY,
  last_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  name varchar(255) DEFAULT NULL,
  city varchar(25) DEFAULT NULL,
  state char(2) DEFAULT NULL,
  zip char(10) DEFAULT NULL
);
