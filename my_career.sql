-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2026 at 07:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'Career@gmail.com', 'MyCareerMyFuture');

-- --------------------------------------------------------

--
-- Table structure for table `career_paths`
--

CREATE TABLE `career_paths` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  `more_info` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `career_paths`
--

INSERT INTO `career_paths` (`id`, `name`, `description`, `more_info`) VALUES
(1, 'Photographer', 'Capture and edit images for clients, events, or personal projects using professional camera equipment.', 'Photographers work in various fields such as weddings, fashion, journalism, and commercial advertising. Strong editing skills and a creative eye are essential.'),
(2, 'Photojournalist', 'Document news and current events through compelling photographs for media outlets and publications.', 'Photojournalists often work in fast-paced or challenging environments. They must combine storytelling instincts with technical photography skills.'),
(3, 'Content Creator', 'Produce visual and multimedia content for social media, brands, and digital platforms.', 'Content creators build audiences across platforms like Instagram, YouTube, and TikTok. Skills in editing, branding, and audience engagement are key.'),
(4, 'Librarian', 'Manage and organize library collections and help people access information and resources.', 'Librarians work in public, school, or academic libraries. Strong organizational skills and a passion for knowledge are key.'),
(5, 'Editor', 'Review and refine written content for clarity, accuracy, and style across various media.', 'Editors work in publishing, journalism, and digital media. Attention to detail and strong language skills are essential.'),
(6, 'Researcher', 'Conduct in-depth investigations and gather information to support academic, scientific, or business goals.', 'Researchers work in universities, think tanks, and corporations. Critical thinking and the ability to synthesize information are vital.'),
(7, 'Journalist', 'Research and report on news, events, and stories for print, broadcast, or digital media.', 'Journalists need strong writing, research, and interviewing skills. The field has expanded into digital and multimedia platforms.'),
(8, 'Copywriter', 'Write persuasive and engaging content for advertising, marketing, and brand communication.', 'Copywriters work in agencies, in-house teams, or freelance. Creativity, adaptability, and understanding of audience are key.'),
(9, 'Author', 'Write original books, stories, or long-form content for publication in print or digital formats.', 'Authors may write fiction, non-fiction, or academic works. Building a readership and consistent writing habits are important for success.'),
(10, 'Graphic Designer', 'Create visual content including logos, layouts, and illustrations for print and digital media.', 'Graphic designers work in agencies, studios, or freelance. Proficiency in Adobe Suite is typically expected.'),
(11, 'Illustrator', 'Produce original artwork for books, advertising, games, and other visual media.', 'Illustrators may work digitally or traditionally. Building a strong portfolio is crucial for career growth.'),
(12, 'Animator', 'Create moving images and visual effects for film, games, advertising, and digital content.', 'Animators work in studios, game companies, or freelance. Proficiency in tools like Adobe Animate, Blender, or Maya is commonly required.'),
(13, 'Musician', 'Perform, compose, or record music for live audiences, recordings, or digital platforms.', 'Musicians may work as soloists, in bands, or as session artists. Consistent practice and networking are essential for a sustainable career.'),
(14, 'Music Producer', 'Oversee and guide the recording, mixing, and production of music tracks and albums.', 'Music producers work in studios or independently using digital audio workstations. A strong ear for sound and technical knowledge are key.'),
(15, 'Music Teacher', 'Teach music theory, instruments, or vocal techniques to students of all ages and skill levels.', 'Music teachers work in schools, music academies, or private settings. Patience, communication, and deep musical knowledge are essential.'),
(16, 'Athlete', 'Compete professionally in a sport, training consistently to perform at the highest level.', 'Athletes dedicate their lives to physical training and competition. Career longevity requires discipline, injury management, and mental resilience.'),
(17, 'Sports Coach', 'Train and guide athletes or teams to improve their performance and achieve competitive goals.', 'Sports coaches work at school, club, or professional levels. Leadership, motivational skills, and deep sport knowledge are required.'),
(18, 'Sports Journalist', 'Report on sporting events, athletes, and sports industry news for media outlets.', 'Sports journalists combine a passion for sports with strong writing and reporting skills. They work across print, broadcast, and digital platforms.'),
(19, 'Game Developer', 'Design and build video games, writing code and creating systems for interactive experiences.', 'Game developers work in studios or independently. Proficiency in engines like Unity or Unreal, and programming languages like C#, are commonly required.'),
(20, 'Game Designer', 'Conceptualize and design gameplay mechanics, levels, and player experiences for video games.', 'Game designers focus on the creative and structural side of games. Strong storytelling, logic, and player psychology skills are important.'),
(21, 'Esports Player', 'Compete professionally in video game tournaments at a national or international level.', 'Esports players train intensively, often as part of a team. Strong game mechanics, strategic thinking, and mental fortitude are key.'),
(22, 'Chef', 'Prepare and cook food professionally in restaurants, hotels, or catering environments.', 'Chefs may specialize in specific cuisines or techniques. Creativity, stamina, and strong kitchen management skills are essential.'),
(23, 'Food Blogger', 'Create and share recipes, food reviews, and culinary content across digital platforms.', 'Food bloggers combine cooking passion with content creation skills. Photography, writing, and social media skills help grow an audience.'),
(24, 'Nutritionist', 'Advise individuals and organizations on diet, nutrition, and healthy eating habits.', 'Nutritionists work in clinics, hospitals, schools, or private practice. A science background and strong communication skills are important.'),
(25, 'Agricultural Engineer', 'Apply engineering principles to improve farming equipment, processes, and systems.', 'Agricultural engineers work on irrigation, machinery, and sustainable farming solutions. Strong technical and problem-solving skills are required.'),
(26, 'Farm Manager', 'Oversee the daily operations of a farm, managing crops, livestock, staff, and budgets.', 'Farm managers need both practical farming knowledge and business management skills. Experience in agriculture and leadership are key.'),
(27, 'Agronomist', 'Study and advise on crop production, soil health, and farming practices to improve yields.', 'Agronomists work with farmers, government agencies, or research institutions. A strong background in plant science and soil management is essential.'),
(28, 'Film Director', 'Lead the creative vision of a film or video production, guiding the cast and crew.', 'Film directors work in cinema, television, or digital media. Strong storytelling instincts, leadership, and visual communication skills are vital.'),
(29, 'Screenwriter', 'Write scripts and screenplays for films, TV shows, or digital video content.', 'Screenwriters must understand narrative structure, dialogue, and visual storytelling. Persistence and the ability to accept feedback are key.'),
(30, 'Film Critic', 'Analyze and review films for publications, websites, or broadcast media.', 'Film critics combine a deep knowledge of cinema with strong writing skills. Building a credible voice and audience is important for career growth.'),
(31, 'Web Developer', 'Build and maintain websites or web applications using code.', 'Web developers use languages like HTML, CSS, and JavaScript to create functional websites for businesses.'),
(32, 'Database Administrator', 'Manage, store, and secure data using specialized software.', 'They ensure that data is organized, easy to retrieve, and protected from unauthorized access or loss.'),
(33, 'SEO Specialist', 'Improve website visibility on search engines like Google.', 'They analyze trends and optimize website content to increase organic traffic and improve search rankings.');

