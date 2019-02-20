DELIMITER $
/* 创建临时存储过程 */
CREATE PROCEDURE checkstu()
BEGIN
/* 定义要使用的变量 */
DECLARE vDno int(11);
DECLARE vDname varchar(30);
DECLARE vOriginal int(11);
DECLARE vActual int(11);
DECLARE done INT DEFAULT 0;
/* 定义游标 */
DECLARE cur CURSOR FOR
  SELECT department.Dno, department.Dname, department.Dstu, COUNT(*)
  FROM student, class, department
  WHERE student.Sclass = class.Cno AND
    class.Cdept = department.Dno
  GROUP BY department.Dno;
/* 处理遍历结束 */
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done=1;
DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' SET done=1;
/* 创建临时表记录有变动的系 */
CREATE TABLE IF NOT EXISTS `fixstulog`(
  `Dno` int(11) NOT NULL COMMENT '系号',
  `Dname` varchar(30) NOT NULL COMMENT '系名',
  `Original` int(11) unsigned NOT NULL COMMENT '原始学生数',
  `Actual` int(11) NOT NULL COMMENT '实际学生数',
  PRIMARY KEY (`Dno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='检查学生数操作日志';
/* 打开游标 */
OPEN  cur;
REPEAT
  IF NOT done THEN
    FETCH NEXT FROM cur INTO vDno, vDname, vOriginal, vActual;
    /* 原始学生数与实际学生数不一致，加表更新并显示。 */
    IF vOriginal <> vActual THEN
      INSERT INTO fixstulog (`Dno`, `Dname`, `Original`, `Actual`) VALUES (vDno, vDname, vOriginal, vActual);
      UPDATE department
      SET Dstu = vActual
      WHERE Dno = vDno;
    END IF;
  END IF;
UNTIL done END REPEAT;
SELECT *
FROM fixstulog;
/* 关闭游标 */
CLOSE cur;
/* 删除临时表 */
DROP TABLE fixstulog;
END
$
DELIMITER ;
/* 调用临时存储过程 */
CALL checkstu();
/* 删除临时存储过程 */
DROP PROCEDURE checkstu;
