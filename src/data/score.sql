CREATE SEQUENCE SCORE_ID
  start 1
  increment 1;

CREATE TABLE SCORE (
  id_score      INTEGER DEFAULT nextval('SCORE_ID') PRIMARY KEY,
  score         INTEGER NOT NULL,
  id_pattern    INTEGER NOT NULL,
  CONSTRAINT cirIdChoice FOREIGN KEY(id_pattern) REFERENCES PATTERN
);
