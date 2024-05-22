-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 05:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr-attendance-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `occupational_status` varchar(255) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `work_specialization` varchar(255) DEFAULT NULL,
  `valid_id` varchar(255) NOT NULL,
  `unique_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `type`, `fname`, `lname`, `birth_date`, `email`, `occupational_status`, `school_name`, `employer`, `work_specialization`, `valid_id`, `unique_code`, `created_at`, `updated_at`) VALUES
(2, 'csucc member', 'john', 'doe', '1995-09-15', 'johndoe@example.com', 'student', 'caraga state university cabadbaran campus', NULL, NULL, '767242551-id', '56af3e', NULL, NULL),
(3, 'guest', 'jane', 'smith', '1993-07-20', 'janesmith@example.com', 'student', 'northern mindanao colleges', NULL, NULL, '132589561-id', '409be2', NULL, NULL),
(4, 'guest', 'michael', 'lee', '1998-04-25', 'michaellee@example.com', 'student', 'mindanao institute', NULL, NULL, '614018972-id', '65047b', NULL, NULL),
(5, 'guest', 'emily', 'wilson', '1997-12-10', 'emilywilson@example.com', 'student', 'candelaria institute of technology of cabadbaran incorporated', NULL, NULL, '473054706-id', '8a54f0', NULL, NULL),
(6, 'csucc member', 'alex', 'jones', '1996-05-28', 'alexjones@example.com', 'student', 'caraga state university cabadbaran campus', NULL, NULL, '461868947-id', '89e059', NULL, NULL),
(7, 'guest', 'sarah', 'brown', '1994-10-12', 'sarahbrown@example.com', 'student', 'northern mindanao colleges', NULL, NULL, '518017925-id', '661a30', NULL, NULL),
(8, 'guest', 'david', 'nguyen', '1997-03-17', 'davidnguyen@example.com', 'student', 'mindanao institute', NULL, NULL, '685520336-id', '9d967d', NULL, NULL),
(9, 'guest', 'lisa', 'martinez', '1995-08-22', 'lisamartinez@example.com', 'student', 'candelaria institute of technology of cabadbaran incorporated', NULL, NULL, '362725341-id', 'abc24d', NULL, NULL),
(10, 'guest', 'william', 'brown', '1998-12-05', 'williambrown@example.com', 'student', 'northern mindanao colleges', NULL, NULL, '722098727-id', '95a35e', NULL, NULL),
(11, 'csucc member', 'megan', 'rodriguez', '1996-06-30', 'meganrodriguez@example.com', 'student', 'caraga state university cabadbaran campus', NULL, NULL, '455348028-id', '630ff3', NULL, NULL),
(12, 'guest', 'matthew', 'wilson', '1995-11-18', 'matthewwilson@example.com', 'student', 'northern mindanao colleges', NULL, NULL, '279706212-id', 'f0faad', NULL, NULL),
(13, 'guest', 'emily', 'brown', '1998-02-27', 'emilybrown@example.com', 'student', 'mindanao institute', NULL, NULL, '378264477-id', '7eb85e', NULL, NULL),
(14, 'guest', 'jacob', 'martinez', '1997-04-15', 'jacobmartinez@example.com', 'student', 'candelaria institute of technology of cabadbaran incorporated', NULL, NULL, '669669438-id', '155b0a', NULL, NULL),
(15, 'csucc member', 'olivia', 'nguyen', '1996-09-03', 'olivianguyen@example.com', 'student', 'caraga state university cabadbaran campus', NULL, NULL, '319339312-id', '2761fc', NULL, NULL),
(16, 'guest', 'ethan', 'rodriguez', '1999-01-10', 'ethanrodriguez@example.com', 'student', 'northern mindanao colleges', NULL, NULL, '40422272-id', 'a1d947', NULL, NULL),
(17, 'csucc member', 'ava', 'garcia', '1997-06-25', 'avagarcia@example.com', 'student', 'caraga state university cabadbaran campus', NULL, NULL, '893969645-id', '4d8a98', NULL, NULL),
(18, 'guest', 'noah', 'lopez', '1994-03-08', 'noahlopez@example.com', 'student', 'mindanao institute', NULL, NULL, '621623087-id', 'd10eb7', NULL, NULL),
(19, 'guest', 'mia', 'rivera', '1998-07-22', 'miarivera@example.com', 'student', 'candelaria institute of technology of cabadbaran incorporated', NULL, NULL, '765112125-id', '04a921', NULL, NULL),
(20, 'guest', 'logan', 'clark', '1996-10-05', 'loganclark@example.com', 'student', 'northern mindanao colleges', NULL, NULL, '942522867-id', 'ec1584', NULL, NULL),
(21, 'guest', 'amelia', 'martin', '1997-08-13', 'ameliamartin@example.com', 'student', 'mindanao institute', NULL, NULL, '21925633-id', '34c769', NULL, NULL),
(32, 'csucc member', 'john', 'dews', '1990-05-15', 'johndews123@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'administration', '622596050-ID', '2b213c', NULL, NULL),
(33, 'guest', 'jane', 'smith', '1992-03-20', 'janesmith456@example.com', 'employed', NULL, 'northern mindanao colleges', 'teacher', '12549804-ID', '751ace', NULL, NULL),
(34, 'csucc member', 'michael', 'lee', '1985-08-25', 'michaellee789@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'information technology', '635082110-ID', '6c980c', NULL, NULL),
(35, 'guest', 'emily', 'wilson', '1989-11-10', 'emilywilson012@example.com', 'employed', NULL, 'mindanao institute', 'office admin', '953612133-ID', 'c34b15', NULL, NULL),
(36, 'csucc member', 'alex', 'jones', '1987-04-28', 'alexjones345@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'research', '402891825-ID', '978d6e', NULL, NULL),
(37, 'guest', 'sarah', 'brown', '1991-10-12', 'sarahbrown678@example.com', 'employed', NULL, 'candelaria institute of technology of cabadbaran incorporated', 'accounting', '72435753-ID', '3d59df', NULL, NULL),
(38, 'csucc member', 'david', 'nguyen', '1988-02-17', 'davidnguyen901@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'finance', '750253164-ID', '5fcafb', NULL, NULL),
(39, 'guest', 'lisa', 'martinez', '1986-05-22', 'lisamartinez234@example.com', 'employed', NULL, 'mindanao institute', 'customer service', '602888628-ID', 'a7430e', NULL, NULL),
(40, 'csucc member', 'william', 'brown', '1989-12-05', 'williambrown567@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'education', '702605733-ID', 'a1fb65', NULL, NULL),
(41, 'guest', 'megan', 'rodriguez', '1986-06-30', 'meganrodriguez890@example.com', 'employed', NULL, 'northern mindanao colleges', 'engineering', '923511554-ID', '80791d', NULL, NULL),
(42, 'guest', 'adam', 'wilkinson', '1993-08-12', 'adamwilkinson123@example.com', 'employed', NULL, 'mindanao institute', 'human resources', '682255983-ID', '6bff8f', NULL, NULL),
(43, 'csucc member', 'sophia', 'kim', '1991-04-17', 'sophiakim456@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'medicine', '908520347-ID', '2e3be9', NULL, NULL),
(44, 'guest', 'daniel', 'thomas', '1990-11-05', 'danielthomas789@example.com', 'employed', NULL, 'candelaria institute of technology of cabadbaran incorporated', 'logistics', '121583020-ID', '9c6a7e', NULL, NULL),
(45, 'csucc member', 'olivia', 'nguyen', '1988-06-20', 'olivianguyen012@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'dentistry', '133394538-ID', '97dfaa', NULL, NULL),
(46, 'guest', 'ethan', 'garcia', '1994-03-25', 'ethangarcia345@example.com', 'employed', NULL, 'northern mindanao colleges', 'architecture', '440249325-ID', '7f69d8', NULL, NULL),
(47, 'csucc member', 'mia', 'lopez', '1987-09-08', 'mialopez678@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'veterinary medicine', '164186608-ID', '6d2ce1', NULL, NULL),
(48, 'guest', 'noah', 'martin', '1993-05-30', 'noahmartin901@example.com', 'employed', NULL, 'mindanao institute', 'public relations', '157301905-ID', 'bb0460', NULL, NULL),
(49, 'csucc member', 'ava', 'fernandez', '1989-02-15', 'avafernandez234@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'chemistry', '511057011-ID', '3bc6d4', NULL, NULL),
(50, 'guest', 'logan', 'perez', '1995-01-10', 'loganperez567@example.com', 'employed', NULL, 'candelaria institute of technology of cabadbaran incorporated', 'graphic design', '294366340-ID', 'f2e3dc', NULL, NULL),
(51, 'csucc member', 'harper', 'rodriguez', '1992-07-04', 'harperrodriguez890@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'nursing', '993447642-ID', 'c85f22', NULL, NULL),
(52, 'csucc member', 'emma', 'miller', '1990-09-25', 'emmamiller123@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'physics', '521832834-ID', '90675f', NULL, NULL),
(53, 'guest', 'jacob', 'wilson', '1991-06-18', 'jacobwilson456@example.com', 'employed', NULL, 'northern mindanao colleges', 'marketing', '248802053-ID', 'e286d6', NULL, NULL),
(54, 'csucc member', 'oliver', 'garcia', '1988-03-11', 'olivergarcia789@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'biology', '30743774-ID', 'dd46ec', NULL, NULL),
(55, 'guest', 'amelia', 'lopez', '1993-11-29', 'amelialopez012@example.com', 'employed', NULL, 'mindanao institute', 'event planning', '344913506-ID', 'c8646b', NULL, NULL),
(56, 'csucc member', 'william', 'hernandez', '1989-08-14', 'williamhernandez345@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'computer science', '276662929-ID', '5099db', NULL, NULL),
(57, 'guest', 'mia', 'martin', '1992-05-03', 'miamartin678@example.com', 'employed', NULL, 'candelaria institute of technology of cabadbaran incorporated', 'public relations', '152374375-ID', '3ce419', NULL, NULL),
(58, 'csucc member', 'james', 'gonzalez', '1987-12-19', 'jamesgonzalez901@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'mathematics', '405147052-ID', '8c3b84', NULL, NULL),
(59, 'guest', 'ava', 'perez', '1994-07-08', 'avaperez234@example.com', 'employed', NULL, 'northern mindanao colleges', 'human resources', '326424897-ID', 'a348ac', NULL, NULL),
(60, 'csucc member', 'logan', 'rivera', '1991-04-02', 'loganrivera567@example.com', 'employed', NULL, 'caraga state university cabadbaran campus', 'sociology', '555749845-ID', 'a8cfff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `name`, `description`, `location`, `start_date_time`, `profile_image`, `created_at`, `updated_at`) VALUES
(16, 1, 'Blood Donation', 'Blood donation is a voluntary act of giving blood, typically to be used for transfusions or to be processed into biopharmaceutical medications. This altruistic practice is crucial for maintaining a stable and safe blood supply in healthcare systems worldwide. Donated blood is essential for treating patients in various situations, including those undergoing surgery, cancer treatment, or managing chronic illnesses. It is also vital for emergency care in trauma cases, such as accidents or natural disasters.\r\n\r\nThe process of donating blood is straightforward and generally safe. It begins with a registration and a brief health screening to ensure the donor is eligible and healthy enough to donate. Once cleared, the donor\'s blood is collected using a sterile needle and typically takes about 10-15 minutes. After donation, donors are advised to rest briefly and consume refreshments to help replenish their energy.\r\n\r\nBlood donations are categorized into different types: whole blood donation, plasma donation, platelet donation, and double red cell donation. Each type serves different medical needs and can significantly impact patients\' lives. Whole blood donations are the most common and involve donating approximately one pint of blood. Plasma and platelet donations are critical for patients with clotting disorders or undergoing chemotherapy.\r\n\r\nRegular blood donation is encouraged, as blood has a limited shelf life and a continuous supply is necessary to meet ongoing patient needs. By donating blood, individuals contribute to saving lives and supporting the health and well-being of their communities.', 'Caraga State University Cabadbaran Campus Gym', '2024-05-22 10:56:30', 'event_profile_images/0UzWkgIDjKm3Zt7JoievQ7sut2s05dC6qPRrRXOM.jpg', '2024-05-22 02:56:45', '2024-05-22 03:12:02'),
(17, 1, 'Career Development Workshop: Charting Your Path to Success', 'Kickstart your professional journey with our comprehensive career development workshop! Whether you\'re exploring majors, searching for internships, or planning your post-graduation steps, this event offers invaluable insights and practical strategies to help you navigate the job market with confidence. From resume writing and interview skills to networking tips and industry trends, our expert speakers and interactive sessions will equip you with the tools you need to achieve your career goals. Don\'t miss this opportunity to take the next step towards a fulfilling and successful future!.', 'Caraga State University Cabadbaran Campus Gym', '2024-05-22 10:30:52', 'event_profile_images/A3EU1YL5HsKmfeiuhi59OHqkoM83DSbCDWk7sZ3X.png', '2024-05-22 02:58:46', '2024-05-22 03:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE `event_attendees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `attendee_id` bigint(20) UNSIGNED NOT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_attendees`
--

INSERT INTO `event_attendees` (`id`, `event_id`, `attendee_id`, `checkin`, `checkout`) VALUES
(352, 16, 2, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(353, 16, 3, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(354, 16, 4, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(355, 16, 5, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(356, 16, 6, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(357, 16, 7, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(358, 16, 8, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(359, 16, 9, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(360, 16, 10, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(361, 16, 11, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(362, 16, 12, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(363, 16, 13, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(364, 16, 14, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(365, 16, 15, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(366, 16, 16, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(367, 16, 17, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(368, 16, 18, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(369, 16, 19, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(370, 16, 20, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(371, 16, 21, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(372, 16, 22, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(373, 16, 23, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(374, 16, 24, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(375, 16, 25, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(376, 16, 26, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(377, 16, 27, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(378, 16, 28, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(379, 16, 29, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(380, 16, 30, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(381, 16, 31, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(382, 16, 32, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(383, 16, 33, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(384, 16, 34, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(385, 16, 35, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(386, 17, 2, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(387, 17, 3, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(388, 17, 4, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(389, 17, 5, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(390, 17, 6, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(391, 17, 7, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(392, 17, 8, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(393, 17, 9, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(394, 17, 10, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(395, 17, 11, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(396, 17, 12, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(397, 17, 13, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(398, 17, 14, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(399, 17, 15, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(400, 17, 16, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(401, 17, 17, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(402, 17, 18, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(403, 17, 19, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(404, 17, 20, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(405, 17, 21, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(406, 17, 22, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(407, 17, 23, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(408, 17, 24, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(409, 17, 25, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(410, 17, 26, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(411, 17, 27, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(412, 17, 28, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(413, 17, 29, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(414, 17, 30, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(415, 17, 31, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(416, 17, 32, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(417, 17, 33, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(418, 17, 34, '2024-05-22 11:20:54', '2024-05-22 11:20:54'),
(419, 17, 35, '2024-05-22 11:20:54', '2024-05-22 11:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_01_073348_create_events_table', 1),
(5, '2024_04_01_123922_create_attendees_table', 1),
(6, '2024_04_01_124128_create_event__attendees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1akx0JM3jskYd2axi6ai6VhkXtoFwBcm9bhLT1HX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ0p1a2FLdzVZUVZlM2l0TVVjVWlYdlpseXRHSkFMYVpEeHVRTnJubCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ldmVudC1hdHRlbmRlZXM/ZXZlbnRfaWQ9MTciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1716348086);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `valid_school_id_front` varchar(255) NOT NULL,
  `valid_school_id_back` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `valid_school_id_front`, `valid_school_id_back`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'User', 'test@example.com', '2024-05-10 22:04:40', '$2y$12$5Mw02yPD1Qml3BfiGxek7.xABqtSXrAX4G6dt1VPIVIneSxf/wcYm', 'https://via.placeholder.com/640x480.png/002299?text=alias', 'https://via.placeholder.com/640x480.png/005533?text=molestias', '26oO26NGsf0wuRr254nk4crpm3SBhajvz7WcEkSRGk8nvXVR8bgrdwAoZIYH', '2024-05-10 22:04:41', '2024-05-10 22:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendees_email_unique` (`email`),
  ADD UNIQUE KEY `attendees_unique_code_unique` (`unique_code`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_attendees_event_id_foreign` (`event_id`),
  ADD KEY `event_attendees_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `event_attendees`
--
ALTER TABLE `event_attendees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD CONSTRAINT `event_attendees_attendee_id_foreign` FOREIGN KEY (`attendee_id`) REFERENCES `attendees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_attendees_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
