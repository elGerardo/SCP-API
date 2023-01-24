
CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `classes` (`id`, `name`, `description`, `icon`) VALUES
(1, 'Safe', 'SCPs that are very easy to contain or do not need many resources to contain. It does not mean that SCP is harmless, just simple to contain.', NULL),
(2, 'Keter', 'SCPs that are very difficult to contain or haven\'t yet been contained. Generally, the resources used to contain these SCPs are often very limited, yet they need much of the resources to contain it. This doesn\'t mean the SCP is dangerous; just difficult to', NULL),
(3, 'Euclid', 'SCPs that require more resources to contain completely or where containment isn\'t always reliable. Usually this is because the SCP is insufficiently understood or is inherently unpredictable. ', NULL),
(4, 'Thaumiel', 'SCPs used by personnel in containing or counteracting other SCPs.', NULL),
(5, 'Neutralized', 'SCPs that have been destroyed or disabled by intentional or accidental means.', NULL),
(6, 'Apollyon', 'SCP that are impossible to contain and/or are expected to breach containment very often[as in, more often than Keter class anomalies]. Usually associated with world-ending threats (or \'K-Class Scenarios), it requires a massive effort from the Foundation.', NULL),
(7, 'Anomalous', 'SCP\'s that have no or almost no chance of breaching containment and are even more simple to contain than Safe class SCPs.', NULL),
(8, 'Archon', 'SCP\'s that can be contained but are not due to their positive anomolous effects on our planet\'s reality.', NULL);


