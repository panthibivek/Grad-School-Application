/*1. admission application for year 2021*/

SELECT COUNT(A_id) AS applicants_2021
FROM Admin_application
WHERE Year_=2021;

/*2. Number of top 25 universities by country*/

SELECT DISTINCT UNI.Country, COUNT(UNI.U_id) AS Count
FROM UNI
WHERE UNI.World_R <= 25
GROUP BY UNI.Country;

/* 3. Number of professors by their countries who have more than
two collaborators in their publication */

SELECT DISTINCT PD.Country, COUNT(DISTINCT PD.PN_id) AS Number_of_Professors
FROM Professor_details PD, Professor_publishing PP
WHERE PD.PN_id = PP.PN_id
GROUP BY PD.Country
HAVING COUNT(PP.colab_id) > 2;

/* 4. Select the tests where the test is TOEFL and toefl is the highest ranking test */

SELECT COUNT(t_id) AS top_german_language_tests
FROM Language_Tests
WHERE Type_of_Test = "Language TOEFL" AND Test_ranking <=100;

/*5. Select the universities where they have open job and admission
application for mathematics department*/

SELECT COUNT(U_id)
FROM Admin_application Job_application
WHERE Department = "mathematics";

/* 6. Those students(in our database) who collaborated with professors in their papers */

SELECT Professor_publishing.collaborators_in_the_paper, Professor_publishing.Papers_name, student_details.S_ID                                
FROM Professor_publishing
INNER JOIN student_details
ON Professor_publishing.colab_id = student_details.S_ID;


/* 7. Name of the international conferences done by Stanford University professors */

SELECT Professor_affiliations.International_Conferences
FROM Professor_affiliations
INNER JOIN UNI
ON Professor_affiliations.OU_id = UNI.U_id
AND UNI.Uni_Name = "Stanford University";

/* 8. All students and their application (NULL value in A_id means
he or she did not apply to any universities in our dataset)*/

SELECT student_details.S_ID, student_details.Student_Name, Admin_application.A_id
FROM student_details
LEFT JOIN Admin_application
ON Admin_application.A_id = student_details.App_id;


/* 9. counts number of distinct applicants to MIT in the year 2021*/

SELECT COUNT( DISTINCT Admin_application.A_id) AS MIT2021
FROM Admin_application
WHERE Admin_application.U_id = 1 AND Admin_application.Year_ = 2021;

/* 10. Finding average funding received by PHD students */

SELECT AVG(DISTINCT Funding_Received) AS avg_funding
FROM student_details
WHERE student_details.MS_OR_PHD = "PHD"; 

/*11. Taking all job applicants with or without (NULL) research with professor*/

SELECT Professor_publishing.collaborators_in_the_paper, Job_application.job_id                                
FROM Professor_publishing
RIGHT JOIN Job_application
ON Professor_publishing.colab_id = Job_application.job_id;

/* 12. Showing the applicants with maximum and minimum teaching
experience in math department applications */

SELECT MAX(J.teaching_experience) AS Max_Exp_mathematics, MIN(J.teaching_experience) AS Min_Exp_mathematics
FROM Job_application J
WHERE J.Department = 'mathematics';














