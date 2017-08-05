-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2017 a las 01:09:30
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_vlmv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_assignment`
--

CREATE TABLE `tbl_assignment` (
  `id_assignment` int(11) NOT NULL,
  `assignmen_actual_date` datetime DEFAULT NULL,
  `assignmen_end_date` datetime DEFAULT NULL,
  `assignmen_mess` longtext,
  `assignmen_material` varchar(300) DEFAULT NULL,
  `assignmen_group_id` int(11) DEFAULT NULL,
  `assignment_tittle` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id_group` int(11) NOT NULL,
  `group_grade` int(11) NOT NULL,
  `group_section` int(11) NOT NULL,
  `group_subject` varchar(300) NOT NULL,
  `group_enrollment_num` varchar(300) NOT NULL,
  `group_teacher_id` int(11) NOT NULL,
  `group_status` bit(2) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_group`
--

INSERT INTO `tbl_group` (`id_group`, `group_grade`, `group_section`, `group_subject`, `group_enrollment_num`, `group_teacher_id`, `group_status`) VALUES
(25, 7, 1, 'Estudios Sociales', 'ti1uc4', 38, b'00'),
(26, 7, 12, 'Espanol', 'n50E8o', 38, b'00'),
(27, 7, 1, 'Biologia', '41iga1', 38, b'01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id_message` int(11) NOT NULL,
  `message_actual_date` datetime NOT NULL,
  `message_desc` varchar(300) DEFAULT NULL,
  `message_material` varchar(300) DEFAULT NULL,
  `message_group_id` int(11) NOT NULL,
  `message_tittle` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id_student` int(11) NOT NULL,
  `student_identification` varchar(100) NOT NULL,
  `student_name` varchar(300) NOT NULL,
  `student_mail` varchar(300) NOT NULL,
  `student_password` varchar(300) NOT NULL,
  `student_status` bit(2) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_student_group`
--

CREATE TABLE `tbl_student_group` (
  `student_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `enrollment_status` bit(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id_teacher` int(11) NOT NULL,
  `teacher_identification` varchar(100) NOT NULL,
  `teacher_name` varchar(300) NOT NULL,
  `teacher_mail` varchar(300) NOT NULL,
  `teacher_password` longtext NOT NULL,
  `teacher_status` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id_teacher`, `teacher_identification`, `teacher_name`, `teacher_mail`, `teacher_password`, `teacher_status`) VALUES
(37, '101110113', 'zzzz zzzzz zzzzzz', 'dkkd@kdkkd.coc', '$2y$10$vivbl6Pv2AqZS9wRJCoCQOUN2JogPboqErnz0nOR8ZbDPUpu/aYci', b'01'),
(38, '202220222', 'Catalina Mesen Irola', 'klareth@hotmail.com', '$2y$10$GUJkpc3QQ2YV5JVtaIHpdOEb2XGqbasgICIilQk3Je3MR6NXpHfNG', b'01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD PRIMARY KEY (`id_assignment`),
  ADD KEY `fk_group_assignment_idx` (`assignmen_group_id`);

--
-- Indices de la tabla `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `fk_tbl_group_tbl_teacher_idx` (`group_teacher_id`);

--
-- Indices de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `fk_tbl_action_tbl_group_idx` (`message_group_id`);

--
-- Indices de la tabla `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id_student`);

--
-- Indices de la tabla `tbl_student_group`
--
ALTER TABLE `tbl_student_group`
  ADD PRIMARY KEY (`student_id`,`group_id`),
  ADD KEY `fk_tbl_student_group_tbl_group_idx` (`group_id`);

--
-- Indices de la tabla `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  MODIFY `id_assignment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD CONSTRAINT `fk_group_assignment` FOREIGN KEY (`assignmen_group_id`) REFERENCES `tbl_group` (`id_group`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD CONSTRAINT `fk_tbl_group_tbl_teacher` FOREIGN KEY (`group_teacher_id`) REFERENCES `tbl_teacher` (`id_teacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD CONSTRAINT `fk_group_message` FOREIGN KEY (`message_group_id`) REFERENCES `tbl_group` (`id_group`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_student_group`
--
ALTER TABLE `tbl_student_group`
  ADD CONSTRAINT `fk_tbl_student_group_tbl_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`id_group`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_student_group_tbl_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id_student`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
