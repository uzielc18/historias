
--
-- Estructura para la vista `views_productos`
--
DROP TABLE IF EXISTS `views_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `views_productos`  AS  select `p`.`id` AS `id`,concat_ws('',`p`.`nombre`,`s`.`nombre`,`a`.`nombre`,`f`.`nombre`) AS `detalle`, `p`.`testipoproductos_id` AS `testipoproductos_id` from ((((((`tesproductos` `p` join `testipoproductos` `t` on(((`t`.`id` = `p`.`testipoproductos_id`) and (`t`.`teslineaproductos_id` = 3)))) join `tesdetalleingresos` `dp` on((`dp`.`tesproductos_id` = `p`.`id`))) join `tescolores` `c` on((`dp`.`tescolores_id` = `c`.`id`))) left join `hilosistema` `s` on((`s`.`id` = `p`.`hilosistema_id`))) left join `hiloacabados` `a` on((`a`.`id` = `p`.`hiloacabados_id`))) left join `hilofibras` `f` on((`f`.`id` = `p`.`hilofibras_id`))) group by `dp`.`tesproductos_id` order by `p`.`nombre` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `views_productos_color`
--
DROP TABLE IF EXISTS `views_productos_color`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `views_productos_color`  AS  select `p`.`id` AS `pid`,`dp`.`lote` AS `lote`,`p`.`hilosistema_id` AS `hilosistema_id`,`s`.`nombre` AS `sistema`,`p`.`nombre` AS `titulo`,`t`.`nombre` AS `material`,`p`.`hiloacabados_id` AS `hiloacabados_id`,`a`.`nombre` AS `tipo_material`,`p`.`hilofibras_id` AS `hilofibras_id`,`f`.`nombre` AS `caracteristicas`,`c`.`nombre` AS `color`,`t`.`id` AS `tid`,`c`.`id` AS `cid`,`dp`.`tescolores_id` AS `tescolores_id`, `p`.`testipoproductos_id` AS `testipoproductos_id` from ((((((`tesproductos` `p` join `testipoproductos` `t` on(((`t`.`id` = `p`.`testipoproductos_id`) and (`t`.`teslineaproductos_id` = 3)))) join `tesdetalleingresos` `dp` on((`dp`.`tesproductos_id` = `p`.`id`))) join `tescolores` `c` on((`dp`.`tescolores_id` = `c`.`id`))) left join `hilosistema` `s` on((`s`.`id` = `p`.`hilosistema_id`))) left join `hiloacabados` `a` on((`a`.`id` = `p`.`hiloacabados_id`))) left join `hilofibras` `f` on((`f`.`id` = `p`.`hilofibras_id`))) group by `dp`.`tescolores_id`,`dp`.`tesproductos_id` order by `p`.`hilosistema_id`,`p`.`nombre`,`c`.`nombre` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `views_producto_color_lote`
--
DROP TABLE IF EXISTS `views_producto_color_lote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `views_producto_color_lote`  AS  select `p`.`id` AS `pid`,`dp`.`lote` AS `lote`,`p`.`hilosistema_id` AS `hilosistema_id`,`s`.`nombre` AS `sistema`,`p`.`nombre` AS `titulo`,`t`.`nombre` AS `material`,`p`.`hiloacabados_id` AS `hiloacabados_id`,`a`.`nombre` AS `tipo_material`,`p`.`hilofibras_id` AS `hilofibras_id`,`f`.`nombre` AS `caracteristicas`,`c`.`nombre` AS `color`,`t`.`id` AS `tid`,`c`.`id` AS `cid`,`dp`.`tescolores_id` AS `tescolores_id`, `p`.`testipoproductos_id` AS `testipoproductos_id` from ((((((`tesproductos` `p` join `testipoproductos` `t` on(((`t`.`id` = `p`.`testipoproductos_id`) and (`t`.`teslineaproductos_id` = 3)))) join `tesdetalleingresos` `dp` on((`dp`.`tesproductos_id` = `p`.`id`))) join `tescolores` `c` on((`dp`.`tescolores_id` = `c`.`id`))) left join `hilosistema` `s` on((`s`.`id` = `p`.`hilosistema_id`))) left join `hiloacabados` `a` on((`a`.`id` = `p`.`hiloacabados_id`))) left join `hilofibras` `f` on((`f`.`id` = `p`.`hilofibras_id`))) group by `dp`.`lote`,`dp`.`tescolores_id`,`dp`.`tesproductos_id` order by `p`.`hilosistema_id`,`p`.`nombre`,`c`.`nombre` ;


-- --------------------------------------------------------

--
-- Estructura para la vista `view_rollos`
--
DROP TABLE IF EXISTS `view_rollos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rollos`  AS  select `p`.`id` AS `id`,`p`.`testipoproductos_id` AS `testipoproductos_id`,`r`.`tescolores_id` AS `tescolores_id`,`r`.`color` AS `color_venta`,`p`.`codigo` AS `codigo`,`p`.`codigo_ant` AS `codigo_ant`,concat_ws(' ',`p`.`nombre`,`p`.`detalle`) AS `descripcion`,concat_ws('-',`r`.`codigo`) AS `piezza`,`r`.`numeroventa` AS `nventa`,`r`.`calidad` AS `calidad`,`r`.`fechacorte` AS `fecha`,`r`.`metros` AS `metros`,`r`.`peso` AS `kilos`,`r`.`estadorollo` AS `estadorollo`,`r`.`ordencompra` AS `rodencompra`,`r`.`ancho` AS `ancho`,`r`.`anchoutil` AS `anchoutil`,ifnull((select `tesdatos`.`razonsocial` from `tesdatos` where (`tesdatos`.`id` = `o`.`tesdatos_id`)),NULL) AS `razonsocial` from (((`prorollos` `r` left join `tescolores` `c` on((`c`.`id` = `r`.`tescolores_id`))) left join `tesordendecompras` `o` on((`r`.`tesordendecompras_id` = `o`.`id`))) join `tesproductos` `p` on((`p`.`id` = `r`.`tesproductos_id`))) order by `p`.`nombre`,`r`.`color`,`r`.`numeroventa` ;

