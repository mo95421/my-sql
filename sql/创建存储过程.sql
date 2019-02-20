DELIMITER $
CREATE PROCEDURE changeCno(in oCno char(7), in nCno char(7), out total int)
BEGIN
UPDATE class
SET Cno = nCno
WHERE Cno = oCno;
SELECT COUNT(*)
INTO total
FROM student
WHERE Sclass = nCno;
END
$
DELIMITER ;
