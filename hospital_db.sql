-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `slot_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `department`, `doctor`, `slot_time`, `date`, `message`) VALUES
(4, 'devendra', '7742476561', 'Neurology', 'mr. dishu gahlot', '11:00:00', '2025-05-29', 'dfmvkgjfdjlik'),
(5, 'garveet Dhanka', '7742476561', 'Cardiology', 'dev kumar', '11:00:00', '2025-05-29', 'd.fkjksjk'),
(6, 'bhawna meena', '6376172123', 'Cardiology', 'rdx', '11:00:00', '2025-05-29', 'relkjtoijesidok'),
(7, 'om', '7014250411', 'Cardiology', 'dev kumar', '11:45:00', '1969-01-10', 'your college is shit it has no doskfjosidfjoisdfjoisgjoidgjfiogjrfiopgjproe\r\n'),
(8, 'ouhdf', '8306768807', 'Neurology', 'mr. dishu gahlot', '11:00:00', '2025-05-21', 'dkjbk'),
(9, 'parth ', '8796451646', 'General Physician', 'lucky dhanka', '10:00:00', '2025-05-18', 'me bimar hu'),
(10, 'yogesh ', '7742476561', 'Neurology', 'mr. dishu gahlot', '11:00:00', '2025-05-20', 'sdjksjfkjdklj'),
(11, 'devendra', '6376172123', 'Cardiology', 'dev kumar', '10:15:00', '2025-05-27', 'sdjflkjakljflksdjfkjk'),
(12, 'devendra', '7742476561', 'Neurology', 'mr. dishu gahlot', '11:00:00', '2025-05-28', 'rbhjuwu'),
(13, 'himmat singh', '48486546645', 'Cardiology', 'dev kumar', '10:30:00', '2025-05-21', 'me bimar hu'),
(14, 'garveet Dhanka', '7742476561', 'Cardiology', 'raghav kumar', '09:15:00', '2025-05-25', 'cvhschsdhv[psvkxcn kcdk [d ');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `experience` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_name`, `email`, `phone`, `department`, `experience`, `created_at`) VALUES
(6, 'dev kumar', 'dk@gmail.com', '6376172123', 'Cardiology', 4, '2025-05-14 04:04:01'),
(7, 'mr. dishu gahlot', 'dg@gmail.com', '7742476561', 'Neurology', 4, '2025-05-14 04:36:00'),
(8, 'rdx', 'rk@gmail.com', '8306768807', 'Cardiology', 8, '2025-05-16 06:49:00'),
(10, 'DR. PUSHKAR GUPTA', 'PUSHKARGUPTA@KHAITAN.COM', '9828020015', 'Neurology', 25, '2025-05-20 03:34:28'),
(11, 'DR. KAPIL KHANDELWAL', 'KAPILKHANDELWAL@KHAITAN.COM', '8387799936', 'Neurology', 25, '2025-05-20 03:36:45'),
(12, 'dev kumar', 'jfoue@pfoir.com', '6376172123', 'Dentistry', 5, '2025-05-20 05:36:13'),
(13, 'dev kumar', 'hjwvhjd@knfjeh.ejhfiej', '6376172123', 'Orthopedics', 33, '2025-05-20 06:23:33'),
(14, 'dev kuma', 'hjwvhjd@knfjeh.ejhfi', '6376172123', 'Orthopedics', 33, '2025-05-20 06:30:28'),
(15, 'dev kuma', 'hjwvhjd@knfjeh.ejhf', '6376172123', 'Orthopedics', 33, '2025-05-20 06:35:50'),
(16, 'raghav', 'raghav@gmail.com', '7740871644', 'General Physician', 1, '2025-05-20 06:40:09'),
(17, 'raghav kuma', 'rk25@gmail.com', '7840479028', 'Orthopedics', 2, '2025-05-20 06:41:00'),
(18, 'kajal', 'kk@gmail.com', '9602609423', 'Dentistry', 7, '2025-05-20 06:43:11'),
(19, 'raghav kumar', 'Garveetdhanka298@gmail.com', '6376172123', 'Cardiology', 7, '2025-05-20 06:43:37'),
(20, 'dkhfj', 'hdigfihk@f.ref', '373687648736', 'Orthopedics', 5, '2025-05-20 06:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('patient','doctor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'garveetdhanka', 'Garveetdhanka298@gmail.com', '$2y$10$xcmsuycQRPCx4OOTddEiSOg7zfsuXotPLS5HBcMVtjamChyfv7bAe', 'admin'),
(2, 'yogesh kumar', 'yk@gmail.com', '$2y$10$TNULxQ.LIb5wFkgkKLjoHeTO5pqPMJ4nxVBjnvFwdv4oUm0/ipWF.', 'doctor'),
(3, 'bhawna meena', 'bm@gmail.com', '$2y$10$xRBQ/4SlvOcszz9suEjgOOAr2Fe7r/WdPctuZwTdJs9d1uJIkrv.W', 'patient'),
(4, 'abc', 'rj@gmail.com', '$2y$10$8OEtHZtK5ILbifbxrSU14OWL5q8KRMZp2i8iSPSYQbooLwSoh3cL6', 'admin'),
(5, 'dishu gahlot', 'dishu@gmai.com', '$2y$10$xZ8wLY9eW65DAAz3qzzsq..mhg22mfN7biJqMqw3nLBVSEudmviv.', 'patient'),
(6, 'Daksh Goplani', 'daksh140108@gmail.com', '$2y$10$lowQ.5CW0Q69ZwALg3UmdeyyMfw4nI.hU0NHBej7AJqrm9SV4bfgq', 'patient'),
(7, 'himmat singh', 'himamtsingh73@gmail.com', '$2y$10$CZg5/GKlfBHYiw3g3ud36ukizSQo4gAVd5zuCJ4JUhN9XzudQlGKO', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