CREATE TABLE `features` (
  `scp_id` int(11) NOT NULL,
  `short_description` longtext DEFAULT NULL,
  `full_description` longtext NOT NULL,
  `color` varchar(255) NOT NULL,
  `height` float(18,2) DEFAULT NULL,
  `width` float(18,2) DEFAULT NULL,
  `weight` float(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `features` (`scp_id`, `short_description`, `full_description`, `color`, `height`, `width`, `weight`) VALUES
(49, 'SCP-049, referred to as the \"Plague Doctor\", is a humanoid SCP that can be encountered in SCP - Containment Breach.', 'SCP-049 is a humanoid entity which bears the appearance of a medieval plague doctor. While SCP-049 appears to be wearing the thick robes and the ceramic mask indicative of that profession, the garments instead seem to have grown out of SCP-049\'s body over time, and are now nearly indistinguishable from whatever form is beneath them.\r\n\r\nSCP-049 is capable of causing all biological functions of an organism to cease through direct skin contact. SCP-049 has expressed frustration or remorse after these killings, indicating that they have done little to kill \"The Pestilence\", though will usually seek to then perform a crude surgery on the corpse using the implements contained within a black doctor\'s bag it carries on its person at all times. While these surgeries are not always successful, they often result in the creation of instances of SCP-049-2. ', 'Black', 0.00, 0.00, 0.00),
(173, 'SCP-173, also known as \"The Sculpture\", is the main antagonist of SCP - Containment Breach. ', 'SCP-173 is a sculpture constructed out of concrete. It is capable of moving at high speeds and will kill by either snapping at the base of the skull or strangulation.  SCP-173 however, is incapable of moving when in direct line of sight of a person. ', 'White/Brown', 0.00, 0.00, 0.00),
(682, 'SCP-682, also known as \"Hard-To-Destroy Reptile\", is an SCP that can be encountered in SCP - Containment Breach. ', 'SCP-682 is a large, vaguely reptile-like creature of unknown origin. It appears to be extremely intelligent and was observed to engage in complex communication with SCP-079 during their limited time of exposure. SCP-682 appears to have a hatred of all life, which has been expressed in several interviews during containment.  SCP-682 has always been observed to have extremely high strength, speed, and reflexes, though exact levels vary with its form. SCP-682\'s physical body grows and changes very quickly, growing or decreasing in size as it consumes or sheds material. SCP-682 gains energy from anything it ingests, organic or inorganic. SCP-682\'s regenerative capabilities and resilience are staggering, and SCP-682 has been seen moving and speaking with its body 87% destroyed. ', 'Green/Brown', 0.00, 0.00, 0.00),
(4885, 'SCP-4885 is an antagonist in the SCP Foundation mythos. It is a monstrous serial killer which takes the form of Wally/Waldo from the Where\'s Wally/Where\'s Waldo? puzzle books and chases down and kills anyone who knows its location. ', 'SCP-4885 generally spends its time walking round whatever area it\'s in looking for people to kill. If somebody discovers its location, SCP-4885 runs into the nearest wall before teleporting inside the person, reaching up through their esophagus and grabbing them by the chin. It then pulls itself up out of their mouth, destroying their internal organs and spine, and kills anybody in the vicinity. Once this is done, SCP-4885 will transform the corpses so that they are covered in images similar to those from the books. These corpses are known as SCP-4885-1. If the location of an SCP-4885-1 instance is discovered, the same response from SCP-4885 will be triggered.  If the victim is close enough to SCP-4885 that they actually see it, then it will jump down their throat and crawl through their body before exiting through their pelvis. This produces the same effect as teleporting inside them, up to and including the transformation into SCP-4885-1. To do this, SCP-4885 will reduce its skin and muscles to the consistency of a malleable solid and if necessary can dislocate and relocate any of its joints at will. ', 'Red/White/Gray', 0.00, 0.00, 0.00),
(96, 'SCP-096, or \"The Shy Guy\" is a harmful humanoid SCP encountered in SCP - Containment Breach. ', 'SCP-096 is a humanoid creature that is normally extremely docile. However, when someone views SCP-096\'s face it will enter a stage of considerable emotional distress. SCP-096 will cover its face with its hands and begin screaming, crying, and babbling incoherently briefly before chasing down the person who viewed its face.\r\n\r\nSCP-096 will not stop until it reaches the person\'s location, after which it will proceed to kill them. Afterward, it will regain its composure and become docile once again. ', 'White', NULL, NULL, NULL),
(939, 'SCP-939, also known as \"With Many Voices\", is a hostile SCP encountered in SCP - Containment Breach. ', 'SCP-939 are pack-based predators. Their primary method of luring prey is the imitation of human speech in the voices of prior victims, often in a fashion that implies significant distress. ', 'Red', NULL, NULL, NULL),
(106, 'SCP-106, known as \"The Old Man\", is a hostile SCP encountered in SCP - Containment Breach. ', 'SCP-106 is an elderly humanoid, with a general appearance of advanced decomposition.\r\nSCP-106 causes a “corrosion” effect in all solid matter it touches, engaging a physical breakdown in materials several seconds after contact.\r\nSCP-106 is capable of passing through solid matter, leaving behind a large patch of its corrosive mucus. SCP-106 is able to “vanish” inside solid matter, entering what is assumed to be a form of “pocket dimension”. ', 'Black|Red|Brown', NULL, NULL, NULL);


CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `scp_id` int(11) NOT NULL,
  `interview_date` datetime NOT NULL,
  `transcription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `interviews`
--

INSERT INTO `interviews` (`id`, `scp_id`, `interview_date`, `transcription`) VALUES
(2, 682, '2022-10-04 17:36:59', 'Dr. ██████: Now, why did you kill those farmers?\r\n\r\nSCP-682: (No verbal communication)\r\n\r\nDr. ██████: If you don\'t talk now, we will remove you from this attempt and place you back into-\r\n\r\nSCP-682: (Incomprehensible)\r\n\r\nDr. ██████: Pardon? (Motions to move microphone closer)\r\n\r\nSCP-682: (Incomprehensible)\r\n\r\nDr. ██████: Speak up. (To Personnel D-085) Move the mic up closer.\r\n\r\nSCP-682: …they were (Incomprehensible)…\r\n\r\nDr. ██████: (To Personnel D-085) That microphone has only so much gain, move it closer to it!\r\n\r\nPersonnel D-085: His throat\'s messed up man, look at it! He ain\'t talking- (Gasps and screams)\r\n\r\nSCP-682: (Appearing to assault D-085\'s body) …they were… disgusting…\r\n\r\nDr. ██████: (Retreats from the room)');


CREATE TABLE `scp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `scp_link` varchar(255) NOT NULL,
  `feeling` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `scp` (`id`, `name`, `scp_link`, `feeling`, `picture`, `class_id`, `type_id`) VALUES
(49, 'Plague Doctor', 'SCP-49', 'Neutral', 'https://i.ibb.co/8js0Tf2/049.png', 1, 3),
(55, 'Unknown', 'SCP-55', 'Dangerous', 'https://i.ibb.co/G7r7fk4/056.webp', 2, 1),
(96, 'The Shy Guy', 'SCP-096', 'Dangerous', 'https://i.ibb.co/st7MFs6/096.webp', 3, 5),
(106, 'The Old Man', 'SCP-106', 'Hostile', 'https://i.ibb.co/n79jbyc/106.jpg', 2, 6),
(173, 'The Sculpture', 'SCP-173', 'Dangerous', 'https://i.ibb.co/9ZFdgcr/173.png', 1, 1),
(682, 'The Indestructible Reptile', 'SCP-682', 'Dangerous', 'https://i.ibb.co/z6PZW6J/682.png', 2, 2),
(939, 'With Many Voices', 'SCP-9399', 'Dangerous', 'https://i.ibb.co/16QfBZ7/939.jpg', 2, 5),
(1471, 'MalO ver1.0.0', 'SCP-1471', 'Dangerous', 'https://i.ibb.co/njf4Pq4/1471.webp', 3, 7),
(4885, 'Wally', 'SCP-4885', 'Dangerous', 'https://i.ibb.co/KxnVMPV/4885.png', 2, 4);

CREATE TABLE `scp_enemies` (
  `id` int(11) NOT NULL,
  `scp_id` int(11) DEFAULT NULL,
  `scp_enemy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `scp_skills` (
  `id` int(11) NOT NULL,
  `scp_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `skills` (`id`, `name`, `description`, `icon`) VALUES
(1, 'Fast Movements', 'Fast Movements', NULL),
(2, 'Broke Neck', 'Broke Neck', NULL),
(3, 'Indestructible', 'Indestructible', NULL);

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'Object', 'Object'),
(2, 'Animal', 'Animal'),
(3, 'Human', 'Human'),
(4, 'Experiment', 'Experiment'),
(5, 'Monster', 'Monster'),
(6, 'Entity', 'Entity'),
(7, 'Electronic', 'Electronic');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scp_id` (`scp_id`);

--
-- Indices de la tabla `scp`
--
ALTER TABLE `scp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indices de la tabla `scp_enemies`
--
ALTER TABLE `scp_enemies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scp_id` (`scp_id`),
  ADD KEY `scp_enemy_id` (`scp_enemy_id`);

--
-- Indices de la tabla `scp_skills`
--
ALTER TABLE `scp_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `scp_enemies`
--
ALTER TABLE `scp_enemies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `scp_skills`
--
ALTER TABLE `scp_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_ibfk_1` FOREIGN KEY (`scp_id`) REFERENCES `scp` (`id`);

--
-- Filtros para la tabla `scp`
--
ALTER TABLE `scp`
  ADD CONSTRAINT `scp_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `scp_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Filtros para la tabla `scp_enemies`
--
ALTER TABLE `scp_enemies`
  ADD CONSTRAINT `scp_enemies_ibfk_1` FOREIGN KEY (`scp_id`) REFERENCES `scp` (`id`),
  ADD CONSTRAINT `scp_enemies_ibfk_2` FOREIGN KEY (`scp_enemy_id`) REFERENCES `scp` (`id`);
COMMIT;


