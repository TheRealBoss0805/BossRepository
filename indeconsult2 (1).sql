-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2023 a las 23:39:35
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `indeconsult2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_categor`
--

CREATE TABLE `blog_categor` (
  `id_blog_cat` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog_categor`
--

INSERT INTO `blog_categor` (`id_blog_cat`, `nombre`) VALUES
(1, 'Construcción'),
(2, 'Economía'),
(3, 'Educación'),
(4, 'Indeconsult'),
(5, 'Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_publicaciones`
--

CREATE TABLE `blog_publicaciones` (
  `id_blog_pub` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `id_blog_tipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog_publicaciones`
--

INSERT INTO `blog_publicaciones` (`id_blog_pub`, `titulo`, `descripcion`, `imagen`, `id_blog_tipo`, `fecha`, `autor`) VALUES
(1, 'Ejemplop 1', 'Soy un ejemplo1', '', 1, '2023-02-07 21:19:10', 'admin'),
(2, 'Ejemplo2', 'Soy un ejemplo2', '', 2, '2023-02-08 00:06:08', 'admin'),
(3, 'Ejemplo3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It w', '', 2, '2022-02-07 23:38:06', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_pub_cat`
--

CREATE TABLE `blog_pub_cat` (
  `id_blog_cat` int(11) NOT NULL,
  `id_blog_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog_pub_cat`
--

INSERT INTO `blog_pub_cat` (`id_blog_cat`, `id_blog_pub`) VALUES
(1, 1),
(2, 2),
(5, 1),
(4, 2),
(4, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_tipo_zona`
--

CREATE TABLE `blog_tipo_zona` (
  `id_blog_tipo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog_tipo_zona`
--

INSERT INTO `blog_tipo_zona` (`id_blog_tipo`, `nombre`) VALUES
(1, 'Interno'),
(2, 'Externo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `nombre`, `descripcion`, `portada`) VALUES
(1, 'Por Tipo', 'Aquí irá una descripción inventada y realizada por Estefany Cipriani.', 'vista/imagenes/extras/img-5.jpg'),
(2, 'Por Sector', 'Aquí irá una descripción inventada y realizada por Estefany Cipriani.', 'vista/imagenes/extras/img-6.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyec_items`
--

CREATE TABLE `proyec_items` (
  `id_proyec_item` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_proy_ts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyec_items`
--

INSERT INTO `proyec_items` (`id_proyec_item`, `titulo`, `descripcion`, `foto`, `id_proyecto`, `id_proy_ts`) VALUES
(1, 'Supervisión: Ampliación de Capacidad de Albergue del E.P. El Milagro – Trujillo', 'El penal se encuentra en el distrito del Milagro, Provincia de Trujillo, el presupuesto de obra es de aproximadamente 5.5 millones de soles. El establecimiento penitenciario desarrolló los pabellones de internamiento y áreas comunes para brindar los servicios planteados en el código penal.', 'https://www.shutterstock.com/image-photo/big-pig-on-green-grass-260nw-568429582.jpg', 1, 4),
(2, 'Supervisión: Construcción de Obra y Equipamiento del Hosp. Reg. de Lambayeque', 'El proyecto implica: 47 consultorios físicos, 168 camas, 20 camas de puerperio, 5 quirófanos. Todo el proyecto implica un área construida de más de 27 mil metros cuadrados y un presupuesto de cerca de 70 millones de dólares.', 'vista/imagenes/proyectsandservices/proyectos/tipo/2015/proyecto-tipo-2.jpg', 1, 4),
(3, 'Supervisión: Seguridad Peatonal COSAC I Protransporte', '', 'vista/imagenes/proyectsandservices/proyectos/tipo/2015/proyecto-tipo-3.jpg', 1, 4),
(4, 'Supervisión: Fortalecimiento Servicios de Salud del Hospital San José Chincha', 'Supervisión de Contratación del Servicio de Consultoría para la Supervisión de la Obra:  Fortalecimiento de la Capacidad Resolutiva de los Servicios de Salud del Hospital San José Chincha – DIRESA – ICA.', '', 1, 4),
(5, 'Expediente Técnico para la Ampliación y Mejoramiento del Hospital de Moquegua', 'Por encargo del Ejecutor de la Obra se desarrolló el Expediente Técnico para la ampliación y Mejoramiento del Hospital de Moquegua, se desarrolló los anteproyectos y estudios definitivos de todas las especialidades.', '', 1, 1),
(6, 'Fortalecimiento de la Capacidad Resolutiva del Hospital Reg. Miguel Mariscal – Ayacucho', 'Por encargo del Gobierno Regional de Ayacucho hemos desarrollado la Elaboración del Estudio a Nivel de Factibilidad y el Estudio Definitivo del Proyecto: Fortalecimiento de la Capacidad Resolutiva del Hospital Regional Miguel Ángel Mariscal Llerena de AYACUCHO.\r\n\r\nSe planificó un hospital con 33 consultorios físicos, 135 camas de hospitalización, 3 quirófanos de cirugía mayor y 2 de cirugía menor entre otros.\r\n\r\nEl proyecto implica una inversión de cerca de 50 millones de dolares y un área construida de mas de 23 mil metros cuadrados.\r\n\r\nEl proyecto incluye tanto la infraestructura como el equipamiento para el cumplimiento de su función a nivel regional', '', 1, 1),
(7, 'Planes y Estudio de AT y OT de tres ejes viales en Huancavelica', 'Instituto de Consultoría S.A elaboró los planes y estudio de acondicionamiento y ordenamiento territorial de tres Ejes Viales en Huancavelica: Licapa – Lircay, Acobamba – La Mejorada, Huancavelica – Izcuchaca. Su implementación significa un área de influencia que comprende 23 distritos y 288 centros poblados.\r\n<br>\r\nEl proyecto consistió en efectuar Fase de Análisis y  Diagnóstico Territorial, Fase Prospectiva – Planificación del Territorio y Fase de Implementación.\r\n<br>\r\nEn este caso el enfoque fue el identificar las áreas beneficiadas de las inversiones viales implementadas, evaluando y realizando un diagnostico de las actividades productivas y las restricciones que ellas presentan para su desarrollo. Se utilizo como instrumento básico la ZEE.', '', 1, 2),
(8, 'E. F. Construcción de nuevo Establecimiento Penitenciario de Huaral II', 'Servicio de Consultoría: Estudio de Pre Inversión a Nivel de Factibilidad del Proyecto: «Construcción del Nuevo Establecimiento Penitenciario de Huaral II».\r\n<br>\r\nEl estudio se desarrollo por encargo del INPE según las normas del sistema nacional de inversión pública a nivel de factibilidad. El proyecto se ubica en el distrito de Aucallama en la provincia de Huaraz, departamento de Lima.\r\n<br>\r\n Se estimo la oferta y demanda por servicios penitenciarios, el cual al corresponder a un multiproducto implico estudiar los servicios de : Albergue, del Sistema de Tratamiento (Servicio Legal, Servicios de Salud, Servicios de Psicología y Servicio Social, Trabajo, Educación), servicio de seguridad (Ingresos, visitas y revisiones), administración (Agua y energía).\r\n<br>\r\nEl proyecto se diseño para 2016 reos, y la propuesta arquitectónica se desarrolla en 2 niveles con 56 mil metros cuadrados de área construida. Dicha propuesta planteo la construcción de un Centro de Salud con hospitalización con un área de 1000 m2, un tratamiento desintoxicación de drogas, un área de juzgamiento, residencia y lugares para el desarrollo de las actividades educativas y talleres.\r\n<br>\r\nLa propuesta plantea un Penal con 4 Unidades Penitenciarias (3 para varones y 1 para mujeres), ingreso único y ubicación de las Unidades Penitenciarias; con doce (12) exclusas y 13 torreones de vigilancia. Esta Alternativa de Penal tiene un sola Administración.  Asimismo de todos los servicios que requiere este establecimiento según las normas penitenciarias.\r\n<br>\r\nEl proyecto implica una inversión de 78 millones de soles.', '', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proy_tipo_sector`
--

CREATE TABLE `proy_tipo_sector` (
  `id_proy_ts` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `clase` varchar(30) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proy_tipo_sector`
--

INSERT INTO `proy_tipo_sector` (`id_proy_ts`, `nombre`, `clase`, `id_proyecto`) VALUES
(1, 'Estudio/ expediente', '', 1),
(2, 'Zonificación', '', 1),
(3, 'Pre-inversión', '', 1),
(4, 'Supervisión', '', 1),
(5, 'Administración', '', 2),
(6, 'Portuarios', '', 2),
(7, 'Salud', '', 2),
(8, 'Viales', '', 2),
(9, 'Otras edificaciones', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre`, `descripcion`, `portada`) VALUES
(1, 'Planificación', 'Instituto de Consultoría S.A. colabora con las diferentes entidades en el desarrollo de políticas e instrumentos de planificación del territorio. Para ello desarrolla tres estrategias básicas: la planificación del uso de la tierra; equilibrio espacial en los proyectos de inversión social y económica; y la organización funcional y administrativa óptima del territorio.\r\n<br>\r\nPara el desarrollo de estas actividades contamos con especialistas en Planificación Regional, Planificación Urbana, Zonificación, Edafología, Vulnerabilidad y Riesgos, Planificación económica y Ambiental, y especialistas en Sistemas de Información Geográfica.', 'vista/imagenes/extras/img-1.png'),
(2, 'Pre-Inversión', 'Se desarrollan Estudios Económicos de todo tipo, en particular estudios de pre-inversión en el Sistema Nacional de Inversión Pública. INDECONSULT S.A. ha desarrollado estudios de pre-inversión de todo nivel y sector, para ello cuenta con especialistas en proyectos de inversión, promoción de inversión, diseño arquitectónico, ingeniería básica y aplicada de forma que se puede concretar toda idea de inversión a efecto de tomar decisiones sobre su viabilidad y sostenibilidad.', 'vista/imagenes/extras/img-2.png'),
(3, 'Expedientes de obra', 'Se han desarrollado expedientes de obra para licitar la construcción de diversas obras civiles. Para esta labor nuestra empresa cuenta con especialistas en anteproyectos arquitectónicos, equipamiento de todo tipo, e ingenieros de las más diversas especialidades para poder licitar la obra civil.', 'vista/imagenes/extras/img-3.png'),
(4, 'Supervisión', 'Se han desarrollado expedientes de obra para licitar la construcción de diversas obras civiles. Para esta labor nuestra empresa cuenta con especialistas en anteproyectos arquitectónicos, equipamiento de todo tipo, e ingenieros de las más diversas especialidades para poder licitar la obra civil.', 'vista/imagenes/extras/img-4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv_items`
--

CREATE TABLE `serv_items` (
  `id_serv_item` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `serv_items`
--

INSERT INTO `serv_items` (`id_serv_item`, `titulo`, `descripcion`, `foto`, `id_servicio`) VALUES
(1, 'Planes y Estudio de AT y OT de tres ejes viales en Huancavelica', 'Instituto de Consultoría S.A elaboró los planes y estudio de acondicionamiento y ordenamiento territorial de tres Ejes Viales en Huancavelica: Licapa – Lircay, Acobamba – La Mejorada, Huancavelica – Izcuchaca. Su implementación significa un área de influencia que comprende 23 distritos y 288 centros poblados.\r\n<br>\r\nEl proyecto consistió en efectuar Fase de Análisis y  Diagnóstico Territorial, Fase Prospectiva – Planificación del Territorio y Fase de Implementación.\r\n<br>\r\nEn este caso el enfoque fue el identificar las áreas beneficiadas de las inversiones viales implementadas, evaluando y realizando un diagnostico de las actividades productivas y las restricciones que ellas presentan para su desarrollo. Se utilizo como instrumento básico la ZEE.s', 'vista/imagenes/proyectsandservices/servicios/planificacion/2015/servicio-planificacion-1.jpg', 1),
(2, 'Supervisión de la Zonificación Económica Ecológica del Eje 5 Distrito de Rio Santiago en Amazonas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum, nulla malesuada tincidunt pharetra, ante felis malesuada arcu, vitae dictum lectus dui at justo. Sed sagittis, urna cursus sagittis fringilla, massa eros hendrerit turpis, sit amet iaculis felis velit non nisi. Etiam maximus accumsan felis, sed ullamcorper mauris lobortis sed. Aliquam accumsan maximus orci quis efficitur. Mauris nibh neque, lacinia at luctus eu, pellentesque ac magna. Quisque dictum justo vel enim cursus maximus. Mauris in rutrum mauris. Mauris enim risus, aliquam sed mi at, interdum finibus turpis. Quisque ut nulla a enim tincidunt aliquam. Sed tincidunt tellus ut urna accumsan porttitor. Aliquam felis libero, luctus sit amet efficitur sed, fermentum id orci. Cras lacus risus, aliquam at iaculis ac, facilisis ac elit. Nulla nec ante massa. Cras diam lorem, porttitor eu metus eget, dictum iaculis arcu.\r\n<br>\r\nCurabitur sagittis urna ligula, eu dapibus ex volutpat a. Aenean maximus mi vel felis pulvinar malesuada. Cras faucibus est sit amet dolor elementum, ut scelerisque lacus semper. Aenean convallis tortor ac lectus aliquet suscipit. Integer maximus efficitur ipsum a facilisis. Maecenas ac malesuada nunc, venenatis auctor justo. Nulla vel felis mattis, tempor mi sed, facilisis orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In posuere nibh et risus porta fringilla commodo tempus metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent felis sem, finibus in lorem quis, tempor tristique nisi. Mauris nisi diam, tincidunt non leo et, porta volutpat nunc. Pellentesque euismod rutrum odio quis volutpat.\r\n<br>\r\nAliquam tortor magna, congue in rhoncus elementum, malesuada sed risus. Nulla dignissim tellus sit amet consectetur gravida. Fusce convallis tellus sed nisi feugiat, eu egestas velit ullamcorper. Mauris tincidunt eleifend purus, at gravida nisl feugiat eu. Vestibulum a rhoncus elit. Duis et fermentum dui, sed tempus risus. Donec dolor magna, congue vel nisl ac, aliquet vehicula sapien. Sed ullamcorper id eros at maximus. Aliquam quis augue ipsum. Pellentesque in aliquet dolor, at rhoncus mi. Vestibulum sit amet arcu volutpat, finibus augue at, mattis sem.', 'vista/imagenes/proyectsandservices/servicios/planificacion/2015/servicio-planificacion-2.jpg', 1),
(3, 'Aenean blandit placerat nisl, quis rhoncus felis molestie id', 'Pellentesque volutpat gravida risus, non vestibulum turpis suscipit gravida. Nam volutpat ante ac fringilla suscipit. Cras faucibus in metus in dapibus. Fusce lacinia nulla ac turpis lacinia elementum. Etiam ac mi ultrices justo egestas scelerisque eget vitae massa. Morbi viverra vestibulum lacus vel consectetur. Integer fermentum diam at urna aliquet, eget vehicula turpis ornare. Phasellus a cursus libero. Fusce ultrices, est eu imperdiet mollis, ante diam lacinia nunc, at congue est justo in nulla.\r\n<br>\r\nMauris rhoncus diam a metus varius ullamcorper. Quisque cursus et diam id vulputate. Nunc venenatis, nibh eget tincidunt blandit, velit turpis consequat tellus, a laoreet massa massa nec eros. Donec porttitor fringilla feugiat. Fusce malesuada, neque et fermentum varius, nulla quam tempus leo, non eleifend tellus nulla eget ex. Nulla vel rhoncus justo. Etiam nec purus enim.', 'vista/imagenes/proyectsandservices/servicios/planificacion/2015/servicio-planificacion-3.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog_categor`
--
ALTER TABLE `blog_categor`
  ADD PRIMARY KEY (`id_blog_cat`);

--
-- Indices de la tabla `blog_publicaciones`
--
ALTER TABLE `blog_publicaciones`
  ADD PRIMARY KEY (`id_blog_pub`),
  ADD KEY `id_blog_tipo` (`id_blog_tipo`);

--
-- Indices de la tabla `blog_pub_cat`
--
ALTER TABLE `blog_pub_cat`
  ADD KEY `id_blog_cat` (`id_blog_cat`),
  ADD KEY `id_blog_pub` (`id_blog_pub`) USING BTREE;

--
-- Indices de la tabla `blog_tipo_zona`
--
ALTER TABLE `blog_tipo_zona`
  ADD PRIMARY KEY (`id_blog_tipo`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `proyec_items`
--
ALTER TABLE `proyec_items`
  ADD PRIMARY KEY (`id_proyec_item`),
  ADD KEY `id_proy_ts` (`id_proy_ts`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `proy_tipo_sector`
--
ALTER TABLE `proy_tipo_sector`
  ADD PRIMARY KEY (`id_proy_ts`),
  ADD KEY `id_proy` (`id_proyecto`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `serv_items`
--
ALTER TABLE `serv_items`
  ADD PRIMARY KEY (`id_serv_item`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog_categor`
--
ALTER TABLE `blog_categor`
  MODIFY `id_blog_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `blog_publicaciones`
--
ALTER TABLE `blog_publicaciones`
  MODIFY `id_blog_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `blog_tipo_zona`
--
ALTER TABLE `blog_tipo_zona`
  MODIFY `id_blog_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyec_items`
--
ALTER TABLE `proyec_items`
  MODIFY `id_proyec_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `proy_tipo_sector`
--
ALTER TABLE `proy_tipo_sector`
  MODIFY `id_proy_ts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `serv_items`
--
ALTER TABLE `serv_items`
  MODIFY `id_serv_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog_publicaciones`
--
ALTER TABLE `blog_publicaciones`
  ADD CONSTRAINT `blog_publicaciones_ibfk_1` FOREIGN KEY (`id_blog_tipo`) REFERENCES `blog_tipo_zona` (`id_blog_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `blog_pub_cat`
--
ALTER TABLE `blog_pub_cat`
  ADD CONSTRAINT `blog_pub_cat_ibfk_1` FOREIGN KEY (`id_blog_cat`) REFERENCES `blog_categor` (`id_blog_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_pub_cat_ibfk_2` FOREIGN KEY (`id_blog_pub`) REFERENCES `blog_publicaciones` (`id_blog_pub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proy_tipo_sector` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyec_items`
--
ALTER TABLE `proyec_items`
  ADD CONSTRAINT `proyec_items_ibfk_1` FOREIGN KEY (`id_proy_ts`) REFERENCES `proy_tipo_sector` (`id_proy_ts`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyec_items_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proy_tipo_sector`
--
ALTER TABLE `proy_tipo_sector`
  ADD CONSTRAINT `proy_tipo_sector_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serv_items`
--
ALTER TABLE `serv_items`
  ADD CONSTRAINT `serv_items_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
