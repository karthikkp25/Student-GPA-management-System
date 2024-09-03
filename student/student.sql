CREATE TABLE `students` (
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `student_email` varchar(100) DEFAULT NULL,
  `student_phone` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_email`, `student_phone`, `password`, `last_login_time`) VALUES
('4VP21CS092', 'shravandeep', 'sh@gmail.com', '9481477567', '1234', '2024-03-18 06:22:19');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `after_student_login` AFTER UPDATE ON `students` FOR EACH ROW BEGIN
    IF NEW.password <> OLD.password THEN
        UPDATE students
        SET last_login_time = CURRENT_TIMESTAMP
        WHERE student_id = NEW.student_id;
    END IF;
END
$$
DELIMITER ;

--

-- Faculty Table
CREATE TABLE Faculty (
    faculty_id INT PRIMARY KEY,
    faculty_name VARCHAR(100),
    faculty_email VARCHAR(100),
    faculty_phone VARCHAR(20),
    password VARCHAR(50)
);

-- Courses Table
CREATE TABLE Branch (
    student_id VARCHAR(10) PRIMARY KEY,
    branch_id VARCHAR(10) ,
    branch_name VARCHAR(100),

    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

-- Enrollments Table
CREATE TABLE Enrollments (
    enrollment_id INT AUTO_INCREMENT ,
    student_id VARCHAR(10),
    branch_id VARCHAR(10),
    enrollment_date DATE,
    PRIMARY KEY(enrollment_id,student_id),
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (branch_id) REFERENCES Branch(branch_id)
);

-- Grades Table
-- Grades Table
CREATE TABLE Grades (
    grade_id INT AUTO_INCREMENT,
    student_id VARCHAR(10),
    branch_id VARCHAR(10),
    grade1 VARCHAR(5),
    grade2 VARCHAR(5),
    grade3 VARCHAR(5),
    grade4 VARCHAR(5),
    grade5 VARCHAR(5),
    grade6 VARCHAR(5),
    grade7 VARCHAR(5),
    grade8 VARCHAR(5),
    cgpa VARCHAR(5),
    PRIMARY KEY(student_id,  grade_id, branch_id ),
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (branch_id) REFERENCES Branch(branch_id) -- Corrected foreign key reference
);
