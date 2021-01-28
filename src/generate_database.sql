CREATE TABLE PATTERN(
  id_pattern NUMBER(10) PRIMARY,
  pattern VARCHA2(50) NOT NULL
);

CREATE TABLE SCORE(
  id_score NUMBER(10) PRIMARY KEY,
  score NUMBER(4) NOT NULL,
  id_pattern NUMBER(4) NOT NULL,
  CONSTRAINT cirIdChoice FOREIGN KEY(id_pattern) REFERENCES PATTERN
);

CREATE TABLE PLAYER(
  id_player NUMBER(10) PRIMARY KEY,
  pseudo VARCHAR2(25) NOT NULL,
  mail VARCHAR2(40) NOT NULL,
  password VARCHAR2(40) NOT NULL,
  id_score_tot NUMBER(10),
  id_score_mon NUMBER(10),
  id_score_week NUMBER(10),
  CONSTRAINT cirScoreTot FOREIGN KEY(id_score_tot) REFERENCES SCORE(id_score),
  CONSTRAINT cirScoreMon FOREIGN KEY(id_score_mon) REFERENCES SCORE(id_score),
  CONSTRAINT cirScoreWeek FOREIGN KEY(id_score_week) REFERENCES SCORE(id_score)
);
