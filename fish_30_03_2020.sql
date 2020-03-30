-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-03-2020 a las 15:20:18
-- Versión del servidor: 10.2.31-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `andescod_transfactor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contacto_personal` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `plazo_pago` int(2) DEFAULT NULL,
  `giro` varchar(150) DEFAULT NULL,
  `comuna_factura` varchar(150) DEFAULT NULL,
  `dte_email` varchar(50) DEFAULT NULL,
  `ciudad_factura` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `rut`, `razon_social`, `email`, `telefono`, `contacto_personal`, `direccion`, `plazo_pago`, `giro`, `comuna_factura`, `dte_email`, `ciudad_factura`) VALUES
(2, '99570840-K', 'A J INGENIEROS S A', 'mibanez@aj.cl', '', 'Miriam Ibañez ', 'AVDA. LA DIVISA N? 0340', 30, 'FABRICACION E INSTALACION DE SISTEMAS DE COMUNICACION', 'SAN BERNARDO', 'dte.cl@einvoicing.signature-cloud.com', 'SANTIAGO'),
(3, '59201910-8', 'ABENER ENERGIA S.A Y TEYMA, GESTION DE CONTRATOS DE CONSTR. E ING. S.A', 'martin.lepori@abengoa.com', '', 'Martín Lépori Donati ', 'LAS ARAUCARIAS 9130 PISO 3', 30, 'GESTION CONTRATOS', 'QUILICURA', 'carla.donoso@abengoa.com', 'QUILICURA'),
(4, '96521440-2', 'ABENGOA CHILE S A', 'moises.rivera@abengoa.com', '', 'Moisés Rivera ', 'LAS ARAUCARIAS N? 9.130', 30, 'GENERACION HIDROELECTRICA', 'QUILICURA', 'abengoa_dte@paperless.cl', 'SANTIAGO'),
(5, '59069860-1', 'ACCIONA CONSTRUCCION S.A. AGENCIA CHILE', 'moises.rivera@abengoa.com', '', 'Moises Rivera ', 'AVENIDA APOQUINDO 4499 PISO 14', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'recepcion@custodium.com', 'SANTIAGO'),
(6, '76144427-1', 'AGRO-COMERCIAL LAS TORCASAS LTDA', 'agrocomerciallastorcasas@gmail.com', '', 'Miguel Silva', 'CALLE URIBE LOTE N? 4', 30, 'OTROS SERVICIOS AGRICOLAS N.C.P.', 'SANTA MARIA', 'facturacionmipyme2@sii.cl', 'SAN FELIPE'),
(7, '76418976-0', 'AGUAS DE ANTOFAGASTA S.A.', 'mpalavecinos@aguasantofagasta.cl', '', 'Marcelo Palavecinos Olivos ', 'AV PEDRO AGUIRRE CERDA 6496', 30, 'CAPTACION, PURIFICACION Y DISTRIBUCION DE AGUA', 'CALAMA', 'proveedordte@aguasantofagasta.cl', 'CALAMA'),
(8, '96954690-6', 'AGUAS Y RILES S. A.', 'pago.proveedores@aguasyriles.cl', '', 'Ana Castillo', 'MARCHANT PEREIRA 221 61', 30, 'VENTA AL POR MAYOR DE PRODUCTOS QUIMICOS', 'PROVIDENCIA', 'dte.cl@einvoicing.signature-cloud.com', 'SANTIAGO'),
(9, '76377649-2', 'AGUASIN SPA.', 'malvarez@aguasin.com', '', 'Miguel Alvarez', 'PANAMERICANA 18900', 30, 'PURIFICACION Y TRATAMIENTO DE AGUAS', 'LAMPA', 'empresas.esm@plane.cl', 'SANTIAGO'),
(10, '76035624-7', 'ALMACEN EXTRAPORTUARIO EL SAUCE S.A.', 'jcarvajal@rdaelsauce.cl ', '', 'Joselyn Carvajal Cort', 'AVDA. APOQUINDO 4001 OF 501', 30, 'BODEGAJE Y ALMACENAJE', 'LAS CONDES', 'elsauce_dte@paperless.cl', 'SANTIAGO'),
(11, '76321458-3', 'ALMEYDA SOLAR SPA', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'AVDA. PRESIDENTE RIESCO 5335 P.15', 30, 'GENERACION EN OTRAS CENTRALES N.C.P.', 'LAS CONDES', 'almeydasolarspa@enel.com', 'SANTIAGO'),
(12, '76281400-5', 'ALUMINI INGENIERIA LTDA', 'pagoproveedores@aluminieng.com', '', 'Rosi Cerda', 'CAMINO EL CERRO 5091 EL ROSAL', 30, 'CONSTRUCCION DE EDIFICIOS COMPLETOS', 'HUECHURABA', 'dte_prod_alumini@smtp.suiteelectronica.com', 'SANTIAGO'),
(13, '79959900-7', 'ANDES CARGO TRANSPORTES LTDA', 'bm@andescargo.com', '', 'Bernardo Monasterio', 'CALLE LARGA 2338', 30, 'FABRICACION DE OTROS PRODUCTOS ELABORADOS', 'CALLE LARGA', 'FacturacionMIPYME@sii.cl', 'LOS ANDES'),
(14, '76545526-K', 'ARIDOS BUENA VISTA SPA', 'marcelo@aridosbuenavista.cl', '', 'Marcelo Diaz', 'ORILLA DE MAULE S/N EL PALTO', 60, 'EXTRACCION DE PIEDRAS ARENA Y ARCILLA', 'SAN JAVIER', 'intercambio@dtebcn.cl', 'TALCA'),
(15, '65698050-8', 'ASOCIACION GREMIAL DUE?OS DE BUSES PROV. EL LOA', 'vebru.7@gmail.com', '', 'Ver?nica Parada', 'FCO. MARTINIC MANZANA E 1 SITIO 8 PUERTO SECO', 30, 'TRANSPORTE', 'CALAMA', 'FacturacionMIPYME@sii.cl', 'CALAMA'),
(16, '76175835-7', 'ATCO SABINCO S.A .', 'MMORENO@ATCOSABINCO.COM', '', 'Margarita Moren o', 'LAS ESTERAS NORTE 2351', 30, 'FABRICACION DE PRODUCTOS METALICOS DE', 'QUILICURA', 'intercambio@dtebcn.cl', 'SANTIAGO'),
(17, '76792614-6', 'ATLANTICA YIELD CHILE SPA', 'abel.huenchunir@atlanticayield.com', '', 'Abel Huenchunir', 'CERRO EL PLOMO 5931 OF 1611', 30, 'GESTION EMPRESARIAL', 'LAS CONDES', 'FacturacionMIPYME@sii.cl', 'SANTIAGO'),
(18, '99564360-K', 'BESALCO M D MONTAJES S A', 'rsalazar@besalcomd.cl', '', 'Roberto Salazar', 'TAJAMAR 183, OF 301', 30, 'CONSTRUCCION', 'LAS CONDES', 'terceros-99564360k@dte.iconstruye.com', 'SANTIAGO'),
(19, '79633220-4', 'BESALCO MAQUINARIAS S.A.', 'sebastian.collao@besalco.cl', '', 'Sebasti?n Collao Carvajal.', 'JOSE JOAQUIN PRIETO 9660', 30, 'SERVICIOS DE CORTA DE MADERA', 'EL BOSQUE', 'terceros-796332204@dte.iconstruye.com', 'SANTIAGO'),
(20, '86431800-2', 'BRINKS CHILE S.A.', 'LBasi@brinks.cl', '', 'Leticia Basi', 'SERGIO LIVINGSTONE 964', 30, 'TRANSPORTE DE VALORES', 'INDEPENDENCIA', 'brinksrecepcion@custodium.com', 'SANTIAGO'),
(21, '76105206-3', 'BUILDTEK SPA', 'luis.aranda@buildtek.cl', '', 'Luis Aranda Caqueo', 'AVENIDA DEL VALLE 601 OF 22', 30, 'OBRAS DE INGENIERIA', 'HUECHURABA', 'dte.cl@einvoicing.signature-cloud.com', 'SANTIAGO'),
(22, '76512740-8', 'CACERES MILANEZ Y CIA LTDA.', 'contabilidad@controlmin.cl', '', 'Liesselot Alabarce M.', 'ANTOFAGASTA', 30, 'IND', 'ANTOFAGASTA', 'defontanacontrolminemp@defontana.com', 'ANTOFAGASTA'),
(23, '79933740-1', 'CARLOS ESCARATE Y CIA LTDA', 'bcruz@simacer.cl', '', 'B?rbara Cruz ', 'GRANADEROS 4556', 45, 'INDUSTRIAS BASICAS DE HIERRO Y ACERO', 'CALAMA', 'facturasdtesima@gmail.com', 'CALAMA'),
(24, '81185000-4', 'CESMEC S.A.', 'proveedores.cesmec@bureauveritas.cl', '', 'Flavia Saavedra', 'AV. MARATHON N? 2595', 30, 'OBRAS DE INGENIERIA', 'MACUL', 'dteprod@cesmec.cl', 'SANTIAGO'),
(25, '76276036-3', 'CIS CONSTRUCCIONES RENTA CAR LTDA', 'amorales@cisconstrucciones.cl', '', 'America Morales ', 'QUIRIHUE 295', 30, 'CONSTRUCCION', 'NU?OA', 'windte.recepcion@construccioncr.cl', 'SANTIAGO'),
(26, '76358067-9', 'COMERCIAL JEAN PAUL SOUBLETT RIVERA E. I. R. L.', 'adm.greentechchile@gmail.com', '', 'AliciaAguilarCastillo', 'EL CIRUELO 597', 30, 'ING. Y CONSTRUCCION', 'COPIAPO', 'FacturacionMIPYME@sii.cl', 'COPIAPO'),
(27, '76696139-8', 'COMERCIALIZADORA INDUSTRIAL INGEACEROS SPA', 'marcela.albornoz@dibema.cl', '', 'Marcela Albornoz ', 'GENERAL SALVO 3249 VILLA COVADONGA', 30, 'FABRICACION DE PRODUCTOS METALICOS DE ACERO', 'CALAMA', 'FacturacionMIPYME@sii.cl', 'CALAMA'),
(28, '76795930-3', 'CONSORCIO ABENGOA KIPREOS LIMITADA', 'paguilera@kipreos.cl', '', 'Paulina Aguilera ', 'LAS ARAUCARIAS 9130', 30, 'OBRAS DE INGENIERIA', 'QUILICURA', 'terceros-76795930@dte.iconstruye.com', 'SANTIAGO'),
(29, '76547842-1', 'CONSORCIO ISOTRON-SACYR S.A.', 'felipe.matus@isastur.com', '', 'Felipe Eduardo Matus Iratchet ', 'FRANCISCO NOGUERA 200 PISO 12', 30, 'OBRAS DE INGENIERIA', 'PROVIDENCIA', 'windte_dte@custodium.com', 'SANTIAGO'),
(30, '76556170-1', 'CONSORCIO TREPSA - CERRO ALTO S.A.', 'avivanco@cerroalto.cl', '', 'Antonio Vivanco A. ', 'FIDEL OTEIZA 1956 OF 102', 30, 'PREPARACION DEL TERRENO, EXCAVACIONES Y', 'PROVIDENCIA', 'facturacion-mca@cerroalto2.cl', 'SANTIAGO'),
(31, '96717980-9', 'CONSTRUCCION Y MONTAJE COM S.A.', 'jordan.madrid@skchile.cl', '', 'Jordan Madrid', 'ASTURIAS 149', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'comsarecepcion@custodium.com', 'SANTIAGO'),
(32, '76463399-7', 'CONSTRUCCION Y SERVICIOS SANDRA GOMEZ MONTIEL EIRL', 'syr-servicios@hotmail.com', '', 'Bernardo Soto Contreras', 'GILBERTO GOMEZ CONTARDO MZ-A SITIO 11', 30, 'CONSTRUCCION Y SERVICIOS', 'CALAMA', 'FacturacionMIPYME@sii.cl', 'CALAMA'),
(33, '76277983-8', 'CONSTRUCCIONES Y SERVICIOS CRISTIAN G. LEIVA CHACANA E.I.R.L.', 'CLCSOLDADURAS@GMAIL.COM', '', 'Cristian Leiva', 'HEROES DE LA CONCEPCION 2027', 30, 'OBRAS MENORES EN CONSTRUCCION', 'IQUIQUE', 'recepcion@mipymepro.cl', 'IQUIQUE'),
(34, '76888238-K', 'CONSTRUCTOR ATACAMA CSP CHILE SPA', 'carla.donoso@abengoa.com', '', 'Carla Donoso', 'ORINOCO 90', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'recepcion@custodium.com', 'SANTIAGO'),
(35, '79724730-8', 'CONSTRUCTORA ARAUCANIA LIMITADA', 'proveedores@araucanialtda.cl', '', 'Katherine Rodriguez', 'J M CARRERA 1049 1053 SANTA ROSA', 30, 'PREPARACION DEL TERRENO, EXCAVACIONES', 'CALAMA', 'cl.empresas@defontanadte.com', 'CALAMA'),
(36, '89853600-9', 'CONSTRUCTORA INGEVEC S.A.', 'veronica@ingevec.cl', '', 'Ver?nica Valenzuela Araya', 'CERRO EL PLOMO 5680  PISO 14', 30, 'CONSTRUCCION DE EDIFICIOS COMPLETOS O DE', 'LAS CONDES', 'dteingevec@desis.cl', 'SANTIAGO'),
(37, '76234055-0', 'CONSTRUCTORA PEUMA LIMITADA', 'ximena@constructorapeuma.com', '', 'Ximena Vilchez', 'CALLE SEPTIMA AVENIDA 1208', 30, 'CONSTRUCCION DE EFICIOS', 'SAN MIGUEL', 'terceros-76234055@dte.iconstruye.com', 'SANTIAGO'),
(38, '76749780-6', 'CONSTRUCTORA THECMA LTDA', 'pamela.tapia@thecma.cl', '', 'Pamela Tapia T.', 'SAN BARTOLO 4557 KAMAC MAYU', 30, 'OBRAS DE INGENIERIA', 'CALAMA', 'windte_dte@custodium.com', 'CALAMA'),
(39, '77052800-3', 'CONSTRUCTORA VISOL LTDA', 'obadilla@cvisol.cl', '', 'Obadilla Badilla', 'BALMACEDA 0211', 30, 'OBRAS DE INGENIERIA Y CONST. CIVILES', 'EL BOSQUE', 'terceros-visol@dte.iconstruye.com', 'SANTIAGO'),
(40, '61704000-K', 'CORP NACIONAL DEL COBRE DE CHILE', 'Acasa003@codelco.cl', '', 'Ana Casanga', 'HUERFANOS 1270', 30, 'EXTRACCION DE COBRE', 'SANTIAGO', 'codelcorecepcion@custodium.com', 'SANTIAGO'),
(41, '96870780-9', 'ECHEVERRIA IZQUIERDO MONTAJES INDUSTRIALES S.A.', 'proveedores@eimontajes.cl', '', 'HERNAN OSVALDO BACHO GONZALEZ', 'ROSARIO NORTE 532 702', 30, 'PREPARACION DEL TERRENO, EXCAVACIONES', 'LAS CONDES', 'dte-eimi@eimontajes.cl', 'SANTIAGO'),
(42, '76328136-1', 'EIFFAGE ENERGIA CHILE LTDA', 'crfernandez@energia.eiffage.es', '', 'Cristina Fernandez Lopez Brea ', 'ALMIRANTE PASTENE 185 305', 30, 'OBRAS DE INGENIERIA', 'PROVIDENCIA', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(43, '77874400-7', 'ELECMAIN LTDA.', 'jortiz@vtr.net', '', 'Jorge Ortiz', 'ELEUTERO RAMIREZ N? 442', 30, 'PREPARACION DEL TERRENO, EXCAVACIONES', 'ANTOFAGASTA', 'facturacion@facturachile.cl', 'ANTOFAGASTA'),
(44, '76761547-7', 'EMPRESA CONSTRUCTORA FLUOR SALFA SGO LIMITADA', 'Charles.Mayne-Nicholls@fluor.com', '', 'Charles Mayne-Nicholls', 'REYES LAVALLE 3340 PISO N? 7', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'dte.cl@einvoicing.signature-cloud.com', 'SANTIAGO'),
(45, '96684600-3', 'EMPRESA DE MONTAJES INDUSTRIALES SALFA S. A.', 'lperdomo@sccom.cl', '', 'LILINETH TERESA PERDOMO MONTILLA ', 'AVDA PRESIDENTE RIESCO 5335 PISO 11', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'mantenciones_prov@salfacorp.com', 'SANTIAGO'),
(46, '78315970-8', 'EMPRESA DE SERV. DE SEGURIDAD PRIVADA FUDU LTDA', 'contabilidadfudu@fudu.cl', '', 'Cynthia Rivera ', 'JOSE DOMINGO MUJICA 0210', 30, 'SERVICIOS', 'RANCAGUA', 'fudu@bsoft.cl', 'RANCAGUA'),
(47, '96524140-K', 'EMPRESA ELECTRICA PANGUIPULLI S.A.', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'AVDA PRESIDENTE RIESCO 5335 P.15', 30, 'GENERACION HIDROELECTRICA', 'LAS CONDES', 'eepanguipullisa@enel.com', 'SANTIAGO'),
(48, '76200889-0', 'ENDURO SPA', 'Erika.Lindgren@emecogroup.com', '', 'Erika Lindgren', 'AVDA APOQUINDO 4001, OF 405', 30, 'ALQUILER DE OTROS TIPOS DE MAQUINARIAS Y EQUIPOS N.C.P.', 'LAS CONDES', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(49, '91081000-6', 'ENEL GENERACION CHILE S.A.', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'SANTA ROSA 76', 90, 'GENERACION, TRANSMISION Y DISTRIBUCION ENERGIA ELECTRICA', 'SANTIAGO', 'enelgeneracionchilesa@enel.com', 'SANTIAGO'),
(50, '76412562-2', 'ENEL GREEN POWER DEL SUR SPA', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'PDTE RIESCO 5335 PISO 15', 30, 'GENERACION EN OTRAS CENTRALES N.C.P.', 'LAS CONDES', 'egpdelsurspa@enel.com', 'SANTIAGO'),
(51, '79863400-3', 'ENRIQUE DESMADRYL LUDWIG Y CIA LTDA', 'eespinoza@gruasdesmadryl.cl', '', 'Ema Espinoza Suarez', 'FRESIA 2280', 30, 'INGENIERIA Y CONSTRUCCION', 'RENCA', 'dteedesmadrylycia@desis.cl', 'SANTIAGO'),
(52, '76925800-0', 'ESPINOS S.A.', 'juan.aris@potenciachile.cl', '', 'Juan Carlos Ar?s Vald', 'MONSE?OR SOTERO SANZ 267', 30, 'GENERACION ELECTRICA', 'SANTIAGO', 'electricas.dte@agrisol.cl', 'SANTIAGO'),
(53, '96959760-8', 'FARICASTELL S.A.', 'Pagoproveedores@inversionesfarias.cl', '', 'Carolinne Rojas C', 'ORLANDO VARAS 1263 O SECTOR CENTRO', 30, 'PREPARACION DEL TERRENO, EXCAVACIONES', 'ANTOFAGASTA', 'dte.cl@einvoicing.signature-cloud.com', 'ANTOFAGASTA'),
(54, '91489000-4', 'FINNING CHILE S.A.', 'jorge.mujica@finning.com', '', 'Jorge Mujica', 'AV. LOS JARDINES N? 924 C. EMPRESARIAL', 30, 'IMPORTACION, DISTRIBUCION Y SERVICIOS, ARRENDAMIENTO DE MAQU', 'HUECHURABA', 'recepciondte_prd@finning.com', 'SANTIAGO'),
(55, '78932860-9', 'GASATACAMA CHILE S.A.', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'SANTA ROSA 76 P-10', 30, 'GENERACION TERMOELECTRICA EN CENTRALES DE CICLO COMBINADO', 'SANTIAGO', 'gasatacamachile@enel.com', 'SANTIAGO'),
(56, '76270831-0', 'GEOTECNIA CONSULTORES CHILE LIMITADA.', 'ldiaz@ghmconsultores.es', '', 'Luisa Diaz', 'PADRE MARIANO 391 OF 704', 30, 'GEOLOGIA', 'PROVIDENCIA', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(57, '96971330-6', 'GEOTERMICA DEL NORTE S A', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'AVDA PRESIDENTE RIESCO 5335 PISO 15', 30, 'GENERACION, TRANSMISION Y DISTRIBUCION DE ENERGIA ELECTRICA', 'SANTIAGO', 'geotermicadelnortesa@enel.com', 'SANTIAGO'),
(58, '60511023-1', 'GOBERNACION PROVINCIAL DE EL LOA', 'rcarus@interior.gov.cl', '', 'Rodolfo Carus', 'GRANADEROS N? 2296', 30, 'GOBIERNO CENTRAL', 'CALAMA', '', 'CALAMA'),
(59, '77335840-0', 'GONZALEZ ACKERKNECHT LIMITADA', 'pcerda@cyg.cl', '', 'Patricia Cerda ', 'MANUEL MONTT 0570', 30, 'OBRAS DE INGENIERIA', 'RANCAGUA', 'dtecyg@desis.cl', 'RANCAGUA'),
(60, '76690471-8', 'GOSAN MINERALS SPA', 'gerenciagosanltda@gmail.com', '', 'Alesxander Sanchez', 'COSTA RICA 2864', 30, 'EXTRACCION DE MINERALES', 'CALAMA', 'FacturacionMIPYME@sii.cl', 'CALAMA'),
(61, '76233921-8', 'GRUAS ALTO TONELAJE MAULE SPA', 'rcontreras@gruasatmaule.cl', '', 'Rodrigo Contreras', 'AVDA FORESTAL 1100 PARQUE INDUSTRIAL', 30, 'ALQUILER DE MAQUINARIA Y EQUIPOS DE CONSTRUCCION', 'CORONEL', 'FacturacionMIPYME@sii.cl', 'CORONEL'),
(62, '76496891-3', 'GRUPO YALQUINCHA SPA', 'gerencia@grupoyalquincha.cl', '', 'Eduardo Cortes Gordillo', 'TALAGANTE 3411 MANUEL RODRIGUEZ', 30, 'OBRAS MENORES EN CONSTRUCCION', 'CALAMA', 'intercambio@facto.cl', 'CALAMA'),
(63, '76378396-0', 'HIGHSERVICE INGENIERIA Y CONSTRUCCION LTDA', 'bjara@highservice.cl', '', 'Belgica Jara', 'AVDA. PDTE KENNEDY 6660 P 1', 30, 'OBRAS DE INGENIERIA', 'VITACURA', '76378396-0@febos.cl', 'SANTIAGO'),
(64, '79723890-2', 'ICEM S.A.', 'asalas@icem.cl', '', 'ALONSO TOMAS SALAS VASQUEZ ', 'AVDA. PRESIDENTE RIESCO 5335', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'mantenciones_prov@salfacorp.com', 'SANTIAGO'),
(65, '77189740-1', 'ICL CATODOS LTDA', 'jrojas@iclcatodos.cl', '', 'Juan Rojas', 'AVDA LAS INDUSTRIAS 325 SECTOR PUERTO SECO', 30, 'FABRICACION DE OTROS PRODUCTOS ELABORADOS', 'CALAMA', 'windte_dte@custodium.com', 'CALAMA'),
(66, '77276280-1', 'INDUSTRIAL SUPPORT COMPANY LTDA.', 'bjara@highservice.cl', '', 'Belgica Jara', 'AV. PDTE KENNEDY LATERAL 6660', 30, 'MANTENIMIENTO INDUSTRIAL', 'VITACURA', '77276280-1@febos.cl', 'SANTIAGO'),
(67, '76214280-5', 'INGENIERIA AVA MONTAJES LIMITADA', 'cristianacuna@ava.cl', '', 'Cristian Acu?a ', 'AUTOP. CONCEP. THNO 8696 713 EDIF BIO BIO', 30, 'FABRICACION DE PRODUCTOS METALICOS DE', 'HUALPEN', 'contabilidad@ava.cl', 'CONCEPCION'),
(68, '93546000-K', 'INGENIERIA CIVIL VICENTE S A', 'ssilva@icv.cl', '', 'Sergio Silva Riveros', 'MARCHANT PEREIRA N? 221, PISO 10', 30, 'FABRICACION DE OTROS EQUIPOS DE TRANSPORTES', 'PROVIDENCIA', 'dteicvsa@icv.cl', 'SANTIAGO'),
(69, '89630400-3', 'INGENIERIA EN ELECTRONICA COMPUTACION Y MEDICINA S.A.', 'obras.civiles@ecm.cl', '', 'Ruth Segura ', 'AVDA. ELIODORO YA?EZ 1890', 30, 'SERVICIOS DE INGENIERIA', 'PROVIDENCIA', 'dte_prod@ecm.cl', 'SANTIAGO'),
(70, '77539370-K', 'INGENIERIA MONTAJE Y SERVICIOS PATAGONIA LTDA.', 'crgalvez@imspatagonia.cl', '', 'Cristi?n G?vez ', 'LO FONTECILLA 201 OF.1021', 30, 'EXTRACCION DE PIEDRA, ARENA Y ARCILLA', 'LAS CONDES', 'ims@gestdocu.cl', 'SANTIAGO'),
(71, '91915000-9', 'INGENIERIA Y CONSTRUCCION SIGDO KOPPERS S.A.', 'jordan.madrid@skchile.cl', '', 'Jordan Madrid', 'MALAGA 120', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'icskrecepcion@custodium.com', 'SANTIAGO'),
(72, '76006925-6', 'INGENIERIA Y CONSTRUCCIONES AMECI LIMITADA', 'elizabeth.rojas@ameci.cl', '', 'Elizabeth Rojas ', 'DIEGO ECHEVERRIA 660', 30, 'OBRAS DE INGENIERIA', 'QUILLOTA', 'cl.empresas@defontanadte.com', 'QUILLOTA'),
(73, '79730880-3', 'INGENIERIA Y CONSTRUCCIONES INCOLUR S A', 'csantander@incolur.cl', '', 'Claudio Santander ', 'NAPOLEON 3010 PISO 6', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'windte_dte@custodium.com', 'SANTIAGO'),
(74, '76113171-0', 'INGENIERIA,PAVIMENTOS Y CONSTRUCCION SPA', 'fdo_fuentes_tapia@hotmail.com', '', 'FERNANDO FUENTES TAPIA', 'CASPANA 1826 VILLA AYQUINA', 30, 'MOV TIERRA, PAVIMENTACION, OBRAS CIVILES Y PROYECTOS', 'CALAMA', 'facturacionmipyme2@sii.cl', 'CALAMA'),
(75, '81740700-5', 'INVENIO S A', 'daniel.hernandez@invenio.cl', '', 'Daniel Hernandez ', 'CHILLAN 2318', 30, 'SERVICIOS E INSUMOS PARA LA MINERIA', 'INDEPENDENCIA', 'cl.empresas@defontanadte.com', 'SANTIAGO'),
(76, '76093010-5', 'INVERSIONES FARIAS Y FARIAS LIMITADA', 'marcaya@faricastellsa.cl ', '', 'Marcela Arcaya', 'ORLANDO VARAS 1263 SECTOR CENTRO SUR', 30, 'CONSTRUCTORA', 'ANTOFAGASTA', 'dte.cl@einvoicing.signature-cloud.com', 'ANTOFAGASTA'),
(77, '96825260-7', 'ISOTRON CHILE S A', 'felipe.matus@isastur.com', '', 'Felipe Eduardo Matus Iratchet', 'CALLE FRANCISCO NOGUERA N? 200 PISO 12', 30, 'OBRAS DE INGENIERIA', 'PROVIDENCIA', 'windte_dte@custodium.com', 'SANTIAGO'),
(78, '76481565-3', 'KEPS SERVICIOS DE INGENIERIA SPA', 'scerna@abasterm.cl', '', 'Sinthia Cerna ', 'LOS ALERCES 1701', 30, 'OBRAS DE INGENIERIA', 'CALAMA', 'facturacionmipyme2@sii.cl', 'CALAMA'),
(79, '76596781-3', 'MACROSS SERVICIOS INTEGRALES SPA', 'treyes.carrasco1@gmail.com', '', 'Tamara Reyes ', 'AVDA PEDRO AGUIRRE CERDA 11092 CASA 10', 30, 'SERVICIOS INTEGRALES', 'ANTOFAGASTA', 'facturacionmipyme2@sii.cl', 'ANTOFAGASTA'),
(80, '76414215-2', 'MARACOF CHILE SPA', 'emartinez@maracof.com', '', 'Emilio Martinez', 'ALONSO DE CORDOVA 5710 202', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(81, '77956270-0', 'MARTINIC INGENIERIA Y SERVICIOS LTDA.', 'martinic@martinic.cl', '', 'Paola Carmona ', 'CAM A CHIU CHIU SITIO N? 3 PUERTO SECO', 30, 'MANTENIMIENTO Y REPARACION DE VEHICULOS', 'CALAMA', 'facturaelectronica@martinic.cl', 'CALAMA'),
(82, '99542240-9', 'MATRAS Y ALFONSO S.A.', 'contabilidad@tcgroup.cl', '', 'Alejandra Diaz ', 'LIPARITA 250 BARRIO INDUSTRIAL', 30, 'HOTELES', 'ANTOFAGASTA', 'terceros-99542240@dte.iconstruye.com', 'ANTOFAGASTA'),
(83, '77203650-7', 'MAXIMILIANO GONZALEZ Y COMPANIA LIMITADA', 'patricia.lorca@metrika.cl', '', 'Patricia Lorca', 'DIEGO DE ALMAGRO 951', 30, 'ING. Y TECN. PARA SEGURIDAD Y MEDIO AMBIENTE', 'RANCAGUA', 'windte_dte@custodium.com', 'RANCAGUA'),
(84, '77800010-5', 'MECANICA MINERA INGENIERIA Y SERVICIOS LTDA', 'patricio.troncoso@mecamin.cl', '', 'Patricio Troncoso', 'PASAJE ANDALIEN 273', 30, 'REPARACION DE OTROS TIPOS DE MAQUINARIA', 'ANTOFAGASTA', 'facturacion@mecamin.cl', 'ANTOFAGASTA'),
(85, '99511310-4', 'MINERA Y MONTAJES CONPAX SPA', 'david.fransoni@conpax.cl', '', 'David Antonio Fransoni Vasquez ', 'PALACIO RIESCO 4583', 30, 'OBRAS DE INGENIERIA', 'HUECHURABA', 'terceros-conpax@dte.iconstruye.com', 'SANTIAGO'),
(86, '76610790-7', 'MLF INGENIERIA LTDA', 'jlizama@mlfingenieria.cl', '', 'Jessica Lizama C. ', 'INDEPENDENCIA 3355 VILLA CODELCO', 30, 'OBRAS DE INGENIERIA', 'ANTOFAGASTA', 'FacturacionMIPYME@sii.cl', 'ANTOFAGASTA'),
(87, '76060841-6', 'OBRAS ESPECIALES CHILE S. A.', 'marco.valderrama@obechile.cl', '', 'Marco Aurelio Vaderrama', 'AVDA PRESIDENTE RIESCO 5561 OF 501-A', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'obrasespeciales_chile@facturaweb.cl', 'SANTIAGO'),
(88, '99509260-3', 'OBRAS INDUSTRIALES SALFA S A', 'lperdomo@sccom.cl', '', 'LILINETH TERESA PERDOMO MONTILLA ', 'AVDA. PRESIDENTE RIESCO 5335 PISO 11', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'mantenciones_prov@salfacorp.com', 'SANTIAGO'),
(89, '76052206-6', 'PARQUE EOLICO VALLE DE LOS VIENTOS S.A.', 'braulio.constanzo@enel.com', '', 'Constanzo Cifuentes, Braulio Francisco', 'AVDA PRESIDENTE RIESCO 5335 PISO 15', 30, 'GENERACION EN OTRAS CENTRALES N.C.P.', 'LAS CONDES', 'pevalledelosvientossa@enel.com', 'SANTIAGO'),
(90, '6218095-1', 'PEDRO RIGOBERTO VARGAS ACEVEDO', '1971pedro@live.com', '', 'Pedro Vargas', 'JUAN SALDIVAR SITIO 14 PUERTO SECO', 30, 'OBRAS MENORES Y MANTENCION DE VEHICULOS', 'CALAMA', 'facturacionmipyme2@sii.cl', 'CALAMA'),
(91, '76248021-2', 'PROMET MAQUINARIA Y EQUIPOS SPA', 'mvidarte@prometservicios.cl   ', '', 'Manuel Vidarte', 'AVDA DEL VALLE SUR 650 DEPTO 31', 30, 'MAQUINARIA', 'Huechuraba', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(92, '76543046-1', 'PROMET MONTAJES SPA', 'mvidarte@prometservicios.cl   ', '', 'Manuel Vidarte', 'AVDA. DEL VALLE SUR 650', 30, 'CONSTRUCCION DE CARRETERAS Y LINEAS DE F', 'Huechuraba', 'recepcionfactura@prometservicios.cl', 'SANTIAGO'),
(93, '96853940-K', 'PROMET SERVICIOS SPA', 'mvidarte@prometservicios.cl   ', '', 'Manuel Vidarte', 'AVDA DEL VALLE SUR 650 OF 31', 30, 'SERVICIOS DE INGENIERIA PRESTADO POR EM', 'HUECHURABA', 'recepcionfactura@prometservicios.cl', 'SANTIAGO'),
(94, '76593235-1', 'PROSUPLAN SPA', 'ggutierrez@prosuplan.com', '', 'Grecia Gutierrez ', 'AVDA DEL PARQUE 4928 OF 423 CIUDAD EMPRESARIAL', 30, 'OBRAS MENORES DE CONSTRUCCION', 'Huechuraba', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(95, '76204497-8', 'QUANTA SERVICES CHILE SPA', 'bsanchez@quantaservices.com', '', 'Bel?n S?nchez Leiva', 'ROSARIO NORTE 615 OF 1504 PISO 15', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'FacturacionMIPYME@sii.cl', 'SANTIAGO'),
(96, '87580800-1', 'READY MIX HORMIGONES LIMITADA', 'paola.repiso@cbb.cl', '', 'Paola Repiso', 'LIRA 2320', 30, 'ELABORACION DE HORMIGONES', 'SAN JOAQUIN', 'recepciondte.are@cbb.cl', 'SANTIAGO'),
(97, '78075740-K', 'REALINI FUENTES COMPANIA LIMITADA', 'mario.lucas@ocyre.cl', '', 'Mario Lucas N.', 'MANZANA 3 SITIO 19 SECTOR PUERTO SECO', 30, 'EXPLOTACION DE OTRAS MINAS Y CANTERAS', 'CALAMA', 'windte_dte@custodium.com', 'CALAMA'),
(98, '76320306-9', 'REMISOLD INGENIERIA SPA', 'r_zo@hotmail.com', '', 'Ren? Z??iga', 'NESTOR DEL FIERRO 465 PB 5B LA NEGRA', 30, 'OBRAS MENORES EN CONSTRUCCION', 'ANTOFAGASTA', 'FacturacionMIPYME@sii.cl', 'ANTOFAGASTA'),
(99, '76264251-4', 'RML GROUP INTERNATIONAL CHILE SPA', 'secretaria.santiago@rmlgroup.cl', '', 'Elizabeth Valeria Y. ', 'AVDA NUEVA TAJAMAR 555 OF 1902', 30, 'REPARACION, OPERACION Y MONTAJE DE MAQ. PARA MINERIA', 'LAS CONDES', 'cl.empresas@defontanadte.com', 'SANTIAGO'),
(100, '77557430-5', 'SALES DE MAGNESIO LIMITADA', 'proveedores.rwl@albemarle.com. ', '', 'Daniel van der Werf', 'ISIDORA GOYENECHEA 3162 PISO 13', 30, 'OTROS TIPOS DE VENTA AL POR MENOR', 'LAS CONDES', 'salmag@artikos.cl', 'SANTIAGO'),
(101, '13217553-5', 'SERGIO RICHARD SEGOVIA CRUZ', 'sergio_segovia_cruz@hotmail.com', '', 'Sergio Segovia Cruz', 'AVDA OHIGGINS S/N', 30, 'OBRAS MENORES EN CONSTRUCCION', 'OLLAGUE', 'facturacionmipyme2@sii.cl', 'OLLAGUE'),
(102, '76192781-7', 'SERVICIOS DE HIGIENE AMBIENTAL VARDOR LIMITADA', 'ingrid.dorador@vardor.cl', '', 'Ingrid Dorador', 'CALLE 47 MANZANA B12 ESTACION PAIPOTE', 30, 'LIMPIA DE FOSAS Y ALCANTARILLADO', 'COPIAPO', 'windte_dte@custodium.com', 'COPIAPO'),
(103, '76446522-9', 'SERVICIOS ELECTRICOS PRIMARIOS SPA', 'aibanez@ingenieriasep.cl', '', 'Ana Iba?ez', 'GONZALO DE LOS RIOS 6506', 30, 'SERV. DE ING. ELECTRICA , OOCC Y OBRAS MENORES', 'LAS CONDES', 'intercambio@dte.nubox.com', 'SANTIAGO'),
(104, '59242910-1', 'SERVIZI ENERGIA ITALIA SPA, AGENCIA EN CHILE', 'Leticia.Allende@saipem.com', '', 'Leticia Allende ', 'AVDA CERRO EL PLOMO 5630 OF 301', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'FacturacionMIPYME@sii.cl', 'SANTIAGO'),
(105, '96801810-8', 'SGS MINERALS S. A.', 'proveedoressgs@sgs.com', '', 'Alfredo Contreras', 'SIMON BOLIVAR N? 2155', 30, 'EMPRESAS DE SERVICIOS INTEGRALES DE INFO', 'CALAMA', 'cimm-tysrecepcion@custodium.com', 'CALAMA'),
(106, '76574653-1', 'SICOI CHILE SPA', 'g.mellini@sicoi.com', '', 'Gianluca Mellini ', 'SANTO DOMINGO 673311', 30, 'OBRAS MENORES DE CONSTRUCCION', 'SANTIAGO', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(107, '94995000-K', 'SIEMENS S.A.', 'viviana.jofre@siemens.com', '', 'Viviana Ester Jofre Araya', 'CERRO EL PLOMO 6000 OF 1001', 90, 'FABRICACION DE MOTORES, GENERADORES', 'LAS CONDES', 'siemensrecepcion@custodium.com', 'SANTIAGO'),
(108, '76669256-7', 'SIMTA INGENIERIA SPA', 'gacaroca@simtaingenieria.cl', '', 'Guillermo Caroca', 'VOLCAN OSORNO 34', 30, 'INGENIERIA MANTENIMIENTO', 'CON CON', 'FacturacionMIPYME@sii.cl', 'VALPARAISO'),
(109, '59209340-5', 'SK ENGINEERING & CONSTRUCTION CO., LTDA. AGENCIA EN CHILE', 'macarena.moreno@partner.sk.com', '', 'Macarena Moreno', 'AVDA APOQUINDO 3721 PISO 15', 30, 'OBRAS DE INGENIERIA', 'LAS CONDES', 'sk_dte@acasesorias.cl', 'SANTIAGO'),
(110, '79730570-7', 'SOC INGENIERIA CONSTRUCCION Y MAQUINARIA SPA', 'proveedores@sicomaq.cl', '', 'Angelina Ordenes', 'AVDA DEL PARQUE 4680-A OF 505', 30, 'CONSTRUCCION', 'Huechuraba', 'terceros-sicomaq@dte.iconstruye.com', 'SANTIAGO'),
(111, '76808160-3', 'SOC SERVICIOS INGENIERIA Y MANTENCION SA', 'scvjetkovic@sigmasa.cl', '', 'Susana Cvjetkovic ', 'DIAGONAL ORIENTE 5170', 30, 'INGENIERIA', '?U?OA', 'recepciondte@sigmasa.cl', 'SANTIAGO'),
(112, '76335822-4', 'SOCIEDAD COMERCIAL DIVISION NORTE LTDA', 'hector.cordovah87@gmail.com', '', 'Hector Cordova', 'HEROES DE LA CONCEPCION MZ 32 ST 06', 30, 'OBRAS MENORES EN CONSTRUCCION', 'ANTOFAGASTA', 'facturacionmipyme2@sii.cl', 'ANTOFAGASTA'),
(113, '76197134-4', 'SOCIEDAD COMERCIAL MICROGLOBAL S.A.C.', 'proveedores@microglobal.cl', '', 'Edwin Maldonado Sajama', 'MAR DE PLATA 1986', 30, 'REPARACION DE EQUIPOS DE CONTROL DE PROC', 'PROVIDENCIA', 'managerrecepcion@custodium.com', 'SANTIAGO'),
(114, '76505510-5', 'SOCIEDAD CONSTRUCTORA Y SERVICIOS INAKI LIMITADA', 'inakiltda@gmail.com', '', 'Dalma Tapia', 'AVDA CIRCUNVALACION N? 1117 LOTE 3', 30, 'PEQUE?A MINERIA', 'CALAMA', 'facturacionmipyme2@sii.cl', 'CALAMA'),
(115, '76434129-5', 'SOCIEDAD METALMEC?NICA COOPER HILL LIMITADA', 'A.SEGUEL@COOPERHILL.CL', '', 'ALBERTO SEGUEL ARAYA ', 'GRECIA 883', 30, 'CONSTRUCCION DE CARRETERAS Y LINEAS DE F', 'CALAMA', 'facturacionmipyme2@sii.cl', 'CALAMA'),
(116, '76009541-9', 'SOCIEDAD SERVICIOS INGENIERIA Y MANTENCION INTEGRAL MPM LIMITADA', 'jurdaneta@mpm.cl', '', 'Jeslaine Urdaneta Hernandez', 'AVDA LA DEHESA 1201 215 Y 216', 30, 'OBRAS DE INGENIERIA', 'LO BARNECHEA', 'terceros-76009541@dte.iconstruye.com', 'SANTIAGO'),
(117, '76425886-K', 'SOCIEDAD TECNOCYS S.A.', 'maria.acendra@tecnocysspa.cl', '', 'Maria Acendra ', 'PASAJE MANZANARES 382 VALLE LO CAMPINO', 30, 'OBRAS DE INGENIERIA', 'QUILICURA', 'FacturacionMIPYME@sii.cl', 'SANTIAGO'),
(118, '94623000-6', 'SODEXO CHILE S A', 'gerardo.frez@sodexo.com', '', 'Gerardo Frez Zu?iga', 'PEREZ VALENZUELA 1635', 60, 'SERVICIOS DE ALIMENTACION', 'PROVIDENCIA', 'sodexo_dte@paperless.cl', 'SANTIAGO'),
(119, '76112086-7', 'SOLUCIONES ASFALTICAS S.A.', 'contabilidad@solucionesasfalticas.cl', '', 'Elizabeth Past', 'AVDA BDO OHIGGINS 1338 OF 1402', 30, 'MOV. DE TIERRA Y VENTA DE MEZCLAS BITUMINOSAS', 'ANTOFAGASTA', 'FacturacionMIPYME@sii.cl', 'ANTOFAGASTA'),
(120, '76549525-3', 'SVS SERVICIOS INTEGRALES A LA MINERIA SPA', 'isabel.madrid03@svsmineria.cl', '', 'Isabel Madrid ', '14 DE FEBRERO 1965 OFICINA 306 PISO 3', 30, 'OTRAS ACTIVIDADES EMPRESARIALES', 'ANTOFAGASTA', 'intercambio@dte.nubox.com', 'ANTOFAGASTA'),
(121, '76254448-2', 'TECINSA SPA', 'COO@TECINSA.NET', '', 'Claudia Osorio', 'SANTA BEATRIZ 100 OF 1002 PISO 10', 30, 'MONTAJE Y MANTENIMIENTO DE INST. ELECTRICAS', 'PROVIDENCIA', 'facturacionmipyme2@sii.cl', 'SANTIAGO'),
(122, '76320186-4', 'TECNO FAST S. A.', 'recepcion@tecnofast.cl', '', 'Marcela Venegas', 'AVDA LA MONTANA 692', 30, 'ACONDICIONAMIENTO DE EDIFICIOS', 'LAMPA', 'dte.cl@einvoicing.signature-cloud.com', 'SANTIAGO'),
(123, '76413313-7', 'TECNOVE SERVICIOS,CONSTRUCCION Y SEQALETICA CHILE', 'mauriciomorales@tecnove.com', '', 'Mauricio Morales', 'LOS FRESNOS 500 GALPON 2', 30, 'TERMINACION Y ACABADO DE EDIFICIOS', 'COLINA', 'FacturacionMIPYME@sii.cl', 'SANTIAGO'),
(124, '79862750-3', 'TRANSPORTES CCU LTDA.', 'maavera@ccu.cl', '', 'Manuel Vera', 'PANAMERICANA NORTE N? 8000', 30, 'TRANSPORTE DE CARGA POR CARRETERA', 'QUILICURA', 'dte_tccu@xs4dte.cl', 'SANTIAGO'),
(125, '76278814-4', 'TRANSPORTES FACTOR DISTRIBUCION S.A.', 'cvillela@transfactor.cl', '', 'Cristian Villela', 'SERRANO 63 OFICINA 45', 30, 'TRANSPORTES DE CARGA', 'SANTIAGO', 'dtedistribucion@transfactor.cl', 'SANTIAGO'),
(126, '76224734-8', 'VAI PS INGENIERIA Y SERVICIOS LIMITADA', 'marcos.villar@vaips.cl', '', 'Marcos Villar', 'MONSE?OR VALECH 12050 17', 30, 'OBRAS DE INGENIERIA', 'MAIPU', 'FacturacionMIPYME@sii.cl', 'SANTIAGO'),
(128, '17164970-6', 'ANDESCODE SPA', 'ppimentel@andescode.cl', '+569 3088 2346', 'Patrik Pimentel', 'Hermanos Maristas 112', 30, 'Servicios Informatica', 'Los Andes', 'dte.cl@andescode.cl', 'Los Andes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `numero_doc` int(11) NOT NULL,
  `centro_costo` int(11) DEFAULT NULL,
  `tipo_doc` int(11) DEFAULT NULL,
  `tasa` int(11) DEFAULT NULL,
  `dif_precio` int(11) DEFAULT NULL,
  `fec_emision` date DEFAULT NULL,
  `fec_prorroga` date DEFAULT NULL,
  `fec_pag_prorroga` date DEFAULT NULL,
  `interes_prorroga` int(11) DEFAULT NULL,
  `fec_venc_pactado` date DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `anticipado` int(11) DEFAULT NULL,
  `fec_depo_anticipo` date DEFAULT NULL,
  `retencion` int(11) DEFAULT NULL,
  `interes_mora` int(11) DEFAULT NULL,
  `excedente` int(11) DEFAULT NULL,
  `estado_pago_excedente` int(11) DEFAULT NULL,
  `fec_depo_exc` date DEFAULT NULL,
  `num_operacion_desc_excedente` int(11) DEFAULT NULL,
  `obs` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `operacion` int(11) DEFAULT NULL,
  `id_fact` int(11) DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL,
  `id_hold` int(11) DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `fec_venc` date DEFAULT NULL,
  `tipo_pag_exc` int(11) DEFAULT NULL,
  `fec_pag_int` date DEFAULT NULL,
  `n30` int(11) DEFAULT NULL,
  `fn30` date DEFAULT NULL,
  `n15` int(11) DEFAULT NULL,
  `fn15` date DEFAULT NULL,
  `n5` int(11) DEFAULT NULL,
  `fn5` date DEFAULT NULL,
  `not_ini` int(11) DEFAULT NULL,
  `fec_not_ini` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `numero_doc`, `centro_costo`, `tipo_doc`, `tasa`, `dif_precio`, `fec_emision`, `fec_prorroga`, `fec_pag_prorroga`, `interes_prorroga`, `fec_venc_pactado`, `valor`, `anticipado`, `fec_depo_anticipo`, `retencion`, `interes_mora`, `excedente`, `estado_pago_excedente`, `fec_depo_exc`, `num_operacion_desc_excedente`, `obs`, `estado`, `operacion`, `id_fact`, `id_cli`, `id_hold`, `id_usu`, `fec_venc`, `tipo_pag_exc`, `fec_pag_int`, `n30`, `fn30`, `n15`, `fn15`, `n5`, `fn5`, `not_ini`, `fec_not_ini`) VALUES
(1982, 2868, 0, NULL, 100, NULL, '2018-11-05', '0000-00-00', '0000-00-00', 0, '2019-05-01', 1561097, 1561097, '0000-00-00', 0, 20000, 0, NULL, '0000-00-00', 0, 'Cambio de factoring.', 2, 0, 22, 5, 1, 1, '2018-12-05', NULL, '2019-04-05', 1, '2019-04-06', 1, '2019-04-26', 1, '2019-04-26', NULL, NULL),
(1983, 2869, 0, NULL, 100, NULL, '2018-11-05', '0000-00-00', '0000-00-00', 0, '2019-04-10', 6169586, 6169586, '0000-00-00', 0, 8559, 0, NULL, '0000-00-00', 0, '', 2, 0, 22, 5, 1, 1, '2018-12-05', NULL, '2019-05-08', 1, '2019-04-25', 1, '2019-04-26', 1, '2019-04-25', NULL, NULL),
(1984, 2870, 0, NULL, 100, NULL, '2018-11-05', '0000-00-00', '0000-00-00', 0, '0000-00-00', 6169586, 6169586, '0000-00-00', 0, 35000, 0, NULL, '0000-00-00', 0, '', 3, 0, 24, 34, 1, 1, '2018-12-05', NULL, NULL, 1, '2019-04-29', NULL, NULL, NULL, NULL, NULL, NULL),
(1985, 2871, 0, NULL, 0, NULL, '2018-11-05', '0000-00-00', '0000-00-00', 0, '0000-00-00', 609804, 0, '0000-00-00', 0, 0, 0, NULL, '0000-00-00', 0, '', 3, 0, 25, 5, 1, 1, '2018-12-05', NULL, NULL, 1, '2019-04-30', NULL, NULL, NULL, NULL, NULL, NULL),
(1986, 2872, 0, NULL, 100, NULL, '2018-11-06', '0000-00-00', '0000-00-00', 0, '0000-00-00', 154948736, 154948736, '0000-00-00', 0, 0, 0, NULL, '0000-00-00', 0, 'Modificacion al factoring.', 2, 0, 23, 49, 1, 1, '2019-02-04', NULL, NULL, 1, '2019-04-19', NULL, NULL, NULL, NULL, NULL, NULL),
(1987, 2873, 223, 2, 110, NULL, '2018-11-06', NULL, NULL, NULL, NULL, 71560625, NULL, '2018-12-05', NULL, NULL, NULL, NULL, NULL, NULL, 'aca', 1, 242, 19, 49, 1, 1, '2019-02-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1988, 2874, 0, NULL, 100, NULL, '2018-11-08', '0000-00-00', '0000-00-00', 0, '0000-00-00', 2817999, 2817999, '0000-00-00', 0, 0, 0, NULL, '0000-00-00', 0, '', 2, 0, 22, 118, 1, 1, '2019-01-07', NULL, NULL, 1, '2019-04-04', NULL, NULL, NULL, NULL, NULL, NULL),
(1989, 2875, 113, NULL, 1132, NULL, '2018-11-08', '0000-00-00', '0000-00-00', 0, '2019-05-31', 2454552, 0, '2019-05-06', 0, 0, 0, NULL, '0000-00-00', 0, 'okerar', 2, 324, 19, 118, 1, 1, '2019-01-07', NULL, NULL, 1, '2019-05-07', NULL, NULL, NULL, NULL, NULL, NULL),
(1990, 2876, 453, 2, 21, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 9148125, NULL, '2019-04-09', NULL, NULL, NULL, NULL, NULL, NULL, '123okkk', 3, 34, 21, 118, 1, 1, '2019-01-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1991, 2877, 113, NULL, 1132, NULL, '2018-11-08', '0000-00-00', '0000-00-00', 0, '2019-05-21', 1907422, 0, '2019-05-06', 0, 0, 0, NULL, '0000-00-00', 0, 'okerar', 2, 324, 19, 118, 1, 1, '2019-01-07', NULL, NULL, 1, '2019-05-07', 1, '2019-05-07', 1, '2019-05-17', NULL, NULL),
(1992, 2878, 123, 2, 123, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 2475200, NULL, '2019-04-07', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaqwe', 2, 324, 22, 92, 1, 1, '2018-12-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1993, 2879, 123, 2, 123, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 1332115, NULL, '2019-04-07', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaqwe', 2, 324, 22, 92, 1, 1, '2018-12-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1994, 2880, 225, 2, 100, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 832657, NULL, '2019-04-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Ingresadas.', 2, 25, 19, 92, 1, 1, '2018-12-08', NULL, NULL, 1, '2019-05-23', NULL, NULL, NULL, NULL, NULL, NULL),
(1995, 2881, 225, 2, 100, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 4408498, NULL, '2019-04-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Ingresadas.', 2, 25, 19, 92, 1, 1, '2018-12-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1996, 2882, 225, 2, 100, NULL, '2018-11-08', NULL, NULL, NULL, NULL, 69020, NULL, '2019-04-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Ingresadas.', 2, 25, 19, 6, 1, 1, '2018-12-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1997, 2883, 225, 2, 100, NULL, '2018-11-12', NULL, NULL, NULL, NULL, 1999200, NULL, '2019-04-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Ingresadas.', 2, 25, 19, 9, 1, 1, '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-05-07', NULL, NULL),
(1998, 2884, 225, 2, 100, NULL, '2018-11-12', NULL, NULL, NULL, NULL, 5712000, NULL, '2019-04-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Ingresadas.', 2, 25, 19, 28, 1, 1, '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1999, 2885, 225, 2, 100, NULL, '2018-11-12', NULL, NULL, NULL, NULL, 3659250, NULL, '2019-04-24', NULL, NULL, NULL, NULL, NULL, NULL, 'Ingresadas.', 2, 25, 19, 31, 1, 1, '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2000, 2886, 10522, 2, 101, NULL, '2018-11-12', NULL, NULL, NULL, NULL, 2142000, NULL, '2019-05-09', NULL, NULL, NULL, NULL, NULL, NULL, '105wwwwww', 3, 323223, 23, 31, 1, 1, '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2001, 2887, 10522, 2, 101, NULL, '2018-11-12', NULL, NULL, NULL, NULL, 12018776, NULL, '2019-05-09', NULL, NULL, NULL, NULL, NULL, NULL, '105wwwwww', 3, 323223, 23, 41, 1, 1, '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2002, 2888, 45, 2, 100, NULL, '2018-11-13', NULL, NULL, NULL, NULL, 928200, NULL, '2019-05-09', NULL, NULL, NULL, NULL, NULL, NULL, 'Se Ingresan Facturas.', 2, 25, 21, 72, 1, 1, '2018-12-13', NULL, NULL, 1, '2019-05-14', NULL, NULL, NULL, NULL, NULL, NULL),
(2003, 2889, 45, 2, 100, NULL, '2018-11-13', NULL, NULL, NULL, NULL, 142800, NULL, '2019-05-09', NULL, NULL, NULL, NULL, NULL, NULL, 'Se Ingresan Facturas.', 2, 25, 21, 93, 1, 1, '2018-12-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2004, 2890, NULL, 2, NULL, NULL, '2018-11-13', NULL, NULL, NULL, NULL, 3046400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 93, 1, 1, '2018-12-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2005, 2891, NULL, 2, NULL, NULL, '2018-11-13', NULL, NULL, NULL, NULL, 142800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 93, 1, 1, '2018-12-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2006, 2892, NULL, 2, NULL, NULL, '2018-11-14', NULL, NULL, NULL, NULL, 14451289, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 124, 1, 1, '2018-12-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2007, 2893, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 14744100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 18, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2008, 2894, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 638435, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 116, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2009, 2895, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 2553740, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 116, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2010, 2896, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 4022200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 28, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2011, 2897, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 2588250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 28, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2012, 2898, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 2623259, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 89, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2013, 2899, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 2870280, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 29, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2014, 2900, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 595000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 29, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2015, 2901, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 12298650, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 120, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2016, 2902, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 2419382, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 93, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2017, 2903, NULL, 2, NULL, NULL, '2018-11-15', NULL, NULL, NULL, NULL, 2419382, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 93, 1, 1, '2018-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2018, 2904, NULL, 2, NULL, NULL, '2018-11-16', NULL, NULL, NULL, NULL, 55644469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 52, 1, 1, '2018-12-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 2905, NULL, 2, NULL, NULL, '2018-11-16', NULL, NULL, NULL, NULL, 9350425, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 67, 1, 1, '2018-12-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2020, 2906, NULL, 2, NULL, NULL, '2018-11-16', NULL, NULL, NULL, NULL, 1097775, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 67, 1, 1, '2018-12-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2021, 2907, NULL, 2, NULL, NULL, '2018-11-16', NULL, NULL, NULL, NULL, 1082900, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 59, 1, 1, '2018-12-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2022, 2908, NULL, 2, NULL, NULL, '2018-11-16', NULL, NULL, NULL, NULL, 999600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 109, 1, 1, '2018-12-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2023, 2909, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 830224, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 76, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2024, 2910, 10522, 2, 101, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 773500, NULL, '2019-05-09', NULL, NULL, NULL, NULL, NULL, NULL, '105wwwwww', 3, 323223, 23, 4, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2025, 2911, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 476000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 77, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2026, 2912, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 464100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 66, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2027, 2913, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 1082900, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 23, 1, 1, '2019-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2028, 2914, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 464100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 23, 1, 1, '2019-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2029, 2915, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 154700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 63, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2030, 2916, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 166600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 97, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2031, 2917, NULL, 2, NULL, NULL, '2018-11-19', NULL, NULL, NULL, NULL, 154700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 46, 1, 1, '2018-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2032, 2918, NULL, 2, NULL, NULL, '2018-11-20', NULL, NULL, NULL, NULL, 318920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 126, 1, 1, '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2033, 2919, NULL, 2, NULL, NULL, '2018-11-20', NULL, NULL, NULL, NULL, 616579, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 126, 1, 1, '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2034, 2920, NULL, 2, NULL, NULL, '2018-11-20', NULL, NULL, NULL, NULL, 629114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 115, 1, 1, '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2035, 2921, NULL, 2, NULL, NULL, '2018-11-20', NULL, NULL, NULL, NULL, 14102690, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 104, 1, 1, '2018-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2036, 2922, NULL, 2, NULL, NULL, '2018-11-21', NULL, NULL, NULL, NULL, 1213800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 116, 1, 1, '2018-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2037, 2923, NULL, 2, NULL, NULL, '2018-11-21', NULL, NULL, NULL, NULL, 8340486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 34, 1, 1, '2018-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2038, 2924, NULL, 2, NULL, NULL, '2018-11-21', NULL, NULL, NULL, NULL, 2007530, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 105, 1, 1, '2018-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2039, 2925, NULL, 2, NULL, NULL, '2018-11-21', NULL, NULL, NULL, NULL, 154700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 65, 1, 1, '2018-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2040, 2926, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 3248700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 73, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2041, 2927, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 3903200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 93, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2042, 2928, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 199920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2043, 2929, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 194684, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2044, 2930, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 1256640, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2045, 2931, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 1399440, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2046, 2932, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 825985, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2047, 2933, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 1071000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2048, 2934, NULL, 2, NULL, NULL, '2018-11-22', NULL, NULL, NULL, NULL, 1834247, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 45, 1, 1, '2018-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2049, 2935, NULL, 2, NULL, NULL, '2018-11-23', NULL, NULL, NULL, NULL, 43367141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 49, 1, 1, '2019-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2050, 2936, NULL, 2, NULL, NULL, '2018-11-23', NULL, NULL, NULL, NULL, 12066600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 28, 1, 1, '2018-12-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2051, 2937, NULL, 2, NULL, NULL, '2018-11-26', NULL, NULL, NULL, NULL, 39538245, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 49, 1, 1, '2019-02-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2052, 2938, NULL, 2, NULL, NULL, '2018-11-26', NULL, NULL, NULL, NULL, 11092894, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 49, 1, 1, '2019-02-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2053, 2939, NULL, 2, NULL, NULL, '2018-11-27', NULL, NULL, NULL, NULL, 6471313, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 58, 1, 1, '2018-12-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2054, 2940, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 6847292, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 123, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2055, 2941, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 220150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 116, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2056, 2942, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 2421650, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 116, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2057, 2943, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 1761200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 116, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2058, 2944, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 2974200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 92, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2059, 2945, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 2944456, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 117, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2060, 2946, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 1279250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 42, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2061, 2947, NULL, 2, NULL, NULL, '2018-11-28', NULL, NULL, NULL, NULL, 163237, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 42, 1, 1, '2018-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2062, 2948, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 1305896, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 26, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2063, 2949, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 2142000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 28, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2064, 2950, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 999600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 23, 1, 1, '2019-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2065, 2951, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 773500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 23, 1, 1, '2019-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2066, 2952, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 952000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 19, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2067, 2953, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 15113952, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 124, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2068, 2954, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 749700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 82, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2069, 2955, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 357000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 79, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2070, 2956, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 154700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 59, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2071, 2957, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 154700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 59, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2072, 2958, NULL, 2, NULL, NULL, '2018-11-29', NULL, NULL, NULL, NULL, 3272500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 24, 1, 1, '2018-12-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2073, 2959, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 10588134, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 125, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2074, 2960, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 474810, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 81, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2075, 2961, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 309400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 27, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2076, 2962, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 856800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 55, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2077, 2963, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 856800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 55, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2078, 2964, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 642600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 64, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2079, 2965, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 1913520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 77, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2080, 2966, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 266560, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 68, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2081, 2967, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 2802450, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 93, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2082, 2968, NULL, 2, NULL, NULL, '2018-11-30', NULL, NULL, NULL, NULL, 9210828, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 100, 1, 1, '2018-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2083, 124, 0, NULL, 0, NULL, '2019-04-10', '0000-00-00', '0000-00-00', 0, '0000-00-00', 1242312, 0, '0000-00-00', 0, 0, 0, NULL, '0000-00-00', 0, 'Ingresada-', 2, 0, 20, 10, 5, 1, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2084, 123, 0, 2, 100, 0, '2019-05-01', '0000-00-00', '0000-00-00', 0, '2019-05-30', 12223, 12223, '0000-00-00', 0, 0, 0, NULL, '0000-00-00', 0, 'Ingresada.', 1, 0, NULL, 16, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factoring`
--

CREATE TABLE `factoring` (
  `id_factoring` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contacto_personal` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `num_cta_1` varchar(45) DEFAULT NULL,
  `num_cta_2` varchar(45) DEFAULT NULL,
  `banco_cta_1` varchar(45) DEFAULT NULL,
  `banco_cta_2` varchar(45) DEFAULT NULL,
  `tipo_cta_1` varchar(45) DEFAULT NULL,
  `tipo_cta_2` varchar(45) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `email3` varchar(50) DEFAULT NULL,
  `email4` varchar(50) DEFAULT NULL,
  `cargo_contactop1` varchar(45) DEFAULT NULL,
  `contacto_personal2` varchar(100) DEFAULT NULL,
  `cargo_contactop2` varchar(45) DEFAULT NULL,
  `correotipo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factoring`
--

INSERT INTO `factoring` (`id_factoring`, `rut`, `razon_social`, `email`, `telefono`, `contacto_personal`, `direccion`, `celular`, `num_cta_1`, `num_cta_2`, `banco_cta_1`, `banco_cta_2`, `tipo_cta_1`, `tipo_cta_2`, `email2`, `email3`, `email4`, `cargo_contactop1`, `contacto_personal2`, `cargo_contactop2`, `correotipo`) VALUES
(19, '96861280-8', 'EUROCAPITAL S.A ', 'rnunez@eurocapital.cl', '', 'cpacheco', 'AVDA APOQUINDO Nº 3000 OF 603 LAS CONDES  ', '', '04388771', '356021470-5', 'SANTANDER', 'BANCO CHILE', 'CTA. CTE.', 'CTA. CTE.', 'cpacheco@eurocapital.cl', 'respinoza@eurocapital.cl', 'csierralta@eurocapital.cl', '', '', '', NULL),
(20, '99500410-0', 'BANCO CONSORCIO', 'cobranzas@bancoconsorcio.cl', '22915 4454  ', 'Karen Bravo S.', 'EL BOSQUE SUR 130 PISO 7 LAS CONDES    ', '', '65099-04', '', 'Cta. del Banco Chile', '', 'CTA. CTE.', '', 'kbravo@bancoconsorcio.cl', 'hcubillos@bancoconsorcio.cl', '', 'Ejecutivo Factoring Empresas', 'Héctor Cubillos', 'Jefe Plataforma Factoring', NULL),
(21, '76299831-9', 'BANFACTORING SA', 'Frequena@banfactoring.cl', '', 'FREQUENA', 'FIDEL OTEIZA 1971 OF 301 SANTIAGO', '', '', '', 'SANTANDER', '', 'CTA. CTE.', '', 'Frequena@banfactoring.cl', '', '', '', '', '', NULL),
(22, '76887945-1', 'VIRACOCHA SERVICIOS FINANCIEROS SPA', 'finanzas@viracocha.cl', '(56) (34) 24477', 'CARLOS NELIDOW', 'AVDA. ARGENTINA ORIENTE 17 OF 312 LOS ANDES', '(56) (9) 445917', '72913531', '', 'SANTANDER', '', 'CTA. CTE.', '', 'CARLOS.NELIDOW@VIRACOCHA.CL', 'aline.bravo@viracocha.cl', '', 'Comercial', 'Aline Bravo', 'Finanzas ', 'DEUDA CON VIRACOCHA \nLos datos para transferencia:\nVIRACOCHA SERVICIOS FINANCIEROS SPA\nRUT: 76.887.945-1\nDIRECCION: AVDA. ARGENTINA ORIENTE 17 OF 312 LOS ANDES\nCORREO: CARLOS.NELIDOW@VIRACOCHA.CL\nBANCO: Santander\nNum CTA   72913531\nTIPO DE CUENTA: Cuenta Corriente\nFono (56) (34) 2447747\nFono (56) (9) 44591716\ncristian.cifuentes@viracocha.cl\nfinanzas@viracocha.cl'),
(23, '76562786-9', 'BICE FACTORING S. A.', 'gustavo.urzua@bice.cl', '+56 2 26922005', 'Gustavo Urzúa O.', 'TEATINOS 280 PISO 18, SANTIAGO', '+569 42189449', '01-33082-9', '', 'BANCO BICE', '', 'CTA. CTE.', '', 'gustavo.urzua@bice.cl', '', 'daniel.schiattino@bice.cl', '', '', '', NULL),
(24, '76261789-7', 'NUEVO CAPITAL S.A.  ', 'avicencio@nuevocapital.cl', '222646137-222646167', 'Ingrid Poblete', 'REYES LAVALLE N° 3194, LAS CONDES, SANTIAGO      ', '84019233/61559135', '0-000-6736191-1', '', 'SANTANDER', '', 'CTA. CTE.', '', 'ipoblete@nuevocapital.cl', 'ltapia@nuevocapital.cl', 'ojorquera@nuevocapital.cl', 'Ejecutiva', '', '', NULL),
(25, '76505525-3', 'FONDO DE INVERSIONES PRIVADO E CAPITAL', 'psoto@ecapital.cl', '', 'PATRICIO SOTO', 'AUGUSTO LEGUIA NORTE N° 100 OF 702, LAS CONDES', '', '', '', '', '', '', '', 'psoto@ecapital.cl', '', '', 'Ejecutivo', '', '', NULL),
(26, '76870660-3', 'SCOTIA AZUL FACTORING LTDA', 'mvelasquezl@bbva.com', '56 32 2657825  ', 'mvelasquezl', 'AVDA COSTANERA SUR 2710, TORRE A PISO 20 LAS CONDES', '9-5393230   ', '', '', '', '', '', '', 'mvelasquezl@bbva.com', '', '', 'Ejecutivo', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `holding`
--

CREATE TABLE `holding` (
  `id_hold` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contacto_personal` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `giro` varchar(150) DEFAULT NULL,
  `comuna_factura` varchar(150) DEFAULT NULL,
  `ciudad_factura` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `holding`
--

INSERT INTO `holding` (`id_hold`, `rut`, `razon_social`, `email`, `telefono`, `contacto_personal`, `direccion`, `giro`, `comuna_factura`, `ciudad_factura`) VALUES
(1, '25225854-5', 'TRANSPORTES FACTOR DISTRIBUCION S.A.', 'dtedistribucion@transfactor.cl', '', 'Maria Ester Cortes', 'SERRANO 63 OF 45', 'TRANSPORTE DE CARGA, ASEO, ORNATO, JARDINES, PAISAJISMO, DISTRIBUCION DE AGUA', 'SANTIAGO', 'SANTIAGO'),
(2, '76367270-0', 'TRANSPORTES FACTOR LTDA', 'dte@transfactor.cl', '+56 34 2344384', 'Maria Ester Cortes', 'SERRANO 63 OF 42', 'TRANSPORTE DE CARGA Y MANEJO DE RESIDUOS', 'SANTIAGO', 'SANTIAGO'),
(3, '76851800-9', 'RENTA EQUIPOS SANTA TERES', 'dterenta@transfactor.cl', '', 'Maria Ester Cortes', 'MANUEL RODRIGUEZ 479', 'ARRIENDO DE VEHICULOS MOTORIZADOS', 'LOS ANDES', 'LOS ANDES'),
(4, '76936703-9', 'LOGISTIC SERVICES SPA', 'dte@transfactor.cl', '', 'Maria Ester Cortes', 'SERRANO 63', 'SERVICIOS DE LOGISTICA Y CONTROL DE BODEGAS', 'SANTIAGO', 'SANTIAGO'),
(5, '76800335-1', 'TRANSFACTOR-MAINPRO S.A.', 'dtetransfactor@transfactor.cl', '', 'Maria Ester Cortes', 'SERRANO 63 OF 27', 'MANTENCION, FABRICACION, REPARACION INDUSTRIAL', 'SANTIAGO', 'SANTIAGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logdoc`
--

CREATE TABLE `logdoc` (
  `idlogdoc` int(11) NOT NULL,
  `fechalog` date DEFAULT NULL,
  `estadoanterior` int(11) DEFAULT NULL,
  `estadoactual` int(11) DEFAULT NULL,
  `usuariolog` int(11) DEFAULT NULL,
  `id_doc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logdoc`
--

INSERT INTO `logdoc` (`idlogdoc`, `fechalog`, `estadoanterior`, `estadoactual`, `usuariolog`, `id_doc`) VALUES
(69, '2019-04-11', 2, 2, 1, 1982),
(70, '2019-04-11', 2, 2, 1, 1982),
(71, '2019-04-11', 2, 2, 1, 1982),
(72, '2019-04-11', 2, 2, 1, 2083),
(73, '2019-04-11', 2, 2, 1, 2083),
(74, '2019-04-11', 1, 1, 1, 2083),
(75, '2019-04-11', 2, 2, 1, 2083),
(76, '2019-04-11', 1, 1, 1, 2083),
(77, '2019-04-11', 2, 2, 1, 1982),
(78, '2019-04-11', 1, 1, 1, 1983),
(79, '2019-04-21', 2, 2, 1, 1983),
(80, '2019-04-21', 2, 2, 1, 1982),
(81, '2019-04-25', 1, 1, 1, 1986),
(82, '2019-04-25', 2, 2, 1, 1986),
(83, '2019-04-25', 2, 2, 1, 1982),
(84, '2019-04-29', 2, 2, 1, 1984),
(85, '2019-04-29', 3, 3, 1, 1985),
(86, '2019-04-30', 1, 1, 1, NULL),
(87, '2019-04-30', 2, 2, 1, 2083),
(88, '2019-04-30', 2, 2, 1, 1988),
(89, '2019-04-30', 2, 2, 1, NULL),
(90, '2019-05-06', 3, 3, 1, 1984),
(91, '2019-05-06', 2, 2, 3, 1989),
(92, '2019-05-06', 2, 2, 3, 1991);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_param`
--

CREATE TABLE `tab_param` (
  `cod_grupo` int(11) DEFAULT NULL,
  `cod_item` int(11) DEFAULT NULL,
  `desc_item` varchar(150) DEFAULT NULL,
  `vig_item` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='			';

--
-- Volcado de datos para la tabla `tab_param`
--

INSERT INTO `tab_param` (`cod_grupo`, `cod_item`, `desc_item`, `vig_item`) VALUES
(1, 0, 'CARGO', b'1'),
(1, 1, 'FINANCIERO', b'1'),
(1, 2, 'ADMINISTRATIVO', b'1'),
(2, 0, 'PERFIL', b'1'),
(2, 1, 'ADMIN', b'1'),
(2, 2, 'SUPERVISOR', b'1'),
(3, 0, 'ESTADO FACTURA', b'1'),
(3, 1, 'SIN MOVIMIENTO', b'1'),
(3, 2, 'FACTORIZADA', b'1'),
(3, 3, 'PRORROGADA', b'1'),
(3, 4, 'CANCELADA DE CLIENTE A FACTOR', b'1'),
(3, 5, 'CANCELADA DE CLIENTE A FACTORING', b'1'),
(3, 6, 'CANCELADA DE FACTOR A FACTORING', b'1'),
(4, 0, 'TIPO DE PAGO', b'1'),
(4, 1, 'TRANSFERENCIA', b'1'),
(4, 2, 'VALE VISTA', b'1'),
(4, 3, 'CHEQUE', b'1'),
(5, 0, 'TIPO DE DOCUMENTO', b'1'),
(5, 1, 'LETRA', b'1'),
(5, 2, 'FACTURA', b'1'),
(5, 3, 'OTRO', b'1'),
(6, 0, 'ESTADO PAGO EXCEDENTE', b'1'),
(6, 1, 'PAGADO', b'1'),
(6, 2, 'DESCONTADO', b'1'),
(3, 7, 'FINALIZADA', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `vigencia` bit(1) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  `nick` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `rut`, `nombre`, `apellido`, `email`, `pass`, `vigencia`, `cargo`, `perfil`, `nick`) VALUES
(1, '17164970-6', 'Patrik', 'Pimentel', 'ppimentel@andescode.cl', '9407c826d8e3c07ad37cb2d13d1cb641', b'1', 2, 2, 'PPIMENTEL'),
(3, '11943646-k', 'Maria Ester', 'Cortes', 'mcortes@transfactor.cl', 'dc504ca281447e55c92e9b3235545204', b'1', 2, 1, 'MCORTES'),
(4, '15555596-3', 'Francisco', 'Zapata', 'fjze@negro.cl', '3981873d34ef43c84da8713785ecf4e2', b'1', 1, 1, 'FJZE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`,`numero_doc`),
  ADD KEY `fk_doc_cli_idx` (`id_cli`),
  ADD KEY `fk_doc_fac_idx` (`id_fact`),
  ADD KEY `fk_doc_hold_idx` (`id_hold`),
  ADD KEY `fk_doc_usu_idx` (`id_usu`);

--
-- Indices de la tabla `factoring`
--
ALTER TABLE `factoring`
  ADD PRIMARY KEY (`id_factoring`);

--
-- Indices de la tabla `holding`
--
ALTER TABLE `holding`
  ADD PRIMARY KEY (`id_hold`);

--
-- Indices de la tabla `logdoc`
--
ALTER TABLE `logdoc`
  ADD PRIMARY KEY (`idlogdoc`),
  ADD KEY `log_user_idx` (`usuariolog`),
  ADD KEY `log_doc_idx` (`id_doc`),
  ADD KEY `log_doc` (`id_doc`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2085;

--
-- AUTO_INCREMENT de la tabla `factoring`
--
ALTER TABLE `factoring`
  MODIFY `id_factoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `holding`
--
ALTER TABLE `holding`
  MODIFY `id_hold` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `logdoc`
--
ALTER TABLE `logdoc`
  MODIFY `idlogdoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_doc_cli` FOREIGN KEY (`id_cli`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_doc_fac` FOREIGN KEY (`id_fact`) REFERENCES `factoring` (`id_factoring`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_doc_hold` FOREIGN KEY (`id_hold`) REFERENCES `holding` (`id_hold`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_doc_usu` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `logdoc`
--
ALTER TABLE `logdoc`
  ADD CONSTRAINT `log_doc` FOREIGN KEY (`id_doc`) REFERENCES `documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `log_user` FOREIGN KEY (`usuariolog`) REFERENCES `usuario` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
