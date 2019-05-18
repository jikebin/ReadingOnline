create table user(
	RID int auto_increment primary key,
	img varchar(500) not null,
	nickname varchar(100) unique,
	sex char(2),
	name varchar(50),
	phone char(11),
	e_mail varchar(50),
	QQ		varchar(12),
	address	varchar(100),
	password varchar(50)
);
create table writer(
	WID int auto_increment primary key,
	img varchar(500) not null,
	pen_name varchar(100) unique,
	sex char(2),
	name varchar(50),
	phone char(11),
	e_mail varchar(50),
	QQ		varchar(12),
	address	varchar(100),
	password varchar(50)
);
create table admin(
	AID int primary key,
	username varchar(20),
	password varchar(50)
);	
create table bkind(
	KID int auto_increment primary key,
	kind varchar(50)
);	
create table book(
	BID  int auto_increment primary key,
	KID	 int,
	bname varchar(30),
	WID int,
	pen_name varchar(100),
	path varchar(500),
	bookImg varchar(500),
	intro	text,
	foreign key(KID) references bkind(KID)
	
);
create table bcontent(
	CID int auto_increment primary key,
	BID int,
	chapter varchar(500),
	bookText longText,
	loadTime timestamp,
	number int,
	flag char(2),
	foreign key(BID) references book(BID)
);
create table bcollect(
	ID  int auto_increment primary key,
	RID int,
	BIDs varchar(500),
	foreign key(RID) references user(RID)
); 
create table support(
	SID  int auto_increment primary key,
	BID int,
	RID int,
	foreign key(BID) references book(BID),
	foreign key(RID) references user(RID)
);
create table subscriber(
	SID  int auto_increment primary key,
	BID int,
	RID int,
	foreign key(BID) references book(BID),
	foreign key(RID) references user(RID)
);
create table sign(
	SID  int auto_increment primary key,
	RID int,
	signTime date,
	foreign key(RID) references user(RID)
);
create table comment(
	CID  int auto_increment primary key,
	BID int,
	RID int,
	comText text,
	comTime timestamp,
	foreign key(BID) references book(BID),
	foreign key(RID) references user(RID)
	
);
create table message(
	MID int auto_increment primary key,
	WID int,
	mesText text,
	send int,
	foreign key(WID) references writer(WID)
);
create table recommend(
	RID int auto_increment primary key,
	BID int,
	foreign key(BID) references book(BID)
);