-- --------------------------------------------------------

--
-- Table structure for table `career_path_interests`
--

CREATE TABLE `career_path_interests` (
  `id` int UNSIGNED NOT NULL,
  `career_path_id` int UNSIGNED NOT NULL,
  `interest_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `career_path_interests`
--

INSERT INTO `career_path_interests` (`id`, `career_path_id`, `interest_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 4),
(11, 11, 4),
(12, 12, 4),
(13, 13, 5),
(14, 14, 5),
(15, 15, 5),
(16, 16, 6),
(17, 17, 6),
(18, 18, 6),
(19, 19, 7),
(20, 20, 7),
(21, 21, 7),
(22, 22, 8),
(23, 23, 8),
(24, 24, 8),
(25, 25, 9),
(26, 26, 9),
(27, 27, 9),
(28, 28, 10),
(29, 29, 10),
(30, 30, 10),
(31, 31, 11),
(32, 32, 11),
(33, 33, 11);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int UNSIGNED NOT NULL,
  `user_private_id` int UNSIGNED NOT NULL,
  `career_path_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_private_id`, `career_path_id`) VALUES
(1, 1, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `name`) VALUES
(11, 'Coding'),
(8, 'Cooking'),
(4, 'Drawing'),
(9, 'Farming'),
(1, 'Photography'),
(7, 'Playing games'),
(5, 'Playing music'),
(2, 'Reading'),
(6, 'Sports'),
(10, 'Watching movies'),
(3, 'Writing');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int UNSIGNED NOT NULL,
  `user_private_id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `school` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_private_id`, `name`, `gender`, `class`, `school`) VALUES
