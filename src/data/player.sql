CREATE SEQUENCE PLAYER_ID
  start 1
  increment 1;

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
