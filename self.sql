-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 08:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `self`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'abc', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'English', '', NULL, NULL, NULL),
(5, 'Geography', 'all about maps', NULL, NULL, NULL),
(6, 'Math', '', NULL, NULL, NULL),
(7, 'Science', '', NULL, NULL, NULL),
(11, 'Computer', 'java', NULL, NULL, NULL),
(12, 'General knowledge', '', NULL, NULL, NULL),
(13, 'Politics', '', 1, NULL, NULL),
(14, 'General', '', 1, NULL, NULL),
(0, 'Bhavya', '900000dfgdf', 1, '2021-04-04 00:00:00', '2021-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `price`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'javadsas', '30', 1, '2021-03-21 00:00:00', '2021-03-21 00:00:00'),
(2, 'c++', '200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Python', '100', 1, '2021-04-10 00:00:00', '0000-00-00 00:00:00'),
(4, 'C', '40', 1, '2021-04-10 00:00:00', '0000-00-00 00:00:00'),
(5, 'Html', '30', 1, '2021-04-10 00:00:00', '0000-00-00 00:00:00'),
(6, 'Css', '50', 1, '2021-04-10 00:00:00', '0000-00-00 00:00:00'),
(7, 'JavaScript', '120', 1, '2021-04-10 00:00:00', '0000-00-00 00:00:00'),
(8, 'Bootstap', '100', 1, '2021-04-10 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`id`, `name`, `address`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Bhavya', '480/429 chottu ram nagar , line par , bahadurgarh jhajher haryana', 1, '2021-03-21 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bhavyaghgh', '480/429 chottu ram nagar , line par , bahadurgarh jhajher haryana', 1, '2021-03-21 00:00:00', '2021-03-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `userName` varchar(116) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `userType` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `userName`, `password`, `status`, `createdAt`, `updatedAt`, `userType`, `userId`) VALUES
(1, 'admin', 'f77f306aae6f5603ba4b0b07d08b11512e05733679369cbb368c7b2100951afd43e0b1f8b6c5989138ccd97f69f48a0b282f44321de7327e1a4998af0c41954296YzMKII6zIzBJUJacsbJxBATRVdftXdET5JmXUzy6c=', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', 0),
(2, 'admin2', 'bhavya123', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(5, 'bhavya.kumari208@gmail.com', 'dc978fe9fbf02c1a9a2be4208950bac82b5eeb4cf75ad9a517b9cffdab1a0ced78f7701eff0b6db67410e4b7237a6960572114e635d04eac7809251c9549b0d0p6In9iUYqdS2+FcujQ01Grn5llx0yOlh92qMsQHLqkU=', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'user', 3),
(6, 'bhavyakumari782@gmail.com', '5834a33e77140d38c9de4e01e13b2ee218c1fa6d632a0e1ecfe8144bbad48a33899203ac96159b2f8abebd92679cdab61495e4751cb96f40abf3ff58ab947afc+5ktjzXH1SB1ALrdmxVeh4U8cYBXQIJYsOXrixBR2M4=', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'user', 4),
(7, 'bhavya.kumari200@gmail.com', '3bb9484352ef7a90725d8beb47deada706f066bc412ea93ccdc96eef761614bf96fe2ea0927f3f9f270e3acab4b10ec1ab961e303e91e334cbad8dc375984b1fzFvDeh22ZjtlA96Ul6lvLtKVnIJg+F1AJKXjiULK3ak=', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'user', 5),
(8, 'bhavya.kumari20888@gmail.com', '816e6e0c1ee1ce2b61bb26f9436b3813da7a3bbbdc64f2341ce826fe4c630c9c5b0220727a1d902205ab2f3b444103fc9dac46c2d2def3fddd9e12c46e758d884fADzBymFcJYcpDvDBWd7Cbflk2nAHjvriAPoP8KVA0=', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'user', 6);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 358509498, 1076180171, 'hi'),
(2, 1076180171, 358509498, 'hlo'),
(3, 358509498, 1076180171, 'kese ho'),
(4, 1076180171, 358509498, 'me think ho'),
(5, 358509498, 1076180171, 'aap btyo'),
(6, 1076180171, 358509498, 'dfvdf'),
(7, 1076180171, 358509498, 'hlo'),
(8, 1076180171, 358509498, 'so gye kya'),
(9, 1076180171, 358509498, 'kha gye'),
(10, 1076180171, 358509498, 'kya hua'),
(11, 1076180171, 358509498, 'baat to karo'),
(12, 358509498, 1076180171, 'nhi nhi kuch nhi'),
(13, 1076180171, 358509498, 'gjkdhgh'),
(14, 1076180171, 358509498, 'hgdi'),
(15, 1076180171, 1489835708, 'hi'),
(16, 1489835708, 1038734630, 'hi\''),
(17, 1489835708, 1038734630, 'hlo'),
(18, 1076180171, 1038734630, 'fghfg');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `opt1` varchar(100) DEFAULT NULL,
  `opt2` varchar(100) DEFAULT NULL,
  `opt3` varchar(100) DEFAULT NULL,
  `opt4` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `Q_coin` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `answer`, `opt1`, `opt2`, `opt3`, `opt4`, `category`, `Q_coin`, `status`, `createdAt`, `updatedAt`) VALUES
(5, 'Jakarta is the capital of this country?', 'Indonesia', 'Vietnam', 'Myanmar', 'Java', 'Indonesia', 'General knowledge', 6, NULL, NULL, NULL),
(12, 'Which country was the largest iron ore producing country in 2020?', 'Australia', 'Australia', 'Brazil', 'China', 'India', 'General knowledge', 4, NULL, NULL, NULL),
(13, 'Which is considered to be the Worlds fastest sinking city?', 'Jakarta', 'Hanoi', 'Ho Chi Minh City', 'Jakarta', 'Pyongyang', 'General knowledge', 7, NULL, NULL, NULL),
(21, '&ldquo;Parliamentary Government&rdquo; is also known as....', 'All of the above', 'Cabinet Government', 'Westminster forms of government', 'Responsible Government', 'All of the above', 'General knowledge', 8, NULL, NULL, NULL),
(22, 'Which of the following statements is wrong?', 'There are only 98 topics in the center list at this time', 'Lok Sabha represents the people of India.', 'The Rajya Sabha represents the states.', 'There are only 98 topics in the center list at this time', 'Rajya Sabha protects the state with unnecessary interference from the Center', 'General knowledge', 4, NULL, NULL, NULL),
(23, 'Who was the founder of the Theosophical Society in India and started the Home Rule League?', 'Annie Besant', 'Annie Besant', 'Acharya Narendra Dev', 'Lal-Bal-Pal', 'None of the above', 'General knowledge', 8, NULL, NULL, NULL),
(24, 'Who was the 1st Prime Minister of India?', 'Pandit Jawaharlal Nehru', 'Pandit Jawaharlal Nehru', 'Lal Bahadur Shastri', 'Gulzar Lal Nanda ', 'None of the Above', 'General knowledge', 6, NULL, NULL, NULL),
(25, 'How many millions users facebook have?', '2047', '3500', '2047', '3265', '1800', 'General knowledge', 12, NULL, NULL, NULL),
(26, 'How many millions users whatsapp have?', '1200', '1300', '1400', '1000', '1200', 'General knowledge', 9, NULL, NULL, NULL),
(27, 'How many millions users LinkedIn have?', '106', '112', '160', '106', '121', 'General knowledge', 5, NULL, NULL, NULL),
(29, 'This meat is beautifully ________ - what recipe did you use?', 'mild', 'mild', 'soft', 'gentle', 'tender', 'English', 2, NULL, NULL, NULL),
(30, 'Please don\'t forget to ring me when you ________ home.', 'get', 'get', 'are going to get', 'will get', 'are getting', 'English', NULL, NULL, NULL, NULL),
(31, 'Did you have any problems ________ our house?', 'to find', 'to find', 'find', 'finding', 'or finding', 'English', NULL, NULL, NULL, NULL),
(32, 'It\'s a great place to live apart from the increasing volume of ________ that passes under my window every day.', 'circulation', 'transport', 'circulation', 'traffic', 'vehicle', 'English', NULL, NULL, NULL, NULL),
(33, 'Fiona is very angry ________ her boss\'s decision to sack several members of staff.', 'against', 'about', 'against', 'for', 'by', 'English', NULL, NULL, NULL, NULL),
(34, 'what is your name?', 'Pankaj', 'amit', 'saurabh', 'shivam', 'Pankaj', 'General', NULL, NULL, NULL, NULL),
(0, 'what is this?', 'pen', 'pen', 'c', 'r', 'd', 'General', 2, 1, '2021-04-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(67) NOT NULL,
  `speciality` varchar(56) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `speciality`, `status`, `createdAt`, `updatedAt`) VALUES
(2, 'shalu', 'java', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Swati', 'C++', 1, '2021-04-08 00:00:00', '0000-00-00 00:00:00'),
(4, 'tanya', 'php', 1, '2021-04-08 00:00:00', '0000-00-00 00:00:00'),
(5, 'sakshi ', 'html', 1, '2021-04-08 00:00:00', '0000-00-00 00:00:00'),
(6, 'schruchi756', 'C++', 1, '2021-04-09 00:00:00', '2021-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transactionId` varchar(78) NOT NULL,
  `transactionType` varchar(56) NOT NULL,
  `transactionFromTo` varchar(78) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `amount` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transactionId`, `transactionType`, `transactionFromTo`, `status`, `createdAt`, `updatedAt`, `userId`, `amount`) VALUES
(1, 'hftfsyt786', 'credit', 'admin', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, ''),
(2, '29', 'credit', 'Quiz', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '500'),
(3, '29', 'credit', 'Quiz', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '500'),
(4, '29', 'credit', 'Quiz', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '300'),
(5, '29', 'credit', 'Quiz', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '310');

-- --------------------------------------------------------

--
-- Table structure for table `used_ques`
--

CREATE TABLE `used_ques` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quesId` int(11) NOT NULL,
  `sel_ans` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `used_ques`
--

INSERT INTO `used_ques` (`id`, `userId`, `quesId`, `sel_ans`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 20, 'cut', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 30, 'cover', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 35, 'look', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 31, 'went', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 3, 29, 'mild', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `otp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `number`, `email`, `status`, `createdAt`, `updatedAt`, `otp`) VALUES
(3, 'Bhavya . Kumari', '7428728220', 'bhavya.kumari208@gmail.com', 1, '2021-03-27 00:00:00', '0000-00-00 00:00:00', '97103'),
(4, 'Bhavya . Kumari', '7428728220', 'bhavyakumari782@gmail.com', 1, '2021-03-28 00:00:00', '0000-00-00 00:00:00', '47780'),
(5, 'Bhavya . Kumari', '9319375001', 'bhavya.kumari200@gmail.com', 1, '2021-04-09 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Bhavya . Kumari', '9319375001', 'bhavya.kumari20888@gmail.com', 1, '2021-04-12 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 358509498, 'Bhavya', 'Kumari', 'bhavyakumari782@gmail.com', 'ac1805f7c7f060571802b4e076b1f64a', '1617120088B1.jpg', 'Active now'),
(2, 1076180171, 'kumar', 'kumar', 'bhavya878@gmail.com', 'eebcda4a99f2885ac9fbeb39e9219a0c', '1617120174IMG_20191216_232106.jpg', 'Offline now'),
(3, 1489835708, 'shali', 'kumari', 'bhavya02@gmail.com', 'ac1805f7c7f060571802b4e076b1f64a', '1617121527IMG_20200301_104556_675.jpg', 'Active now'),
(4, 1038734630, 'Bhavya', 'Kumari', 'bhavya.kumari208@gmail.com', 'ac1805f7c7f060571802b4e076b1f64a', '1617523637B1.jpg', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `amount` varchar(35) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `userId`, `amount`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 3, '310', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_ques`
--
ALTER TABLE `used_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `used_ques`
--
ALTER TABLE `used_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
