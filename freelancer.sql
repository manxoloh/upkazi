-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2017 at 12:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cover_letter` text NOT NULL,
  `resume` text NOT NULL,
  `service_fee` float NOT NULL,
  `freelancer_earn` float NOT NULL,
  `award_status` varchar(255) NOT NULL DEFAULT 'NOT AWARDED',
  `completion_status` varchar(255) NOT NULL DEFAULT 'NOT COMPLETED',
  `freelancer_payment_status` varchar(255) NOT NULL DEFAULT 'NOT PAID',
  `application_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `applicant_id`, `client_id`, `project_id`, `cover_letter`, `resume`, `service_fee`, `freelancer_earn`, `award_status`, `completion_status`, `freelancer_payment_status`, `application_date`) VALUES
(37, 1, 1, 3, '<p>fiugfuiiuiyg</p>', '<p>fiugfuiiuiyg</p>', 6000, 24000, 'NOT AWARDED', 'COMPLETED', 'NOT PAID', '2017-08-14 10:12:15'),
(40, 1, 1, 1, '<p>i want this job</p>', '<p>i want this job</p>', 40000, 160000, 'NOT AWARDED', 'NOT COMPLETED', 'NOT PAID', '2017-08-17 06:39:53'),
(41, 1, 1, 2, '<p>hguyioiuih</p>', '<p>hguyioiuih</p>', 10000, 40000, 'NOT AWARDED', 'NOT COMPLETED', 'NOT PAID', '2017-08-17 11:07:16'),
(45, 1, 1, 6, '<p>dfdhkfjldkf</p>', '<p>bjpojh</p>', 69131.2, 276525, 'AWARDED', 'NOT COMPLETED', 'NOT PAID', '2017-09-09 09:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Admin Support'),
(2, 'Design, Art & Multimedia'),
(7, 'Engineering & Architecture'),
(8, 'Legal'),
(5, 'Management & Finance'),
(9, 'Other'),
(6, 'Sales & Marketing'),
(1, 'Web Development & IT'),
(3, 'Writing & Translation');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institution_type`
--

CREATE TABLE `institution_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution_type`
--

INSERT INTO `institution_type` (`id`, `name`) VALUES
(1, 'University'),
(2, 'College'),
(3, 'Secondary'),
(4, 'Primary'),
(5, 'Vocation Training Institute'),
(6, 'Technical Training Institute');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'DRAFT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `subject`, `body`, `attachment`, `timestamp`, `status`) VALUES
(3, 'maithyakavyu@outlook.com', 'maithyaknife@gmail.com', 'heloo', 'helloooo', '', '2017-08-20 19:11:50', 'DRAFT'),
(4, 'maithyakavyu@outlook.com', 'maithyakavyu@outlook.com', 'Solooo', 'maniii', '', '2017-08-20 19:14:03', 'DRAFT'),
(5, 'maithyakavyu@outlook.com', 'maithyakavyu@outlook.com', 'Solooo', 'maniii', 'ghjjkkk', '2017-08-20 19:14:20', 'DRAFT');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1501361883),
('m130524_201442_init', 1501361888);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `responsibilities` text,
  `requirements` text,
  `budget` float NOT NULL,
  `location` varchar(255) NOT NULL DEFAULT 'Kenya',
  `document` varchar(255) DEFAULT NULL,
  `reference_token` varchar(255) DEFAULT NULL,
  `pesapal_traking_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'NOT PAID',
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `expected_start_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `cat_id`, `client_id`, `project_name`, `project_description`, `responsibilities`, `requirements`, `budget`, `location`, `document`, `reference_token`, `pesapal_traking_id`, `payment_method`, `payment_status`, `status`, `expected_start_date`, `expected_delivery_date`, `date_posted`) VALUES
(1, 1, 1, 'Code Ebay store and listing design to be mobile responsive.', '<p>Description of every page/module: I have a PSD ebay store and listing design in photoshop that needs to be sliced and coded for eBay to be mobile responsive. Description of requirements/features: Mobile Responsive Ebay store and listing design...</p>', '<ul>\r\n<li>Description of every page/module:</li>\r\n<li>I have a PSD ebay store and listing design in photoshop that needs to be sliced and coded for eBay to be mobile responsive.</li>\r\n<li>Description of requirements/features:</li>\r\n<li>Mobile Responsive Ebay store and listing design...</li>\r\n</ul>', '<p>Description of every page/module: I have a PSD ebay store and listing design in photoshop that needs to be sliced and coded for eBay to be mobile responsive. Description of requirements/features: Mobile Responsive Ebay store and listing design...</p>', 15000, 'Kenya', '', NULL, NULL, NULL, 'NOT PAID', 'COMPLETED', '2017-08-10', '2017-08-30', '2017-08-19 18:54:30'),
(2, 2, 1, 'I need an architect for exterior design of a duplex house.', 'Design details: Ultra modern 3D for both interior and exterior of the duplex house. The design must be STRIKING visually without necessarily being expensive. Orbiting view is welcomed but not mandatory. Ideas for the visual style: must be ultra modern without being necsessarily expensive...', '', NULL, 50000, 'Kenya', NULL, NULL, NULL, NULL, 'NOT PAID', 'AWARDED', '2017-08-17', '2017-08-31', '2017-08-17 20:15:41'),
(3, 2, 1, 'I need an architect for exterior design of a duplex house.', 'Design details: Ultra modern 3D for both interior and exterior of the duplex house. The design must be STRIKING visually without necessarily being expensive. Orbiting view is welcomed but not mandatory. Ideas for the visual style: must be ultra modern without being necsessarily expensive...', '', NULL, 30000, 'Kenya', NULL, NULL, NULL, NULL, 'NOT PAID', 'AWARDED', '2017-08-17', '2017-08-31', '2017-08-17 20:20:50'),
(6, 4, 1, 'ujyuyu', '<p>All rights reserved. No part of this work may be reproduced or transmitted in any form or by any means, electronic or mechanical, including photocopying, recording, or by any information storage or retrieval system, without the prior written permission of the copyright owner and the publisher. ISBN-13 (pbk): 978-1-4302-3114-1 ISBN-13 (electronic): 978-1-4302-3115-8 Printed and bound in the United States of America 9 8 7 6 5 4 3 2 1 Trademarked names, logos, and images may appear in this book. Rather than use a trademark symbol with every occurrence of a trademarked name, logo, or image we use the names, logos, and images only in an editorial fashion and to the benefit of the trademark owner, with no intention of infringement of the trademark. The use in this publication of trade names, trademarks, service marks, and similar terms, even if they are not identified as such, is not to be taken as an expression of opinion as to whether or not they are subject to proprietary rights.</p>', '<p>All rights reserved. No part of this work may be reproduced or transmitted in any form or by any means, electronic or mechanical, including photocopying, recording, or by any information storage or retrieval system, without the prior written permission of the copyright owner and the publisher. ISBN-13 (pbk): 978-1-4302-3114-1 ISBN-13 (electronic): 978-1-4302-3115-8 Printed and bound in the United States of America 9 8 7 6 5 4 3 2 1 Trademarked names, logos, and images may appear in this book. Rather than use a trademark symbol with every occurrence of a trademarked name, logo, or image we use the names, logos, and images only in an editorial fashion and to the benefit of the trademark owner, with no intention of infringement of the trademark. The use in this publication of trade names, trademarks, service marks, and similar terms, even if they are not identified as such, is not to be taken as an expression of opinion as to whether or not they are subject to proprietary rights.</p>', '<p>All rights reserved. No part of this work may be reproduced or transmitted in any form or by any means, electronic or mechanical, including photocopying, recording, or by any information storage or retrieval system, without the prior written permission of the copyright owner and the publisher. ISBN-13 (pbk): 978-1-4302-3114-1 ISBN-13 (electronic): 978-1-4302-3115-8 Printed and bound in the United States of America 9 8 7 6 5 4 3 2 1 Trademarked names, logos, and images may appear in this book. Rather than use a trademark symbol with every occurrence of a trademarked name, logo, or image we use the names, logos, and images only in an editorial fashion and to the benefit of the trademark owner, with no intention of infringement of the trademark. The use in this publication of trade names, trademarks, service marks, and similar terms, even if they are not identified as such, is not to be taken as an expression of opinion as to whether or not they are subject to proprietary rights.</p>', 345656, 'nairobi', '', NULL, NULL, 'MPESA', 'PAID', 'AWARDED', '2017-08-22', '2017-08-31', '2017-09-09 10:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

CREATE TABLE `project_files` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'PENDING',
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_files`
--