(1, 1, 'Test User', 'male', 'XII IPA 1', 'SMAN 1 Pontianak'),
(3, 4, 'Edward', 'male', 'XI TKJ 3', 'XI TKJ 3'),
(4, 5, 'EdwardH', 'male', 'XI TKJ 3', 'SMK'),
(5, 6, 'test2', 'male', 'test2', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` int UNSIGNED NOT NULL,
  `user_info_id` int UNSIGNED NOT NULL,
  `interest_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`id`, `user_info_id`, `interest_id`) VALUES
(1, 1, 1),
(10, 3, 2),
(9, 4, 2),
(8, 4, 4),
(11, 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_private`
--

CREATE TABLE `user_private` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_private`
--

INSERT INTO `user_private` (`id`, `email`, `phone_number`, `password`) VALUES
(1, 'test@mycareer.com', '081234567890', '$2y$10$DummyHashedPasswordHere1234567890'),
(4, 'edwardhansreinaldo@gmail.com', '089502619901', '$2y$10$MzMKpYr1Gf0reC.c7kshceUwwLUayB8huC/NTXj3l9FlKAaxoQgQ2'),
(5, 'edwardhansreinaldoo@gmail.com', '089502619901', '$2y$10$9DZBhJea8FcaMIk5kqKOH.CQA4W9SUneNTSsDCyxhGltK3/wPyfTW'),
(6, 'test2@gmail.com', '1234567890', '$2y$10$wVN6bORq1s2tCTdB98MfVOFSUdldKOVDTTB2ShgCHLzXHCn09S3O2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `career_paths`
--
ALTER TABLE `career_paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_path_interests`
--
ALTER TABLE `career_path_interests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_cp_interest` (`career_path_id`,`interest_id`),
  ADD KEY `interest_id` (`interest_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_favorite` (`user_private_id`,`career_path_id`),
  ADD KEY `career_path_id` (`career_path_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_private_id` (`user_private_id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_interest` (`user_info_id`,`interest_id`),
  ADD KEY `interest_id` (`interest_id`);

--
-- Indexes for table `user_private`
--
ALTER TABLE `user_private`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_paths`
--
ALTER TABLE `career_paths`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `career_path_interests`
--
ALTER TABLE `career_path_interests`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_private`
--
ALTER TABLE `user_private`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career_path_interests`
--
ALTER TABLE `career_path_interests`
  ADD CONSTRAINT `cpi_ibfk_1` FOREIGN KEY (`career_path_id`) REFERENCES `career_paths` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cpi_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fav_ibfk_1` FOREIGN KEY (`user_private_id`) REFERENCES `user_private` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fav_ibfk_2` FOREIGN KEY (`career_path_id`) REFERENCES `career_paths` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `ui_ibfk_1` FOREIGN KEY (`user_private_id`) REFERENCES `user_private` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `uint_ibfk_1` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uint_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
