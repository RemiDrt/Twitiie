CREATE SEQUENCE PATTERN_ID
  start 1
  increment 1;

CREATE TABLE PATTERN (
  id_pattern    INTEGER DEFAULT nextval('PATTERN_ID') PRIMARY KEY,
  pattern       VARCHAR(50) NOT NULL
);
