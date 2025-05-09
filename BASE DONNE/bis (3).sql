-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 mars 2025 à 00:42
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
 
-- --------------------------------------------------------

--
-- Structure de la table `tblblotter`
--

CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL,
  `complainant` varchar(100) DEFAULT NULL,
  `respondent` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblblotter`
--

INSERT INTO `tblblotter` (`id`, `complainant`, `respondent`, `age`, `type`, `location`, `date`, `time`, `details`, `status`) VALUES
(34, 'Girl Topak', 'Boy Topak', '12', 'Check up', 'Resident house', '2023-01-24', '12:46:00', 'wwwwww', 'Scheduled');

-- --------------------------------------------------------

--
-- Structure de la table `tblbrgy_info`
--

CREATE TABLE `tblbrgy_info` (
  `id` int(11) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `city_logo` varchar(100) DEFAULT NULL,
  `brgy_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblbrgy_info`
--

INSERT INTO `tblbrgy_info` (`id`, `province`, `town`, `brgy_name`, `number`, `text`, `image`, `city_logo`, `brgy_logo`) VALUES
(1, 'Laguna', 'Calamba City', 'Canlubang', '0919-1234567', 'This is the official Healthcare Center website of Barangay Canlubang, Calamba City Laguna. Visit us in our official facebook page at https://www.facebook.com/itsmearviegrajo', '16012023121621HDwallpaper_memes,_3d.jpg', '18012023154802Barangay_Canlubang_Seal.jpg', '18012023154802Calamba,_Laguna_Seal.svg.png');

-- --------------------------------------------------------

--
-- Structure de la table `tblchairmanship`
--

CREATE TABLE `tblchairmanship` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblchairmanship`
--

INSERT INTO `tblchairmanship` (`id`, `title`) VALUES
(2, 'Presiding Officer'),
(3, 'Committee on Appropriation'),
(4, 'Committee on Peace & Order'),
(5, 'Committee on Health'),
(6, 'Committee on Education'),
(7, 'Committee on Rules'),
(8, 'Committee on Infra'),
(9, 'Committee on Solid Waste'),
(10, 'Committee on Sports'),
(11, 'No Chairmanship');

-- --------------------------------------------------------

--
-- Structure de la table `tblofficials`
--

CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblofficials`
--

INSERT INTO `tblofficials` (`id`, `name`, `chairmanship`, `position`, `termstart`, `termend`, `status`) VALUES
(1, 'Peter Guevarra	', '2', '4', '2021-04-29', '2021-05-01', 'Active'),
(4, 'Marlon A. Lorio', '3', '7', '2021-04-03', '2021-04-24', 'Active'),
(5, 'GARRY A. RAFEL', '4', '8', '2021-04-03', '2021-04-03', 'Active'),
(6, 'TRILLION LOWRY	', '5', '9', '2021-04-03', '2021-04-03', 'Active'),
(7, 'MELANIE M. ELBOR	', '6', '10', '2021-04-03', '2021-04-03', 'Active'),
(8, 'ERLINDA V. VITUS	', '7', '11', '2021-04-03', '2021-04-03', 'Active'),
(9, 'JOEDAVINCE', '8', '12', '2021-04-03', '2021-04-03', 'Active'),
(10, 'ALEJANDRO A. CAGAMPANG	', '9', '13', '2021-04-03', '2021-04-03', 'Active'),
(11, 'JOSEPH P. PARDOS	', '10', '14', '2021-04-03', '2021-04-03', 'Active'),
(12, 'RUTH A. BACAG	', '11', '15', '2021-04-03', '2021-04-03', 'Active'),
(13, 'DIANNE A. CURRY	', '11', '16', '2021-04-03', '2021-04-03', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `id` int(11) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `amounts` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblpayments`
--

INSERT INTO `tblpayments` (`id`, `details`, `amounts`, `date`, `user`, `name`) VALUES
(5, 'Business Permit Payment', 7000.00, '2021-05-19', 'admin', ' Atrium Salon & Studio'),
(6, 'Certificate of Indigency Payment', 3500.00, '2021-05-19', 'admin', ' Ronil Gonzales Cajan'),
(7, 'Barangay Clearance Payment', 2500.00, '2021-05-19', 'admin', ' Ronil Poe Cajan'),
(8, 'Business Permit Payment', 3500.00, '2021-05-18', 'admin', ' Atrium Salon & Studio'),
(9, 'Business Permit Payment', 7000.00, '2021-05-18', 'admin', ' Atrium Salon & Studio'),
(10, 'Business Permit Payment', 7500.00, '2021-05-18', 'admin', ' Atrium Salon & Studio');

