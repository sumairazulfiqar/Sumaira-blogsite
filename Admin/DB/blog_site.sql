-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2025 at 08:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `joining_date` date NOT NULL,
  `admin_mobile` varchar(200) NOT NULL,
  `admin_country` varchar(200) NOT NULL,
  `admin_profession` varchar(200) NOT NULL,
  `admin_role` varchar(200) NOT NULL,
  `admin_image` varchar(500) NOT NULL,
  `admin_about` varchar(2000) NOT NULL,
  `admin_facebook` varchar(200) NOT NULL,
  `admin_twitter` varchar(200) NOT NULL,
  `admin_instagram` varchar(200) NOT NULL,
  `admin_linkdln` varchar(200) NOT NULL,
  `admin_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `joining_date`, `admin_mobile`, `admin_country`, `admin_profession`, `admin_role`, `admin_image`, `admin_about`, `admin_facebook`, `admin_twitter`, `admin_instagram`, `admin_linkdln`, `admin_status`) VALUES
(1, 'TANVEER_AHMAD', 'mtanveerulhassan2@gmail.com', '123', '2024-02-18', '0305-1608550', 'PAKISTAN', 'WEB DEVELOPER', '2', 'uploads/Admin Imgs/Untitled-1.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random t', 'facebook.com', 'twitter.com', 'instagram.com', 'linkdin.com', '1'),
(6, 'ALI SHAAN', 'alishan@gmail.com', '12345678', '2024-02-16', '0301-1234567', 'PAKISTAN', 'GRAPHIC DESIGNER', '1', 'uploads/Admin Imgs/ALI SHAANbranch.png', 'alert alert-danger alert-dismissible fade show', '', '', '', '', '1'),
(8, 'TEST', 'test@gmail.com', '12345678', '2024-02-26', '0000-0000000', 'PAKISTAN', 'WEB DEVELOPER', '0', 'uploads/Admin Imgs/TESTdelivery-bike.png', 'This admin add for the testing purpose', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_img` varchar(1000) NOT NULL,
  `category_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`, `category_status`) VALUES
(1, 'ENTERTAINMENT', 'uploads/Category Imgs/pexels-thirdman-5256524.jpg', 1),
(6, 'POLITICS', 'uploads/Category Imgs/POLITICS17449.jpg', 1),
(7, 'EDUCATION', 'uploads/Category Imgs/EDUCATIONcity-tile-Kamoke.jpg', 1),
(8, 'WEATHER', 'uploads/Category Imgs/WEATHERcity-tile-DeraGhaziKhan.jpg', 1),
(12, 'ART', 'uploads/Category Imgs/ARTsmiling-craftsman-with-electric-drill.jpg', 1),
(13, 'HEALTH', 'uploads/Category Imgs/HEALTHpexels-fauxels-3184183.jpg', 1),
(14, 'SPORTS', 'uploads/Category Imgs/SPORTSpexels-annushka-ahuja-7991660.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `contact_mobile` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `contact_mobile`, `contact_email`, `contact_address`) VALUES
(1, '0300-1234567', 'blogsite@gmail.com', 'Opposite HBL Bank, Lodhran, Pakistan.');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(200) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(4, 'Do you accept sponsored content or advertisements?', 'Yes , we sponsored content or advertisement accordig to the content. Also paid promotions service is availbe to enhance your marketing straitgy and also promote your product'),
(5, 'How often is the blog updated?', 'Some blogs may update multiple times per day, while others might post weekly, bi-weekly, or even monthly. It\'s essential to communicate your update schedule clearly to your audience so they know when to expect new content. This consistency can help retain readers and build anticipation for upcoming posts.'),
(6, 'How can I support your blog?', 'One of the simplest ways to support a blog is by regularly visiting and engaging with the content. Leave comments, share posts on social media, and interact with other readers. Subscribing to the blog\'s newsletter or RSS feed ensures you stay updated with new posts. It also helps the blog owner gauge the size of their loyal audience. Sharing blog posts on platforms like Facebook, Twitter, LinkedIn, Pinterest, or Instagram can increase visibility and attract new readers to the blog.'),
(7, 'Can I translate your content into another language?', 'We encourage readers to translate our content into other languages for personal use or non-commercial purposes. If you plan to use translated content for commercial purposes or publication, please contact us for permission. We appreciate your interest in sharing our content with a wider audience.'),
(9, 'This is Fifth Question for Testing?', 'Here is the answer of the question aosjflkasj alkjsfdkljasj');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(200) NOT NULL,
  `post_title` varchar(500) NOT NULL,
  `post_category` int(200) NOT NULL,
  `post_image` varchar(500) NOT NULL,
  `post_date` date NOT NULL,
  `post_author` int(200) NOT NULL,
  `post_description` varchar(3000) NOT NULL,
  `post_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_category`, `post_image`, `post_date`, `post_author`, `post_description`, `post_status`) VALUES
