-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2017 a las 05:55:33
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spatricia`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `view_rollos`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rollos`  AS  select `p`.`id` AS `id`,`p`.`testipoproductos_id` AS `testipoproductos_id`,`r`.`tescolores_id` AS `tescolores_id`,`r`.`color` AS `color_venta`,`p`.`codigo` AS `codigo`,`p`.`codigo_ant` AS `codigo_ant`,concat_ws(' ',`p`.`nombre`,`p`.`detalle`) AS `descripcion`,concat_ws('-',`r`.`codigo`) AS `piezza`,`r`.`numeroventa` AS `nventa`,`r`.`calidad` AS `calidad`,`r`.`fechacorte` AS `fecha`,`r`.`metros` AS `metros`,`r`.`peso` AS `kilos`,`r`.`estadorollo` AS `estadorollo`,`r`.`ordencompra` AS `rodencompra`,`r`.`ancho` AS `ancho`,`r`.`anchoutil` AS `anchoutil`,ifnull((select `tesdatos`.`razonsocial` from `tesdatos` where (`tesdatos`.`id` = `o`.`tesdatos_id`)),NULL) AS `razonsocial` from (((`prorollos` `r` left join `tescolores` `c` on((`c`.`id` = `r`.`tescolores_id`))) left join `tesordendecompras` `o` on((`r`.`tesordendecompras_id` = `o`.`id`))) join `tesproductos` `p` on((`p`.`id` = `r`.`tesproductos_id`))) order by `p`.`nombre`,`r`.`color`,`r`.`numeroventa` ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
