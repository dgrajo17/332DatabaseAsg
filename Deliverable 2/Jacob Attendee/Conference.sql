DROP DATABASE IF EXISTS Conference;
CREATE DATABASE Conference;
USE Conference;

create table Attendees( -- attendees, students, professionals and sponsors
ID int not null auto_increment,
firstName varchar(40) not null,
lastName varchar(40) not null,
fee int not null, -- 50 for students, 100 for professionals, free for sponsors
PRIMARY KEY(ID)
);

create table Professionals(
ID int not null,
jobTitle varchar(40),
PRIMARY KEY (ID),
FOREIGN KEY (ID) REFERENCES Attendees(ID)
);

create table HotelRoom(
roomNumber int not null auto_increment,
numberOfBeds int not null, -- 1 or two beds only
PRIMARY KEY(roomNumber)
);

alter table HotelRoom auto_increment = 203;

create table Students(
ID int not null,
schoolName varchar(40),
program varchar(40),
roomNumber int,
PRIMARY KEY (ID),
FOREIGN KEY (ID) REFERENCES Attendees(ID),
FOREIGN KEY (roomNumber) REFERENCES HotelRoom(roomNumber)
);

create table Company(
companyName varchar(40) not null,
sponsorLevel varchar(40) not null, -- plat can send 5 emails, gold 4 emails, silver 3 emails and bronze 0 emails
maxEmails int not null,
emailsSent int not null,
PRIMARY KEY (companyName)
);

create table Sponsors(
ID int not null,
companyName varchar(40) not null,
PRIMARY KEY (ID),
FOREIGN KEY (ID) REFERENCES Attendees(ID) on delete cascade,
FOREIGN KEY (companyName) REFERENCES Company(companyName) on delete cascade
);

create table JobAds(
jobID int not null,
companyName varchar(40) not null,
jobTitle varchar(40) not null,
province varchar(40) not null,
city varchar(40) not null,
payRate int,
PRIMARY KEY (jobID),
FOREIGN KEY (companyName) REFERENCES Company(companyName) on delete cascade
);

create table CommitteeMembers(
ID int not null,
firstName varchar(40) not null,
lastName varchar(40) not null,
PRIMARY KEY(ID)
);

create table Committees(
chairID int not null,
committeeName varchar(40),
committeeID int,
PRIMARY KEY (committeeID)
);

create table memberOnCommittee(
memberID int,
committeeID int,
PRIMARY KEY(memberID, committeeID),
FOREIGN KEY (memberID) REFERENCES CommitteeMembers(ID),
FOREIGN KEY (committeeID) REFERENCES Committees(committeeID)
);

create table Sessions(
sessionName varchar(40) not null,
sessionID int not null,
day int,
startTime time not null,
endTime time not null,
roomLocation varchar(20) not null,
PRIMARY KEY (sessionID)
);

create table Speaks(
speakerID int not null,
sessionID int not null,
PRIMARY KEY(speakerID, sessionID),
FOREIGN KEY (speakerID) REFERENCES Attendees(ID),
FOREIGN KEY (sessionID) REFERENCES Sessions(sessionID)
);

insert into Attendees values(1000,"Jake", "Peralta", 50);
insert into Attendees values(1001,"Amy", "Santiago", 50);
insert into Attendees values(1002,"Quentin", "Tarantino", 50);
insert into Attendees values(1003,"Jamie", "Fox", 50);

insert into Attendees values(2000,"Michael", "Scott", 100);
insert into Attendees values(2001,"Jim", "Halpert", 100);
insert into Attendees values(2002,"Pam", "Beasley", 100);
insert into Attendees values(2003,"Oscar", "Martinez", 100);

insert into Attendees values(3000,"Peter", "Jackson", 0);
insert into Attendees values(3001,"Martin", "Short", 0);
insert into Attendees values(3002,"Meredith", "Grey", 0);
insert into Attendees values(3003, "Jack", "Black", 0);

insert into HotelRoom values(201, 2);
insert into HotelRoom values(202, 1);
	

insert into Students values(1000,"Queen's", "Eng",201);
insert into Students values(1001,"Queen's", "CompSci",201);
insert into Students values(1002,"Guelph", "Arts",202);

insert into Professionals values(2000,"Developer");
insert into Professionals values(2001,"Advertiser");
insert into Professionals values(2002,"Recruiter");
insert into Professionals values(2003,"Artist");

insert into Company values("Deloitte","Platinum", 5, 0);
insert into Company values("Faskens","Gold", 4, 0);
insert into Company values("Clarke Pub","Bronze", 0, 0);

insert into Sponsors values(3000, "Deloitte");
insert into Sponsors values(3001, "Faskens");
insert into Sponsors values(3002, "Clarke Pub");
insert into Sponsors values(3003, "Deloitte");

insert into JobAds values(00001, "Clarke Pub", "Bartender", "Ontario", "Kingston", 15.75);
insert into JobAds values(00002, "Clarke Pub", "Janitor", "Ontario", "Kingston", 14.75);
insert into JobAds values(00003, "Deloitte", "Accountant", "Ontario", "Toronto", 25.25);

insert into CommitteeMembers values(001, "Mary", "Jane");
insert into CommitteeMembers values(002, "Elon", "Zuckerberg");
insert into CommitteeMembers values(003, "Franz", "Ferdinand");
insert into CommitteeMembers values(004, "Peter", "Parker");
insert into CommitteeMembers values(005, "Steve", "Gates");
insert into CommitteeMembers values(006, "Gavrilo", "Princip");

insert into Committees values(001, "Ticket Entrance Committee", 001);
insert into Committees values(002, "Advertisement Committee", 002);
insert into Committees values(003, "Budget Committee", 003);


insert into memberOnCommittee values(001, 002);
insert into memberOnCommittee values(002, 003);
insert into memberOnCommittee values(003, 001);
insert into memberOnCommittee values(004, 002);
insert into memberOnCommittee values(005, 003);
insert into memberOnCommittee values(006, 001);


insert into Sessions values("Understanding Nature", 01, 01, "13:00:00", "14:00:00", "Main Atrium");
insert into Sessions values("Understanding Finance", 02, 01, "13:00:00", "14:00:00", "Secondary Atrium");
insert into Sessions values("Understanding You", 03, 01, "13:00:00", "14:00:00", "Tertiary Atrium");
insert into Sessions values("Using Knowledge", 04, 02, "13:00:00", "14:00:00", "Main Atrium");
insert into Sessions values("Implementing Skills", 05, 03, "13:00:00", "14:00:00", "Main Atrium");

insert into Speaks values(1000, 03);
insert into Speaks values(1001, 02);
insert into Speaks values(1002, 01);
insert into Speaks value(1003, 04);
insert into Speaks value(1000, 05);