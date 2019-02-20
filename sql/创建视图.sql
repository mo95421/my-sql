CREATE VIEW v_inststu(Iname, Istu)
AS
SELECT Iname, COUNT(Sno)
FROM si, institute
WHERE si.Ino = institute.Ino
GROUP BY institute.Ino;

/* 自定义视图，为了前端操作方便，不在要求之内。 */
CREATE TABLE IF NOT EXISTS `v_class` (
`Cno` char(7)
,`Cmajor` varchar(30)
,`Cyear` int(11)
,`Cdept` varchar(30)
,`Cstu` int(11)
);

CREATE TABLE IF NOT EXISTS `v_student` (
`Sno` char(11)
,`Sname` varchar(30)
,`Sage` tinyint(3) unsigned
,`Sdept` varchar(30)
,`Sclass` char(7)
,`Sdorm` text
);
