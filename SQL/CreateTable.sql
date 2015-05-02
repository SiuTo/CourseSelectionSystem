USE CourseSelect;

CREATE TABLE DEPARTMENT
(
	DID VARCHAR(11) NOT NULL,		#ID
	DNAME VARCHAR(50) NOT NULL,		#部门名称
	MANAGER VARCHAR(50),			#院长
	PRIMARY KEY(DID)
);

CREATE TABLE TEACHER 
(
	TID	VARCHAR(11) NOT NULL,		#ID
	PASSWORD VARCHAR(20) NOT NULL,  #密码
	TNAME VARCHAR(50) NOT NULL,		#姓名
	TBIRTH DATE,					#生日
	TSEX CHAR(1),					#性别
	TTITLE VARCHAR(20),				#职称
	DID VARCHAR(11),				#所属院系
	PRIMARY KEY(TID),
	FOREIGN KEY(DID) REFERENCES DEPARTMENT(DID)
);

CREATE TABLE STUDENT
(
	SID VARCHAR(11) NOT NULL,		#ID
	PASSWORD VARCHAR(20) NOT NULL,  #密码
	SNAME VARCHAR(50) NOT NULL,		#姓名
	SBIRTH DATE,					#生日
	SSEX CHAR(1),					#性别
	SYEAR CHAR(4),					#入学年份
	DID VARCHAR(11),				#所属院系
	PRIMARY KEY(SID),
	FOREIGN KEY(DID) REFERENCES DEPARTMENT(DID)
);

CREATE TABLE ADMIN
(
	AID VARCHAR(11) NOT NULL,		#ID
	PASSWORD VARCHAR(20) NOT NULL,  #密码
	ANAME VARCHAR(50) NOT NULL,		#姓名
	PRIMARY KEY(AID)
);

CREATE TABLE COURSE
(
	CID VARCHAR(11) NOT NULL,		#选课号
	CNAME VARCHAR(50) NOT NULL,		#课程名字
	CNUM INT,						#人数
	CREDIT INT,						#学分
	CWAY VARCHAR(8),				#考试方式
	CDATE DATE,						#考试日期
	CTIME VARCHAR(20),				#考试时间
	TID VARCHAR(11),				#授课老师
	PRIMARY KEY(CID),
	FOREIGN KEY(TID) REFERENCES TEACHER(TID)
);

CREATE TABLE SC
(
	SID VARCHAR(11) NOT NULL,		#学号
	CID VARCHAR(11) NOT NULL,		#选课号
	SCORE INT,						#成绩
	PRIMARY KEY(SID, CID),
	FOREIGN KEY(SID) REFERENCES STUDENT(SID),
	FOREIGN KEY(CID) REFERENCES COURSE(CID)
);

CREATE TABLE CSCHEDULE
(
	CID VARCHAR(11) NOT NULL,		#选课号
	TIME VARCHAR(20) NOT NULL,		#上课时间
	PLACE VARCHAR(20),				#上课地点
	PRIMARY KEY(CID, TIME),
	FOREIGN KEY(CID) REFERENCES COURSE(CID)
);

