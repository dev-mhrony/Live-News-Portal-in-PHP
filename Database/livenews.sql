-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2023 at 07:57 AM
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
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1= active. 0= Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `bio`, `status`) VALUES
(1, 'cpr', '<p style=\"text-align: center;\"> CopyRight by <a href=\"https://www.youtube.com/@codecampbdofficial\">Code Camp BD</a> Design and Developer <a href=\"https://developerrony.com\">MH RONY</a> All Resalve\n                <?php echo \"20\".date(\"y\"); ?></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int NOT NULL,
  `AdminUserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '8171fce4af3ee0aa62fc6924e940520f', 'admin@gmail.com', 1, '2022-12-12 18:30:00', '2023-02-14 07:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'ENTERTAINMENT', 'ENTERTAINMENT', '2022-12-13 17:26:13', '2022-12-13 17:41:07', 1),
(2, 'TECHNOLOGY', 'TECHNOLOGY', '2022-12-13 17:36:33', NULL, 1),
(3, 'LIFESTYLE', 'LIFESTYLE', '2022-12-13 17:36:50', NULL, 1),
(4, 'POLITICAL', 'POLITICAL', '2022-12-13 17:37:23', NULL, 1),
(5, 'SPORTS', 'SPORTS', '2022-12-13 17:37:48', NULL, 1),
(6, 'SPIRITUAL', 'SPIRITUAL', '2022-12-16 11:32:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int NOT NULL,
  `postId` int DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(1, 4, 'MH RONY', 'developer.mhrony@gmail.com', 'hi', '2022-12-16 11:20:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `Description` longtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<p><b><span style=\"font-family: &quot;Arial Black&quot;;\">MH RONY</span></b>. is an experienced freelance web developer who specializes in technologies like PHP, Laravel, Dart, Flutter, and Python. He has been working with these technologies for over 3 years and has a proven track record of delivering successful projects. MH RONY is well-versed in the latest advancements in web development and can handle any project from simple static websites to complex web applications. She has a passion for creating high-quality products that are tailored to her client\'s needs. With her expertise, she can help you create a website or application that is both secure and user-friendly.</p><p><br></p><p>For students or anyone else who needs a program or source code for thesis writing or any Professional Software Development, Website Development, or Academic Project Development at an affordable cost contact me at <b>developer.mhrony@gmail.com</b></p>', '2021-06-29 18:30:00', '2023-02-12 08:16:30'),
(2, 'contactus', 'Contact Details', '<p style=\"text-align: center;\"><br></p><p style=\"text-align: center; \"><b>Name:&nbsp; MH RONY</b></p><p style=\"text-align: center; \"></p><p style=\"text-align: center; \"><b>Address :&nbsp; Bogura, Bangladesh.</b></p><div style=\"text-align: center;\"><b>Phone Number : +880 1608445456</b></div><p></p><p style=\"text-align: center;\"><b>Email -id : developer.mhrony@gmail.com</b></p>', '2021-06-29 18:30:00', '2023-02-14 07:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int NOT NULL,
  `PostTitle` longtext,
  `CategoryId` int DEFAULT NULL,
  `SubCategoryId` int DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL,
  `PostUrl` mediumtext,
  `PostImage` varchar(255) DEFAULT NULL,
  `viewCounter` int DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `viewCounter`, `postedBy`, `lastUpdatedBy`) VALUES
(1, 'Team India on top as Bangladesh two wickets away from getting bowled out', 5, 4, '<p>Team India were humbled 2-1 by a resurgent Bangladesh team in the three-match ODI series which the visitors managed to end on a high thanks to Ishan Kishanâ€™s record double century. The Indian cricket team will now want to switch gears to prepare themselves for red-ball cricket as the first Test against Bangladesh gets underway in Chattogram on Wednesday (December 14). India will resume on 278/6 on Day 2 of the first Test on Thursday (December 15).</p><p>The Indian side will be led by KL Rahul with regular skipper Rohit Sharma ruled out after dislocating his thumb in the second ODI against Bangladesh last week. Shubman Gill is expected to take Rohitâ€™s place at the top of the order alongside stand-in skipper Rahul.<br></p><p>Bangladesh, on the other hand, will be led by veteran all-rounder Shakib al Hasan with Tamim Iqbal missing both the ODI and the Test series with injury. The home side will have their task cut out against the world No. 2-ranked Test side India as they eye first-ever Test match win over them.</p><p>India have promised to play aggressive cricket, much like Englandâ€™s â€˜Bazballâ€™ model which has powered them to a Test series win over Babar Azamâ€™s Pakistan. India need win at least 5 of the next 6 upcoming Tests, which includes the next two Test matches against Bangladesh to assure them of a qualification spot in the World Test Championships final next year.</p><p>The Indian side is injury-hit with the likes of Mohammed Shami and Ravindra Jadeja also ruled out with injury apart from skipper Rohit. It will be interesting to see if Jaydev Unadkat will make a return to Test cricket after a gap of 12 years. Mohammed Siraj and Umesh Yadav will be expected the carry the pace-bowling load while Ravichandran Ashwin and Kuldeep Yadav will team up in the spin bowling department.</p><p>Check all the LIVE Scores and Updates from Day 1 of 1st Test between India and Bangladesh here.</p>', '2022-12-15 18:08:34', NULL, 1, 'Team-India-on-top-as-Bangladesh-two-wickets-away-from-getting-bowled-out', '1167610aa17b0813233fe82d99403e41.jpg', NULL, 'admin', NULL),
(2, 'Creative Christmas gift ideas for kids', 3, 8, '<p>With Christmas, a few weeks from now, planning a gift for your kids can be a task quite challenging. Worry not! We have a few ideas for all the parents who are looking for those creative gifts to make their kids Xmas merry.<br></p><div><br></div><p>Being unprepared for Christmas is the very last thing you want. Start looking for presents now, or at the very least start thinking about ideas, rather than waiting until the last minute and this guide is your saviour.<br></p>', '2022-12-15 18:14:00', NULL, 1, 'Creative-Christmas-gift-ideas-for-kids', '646c8915fc1096c12b679108e7022df9.jpg', NULL, 'admin', NULL),
(3, 'Petrol prices still high in your city? Centre blames THESE for costly fuel', 4, 9, '<p>The minister said, currently the petrol price in India is one of the lowest. He said the oil marketing companies together suffered losses of Rs 27,276 crore due to high prices of crude in international markets.</p><p><br></p><p>Six states - West Bengal, Tamil Nadu, Andhra Pradesh, Telengana, Kerala, and Jharkhand - have not reduced the VAT, he said amidst vocal protests by the opposition members. The minister said, currently the petrol price in India is one of the lowest.&nbsp;</p>', '2022-12-15 18:16:46', '2022-12-15 18:29:46', 1, 'Petrol-prices-still-high-in-your-city?-Centre-blames-THESE-for-costly-fuel', 'c1ae896415041d9173d4935145243c14.jpg', 1, 'admin', NULL),
(4, 'Lionel Messi to Kylian Mbappe: Race to FIFA World Cup 2022 Golden Boot, in PICS', 5, 5, '<p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p><br></p>', '2022-12-15 18:22:51', '2022-12-16 11:20:07', 1, 'Lionel-Messi-to-Kylian-Mbappe:-Race-to-FIFA-World-Cup-2022-Golden-Boot,-in-PICS', 'cefb64713b6ae016047d3bcd8a38e1cc.jpg', 2, 'admin', NULL),
(5, 'Twitter suspends journalists from NYT, Washington Post and others covering Elon Musk: Report', 2, 11, 'The Washington Posts Drew Harwell, alongside other banned reporters, was able to participate in a Twitter Spaces audio session while under suspension, exposing a loophole in Twitter’s enforcement.\r\n\r\n\r\nTwitter Inc. suspended the accounts of upstart rival service Mastodon and several prominent journalists covering the social network’s billionaire owner Elon Musk.\r\n\r\nLate Thursday, reporters from publications including the Washington Post, the New York Times, Mashable and CNN were listed as blocked and their tweets were no longer visible, with the companys standard notice saying it suspends accounts that violate the Twitter rules.\r\n\r\nAlso affected was sports and political commentator Keith Olbermann. Musk said Olbermann will be subject to a 7-day suspension for doxxing. In a separate tweet, he alleged the suspended journalists had posted his exact real-time location, describing the information as basically assassination coordinates.', '2022-12-16 11:34:26', '2023-02-14 07:28:34', 1, 'Twitter-suspends-journalists-from-NYT,-Washington-Post-and-others-covering-Elon-Musk:-Report', 'd7c9faa1953eebd19b2ae47f7f201858.jpg', 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int NOT NULL,
  `CategoryId` int DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 1, 'BOLLYWOOD', 'BOLLYWOOD', '2022-12-13 17:26:52', '2022-12-13 17:42:55', 1),
(2, 1, 'HOLLYWOOD', 'HOLLYWOOD', '2022-12-13 17:27:09', NULL, 1),
(3, 1, 'TELEVISION', 'TELEVISION', '2022-12-13 17:27:35', NULL, 1),
(4, 5, 'CRICKET', 'CRICKET', '2022-12-13 17:39:12', NULL, 1),
(5, 5, 'FOOTBALL', 'FOOTBALL', '2022-12-13 17:39:33', NULL, 1),
(6, 5, 'TENNIS', 'TENNIS', '2022-12-13 17:39:53', NULL, 1),
(7, 5, 'WWE', 'WWE', '2022-12-13 17:40:17', NULL, 1),
(8, 3, 'Culture', 'Culture', '2022-12-15 18:10:39', NULL, 1),
(9, 4, 'Economy', 'Economy', '2022-12-15 18:15:11', NULL, 1),
(10, 6, 'HINDUISM', 'HINDUISM', '2022-12-16 11:32:56', NULL, 1),
(11, 2, 'SOCIAL MEDIA', 'SOCIAL MEDIA', '2022-12-16 11:33:27', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AdminUserName` (`AdminUserName`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postcatid` (`CategoryId`),
  ADD KEY `postsucatid` (`SubCategoryId`),
  ADD KEY `subadmin` (`postedBy`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `catid` (`CategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `tblposts` (`id`);

--
-- Constraints for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`),
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory` (`SubCategoryId`),
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`postedBy`) REFERENCES `tbladmin` (`AdminUserName`);

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