-- --------------------------------------------------------

--
-- Structure de la table `tblpermit`
--

CREATE TABLE `tblpermit` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `owner1` varchar(200) DEFAULT NULL,
  `owner2` varchar(80) DEFAULT NULL,
  `nature` varchar(220) DEFAULT NULL,
  `applied` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblpermit`
--

INSERT INTO `tblpermit` (`id`, `name`, `owner1`, `owner2`, `nature`, `applied`) VALUES
(4, 'SH Food Group 1', 'SH Food Group 1', 'SH Food Group 2', 'SH Food Group 1', '2021-04-30'),
(5, 'Atrium Salon & Studio', 'SH Food Group 213', '', 'Atrium Salon & Studio', '2021-04-30');

-- --------------------------------------------------------

--
-- Structure de la table `tblposition`
--

CREATE TABLE `tblposition` (
  `id` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblposition`
--

INSERT INTO `tblposition` (`id`, `position`, `order`) VALUES
(4, 'Captain', 1),
(7, 'Councilor 1', 2),
(8, 'Councilor 2', 3),
(9, 'Councilor 3', 4),
(10, 'Councilor 4', 5),
(11, 'Councilor 5', 6),
(12, 'Councilor 6', 7),
(13, 'Councilor 7', 8),
(14, 'SK Chairman', 9),
(15, 'Secretary', 10),
(16, 'Treasurer', 11);

-- --------------------------------------------------------

--
-- Structure de la table `tblprecinct`
--

