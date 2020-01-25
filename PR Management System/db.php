CREATE TABLE `contact_person` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_person`
--

INSERT INTO `contact_person` (`id`, `name`, `doctor_id`) VALUES
(1, 'mohamed ali', 1),
(2, 'ali hussein', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `first_activity` date DEFAULT NULL,
  `number_of_communications` int(11) NOT NULL,
  `number_of_videos` int(11) NOT NULL,
  `last_activity` date DEFAULT NULL,
  `reason` varchar(500) NOT NULL,
  `check_pic` tinyint(1) NOT NULL DEFAULT 0,
  `picture` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `notes` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `employee`, `name`, `code`, `mobile`, `first_activity`, `number_of_communications`, `number_of_videos`, `last_activity`, `reason`, `check_pic`, `picture`, `status`, `notes`) VALUES
(20, 'mohamed ali', 'ossama mohamed', '1226', '01136965589', '2019-11-12', 2, 2, '2019-11-03', 'gdg  hf  ghfgh', 1, 'b.jpg', 1, ''),
(22, 'mohamed ali', 'Ahmed El-Sisy', '1559', '0100695847', NULL, 0, 0, NULL, 'nnn m m m mm m mmm ', 1, 'logo_css.png', 0, '...'),
(26, 'ali hussein', 'esraa ahmed', '7789', '0100696988', '2019-11-03', 17, 16, '2019-11-03', 'ssss', 1, 'logo_brush.png', 0, 'safsd');

-- --------------------------------------------------------

--
-- Table structure for table `pr_employees`
--

CREATE TABLE `pr_employees` (
  `id` int(11) NOT NULL,
  `day_date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `communication_type` varchar(50) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `communication_purpose` varchar(535) NOT NULL,
  `result` varchar(255) NOT NULL,
  `postponement_date` date NOT NULL,
  `refused_reasons` varchar(535) NOT NULL DEFAULT '--',
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_employees`
--

INSERT INTO `pr_employees` (`id`, `day_date`, `name`, `communication_type`, `doctor`, `communication_purpose`, `result`, `postponement_date`, `refused_reasons`, `notes`) VALUES
(72, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'shooting', 'postponement', '0000-00-00', '', ''),
(73, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'shooting', 'postponement', '0000-00-00', '', ''),
(74, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'interview', 'postponement', '0000-00-00', '', ''),
(75, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'interview', 'accepted', '0000-00-00', '', ''),
(76, '2019-11-03', 'ali hussien', 'whatsApp', 'ossama mohamed', 'shooting', 'postponement', '0000-00-00', '', ''),
(77, '2019-11-03', 'ali hussien', 'whatsApp', 'ossama mohamed', 'shooting', 'postponement', '0000-00-00', '', ''),
(78, '2019-11-03', 'ali hussien', 'whatsApp', 'ossama mohamed', 'shooting', 'postponement', '0000-00-00', '', ''),
(79, '2019-11-03', 'ali hussien', 'whatsApp', 'ossama mohamed', 'shooting', 'postponement', '0000-00-00', '', ''),
(80, '2019-11-03', 'ali hussien', 'whatsApp', 'ossama mohamed', 'shooting', 'postponement', '0000-00-00', '', ''),
(81, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(82, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(83, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(84, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(85, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(86, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(87, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(88, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(89, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(90, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsApp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(91, '2019-11-03', 'Ahmed Abd El-Azeem', '', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(92, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(93, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(94, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(95, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(96, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(97, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '', ''),
(98, '2019-11-03', 'Ahmed Abd El-Azeem', 'call', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(99, '2019-11-03', 'Ahmed Abd El-Azeem', 'call', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '', ''),
(100, '2019-11-03', 'Ahmed Abd El-Azeem', 'call', 'esraa ahmed', 'shooting', 'refused', '0000-00-00', '--', ''),
(101, '2019-11-03', 'Ahmed Abd El-Azeem', 'whatsapp', 'ossama mohamed', 'Follow', 'postponement', '0000-00-00', '--', ''),
(102, '2019-11-03', 'ali hussien', 'whatsapp', 'ossama mohamed', 'shooting', 'refused', '0000-00-00', '--', ''),
(103, '2019-11-03', 'ali hussien', 'whatsapp', 'ossama mohamed', 'shooting', 'refused', '0000-00-00', '--', ''),
(104, '2019-11-03', 'ali hussien', 'whatsapp', 'ossama mohamed', 'shooting', 'refused', '0000-00-00', 'hkjhkhjkhkhj', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_employees`
--
ALTER TABLE `pr_employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pr_employees`
--
ALTER TABLE `pr_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;