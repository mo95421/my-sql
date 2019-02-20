/* 系表 */
CREATE TABLE IF NOT EXISTS `department` (
  `Dno` int(2) NOT NULL COMMENT '系号',
  `Dname` varchar(30) NOT NULL COMMENT '系名',
  `Daddr` text NOT NULL COMMENT '系办公室地点',
  `Dstu` int(5) unsigned NOT NULL COMMENT '人数',
  `Ddorm` text NOT NULL COMMENT '宿舍区',
  PRIMARY KEY (`Dno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系';

/* 班级表 */
CREATE TABLE IF NOT EXISTS `class` (
  `Cno` char(7) NOT NULL COMMENT '班号',
  `Cmajor` varchar(30) NOT NULL COMMENT '专业名',
  `Cyear` int(4) NOT NULL COMMENT '入校年份',
  `Cdept` int(11) NOT NULL COMMENT '系号',
  `Cstu` int(3) NOT NULL COMMENT '人数',
  CHECK(`Cyear` > 1970 AND `Cyear` < 2100),
  PRIMARY KEY (`Cno`),
  FOREIGN KEY (`Cdept`) REFERENCES department(Dno)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='班级';

/* 学生表 */
CREATE TABLE IF NOT EXISTS `student` (
  `Sno` char(11) NOT NULL COMMENT '学号',
  `Sname` varchar(30) NOT NULL COMMENT '姓名',
  `Sage` tinyint(3) unsigned NOT NULL COMMENT '年龄',
  `Sclass` char(7) NOT NULL COMMENT '班号',
  CHECK(`Sage` > 0 AND `Sage` < 100),
  PRIMARY KEY (`Sno`),
  FOREIGN KEY (`Sclass`) REFERENCES class(Cno)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生';

/* 学会表 */
CREATE TABLE IF NOT EXISTS `institute` (
  `Ino` int(5) unsigned NOT NULL COMMENT '学会号',
  `Iname` varchar(30) NOT NULL COMMENT '学会名',
  `Iyear` int(4) NOT NULL COMMENT '成立年份',
  `Iaddr` text NOT NULL COMMENT '地点',
  CHECK(`Iyear` > 1970 AND `Iyear` < 2100),
  PRIMARY KEY (`Ino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学会';

/* 学生参加学会表 */
CREATE TABLE IF NOT EXISTS `si` (
  `Sno` char(11) NOT NULL COMMENT '学号',
  `Ino` int(11) unsigned NOT NULL COMMENT '学会号',
  `Jyear` int(4) NOT NULL COMMENT '入会年份',
  CHECK(`Jyear` > 1970 AND `Jyear` < 2100),
  PRIMARY KEY (`Sno`, `Ino`),
  FOREIGN KEY (`Sno`) REFERENCES student(Sno),
  FOREIGN KEY (`Ino`) REFERENCES institute(Ino)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='参加';
