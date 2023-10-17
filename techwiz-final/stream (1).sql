-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 02:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stream`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`) VALUES
(1, 'Action'),
(2, 'Crime'),
(3, 'Horror'),
(4, 'Romance'),
(5, 'Advanture'),
(6, 'Comedy'),
(7, 'Science'),
(8, 'Sci-fi');

-- --------------------------------------------------------

--
-- Table structure for table `fav_list`
--

CREATE TABLE `fav_list` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `directer` varchar(100) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int(11) NOT NULL,
  `subscription_name` varchar(100) NOT NULL,
  `subscription_id` int(10) NOT NULL,
  `subscription_price` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `card_number`, `name_on_card`, `expiry_date`, `cvv`, `subscription_name`, `subscription_id`, `subscription_price`, `user_id`) VALUES
(67, 12312523, '234123', '0345-04-23', 123124135, 'premium                                                ', 2, '$19.99                                                ', 14),
(68, 23423423, '4234234', '0234-03-23', 2324234, 'premium                                                ', 2, '$19.99                                                ', 14),
(69, 34534534, '345345', '0534-05-30', 2147483647, 'premium                                                ', 2, '$19.99                                                ', 16),
(70, 5345345, '3534534', '0125-05-31', 45345353, 'premium                                                ', 2, '$19.99                                                ', 23);

-- --------------------------------------------------------

--
-- Table structure for table `previously_watched`
--

