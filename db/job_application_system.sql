-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 06:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_application_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profile`
--

CREATE TABLE `candidate_profile` (
  `id` int(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_profile`
--

INSERT INTO `candidate_profile` (`id`, `gender`, `address`, `date_of_birth`, `nationality`, `user_id`) VALUES
(1, 'Male', 'Kuala Lumpur', '1998-02-11', 'Malaysia', 5),
(2, 'Female', 'Kuching', '1999-02-13', 'Malaysia', 6),
(3, 'Female', 'Kota Kinabalu', '1990-05-26', 'Malaysia', 7),
(4, 'Male', 'Johor Bahru', '1991-09-02', 'Malaysia', 8),
(5, 'Female', 'Ipoh', '1993-10-18', 'Malaysia', 9),
(6, 'Female', 'Seremban', '1999-03-31', 'Malaysia', 10),
(7, 'Male', 'Alor Setar', '1996-07-05', 'Malaysia', 11),
(8, 'Male', 'Kangar', '1992-08-17', 'Malaysia', 12),
(9, 'Female', 'Alor Gajah', '1992-01-21', 'Malaysia', 13);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profile_to_job`
--

CREATE TABLE `candidate_profile_to_job` (
  `id` int(10) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_profile_to_job`
--

INSERT INTO `candidate_profile_to_job` (`id`, `candidate_profile_id`, `job_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 2),
(4, 4, 1),
(5, 5, 1),
(6, 6, 3),
(7, 7, 2),
(8, 8, 1),
(9, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profile_to_shortlisted_candidate`
--

CREATE TABLE `candidate_profile_to_shortlisted_candidate` (
  `id` int(10) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL,
  `shortlisted_candidate_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_profile_to_shortlisted_candidate`
--

INSERT INTO `candidate_profile_to_shortlisted_candidate` (`id`, `candidate_profile_id`, `shortlisted_candidate_id`) VALUES
(1, 3, 4),
(2, 4, 1),
(3, 5, 2),
(4, 7, 5),
(5, 8, 3),
(6, 9, 6),
(7, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) NOT NULL,
  `graduation_date` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `institute_location` text NOT NULL,
  `field_of_study` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `graduation_date`, `qualification`, `institute_location`, `field_of_study`, `grade`, `candidate_profile_id`) VALUES
(1, '2017', 'Diploma', 'UPM', 'Economy', '3.4', 1),
(2, '2020', 'Bachelor Degree', 'UM', 'Accounting ', '3.7', 1),
(3, '2018', 'Diploma', 'UiTM', 'Computer Engineering', '3.2', 2),
(4, '2009', 'Diploma', 'UTM', 'Electrical Engineering ', '3.0', 3),
(5, '2012', 'Bachelor Degree', 'UTHM ', 'Computer Science ', '3.75', 3),
(6, '2010', 'Diploma', 'UUM', 'Banking ', '3.8', 4),
(7, '2012', 'Diploma', 'UMK', 'Financial Management ', '3.55', 5),
(8, '2015', 'Bachelor Degree', 'UKM', 'Business Administration', '3.35', 5),
(9, '2018', 'Diploma', 'UNIMAS', 'Information Technology ', '3.8', 6),
(10, '2021', 'Bachelor Degree', 'UMS', 'Artificial Intelligence', '3.75', 6),
(11, '2015', 'Diploma', 'UNISEL', 'Information System', '3.4', 7),
(12, '2011', 'Diploma', 'UNISZA', 'Banking', '3.6', 8),
(13, '2014', 'Bachelor Degree', 'UMT', 'Business Management', '3.75', 8),
(14, '2011', 'Diploma', 'USM', 'Mechanical Engineering', '3.2', 9),
(15, '2013', 'Bachelor Degree', 'UTP', 'Software Engineering', '3.25', 9);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(10) NOT NULL,
  `position` varchar(255) NOT NULL,
  `duration` int(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` text NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `position`, `duration`, `company_name`, `company_address`, `monthly_salary`, `candidate_profile_id`) VALUES
(1, 'Assistant Programmer ', 2, 'Power InTech SDN BHD', 'Shah Alam', '1700.00', 3),
(2, 'Bank Officer', 5, 'HeyBank BHD', 'Damansara ', '3500.00', 4),
(3, 'Investment Advisor', 6, 'Cekal Tabah SDN BHD ', 'Ampang', '3800.00', 5),
(4, 'Computer Technician', 2, 'Macrohard SDN BHD', 'Sepang', '1500.00', 7),
(5, 'Financial Officer', 6, 'Private Silver Mutual SDN BHD', 'Bangi', '3700.00', 8),
(6, 'IT Administrator', 3, 'Jungle Web Services SDN BHD', 'Cyberjaya', '1800.00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `interview_session`
--

CREATE TABLE `interview_session` (
  `id` int(10) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview_session`
--

INSERT INTO `interview_session` (`id`, `platform`, `venue`) VALUES
(1, 'Google Meet', 'http://meet.google.com/ftp-grpc-api');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(10) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `min_monthly_salary` decimal(10,2) NOT NULL,
  `max_monthly_salary` decimal(10,2) NOT NULL,
  `candidate_nationality` varchar(255) NOT NULL,
  `candidate_min_edu_level` varchar(255) NOT NULL,
  `candidate_min_of_exp` varchar(255) NOT NULL,
  `candidate_lang_req` varchar(255) NOT NULL,
  `candidate_other_req` text NOT NULL,
  `job_responsibilities` text NOT NULL,
  `other_info` text NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `last_modified_date` varchar(255) NOT NULL,
  `recruitment_status_id` int(10) NOT NULL,
  `officer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `designation`, `department`, `min_monthly_salary`, `max_monthly_salary`, `candidate_nationality`, `candidate_min_edu_level`, `candidate_min_of_exp`, `candidate_lang_req`, `candidate_other_req`, `job_responsibilities`, `other_info`, `created_date`, `last_modified_date`, `recruitment_status_id`, `officer_id`) VALUES
(1, 'Financial Analyst', 'Financial', '4000.00', '4700.00', 'Malaysia', 'Bachelor Degree', '5 years', 'English', 'efficient', 'analyze company expenses', 'free insurans, free medical', '2022-01-01', '2022-01-02', 5, 1),
(2, 'Software Developer', 'IT', '3500.00', '4000.00', 'Malaysia', 'Bachelor Degree', '2 years', 'English', 'insightful', 'develop system, apps or web', 'free insurans, free medical', '2022-02-05', '2022-02-07', 4, 2),
(3, 'Network Technician', 'IT', '1900.00', '2200.00', 'Malaysia', 'Diploma', '0 year/Fresh Graduate', 'English', 'dedicated', 'configure network, switches, routers', 'free insurans, free medical', '2022-03-10', '2022-03-11', 3, 1),
(4, 'Asistant Accountant', 'Financial', '2000.00', '2400.00', 'Malaysia', 'Diploma', '1 year', 'English', 'hardworking', 'help manage company account', 'free insurans, free medical', '2022-04-01', '2022-04-02', 2, 2),
(5, 'Payroll Officer', 'Financial', '2400.00', '2800.00', 'Malaysia', 'Bachelor Degree', '3 years', 'English', 'problem solving', 'documenting and auditing', 'free insurans, free medical', '2022-05-08', '2022-05-09', 1, 1),
(6, 'DevOps Engineer', 'IT', '3600.00', '3950.00', 'Malaysia', 'Bachelor Degree', '3 years', 'English', 'analytical and critical', 'manage software versioning', 'free insurans, free medical', '2022-06-03', '2022-06-07', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(10) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `scale_for_writing` int(10) NOT NULL,
  `scale_for_speaking` int(10) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `scale_for_writing`, `scale_for_speaking`, `candidate_profile_id`) VALUES
(1, 'English', 8, 8, 1),
(2, 'English', 7, 8, 2),
(3, 'Malay', 8, 9, 3),
(4, 'English', 7, 7, 3),
(5, 'Malay', 7, 8, 4),
(6, 'English', 8, 8, 4),
(7, 'English', 8, 9, 5),
(8, 'Malay', 7, 7, 6),
(9, 'English', 7, 6, 6),
(10, 'English', 7, 8, 7),
(11, 'Mandarin', 8, 8, 7),
(12, 'Malay', 7, 6, 7),
(13, 'English', 8, 9, 8),
(14, 'Malay', 8, 7, 8),
(15, 'English', 8, 7, 9),
(16, 'Mandarin', 7, 7, 9),
(17, 'Malay', 8, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `id` int(10) NOT NULL,
  `department` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`id`, `department`, `position`, `user_id`) VALUES
(1, 'Financial', 'Manager', 1),
(2, 'IT', 'Manager', 2),
(3, 'HR', 'HR Officer', 3),
(4, 'HR', 'HR Officer', 4);

-- --------------------------------------------------------

--
-- Table structure for table `officer_to_interview_session`
--

CREATE TABLE `officer_to_interview_session` (
  `id` int(10) NOT NULL,
  `officer_id` int(10) NOT NULL,
  `interview_session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer_to_interview_session`
--

INSERT INTO `officer_to_interview_session` (`id`, `officer_id`, `interview_session_id`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_status`
--

CREATE TABLE `recruitment_status` (
  `id` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruitment_status`
--

INSERT INTO `recruitment_status` (`id`, `status`) VALUES
(1, 'Saved Later'),
(2, 'Waiting from HQ'),
(3, 'Posting the job'),
(4, 'Interview session'),
(5, 'Hired');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(10) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `file_path`, `candidate_profile_id`) VALUES
(1, 'user-11111111.pdf', 1),
(2, 'user-22222222.pdf', 2),
(3, 'user-33333333.pdf', 3),
(4, 'user-44444444.pdf', 4),
(5, 'user-55555555.pdf', 5),
(6, 'user-66666666.pdf', 6),
(7, 'user-77777777.pdf', 7),
(8, 'user-88888888.pdf', 8),
(9, 'user-99999999.pdf', 9);

-- --------------------------------------------------------

--
-- Table structure for table `shorlisted_candidate`
--

CREATE TABLE `shorlisted_candidate` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `education_level` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `is_qualified_interview` varchar(255) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shorlisted_candidate`
--

INSERT INTO `shorlisted_candidate` (`id`, `name`, `education_level`, `notes`, `is_qualified_interview`, `candidate_profile_id`, `job_id`) VALUES
(1, 'Kamil Adnan', 'Diploma', '', 'No', 4, 1),
(2, 'Vanessa Hudson', 'Bachelor Degree', '', 'Yes', 5, 1),
(3, 'Ruventhiran', 'Bachelor Degree', '', 'Yes', 8, 1),
(4, 'Anissa Roslan', 'Bachelor Degree', '', 'No', 3, 2),
(5, 'Lee Shun Feng', 'Diploma', '', 'Yes', 7, 2),
(6, 'Michelle Yeoh', 'Bachelor Degree', '', 'Yes', 9, 2),
(7, 'Aira Mohamad', 'Bachelor Degree', '', 'Wait', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shorlisted_candidate_to_interview_session`
--

CREATE TABLE `shorlisted_candidate_to_interview_session` (
  `id` int(10) NOT NULL,
  `shortlisted_candidate_id` int(10) NOT NULL,
  `interview_session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shorlisted_candidate_to_interview_session`
--

INSERT INTO `shorlisted_candidate_to_interview_session` (`id`, `shortlisted_candidate_id`, `interview_session_id`) VALUES
(1, 2, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(10) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `proficiency` varchar(255) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skill_name`, `proficiency`, `candidate_profile_id`) VALUES
(1, 'Detail oriented', '8', 1),
(2, 'ACCA', '7', 1),
(3, 'Arduino and Raspberry Pi', '9', 2),
(4, 'CISCO', '8', 2),
(5, 'JavaScript, Python', '9', 3),
(6, 'AWS, Google Cloud', '7', 3),
(7, 'Commercial Awareness', '9', 4),
(8, 'Attention to detail', '7', 4),
(9, 'Analytical Skill', '8', 5),
(10, 'Entrepreneurial Skill', '7', 5),
(11, 'Python, TensorFlow', '9', 6),
(12, 'CompTIA+', '8', 6),
(13, 'PHP, Laravel', '7', 7),
(14, 'MySQL, MongoDB', '8', 7),
(15, 'Financial Modelling', '9', 8),
(16, 'Cash Flow Management', '8', 8),
(17, 'Linux Server', '9', 9),
(18, 'JavaScript, React.js', '7', 9);

-- --------------------------------------------------------

--
-- Table structure for table `successful_candidate`
--

CREATE TABLE `successful_candidate` (
  `id` int(10) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `candidate_profile_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `successful_candidate`
--

INSERT INTO `successful_candidate` (`id`, `position`, `department`, `monthly_salary`, `candidate_profile_id`, `job_id`) VALUES
(1, 'Financial Analyst', 'Financial', '4105.00', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Abdul Rashid', 'rashid@email.com', 'd6957798168ca70c36415585c8fe45843afbc9614332cd38965357f4892ef635:4149cfd5cdba39af0168a3cc391c49bc5ae48697bec025f9053d807ea158f068', 'Manager'),
(2, 'Chen Tien Jin', 'chen@email.com', 'debefdef5c9f2ec1ff79e2c4b82a239616dadaefa3d896ce0c85ff7b2563d1d3:e0673b93c20570e700818fddffd03184a8f31b650a9af427c5c4e86e94cb51ae', 'Manager'),
(3, 'Sathianathan', 'sathia@email.com', '35d87b561f9c3157696ccbd09236d0ea39e9f0aaf670cbbc66bae8f9308ced47:ab06ec832f22a037d4c914f2a9291589f957585b9f131f74e0a84b569955bfd1', 'HR'),
(4, 'Mark Thompson', 'mark@email.com', 'c98e34ea09ba13e81e5695d72f969cb8ad99713b3ddd049d93a5afb59b80a415:d0d9f3fe014837d08d0fddcf67a0050739bb33b23462ec07635cdf2aa5d376d9', 'HR'),
(5, 'Luis Rodriguez', 'luis@email.com', '07965218ca42f15f6a32b26dfd65055d46c51cab2e848c4104a914a3552a9ec9:8bc45fabdb58d20f36a820e7a3ccf806051c7aa8c73265f17085691eb4b3d84f', 'Applicant'),
(6, 'Olivia Hawkes', 'olivia@email.com', 'f448e83fe0297d07f36cd958f1d00ec122dea2e2767f6e0eb212211bd743f221:3de5e57a32077b3981272cd2a94870d95618ce7522872f99a9407054e3ff29a4', 'Applicant'),
(7, 'Anissa Roslan', 'anissa@email.com', '3f84c2936128da03be0dc51362115227dfb1239803061a2a5281293ee4102664:aca16570617a6a013038b2bda65bd294e5fe8e0158981ade87586e500eb4487b', 'Applicant'),
(8, 'Kamil Adnan', 'kamil@email.com', '615b858c7ab6076d4accb0b077e6ba1294bb6f0082765f022ab7e1064f7172ae:198003e8a12010c68fa28b56c1648b689fe18859781dd5c135bb719fe8254769', 'Applicant'),
(9, 'Vanessa Hudson', 'vanessa@email.com', '45eccc7df7a664f78eb2dd9f934e5d30b107dc1b573b893e212057eb96e93b5f:323464e09b094cb2495ec21a3b86f9ef6ef40c21d387c133cfb2ea317e7d50d0', 'Applicant'),
(10, 'Aira Mohamad', 'aira@email.com', 'ffefcaa2d3bcd24250ca3bfe392d0e2477c0fefd2d7458b08dd17badf871d97e:6968405998c454e500f5fd04177856564dba9ecea0ee7415a5b7f15f60ac3e45', 'Applicant'),
(11, 'Lee Shun Feng', 'lee@email.com', 'd692ac1b7a5a6efea3d4bb7fc49d27833074d55afb05abed22d642172247c64b:5367ccc1d5130ea14cd67f4dea00a8c997867da2040b117b47cef4c282f72e98', 'Applicant'),
(12, 'Ruventhiran', 'ruven@email.com', 'c1bd5a44dd2a03cab1abe9aec43de8921e40195d8edeb7a1c2c05ed4ab6ad06a:44fbad29772eaa7c224d0e4b473a43eb976502346092b4c845a3558c0a57f528', 'Applicant'),
(13, 'Michelle Yeoh', 'michelle@email.com', '6285974a3f2453225e320715a29523ef9e065b987f03d7a4f12b45d7712974be:e3ab9efcf7a68e2f28bd1c88417d0dcdaa6ff7620db78f71b7d967deba38b6fd', 'Applicant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_profile`
--
ALTER TABLE `candidate_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `candidate_profile_to_job`
--
ALTER TABLE `candidate_profile_to_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `candidate_profile_to_shortlisted_candidate`
--
ALTER TABLE `candidate_profile_to_shortlisted_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`),
  ADD KEY `shortlisted_candidate_id` (`shortlisted_candidate_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`);

--
-- Indexes for table `interview_session`
--
ALTER TABLE `interview_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitment_status_id` (`recruitment_status_id`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer_to_interview_session`
--
ALTER TABLE `officer_to_interview_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officer_id` (`officer_id`),
  ADD KEY `interview_session_id` (`interview_session_id`);

--
-- Indexes for table `recruitment_status`
--
ALTER TABLE `recruitment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`);

--
-- Indexes for table `shorlisted_candidate`
--
ALTER TABLE `shorlisted_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `shorlisted_candidate_to_interview_session`
--
ALTER TABLE `shorlisted_candidate_to_interview_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shortlisted_candidate_id` (`shortlisted_candidate_id`),
  ADD KEY `interview_session_id` (`interview_session_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`);

--
-- Indexes for table `successful_candidate`
--
ALTER TABLE `successful_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profile_id` (`candidate_profile_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_profile`
--
ALTER TABLE `candidate_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `candidate_profile_to_job`
--
ALTER TABLE `candidate_profile_to_job`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `candidate_profile_to_shortlisted_candidate`
--
ALTER TABLE `candidate_profile_to_shortlisted_candidate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interview_session`
--
ALTER TABLE `interview_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officer_to_interview_session`
--
ALTER TABLE `officer_to_interview_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recruitment_status`
--
ALTER TABLE `recruitment_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shorlisted_candidate`
--
ALTER TABLE `shorlisted_candidate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shorlisted_candidate_to_interview_session`
--
ALTER TABLE `shorlisted_candidate_to_interview_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `successful_candidate`
--
ALTER TABLE `successful_candidate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_profile`
--
ALTER TABLE `candidate_profile`
  ADD CONSTRAINT `candidate_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `candidate_profile_to_job`
--
ALTER TABLE `candidate_profile_to_job`
  ADD CONSTRAINT `candidate_profile_to_job_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`),
  ADD CONSTRAINT `candidate_profile_to_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `candidate_profile_to_shortlisted_candidate`
--
ALTER TABLE `candidate_profile_to_shortlisted_candidate`
  ADD CONSTRAINT `candidate_profile_to_shortlisted_candidate_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`),
  ADD CONSTRAINT `candidate_profile_to_shortlisted_candidate_ibfk_2` FOREIGN KEY (`shortlisted_candidate_id`) REFERENCES `shorlisted_candidate` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`recruitment_status_id`) REFERENCES `recruitment_status` (`id`),
  ADD CONSTRAINT `officer_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer` (`id`);

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`);

--
-- Constraints for table `officer_to_interview_session`
--
ALTER TABLE `officer_to_interview_session`
  ADD CONSTRAINT `officer_to_interview_session_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer` (`id`),
  ADD CONSTRAINT `officer_to_interview_session_ibfk_2` FOREIGN KEY (`interview_session_id`) REFERENCES `interview_session` (`id`);

--
-- Constraints for table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`);

--
-- Constraints for table `shorlisted_candidate`
--
ALTER TABLE `shorlisted_candidate`
  ADD CONSTRAINT `shorlisted_candidate_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`),
  ADD CONSTRAINT `shorlisted_candidate_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `shorlisted_candidate_to_interview_session`
--
ALTER TABLE `shorlisted_candidate_to_interview_session`
  ADD CONSTRAINT `shorlisted_candidate_to_interview_session_ibfk_1` FOREIGN KEY (`shortlisted_candidate_id`) REFERENCES `shorlisted_candidate` (`id`),
  ADD CONSTRAINT `shorlisted_candidate_to_interview_session_ibfk_2` FOREIGN KEY (`interview_session_id`) REFERENCES `interview_session` (`id`);

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`);

--
-- Constraints for table `successful_candidate`
--
ALTER TABLE `successful_candidate`
  ADD CONSTRAINT `successful_candidate_ibfk_1` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profile` (`id`),
  ADD CONSTRAINT `successful_candidate_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