CREATE TABLE `tblprecinct` (
  `id` int(11) NOT NULL,
  `precinct` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblpurok`
--

CREATE TABLE `tblpurok` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblpurok`
--

INSERT INTO `tblpurok` (`id`, `name`, `details`) VALUES
(13, 'Purok 2', 'Asia 2'),
(14, 'Purok 9', 'Asia 1'),
(15, 'Purok 1', 'Asia 1'),
(16, 'Purok 3', '');

-- --------------------------------------------------------

--
-- Structure de la table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `civilstatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `purok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `voterstatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenship` varchar(50) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alias` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthplace` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `identified_as` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `national_id` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resident_type` int(11) DEFAULT 1,
  `remarks` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblresident`
--

INSERT INTO `tblresident` (`id`, `firstname`, `middlename`, `lastname`, `age`, `birthdate`, `civilstatus`, `gender`, `purok`, `voterstatus`, `citizenship`, `picture`, `alias`, `birthplace`, `identified_as`, `phone`, `email`, `national_id`, `occupation`, `address`, `resident_type`, `remarks`) VALUES
(171, 'DR BOUCHRA', ' ', 'KABI', 50, '1949-10-10', 'SINGLE', 'FEMALE', 'PUROK 2', 'YES', 'Filipino', '18052021113447Screenshot2021-05-06183815.png', 'FPJ', 'Metro  Manila', 'Unidentified', '19512659595', 'cajanr02rtrt22@gmail.com', '321321321', 'IT', '310 W Las Colinas Blvd', 1, 'dasds'),
(169, 'DR MOHAMED', ' ', 'HANI', 40, '1980-12-23', 'SINGLE', 'MALE', 'PUROK 2', '', 'filipino', '24012023042459HDwallpaper_Anime,SoloLeveling,SungJin-Woo.jpg', 'Royal Blood', 'aklan', '', '19512659595', 'cajanr02rtrt22@gmail.com', '', '', '310 W Las Colinas Blvd', 1, ''),
(181, 'jayward', 'jed', 'dej', 2, '2023-01-28', 'Single', 'Female', 'Purok 9', 'No', 'filipino', '24012023043051ANIME_KUBO-SANWAMOBWOYURUSANAIEP1.jfif', '', 'aklan', '', '19512659595', '', '22222222222', '', 'qweqwe', 1, ''),
(174, 'Ronil', 'M', 'Cajan', 33, '2021-04-01', 'Married', 'Female', 'Purok 2', 'Yes', '', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8X 6VNN2v7E9O0UmfUBKzOKQ1JjdJz/imjcn1Fb2xSDPIM+cUYvEvoq2tNg7US0ES s5f0kntWrYYjqGqgkSn/Ss/UD+oPvXG5qUdeSnHHUgK8AxINWnGYqlsn1AJxmrMSSZrR+T6spWO38Ch9sETP2qy3Vcw4z2JFSOPwKG1RvNMnIL6X/pP4YV1LyfJrqNgtn//2Q==', 'ron', 'Plaridel', 'Positive', '19512659595', 'cajanr02@gmail.com', '', '', '310 W Las Colinas Blvd', 1, ''),
(180, 'Aaron', 'Deez', 'Nuts', 33, '2021-04-28', 'Widow', 'Male', 'Purok 2', 'No', 'Pinoy', '17012023040124person.png', 'Candice', '321321', '', '19512659595', 'cajanr0222@gmail.com', '1212321321', 'IT', '310 W Las Colinas Blvd', 1, 're'),
(182, 'Aaron', 'Deez', 'Nuts', 33, '2021-04-28', 'Widow', 'Male', 'Purok 2', 'No', 'Pinoy', '17012023040124person.png', 'Candice', '321321', '', '19512659595', 'cajanr0222@gmail.com', '1212321321', 'IT', '310 W Las Colinas Blvd', 1, 're'),
(183, 'DR ASHRAF', ' ', 'JIHAD', 23, '2023-03-10', 'MARRIED', 'MALE', '', 'YES', '', '', '', '', '', '', '', '', '', '', 1, ''),
(184, 'FIRST ', 'MIDDLE ', 'LAST ', 56, '2023-03-03', 'SINGLE', 'MALE', 'PUROK 2', 'YES', '', '', '', '', '', '', '', '', '', '', 1, ''),
(185, 'AMIN', 'KA', 'KOL', 19, '2000-10-19', 'CÉLIBATAIRE', 'MÂLE', 'PUROK 2', 'NON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(186, 'OK', 'OK', 'OK', 99, '2000-10-10', 'MARIÉ', 'MÂLE', 'PUROK 8', 'OUI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(187, 'DR OSAMA ', ' ', 'ALAWI', 40, '0010-10-10', 'SINGLE', 'MALE', '', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(188, 'DR OSAMA', 'ELIDRISSI', ' ', 50, '1988-10-10', 'SINGLE', 'MALE', '', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(189, 'ALI', 'OMAR', 'FASI', 20, '1999-10-10', 'MARIÉ', 'MÂLE', 'PUROK 2', 'OUI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(190, 'DR MOUSA', 'HATIM', ' ', 29, '1998-10-10', 'VEUF', 'MÂLE', 'PUROK 1', 'OUI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(191, 'DR MARMUSH', ' ', 'HAQIMA', 50, '1950-10-10', 'CÉLIBATAIRE', 'FEMELLE', 'PUROK 2', 'NON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`id`, `title`, `description`, `category`, `image`, `status`, `create_date`) VALUES
(1, '4th Semester Barangay Assembly ', 'demo test 3', 'REMINDER', '', '0', '2023-03-08'),
(2, 'Release of National ID', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsa nesciunt mollitia natus cupiditate amet porro deleniti nisi iusto, dolor autem odio, maxime, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsa nesciunt mollitia natus cupiditate amet porro deleniti nisi iusto, dolor autem odio, maxime, iste nam modi repellatcLorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsa nesciunt mollitia natus cupiditate amet porro deleniti nisi iusto, dolor autem odio, maxime, iste nam modi repellat dolores s Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsa nesciunt mollitia natus cupiditate amet porro deleniti nisi iusto, dolor autem odio, maxime, iste nam modi repellat dolores sapiente? Natus!apiente? Natus! dolores sapiente? Natus! iste nam modi repellat dolores sapiente? Natus!', 'ANNOUNCEMENT', '', '0', '2023-03-08'),
(3, 'Controle', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ipsa nesciunt mollitia natus cupiditate amet porro deleniti nisi iusto, dolor autem odio, maxime, iste nam modi repellat dolores sapiente? Natus!', 'ANNOUNCEMENT', 'xkk.jpg', '1', '2024-12-12'),
(4, 'test', 'asdasd', 'ANNOUNCEMENT', '', '0', '2023-03-08'),
(5, 'Don du Song', 'Action Humanitaire', 'REMINDER', 'Screenshot 2023-03-05 204047.png', '1', '2024-12-12'),
(6, 'Consultation', 'Urgent', 'ANNOUNCEMENT', 'sq.png', '1', '2024-12-12'),
(7, 'Contre le VIH', '', 'ANNOUNCEMENT', 'Screenshot 2023-03-05 204626.png', '1', '2024-12-12'),
(8, 'Congré Deramotologie', 'Pour les intéresés', 'REMINDER', 'ko.jpg', '1', '2024-12-12');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `resident_name` varchar(50) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `staff_in_charge` varchar(25) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `concern` varchar(500) DEFAULT NULL,
  `appointment_type` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `resident_name`, `age`, `staff_in_charge`, `request_date`, `concern`, `appointment_type`, `status`, `appointment_date`, `remarks`, `mobile_no`) VALUES
(23, 'OMAR', 28, 'EVELINA CATAPANG', '2023-03-07', 'headache', 'CHECK-UP', 'scheduled', '2023-03-09', 'No Remarks', 2147483647),
(25, 'NAWAL', 23, 'LISA MANALO', '2023-03-08', 'continuous headache for 2 days, vomitting', 'CHECK-UP', 'completed', '2023-03-13', 'fully booked on march 9, 10, 11', 2147483647),
(26, 'HANAN', 60, 'PRECY BORDEOS', '2023-03-08', 'backpain', 'CHECK-UP', 'completed', '2023-03-08', 'No Remarks', 46565465),
(27, 'MORAD', 30, 'unassigned', '2024-12-07', 'OK', 'VACCINATION', 'active', NULL, NULL, 989),
(28, 'SAFAE', 30, 'unassigned', '2024-12-07', 'OK', 'CONTRÔLE', 'active', NULL, NULL, 661),
(29, 'MARWANE', 90, 'unassigned', '2024-12-12', 'LE DOS', 'VACCINATION', 'active', NULL, NULL, 661737373),
(99, 'MINA', 90, 'HIM', '2010-10-10', 'ACHE', 'OK', 'OK', '2024-12-17', 'OK', NULL),
(102, 'LAMINE', 20, 'Cardiology - Dr. Jemmy wa', '2023-01-01', 'heart', 'heart', 'active', '2023-01-01', 'heart', 661),
(108, 'JAMAL', 90, 'Optometrists - Dr. Shoko ', '2023-01-01', 'RHUME', 'RHUME', 'active', '2023-01-01', 'RHUME', 0),
(129, 'ISSA HAYATU', 19, 'Cardiology - Dr. Jemmy wa', '2023-01-01', 'MAL', 'MAL', 'active', '2023-01-01', 'MAL', 0),
(138, 'IMRANE', 14, 'Pediatrician - Dr. Bryan ', '2023-01-01', 'YES', 'YES', 'active', '2023-01-01', 'YES', 6789),
(139, 'YAHAYA', 20, 'Cardiology - Dr. Jemmy wa', '2023-01-01', 'DOS', 'DOS', 'active', '2023-01-01', 'DOS', 6615426),
(141, 'MARWANE', 20, 'Cardiology - Dr. Jemmy wa', '2023-01-01', 'OK', 'OK', 'active', '2023-01-01', 'OK', 999),
(142, 'KAMAL', 20, 'Pediatrician - Dr. Bryan ', '2023-01-01', 'MAL', 'MAL', 'active', '2023-01-01', 'MAL', 999),
(143, 'SANAE', 30, 'Pediatrician - Dr. Bryan ', '2023-01-01', 'OK', 'OK', 'active', '2023-01-01', 'OK', 909),
(144, '7ASAN', 10, 'Neurology - Dr. Jeremy du', '2023-01-01', 'RHUME', 'RHUME', 'active', '2023-01-01', 'RHUME', 64542),
(148, 'ABAS', 20, 'Pediatrician - Dr. Bryan ', '2023-01-01', 'oui', 'oui', 'active', '2023-01-01', 'oui', 9),
(149, 'ABAS', 20, 'Pediatrician - Dr. Bryan ', '2023-01-01', 'oui', 'oui', 'active', '2023-01-01', 'oui', 9),
(150, 'NAWAL', 90, 'Neurology - Dr. Jeremy du', '2023-01-01', 'si', 'si', 'active', '2023-01-01', 'si', 9837),
(151, 'HASNAE', 30, 'unassigned', '2025-01-09', 'RHUME', 'CONTRÔLE', 'active', NULL, NULL, 661435343),
(152, 'FRANSISCO', 40, 'unassigned', '2025-01-09', 'DOS', 'CONTRÔLE', 'active', NULL, NULL, 732127),
(153, 'JOHN', 90, 'Cardiology - Dr. Jemmy wa', '2025-01-01', 'HEADCHE', 'HEADCHE', 'active', '2025-01-01', 'HEADCHE', 661738392);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_appointment_staff`
--

CREATE TABLE `tbl_appointment_staff` (
  `id` int(11) NOT NULL,
  `staff` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_appointment_staff`
--

INSERT INTO `tbl_appointment_staff` (`id`, `staff`) VALUES
(1, 'MARIA CAPACIA'),
(2, 'EVELINA CATAPANG'),
(3, 'LISA MANALO'),
(4, 'PRECY BORDEOS');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_chairmanship`
--

CREATE TABLE `tbl_chairmanship` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_chairmanship`
--

INSERT INTO `tbl_chairmanship` (`id`, `title`) VALUES
(2, 'CARDIOLOGY'),
(3, 'NEUROLOGY'),
(4, 'GYNECOLOGY'),
(5, 'DENTIST'),
(6, 'PEDIATRY'),
(7, 'UROLOGY'),
(8, 'NEUFROLOGY'),
(9, 'ANATOMY'),
(10, 'LABORATORY'),
(11, 'CARDIOLOGY');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_medical_supply`
--

CREATE TABLE `tbl_medical_supply` (
  `id` int(11) NOT NULL,
  `supply_name` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_medical_supply`
--

INSERT INTO `tbl_medical_supply` (`id`, `supply_name`, `description`, `category`, `quantity`) VALUES
(18, 'ASD', 'asd', 'FIRST AID', 32),
(20, 'SCANER', 'RADIO', 'PROTECTIVE GEAR', 900),
(21, 'MEDICATION TROLLLY', 'EMERGENCY TROLLY', 'PROTECTIVE GEAR', 900),
(22, 'RADIO', 'DETECTION DES  FRACTURES', 'FIRST AID', 39),
(23, 'PLATRE', 'PLATIR FRACTURE', 'PROTECTIVE GEAR', 40),
(24, 'STHETOSCOPE', 'DIAGNOSTIC', 'FIRST AID', 50),
(25, 'GLUCOMèTRES', 'Diagnostic', 'DIGITAL', 90),
(26, ' DéFIBRILLATEURS', 'Tool', 'FIRST AID', 10);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(11) NOT NULL,
  `generic_name` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `dosage` int(5) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `generic_name`, `description`, `category`, `quantity`, `dosage`, `unit`) VALUES
(20, 'WRWER', 'werw', 'ANTIBIOTIC', 5, 800, 'ML'),
(23, 'ASPRO', 'TETE', 'ANALGESIC', 200, 200, 'G'),
(24, 'FLURAZéPAM', 'Sleeping', 'ANALGESIC', 20, 30, 'L'),
(25, 'LORAZéPAM', 'Headache', 'ANTIBIOTIC', 10, 10, 'L'),
(31, 'SOLAKOM', 'descr', 'ANTIBIOTIC', 100, 20, '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_med_category`
--

CREATE TABLE `tbl_med_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_med_category`
--

INSERT INTO `tbl_med_category` (`id`, `category`) VALUES
(1, 'ANALGESIC'),
(2, 'ANTIBIOTIC'),
(3, 'VITAMINS'),
(4, 'INSULIN');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_med_supply_category`
--

CREATE TABLE `tbl_med_supply_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_med_supply_category`
--

INSERT INTO `tbl_med_supply_category` (`id`, `category`) VALUES
(1, 'PROTECTIVE GEAR'),
(2, 'FIRST AID'),
(3, 'DIGITAL');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_med_unit`
--

CREATE TABLE `tbl_med_unit` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_med_unit`
--

INSERT INTO `tbl_med_unit` (`id`, `unit`) VALUES
(1, 'MG'),
(2, 'ML'),
(3, 'G'),
(4, 'L');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_officials`
--

CREATE TABLE `tbl_officials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_officials`
--

INSERT INTO `tbl_officials` (`id`, `name`, `chairmanship`, `position`, `termstart`, `termend`, `status`) VALUES
(5, 'Jilali', '4', '8', '2021-04-03', '2021-04-03', 'Active'),
(6, 'Abdelkader', '5', '9', '2021-04-03', '2021-04-03', 'retraité'),
(7, 'Morad', '6', '10', '2021-04-03', '2021-04-03', 'congé'),
(8, 'Mustapha', '7', '11', '2021-04-03', '2021-04-03', 'Inactive'),
(9, 'BRAHIM', '8', '12', '2021-04-03', '2021-04-03', 'Active'),
(11, 'Amine', '10', '14', '2021-04-03', '2021-04-03', 'Active'),
(12, 'Zineb', '11', '15', '2021-04-03', '2021-04-03', 'Active'),
(13, 'AHLAM', '11', '16', '2021-04-03', '2021-04-03', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `position`, `order`) VALUES
(4, 'Captain', 1),
(7, 'Councilor 1', 2),
(8, 'Councilor 2', 3),
(9, 'Councilor 3', 4),
(10, 'Councilor 4', 5),
(11, 'Councilor 5', 6),
(12, 'Councilor 6', 7),
(13, 'Councilor 7', 8),
(14, 'SK Chairman', 9),
(15, 'Secretary', 10),
(16, 'Treasurer', 11);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_support`
--

CREATE TABLE `tbl_support` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_support`
--

INSERT INTO `tbl_support` (`id`, `name`, `email`, `number`, `subject`, `message`, `date`) VALUES
(10, 'test', 'asdasd@sdf', '165516', 'asda', 'asdas', '2023-03-04 08:50:39');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT '',
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `display_name` varchar(50) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `user_type`, `avatar`, `created_at`, `display_name`, `status`) VALUES
(24, 'sys-admin', '10', 'system-maintenance', 'user-placeholder.png', '2023-01-21 19:47:52', 'System Admin', 1),
(55, 'resident', '10', 'resident', 'user-placeholder.png', '2023-01-22 00:06:05', 'Resident', 1),
(63, 'admin', '10', 'second admin', '', '2023-03-08 20:46:27', 'second admin', 1),
(65, 'omar', '30', 'system-maintenance', NULL, '2024-12-13 19:34:24', 'OMAR', 0);

-- --------------------------------------------------------

 

--
-- Index pour la table `tblblotter`
--
ALTER TABLE `tblblotter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblbrgy_info`
--
ALTER TABLE `tblbrgy_info`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblchairmanship`
--
ALTER TABLE `tblchairmanship`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblofficials`
--
ALTER TABLE `tblofficials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblpermit`
--
ALTER TABLE `tblpermit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblposition`
--
ALTER TABLE `tblposition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblprecinct`
--
ALTER TABLE `tblprecinct`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblpurok`
--
ALTER TABLE `tblpurok`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_appointment_staff`
--
ALTER TABLE `tbl_appointment_staff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_chairmanship`
--
ALTER TABLE `tbl_chairmanship`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_medical_supply`
--
ALTER TABLE `tbl_medical_supply`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_med_category`
--
ALTER TABLE `tbl_med_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_med_supply_category`
--
ALTER TABLE `tbl_med_supply_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_med_unit`
--
ALTER TABLE `tbl_med_unit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_support`
--
ALTER TABLE `tbl_support`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

 
--
-- AUTO_INCREMENT pour la table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `tblbrgy_info`
--
ALTER TABLE `tblbrgy_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tblchairmanship`
--
ALTER TABLE `tblchairmanship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tblofficials`
--
ALTER TABLE `tblofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tblpermit`
--
ALTER TABLE `tblpermit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tblposition`
--
ALTER TABLE `tblposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `tblprecinct`
--
ALTER TABLE `tblprecinct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tblpurok`
--
ALTER TABLE `tblpurok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT pour la table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pour la table `tbl_appointment_staff`
--
ALTER TABLE `tbl_appointment_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_chairmanship`
--
ALTER TABLE `tbl_chairmanship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_medical_supply`
--
ALTER TABLE `tbl_medical_supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `tbl_med_category`
--
ALTER TABLE `tbl_med_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_med_supply_category`
--
ALTER TABLE `tbl_med_supply_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_med_unit`
--
ALTER TABLE `tbl_med_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `tbl_support`
--
ALTER TABLE `tbl_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
