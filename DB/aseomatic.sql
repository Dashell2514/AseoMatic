-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2021 a las 22:49:38
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `databaseaseomatic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounting_entry`
--

CREATE TABLE `accounting_entry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accounting_entry`
--

INSERT INTO `accounting_entry` (`id`, `name`) VALUES
(1, 'Devengado'),
(2, 'Deducido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `charges`
--

INSERT INTO `charges` (`id`, `name`) VALUES
(1, 'Desarrollador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepts`
--

CREATE TABLE `concepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `value` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concepts_id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `accounting_entry_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `concepts`
--

INSERT INTO `concepts` (`id`, `description`, `status`, `value`, `concepts_id`, `payroll_id`, `accounting_entry_id`) VALUES
(1, 'Cuota de sostenimiento', 2, '681394', 3, 1, 1),
(2, 'Auxilio de transporte', 2, '106454', 4, 1, 1),
(3, 'Cuota de sostenimiento', 1, '681394', 3, 2, 1),
(4, 'Auxilio de transporte', 1, '106454', 4, 2, 1),
(5, 'Cuota de sostenimiento', 1, '681394', 3, 3, 1),
(6, 'Auxilio de transporte', 1, '106454', 4, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`) VALUES
(1, 'Contrato Indefinido'),
(2, 'Contrato Temporal'),
(3, 'Contrato Para La Formación Y El Aprendizaje'),
(4, 'Contrato En Prácticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `document_types`
--

INSERT INTO `document_types` (`id`, `name`) VALUES
(1, 'Cédula De Ciudadania'),
(2, 'Tarjeta De Identidad'),
(3, 'Cédula De Extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'servicio aseo party', '<p>Limpiamos... Si después de un evento, fiesta o celebración está desordenado y sucio, llámenos, limpiamos y ordenamos por usted. Somos una empresa dedicada a dar una solución con el objetivo que nuestros clientes puedan disfrutar al máximo su momento de esparcimiento sin la preocupación de tener que limpiar después. </p><p>Ofrecemos: Aspirado Profundo de Suciedad en Superficies Lavado y Sellado de toda clase de Pisos Limpieza y Desinfección en Baños y Cocina Aspirado y desmanchado de Alfombras Recolección de Basura Sanitizado con Luces UV Limpieza de Vidrios Bajos y en Altura Entregando Aseo Integral de Calidad</p>', 'assets/uploud/events/1601832644evento1.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(2, 'capacitación en técnicas de supervisión de aseo', '<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>', 'assets/uploud/events/1601833437noticia0.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(3, 'capacitación en técnicas de supervisión de aseo 1', '<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>', 'assets/uploud/events/1601833437noticia0.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(4, 'capacitación en técnicas de supervisión de aseo 2', '<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>', 'assets/uploud/events/1601833437noticia0.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(5, 'capacitación en técnicas de supervisión de aseo 3', '<p>El próximo 5 de octubre inicia una nueva etapa de capacitación en Técnicas de Supervisión de Aseo en modalidad virtual. No pierdas la oportunidad de mejorar tus habilidades.</p>', 'assets/uploud/events/1601833437noticia0.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_contact`
--

CREATE TABLE `logs_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_27_011603_create_log_contact_table', 1),
(2, '2021_05_27_013215_create_document_types_table', 1),
(3, '2021_05_27_014002_create_role_table', 1),
(4, '2021_05_27_014417_create_contract_types_table', 1),
(5, '2021_05_27_015209_create_charges_table', 1),
(6, '2021_05_27_015349_create_users_table', 1),
(7, '2021_05_27_022125_create_news_table', 1),
(8, '2021_05_27_022708_create_events_table', 1),
(9, '2021_05_27_023528_create_payrolls_table', 1),
(10, '2021_05_27_024458_create_types_concepts_table', 1),
(11, '2021_05_27_025922_create_accounting_entry_table', 1),
(12, '2021_05_27_026857_create_concepts_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'aseo industrial para un entorno saludable', '<p>Una buena limpieza y aseo industrial es fundamental en cualquier empresa, así como mantener un entorno de trabajo ordenado es un asunto que debe preocuparnos si somos dueños de una organización o trabajamos en una. Muchas veces evidenciamos cómo las compañías tratan de ahorrarse algo de dinero encargando esta tarea de cuidado a los empleados, pero es una equivocación, ya que se requiere de gran energía, pues se debe pasar por la limpieza de maquinaria y motores expuestos a ambientes grasos y suciedades fuertes. Por lo anterior, se necesita de personal técnico capacitado, tecnología, estar a la vanguardia en todas las técnicas de aseo, sanitización y mantenimiento en ámbitos laborales e industriales para lograr un aspecto físico y condiciones aptas durante el uso de un espacio en una organización, preservando siempre las instalaciones y la salud de los trabajadores, así como la salubridad en los productos que allí se desarrollan o almacenan.</p><p><br></p><p>Existen muchos tipos de industrias: farmacéutica, pesquera, alimentaria, textil, metalúrgica, entre otras. En donde cada una tiene necesidades específicas. Así, el aseo industrial puede incluir diferentes servicios, a continuación mencionaremos algunos: Limpieza y aseo industrial de mantenimiento. Limpieza y aseo en profundidad para fábricas. Limpieza final de obra. Servicios de limpieza de techos, paredes y conductos de ventilación. Aseo y limpieza de oficinas, salas de espera y zonas de recepción. Limpieza en altura de cristales y ventanas. Limpieza de tuberías y canaletas. Limpieza de baños. Limpieza de maquinaria y cadenas de producción. Limpieza de frigoríficos y otras zonas de almacenaje. Limpieza y aseo de zonas de carga y descarga, de garajes y aparcamientos. Sistemas de control de plagas y limpieza después de llevar a cabo esta tarea. Tratamiento de residuos. Identifiquemos algunas técnicas de limpieza y aseo industrial Realizar una limpieza en las empresas no siempre son las habituales. Algunas técnicas son un poco más complejas que otras, sin embargo, buscan controlar los factores ambientales que pueden afectar a la producción industrial y a la salubridad en el ámbito de trabajo. </p><p><strong>– Limpieza manual:</strong> esta es la limpieza que podemos llevar a cabo en cualquier instalación. Generalmente se realiza con cepillos, esponjas y trapos. Esta técnica se utiliza en la limpieza de baños, fracciones de suelo, limpieza de oficinas y en ocasiones se emplea para limpiar maquinaria muy grande y pesada en las que no es posible ni necesario desmontar para asear por piezas. </p><p><strong>– Agua a presión en industrias:</strong> consiste en inyectar un potente chorro de agua contra la zona o piezas que se quieren limpiar. Tenemos que hacerlo en un espacio adecuado puesto que toda la zona quedará mojada. Es preferible realizar la limpieza con agua a presión en exteriores donde encontremos desagües. </p><p><strong>– Limpieza con vapor seco:</strong> esta técnica consiste en aplicar un vapor que sólo contiene un 5% de agua sobre la zona que requiere una higienización. Desinfecta y limpia de forma ecológica, ya que no es necesario utilizar ningún químico adicional. Aclaramos que puede limpiar con vapor seco cualquier superficie que soporte bien el calor. – Limpieza industrial por remojo o inmersión: esta técnica es eficiente para limpiar piezas pequeñas donde el aseo sería complicado de otra manera. Se puede realizar de forma manual, pero muchas empresas cuentan con instalaciones y maquinaria de limpieza industrial específicas para esta tarea.</p><p><strong>– Técnica de limpieza con espuma:</strong> existen espumas capaces de llegar a todos los espacios de una pieza o máquina. Esta se aplica sobre el objeto que se quiere limpiar y se deja actuar al menos 20 minutos. De esta manera se elimina la suciedad.</p><p><strong>– Limpieza con chorro de arena: </strong>se utiliza para limpiar algunas máquinas, pero sobre todo para la limpieza de fachadas. Consiste en la aplicación de arena a presión sobre las paredes para eliminar la primera capa de ésta, acabando así con la suciedad superficial. Resulta muy útil sobre todo en espacios donde las paredes se manchan fácilmente de humo y grasa.</p><p><strong>– Limpieza in situ:</strong> se emplea principalmente con aquella maquinaria de gran tamaño que no se puede desmontar. Esta técnica implica varias fases: Enjuagado inicial con agua. Lavado con uno o dos detergentes. Aclarado para eliminar los restos químicos y de suciedad. Aplicación de productos específicos para la desinfección. Aclarado final para dejar la maquinaria impecable.</p>', 'assets/uploud/news/1601831457priscilla-du-preez-BuDD1HGco-4-unsplash.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(2, 'conoce las recomendaciones que hacen los expertos para una desinfección óptima de tus espacios', '<p>A estas alturas de la pandemia, muchos de nosotros ya sabemos cómo lavarnos las manos correctamente y qué medidas debemos tomar para evitar el contagio, pero es muy probable que tengamos menos claro sobre la forma correcta de desinfectar las diversas superficies de nuestras casas o lugares de trabajo.</p><p>A pesar de que hay mucha información sobre este tema, las empresas que prestan el servicio de desinfección conocen muy bien cuáles áreas de nuestro hogar y oficina necesitan más atención.</p><p>El objetivo de este post es contarte cuáles son estas áreas y las consideraciones que debes tener a la hora de limpiar y desinfectar diferentes zonas durante este tiempo de emergencia sanitaria. Algo que debemos tener claro es que, de acuerdo a varios estudios, contraer el Covid-19 es imposible si estamos en casa, pues no hay evidencias que demuestran que las personas puedan contagiarse estando en sus hogares a menos, que alguien haya estado expuesto, tosa o esté cerca durante más de 15 minutos. El verdadero riesgo de enfermarse es salir a lugares públicos. </p><p>Con esto claro, una limpieza y desinfección regular en la casa debería ser suficiente. La recomendación que hacen las empresas de servicio de desinfección y limpieza es prestar atención a las superficies de preparación de alimentos y otras superficies de alto contacto como: interruptores de luz, grifos, controles remotos, perillas, manijas de la puerta del refrigerador, microondas y el teclado del computador. </p><p>En el caso de las oficinas, esta limpieza tiene que hacerse con más frecuencia y prestando mucha más atención a las áreas comunes como baños, cocinas, pero sobre todo profundizar en lo que corresponde al computador, teléfonos, barandas, perillas de las puertas etc.</p>', 'assets/uploud/news/1601829005slider2.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(3, '¿cuáles medidas de bioseguridad se están tomando en los conjuntos residenciales?', '<p>Con el paso de los días y el creciente aumento de contagios, las medidas de bioseguridad se han tenido que reforzar en los diferentes sectores de la sociedad, pues de no hacerlo las consecuencias podrían ser bastante graves. Si bien se ha establecido el lavado de manos cada 3 horas, el uso de tapabocas y el distanciamiento social, para proteger a las personas del virus y la propagación del mismo se han impuesto nuevas medidas de bioseguridad acordes al sector económico correspondiente. Constructoras, hospitales, domiciliarios tienen sus propias medidas de bioseguridad, pero qué pasa con los conjuntos residenciales, qué protocolos deben cumplir las empresas encargadas de la limpieza y mantenimiento de estos lugares donde interactúan tantas personas? Las directrices para la limpieza de las propiedades horizontales quedaron establecidas por medio de la Resolución 0666 del 24 de abril de 2020 del Ministerio de Salud y Protección Social y la Resolución 737 del 9 de mayo de 2020 del mismo Ministerio, en las que se adoptan un protocolo general de bioseguridad y un protocolo de bioseguridad en actividades empresariales y de apoyo. </p><p><br></p><p>Cabe recordar que las recomendaciones estipuladas en estas resoluciones deben acatar el reglamento de propiedad horizontal impuestos en la Ley 675 de 2001. Así entonces, algunas medidas a tener en cuenta en conjuntos residenciales son. Las zonas comunes no pueden ser utilizadas para violar la cuarentena.</p><p><br></p><p>Los jardines de los conjuntos solo deben ser utilizados para pasear a las mascotas máximo 20 minutos. El pico y género también rige dentro del conjunto y el uso del tapabocas. Las zonas comunes deben estar cerradas, gimnasios, saunas, piscinas, salones, entre otros.</p><p>En las zonas comunes también podrá poner comparendo la policía. Aumentar la frecuencia de la limpieza y desinfección de pisos y ascensores, manijas, cerraduras de puertas, timbres, pasamanos de escaleras, citófonos, rejas y entradas principales.</p><p><br></p><p>Restringir el acceso de personal de domicilios al conjunto residencial. Asimismo, el Ministerio recomienda que en edificios multifamiliares y conjuntos residenciales la administración y el consejo de administración deben reunirse con todo el personal de seguridad, servicios generales y proveedores para informar qué es el covd-19 y por qué se deben tomar medidas de bioseguridad.</p>', 'assets/uploud/news/1601830479slider3.jpg', '2021-06-20 01:44:34', '2021-06-20 01:44:34', 1),
(4, 'protocolos que salvan vidas', '<p>Según la Organización Mundial de la Salud (OMS), el concepto de Bioseguridad es un conjunto de normas y medidas para proteger la salud del personal, frente a riesgos biológicos, químicos y físicos a los que está expuesto en el desempeño de sus funciones, también a los pacientes y al medio ambiente. Bajo esta premisa, y ante la reactivación de la economía luego del confinamiento que buscaba frenar la propagación de contagios por la Covid- 19, se han desarrollado protocolos de acompañamiento que permitan esas reaperturas de los sectores productivos en el mundo entero.</p><p> </p><p>De acuerdo con el Ministerio de Salud, un protocolo de bioseguridad es un conjunto de normas y medidas de protección personal, de autocuidado y de protección hacia las demás personas, que deben ser aplicadas en diferentes actividades que se realizan en la vida cotidiana, en el ambiente laboral, escolar, etc., que se formulan con base en los riesgos de exposición a un determinado agente infeccioso y, que están orientados a minimizar los factores que pueden generar la exposición al agente y su transmisión. Es así como a través de la Resolución 666, el Ministerio de Salud los estableció para mitigar, controlar y realizar un manejo adecuado de la pandemia en todos los sectores económicos del país, así como en actividades sociales y sectores de la administración pública. </p><p><br></p><p>El ámbito de aplicación de los protocolos de bioseguridad de dicha resolución comprende todos los empleadores y trabajadores del sector público y privado, aprendices, cooperativas o de pre cooperativas de trabajo asociado, afiliados partícipes, contratantes públicos y privados, contratistas vinculados mediante contrato de prestación de servicios, de los diferentes sectores económicos, productivos y entidades gubernamentales que requieren desarrollar sus actividades durante el periodo de la emergencia sanitaria y las ARL. </p><p><br></p><p>La vigilancia y cumplimiento de los protocolos de bioseguridad de las actividades económicas, sociales y sectores de la administración pública complementarios a la Resolución 666 está a cargo de la Secretaría Municipal o Distrital o la entidad que haga sus veces, que corresponda a la actividad económica, social o al sector de la administración pública de acuerdo con la organización administrativa de cada entidad territorial municipal o distrital. Por su parte, la Organización para las Naciones Unidas (ONU) y el Ministerio de Comercio, Industria y Turismo, desarrollaron un completo protocolo de acompañamiento cuyo principal objetivo es asegurar que la reactivación industrial se realice aplicando las medidas posibles para la prevención del contagio con el fin de proteger la salud de los trabajadores, los clientes y la continuidad del negocio. </p><p><br></p><p>En él se establecen herramientas que se basan en buenas prácticas organizacionales y recomendaciones por las autoridades y entidades en materia de salud y comercio que, en su conjunto, buscan servir de apoyo a las organizaciones para la toma de decisiones en cuanto a los ajustes que se deben darse durante el proceso de reactivación. Dicho protocolo se fundamenta en cuatro pilares con recomendaciones que pueden ser implementadas, considerando las áreas productivas, de gestión estratégica y de relación con sus partes interesadas, teniendo siempre como propósito central la protección de la salud de las personas durante la reactivación del negocio. </p><p><br></p><p>Para la OMS, la pandemia es una crisis sanitaria que ocurre una vez cada cien años y cuyos efectos se dejarán sentir durante decenios, por lo cual, es clave mantener y aplicar los protocolos de bioseguridad como parte esencial de la vida diaria que trae la “nueva normalidad”, una vez iniciado el proceso de reapertura y reactivación de la producción en el país y el mundo entero. Es una herramienta para salvar vidas.</p>', 'assets/uploud/news/1601831937noticia3.jpg', '2021-06-20 01:44:35', '2021-06-20 01:44:35', 1),
(5, 'prácticas higiénicas: cursos básicos de manipulación de alimentos', ' <p>En la actualidad las enfermedades transmitidas por los alimentos (ETA), que se presentan con mayor frecuencia son de carácter infeccioso o tóxico; y son consideradas un problema de salud pública.</p><p><br></p><p>La contaminación de los alimentos puede ocurrir en cualquier punto de la cadena alimenticia, mediante una inadecuada manipulación de alimentos, favoreciendo la presencia de bacterias, virus, parásitos o sustancias químicas. De acuerdo con la Organización Mundial de la Salud (OMS), cada año aproximadamente 600 millones de personas adquieren una enfermedad asociada al consumo de alimentos contaminados (1 de cada 10 habitantes), de los cuales 420.000 mueren por la misma causa. Asimismo, exponen que los niños menores de 5 años, representan el 40% de la cifra de individuos con ETA, con una mortalidad de 125.000 anualmente en este grupo de edad. Por otro lado, las infecciones diarreicas, son las que con mayor frecuencia se asocian a la ingesta de alimentos contaminados, con una morbilidad anualmente de 550 millones de personas y mortalidad de 230.000, a nivel mundial. No obstante, las enfermedades transmitidas por los alimentos incluyen hasta 200 enfermedades diferentes, desde intoxicaciones agudas hasta enfermedades crónicas, como el cáncer. ¿En qué consiste la manipulación de alimentos? La manipulación de alimentos es llevada a cabo por cualquier individuo que manipule de forma directa alimentos, equipos, utensilios o superficies, durante la preparación de los mismos. </p><p><br></p><p>La introducción o presencia de un agente biológico o químico, materia extraña u otras sustancias tóxicas en los alimentos o medio alimentario, incrementa el riesgo de producir o transmitir enfermedades. </p><p><br></p><p>La adecuada manipulación de los alimentos a través de buenas prácticas higiene personal (lavado de manos, protección del cabello, aseo personal, aislamiento de heridas y mucosas, actitudes higiénicas), buenas prácticas agrícolas y buenas prácticas de manufactura, durante todas las fases de la cadena alimenticia, garantizan que la ingesta de alimentos no genere un efecto perjudicial sobre el estado de salud del consumidor.</p>', 'assets/uploud/news/1601831359evento0.jpg', '2021-06-20 01:44:35', '2021-06-20 01:44:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `initial_date` date NOT NULL,
  `final_date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `salary` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payrolls`
--

INSERT INTO `payrolls` (`id`, `initial_date`, `final_date`, `user_id`, `salary`, `status`) VALUES
(1, '2021-04-01', '2021-04-30', 5, '787848', 2),
(2, '2021-04-01', '2021-04-30', 5, '787848', 1),
(3, '2021-05-01', '2021-05-30', 5, '787848', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types_concepts`
--

CREATE TABLE `types_concepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types_concepts`
--

INSERT INTO `types_concepts` (`id`, `name`) VALUES
(1, 'Aportes Salud Empleado'),
(2, 'Aportes Pension Empleado'),
(3, 'Salario Ordinario'),
(4, 'Subsidio Transporte'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `charges_id` bigint(20) UNSIGNED NOT NULL,
  `document_type_id` bigint(20) UNSIGNED NOT NULL,
  `contract_type_id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `salary`, `password`, `image`, `document_number`, `status`, `role_id`, `charges_id`, `document_type_id`, `contract_type_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'david andrés', 'hernández juajinoy', 'david22@mail.com', '1000000', '$2y$10$JINdIZaBYksMm3UVfdw2wu7Q0QoXBlYdxqzUergrYiQKCQq99ZVia', 'assets/uploud/profile/default.svg', '1000323929', 1, 1, 1, 1, 2, '$2a$07$Da22vidJuAjiNoYyZlXGhuSLjS9SNutCPEzlf5Waqwe758AMlqzQu', '2021-06-20 01:44:33', '2021-06-20 01:44:33'),
(2, 'fabian ricardo', 'aldana garay', 'fabian@mail.com', '1000000', '$2y$10$gJwdz8k2lXxgAe0uAf2v0.GTYLtOL89UbdZQJMEVPJHuRFlO1V4BS', 'assets/uploud/profile/default.svg', '1233905589', 1, 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhunYyXVZ1lVA7pBzaZUSmqTBlz621Aeme', '2021-06-20 01:44:34', '2021-06-20 01:44:34'),
(3, 'dashell alexander', 'carrero fuentes', 'dashel@mail.com', '1000000', '$2y$10$fYVqLhr7EMVE01jdAZPpB.ptO.agGsPDO/LOUIuBeN3sP7Mavc.NC', 'assets/uploud/profile/default.svg', '1018516607', 1, 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhu8sX/l5I13uTBMdSAsYrz4b88PO6B/72', '2021-06-20 01:44:34', '2021-06-20 01:44:34'),
(4, 'vanesa', 'vega santa', 'vanesa@mail.com', '1000000', '$2y$10$1t/ND7gnTzLpxn1MWUbboOgLO4tji6rRUdwwaXsR6TuHhke8SCsY2', 'assets/uploud/profile/default.svg', '1006093649', 1, 1, 1, 1, 3, '$2a$07$Da22vidJuAjiNoYyZlXGhuZKRrFl7EKnNfTHoMhZjN6JcFEFWwThS', '2021-06-20 01:44:34', '2021-06-20 01:44:34'),
(5, 'andres', 'hernandez juajinoy', 'david@mail.com', '1000000', '$2y$10$8EzP/K3s7v1.rFZnOjaAsOWfYKat0S5AG74AcuVkfAH0a6EIpeCmK', 'assets/uploud/profile/default.svg', '1234567891', 1, 2, 1, 1, 2, '$2a$07$Da22vidJuAjiNoYyZlXGhuzukPrxgTrWdtfNWwNTqBCOOPZ7Tf1e6', '2021-06-20 01:44:34', '2021-06-20 01:44:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounting_entry`
--
ALTER TABLE `accounting_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concepts`
--
ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concepts_concepts_id_foreign` (`concepts_id`),
  ADD KEY `concepts_payroll_id_foreign` (`payroll_id`),
  ADD KEY `concepts_accounting_entry_id_foreign` (`accounting_entry_id`);

--
-- Indices de la tabla `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `logs_contact`
--
ALTER TABLE `logs_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types_concepts`
--
ALTER TABLE `types_concepts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_charges_id_foreign` (`charges_id`),
  ADD KEY `users_document_type_id_foreign` (`document_type_id`),
  ADD KEY `users_contract_type_id_foreign` (`contract_type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounting_entry`
--
ALTER TABLE `accounting_entry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `logs_contact`
--
ALTER TABLE `logs_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `types_concepts`
--
ALTER TABLE `types_concepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concepts`
--
ALTER TABLE `concepts`
  ADD CONSTRAINT `concepts_accounting_entry_id_foreign` FOREIGN KEY (`accounting_entry_id`) REFERENCES `accounting_entry` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `concepts_concepts_id_foreign` FOREIGN KEY (`concepts_id`) REFERENCES `types_concepts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `concepts_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_charges_id_foreign` FOREIGN KEY (`charges_id`) REFERENCES `charges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_contract_type_id_foreign` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
