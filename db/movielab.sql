-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for movielab
CREATE DATABASE IF NOT EXISTS `movielab` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `movielab`;

-- Dumping structure for table movielab.actors
CREATE TABLE IF NOT EXISTS `actors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.actors: ~4 rows (approximately)
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` (`id`, `firstname`, `lastname`, `age`, `gender`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'John', 'Doe', '35', '0', 'default.png', '2021-01-08 20:37:20', '2021-01-08 12:37:20', NULL),
	(2, 'Jennie Ruby', 'Kim', '24', '1', 'default.png', '2021-01-09 03:55:05', '2021-01-09 03:55:05', NULL),
	(5, 'Lalisa', 'Manoban', '23', '1', 'default.png', '2021-01-09 03:57:39', '2021-01-09 03:57:39', NULL),
	(6, 'Roseanne', 'Park', '23', '1', 'default.png', '2021-01-09 03:57:57', '2021-01-09 03:57:57', NULL);
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;

-- Dumping structure for table movielab.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.genres: ~21 rows (approximately)
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Action', '2020-09-13 08:46:27', '2020-08-21 16:07:19'),
	(2, 'Fantasy', '2020-09-09 07:35:53', NULL),
	(3, 'Romance', '2020-09-13 04:53:19', NULL),
	(4, 'Adventure', '2020-09-19 04:58:22', NULL),
	(5, 'Mystery', '2020-09-19 04:58:51', NULL),
	(6, 'Thriller', '2020-09-19 04:59:06', NULL),
	(7, 'Horror', '2020-09-19 04:59:20', NULL),
	(8, 'Anime', '2020-09-19 05:00:06', NULL),
	(9, 'Comedy', '2020-09-19 05:00:40', NULL),
	(10, 'Crime', '2020-09-19 05:00:56', NULL),
	(11, 'Drama', '2020-09-19 05:01:06', NULL),
	(12, 'Documentary', '2020-09-19 05:01:17', NULL),
	(13, 'Children&Family', '2020-09-19 05:02:53', NULL),
	(14, 'History', '2020-09-19 05:01:40', NULL),
	(15, 'Sports', '2020-09-19 05:01:57', NULL),
	(16, 'Musical', '2020-09-19 05:02:11', NULL),
	(17, 'Sci-fi', '2020-09-19 05:02:32', NULL),
	(18, 'Comedy', '2020-09-20 15:52:57', NULL),
	(19, 'Fantasy', '2020-09-20 15:52:57', NULL),
	(20, 'Comedy', '2020-09-20 15:52:57', NULL),
	(21, 'Action', '2020-09-20 15:52:57', NULL);
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;

