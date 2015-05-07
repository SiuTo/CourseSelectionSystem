use CourseSelect;

INSERT INTO DEPARTMENT 
	VALUES('0713', '计算机学院', '王晓阳'),
		  ('0024', '保密管理学院', '薛向阳'),
		  ('1024', '软件学院', '汪卫');

INSERT INTO STUDENT 
	VALUES('13307130227', '123456', '周吉', '1994-12-09', 'M', '2013', '0713'),
	      ('13307130200', '123456', '张三', '1994-02-19', 'F', '2013', '0713'),
	      ('13300240257', '123456', '李四', '1994-10-01', 'F', '2013', '0024'),
		  ('13307130319', 'qwerty', '梁晓涛', '1994-01-01', 'M', '2013', '1024'),
	      ('13310240217', '123456', '王尼玛', '1993-01-22', 'M', '2013', '1024');

INSERT INTO TEACHER 
	VALUES('100109', '123456', '李一', '1956-12-09', 'M', '教授', '0713'),
	      ('100112', '123456', '王三', '1958-02-19', 'F', '教授', '0713'),
	      ('100120', '123456', '胡四', '1970-10-01', 'F', '副教授', '0024'),
	      ('100111', '123456', '曹玛', '1978-01-22', 'M', '讲师', '1024');

INSERT INTO ADMIN 
	VALUES('1234567890', '123456', '龚洁', '1990-01-01', 'F');

INSERT INTO COURSE
	VALUES('CS.0001', '数据库', 50, 3, '100109'),
	      ('CS.0002', '离散数学', 50, 3, '100112'),
	      ('CS.0003', '计算机原理', 80, 4, '100111');

INSERT INTO SC 
	VALUES('13307130227', 'CS.0001', 80),
	      ('13307130227', 'CS.0002', 70),
	      ('13307130227', 'CS.0003', 90),
	      ('13307130200', 'CS.0001', 60),
	      ('13307130200', 'CS.0002', 55),
	      ('13307130200', 'CS.0003', 89),
	      ('13300240257', 'CS.0001', 99),
	      ('13310240217', 'CS.0001', 88),
	      ('13307130319', 'CS.0001', 60),
	      ('13307130319', 'CS.0002', 55),
	      ('13307130319', 'CS.0003', 89),
	      ('13310240217', 'CS.0002', 68);

INSERT INTO CSCHEDULE
	VALUES('CS.0001', 'WED 6-8', 'Z2311'),
	      ('CS.0002', 'MON 3-4', 'Z2201'),
	      ('CS.0002', 'MON 6-7', 'Z2301'),
	      ('CS.0003', 'TUE 6-8', 'Z2101');

