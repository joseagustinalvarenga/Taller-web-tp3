-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2022 a las 20:12:55
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerweb2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `titulo`, `id_usuario`) VALUES
(1, 'adasdadad', 14),
(3, 'Flores', 15),
(4, 'Musica', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `genero` int(11) NOT NULL,
  `numtel` int(11) NOT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `pagweb` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `altura` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `email`, `contrasena`, `apellido`, `genero`, `numtel`, `fechanacimiento`, `pagweb`, `pais`, `provincia`, `ciudad`, `calle`, `altura`, `id`) VALUES
('Hola', 'tom008@hotmail.com', '4d186321c1a7f0f354b297e8914ab240', 'Pibe', 2, 34534535, '2022-06-16', 'http://hoaihdoahid.com', 'AR', 'Corrientes', 'Posadas', 'Ayacucho', 'a2asda', 14),
('Florencia', 'hola@gmail.com', '9450476b384b32d8ad8b758e76c98a69', 'Perez', 2, 3423424, '2022-07-01', 'http://martin.com', 'AR', 'Misiones', 'Posadas', 'Ayacucho', '1655', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id_video` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `termino_busqueda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_video`, `id_categoria`, `termino_busqueda`) VALUES
('5oGBmdZ0XI8', 1, 'coches'),
('8vCXw3y1a3Q', 1, 'graf'),
('GoGGe-xerPM', 1, 'coches'),
('gPtm1xBLUoA', 1, 'total'),
('MupKJq80V8o', 3, 'Flores'),
('QO5Uy-Ma2_k', 1, 'hola');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;










CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_pelicula INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    anio INT NOT NULL,
    descripcion TEXT,
    espectadores INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_pelicula) REFERENCES peliculas_trakt(id)
);
