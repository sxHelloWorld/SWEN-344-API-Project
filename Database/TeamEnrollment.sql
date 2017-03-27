/* Team Enrollment tables */
/* ID field must be and INTEGER and not an INT to increment correctly */

/* Join table. Student to Section relation */
CREATE TABLE Waitlist(
	SECTION_ID INTEGER NOT NULL,
	STUDENT_ID INTEGER NOT NULL,
	ADDED_DATE DATE,
	FOREIGN KEY(SECTION_ID) REFERENCES Section(ID),
	FOREIGN KEY(STUDENT_ID) REFERENCES Student(ID)
);

/* Schedule Table. */
CREATE TABLE Schedule(
	SECTION_ID INTEGER NOT NULL,
	DAY_OF_WEEK TEXT NOT NULL,
	START_TIME TIME NOT NULL,
	END_TIME TIME NOT NULL,
	FOREIGN KEY(SECTION_ID) REFERENCES Section(ID)
);

/* Term table. */
CREATE TABLE Term(
	ID INTEGER PRIMARY KEY,
	CODE TEXT NOT NULL,
	START_DATE DATE NOT NULL,
	END_DATE DATE NOT NULL
);

/* Join table. Course to Course relation */
CREATE TABLE Prerequisite(
	COURSE_ID INTEGER NOT NULL,
	PREREQ_COURSE_ID INTEGER NOT NULL,
	FOREIGN KEY(COURSE_ID) REFERENCES Course(ID),
	FOREIGN KEY(PREREQ_COURSE_ID) REFERENCES Course(ID)
);