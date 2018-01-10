-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2017 a las 17:33:27
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `syscseiio_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `id_taller` int(11) NOT NULL,
  `nombre_taller` varchar(500) DEFAULT NULL,
  `grupo` varchar(15) DEFAULT NULL,
  `cupo` int(11) DEFAULT '30',
  `descripcion_taller` varchar(500) DEFAULT NULL,
  `clave_taller` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene todos los talleres que se imparten en el ';

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id_taller`, `nombre_taller`, `grupo`, `cupo`, `descripcion_taller`, `clave_taller`) VALUES
(12, 'Divertiquimica , la experimentación en las ciencias naturales como proceso de investigación y busqueda de soluciones', 'A', 30, '1_divertiquimica_descripcion.docx', 12),
(13, 'Metodologías activas para el aprendizaje de las ciencias', 'A', 30, '2_motodologias_activa.docx', 1),
(14, 'Teatro herramientas didácticas: Experiencias escénicas colectivas y colaborativas para la enseñanza-aprendizaje', 'A', 30, '3_teatro_didactico.docx', 2),
(15, 'Arte y participación en los procesos educativos ', 'A', 30, '4_arte_participacion.docx', 3),
(16, 'Máscaras, Reflejos de Identidad', 'A', 23, '5_mascaras.docx', 4),
(17, '¿Dónde está la Creatividad? Su relación con la criticidad y la ética', 'A', 30, '6_donde_creatividad.docx', 5),
(18, 'Desarrollo de habilidades socioemocionales', 'A', 30, '7_desarrollo.docx', 6),
(19, 'Formación intercultural docente', 'B', 30, '8_formacion.docx', 13),
(20, 'REPROBACIÓN Y OTRAS INCOHERENCIAS. Evaluación del aprendizaje & calificación del conocimiento', 'A', 30, '9_reprobacion.docx', 7),
(21, 'Pensamiento de diseño (Design thinking) creando proyectos innovadores', 'A', 30, '10_prensamiento_disenio.docx', 8),
(22, 'Sistema modular e interculturalidad: Una propuesta alternativa en la educación', 'B', 30, '11_sistema_modular.docx', 14),
(23, 'El documental: Una herramienta para el cambio social', 'A', 30, '12_eldocumental.docx', 9),
(24, 'Riesgos ambientales: Identificación y prevención ', 'A', 30, '13_riesgos_ambientales.docx', 10),
(25, 'Delito cibernético: ¿Cómo prevenir, atender y brindar apoyo en acoso cibernético?', 'A', 45, NULL, 11),
(26, 'Desarrollo de habilidades socioemocionales', 'B', 30, '7_desarrollo.docx', 6),
(27, 'Metodologías activas para el aprendizaje de las ciencias', 'B', 30, '2_motodologias_activa.docx', 1),
(28, 'Teatro herramientas didácticas: Experiencias escénicas colectivas y colaborativas para la enseñanza-aprendizaje', 'B', 30, '3_teatro_didactico.docx', 2),
(29, 'Arte y participación en los procesos educativos ', 'B', 30, '4_arte_participacion.docx', 3),
(30, 'Máscaras, Reflejos de Identidad', 'B', 23, '5_mascaras.docx', 4),
(31, '¿Dónde está la Creatividad? Su relación con la criticidad y la ética', 'B', 30, '6_donde_creatividad.docx', 5),
(32, 'REPROBACIÓN Y OTRAS INCOHERENCIAS. Evaluación del aprendizaje & calificación del conocimiento', 'B', 30, '9_reprobacion.docx', 7),
(33, 'Pensamiento de diseño (Design thinking) creando proyectos innovadores', 'B', 30, '10_prensamiento_disenio.docx', 8),
(34, 'El documental: Una herramienta para el cambio social', 'B', 30, '12_eldocumental.docx', 9),
(35, 'Riesgos ambientales: Identificación y prevención ', 'B', 30, '13_riesgos_ambientales.docx', 10),
(36, 'Delito cibernético: ¿Cómo prevenir, atender y brindar apoyo en acoso cibernético?', 'B', 45, NULL, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id_taller`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
