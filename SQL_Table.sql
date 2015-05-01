CREATE TABLE TEACHER 
(
	TID	CHAR(11) NOT NULL,      #ID
	TNAME CHAR(8) NOT NULL,     #姓名
	TBIRTH CHAR(8),				#生日
	TSEX CHAR(2),				#性别
	TTITLE CHAR(10),			#职称
	TDEP CHAR(10),				#所属院系
	PRIMARY KEY(TID);
);

CREATE TABLE STUDENT
(
	SID CHAR(11) NOT NULL,		#ID
	SNAME CHAR(8) NOT NULL,		#姓名
	SBIRTH CHAR(8),				#生日
	SSEX CHAR(2),				#性别
	SDATE CHAR(8),				#入学日期
	SDEP CHAR(10),				#所属院系
	PRIMARY KEY(SID),
);

CREATE TABLE COURSE
(
	CID CHAR(11) NOT NULL,		#选课号
	CNAME CHAR(8) NOT NULL,		#课程名字
	CNUM INT,					#人数
	CREDIT INT,					#学分
	CDATE CHAR(8),				#考试日期
	CWAY CHAR(8),				#考试方式
	CTIME CHAR(8),				#上课时间
	CPLACE CHAR(8),				#上课地点
	CTEACH CHAR(11),			#授课老师
	PRIMARY KEY(CID),
	FOREIGN KEY(CTEACH) REFERENCES TEACHER(TID),
);

CREATE TABLE SC
(
	SID CHAR(11) NOT NULL,		#学号
	CID CHAR(11) NOT NULL,		#选课号
	SCORE INT,					#成绩
	SCDATE CHAR(8),				#时间
	PRIMARY KEY(SID, CID),
	FOREIGN KEY(SID) REFERENCES STUDENT(SID),
	FOREIGN KEY(CID) REFERENCES COURSE(CID),
);