CREATE TABLE `previously_watched` (
  `id` int(11) NOT NULL,
  `show_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_p`
--

CREATE TABLE `service_p` (
  `service_id` int(100) NOT NULL,
  `service_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_p`
--

INSERT INTO `service_p` (`service_id`, `service_name`) VALUES
(1, 'Netflix'),
(2, 'Amazone prime video'),
(3, 'Holo'),
(4, 'Apple TV plus'),
(5, 'Disney plus'),
(6, 'Hbo');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `services_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `directer` varchar(40) NOT NULL,
  `duration` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `name`, `detail`, `image`, `services_id`, `type`, `directer`, `duration`) VALUES
(2, 'Arranged love', 'The story of Meera, who left India and her inheritance behind and now runs her own startup. When a problem threatens', 'arranged love.jpg', 1, 'comedy . romance . action', 'Steven spilberg', '2hr'),
(3, 'As good as it gets', 'Melvin writer of romantic fiction, is rude to everyone he meets, including his gay neighbor, Simon. After Simon is hospitalized, Melvin finds his life turned upside down when he has to look after Simon\'s dog.', 'as god as it gets.jpg', 1, 'comedy . romance . action', 'Martin scorsese', '2.5hr'),
(4, 'Away and back', 'Jack Peterson, a widowed father of three young children, encounters Ginny Newsom, a wildlife biologist, whose mission is tracking trumpeter swans, a family of which settle in a pond on the Peterson farm. ', 'away and back.jpg', 1, 'comedy . romance . action', 'Quentin tarantino ', '1.5hr'),
(5, 'Barbie', 'Barbie and Ken are having the time of their lives in the colorful and seemingly', 'barbie.jpg', 1, 'comedy . romance . action', 'Jams camron', '2hr'),
(6, 'Ben hur', 'In 25 AD, Judah Ben-Hur, a Jew in ancient Judea, opposes the occupying Roman empire. Falsely accused by a Roman childhood friend-turned-overlord of trying to kill the Roman governor, he is put into slavery and his mother and sister are taken away as priso', 'ben hur.jpg', 1, 'comedy . romance . action', 'Ridley scott', '2.5hr'),
(7, 'Black lotus', 'An ex-special forces operative wages a one man war through the streets of Amsterdam', 'black lotus.jpg', 1, 'comedy . romance . action', 'steven spilberg', '1.5hr'),
(8, 'Bro', 'After being fatally injured in a car crash, a man is given three months back on earth to make amends.', 'bro.jpg', 1, 'comedy . romance . action', 'Martin scorsese', '2hr'),
(9, 'camp', 'Misfits in their lives back home, a group of young people live it up at musical-theater camp. While the sports counselor is completely ignored, the kids\' spend all their time in rehearsal for a grueling schedule that involves a new show every two weeks. S', 'camp.jpg', 1, 'comedy . romance . action', 'Ridley scott', '1.5hr'),
(10, 'Dirty lies', 'An under-appreciated intern entrusted with a million dollar necklace races to find out which of his money hungry room-mates betrayed him as he battles a desperate criminal duo bent on stealing.', 'dirty lies.jpg', 2, 'comedy . romance . action', 'steven spilberg', '2.5hr'),
(11, 'Crucify', 'A neon noir thriller that descends into a maze of nightmares as two teens trapped in a haunted crime scene are forced to confront their demons.', 'crucify.jpg', 2, 'comedy . romance . action', 'Quentin tarantino ', '2hr'),
(12, 'Dampyr', 'Haunted by nightmares, Harlan Draka wanders through the war-torn Balkan countryside, making money out of ridding superstitious villagers of imaginary monsters.', 'dampyr.jpg', 2, 'comedy . romance . action', 'Jams camron', '1.5hr'),
(13, 'Dead bus', 'A neon noir thriller that descends into a maze of nightmares as two teens trapped in a haunted crime', 'dead birds.jpg', 2, 'comedy . romance . action', 'Ridley scott', '2.5hr'),
(14, 'Deewangee', 'Hired by a singer to defend her friend, who has been accused of murder, a formidable lawyer learns that the man he represents may not be innocent.', 'deewangee.jpg', 2, 'comedy . romance . action', 'Martin scorsese', '2hr'),
(15, 'Dream', 'A top football player Hong-dae gets involved in an assault case and winds up being appointed as the coach for the national football team. This team will compete in the \'Homeless World Cup\'', 'dream.jpg', 2, 'comedy . romance . action', 'steven spilberg', '2.5hr'),
(16, 'Dylan & zoey', 'Adele is suffering from a terrifying recurring dream; a dream that often borders on reality, and even enters it in the form of horrible visions which climax during an evening stroll in the center of Rome', 'dylan and zoey.jpg', 2, 'comedy . romance . action', 'Quentin tarantino ', '1.5hr'),
(17, 'Evil trapes', 'A neon noir thriller that descends into a maze of nightmares as two teens trapped in a haunted crime scene are forced to confront their demons.', 'evil tapes.jpg', 2, 'comedy . romance . action', 'Jams camron', '2.5hr'),
(18, 'I am devid', 'Adele is suffering from a terrifying recurring dream; a dream that often borders on reality, and even enters it in the form of horrible visions which climax during an evening stroll in the center of Rome', 'i am devvid.jpg', 3, 'comedy . romance . action', 'Clint eastwood', '1.5hr'),
(19, 'I am rage', 'An ancient cult embroiled in a sinister blood trade makes the deadly mistake of abducting a young woman with a violent, shocking past.', 'i am rage.jpg', 3, 'comedy . romance . action', 'Woody allen', '1.5hr'),
(20, 'In a good way', 'In A Good Way (2015) is a 2D animation short about the fear of social value. The story addresses how society tries to shape and distort people, to evoke awareness of respecting one\'s true voice and following one\'s natural path.', 'in a good way.jpg', 3, 'comedy . romance . action', 'Martin scorsese', '2hr'),
(21, 'Iahq', 'An ancient cult embroiled in a sinister blood trade makes the deadly mistake of abducting a young woman with a violent, shocking past.', 'ishq.jpg', 3, 'comedy . romance . action', 'steven spilberg', '1.5hr'),
(22, 'Lift', 'This feature takes us into the world of \"boosters\" or shoplifters where a charismatic, intelligent young female booster from a dysfunctional family, notably her mother and grandmother', 'lift.jpg', 3, 'comedy . romance . action', 'Quentin tarantino ', '1.5hr'),
(23, 'maamannan', 'An MLA and his son, who are from oppressed community, are forced to stand up against the privileged, arrogant scion of a late politician, who is determined to make them bow down to him.', 'maamannan.jpg', 3, 'comedy . romance . action', 'Clint eastwood', '2hr'),
(24, 'Man fish', 'MAN FISHING is a cinematic look at the vastly changing seafood system through the lens of small-scale fishermen across the United States. Narrated by best-selling author Mark Bittman, the film explores the dichotomy', 'man fish.jpg', 3, 'comedy . romance . action', 'Ridley scott', '1.5hr'),
(25, 'May be its you', 'An MLA and his son, who are from oppressed community, are forced to stand up against the privileged, arrogant scion of a late politician, who is determined to make them bow down to him.', 'maybe its you.jpg', 3, 'comedy . romance . action', 'Jams camron', '2.5hr'),
(26, 'Middle class', 'Raghava, who runs a breakfast center in his village, dreams of starting a small hotel in nearby city, Guntur. Accompanied by his friend Gopal, Raghava plans to buy an old shop in city against the interest of his father, which co-incident', 'middle class.jpg', 4, 'comedy . romance . action', 'Quentin tarantino ', '2hr'),
(27, 'Mob land', 'A young father gets in over his head after a robbery goes wrong. Some debts can\'t be repaid with money.', 'mob land.jpg', 4, 'comedy . romance . action', 'steven spilberg', '1.5hr'),
(28, 'Older gods', 'After the disappearance of his troubled friend, American Chris Rivers travels to the remote Welsh countryside to investigate what happened – leading him to a dark apocalyptic cult.', 'older gods.jpg', 4, 'comedy . romance . action', 'Martin scorsese', '2hr'),
(29, 'Pabuya', 'Gang leader, Pepe, is chased by his rival gangs and the police so he runs to his old flame, Bella, who he trust. But this trust is shaken when the police issues a reward for his capture.', 'pabuya.jpg', 4, 'comedy . romance . action', 'Clint eastwood', '1.5hr'),
(30, 'pareshan', 'Issac and his friends are typical jobless youth who waste time boozing around and get scolded by their parents. As if aimlessness was not an issue, Issac faces an unexpected problem that changes his life due to his girlfriend, Shirisha.', 'pareshan.jpg', 4, 'comedy . romance . action', 'Ridley scott', '2hr'),
(31, 'pushpa part 1', 'Pushpa Raj is a coolie who rises in the world of red sandalwood smuggling. Along the way, he doesn’t shy from making an enemy or two.', 'pushpa part 1.jpg', 4, 'comedy . romance . action', 'Woody allen', '1.5hr'),
(32, 'pyaar impossible', 'Be-spectacled geek, Abhay falls in love with college hottie, Alisha and silently slinks away into the shadows when he realises she\'s unattainable. Seven years later', 'pyaar impossible.jpg', 4, 'comedy . romance . action', 'Clint eastwood', '2.5hr'),
(33, 'Red', 'After surviving an assault from a squad of hit men, retired CIA black ops agent Frank Moses reassembles his old team for an all-out war. Frank reunites with old Joe', 'red.jpg', 4, 'comedy . romance . action', 'Jams camron', '2hr'),
(34, 'Rocky aur Rani ki prem kahani', 'Gym-freak brat Rocky falls in love with Rani, who comes from a well-educated Bengali family. Being from polar opposite worlds, the two decide to switch their families to adjust to each other\'s cultures and backgrounds', 'Rocky Aur Rani Kii Prem Kahaani.jpg', 5, 'comedy . romance . action', 'Quentin tarantino ', '1.5hr'),
(35, 'rub', 'Meet Neal. He\'s lonely, gets bullied at work, and is unlucky in love. At the suggestion of a co-worker he decides to go to a massage parlor', 'rub.jpg', 5, 'comedy . romance . action', 'steven spilberg', '1.5hr'),
(36, 'Rufus', 'Manny has moved to a new school, and it\'s not easy to fit in. After wishing he had more friends, Manny finds a mysterious collar and puts it on Rufus, the family dog.', 'rufus.jpg', 5, 'comedy . romance . action', 'Ridley scott', '2hr'),
(37, 'Silent hours', 'Private detective John Duval, an ex-lieutenant commander in the Royal Navy and Naval Intelligence, finds himself the prime suspect in a police hunt for a sexual killer when three women are brutally murdered.', 'silent hours.jpg', 5, 'comedy . romance . action', 'Woody allen', '2.5hr'),
(38, 'Spooky+', 'Years ago, a village head in the Hong Kong countryside executed a man for committing adultery by drowning him in the ocean. His mistress, in attempts to flee the village, dies when she plummets into a pool of quicksand. Years later', 'spooky+.jpg', 5, 'comedy . romance . action', 'Clint eastwood', '2hr'),
(39, 'Tangled', 'Whe Rider hides out in a mysterious tower, he\'s taken hostage by Rapunzel, a beautiful and feisty tower-bound teen with 70 feet', 'tangled.jpg', 5, 'comedy . romance . action', 'steven spilberg', '1.5hr'),
(40, 'The baker', 'A quiet, stoic man, lives a monk-like existence in self-imposed exile. When his estranged son is killed in a drug deal gone bad, he is left to look after a granddaughter', 'the baker.jpg', 5, 'comedy . romance . action', 'Woody allen', '2.5hr'),
(41, 'The bigfoot trap', 'A journalist\'s life is changed forever when he\'s locked inside of a bigfoot trap by an insane sasquatch hunter.', 'the bigfoot trap.jpg', 5, 'comedy . romance . action', 'Clint eastwood', '2hr'),
(42, 'The mistrees', 'Secrets, rumors and betrayals surround the upcoming marriage between a young dissolute man and virtuous woman of the French aristocracy.', 'the mistrees.jpg', 6, 'comedy . romance . action', 'Ridley scott', '1.5hr'),
(43, 'The murderer', 'A lack of inspiration plunges a painter into an intense and hasty introspection. His sanity diminishes, leaving a sinister and putrid madness', 'the murderer.jpg', 6, 'comedy . romance . action', 'Quentin tarantino ', '2hr'),
(44, 'The slumber party', 'The hilarious aftermath of a sleepover birthday party hypnotism gone wrong as best friends Megan and Paige, along with soon-to-be step-sister Veronica', 'The Slumber Party.jpg', 6, 'comedy . romance . action', 'Clint eastwood', '1.5hr'),
(45, 'To kill a step father', 'The hilarious aftermath of a sleepover birthday party hypnotism gone wrong as best friends Megan and Paige, along with soon-to-be step-sister Veronica', 'To Kill a Stepfather.jpg', 6, 'comedy . romance . action', 'Ridley scott', '2hr'),
(46, 'Transit', 'Nate takes his family for a camping trip to reconnect. When they pull off at a rest stop, a gang of thieves hides their stash from an armored car robbery among ', 'transit.jpg', 6, 'comedy . romance . action', 'Jams camron', '2.5hr'),
(47, 'Ultrasound', 'After his car breaks down, Glen spends one hell of an odd night with a married couple, setting into motion a chain of events that alter their lives plus those of several random strangers.', 'ultrasound.jpg', 6, 'comedy . romance . action', 'Martin scorsese', '1.5hr'),
(48, 'Whats comes around', 'In Rod El Farag, one of the poorest residential areas in Cairo, obtaining meat, fruit and daily bread is a constant struggle. But the sense of community shared by the inhabitants', 'whats come around.jpg', 6, 'comedy . romance . action', 'steven spilberg', '2.5hr'),
(49, 'Zoey', 'Pacific Coast Academy alumni return to Malibu for an over-the-top wedding that turns into a high school reunion for the books.', 'zoey.jpg', 6, 'comedy . romance . action', 'Quentin tarantino ', '2hr');

-- --------------------------------------------------------

--
-- Table structure for table `subcription_plane`
--

CREATE TABLE `subcription_plane` (
  `sub_id` int(11) NOT NULL,
  `subscription` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcription_plane`
--

INSERT INTO `subcription_plane` (`sub_id`, `subscription`, `price`) VALUES
(1, 'Basic', '$9.99'),
(2, 'premium', '$19.99'),
(3, 'advance', '$29.99'),
(4, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `service_id` int(100) NOT NULL,
  `subscription_start` varchar(100) NOT NULL,
  `subscription_end` varchar(100) NOT NULL,
  `billing_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tv_shows`
--

CREATE TABLE `tv_shows` (
  `tv_id` int(11) NOT NULL,
  `show_name` varchar(100) NOT NULL,
  `show_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tv_shows`
--

INSERT INTO `tv_shows` (`tv_id`, `show_name`, `show_image`) VALUES
(1, 'Crime Patrol', 'crime_patrol.jpg'),
(2, 'CID', 'cid.jpeg'),
(3, 'Big Boss', 'big_boos.jpeg'),
(4, 'Yai dil mera', 'yai_dil_mera.jpg'),
(5, 'saraab', 'saraab.jpg'),
(6, 'Tinkay ka sahara', 'tinky_ka_sahara.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `sub_id`) VALUES
(13, 'abdulsamad', 'babulbrohi43@gmail.com', '123', 2),
(14, 'saad', 'sami88787@gmail.com', '12345', 2),
(17, 'test', 'test@admin.com', '12345', 4),
(21, 'developer', 'testing@admin.com', '12345', 4),
(22, 'developerr', 'testingg@gmail.com', '12345', 4),
(23, 'developerr', 'Adminn@gmail.com', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fav_list`
--
ALTER TABLE `fav_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `uz` (`user_id`);

--
-- Indexes for table `previously_watched`
--
ALTER TABLE `previously_watched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`user_id`);

--
-- Indexes for table `service_p`
--
ALTER TABLE `service_p`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_id` (`services_id`);

--
-- Indexes for table `subcription_plane`
--
ALTER TABLE `subcription_plane`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `tv_shows`
--
ALTER TABLE `tv_shows`
  ADD PRIMARY KEY (`tv_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fav_list`
--
ALTER TABLE `fav_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `previously_watched`
--
ALTER TABLE `previously_watched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_p`
--
ALTER TABLE `service_p`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `subcription_plane`
--
ALTER TABLE `subcription_plane`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_shows`
--
ALTER TABLE `tv_shows`
  MODIFY `tv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`services_id`) REFERENCES `service_p` (`service_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service_p` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