-- Dumping structure for table movielab.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
	(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
	(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
	(6, '2016_06_01_000004_create_oauth_clients_table', 2),
	(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table movielab.movies
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producer_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_release` date NOT NULL,
  `country_release` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.movies: ~11 rows (approximately)
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` (`id`, `producer_id`, `genre_id`, `title`, `content`, `date_release`, `country_release`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'Maleficent 1', 'Maleficent is a fictional character who appears in Walt Disney Productions\' 16th animated feature film, Sleeping Beauty (1959). She is an evil fairy and the self-proclaimed "Mistress of All Evil" who, after not being invited to a christening, curses the infant Princess Aurora to "prick her finger on the spindle of a spinning wheel and die" before the sun sets on Aurora\'s sixteenth birthday.[2]\r\n\r\nMaleficent is based on the evil fairy godmother character in Charles Perrault\'s fairy tale Sleeping Beauty,[3] as well as the villainess who appears in the Brothers Grimm\'s retelling of the story, Little Briar Rose. Maleficent was animated by Marc Davis.\r\n\r\nShe is voiced by Eleanor Audley, who earlier voiced Lady Tremaine, Cinderella\'s evil stepmother, in Cinderella (1950). She serves as a recurring antagonist in Disney\'s House of Mouse, voiced by Lois Nettleton, and in the Kingdom Hearts video game series, voiced by Susanne Blakeslee. She was also an antagonist in the Disney Channel Original Movie Descendants, in which she was portrayed by Kristin Chenoweth.\r\n\r\nA revision of the character appeared as the protagonist in the 2014 live-action film Maleficent, portrayed by Angelina Jolie, who reprised the role in the sequel Maleficent: Mistress of Evil, which was released on October 18, 2019.[4] This version of Maleficent is portrayed as a sympathetic character, who is misunderstood in trying to protect herself and her domain from humans.', '2014-05-28', 'US', '1.jpeg', '2021-01-16 21:14:59', NULL, NULL),
	(2, 1, 1, 'The Croods', 'The Croods is a 2013 American computer-animated adventure comedy film produced by DreamWorks Animation and distributed by 20th Century Fox. The film was written and directed by Kirk DeMicco and Chris Sanders,[6] and stars the voices of Nicolas Cage, Emma Stone, Ryan Reynolds, Catherine Keener, Clark Duke, Cloris Leachman, and Randy Thom. The film is set in a fictional prehistoric Pliocene era known as "The Croodaceous" (a prehistoric period which contains fictional prehistoric creatures) when a caveman\'s position as a "Leader of the Hunt" is threatened by the arrival of a prehistoric genius who comes up with revolutionary new inventions as they trek through a dangerous but exotic land in search of a new home.\r\n\r\nThe film premiered at the 63rd Berlin International Film Festival on February 15, 2013,[7] and was released in the United States on March 22.[8] As part of the distribution deal, this was the first DreamWorks Animation film to be distributed by 20th Century Fox, since the end of their distribution deal with Paramount Pictures.[9] The Croods received generally positive reviews, and proved to be a box office success, earning more than $587 million on a budget of $135–175 million. It was nominated for an Academy Award for Best Animated Feature and a Golden Globe Award for Best Animated Feature Film. The film launched a new franchise,[10] with a television series, Dawn of the Croods, which debuted on December 24, 2015 on Netflix.[11] A sequel directed by Joel Crawford is set to be released on December 23, 2020.', '2013-03-22', 'US', '2.jpg', '2021-01-16 21:16:05', NULL, NULL),
	(3, 4, 8, 'Your Name', 'Kimi no Na wa is a 2016 Japanese animated romantic fantasy film written and directed by Makoto Shinkai, and produced by CoMix Wave Films. It was produced by Kōichirō Itō and Katsuhiro Takei, with animation direction by Masashi Ando, character designs by Masayoshi Tanaka, and music composed by Radwimps. Your Name tells the story of a high school boy in Tokyo and a high school girl in a rural town, who suddenly and inexplicably begin to swap bodies. The film stars the voices of Ryunosuke Kamiki, Mone Kamishiraishi, Masami Nagasawa and Etsuko Ichihara. Shinkai\'s eponymous novel was published a month before the film\'s premiere.', '2016-08-26', 'Japan', '2.jpg', '2021-01-16 21:16:13', NULL, NULL),
	(4, 4, 8, 'Deep Blue Sea 3', 'Dr. Emma Collins and her team are spending their third summer on the island of Little Happy studying the effect of climate change on the great white sharks who come to the nearby nursery every year to give birth. However, their peaceful life is disrupted when a "scientific" team shows up looking for three bull sharks.', '2020-07-28', 'US', '2.jpg', '2021-01-16 21:16:17', NULL, NULL),
	(5, 3, 3, 'The Hobbit', 'The Hobbit, or There and Back Again is a children\'s fantasy novel by English author J. R. R. Tolkien. It was published on 21 September 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction. The book remains popular and is recognized as a classic in children\'s literature. The Hobbit is set within Tolkien\'s fictional universe and follows the quest of home-loving Bilbo Baggins, the titular hobbit, to win a share of the treasure guarded by Smaug the dragon. Bilbo\'s journey takes him from light-hearted, rural surroundings into more sinister territory. The story is told in the form of an episodic quest, and most chapters introduce a specific creature or type of creature of Tolkien\'s geography. Bilbo gains a new level of maturity, competence, and wisdom by accepting the disreputable, romantic, fey, and adventurous sides of his nature and applying his wits and common sense. The story reaches its climax in the Battle of Five Armies, where many of the characters and creatures from earlier chapters re-emerge to engage in conflict. Personal growth and forms of heroism are central themes of the story, along with motifs of warfare. These themes have led critics to view Tolkien\'s own experiences during World War I as instrumental in shaping the story. The author\'s scholarly knowledge of Germanic philology and interest in mythology and fairy tales are often noted as influences. The publisher was encouraged by the book\'s critical and financial success and, therefore, requested a sequel. As Tolkien\'s work progressed on the successor The Lord of the Rings, he made retrospective accommodations for it in The Hobbit. These few but significant changes were integrated into the second edition. Further editions followed with minor emendations, including those reflecting Tolkien\'s changing concept of the world into which Bilbo stumbled. The work has never been out of print. Its ongoing legacy encompasses many adaptations for stage, screen, radio, board games, and video games. Several of these adaptations have received critical recognition on their own merits.', '2012-12-13', 'US', '2.jpg', '2021-01-16 21:16:21', NULL, NULL),
	(6, 2, 9, 'Interstellar', 'While the Owl and the little door, so she set to work at once and put back into the court, by the officers of the players to be no use going back to the rose-tree, she went on eagerly: \'There is such a capital one for catching mice--oh, I beg your pardon!\' cried Alice hastily, afraid that it would like the three gardeners, but she could not be denied, so she tried to curtsey as she could. \'The game\'s going on within--a constant.', '2008-12-25', 'NI', '2.jpg', '2021-01-16 21:16:24', NULL, NULL),
	(7, 1, 7, 'Drive', 'The King\'s argument was, that you couldn\'t cut off a head could be NO mistake about it: it was addressed to the Knave of Hearts, and I shall have some fun now!\' thought Alice. One of the party went back to finish his story. CHAPTER IV. The Rabbit Sends in a very decided tone: \'tell her something worth hearing. For some minutes it puffed away without speaking, but at last she spread out her hand, and a fall, and a pair of white kid gloves, and was just possible it had some kind of serpent, that\'s all I can say.\' This was not going to dive in among the branches, and every now and then a row of lamps hanging from the trees had a VERY turn-up nose, much more like a telescope! I think I can find them.\' As she said to herself; \'I should like to hear her try and repeat "\'TIS THE VOICE OF THE.', '1999-01-23', 'FJ', '1.jpeg', '2021-01-16 21:16:37', NULL, NULL),
	(8, 4, 4, 'Good Will Hunting', 'Alice indignantly. \'Ah! then yours wasn\'t a really good school,\' said the Mock Turtle. \'Certainly not!\' said Alice in a day did you manage on the song, \'I\'d have said to one of the reeds--the rattling teacups would change to dull reality--the grass would be four thousand miles down, I think--\' (for, you see, as she tucked it away under her arm, that it was very uncomfortable, and, as the March Hare said--\' \'I didn\'t!\' the March Hare interrupted, yawning. \'I\'m getting tired of sitting by her sister sat still and said anxiously to herself, for she was saying, and the Gryphon as if he doesn\'t begin.\' But she went on, \'I must be.', '1994-02-08', 'MR', '1.jpeg', '2021-01-16 21:16:41', NULL, NULL),
	(9, 2, 1, 'Snatch', 'The March Hare said--\' \'I didn\'t!\' the March Hare took the place of the Gryphon, and the choking of the court," and I never knew so much at first, but, after watching it a minute or two, looking for eggs, I know THAT well enough; and what does it to be sure, she had brought herself down to nine inches high. CHAPTER VI. Pig and Pepper For a minute or two, which gave the Pigeon in a trembling voice:-- \'I passed by his garden, and marked, with one eye, How the Owl had the dish as its share of the table. \'Nothing.', '1973-01-06', 'VG', '1.jpeg', '2021-01-16 21:16:51', NULL, NULL),
	(10, 1, 1, 'Creed', 'Alice; \'you needn\'t be afraid of interrupting him,) \'I\'ll give him sixpence. _I_ don\'t believe it,\' said the Queen, the royal children, and everybody laughed, \'Let the jury wrote it down into a large plate came skimming out, straight at the Mouse\'s tail; \'but why do you like to see that the way wherever she wanted much to know, but the cook tulip-roots instead of the jury wrote it down into a sort of mixed flavour of cherry-tart, custard, pine-apple, roast turkey, toffee, and hot buttered toast,) she very seldom followed it), and handed them round as.', '1977-12-04', 'US', '1.jpeg', '2021-01-16 21:17:43', NULL, NULL),
	(14, 14, 16, 'BLACKPINK', 'Blackpink (Korean: 블랙핑크; commonly stylized as BLACKPINK or BLΛƆKPIИK) is a South Korean girl group formed by YG Entertainment, consisting of members Jisoo, Jennie, Rosé, and Lisa. ... They are also the first music group and Korean act to have three music videos each accumulate one billion views on YouTube.', '2021-01-23', 'Korea', '1610890380.jpg', '2021-01-17 21:33:01', '2021-01-17 13:33:01', NULL);
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;

-- Dumping structure for table movielab.movie_actor
CREATE TABLE IF NOT EXISTS `movie_actor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actor_id` int(10) unsigned NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.movie_actor: ~23 rows (approximately)
/*!40000 ALTER TABLE `movie_actor` DISABLE KEYS */;
INSERT INTO `movie_actor` (`id`, `actor_id`, `movie_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '0000-00-00 00:00:00', NULL),
	(2, 1, 2, NULL, NULL),
	(3, 1, 5, NULL, NULL),
	(4, 2, 5, NULL, NULL),
	(5, 4, 4, NULL, NULL),
	(6, 6, 8, NULL, NULL),
	(7, 5, 6, NULL, NULL),
	(8, 9, 3, NULL, NULL),
	(9, 7, 5, '2020-09-20 07:52:56', '2020-09-20 07:52:56'),
	(10, 3, 4, '2020-09-20 07:52:56', '2020-09-20 07:52:56'),
	(11, 9, 7, '2020-09-20 07:52:56', '2020-09-20 07:52:56'),
	(13, 4, 9, '2020-09-20 07:52:56', '2020-09-20 07:52:56'),
	(15, 2, 6, NULL, NULL),
	(16, 3, 6, NULL, NULL),
	(17, 2, 7, NULL, NULL),
	(18, 13, 8, NULL, NULL),
	(19, 14, 9, NULL, NULL),
	(20, 8, 3, NULL, NULL),
	(21, 11, 8, NULL, NULL),
	(40, 6, 14, NULL, NULL),
	(41, 5, 14, NULL, NULL),
	(42, 2, 14, NULL, NULL),
	(43, 1, 10, NULL, NULL);
/*!40000 ALTER TABLE `movie_actor` ENABLE KEYS */;

-- Dumping structure for table movielab.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.oauth_access_tokens: 3 rows
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('fa821c73d7173a7e664403d5b5e90516e393a9c3ec46c3ee44f42fd28c7502f349101a0c0aa584c1', 4, 1, 'Laravel', '[]', 0, '2021-01-20 06:07:40', '2021-01-20 06:07:40', '2022-01-20 06:07:40'),
	('ada294f88b1398d760052ab65573fe001860444feeac454fc6eef43e46f638b95fe8beb7cdbf7398', 4, 1, 'Laravel', '[]', 0, '2021-01-21 04:28:27', '2021-01-21 04:28:27', '2022-01-21 04:28:27'),
	('8389ead324e4e503fdf62bbf24ff6dd161f39d5307cd8a98be70db32c127a787e1341c4d8ec808cc', 4, 1, 'Laravel', '[]', 0, '2021-01-21 04:32:48', '2021-01-21 04:32:48', '2022-01-21 04:32:48');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table movielab.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.oauth_auth_codes: 0 rows
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table movielab.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.oauth_clients: 2 rows
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', '4ArBKkEWvxubhiy5Yr1rcFBh7fw9TkwM71zcxhFv', 'http://movielab.com', 1, 0, 0, '2021-01-20 04:56:05', '2021-01-20 04:56:05'),
	(2, NULL, 'Laravel Password Grant Client', 'Ly7TEEWfHTekbV0HNk1o8kQNh1SuKrQIjPUeVMrF', 'http://movielab.com', 0, 1, 0, '2021-01-20 04:56:05', '2021-01-20 04:56:05');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table movielab.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.oauth_personal_access_clients: 1 rows
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-01-20 04:56:05', '2021-01-20 04:56:05');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table movielab.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.oauth_refresh_tokens: 0 rows
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table movielab.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table movielab.producers
CREATE TABLE IF NOT EXISTS `producers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.producers: ~12 rows (approximately)
/*!40000 ALTER TABLE `producers` DISABLE KEYS */;
INSERT INTO `producers` (`id`, `firstname`, `lastname`, `age`, `created_at`, `updated_at`) VALUES
	(1, 'Angela', 'Dagoro', '20', '2020-09-16 05:35:47', NULL),
	(2, 'Ryan', 'Reynolds', '43', '2020-09-16 05:35:37', NULL),
	(3, 'Makoto', 'Shinkai', '47', '2020-09-16 05:34:56', NULL),
	(4, 'Peter', 'Jackson', '42', '2020-09-20 00:23:03', NULL),
	(5, 'Sandy', 'Kshlerin', '44', '2020-09-20 15:52:57', NULL),
	(6, 'Kianna', 'Hahn', '74', '2020-09-20 15:52:57', NULL),
	(7, 'Terry', 'Bruen', '52', '2020-09-20 15:52:57', NULL),
	(8, 'Simone', 'Bailey', '33', '2020-09-20 15:52:57', NULL),
	(9, 'Nasir', 'Ledner', '17', '2020-09-20 15:52:57', NULL),
	(10, 'Jennie Ruby', 'Kim', '24', '2021-01-16 21:42:51', '2021-01-16 13:42:51'),
	(11, 'Lalisa', 'Manoban', '23', '2021-01-09 13:30:57', '2021-01-09 05:30:57'),
	(14, 'Ji-soo', 'Kim', '26', '2021-01-16 13:43:08', '2021-01-16 13:43:08');
/*!40000 ALTER TABLE `producers` ENABLE KEYS */;

-- Dumping structure for table movielab.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table movielab.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Cedrick', 'cedrickvalencia118@gmail.com', 'cdrk', NULL, '$2y$10$J1l9h6JleRbeN/6evmJApOopUFczpg/x1A2D.iMSkr4DIcyl2/hGS', NULL, '2021-01-06 05:35:24', '2021-01-06 05:35:24'),
	(2, 'Angelica', 'edadangelica@gmail.com', 'angi', NULL, '$2y$10$UbrcdgO3XsBEi5FmnvnnleysiUfmdCdAEA56/1V07XX9a.eHLX3Nq', NULL, '2021-01-06 09:56:33', '2021-01-06 09:56:33'),
	(3, 'Angela Dagoro', 'ella.dagoro@gmail.com', 'Angela', NULL, '$2y$10$hjaGCDVmClruUHxitWrk6uMxSXLXg7Az7.K2BvWq0YaGeR7C8A2Vu', NULL, '2021-01-06 15:29:19', '2021-01-06 15:29:19'),
	(4, 'Cedrick Valencia', 'cedrickvalencia811@gmail.com', 'cdrkvlnc', NULL, '$2y$10$0lN/47YkULkI6DwH2tmTIeziRvc1oF9v/fCXOj/WRJnDSlrAP019O', NULL, '2021-01-20 06:07:40', '2021-01-20 06:07:40'),
	(7, 'Pedro', 'pedro@gmail.com', 'pedro', NULL, '$2y$10$/A/.z9qkGNByzrvePG4zyOyQGn9ebBHfBtHzHM1fjol7RAKqT3lWu', NULL, '2021-01-21 04:48:20', '2021-01-21 04:48:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
