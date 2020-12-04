-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2020 a las 22:37:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aseomatic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento_contable`
--

CREATE TABLE `asiento_contable` (
  `id_asiento_contable` int(11) NOT NULL,
  `asiento_contable` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asiento_contable`
--

INSERT INTO `asiento_contable` (`id_asiento_contable`, `asiento_contable`) VALUES
(1, 'Devengado'),
(2, 'Deducido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Desarrollador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id_concepto` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `valor` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_tipo_concepto` int(11) NOT NULL,
  `fk_nomina` int(11) NOT NULL,
  `fk_asiento_contable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id_concepto`, `descripcion`, `estado`, `valor`, `fk_tipo_concepto`, `fk_nomina`, `fk_asiento_contable`) VALUES
(62, 'Descontar Salud', 1, '100000', 1, 11, 2),
(63, 'Descontar Pension', 1, '100000', 2, 11, 2),
(64, 'salario ', 1, '1000000', 3, 11, 1),
(65, 'subsidio de transporte', 1, '120000', 4, 11, 1),
(66, 'Pension', 1, '200000', 2, 9, 2),
(67, 'Se le consigna el salario', 1, '1000000', 3, 9, 1),
(68, 'Se le Consigna el Subsidio de transporte', 1, '100000', 4, 9, 1),
(69, 'Se le descuenta la eps', 1, '150000', 1, 9, 2),
(70, 'subsidio de transporte', 1, '120000', 4, 10, 1),
(71, 'salario ', 1, '1000000', 3, 10, 1),
(72, 'Descontar Pension', 1, '100000', 2, 10, 2),
(73, 'Descontar Salud', 1, '100000', 1, 10, 2),
(74, '- salud', 1, '150000', 1, 6, 2),
(75, '-Pension', 1, '100000', 2, 6, 2),
(76, '+ Salario', 1, '1200000', 3, 6, 1),
(77, '+subsidio de transporte', 1, '80000', 4, 6, 1),
(81, '+Subsidio', 1, '80000', 4, 8, 1),
(82, '+Salario', 1, '645000', 3, 8, 1),
(83, '-Salud', 1, '0', 1, 8, 2),
(84, '-Pension', 1, '0', 2, 8, 2),
(88, '-Salud', 1, '120000', 1, 5, 2),
(89, '-Pension', 1, '100000', 2, 5, 2),
(90, '+salario', 1, '1500000', 3, 5, 1),
(91, '+Salario', 1, '1000000', 3, 3, 1),
(92, '-Salud', 1, '100000', 1, 3, 2),
(93, '-Pension', 1, '100000', 2, 3, 2),
(94, '+Salario', 1, '1500000', 3, 4, 1),
(95, '-Pension', 1, '100000', 2, 4, 2),
(96, '+Salario', 1, '1500000', 3, 1, 1),
(97, '-Salud', 1, '100000', 1, 1, 2),
(98, 'sanitas', 1, '200000', 1, 2, 2),
(99, 'Salario', 1, '1300000', 3, 2, 1),
(100, '+Salario', 1, '1300000', 3, 7, 1),
(101, 'Sanitas', 1, '150000', 1, 7, 2),
(112, 'Salario', 1, '2000000', 3, 16, 1),
(113, 'Sanitas', 1, '100000', 1, 16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo_evento` varchar(45) DEFAULT NULL,
  `descripcion_evento` longtext DEFAULT NULL,
  `fecha_publicado` date DEFAULT NULL,
  `imagen_evento` longtext DEFAULT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `titulo_evento`, `descripcion_evento`, `fecha_publicado`, `imagen_evento`, `fk_usuario`) VALUES
(1, 'servicio aseo party', 'Limpiamos... Si después de un evento, fiesta o celebración está desordenado y sucio, llámenos, limpiamos y ordenamos por usted.\n\nSomos una empresa dedicada a dar una solución con el objetivo que nuestros clientes puedan disfrutar al máximo su momento de esparcimiento sin la preocupación de tener que limpiar después.\n\nOfrecemos:\n\nAspirado Profundo de Suciedad en Superficies\nLavado y Sellado de toda clase de Pisos\nLimpieza y Desinfección en Baños y Cocina\nAspirado y desmanchado de Alfombras\nRecolección de Basura\nSanitizado con Luces UV\nLimpieza de Vidrios Bajos y en Altura\nEntregando Aseo Integral de Calidad', '2020-10-05', 'assets/uploud/events/1601832644evento1.jpg', 7),
(2, 'capacitación en técnicas de supervisión de as', 'El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.', '2020-10-05', 'assets/uploud/events/1601833267noticia10.jpg', 7),
(3, 'manejo de maquinaria y equipos en superficie', 'Si te perdiste del webinar el pasado 16 de septiembre, en el cual hablamos Manejo de maquinaria y equipos en superficie, con la participación de Yanko Stipcianos de Marwind.', '2020-10-05', 'assets/uploud/events/1601833437noticia0.jpg', 7),
(4, 'la visita del papa', '          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at tempora, id sed culpa, debitis deleniti nesciunt dolorem nemo rerum impedit nihil, dicta ex laudantium dolore! Earum at eos et.\n            Inventore rem rerum iure neque quis laboriosam animi aliquam esse? Iusto nostrum quibusdam, facere cumque explicabo vero animi provident rerum voluptatibus deserunt assumenda fuga aperiam alias recusandae sed, nulla corporis?\n            Dolore iusto consectetur, ad quam praesentium mollitia dicta rerum cumque facilis, consequatur eos facere illo assumenda voluptates dignissimos exercitationem, nulla laboriosam sit et sequi earum architecto? Laboriosam id ut officia.\n            Iure explicabo accusamus quaerat ipsa at possimus alias quia quam temporibus inventore consectetur, molestiae reiciendis pariatur, aliquam, impedit nesciunt eius? Dolor libero inventore laboriosam consectetur, asperiores tenetur eligendi eaque temporibus.\n            Amet, recusandae quam doloribus animi accusantium error autem. Omnis velit, exercitationem ab possimus animi molestias harum voluptatem earum obcaecati. Incidunt accusantium a atque consectetur expedita et eius pariatur tenetur eligendi.\n            Minus exercitationem magnam, eligendi fugiat magni sed veritatis consequatur error repudiandae reprehenderit aperiam asperiores libero aliquid unde cumque nam. Ullam mollitia voluptate voluptatum omnis quas tenetur sit eum nostrum enim.\n            Delectus voluptatem repudiandae nesciunt itaque, cupiditate fugit impedit consectetur, pariatur sint voluptatibus excepturi molestiae quidem hic odio velit commodi odit laborum iusto? Suscipit, dolorum consectetur. Aliquam ipsum saepe inventore exercitationem?\n            Eaque, quibusdam illum vel rem consequuntur rerum doloribus cumque! Aliquam praesentium eum officiis, voluptas veniam rerum eaque. Consequuntur laboriosam hic fugiat, in placeat provident, explicabo magni libero, modi earum incidunt.\n            Libero tempore corporis quo laborum quis culpa provident similique ipsam illo impedit excepturi eaque, consectetur hic illum aliquam. A placeat saepe maxime doloremque recusandae illo obcaecati suscipit et ab quidem.\n            Magni nam hic inventore! Exercitationem, doloremque excepturi ullam quo tempora laboriosam libero aut veritatis aliquam nemo quod odio praesentium optio sit maiores, reiciendis illum magnam voluptates ipsum sint architecto perferendis.\n            Ex ea libero, doloribus similique nostrum unde numquam provident minima deserunt veniam in omnis error saepe pariatur quo repudiandae vel expedita? Perspiciatis totam recusandae iure in alias distinctio! Repudiandae, non.\n            Maiores, numquam ratione aliquid quae totam nesciunt. Magni itaque nulla error et aliquam nobis rem illum, porro repellendus vel non consectetur amet vero totam! Expedita qui atque dolorum culpa commodi?\n            Eum, ex culpa expedita nulla nisi inventore sunt minima dolores, a reiciendis distinctio eligendi, corrupti iure magni temporibus nesciunt doloremque veritatis! Quos nemo veniam, perferendis nostrum dignissimos reiciendis voluptatibus totam.\n            Id cumque alias vitae, delectus enim, quibusdam nesciunt illo ut beatae facere iusto. Officia, quae tempora sunt non quod ab corporis maiores aspernatur fugit expedita sit suscipit optio dolor earum?\n            Laudantium mollitia sed nobis natus quod aut facere laboriosam eaque, officiis ut fugit accusantium molestiae possimus officia, cum iste soluta assumenda rem quibusdam repudiandae odio obcaecati illum facilis! Blanditiis, dolore!\n            Ullam labore vitae alias aspernatur, porro magni consequuntur animi dolore, temporibus distinctio aliquam id cum sint. Id dolores modi quaerat. Ipsam dicta iure nisi maxime ducimus aperiam? Recusandae, repudiandae deserunt!\n            Sed voluptatum consequuntur, id sint fuga ratione quisquam ad. Ut quis consequatur consectetur dolorum voluptates mollitia, sint ullam, distinctio vero possimus nihil earum reiciendis voluptas quasi et iste minima inventore!\n            Ut eligendi, explicabo distinctio placeat a voluptatum, voluptates ipsam minus error culpa commodi corrupti aliquam pariatur consectetur perspiciatis repellendus deserunt voluptatibus quas eos ab mollitia expedita cum ullam. Voluptas, corrupti.\n            Ducimus, quos? Perferendis vitae fuga sit quibusdam libero, amet nesciunt aperiam, architecto repudiandae molestias ex aliquid. Totam atque natus quasi, quae, soluta eos perspiciatis neque reiciendis quo, quod rem ipsam.\n            Velit officia molestiae iusto ab vel facere aliquam in quidem possimus sequi ducimus minima quos, quibusdam alias pariatur quisquam sunt! Praesentium ea nisi exercitationem, in vero est nemo? Hic, aut.\n            Labore doloribus at facere provident eos, necessitatibus et cum inventore sint rerum doloremque, quo cupiditate facilis, adipisci in praesentium dicta quasi magnam quaerat deleniti neque animi quis dolor dignissimos! Vero!\n            Perferendis, atque est nulla repellendus soluta vero modi voluptate magni rem veritatis necessitatibus asperiores. Debitis, illo eaque non earum accusamus expedita rerum, hic, sunt nam dignissimos exercitationem architecto aperiam voluptatum!\n            Iste similique repellendus fuga harum, rerum odio ab quae libero, voluptates distinctio veritatis pariatur commodi excepturi quos ut recusandae quia aliquid dolorum vel accusamus esse culpa. Corrupti, nisi! Est, deserunt.\n            Officia eveniet optio unde ratione excepturi vero eos, eius nisi tempora nemo alias ipsam iste dolor accusamus iure. Tempore veniam ea laboriosam deleniti vero optio sequi ratione soluta ad exercitationem!\n            Dignissimos ullam, incidunt quasi tempora dolor accusamus? Corrupti non ratione voluptas deserunt enim provident et perspiciatis unde aperiam minus vitae quaerat vero delectus magnam, ut, sed aliquam? Deserunt, architecto rerum!\n            Quis obcaecati fuga ea cum quod commodi suscipit ipsa dignissimos at quaerat nihil sit eaque facilis autem exercitationem dolorum, molestiae esse, nisi inventore. Cum, reprehenderit reiciendis dolorum praesentium unde vero!\n            Vel tenetur minus iusto vero dolorem amet accusamus atque magnam. Laborum dicta nihil natus nostrum itaque unde, tempore quo tenetur quia dolore dolor quos repudiandae velit molestiae voluptas ipsam consequuntur.\n            Unde consequatur reiciendis ducimus commodi excepturi nobis harum ut natus porro, dignissimos veniam rerum fuga numquam officia atque nesciunt adipisci cumque. Nemo natus a magnam, possimus quaerat placeat qui doloremque.\n            Sunt tempora ut officiis, corporis recusandae sit cupiditate non, quos fugit, excepturi nam nihil nemo eligendi at totam esse quaerat dolores? Porro nobis ipsa consequatur magnam distinctio aliquid, adipisci unde.\n            Dolores repellat laudantium, quia pariatur distinctio error, aperiam tenetur dolore quisquam cum doloremque iusto possimus a sed. Provident quod iusto accusamus necessitatibus ut dignissimos corporis deserunt, autem, non, laboriosam amet.\n            Velit ullam, quidem eum nostrum iusto asperiores quas alias illo ab molestiae, impedit cum. Sapiente ut fuga ad quia repellendus quam iusto placeat blanditiis rerum similique, molestias, excepturi dignissimos aperiam.\n            Aut neque quam a aspernatur quisquam provident deleniti ea dolore voluptates culpa rem praesentium molestias sint quos, odit fuga maiores eum impedit sit labore! Quis veniam porro illum consectetur. Ipsa?\n            Nobis laboriosam nulla vero possimus distinctio odio velit saepe beatae? Expedita quaerat inventore distinctio quod architecto enim temporibus quas, amet molestiae laboriosam reprehenderit ipsum autem veniam voluptates sunt asperiores aperiam.\n            Voluptate quis reiciendis itaque corporis quos corrupti voluptates cumque ipsa quisquam? Quam hic sunt fugit quidem mollitia temporibus repudiandae quae maxime aliquam tempore eligendi, impedit, dignissimos fugiat consectetur deleniti dolor?\n            Doloremque saepe fuga nobis mollitia odio facilis eaque laborum sequi omnis. Officiis ullam perferendis eligendi pariatur delectus nulla temporibus eius, saepe, deserunt distinctio, fuga commodi. Molestiae sapiente accusamus amet perspiciatis!\n            Maxime non iusto dolorum dolorem quaerat error tempore vel veniam ipsum nam, sunt, perspiciatis cupiditate iste nostrum. Voluptatum modi a minus, vel, iste, quas cupiditate tenetur delectus tempora officiis adipisci?\n            Laboriosam, eos mollitia? Voluptate est, in deleniti repudiandae consectetur quia numquam asperiores. Explicabo nisi, ipsam voluptatum a commodi iusto labore dolor fugit itaque molestiae tempore voluptates non! Dolorum, eligendi fugiat!\n            Sit possimus pariatur perspiciatis fugiat iure ullam distinctio quasi dolore quaerat aliquam veritatis esse, culpa officia doloremque omnis ad vel cupiditate atque blanditiis cumque nobis. Nulla nam eligendi odit architecto!\n            Voluptate ea deleniti, deserunt placeat explicabo ducimus molestias eveniet minima a esse at illum maiores quasi ipsam quibusdam repellendus. Iste accusamus ipsum unde voluptatem dolor labore odit eveniet, quam ducimus.\n            Recusandae, optio molestias dolorum iste temporibus enim molestiae animi labore id explicabo, laboriosam rem nobis esse veritatis accusamus et aut magni at laborum quam, quae quo perferendis repellat! Ipsa, nisi?', '2020-10-05', 'assets/uploud/events/1601833739evento4.jpg', 7),
(5, 'lorem 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sequi libero animi natus. Recusandae deleniti neque sunt quaerat consequatur suscipit voluptates atque omnis, enim vero totam ratione cum labore? Adipisci.\nEius, delectus. Provident similique molestiae explicabo, minima, accusantium harum, iste suscipit voluptatum vitae obcaecati illum odit dolores sit possimus. Iusto, dolorum provident accusamus ipsam dolorem velit animi magnam porro placeat.\nIste aliquam deserunt, incidunt saepe maiores consequatur a dolore illo laborum ipsam minus accusantium veniam consectetur, eveniet iusto natus aperiam. Dolor sed magnam eius libero vero optio officia sint eligendi!\nBeatae possimus nisi porro ullam. Quidem labore fugiat ipsum expedita. Veritatis quisquam enim, nam laborum voluptatum blanditiis vero corporis eligendi quam iure aut commodi esse nostrum, quis illo ex delectus.\nTemporibus ratione perspiciatis, repellat est libero maiores placeat sit autem atque aspernatur tempora maxime nihil doloribus quos et necessitatibus distinctio nisi officia esse saepe harum fugit? Quae sequi beatae animi.\nOmnis in temporibus animi. Dolores iste dolore consectetur illum, illo ipsum! Doloremque pariatur quos optio esse ullam. Voluptas nobis obcaecati numquam amet aliquam? Iste expedita dolor cupiditate quam perferendis necessitatibus.\nItaque tempora quasi culpa? Suscipit neque quasi dolore cum, rerum ducimus. Optio animi esse minus iste quisquam voluptatum inventore eveniet ex id, debitis, praesentium architecto dolor placeat quaerat. Libero, possimus.\nQuod debitis placeat tempora quia nihil, deleniti vitae illum hic dolore, architecto error nisi veritatis, unde eos! Quod, quibusdam! Rerum dignissimos accusamus voluptas exercitationem, ex cum. Quisquam voluptates enim dolor.\nUllam consequatur soluta, consequuntur optio sequi ut? Laboriosam, voluptas, laudantium eligendi quisquam impedit pariatur veritatis porro ullam nihil eum saepe. Dolorum sint consequatur aperiam natus id reiciendis maiores nemo nulla.\nEveniet facilis aspernatur quis. Nostrum voluptatem officiis quae voluptatibus incidunt? Quo porro nulla sint quaerat exercitationem! Ullam, numquam eaque blanditiis harum deserunt, excepturi necessitatibus impedit repudiandae quae, delectus sint cupiditate?\nDolore rerum dignissimos corrupti suscipit repellat, nostrum dolorum beatae assumenda quaerat numquam adipisci provident error libero, incidunt modi quia. Consequatur corrupti neque rem porro unde, cumque nesciunt explicabo obcaecati? Aliquid.\nMolestiae cupiditate nisi laboriosam voluptatibus tempore asperiores iste, incidunt quas excepturi! Exercitationem harum enim sequi deleniti quae placeat excepturi odit mollitia, eaque doloremque nam? Porro voluptate laudantium fugit fuga velit?\nEius, tempora quam impedit omnis laudantium earum qui quaerat esse porro animi molestiae tempore ad placeat similique repellat adipisci ducimus, voluptate repudiandae aut nesciunt maiores facere ipsum praesentium corporis! Quas.\nQuibusdam, veniam. Amet, laudantium eos cum autem alias illum unde magni, tempore odit, minima quisquam dicta consequuntur vel totam vero corporis tenetur fugiat harum magnam eius voluptas recusandae impedit eaque.\nConsequuntur eaque neque illum molestiae libero eos. Corrupti maiores aliquam totam! Doloremque asperiores saepe neque aspernatur! Voluptatem, veritatis. Tempora aliquid earum corporis error modi quia dolorum fugit! Dicta, est inventore!\nRepellat soluta eveniet at aperiam nobis, et laudantium. Nulla omnis doloribus impedit! Cumque alias unde cupiditate consequuntur dignissimos reprehenderit magni fuga nemo quibusdam. Perferendis minima saepe, possimus ab delectus consequuntur.\nDebitis enim accusantium dignissimos voluptas sint itaque tenetur distinctio at eius optio maxime quas culpa deleniti beatae eum ut tempora, numquam iusto ipsum eos, iste consequatur error! Quod, perferendis placeat?\nNemo nam cumque eos placeat accusamus aperiam facilis suscipit quod? Vero perferendis cupiditate exercitationem, expedita veritatis, labore eaque neque voluptas voluptatem consequuntur recusandae sunt quia inventore earum saepe dolor tempore.\nMinima consectetur maiores labore sint accusamus, voluptatem eaque, blanditiis earum officia recusandae quas porro velit quasi. Aspernatur doloribus, consequuntur nam suscipit iste inventore voluptatibus iusto tempora voluptate qui, dicta architecto.\nLaudantium tempore sint inventore earum nisi commodi, ullam vero alias incidunt laborum et, fugiat dolore consectetur mollitia numquam aperiam nemo, minus corporis amet recusandae quos! Obcaecati sit quia eaque adipisci?', '2020-10-05', 'assets/uploud/events/1601833786evento3.jpg', 7),
(6, 'servicio de limpieza de eventos comida a mita', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sequi libero animi natus. Recusandae deleniti neque sunt quaerat consequatur suscipit voluptates atque omnis, enim vero totam ratione cum labore? Adipisci.\nEius, delectus. Provident similique molestiae explicabo, minima, accusantium harum, iste suscipit voluptatum vitae obcaecati illum odit dolores sit possimus. Iusto, dolorum provident accusamus ipsam dolorem velit animi magnam porro placeat.\nIste aliquam deserunt, incidunt saepe maiores consequatur a dolore illo laborum ipsam minus accusantium veniam consectetur, eveniet iusto natus aperiam. Dolor sed magnam eius libero vero optio officia sint eligendi!\nBeatae possimus nisi porro ullam. Quidem labore fugiat ipsum expedita. Veritatis quisquam enim, nam laborum voluptatum blanditiis vero corporis eligendi quam iure aut commodi esse nostrum, quis illo ex delectus.\nTemporibus ratione perspiciatis, repellat est libero maiores placeat sit autem atque aspernatur tempora maxime nihil doloribus quos et necessitatibus distinctio nisi officia esse saepe harum fugit? Quae sequi beatae animi.\nOmnis in temporibus animi. Dolores iste dolore consectetur illum, illo ipsum! Doloremque pariatur quos optio esse ullam. Voluptas nobis obcaecati numquam amet aliquam? Iste expedita dolor cupiditate quam perferendis necessitatibus.\nItaque tempora quasi culpa? Suscipit neque quasi dolore cum, rerum ducimus. Optio animi esse minus iste quisquam voluptatum inventore eveniet ex id, debitis, praesentium architecto dolor placeat quaerat. Libero, possimus.\nQuod debitis placeat tempora quia nihil, deleniti vitae illum hic dolore, architecto error nisi veritatis, unde eos! Quod, quibusdam! Rerum dignissimos accusamus voluptas exercitationem, ex cum. Quisquam voluptates enim dolor.\nUllam consequatur soluta, consequuntur optio sequi ut? Laboriosam, voluptas, laudantium eligendi quisquam impedit pariatur veritatis porro ullam nihil eum saepe. Dolorum sint consequatur aperiam natus id reiciendis maiores nemo nulla.\nEveniet facilis aspernatur quis. Nostrum voluptatem officiis quae voluptatibus incidunt? Quo porro nulla sint quaerat exercitationem! Ullam, numquam eaque blanditiis harum deserunt, excepturi necessitatibus impedit repudiandae quae, delectus sint cupiditate?\nDolore rerum dignissimos corrupti suscipit repellat, nostrum dolorum beatae assumenda quaerat numquam adipisci provident error libero, incidunt modi quia. Consequatur corrupti neque rem porro unde, cumque nesciunt explicabo obcaecati? Aliquid.\nMolestiae cupiditate nisi laboriosam voluptatibus tempore asperiores iste, incidunt quas excepturi! Exercitationem harum enim sequi deleniti quae placeat excepturi odit mollitia, eaque doloremque nam? Porro voluptate laudantium fugit fuga velit?\nEius, tempora quam impedit omnis laudantium earum qui quaerat esse porro animi molestiae tempore ad placeat similique repellat adipisci ducimus, voluptate repudiandae aut nesciunt maiores facere ipsum praesentium corporis! Quas.\nQuibusdam, veniam. Amet, laudantium eos cum autem alias illum unde magni, tempore odit, minima quisquam dicta consequuntur vel totam vero corporis tenetur fugiat harum magnam eius voluptas recusandae impedit eaque.\nConsequuntur eaque neque illum molestiae libero eos. Corrupti maiores aliquam totam! Doloremque asperiores saepe neque aspernatur! Voluptatem, veritatis. Tempora aliquid earum corporis error modi quia dolorum fugit! Dicta, est inventore!\nRepellat soluta eveniet at aperiam nobis, et laudantium. Nulla omnis doloribus impedit! Cumque alias unde cupiditate consequuntur dignissimos reprehenderit magni fuga nemo quibusdam. Perferendis minima saepe, possimus ab delectus consequuntur.\nDebitis enim accusantium dignissimos voluptas sint itaque tenetur distinctio at eius optio maxime quas culpa deleniti beatae eum ut tempora, numquam iusto ipsum eos, iste consequatur error! Quod, perferendis placeat?\nNemo nam cumque eos placeat accusamus aperiam facilis suscipit quod? Vero perferendis cupiditate exercitationem, expedita veritatis, labore eaque neque voluptas voluptatem consequuntur recusandae sunt quia inventore earum saepe dolor tempore.\nMinima consectetur maiores labore sint accusamus, voluptatem eaque, blanditiis earum officia recusandae quas porro velit quasi. Aspernatur doloribus, consequuntur nam suscipit iste inventore voluptatibus iusto tempora voluptate qui, dicta architecto.\nLaudantium tempore sint inventore earum nisi commodi, ullam vero alias incidunt laborum et, fugiat dolore consectetur mollitia numquam aperiam nemo, minus corporis amet recusandae quos! Obcaecati sit quia eaque adipisci?', '2020-10-05', 'assets/uploud/events/1601833863evento5.jpg', 7),
(7, 'organizacion y limpieza en eventos de comidas', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sequi libero animi natus. Recusandae deleniti neque sunt quaerat consequatur suscipit voluptates atque omnis, enim vero totam ratione cum labore? Adipisci.\nEius, delectus. Provident similique molestiae explicabo, minima, accusantium harum, iste suscipit voluptatum vitae obcaecati illum odit dolores sit possimus. Iusto, dolorum provident accusamus ipsam dolorem velit animi magnam porro placeat.\nIste aliquam deserunt, incidunt saepe maiores consequatur a dolore illo laborum ipsam minus accusantium veniam consectetur, eveniet iusto natus aperiam. Dolor sed magnam eius libero vero optio officia sint eligendi!\nBeatae possimus nisi porro ullam. Quidem labore fugiat ipsum expedita. Veritatis quisquam enim, nam laborum voluptatum blanditiis vero corporis eligendi quam iure aut commodi esse nostrum, quis illo ex delectus.\nTemporibus ratione perspiciatis, repellat est libero maiores placeat sit autem atque aspernatur tempora maxime nihil doloribus quos et necessitatibus distinctio nisi officia esse saepe harum fugit? Quae sequi beatae animi.\nOmnis in temporibus animi. Dolores iste dolore consectetur illum, illo ipsum! Doloremque pariatur quos optio esse ullam. Voluptas nobis obcaecati numquam amet aliquam? Iste expedita dolor cupiditate quam perferendis necessitatibus.\nItaque tempora quasi culpa? Suscipit neque quasi dolore cum, rerum ducimus. Optio animi esse minus iste quisquam voluptatum inventore eveniet ex id, debitis, praesentium architecto dolor placeat quaerat. Libero, possimus.\nQuod debitis placeat tempora quia nihil, deleniti vitae illum hic dolore, architecto error nisi veritatis, unde eos! Quod, quibusdam! Rerum dignissimos accusamus voluptas exercitationem, ex cum. Quisquam voluptates enim dolor.\nUllam consequatur soluta, consequuntur optio sequi ut? Laboriosam, voluptas, laudantium eligendi quisquam impedit pariatur veritatis porro ullam nihil eum saepe. Dolorum sint consequatur aperiam natus id reiciendis maiores nemo nulla.\nEveniet facilis aspernatur quis. Nostrum voluptatem officiis quae voluptatibus incidunt? Quo porro nulla sint quaerat exercitationem! Ullam, numquam eaque blanditiis harum deserunt, excepturi necessitatibus impedit repudiandae quae, delectus sint cupiditate?\nDolore rerum dignissimos corrupti suscipit repellat, nostrum dolorum beatae assumenda quaerat numquam adipisci provident error libero, incidunt modi quia. Consequatur corrupti neque rem porro unde, cumque nesciunt explicabo obcaecati? Aliquid.\nMolestiae cupiditate nisi laboriosam voluptatibus tempore asperiores iste, incidunt quas excepturi! Exercitationem harum enim sequi deleniti quae placeat excepturi odit mollitia, eaque doloremque nam? Porro voluptate laudantium fugit fuga velit?\nEius, tempora quam impedit omnis laudantium earum qui quaerat esse porro animi molestiae tempore ad placeat similique repellat adipisci ducimus, voluptate repudiandae aut nesciunt maiores facere ipsum praesentium corporis! Quas.\nQuibusdam, veniam. Amet, laudantium eos cum autem alias illum unde magni, tempore odit, minima quisquam dicta consequuntur vel totam vero corporis tenetur fugiat harum magnam eius voluptas recusandae impedit eaque.\nConsequuntur eaque neque illum molestiae libero eos. Corrupti maiores aliquam totam! Doloremque asperiores saepe neque aspernatur! Voluptatem, veritatis. Tempora aliquid earum corporis error modi quia dolorum fugit! Dicta, est inventore!\nRepellat soluta eveniet at aperiam nobis, et laudantium. Nulla omnis doloribus impedit! Cumque alias unde cupiditate consequuntur dignissimos reprehenderit magni fuga nemo quibusdam. Perferendis minima saepe, possimus ab delectus consequuntur.\nDebitis enim accusantium dignissimos voluptas sint itaque tenetur distinctio at eius optio maxime quas culpa deleniti beatae eum ut tempora, numquam iusto ipsum eos, iste consequatur error! Quod, perferendis placeat?\nNemo nam cumque eos placeat accusamus aperiam facilis suscipit quod? Vero perferendis cupiditate exercitationem, expedita veritatis, labore eaque neque voluptas voluptatem consequuntur recusandae sunt quia inventore earum saepe dolor tempore.\nMinima consectetur maiores labore sint accusamus, voluptatem eaque, blanditiis earum officia recusandae quas porro velit quasi. Aspernatur doloribus, consequuntur nam suscipit iste inventore voluptatibus iusto tempora voluptate qui, dicta architecto.\nLaudantium tempore sint inventore earum nisi commodi, ullam vero alias incidunt laborum et, fugiat dolore consectetur mollitia numquam aperiam nemo, minus corporis amet recusandae quos! Obcaecati sit quia eaque adipisci?', '2020-10-05', 'assets/uploud/events/1601833952evento6.jpg', 7),
(8, 'desinfeccion gratis ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sequi libero animi natus. Recusandae deleniti neque sunt quaerat consequatur suscipit voluptates atque omnis, enim vero totam ratione cum labore? Adipisci.\nEius, delectus. Provident similique molestiae explicabo, minima, accusantium harum, iste suscipit voluptatum vitae obcaecati illum odit dolores sit possimus. Iusto, dolorum provident accusamus ipsam dolorem velit animi magnam porro placeat.\nIste aliquam deserunt, incidunt saepe maiores consequatur a dolore illo laborum ipsam minus accusantium veniam consectetur, eveniet iusto natus aperiam. Dolor sed magnam eius libero vero optio officia sint eligendi!\nBeatae possimus nisi porro ullam. Quidem labore fugiat ipsum expedita. Veritatis quisquam enim, nam laborum voluptatum blanditiis vero corporis eligendi quam iure aut commodi esse nostrum, quis illo ex delectus.\nTemporibus ratione perspiciatis, repellat est libero maiores placeat sit autem atque aspernatur tempora maxime nihil doloribus quos et necessitatibus distinctio nisi officia esse saepe harum fugit? Quae sequi beatae animi.\nOmnis in temporibus animi. Dolores iste dolore consectetur illum, illo ipsum! Doloremque pariatur quos optio esse ullam. Voluptas nobis obcaecati numquam amet aliquam? Iste expedita dolor cupiditate quam perferendis necessitatibus.\nItaque tempora quasi culpa? Suscipit neque quasi dolore cum, rerum ducimus. Optio animi esse minus iste quisquam voluptatum inventore eveniet ex id, debitis, praesentium architecto dolor placeat quaerat. Libero, possimus.\nQuod debitis placeat tempora quia nihil, deleniti vitae illum hic dolore, architecto error nisi veritatis, unde eos! Quod, quibusdam! Rerum dignissimos accusamus voluptas exercitationem, ex cum. Quisquam voluptates enim dolor.\nUllam consequatur soluta, consequuntur optio sequi ut? Laboriosam, voluptas, laudantium eligendi quisquam impedit pariatur veritatis porro ullam nihil eum saepe. Dolorum sint consequatur aperiam natus id reiciendis maiores nemo nulla.\nEveniet facilis aspernatur quis. Nostrum voluptatem officiis quae voluptatibus incidunt? Quo porro nulla sint quaerat exercitationem! Ullam, numquam eaque blanditiis harum deserunt, excepturi necessitatibus impedit repudiandae quae, delectus sint cupiditate?\nDolore rerum dignissimos corrupti suscipit repellat, nostrum dolorum beatae assumenda quaerat numquam adipisci provident error libero, incidunt modi quia. Consequatur corrupti neque rem porro unde, cumque nesciunt explicabo obcaecati? Aliquid.\nMolestiae cupiditate nisi laboriosam voluptatibus tempore asperiores iste, incidunt quas excepturi! Exercitationem harum enim sequi deleniti quae placeat excepturi odit mollitia, eaque doloremque nam? Porro voluptate laudantium fugit fuga velit?\nEius, tempora quam impedit omnis laudantium earum qui quaerat esse porro animi molestiae tempore ad placeat similique repellat adipisci ducimus, voluptate repudiandae aut nesciunt maiores facere ipsum praesentium corporis! Quas.\nQuibusdam, veniam. Amet, laudantium eos cum autem alias illum unde magni, tempore odit, minima quisquam dicta consequuntur vel totam vero corporis tenetur fugiat harum magnam eius voluptas recusandae impedit eaque.\nConsequuntur eaque neque illum molestiae libero eos. Corrupti maiores aliquam totam! Doloremque asperiores saepe neque aspernatur! Voluptatem, veritatis. Tempora aliquid earum corporis error modi quia dolorum fugit! Dicta, est inventore!\nRepellat soluta eveniet at aperiam nobis, et laudantium. Nulla omnis doloribus impedit! Cumque alias unde cupiditate consequuntur dignissimos reprehenderit magni fuga nemo quibusdam. Perferendis minima saepe, possimus ab delectus consequuntur.\nDebitis enim accusantium dignissimos voluptas sint itaque tenetur distinctio at eius optio maxime quas culpa deleniti beatae eum ut tempora, numquam iusto ipsum eos, iste consequatur error! Quod, perferendis placeat?\nNemo nam cumque eos placeat accusamus aperiam facilis suscipit quod? Vero perferendis cupiditate exercitationem, expedita veritatis, labore eaque neque voluptas voluptatem consequuntur recusandae sunt quia inventore earum saepe dolor tempore.\nMinima consectetur maiores labore sint accusamus, voluptatem eaque, blanditiis earum officia recusandae quas porro velit quasi. Aspernatur doloribus, consequuntur nam suscipit iste inventore voluptatibus iusto tempora voluptate qui, dicta architecto.\nLaudantium tempore sint inventore earum nisi commodi, ullam vero alias incidunt laborum et, fugiat dolore consectetur mollitia numquam aperiam nemo, minus corporis amet recusandae quos! Obcaecati sit quia eaque adipisci?', '2020-10-05', 'assets/uploud/events/1601833980evento8.jpg', 7),
(9, 'lorem 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sequi libero animi natus. Recusandae deleniti neque sunt quaerat consequatur suscipit voluptates atque omnis, enim vero totam ratione cum labore? Adipisci.\nEius, delectus. Provident similique molestiae explicabo, minima, accusantium harum, iste suscipit voluptatum vitae obcaecati illum odit dolores sit possimus. Iusto, dolorum provident accusamus ipsam dolorem velit animi magnam porro placeat.\nIste aliquam deserunt, incidunt saepe maiores consequatur a dolore illo laborum ipsam minus accusantium veniam consectetur, eveniet iusto natus aperiam. Dolor sed magnam eius libero vero optio officia sint eligendi!\nBeatae possimus nisi porro ullam. Quidem labore fugiat ipsum expedita. Veritatis quisquam enim, nam laborum voluptatum blanditiis vero corporis eligendi quam iure aut commodi esse nostrum, quis illo ex delectus.\nTemporibus ratione perspiciatis, repellat est libero maiores placeat sit autem atque aspernatur tempora maxime nihil doloribus quos et necessitatibus distinctio nisi officia esse saepe harum fugit? Quae sequi beatae animi.\nOmnis in temporibus animi. Dolores iste dolore consectetur illum, illo ipsum! Doloremque pariatur quos optio esse ullam. Voluptas nobis obcaecati numquam amet aliquam? Iste expedita dolor cupiditate quam perferendis necessitatibus.\nItaque tempora quasi culpa? Suscipit neque quasi dolore cum, rerum ducimus. Optio animi esse minus iste quisquam voluptatum inventore eveniet ex id, debitis, praesentium architecto dolor placeat quaerat. Libero, possimus.\nQuod debitis placeat tempora quia nihil, deleniti vitae illum hic dolore, architecto error nisi veritatis, unde eos! Quod, quibusdam! Rerum dignissimos accusamus voluptas exercitationem, ex cum. Quisquam voluptates enim dolor.\nUllam consequatur soluta, consequuntur optio sequi ut? Laboriosam, voluptas, laudantium eligendi quisquam impedit pariatur veritatis porro ullam nihil eum saepe. Dolorum sint consequatur aperiam natus id reiciendis maiores nemo nulla.\nEveniet facilis aspernatur quis. Nostrum voluptatem officiis quae voluptatibus incidunt? Quo porro nulla sint quaerat exercitationem! Ullam, numquam eaque blanditiis harum deserunt, excepturi necessitatibus impedit repudiandae quae, delectus sint cupiditate?\nDolore rerum dignissimos corrupti suscipit repellat, nostrum dolorum beatae assumenda quaerat numquam adipisci provident error libero, incidunt modi quia. Consequatur corrupti neque rem porro unde, cumque nesciunt explicabo obcaecati? Aliquid.\nMolestiae cupiditate nisi laboriosam voluptatibus tempore asperiores iste, incidunt quas excepturi! Exercitationem harum enim sequi deleniti quae placeat excepturi odit mollitia, eaque doloremque nam? Porro voluptate laudantium fugit fuga velit?\nEius, tempora quam impedit omnis laudantium earum qui quaerat esse porro animi molestiae tempore ad placeat similique repellat adipisci ducimus, voluptate repudiandae aut nesciunt maiores facere ipsum praesentium corporis! Quas.\nQuibusdam, veniam. Amet, laudantium eos cum autem alias illum unde magni, tempore odit, minima quisquam dicta consequuntur vel totam vero corporis tenetur fugiat harum magnam eius voluptas recusandae impedit eaque.\nConsequuntur eaque neque illum molestiae libero eos. Corrupti maiores aliquam totam! Doloremque asperiores saepe neque aspernatur! Voluptatem, veritatis. Tempora aliquid earum corporis error modi quia dolorum fugit! Dicta, est inventore!\nRepellat soluta eveniet at aperiam nobis, et laudantium. Nulla omnis doloribus impedit! Cumque alias unde cupiditate consequuntur dignissimos reprehenderit magni fuga nemo quibusdam. Perferendis minima saepe, possimus ab delectus consequuntur.\nDebitis enim accusantium dignissimos voluptas sint itaque tenetur distinctio at eius optio maxime quas culpa deleniti beatae eum ut tempora, numquam iusto ipsum eos, iste consequatur error! Quod, perferendis placeat?\nNemo nam cumque eos placeat accusamus aperiam facilis suscipit quod? Vero perferendis cupiditate exercitationem, expedita veritatis, labore eaque neque voluptas voluptatem consequuntur recusandae sunt quia inventore earum saepe dolor tempore.\nMinima consectetur maiores labore sint accusamus, voluptatem eaque, blanditiis earum officia recusandae quas porro velit quasi. Aspernatur doloribus, consequuntur nam suscipit iste inventore voluptatibus iusto tempora voluptate qui, dicta architecto.\nLaudantium tempore sint inventore earum nisi commodi, ullam vero alias incidunt laborum et, fugiat dolore consectetur mollitia numquam aperiam nemo, minus corporis amet recusandae quos! Obcaecati sit quia eaque adipisci?', '2020-10-05', 'assets/uploud/events/1601834023evento9.jpg', 7),
(10, 'comida :d', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sequi libero animi natus. Recusandae deleniti neque sunt quaerat consequatur suscipit voluptates atque omnis, enim vero totam ratione cum labore? Adipisci.\nEius, delectus. Provident similique molestiae explicabo, minima, accusantium harum, iste suscipit voluptatum vitae obcaecati illum odit dolores sit possimus. Iusto, dolorum provident accusamus ipsam dolorem velit animi magnam porro placeat.\nIste aliquam deserunt, incidunt saepe maiores consequatur a dolore illo laborum ipsam minus accusantium veniam consectetur, eveniet iusto natus aperiam. Dolor sed magnam eius libero vero optio officia sint eligendi!\nBeatae possimus nisi porro ullam. Quidem labore fugiat ipsum expedita. Veritatis quisquam enim, nam laborum voluptatum blanditiis vero corporis eligendi quam iure aut commodi esse nostrum, quis illo ex delectus.\nTemporibus ratione perspiciatis, repellat est libero maiores placeat sit autem atque aspernatur tempora maxime nihil doloribus quos et necessitatibus distinctio nisi officia esse saepe harum fugit? Quae sequi beatae animi.\nOmnis in temporibus animi. Dolores iste dolore consectetur illum, illo ipsum! Doloremque pariatur quos optio esse ullam. Voluptas nobis obcaecati numquam amet aliquam? Iste expedita dolor cupiditate quam perferendis necessitatibus.\nItaque tempora quasi culpa? Suscipit neque quasi dolore cum, rerum ducimus. Optio animi esse minus iste quisquam voluptatum inventore eveniet ex id, debitis, praesentium architecto dolor placeat quaerat. Libero, possimus.\nQuod debitis placeat tempora quia nihil, deleniti vitae illum hic dolore, architecto error nisi veritatis, unde eos! Quod, quibusdam! Rerum dignissimos accusamus voluptas exercitationem, ex cum. Quisquam voluptates enim dolor.\nUllam consequatur soluta, consequuntur optio sequi ut? Laboriosam, voluptas, laudantium eligendi quisquam impedit pariatur veritatis porro ullam nihil eum saepe. Dolorum sint consequatur aperiam natus id reiciendis maiores nemo nulla.\nEveniet facilis aspernatur quis. Nostrum voluptatem officiis quae voluptatibus incidunt? Quo porro nulla sint quaerat exercitationem! Ullam, numquam eaque blanditiis harum deserunt, excepturi necessitatibus impedit repudiandae quae, delectus sint cupiditate?\nDolore rerum dignissimos corrupti suscipit repellat, nostrum dolorum beatae assumenda quaerat numquam adipisci provident error libero, incidunt modi quia. Consequatur corrupti neque rem porro unde, cumque nesciunt explicabo obcaecati? Aliquid.\nMolestiae cupiditate nisi laboriosam voluptatibus tempore asperiores iste, incidunt quas excepturi! Exercitationem harum enim sequi deleniti quae placeat excepturi odit mollitia, eaque doloremque nam? Porro voluptate laudantium fugit fuga velit?\nEius, tempora quam impedit omnis laudantium earum qui quaerat esse porro animi molestiae tempore ad placeat similique repellat adipisci ducimus, voluptate repudiandae aut nesciunt maiores facere ipsum praesentium corporis! Quas.\nQuibusdam, veniam. Amet, laudantium eos cum autem alias illum unde magni, tempore odit, minima quisquam dicta consequuntur vel totam vero corporis tenetur fugiat harum magnam eius voluptas recusandae impedit eaque.\nConsequuntur eaque neque illum molestiae libero eos. Corrupti maiores aliquam totam! Doloremque asperiores saepe neque aspernatur! Voluptatem, veritatis. Tempora aliquid earum corporis error modi quia dolorum fugit! Dicta, est inventore!\nRepellat soluta eveniet at aperiam nobis, et laudantium. Nulla omnis doloribus impedit! Cumque alias unde cupiditate consequuntur dignissimos reprehenderit magni fuga nemo quibusdam. Perferendis minima saepe, possimus ab delectus consequuntur.\nDebitis enim accusantium dignissimos voluptas sint itaque tenetur distinctio at eius optio maxime quas culpa deleniti beatae eum ut tempora, numquam iusto ipsum eos, iste consequatur error! Quod, perferendis placeat?\nNemo nam cumque eos placeat accusamus aperiam facilis suscipit quod? Vero perferendis cupiditate exercitationem, expedita veritatis, labore eaque neque voluptas voluptatem consequuntur recusandae sunt quia inventore earum saepe dolor tempore.\nMinima consectetur maiores labore sint accusamus, voluptatem eaque, blanditiis earum officia recusandae quas porro velit quasi. Aspernatur doloribus, consequuntur nam suscipit iste inventore voluptatibus iusto tempora voluptate qui, dicta architecto.\nLaudantium tempore sint inventore earum nisi commodi, ullam vero alias incidunt laborum et, fugiat dolore consectetur mollitia numquam aperiam nemo, minus corporis amet recusandae quos! Obcaecati sit quia eaque adipisci?', '2020-10-05', 'assets/uploud/events/1601834062evento11.jpg', 7),
(11, 'murio :d', 'LALLAL', '2020-10-05', 'assets/uploud/events/160192694835682510F.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_contactenos`
--

CREATE TABLE `logs_contactenos` (
  `id_log_contactenos` int(11) NOT NULL,
  `nombres_contactenos` varchar(50) DEFAULT NULL,
  `apellidos_contactenos` varchar(50) DEFAULT NULL,
  `genero_contactenos` varchar(10) DEFAULT NULL,
  `correo_contactenos` varchar(50) DEFAULT NULL,
  `asunto_contactenos` varchar(150) DEFAULT NULL,
  `mensaje_contactenos` longtext DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logs_contactenos`
--

INSERT INTO `logs_contactenos` (`id_log_contactenos`, `nombres_contactenos`, `apellidos_contactenos`, `genero_contactenos`, `correo_contactenos`, `asunto_contactenos`, `mensaje_contactenos`, `fecha_envio`) VALUES
(1, 'Sandra ', 'Martinez', 'mujer', 'sandraMartinez@gmail.com', 'Saber costos', 'Quiero saber ....', '0000-00-00'),
(2, 'prueba', 'prueba', 'hombre', 'prueba2@gmail.com', 'prueba', 'prueba2', '2020-11-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas`
--

CREATE TABLE `nominas` (
  `id_nomina` int(11) NOT NULL,
  `fecha_de` date DEFAULT NULL,
  `fecha_hasta` date DEFAULT NULL,
  `fk_usuario` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nominas`
--

INSERT INTO `nominas` (`id_nomina`, `fecha_de`, `fecha_hasta`, `fk_usuario`, `valor`) VALUES
(1, '2020-11-01', '2020-11-30', 1, 0),
(2, '2020-11-01', '2020-11-30', 2, 1100000),
(3, '2020-11-08', '2020-11-25', 5, 800000),
(4, '2020-11-03', '2020-11-19', 4, 1400000),
(5, '2020-11-08', '2020-11-23', 3, 1280000),
(6, '2020-11-17', '2020-12-11', 8, 1030000),
(7, '2020-11-01', '2020-12-11', 5, 1150000),
(8, '2020-11-15', '2020-12-11', 4, 725000),
(9, '2020-11-20', '2020-11-30', 7, 750000),
(10, '2020-11-22', '2020-12-22', 1, 920000),
(11, '2020-11-22', '2020-12-22', 1, 920000),
(16, '2020-11-22', '2020-12-22', 6, 1900000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(120) DEFAULT NULL,
  `descripcion_noticia` longtext DEFAULT NULL,
  `fecha_publicado` date DEFAULT NULL,
  `imagen_noticia` longtext DEFAULT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo_noticia`, `descripcion_noticia`, `fecha_publicado`, `imagen_noticia`, `fk_usuario`) VALUES
(1, 'conoce las recomendaciones que hacen los expertos para una desinfección óptima de tus espacios', 'A estas alturas de la pandemia, muchos de nosotros ya sabemos cómo lavarnos las manos correctamente y qué medidas debemos tomar para evitar el contagio, pero es muy probable que tengamos menos claro sobre la forma correcta de desinfectar las diversas superficies de nuestras casas o lugares de trabajo. \n\nA pesar de que hay mucha información sobre este tema, las empresas que prestan el servicio de desinfección conocen muy bien cuáles áreas de nuestro hogar y oficina necesitan más atención.\n\nEl objetivo de este post es contarte cuáles son estas áreas y las consideraciones que debes tener a la hora de limpiar y desinfectar diferentes zonas durante este tiempo de emergencia sanitaria. \n\nAlgo que debemos tener claro es que, de acuerdo a varios estudios, contraer el Covid-19 es imposible si estamos en casa, pues no hay evidencias que demuestran que las personas puedan contagiarse estando en sus hogares a menos, que alguien haya estado expuesto, tosa o esté cerca durante más de 15 minutos. El verdadero riesgo de enfermarse es salir a lugares públicos. \n\nCon esto claro, una limpieza y desinfección regular en la casa debería ser suficiente. La recomendación que hacen las empresas de servicio de desinfección y limpieza es prestar atención a las superficies de preparación de alimentos y otras superficies de alto contacto como: interruptores de luz, grifos, controles remotos, perillas, manijas de la puerta del refrigerador, microondas y el teclado del computador. \n\nEn el caso de las oficinas, esta limpieza tiene que hacerse con más frecuencia y prestando mucha más atención a las áreas comunes como baños, cocinas, pero sobre todo profundizar en lo que corresponde al computador, teléfonos, barandas, perillas de las puertas etc. ', '2020-10-05', 'assets/uploud/news/1601829005slider2.jpg', 7),
(2, '¿cuáles medidas de bioseguridad se están tomando en los conjuntos residenciales?', 'Con el paso de los días y el creciente aumento de contagios, las medidas de bioseguridad se han tenido que reforzar en los diferentes sectores de la sociedad, pues de no hacerlo las consecuencias podrían ser bastante graves. \n\nSi bien se ha establecido el lavado de manos cada 3 horas, el uso de tapabocas y el distanciamiento social, para proteger a las personas del virus y la propagación del mismo se han impuesto nuevas medidas de bioseguridad acordes al sector económico correspondiente. \n\nConstructoras, hospitales, domiciliarios tienen sus propias medidas de bioseguridad, pero qué pasa con los conjuntos residenciales, qué protocolos deben cumplir las empresas encargadas de la limpieza y mantenimiento de estos lugares donde interactúan tantas personas? \n\nLas directrices para la limpieza de las propiedades horizontales quedaron establecidas por medio de la Resolución 0666 del 24 de abril de 2020 del Ministerio de Salud y Protección Social y la Resolución 737 del 9 de mayo de 2020 del mismo Ministerio, en las que se adoptan un protocolo general de bioseguridad y un protocolo de bioseguridad en actividades empresariales y de apoyo.  \n\nCabe recordar que las recomendaciones estipuladas en estas resoluciones deben acatar el reglamento de propiedad horizontal impuestos en la Ley 675 de 2001. Así entonces, algunas medidas a tener en cuenta en conjuntos residenciales son.  \n\nLas zonas comunes no pueden ser utilizadas para violar la cuarentena.\nLos jardines de los conjuntos solo deben ser utilizados para pasear a las mascotas máximo 20 minutos.\nEl pico y género también rige dentro del conjunto y el uso del tapabocas.\nLas zonas comunes deben estar cerradas, gimnasios, saunas, piscinas, salones, entre otros.\nEn las zonas comunes también podrá poner comparendo la policía.\nAumentar la frecuencia de la limpieza y desinfección de pisos y ascensores, manijas, cerraduras de puertas, timbres, pasamanos de escaleras, citofonos, rejas y entradas principales.\nRestringir el acceso de personal de domicilios al conjunto residencial.\nAsimismo, el Ministerio recomienda que en edificios multifamiliares y conjuntos residenciales la administración y el consejo de administración deben reunirse con todo el personal de seguridad, servicios generales y proveedores para informar qué es el covd-19 y por qué se deben tomar medidas de bioseguridad. ', '2020-10-05', 'assets/uploud/news/1601830479slider3.jpg', 7),
(3, 'medidas de prevención: cómo proteger nuestro sistema inmunológico en tiempos de pandemia', 'La mejor manera de protegernos a nosotros mismos y a quienes nos rodean es informándonos y tomando medidas de prevención para evitar el contagio y propagación de enfermedades como el Covid-19. También es importante tener en cuenta los consejos del organismo de salud pública local, alcaldía o gobierno en una situación como la actual.\n\nEn el caso concreto del Covid-19, las medidas de prevención que se han adoptado a nivel mundial se centran en los siguientes puntos.\n\nLavarse las manos con frecuencia. Usar agua y jabón o desinfectante de manos a base de alcohol.\nMantenerse a una distancia segura de cualquier persona que tosa o estornude.\nNo tocarnos los ojos, la nariz o la boca.\nAl toser o estornudar, procurar cubrir la nariz y la boca con el codo flexionado o con un pañuelo.\nQuedarnos en casa si nos sentimos mal.\nSi tienes fiebre, tos y dificultad para respirar, solicita atención médica.\nSigue las instrucciones del organismo sanitario local.', '2020-10-05', 'assets/uploud/news/1601830624kelly-sikkema-DJcVOQUZxF0-unsplash.jpg', 7),
(4, 'en cualquier oficina desde el teléfono hasta los bolígrafos deben ser desinfectados', 'Limpieza y desinfección. Cuántos de nosotros no nos hemos preguntado cuáles son los lugares de la oficina con más gérmenes y bacterias. La mayoría respondería que el baño o la cocina por ser espacios comunales donde hay un constante movimiento de personas, cada uno con su patología y gérmenes. \n\nPero el más reciente estudio de la Universidad de Arizona, en el que se midieron los niveles de gérmenes en siete mil muestras de cuatro lugares de trabajo de Estados Unidos, ha revelado cifras que lo harán poner más atención a la limpieza y desinfección de otras áreas de la oficina. \n\nLa investigación que fue llevada a cabo por el  Dr. Charles P. Gerba y su equipo analizó diferentes superficies de las oficinas para descubrir cuáles eran las más contaminadas. También se midió la efectividad de desinfección diaria utilizando las toallas desinfectantes. \n\nEl resultado sorprenderá a más de uno, pues los elementos estudiados que contienen un alto nivel de gérmenes fueron: \n\nTeléfono.\nEscritorio.\nManija de la puerta del microondas.\nTeclado de computadores. \nManija de fuente de agua.\nEn contra de lo que todos creemos, los asientos de los inodoros fueron los menos contaminados de las 12 superficies testeadas por el equipo del Dr. Charles. En comparación con un escritorio, éste tuvo 400 veces más bacterias que un asiento de un inodoro. \n\nOtro dato interesante que reveló el estudio, fue que una apropiada limpieza y desinfección con toallas desinfectantes a estas superficies ayuda a prevenir la propagación de microorganismos que causan enfermedades. A esta conclusión llegaron los científicos, al darse cuenta que con el uso de estos paños en teléfonos, escritorios y teclados de computadores los niveles de gérmenes disminuyeron en más del 99%. Mientras que sin el uso de las toallas los niveles de bacterias aumentaron un promedio del 19 al 31% a lo largo de un día laboral típico.\n\nTambién te puede interesar: La importancia de mantener espacios comunes como baños y cocina aseados\nPor último la investigación concluyó que una buena limpieza y desinfección consta de eliminar gérmenes, huellas dactilares, residuos de alimentos, polvo, tinta y otros tipos de suciedad de las computadoras, monitores, teclados y teléfonos. De este modo se reducen los riesgos de contagiarse de alguna enfermedad, disminuye el ausentismo por incapacidad y los equipos de la oficina se mantienen por más tiempo. \n\n¿Qué otros elementos deben limpiarse?\nCon base al estudio de la Universidad de Arizona, es importante limpiar y desinfectar otros accesorios y elementos de la oficina para evitar enfermedades frecuentes como la gripe. \n\nRatón de computadora (mouse). El uso del ratón es tan frecuente como el del teclado, por lo que debe limpiarse regularmente, especialmente si se está recuperando de la gripe. Alguien puede acercarse para agarrar su mouse sin preguntar, y puede contaminar el mouse. Para asegurarnos de que esto no suceda lo más seguro es limpiarlo con un paño desinfectante.\n\nLápices y bolígrafos. Estas herramientas se limpian mejor con toallitas desinfectantes individualmente, ya que se sostienen y pasan por muchas manos. Las manos son grandes portadores de gérmenes y bacterias por lo que debemos procurar higienizarlos periódicamente. \n\nSillas. Muchas sillas de oficina tienen brazos que tocamos con nuestras manos cuando nos sentamos, nos paramos o tocamos el tambor durante el tiempo de inactividad. Compañeros de oficina pueden entrar y tomar prestada la silla y ya se está dando una transferencia de microorganismos. De ahí la importancia de mantener desinfectados los brazos (apoyabrazos) de las sillas.  \n\nSi consideramos todo lo que tocamos en un día normal de trabajo; limpiándonos la boca, la nariz, comiendo, estornudando, y luego tocamos la silla para pararnos, sentarnos, la empujamos dentro y fuera de nuestro escritorio, comprobamos que es uno de los lugares más sucios de la oficina, por lo que debe limpiarse y desinfectarse semanalmente. \n\nEn definitiva la limpieza y desinfección de una oficina no solo se enfoca en las superficies grandes, pues las más insignificantes son portadoras de grandes cantidades de gérmenes y bacterias que pueden ser perjudiciales para la salud de los trabajadores, por eso se debe poner más atención a los lugares anteriormente mencionados y así lograr una higienización óptima. \n\nSi necesitas de un servicio de limpieza y desinfección, Ladoinsa es tu mejor aliado. Nuestra experiencia en el sector es garantía de seguridad y calidad.', '2020-10-05', 'assets/uploud/news/1601830734noticia7.jpg', 7),
(5, 'manipulación y preparación de alimentos', 'Si bien en la actualidad no hay evidencia de que las personas pueden contagiarse a través de los alimentos, es posible que las personas se infecten al tocar una superficie u objeto contaminado por el virus y luego tocarse la cara.\n\nEl mayor riesgo proviene de estar en contacto cercano con otras personas mientras compramos alimentos o recibimos un domicilio. Como siempre, una buena higiene es importante cuando se manipulan alimentos para prevenir enfermedades transmitidas por los alimentos.\n\nPara ello debemos: \n\nRetirar cualquier embalaje innecesario y desecharlo en la caneca.\nRetirar los alimentos de las bolsas o empaques para llevar, colocarlos en un plato limpio.\nLos envases como latas se pueden limpiar con un desinfectante antes de abrirlos o almacenarlos.\nLavar frutas y verduras, con agua corriente.\nLavarse las manos con agua y jabón o usar un desinfectante para manos a base de alcohol, inmediatamente después de desempacar y guardar los alimentos.\nAl momento de preparar la cena o cualquier alimento aconsejamos, antes de todo, lavar las manos con agua y jabón por al menos 20 segundos. Usar tablas de cortar de manera separada; carnes y pescados crudos con una tabla y vegetales en otra. \n\nSi utilizamos una tabla de cortar o un cuchillo para cortar pollo crudo y luego lo volvemos a usar sin lavar para cortar tomates pueden contaminarse con los microbios del pollo. Además se debe tener cuidado con la contaminación dentro del refrigerador pues si hay jugos de carne que toquen productos que se comerán crudos, pueden contaminarse. \n\nSiempre que sea posible, mantengamos los productos perecederos refrigerados o congelados y prestemos atención a las fechas de vencimiento del producto. Procuremos reciclar o desechar los desperdicios y envases de alimentos de manera adecuada, evitando la acumulación de desechos que puedan atraer plagas.\n\nPor último, tenemos que lavarnos las manos con agua y jabón durante al menos 20 segundos antes de comer y asegurémonos de que nuestros hijos hagan lo mismo.\n\nEstas medidas de prevención aplican para cualquiera, pero quizás el personal de aseo puede beneficiarse más pues al igual que los médicos estas personas están más expuestas.\n\nGracias a la apertura gradual de algunos espacios públicos como centros comerciales, oficinas y entes gubernamentales, el personal de aseo no solo tiene la responsabilidad de protegerse sino de implementar todos los procesos de limpieza para proteger a las demás personas. \n\nPara este caso en particular el Gobierno ha establecido los lineamientos para que el personal de aseo entre otros, pueda realizar sus actividades sin poner su vida y la de los demás en peligro. \n\nEn líneas generales lo que estipulo el gobierno para que el personal de aseo pueda llevar a cabo sus actividades sin riesgo es haciendo un uso adecuado del tapabocas, lavado de manos y distanciamiento físico. También se deben fortalecer los procesos de limpieza y desinfección tanto del espacio de trabajo como de los elementos, insumos y equipos de uso cotidiano. Superficies y manejo de residuos producto de la actividad que se realice. \n\nAsimismo, se debe hacer uso adecuado de los EPP, optimizar la ventilación del lugar, usar guantes si se van a realizar actividades de aseo o si se van a manipular elementos como residuos. Para las demás actividades, los lineamientos establecidos por Minsalud determinan el lavado de manos con agua, jabón y toallas desechables.\n\nAyudar a que el covid-19 no siga cobrando vidas, está en nuestras manos, si analizamos las medidas de prevención que nos recomiendan no son tan difíciles de cumplir, pues con un poco de disciplina podremos ganarle la batalla a este virus que ha cambiado la vida de todos. \n\nSi quieres conocer más sobre consejos de limpieza y desinfección en esta época, te invitamos a entrar a nuestra página web para más tips y consejos. Pero, sí lo que estás buscando es ayuda en esta área en Ladoinsa ponemos a disposición de quienes lo soliciten nuestra experiencia en el servicio de aseo, limpieza, desinfección y mantenimiento, cumpliendo con las medidas de bioseguridad establecidas por el gobierno.\n\n', '2020-10-05', 'assets/uploud/news/1601830955slider1.jpg', 7),
(6, 'prácticas higiénicas: cursos básicos de manipulación de alimentos', 'En la actualidad las enfermedades transmitidas por los alimentos (ETA), que se presentan con mayor frecuencia son de carácter infeccioso o tóxico; y son consideradas un problema de salud pública. La contaminación de los alimentos puede ocurrir en cualquier punto de la cadena alimenticia, mediante una inadecuada manipulación de alimentos, favoreciendo la presencia de bacterias, virus, parásitos o sustancias químicas.\n\nDe acuerdo con la Organización Mundial de la Salud (OMS), cada año aproximadamente 600 millones de personas adquieren una enfermedad asociada al consumo de alimentos contaminados (1 de cada 10 habitantes), de los cuales 420.000 mueren por la misma causa. Asimismo, exponen que los niños menores de 5 años, representan el 40% de la cifra de individuos con ETA, con una mortalidad de 125.000 anualmente en este grupo de edad. \n\nPor otro lado, las infecciones diarreicas, son las que con mayor frecuencia se asocian a la ingesta de alimentos contaminados, con una morbilidad anualmente de 550 millones de personas y mortalidad de 230.000, a nivel mundial. No obstante, las enfermedades transmitidas por los alimentos incluyen hasta 200 enfermedades diferentes, desde intoxicaciones agudas hasta enfermedades crónicas, como el cáncer. \n\n¿En qué consiste la manipulación de alimentos? \nLa manipulación de alimentos es llevada a cabo por cualquier individuo que manipule de forma directa alimentos, equipos, utensilios o superficies, durante la preparación de los mismos. La introducción o presencia de un agente biológico o químico, materia extraña u otras sustancias tóxicas en los alimentos o medio alimentario, incrementa el riesgo de producir o transmitir enfermedades. \n\nLa adecuada manipulación de los alimentos a través de buenas prácticas higiene personal (lavado de manos, protección del cabello, aseo personal, aislamiento de heridas y mucosas, actitudes higiénicas), buenas prácticas agrícolas y buenas prácticas de manufactura, durante todas las fases de la cadena alimenticia, garantizan que la ingesta de alimentos no genere un efecto perjudicial sobre el estado de salud del consumidor. ', '2020-10-05', 'assets/uploud/news/1601831359evento0.jpg', 7),
(7, 'aseo industrial para un entorno saludable', 'Una buena limpieza y aseo industrial es fundamental en cualquier empresa, así como mantener un entorno de trabajo ordenado es un asunto que debe preocuparnos si somos dueños de una organización o trabajamos en una.\n\nMuchas veces evidenciamos cómo las compañías tratan de ahorrarse algo de dinero encargando esta tarea de cuidado a los empleados, pero es una equivocación, ya que se requiere de gran energía, pues se debe pasar por la limpieza de maquinaria y motores expuestos a ambientes grasos y suciedades fuertes.\n\nPor lo anterior, se necesita de personal técnico capacitado, tecnología, estar a la vanguardia en todas las técnicas de aseo, sanitización y mantenimiento en ámbitos laborales e industriales para lograr un aspecto físico y condiciones aptas durante el uso de un espacio en una organización, preservando siempre las instalaciones y la salud de los trabajadores, así como la salubridad en los productos que allí se desarrollan o almacenan.\n\nExisten muchos tipos de industrias: farmacéutica, pesquera, alimentaria, textil, metalúrgica, entre otras. En donde cada una tiene necesidades específicas. Así, el aseo industrial puede incluir diferentes servicios, a continuación mencionaremos algunos:\n\nLimpieza y aseo industrial de mantenimiento.\nLimpieza y aseo en profundidad para fábricas.\nLimpieza final de obra.\nServicios de limpieza de techos, paredes y conductos de ventilación.\nAseo y limpieza de oficinas, salas de espera y zonas de recepción.\nLimpieza en altura de cristales y ventanas.\nLimpieza de tuberías y canaletas.\nLimpieza de baños.\nLimpieza de maquinaria y cadenas de producción.\nLimpieza de frigoríficos y otras zonas de almacenaje.\nLimpieza y aseo de zonas de carga y descarga, de garajes y aparcamientos.\nSistemas de control de plagas y limpieza después de llevar a cabo esta tarea.\nTratamiento de residuos.\nIdentifiquemos algunas técnicas de limpieza y aseo industrial\nRealizar una limpieza en las empresas no siempre son las habituales. Algunas técnicas son un poco más complejas que otras, sin embargo, buscan controlar los factores ambientales que pueden afectar a la producción industrial y a la salubridad en el ámbito de trabajo.\n\n– Limpieza manual: esta es la limpieza que podemos llevar a cabo en cualquier instalación. Generalmente se realiza con cepillos, esponjas y trapos. Esta técnica se utiliza en la limpieza de baños, fracciones de suelo, limpieza de oficinas y en ocasiones se emplea para limpiar maquinaria muy grande y pesada en las que no es posible ni necesario desmontar para asear por piezas.\n\n– Agua a presión en industrias: consiste en inyectar un potente chorro de agua contra la zona o piezas que se quieren limpiar. Tenemos que hacerlo en un espacio adecuado puesto que toda la zona quedará mojada. Es preferible realizar la limpieza con agua a presión en exteriores donde encontremos desagües.\n\n– Limpieza con vapor seco: esta técnica consiste en aplicar un vapor que sólo contiene un 5% de agua sobre la zona que requiere una higienización. Desinfecta y limpia de forma ecológica, ya que no es necesario utilizar ningún químico adicional.\n\nAclaramos que puede limpiar con vapor seco cualquier superficie que soporte bien el calor.\n\n– Limpieza industrial por remojo o inmersión: esta técnica es eficiente para limpiar piezas pequeñas donde el aseo sería complicado de otra manera. Se puede realizar de forma manual, pero muchas empresas cuentan con instalaciones y maquinaria de limpieza industrial específicas para esta tarea.\n\n– Técnica de limpieza con espuma: existen espumas capaces de llegar a todos los espacios de una pieza o máquina. Esta se aplica sobre el objeto que se quiere limpiar y se deja actuar al menos 20 minutos. De esta manera se elimina la suciedad.\n\n– Limpieza con chorro de arena: se utiliza para limpiar algunas máquinas, pero sobre todo para la limpieza de fachadas. Consiste en la aplicación de arena a presión sobre las paredes para eliminar la primera capa de ésta, acabando así con la suciedad superficial. Resulta muy útil sobre todo en espacios donde las paredes se manchan fácilmente de humo y grasa.\n\n– Limpieza in situ: se emplea principalmente con aquella maquinaria de gran tamaño que no se puede desmontar. Esta técnica implica varias fases:\n\nEnjuagado inicial con agua.\nLavado con uno o dos detergentes.\nAclarado para eliminar los restos químicos y de suciedad.\nAplicación de productos específicos para la desinfección.\nAclarado final para dejar la maquinaria impecable.', '2020-10-05', 'assets/uploud/news/1601831457priscilla-du-preez-BuDD1HGco-4-unsplash.jpg', 7),
(8, 'Protocolo de bioseguridad y medidas para la apertura de establecimientos comerciales', 'Tras permanecer casi tres meses con las puertas de la mayoría de sus tiendas cerradas, los centros comerciales intentan volver a la normalidad a medida que se van flexibilizando las restricciones que se establecieron al inicio de la propagación de la pandemia. Por esta razón, dichos lugares han abierto al público bajo los protocolos obligatorios expedidos por el Ministerio de Salud, los cuales buscan que los visitantes corran el menor riesgo posible de contagio ante el COVID-19.\n\nProtocolos estrictos\nA través de la resolución 749 de 2020, expedida por el Ministerio de Salud, se indica que los centros comerciales deberán cumplir con varias medidas locativas para que se pueda dar apertura a sus instalaciones. “Garantizar áreas de lavado de manos con jabón líquido y toallas desechables, contar con dispensadores de alcohol glicerinado, por lo menos, en el 60% de las entradas a las instalaciones, para uso de trabajadores, visitantes y clientes, y señalar los puntos de espera para evitar la aproximación entre clientes”, son algunas de las medidas obligatorias para cada establecimiento.\n\nAdemás, en los parqueaderos habilitados se deberá mantener el distanciamiento de por lo menos dos metros entre cada vehículo. Por otra parte, se recomienda no usar, a menos que sea necesario, el ascensor y conservar la distancia cuando se usen las escaleras eléctricas. Finalmente, para las tiendas y locales comerciales no puede haber más de una persona por cada cinco metros cuadrados, ya que cada almacén deberá tener un aforo que no supere el 35%. Si esto sucede, quienes deseen ingresar deberán esperar afuera hasta que baje la cantidad de personas en el almacén.\n\nEn las áreas más concurridas, cada dos o tres horas se deberá llevar a cabo la desinfección por parte del personal que trabaje en el lugar.\n\nMedidas hacia los clientes\nEntre las medidas que resaltan, además del uso obligatorio del tapabocas, y que ya se están implementando en todos los centros comerciales, se encuentran la toma de temperatura al ingreso o mediante los parqueaderos, zona en la que solo podrá entrar una persona por vehículo. En las tiendas que se encuentran al interior también se deberá tomar la temperatura, desinfectar las manos de los clientes con gel antibacterial y hacer que las personas limpien la suela de sus zapatos en sus tapetes con desinfectantes.\n\nAfuera de cada almacén deberá haber marcaciones para quienes hagan fila, así mismo como en las cajas registradoras de cada almacén; además, los vestidores estarán restringidos en las tiendas de ropa. Las plazoletas de comida seguirán fuera de servicio, aunque usted se podrá acercar a los restaurantes y pedir la comida para llevarla a su casa.', '2020-10-04', 'assets/uploud/news/1601831714marcin-kempa-3sLosN6dPoQ-unsplash.jpg', 7),
(9, 'limpieza y aseo, herramientas de reactivación', 'Dentro del paulatino regreso a la nueva normalidad en medio de la pandemia originada por la Covid-\n\n19, los conceptos de desinfección y bioseguridad toman relevancia y han sido incluso reglamentados por el Gobierno Nacional y convertido en requisitos indispensables en la reactivación de la economía.\n\n“La implementación de medidas de higiene, limpieza y desinfección que permitan contar con un ambiente seguro para las personas en el lugar de trabajo por disminución del riesgo de contagio por el nuevo coronavirus no es negociable”, han insistido voceros gubernamentales, dejando claro que sin su cumplimiento un negocio, industria o empresa no puede volver a abrir sus puertas.\n\nLa adopción de esas medidas reduce los riesgos de corto plazo para los empleados y los de largo plazo para las empresas y la economía en general, por lo que hay que buscar el apoyo de expertos en el tema y el acompañamiento permanente de las autoridades para garantizar un ambiente que limite la sobrevivencia del virus y el contagio.\n\nY estos procesos, aseguran los expertos, lejos de ser temporales por las circunstancias que atraviesa el mundo, llegaron para quedarse, por lo que tanto los prestadores de este tipo de servicios como los empresarios y sus plantas de personal deben asumirlos de manera seria y al pie de la letra.\n\nDe acuerdo con la Organización Mundial de la Salud (OMS), la Covid-19 se transmite principalmente por contacto directo con las gotículas respiratorias (que se producen cuando una persona infectada tose o estornuda) y por contacto indirecto con superficies y objetos (donde reposan estas partículas potencialmente\n\ninfecciosas). Por esta razón, las medidas de limpieza y desinfección en los lugares de trabajo deben concentrarse de manera especial en las superficies de contacto que se toquen con mayor frecuencia (como manijas y mesas, entre otros), al ser puntos potenciales de contención ante una posible presencia del virus.\n\nPor ello, el Ministerio de Salud determina que los procesos de limpieza deben ir más allá de métodos tradicionales, como el agua y jabón, y concentrarse en las desinfecciones profundas de todo tipo de superficies y equipos, además de la ventilación de los espacios, el manejo de residuos y el uso obligatorio de elementos de protección.\n\nLa realización de estos protocolos es, asegura el ministro de Comercio, Industria y Turismo, José Manuel Restrepo, la herramienta para apoyar el resurgimiento de la economía y cuidar la salud de los colombianos.', '2020-10-05', 'assets/uploud/news/1601831879slider5jpg.jpg', 7),
(10, 'protocolos que salvan vidas', 'Según la Organización Mundial de la Salud (OMS), el concepto de Bioseguridad es un conjunto de normas y medidas para proteger la salud del personal, frente a riesgos biológicos, químicos y físicos a los que está expuesto en el desempeño de sus funciones, también a los pacientes y al medio ambiente.\n\nBajo esta premisa, y ante la reactivación de la economía luego del confinamiento que buscaba frenar la propagación de contagios por la Covid- 19, se han desarrollado protocolos de acompañamiento que permitan esas reaperturas de los sectores productivos en el mundo entero.\n\nDe acuerdo con el Ministerio de Salud, un protocolo de bioseguridad es un conjunto de normas y medidas de protección personal, de autocuidado y de protección hacia las demás personas, que deben ser aplicadas en diferentes actividades que se realizan en la vida cotidiana, en el ambiente laboral, escolar, etc., que se formulan con base en los riesgos de exposición a un determinado agente infeccioso y, que están orientados a minimizar  los factores que pueden generar la exposición al agente y su transmisión.\n\nEs así como a través de la Resolución 666, el Ministerio de Salud los estableció para mitigar, controlar y realizar un manejo adecuado de la pandemia en todos los sectores económicos del país, así como en actividades sociales y sectores de la administración pública.\n\nEl ámbito de aplicación de los protocolos de bioseguridad de dicha resolución comprende todos los empleadores y trabajadores del sector público y privado, aprendices, cooperativas o de pre cooperativas de trabajo asociado, afiliados partícipes, contratantes públicos y privados, contratistas vinculados mediante  contrato de prestación de servicios, de los diferentes sectores económicos, productivos y entidades gubernamentales que requieren desarrollar sus actividades durante el periodo de la emergencia sanitaria y las ARL.\n\nLa vigilancia y cumplimiento de los protocolos de bioseguridad de las actividades económicas, sociales y sectores de la administración pública complementarios a la Resolución 666 está a cargo de la Secretaría Municipal o Distrital o la entidad que haga sus veces, que corresponda a la actividad económica, social o al sector de la administración pública de acuerdo con la organización administrativa de cada entidad territorial municipal o distrital.\n\nPor su parte, la Organización para las Naciones Unidas (ONU) y el Ministerio de Comercio, Industria y Turismo, desarrollaron un completo protocolo de acompañamiento cuyo principal objetivo es asegurar que la reactivación industrial se realice aplicando las medidas posibles para la prevención del contagio con el fin de proteger la salud de los trabajadores, los clientes y la continuidad del negocio.\n\nEn él se establecen herramientas que se basan en buenas prácticas organizacionales y recomendaciones por las autoridades y entidades en materia de salud y comercio que, en su conjunto, buscan servir de apoyo a las organizaciones para la toma de decisiones en cuanto a los ajustes que se deben darse durante el proceso de reactivación.\n\nDicho protocolo se fundamenta en cuatro pilares con recomendaciones que pueden ser implementadas, considerando las áreas productivas, de gestión estratégica y de relación con sus partes interesadas, teniendo siempre como propósito central la protección de la salud de las personas durante la reactivación del negocio.\n\nPara la OMS, la pandemia es una crisis sanitaria que ocurre una vez cada cien años y cuyos efectos se dejarán sentir durante decenios, por lo cual, es clave mantener y aplicar los protocolos de bioseguridad como parte esencial de la vida diaria que trae la “nueva normalidad”, una vez iniciado el proceso de reapertura y reactivación de la producción en el país y el mundo entero. Es una herramienta para salvar vidas.', '2020-10-05', 'assets/uploud/news/1601831937noticia3.jpg', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id_tipo_documento`, `tipo_documento`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula de Extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_concepto`
--

CREATE TABLE `tipo_concepto` (
  `id_tipo_concepto` int(11) NOT NULL,
  `tipo_concepto` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_concepto`
--

INSERT INTO `tipo_concepto` (`id_tipo_concepto`, `tipo_concepto`) VALUES
(1, 'Aportes Salud Empleado'),
(2, 'Aportes Pension Empleado'),
(3, 'Salario Ordinario'),
(4, 'Subsidio Transporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id_tipo_contrato` int(11) NOT NULL,
  `tipo_contrato` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id_tipo_contrato`, `tipo_contrato`) VALUES
(1, 'Contrato indefinido'),
(2, 'Contrato temporal'),
(3, 'Contrato para la formación y el aprendizaje'),
(4, 'Contrato en prácticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `salario` varchar(20) DEFAULT NULL,
  `clave` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_usuario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numero_documento` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_rol` int(11) NOT NULL,
  `fk_cargo` int(11) NOT NULL,
  `fk_tipo_documento` int(11) NOT NULL,
  `fk_tipo_contrato` int(11) NOT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `correo`, `salario`, `clave`, `img_usuario`, `numero_documento`, `fk_rol`, `fk_cargo`, `fk_tipo_documento`, `fk_tipo_contrato`, `token`, `created_at`, `updated_at`) VALUES
(1, 'david andres', 'hernandez juajinoy', 'david22@mail.com', '1000000', '$2y$10$JINdIZaBYksMm3UVfdw2wu7Q0QoXBlYdxqzUergrYiQKCQq99ZVia', 'assets/uploud/profile/default.svg', '1000232828', 1, 1, 1, 2, '$2a$07$Da22vidJuAjiNoYyZlXGhua38uHc48bGoC5zxnN3LfexCu22qV6.i', '2020-09-20', '2020-11-24'),
(2, 'fabian ricardo', 'aldana garay', 'fabian@mail.com', '1000000', '$2y$10$gJwdz8k2lXxgAe0uAf2v0.GTYLtOL89UbdZQJMEVPJHuRFlO1V4BS', 'assets/uploud/profile/default.svg', '1233905589', 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhunYyXVZ1lVA7pBzaZUSmqTBlz621Aeme', '2020-09-23', '2020-09-23'),
(3, 'dashell alexander', 'carrero fuentes', 'dashel@mail.com', '1000000', '$2y$10$SqQk2oahlcx1oa29W1nmRufafqyZwi54T8NKmljBc6ofTz0t.g9M6', 'assets/uploud/profile/default.svg', '1018516607', 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhu8sX/l5I13uTBMdSAsYrz4b88PO6B/72', '2020-09-23', '2020-09-23'),
(4, 'andres felipe', 'chacon cifuentes', 'andres@mail.com', '1000000', '$2y$10$bd/oXVxVJj.cw58jECgwp.Tsfa9pdZIo/S8TlKcIEX/9x0tV3g5Ei', 'assets/uploud/profile/default.svg', '1005813772', 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhuspify4MH6zZ5zPJcZoW84yUdlw9eSnm', '2020-09-23', '2020-09-23'),
(5, 'vanesa', 'vega santa', 'vanesa@mail.com', '1000000', '$2y$10$1t/ND7gnTzLpxn1MWUbboOgLO4tji6rRUdwwaXsR6TuHhke8SCsY2', 'assets/uploud/profile/default.svg', '1006093649', 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhuZKRrFl7EKnNfTHoMhZjN6JcFEFWwThS', '2020-09-23', '2020-09-23'),
(6, 'jhon alexander', 'ramos vides', 'alex@mail.com', '1000000', '$2y$10$a6lhpwQLCF2akcv4QpCMze3eIlVivXxKYmKFEx8o2VCl.Pdy3rmai', 'assets/uploud/profile/default.svg', '1233890166', 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhuvwi5OH4NMElrfPb0eq.h7XsWf2KpW1q', '2020-09-23', '2020-09-23'),
(7, 'andres', 'hernandez juajinoy', 'david@mail.com', '1000000', '$2y$10$9v5f6o2WKaZQwiS6UGfbFOc6/HYqMAOQ4FC8ErXtEl.KOVl/tvBze', 'assets/uploud/profile/default.svg', '1234567891', 2, 1, 1, 2, '$2a$07$Da22vidJuAjiNoYyZlXGhuzukPrxgTrWdtfNWwNTqBCOOPZ7Tf1e6', '2020-10-04', '2020-11-21'),
(8, 'prueba', 'prueba', 'prueba@gmial.com', '1000000', '$2y$10$LzxRP8Upw5on1HSwQnr74eVspJKgbztxRankNoo9IjOZ4k9A6kwt6', 'assets/uploud/profile/default.svg', '1233455744', 1, 1, 1, 2, '$2a$07$Da22vidJuAjiNoYyZlXGhuHHPizBYgBZ07PK.eCM6NRM1mhdWlr/y', '2020-11-05', '2020-11-05'),
(9, 'pruebass', 'pruebass', 'prueba2@gmail.com', '111111', '$2y$10$LYhApoRtqgp2EFOwUrwqPOu8trzDiuNzYF2zxUKfqa6V93qYKB4K2', 'assets/uploud/profile/default.svg', '1234567911', 1, 1, 1, 1, '$2a$07$Da22vidJuAjiNoYyZlXGhuun2YEhq1fcFW/Ccn8eD91vJ1727iLpC', '2020-11-07', '2020-11-07'),
(10, 'preu', 'xds', 'dss@maill.com', '1111111111', '$2y$10$7FYYap4J6tAaxSq6uVE.nO62oTb.5Arigf5WY7stdQ9ZRV4IHOGQO', 'assets/uploud/profile/default.svg', '1111111111', 1, 1, 1, 4, '$2a$07$Da22vidJuAjiNoYyZlXGhuG1jYI3LLHff8p9jbehnhkXK4cB8Ygr2', '2020-11-07', '2020-11-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento_contable`
--
ALTER TABLE `asiento_contable`
  ADD PRIMARY KEY (`id_asiento_contable`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id_concepto`),
  ADD KEY `fk_tipo_concepto` (`fk_tipo_concepto`),
  ADD KEY `fk_nomina` (`fk_nomina`),
  ADD KEY `fk_asiento_contable` (`fk_asiento_contable`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `logs_contactenos`
--
ALTER TABLE `logs_contactenos`
  ADD PRIMARY KEY (`id_log_contactenos`);

--
-- Indices de la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD PRIMARY KEY (`id_nomina`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_concepto`
--
ALTER TABLE `tipo_concepto`
  ADD PRIMARY KEY (`id_tipo_concepto`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id_tipo_contrato`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_rol` (`fk_rol`),
  ADD KEY `fk_cargo` (`fk_cargo`),
  ADD KEY `fk_tipo_documento` (`fk_tipo_documento`),
  ADD KEY `fk_tipo_contrato` (`fk_tipo_contrato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento_contable`
--
ALTER TABLE `asiento_contable`
  MODIFY `id_asiento_contable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `logs_contactenos`
--
ALTER TABLE `logs_contactenos`
  MODIFY `id_log_contactenos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nominas`
--
ALTER TABLE `nominas`
  MODIFY `id_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_concepto`
--
ALTER TABLE `tipo_concepto`
  MODIFY `id_tipo_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id_tipo_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD CONSTRAINT `conceptos_ibfk_1` FOREIGN KEY (`fk_tipo_concepto`) REFERENCES `tipo_concepto` (`id_tipo_concepto`),
  ADD CONSTRAINT `conceptos_ibfk_2` FOREIGN KEY (`fk_nomina`) REFERENCES `nominas` (`id_nomina`),
  ADD CONSTRAINT `conceptos_ibfk_3` FOREIGN KEY (`fk_asiento_contable`) REFERENCES `asiento_contable` (`id_asiento_contable`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD CONSTRAINT `nominas_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`fk_cargo`) REFERENCES `cargos` (`id_cargo`),
  ADD CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`fk_tipo_documento`) REFERENCES `tipos_documentos` (`id_tipo_documento`),
  ADD CONSTRAINT `usuarios_ibfk_6` FOREIGN KEY (`fk_tipo_contrato`) REFERENCES `tipo_contrato` (`id_tipo_contrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
