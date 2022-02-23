CREATE TABLE UNI(
            Uni_Name               VARCHAR(30),
            Country                VARCHAR(30),
            P_available            VARCHAR(30),
            National_R             INTEGER,
            World_R                INTEGER,
            Subject_R              INTEGER,
            U_id                   INTEGER NOT NULL,
            PRIMARY KEY (U_id)
);
 
CREATE TABLE Admin_application(
            A_id              INTEGER NOT NULL,
            U_id              INTEGER NOT NULL,
            General_test      VARCHAR(30),             
            Degree_seek       VARCHAR(30),
            SOP               VARCHAR(30),
            LOR               VARCHAR(30),
            Department        VARCHAR(30),
            /*SOP ->Statement of purpose LOR-> letter of reccomendation*/
            PRIMARY KEY (U_id),
            CONSTRAINT  Adm_uni_appl FOREIGN KEY (U_id) REFERENCES UNI(U_id) ON DELETE CASCADE
);
 
CREATE TABLE Job_application(
     job_id                INTEGER NOT NULL,
     U_id                  INTEGER NOT NULL,
     Prev_research         VARCHAR(30),
     recomendation       VARCHAR(30),
     teaching_experience   VARCHAR(30),
     Department            VARCHAR(30),           
     PRIMARY KEY (U_id),
     CONSTRAINT  job_uni_appl  FOREIGN KEY (U_id) REFERENCES UNI(U_id) ON DELETE CASCADE
           
);

Create TABLE Professor_details (
	Prof_Name        VARCHAR(255) NOT NULL,
	Uni_Name         VARCHAR(255),
	Research_Area    VARCHAR(255),
	PN_id            INTEGER NOT NULL,
    	PRIMARY KEY(PN_id)
);

Create TABLE Publishing (
	PN_id                    INTEGER NOT NULL,
	Papers_in_Journals       VARCHAR(255),   
	Papers_in_Conferences    VARCHAR(255),
	Pb_id                    INTEGER NOT NULL,
	PRIMARY KEY(PN_id), 
  CONSTRAINT FOREIGN KEY(PN_id) REFERENCES Professor_details(PN_id) ON DELETE CASCADE
);

Create TABLE International_details (
	PN_id                    INTEGER NOT NULL,
	Other_universities       VARCHAR(255),   
	Industry_Related_Papers    VARCHAR(255),
	International_Conferences       VARCHAR(255),
	TC_id                    INTEGER NOT NULL,
	PRIMARY KEY(PN_id), 
  CONSTRAINT FOREIGN KEY(PN_id) REFERENCES Professor_details(PN_id) ON DELETE CASCADE
);


CREATE TABLE student_details
(
S_ID INTEGER NOT NULL,
Funding_Received             VARCHAR(100),
Prospective_Supervisor       VARCHAR(100),
Uni_Applied_To               VARCHAR(100),
Accepted_or_Rejected         VARCHAR(100),
MS_OR_PHD                    VARCHAR(100),
PRIMARY KEY(S_ID)
);

CREATE TABLE student_personal
(
S_ID                           INTEGER NOT NULL,
Nam                            VARCHAR(100),
Country                        VARCHAR(100),
UNI_Name                       VARCHAR(100),
Current_Bachelors_Program      VARCHAR(100),
  PRIMARY KEY (S_ID),
  CONSTRAINT FOREIGN KEY (S_ID) REFERENCES student_details(S_ID) ON DELETE CASCADE
);

CREATE TABLE student_professional
(
	S_ID INTEGER NOT NULL,
	Voluntary_Experience           VARCHAR(100),
	Working_Experience             VARCHAR(100),
	PRIMARY KEY(S_ID),
	CONSTRAINT FOREIGN KEY (S_ID) REFERENCES student_details(S_ID) ON DELETE CASCADE
);



CREATE TABLE Tests
(
	t_id                   INTEGER NOT NULL,
	Name_of_Tests		       VARCHAR(20),
	mean_test_score	       FLOAT(1),
	PRIMARY KEY(t_id)
);

CREATE TABLE Academic_tests
(
	t_id               INTEGER NOT NULL,
	Type_of_Test        VARCHAR(20),
	Test_ranking	      INTEGER NOT NULL,
	PRIMARY KEY(t_id),
	CONSTRAINT FOREIGN KEY (t_ID) REFERENCES Tests(t_ID) ON DELETE CASCADE
);

CREATE TABLE Language_Tests
(
	t_id                     INTEGER NOT NULL,
	Type_of_Test           VARCHAR(20),
	PRIMARY KEY(t_id),
	CONSTRAINT FOREIGN KEY (t_ID) REFERENCES Tests(t_ID) ON DELETE CASCADE
);


/*relationships*/

CREATE TABLE chances
(
	S_ID INTEGER NOT NULL,
	U_ID INTEGER NOT NULL,
	Probability_to_get_in INTEGER,
	PRIMARY KEY(S_ID,U_ID),
	FOREIGN KEY (S_ID) REFERENCES student_details(S_ID) ON DELETE CASCADE,
	FOREIGN KEY (U_ID) REFERENCES UNI(U_ID) ON DELETE CASCADE
);

CREATE TABLE Test_Acceptance
(
	t_id INTEGER NOT NULL,
	U_ID INTEGER NOT NULL,
	Mean_test_score INTEGER,
	PRIMARY KEY(t_id,U_ID),
	FOREIGN KEY (t_id) REFERENCES Tests(t_id) ON DELETE CASCADE,
	FOREIGN KEY (U_ID) REFERENCES UNI(U_ID) ON DELETE CASCADE
);

CREATE TABLE Test_Taken
(
	t_id INTEGER NOT NULL,
	S_ID INTEGER NOT NULL,
	Test_score INTEGER,
	PRIMARY KEY(t_id, S_ID),
	FOREIGN KEY (t_id) REFERENCES Tests(t_id) ON DELETE CASCADE,
	FOREIGN KEY (S_ID) REFERENCES student_details(S_ID) ON DELETE CASCADE
);

CREATE TABLE Common_Interests
(
	S_ID INTEGER NOT NULL,
	PN_id INTEGER NOT NULL,
	Name_of_institution VARCHAR(50),
	PRIMARY KEY(PN_id,S_ID),
	FOREIGN KEY (S_ID) REFERENCES student_professional(S_ID) ON DELETE CASCADE,
	FOREIGN KEY (PN_id) REFERENCES Professor_details(PN_id) ON DELETE CASCADE
);

CREATE TABLE Common_Criteria
(
	U_id INTEGER NOT NULL,
	S_ID INTEGER NOT NULL,
	Name_of_institution VARCHAR(50),
	PRIMARY KEY(S_ID, U_id),
	FOREIGN KEY (S_ID) REFERENCES student_professional(S_ID) ON DELETE CASCADE,
	FOREIGN KEY (U_id) REFERENCES Job_application(U_id) ON DELETE CASCADE
);

