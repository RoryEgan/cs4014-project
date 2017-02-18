CREATE TABLE Subject(
  SubjectID int NOT NULL AUTO_INCREMENT,
  SubjectName varchar(45) NOT NULL,
  primary key(SubjectID)
);

CREATE TABLE User (
  StudentID int NOT NULL,
  SubjectID int NOT NULL,
  ForeName varchar(35) NOT NULL,
  SurName varchar(35) NOT NULL,
  EmailAddress varchar(255) UNIQUE NOT NULL,
  Password varchar(45) NOT NULL,
  Reputation int NOT NULL,
  IsMod boolean NOT NULL,
  primary key (StudentID),
  foreign key (SubjectID) REFERENCES Subject(SubjectID)
);

CREATE TABLE Task(
  TaskID int NOT NULL AUTO_INCREMENT,
  StudentID int NOT NULL,
  SubjectID int NOT NULL,
  Title varchar(75) NOT NULL,
  Description varchar(300),
  NumPages int NOT NULL,
  NumWords int NOT NULL,
  ClaimantID int,
  primary key (TaskID),
  foreign key (StudentID) REFERENCES User(StudentID)
);

CREATE TABLE Deadline(
  TaskID int NOT NULL,
  Claim date NOT NULL,
  Complete date NOT NULL,
  foreign key (TaskID) REFERENCES Task(TaskID)
);

CREATE TABLE Flag(
  TaskID int NOT NULL,
  Complaint varchar(200),
  foreign key (TaskID) REFERENCES Task(TaskID)
);

CREATE TABLE Status(
  StatusID int NOT NULL AUTO_INCREMENT,
  StatusVal varchar(45) NOT NULL,
  TaskID int NOT NULL,
  primary key (StatusID),
  foreign key (TaskID) REFERENCES Task(TaskID)
);

CREATE TABLE Clicks(
  ClickID int NOT NULL AUTO_INCREMENT,
  TaskID int NOT NULL,
  StudentID int NOT NULL,
  primary key (ClickID),
  foreign key (StudentID) REFERENCES User(StudentID),
  foreign key (TaskID) REFERENCES Task(TaskID)
);

CREATE TABLE BannedUser(
  BanID int NOT NULL AUTO_INCREMENT,
  EmailAddress varchar(255) NOT NULL,
  Reason varchar(200),
  primary key (BanID)
);

CREATE TABLE Tag(
  TagID int NOT NULL AUTO_INCREMENT,
  TagVal varchar(32) NOT NULL,
  primary key (TagID)
);


CREATE TABLE TaskTag(
  TaskTagID int NOT NULL AUTO_INCREMENT,
  TagID int NOT NULL,
  TaskID int NOT NULL,
  primary key (TaskTagID),
  foreign key (TaskID) REFERENCES Task(TaskID)
);

CREATE TABLE Document(
  DocumenURL varchar(255) UNIQUE,
  Type varchar(45) NOT NULL,
  Format varchar(45)
);
