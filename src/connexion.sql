INSERT INTO PATTERN(pattern) VALUES('n');
INSERT INTO SCORE(score,id_pattern) VALUES(0,currval('PATTERN_ID'));
INSERT INTO PATTERN(pattern) VALUES('n');
INSERT INTO SCORE(score,id_pattern) VALUES(0,currval('PATTERN_ID'));
INSERT INTO PATTERN(pattern) VALUES('n');
INSERT INTO SCORE(score,id_pattern) VALUES(0,currval('PATTERN_ID'));
INSERT INTO PLAYER(pseudo,mail,password,id_score_tot,id_score_mon,id_score_week) VALUES("A REMPLIR","A REMPLIR","A REMPLIR",currval('SCORE_ID'),currval('SCORE_ID')-1,currval('SCORE_ID')-2);


INSERT INTO PATTERN(pattern) VALUES('n');
INSERT INTO SCORE(score,id_pattern) VALUES(0,currval('PATTERN_ID'));
INSERT INTO PATTERN(pattern) VALUES('n');
INSERT INTO SCORE(score,id_pattern) VALUES(0,currval('PATTERN_ID'));
INSERT INTO PATTERN(pattern) VALUES('n');
INSERT INTO SCORE(score,id_pattern) VALUES(0,currval('PATTERN_ID'));
INSERT INTO PLAYER(pseudo,mail,password,id_score_tot,id_score_mon,id_score_week) VALUES('TEST','TEST@TEST.fr','AAAAAAA',currval('SCORE_ID'),currval('SCORE_ID')-1,currval('SCORE_ID')-2);


SELECT a.id, i.nom AS intervenant, d.nom AS demandeur
FROM appel a INNER JOIN utilisateur i ON a.C_UTIL_INT = i.C_UTIL INNER JOIN utilisateur d ON a.C_UTIL_DEM = d.C_UTIL
WHERE a.C_EQUIPE='equipea';


SELECT pseudo, stot.score AS scoreTot, ptot.pattern AS patternTot, smon.score AS scoreMon, pmon.pattern AS patternMon, sweek.score AS scoreWeek, pweek.pattern AS patternWeek
FROM PLAYER INNER JOIN SCORE stot ON PLAYER.id_score_mon = stot.id_score INNER JOIN SCORE smon ON PLAYER.id_score_mon = smon.id_score INNER JOIN SCORE sweek ON PLAYER.id_score_mon = sweek.id_score
INNER JOIN PATTERN ptot ON stot.id_pattern = ptot.id_pattern INNER JOIN PATTERN pmon ON smon.id_pattern = pmon.id_pattern INNER JOIN PATTERN pweek ON sweek.id_pattern = pweek.id_pattern
WHERE pseudo = 'TEST';