(10, 'Exploring the Wonders of Underwater Photography', 12, 'uploads/Post Imgs/hero-section- flower.jpeg', '2024-05-11', 1, 'Embark on an extraordinary journey as we plunge into the captivating realm of underwater photography. In this immersive exploration, we\'ll delve deep into the art and science behind capturing awe-inspiring images beneath the ocean\'s surface.\r\nOur adventure begins by unraveling the essential techniques that underwater photographers employ to navigate the challenges of shooting in aquatic environments. From mastering buoyancy control to understanding light refraction, we\'ll uncover the intricacies that set this genre apart.\r\n\r\nJoin us as we spotlight the breathtaking diversity of underwater landscapes, from vibrant coral reefs teeming with life to mysterious shipwrecks steeped in history. Through stunning visuals and insightful narratives, we\'ll showcase the beauty and fragility of marine ecosystems, highlighting the urgent need for conservation efforts.\r\nGet ready to discover the cutting-edge equipment and gear that empower photographers to create stunning underwater masterpieces. From waterproof housings for cameras to specialized lighting setups, we\'ll demystify the tools of the trade and offer practical tips for aspiring underwater photographers.\r\n\r\nBut our exploration doesn\'t stop there. We\'ll also delve into the fascinating world of underwater wildlife photography, capturing the grace of majestic marine creatures such as sea turtles, sharks, and dolphins. Learn about ethical photography practices that prioritize animal welfare while preserving the integrity of natural habitats.\r\nWhether you\'re a seasoned underwater photographer seeking new techniques or an ocean enthusiast captivated by the beauty beneath the waves, this post promises to inspire, educate, and ignite your passion for underwater photography. Join us as we celebrate the wonders of the deep and the artistry of those who dare to dive into its mesmerizing depths.', 1),
(11, 'Unlock Your Full Potential: A Guide to Holistic Health', 13, 'uploads/Post Imgs/pexels-william-choquette-1954524.jpg', '2024-05-11', 1, 'Health is more than just the absence of illness. It\'s a vibrant state of well-being that encompasses your physical, mental, and social life. In this post, we\'ll explore what holistic health truly means and offer tips to help you thrive in all aspects of your life. We\'ll cover:\r\n\r\nThe key dimensions of holistic health\r\nSimple practices to boost your physical well-being\r\nStrategies for promoting mental and emotional health\r\nTips for fostering strong social connections\r\nLet\'s embark on a journey to unlock your full potential and embrace a life filled with health and happiness!', 1),
(12, 'Unveiling the Magic: A Deep Dive into the Details That Bring Entertainment to Life', 1, 'uploads/Post Imgs/Sukkur.jpg', '2024-05-11', 1, 'Have you ever wondered how a movie scene feels so real, or how a song gets stuck in your head for days? It\'s all thanks to the countless entertainment details, both big and small, that come together to create an immersive and unforgettable experience. This post dives deep into the fascinating world of entertainment details, exploring how everything from set design to character quirks contributes to the overall story. We\'ll uncover the secrets behind some of your favorite movies, shows, and music, and show you how to appreciate the artistry and intention behind every detail. So, get ready to be amazed by the magic that goes into making entertainment truly entertaining!The worlds of movies, TV shows, music, and video games transport us to new realities, but have you ever stopped to think about the intricate details that craft these experiences? This post is your backstage pass to the fascinating world of entertainment details! We\'ll delve deeper than the surface, exploring the hidden gems that filmmakers, musicians, and game designers plant to enrich your experience.', 0),
(13, 'The Winning Mindset: Strategies for Mental Strength in Sports', 14, 'uploads/Post Imgs/pexels-pavel-danilyuk-6296013.jpg', '2024-05-11', 1, 'Explore the psychology behind peak athletic performance in this insightful post. We delve into the strategies and techniques used by elite athletes to cultivate mental resilience, focus, and determination. From visualization exercises to overcoming performance anxiety, discover how harnessing the power of the mind can elevate your game and lead to success on and off the field. Whether you\'re a competitive athlete or a sports enthusiast, this post offers valuable insights into achieving a winning mindset in sports.Embark on a journey to unleash your full athletic potential with our comprehensive training guide. This post delves into the science-backed strategies and techniques that athletes can use to optimize their performance. From strength and conditioning workouts to nutrition tips for fueling your body, we cover all aspects of training for peak athleticism. Dive into expert advice on recovery techniques, injury prevention, and goal setting to help you reach new heights in your athletic pursuits. Whether you\'re a professional athlete or a recreational sports enthusiast, this post is your roadmap to achieving peak performance and surpassing your athletic goals.', 0),
(14, 'Weathering the Storm: Tips for Navigating Climate Changes', 8, 'uploads/Post Imgs/pexels-matthew-montrone-1324803.jpg', '2024-05-11', 1, 'Explore the dynamic world of weather and climate in our latest post. Discover expert insights on how to adapt and thrive amidst changing weather patterns. From sustainable living practices to weatherproofing your home, we delve into practical strategies for mitigating climate impacts. Join us as we uncover the intersection of science, resilience, and environmental stewardship in the face of evolving weather challenges.In our comprehensive guide, \"Weathering the Storm: Tips for Navigating Climate Changes,\" we delve deep into the intricate dynamics of weather patterns and their impact on our daily lives. This post goes beyond mere weather forecasts, offering a holistic view of how climate change influences our environment and what steps we can take to navigate these challenges effectively.\r\n\r\nWe begin by discussing the science behind climate change, shedding light on the factors driving shifts in weather patterns globally. Through insightful analysis and expert commentary, we explore the rising temperatures, extreme weather events, and their repercussions on ecosystems, agriculture, and human societies.', 1),
(15, 'This Post for Testing Purpose', 6, 'uploads/Post Imgs/pexels-boris-pavlikovsky-7713995.jpg', '2024-05-15', 8, '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, aspernatur doloribus! Assumenda temporibus sapiente veniam porro nesciunt eos, vitae iure neque corporis accusamus modi voluptas soluta illum quibusdam nostrum velit omnis minima, quos iusto molestiae facere. Aperiam harum eveniet alias, ipsa voluptates atque, dolorum soluta reiciendis, saepe doloribus natus quaerat accusantium veritatis velit eius dicta magnam sequi cumque minus. Deserunt, temporibus. Recusandae esse sint officiis enim, adipisci modi quod ea nobis eius maxime illo excepturi veritatis, culpa magnam molestias corporis odio animi doloribus quam, magni illum consectetur. Deserunt saepe magni voluptates, quo atque quas illum amet tempore facilis obcaecati ad quae. Harum magnam libero eaque sapiente deleniti labore, dicta accusantium? Repudiandae assumenda exercitationem quibusdam architecto. Fuga ducimus error nobis voluptates? Beatae molestiae quasi, praesentium, in aperiam deleniti voluptate nisi rerum modi omnis provident sed asperiores, delectus porro dolore debitis! Placeat nobis iure aperiam dolorem consequuntur aspernatur repudiandae, vitae laborum necessitatibus a magni ipsa, ea architecto esse corrupti! Reiciendis amet ab sapiente adipisci aperiam, architecto blanditiis, impedit illo nulla eligendi expedita recusandae placeat soluta aspernatur pariatur vitae nostrum corporis? At repudiandae alias cum error quia. Nostrum, fugit quam. Perspiciatis, velit! Quasi sit magnam porro iusto suscipit eligendi quia dignissimos esse repudiandae ullam, hic labore exercitationem mollitia repellat! Unde voluptatem minima quae. Dignissimos tempora alias esse quia iste quam! Officiis neque perspiciatis rerum voluptatem at, excepturi sunt id? Dolore et molestiae quia dicta mollitia porro aliquam asperiores omnis, odio dolor aliquid nesciunt unde esse maxime cum, error voluptatum tempora fuga! Exercitationem voluptas, aperiam explicabo quas, velit rem a repudiandae, assumenda amet non earum. Veniam iusto, sapiente doloribus reiciendis soluta placeat deleniti nihil quo vel dolorum. Impedit mollitia, necessitatibus quasi nesciunt sunt quae eum? Blanditiis, debitis! Veniam nostrum iure voluptatem quis porro fugiat hic praesentium minus cum officia dignissimos itaque ipsum eius ut distinctio atque error quidem, autem sed nihil tenetur minima. Repudiandae corporis dolorum suscipit quas minus voluptate obcaecati, doloribus, tempore autem, temporibus molestiae ad maiores porro modi iste repellendus dolorem commodi iusto odit. Debitis quod sequi unde. Esse, veritatis maiores? Minus consequuntur animi aliquam voluptatem sed voluptatum odio quae tempora culpa, itaque quod eius adipisci in soluta? Dolorum, a, culpa, voluptatibus vero eos ad architecto eaque soluta esse accusantium exercitationem unde at porro corporis laborum. Quod quaerat vel nihil sint corporis rerum accusantium provident ratione minus quae deleniti laudantium earum reprehenderit magni a, soluta at officia est, accusa', 1),
(16, 'This Post about the Music Concerts in the City Late night', 1, 'uploads/Post Imgs/pexels-vishnu-r-nair-1105666.jpg', '2024-05-16', 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non veniam blanditiis quo ad. Nesciunt tempora sequi odio a alias delectus quo, ipsam culpa reprehenderit sed quas tempore vitae est iure. Nisi, praesentium. Et sed voluptatem error excepturi, esse tempora ducimus aut nulla nesciunt quam vero consequuntur fugiat odit expedita possimus praesentium animi illo amet natus facilis earum numquam provident? Neque amet libero consectetur perferendis voluptatum laudantium eos. Iusto maiores excepturi impedit eius nulla cum nisi accusantium. Beatae magnam placeat corrupti dignissimos aut quia corporis eius doloribus rerum ducimus officiis laborum quas nobis dolor aliquam, obcaecati, ab fuga, possimus officia. Molestias suscipit, aut perferendis, dolorum nobis, minus dolorem aliquam labore vero vel voluptate quidem! Mollitia, enim illum? Nihil velit autem porro, suscipit id odio doloribus inventore quibusdam, numquam sequi, libero necessitatibus laudantium similique ea vero sint saepe commodi! Totam perspiciatis enim corporis voluptates blanditiis laboriosam vel eaque optio quam quidem suscipit amet alias magni distinctio error tenetur sint ducimus, obcaecati corrupti, nulla ex omnis possimus. Facere, ab debitis voluptatum qui, sunt soluta, corporis itaque at similique ea quisquam odit veniam. Vero ea itaque corporis, quod odit sed sunt obcaecati atque odio, aliquid repudiandae natus quasi eaque nam? Unde blanditiis atque ratione minus debitis expedita, similique distinctio dolores maiores ipsum, rerum pariatur dolor recusandae asperiores labore illo quod nulla at. Ex sint esse quod unde impedit. Ad eligendi sit eveniet aperiam iste, sapiente cumque quam fuga, architecto eius ducimus enim delectus mollitia iure, reiciendis provident aliquam minima accusantium aut ipsam corporis. Inventore vero veritatis, saepe delectus harum suscipit voluptatum accusamus totam dolorum asperiores natus exercitationem minus excepturi quis pariatur ea quisquam reprehenderit perferendis molestiae? Temporibus vero molestiae quasi deleniti accusantium reiciendis possimus animi, illo inventore natus est velit veritatis. Consectetur ducimus cumque iusto, voluptatum beatae fugiat alias quaerat repellendus aliquam totam impedit itaque quibusdam ratione magnam repellat eaque laboriosam sed nisi, possimus sit maiores soluta quod? Consequatur mollitia sint odio consectetur distinctio, cupiditate, dolorem corporis earum, voluptatem nihil tempora nam. Minus earum ipsa ullam cumque illum ut dicta ipsum tempore reiciendis. Similique architecto perferendis rem, consequuntur fuga asperiores commodi perspiciatis vel adipisci sint harum temporibus quae. Sunt laboriosam eveniet ratione in labore pariatur tempora non minima unde repellat, distinctio nisi iure ea magnam quaerat? Distinctio temporibus consequuntur maiores doloremque fugit saepe ipsa cumque iusto recusandae esse porro eveniet iste reiciendis, eaque a impedit consequatur atque, velit praesentium nesciunt alias ipsam quod nemo ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_name`
--

CREATE TABLE `site_name` (
  `site_id` int(10) NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `site_logo` varchar(1000) NOT NULL,
  `name_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_name`
--

INSERT INTO `site_name` (`site_id`, `site_name`, `site_logo`, `name_status`) VALUES
(1, 'Blog Site', 'uploads/Site Logo/blogger.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`) VALUES
(1, 'Muhammad Tanveer', 'mtanveerulhassan2@gmail.com', '123', 0),
(2, 'Amir Bhatti', 'fatehlinks@gmail.com', '12345678', 0),
(3, 'Mudasir Khan', 'mudasir@gmail.com', '123', 0),
(4, 'Muhammad Asif', 'asif78@gmail.com', '12345678', 0),
(5, 'Rizwan Gulzar', 'rizi@gmail.com', '123', 0),
(6, 'Kasif', 'ka@gmail.com', '11', 0),
(7, 'user', 'blog@gmail.com', '112233', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_messages`
--

CREATE TABLE `users_messages` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `message_subject` varchar(500) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `user_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_messages`
--

INSERT INTO `users_messages` (`user_id`, `user_name`, `user_email`, `message_subject`, `message`, `user_status`) VALUES
(3, 'Muhammad Tanveer', 'mtanveerulhassan2@gmail.com', 'About Independence Day Postsfs', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', 1),
(4, 'Mudasir Khan', 'mudasir@gmail.com', 'Nature Image Post', 'Dive into the mesmerizing world of underwater photography as we uncover the secrets behind capturing stunning images beneath the surface. From vibrant coral reefs to elusive marine life', 2),
(5, 'Muhammad Asif', 'asif@gamil.com', 'The Art of Mindful Travel', 'Embark on a transformative journey as we delve into the essence of mindful travel. This post explores how to cultivate a sense of serenity and presence while exploring new destinations.', 2),
(6, 'Amir Bhatti', 'amir@gamil.com', 'Culture of Pakistan', 'Culture of Pakistan post is amazing ', 2),
(7, 'Rizwan Gulzar', 'rizwan@gmail.com', 'About Independence Day Post', 'asfdasdgasdgfsda', 1),
(8, 'Amir Bhatti', 'Tanveerkhiji56@gmail.com', 'I am testing the Site.', 'asFvasdvx S', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_category` (`post_category`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `site_name`
--
ALTER TABLE `site_name`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_messages`
--
ALTER TABLE `users_messages`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `site_name`
--
ALTER TABLE `site_name`
  MODIFY `site_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_messages`
--
ALTER TABLE `users_messages`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
