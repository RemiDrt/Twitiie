CREATE SEQUENCE PATTERN_ID
  start 1
  increment 1;

CREATE SEQUENCE SCORE_ID
  start 1
  increment 1;

CREATE SEQUENCE PLAYER_ID
  start 1
  increment 1;

CREATE TABLE PATTERN (
  id_pattern    INTEGER DEFAULT nextval('PATTERN_ID') PRIMARY KEY,
  pattern       VARCHAR(50) NOT NULL
);

CREATE TABLE SCORE (
  id_score      INTEGER DEFAULT nextval('SCORE_ID') PRIMARY KEY,
  score         INTEGER NOT NULL,
  id_pattern    INTEGER NOT NULL,
  CONSTRAINT cirIdChoice FOREIGN KEY(id_pattern) REFERENCES PATTERN
);

CREATE TABLE PLAYER (
  id_player     INTEGER DEFAULT nextval('PLAYER_ID') PRIMARY KEY,
  pseudo        VARCHAR(25) NOT NULL,
  mail          VARCHAR(40) NOT NULL,
  password      VARCHAR(40) NOT NULL,
  id_score_tot  INTEGER,
  id_score_mon  INTEGER,
  id_score_week INTEGER,
  CONSTRAINT cirScoreTot FOREIGN KEY(id_score_tot) REFERENCES SCORE(id_score),
  CONSTRAINT cirScoreMon FOREIGN KEY(id_score_mon) REFERENCES SCORE(id_score),
  CONSTRAINT cirScoreWeek FOREIGN KEY(id_score_week) REFERENCES SCORE(id_score)
);
