DELIMITER $
CREATE TRIGGER t_insert_stu
AFTER INSERT ON student
FOR EACH ROW
BEGIN
UPDATE class
SET Cstu = (
  SELECT COUNT(*)
  FROM student
  WHERE Sclass = class.Cno);
UPDATE department
SET Dstu = (
    SELECT SUM(Cstu)
    FROM class
    WHERE Cdept = department.Dno);
END
$

CREATE TRIGGER t_delete_stu
AFTER DELETE  ON student
FOR EACH ROW
BEGIN
UPDATE class
SET Cstu = (
  SELECT COUNT(*)
  FROM student
  WHERE Sclass = class.Cno);
UPDATE department
SET Dstu = (
  SELECT SUM(Cstu)
  FROM class
  WHERE Cdept = department.Dno);
END
$
DELIMITER ;
