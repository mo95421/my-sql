/* 测试视图。 */
SELECT * FROM v_inststu;

/* 测试存储过程。 */
SET @tatal = 0;
CALL changeCno(1303018, 1303038, @total);
SELECT @total;

/* 测试脚本前设置虚假总人数。 */
UPDATE department SET Dstu=1000;