INSERT INTO `project_files` (`id`, `project_id`, `submitted_by`, `filename`, `status`, `submission_date`) VALUES
(6, 1, 1, '36714-maithyaknife@gmail.com-solomon-maithya-kavyu-cv (1).docx', 'REJECTED', '2017-08-20 21:12:37'),
(7, 1, 1, '36714-maithyaknife@gmail.com-solomon-maithya-kavyu-cv.docx', 'ACCEPTED', '2017-08-20 21:12:56'),
(8, 1, 1, '19408-maithyaknife@gmail.com-solomon-maithya-kavyu-cv.docx', 'ACCEPTED', '2017-08-20 21:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `project_skills`
--

CREATE TABLE `project_skills` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_skills`
--

INSERT INTO `project_skills` (`id`, `project_id`, `skill_id`) VALUES
(1, 6, 2),
(2, 6, 3),
(3, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill_set`
--

CREATE TABLE `skill_set` (
  `skill_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '9',
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_set`
--

INSERT INTO `skill_set` (`skill_id`, `cat_id`, `skill_name`) VALUES
(1, 1, 'Design'),
(2, 1, '3D Modelling'),
(3, 1, 'Architect Design'),
(4, 1, 'Ultra modern Designs'),
(5, 1, 'Photoshop'),
(6, 1, 'Graphic Design'),
(7, 1, 'Abobe Ilustrator'),
(8, 1, 'Video Edit'),
(9, 1, 'Fast Typing'),
(10, 1, 'Copy Editing'),
(11, 1, 'SEO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `account_activation_token`, `password_reset_token`, `email`, `usertype`, `status`, `created_at`, `updated_at`) VALUES
(1, 'solomon', '31Aes0_tRQ1SUMbfUeBsKxpw3tmiQoBt', '$2y$13$vZMJNkx/lpPiEHukrYQ5jeWeayqiHUH84V2iUZ/vy5LS5YNyVxwie', NULL, NULL, 'maithyakavyu@outlook.com', 'Client', 10, 1501525345, 1504949360),
(16, 'manxoloh', 'PZA8AAjpqLX4_jwf0MAtzA8FLiJqV12u', '$2y$13$FDh.wzIgGO6GWSBzs6RtmOfpsfwSEVq.uWrBwueD.PHXC/stlIZVO', NULL, NULL, 'maithyaknife@gmail.com', 'Freelancer', 10, 1504949616, 1504949643);

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `institution_category` varchar(255) NOT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`id`, `user_id`, `course_name`, `institution`, `from_date`, `to_date`, `institution_category`, `certificate`, `created_at`, `updated_at`) VALUES
(3, 1, 'Computer Science', 'Laikipia', '2012-09-03', '2016-05-20', 'University', '', '2017-08-16 12:12:39', NULL),
(5, 1, 'KCPE', 'Thokoa', '1999-01-01', '2011-05-20', 'Primary', '', '2017-08-16 12:51:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `avator` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT 'Kenya',
  `city` varchar(255) NOT NULL,
  `about` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `avator`, `firstname`, `middlename`, `lastname`, `phone`, `website`, `country`, `city`, `about`, `created_at`, `updated_at`) VALUES
(11, 1, 'maithyakavyu@outlook.com.png', 'solomon', 'maithya', 'Kavyu', '0704400725', 'www.union.co.ke', 'Kenya', 'Nairobi', '<p>If the e-commerce site isn&rsquo;t comparing cookie information to a specific IP address (a safeguard that would likely be uncommon on a site that has decided to ignore data sanitization), all the attacker has to do is assemble the cookie data into a format supported by the browser, and then return to the site from which the information was culled. Chances are the attacker is now masquerading as the innocent user, potentially making unauthorized purchases, defacing the forums, and wreaking other havoc. <br />Sanitizing User Input Given the frightening effects that unchecked user input can have on a web site and its users, one would think that carrying out the necessary safeguards must be a particularly complex task. After all, the problem is so prevalent within web applications of all types, so prevention must be quite difficult, right? Ironically, preventing these types of attacks is really a trivial affair, accomplished by first passing the input through one of several functions before performing any subsequent task with it. Four standard <br />www.it-ebooks.info<br />CHAPTER 13? WORKING WITH HTML FORMS <br />292 <br />functions are conveniently available for doing so: escapeshellarg(), escapeshellcmd(), htmlentities(), and strip_tags(). As of PHP 5.2.0 you also have access to the native Filter extension, which offers a wide variety of validation and sanitization filters. The remainder of this section is devoted to an overview of these sanitization features. <br />? Note Keep in mind that the safeguards described in this section (and throughout the chapter), while effective, offer only a few of the many possible solutions at your disposal. For instance, in addition to the four aforementioned functions and the Filter extension, you could also typecast incoming data to make sure it meets the requisite types as expected by the application. Therefore, although you should pay close attention to what&rsquo;s discussed in this chapter, you should also be sure to read as many other security-minded resources as possible to obtain a comprehensive understanding of the topic.</p>', '2017-08-20 20:14:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `skill_id`) VALUES
(19, 1, 8),
(20, 1, 9),
(21, 1, 10),
(22, 1, 11),
(23, 1, 1),
(24, 1, 2),
(25, 1, 3),
(26, 1, 4),
(27, 1, 6),
(28, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_responsibilities` text NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `user_id`, `job_title`, `company_name`, `job_responsibilities`, `from_date`, `to_date`, `created_at`) VALUES
(1, 1, 'Developer', 'software technologies', 'Development', '2016-09-01', '2017-08-17', '2017-08-17 15:43:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_ibfk_1` (`applicant_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `applications_ibfk_3` (`project_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institution_type`
--
ALTER TABLE `institution_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `projects_ibfk_2` (`client_id`);

--
-- Indexes for table `project_files`
--
ALTER TABLE `project_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `submitted_by` (`submitted_by`);

--
-- Indexes for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skill_set`
--
ALTER TABLE `skill_set`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_education_ibfk_1` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user _id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institution_type`
--
ALTER TABLE `institution_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project_files`
--
ALTER TABLE `project_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `project_skills`
--
ALTER TABLE `project_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skill_set`
--
ALTER TABLE `skill_set`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_files`
--
ALTER TABLE `project_files`
  ADD CONSTRAINT `project_files_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_files_ibfk_2` FOREIGN KEY (`submitted_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD CONSTRAINT `project_skills_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skill_set` (`skill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_skills_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill_set`
--
ALTER TABLE `skill_set`
  ADD CONSTRAINT `skill_set_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skill_set` (`skill_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
