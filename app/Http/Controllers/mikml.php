<?php


    //GenerarKml("Senadores","Distrito 3","2018-05-31");


    function GenerarKml($tipo,$distrito,$fecha)
    {
        $dis = (int)substr($distrito, 9, 1);
        
        // CARGAR KML DEL DISTRITO
        $buscaColor = false; $esFolder=false; $iNombre=false; 
        $lineaDeNombre = 0; $noPuntos=0; $noRenglones=0;
        $punto = array();
        $posicion = array();

        $archivoDeEntrada = file("kml/Distrito" . $dis . ".kml");

        $renglon = array();
        $a=0;
        foreach($archivoDeEntrada as $num_linea => $linea)
        {
            $renglon[] = $linea;
            if(($buscaColor == true) && (strpos($linea,'<styleUrl>') !== false))
            {
                $buscaColor = False;
                $posicion[] = $a;
            }
            if(strpos($linea,'<Folder') !== false) { $esFolder = true; }
            else
            {
                if( (strpos($linea,'<name>') !== false) && ($esFolder == false) )
                {
                    if($iNombre == false) 
                    {
                        $iNombre = true;
                        $lineaDeNombre = $a;
                    }
                    else
                    {
                        $punto[] = (int)ObtenerNombreDeEtiqueta($linea,'<name>');
                        $noPuntos++;
                        $buscaColor=true;
                    }
                }
                else
                {
                    $esFolder = false;       
                }
            }
            $a++;
        }
        $noRenglones = $a;
        
        // CARGAR DATOS DE CONSULTA
        if(strcmp($tipo,'Diputados')==0) { $liga = 'http://verify.encuestasbc.org/api/diputadosPorDistrito/' . $dis . '/' . $fecha; }
        else { $liga = 'http://verify.encuestasbc.org/api/senadoresPorDistrito/' . $dis . '/' . $fecha; }
        
        $datos = file_get_contents($liga);
        $secciones = json_decode($datos, true);
        $noAsignaciones = count($secciones);
        $seccion = array();
        $color = array();
        for($a=0; $a<$noAsignaciones; $a++ )
        {
            $seccion[]=(int)$secciones[$a]["seccion"];
            $color[]=BuscarColor($secciones[$a]["c_pan"],$secciones[$a]["c_pri"],$secciones[$a]["c_morena"]);
        }
        
        // COMBINAR ARCHIVOS
        $pos1 = 0; $pos2 = 0;
        $temp1=''; $temp2=''; $temp3='';
        $colores = array( "", "#falseColor100", "#falseColor14", "#falseColor11", "#falseColor13", "#falseColor10", "#falseColor12", "#falseColor1" );
        for($a=0; $a<$noAsignaciones; $a++)
        {
            for($b=0; $b<$noPuntos; $b++)
            {
                if($seccion[$a] == $punto[$b])
                {
                    $temp1 = $renglon[$posicion[$b]];
                    $pos1 = strpos($temp1,'#falseColor');
                    $pos2 = strpos($temp1,'</styleUrl>');
                    $temp2 = substr($temp1, $pos2, strlen($temp1) - $pos2);
                    $temp3 = substr($temp1, 0, $pos1);
                    $renglon[$posicion[$b]] = $temp3 . $colores[$color[$a]] . $temp2;
                }
            }
        }
        
        // GUARDAR ARCHIVO
        $nombreArchivo = "kml/". $tipo . $dis . ".kml";
        if(file_exists($nombreArchivo)) { unlink($nombreArchivo); }
        $archivoDeSalida = fopen($nombreArchivo,"w") or die ("BUUU!!");
        for($a=0; $a<$noRenglones; $a++)
        {
            fwrite($archivoDeSalida, $renglon[$a]);
        }
        fclose($archivoDeSalida);
    }
        
    function ObtenerNombreDeEtiqueta($cadena,$etiqueta)
    {
        $e1 = 0; $e2 = 0; $largo = 0;
        $valor = ''; $cierre = '';
        $cierre = '</' . substr($etiqueta,1,(strlen($etiqueta)-1));
        $e1 = strpos($cadena,$etiqueta);
        $e2 = strpos($cadena,$cierre);
        $largo = strlen($etiqueta);
        $valor = substr($cadena, $e1 + $largo, strlen($cadena) - ($e1 + $largo + 1));
        return $valor;
    }

    function BuscarColor($pan,$pri,$mor)
    {
        $est = 7;
        $fpan = (double)$pan;
        $fpri = (double)$pri;
        $fmor = (double)$mor;
        $panpri = abs($fpan-$fpri);
        $primor = abs($fpri-$fmor);
        $panmor = abs($fpan-$fmor);
        if( ($fpan > $fpri) && ($fpan > $fmor) )  { $est=1; }
        if( ($fpri > $fpan) && ($fpri > $fmor) )  { $est=2; }
        if( ($fmor > $fpri) && ($fmor > $fpan) )  { $est=3; }
        if( ($est != 2) && ($panmor <= 2) )        { $est=4; }
        elseif( ($est != 3) && ($panpri <= 2) )    { $est=5; }
        elseif( ($est != 1) && ($primor <= 2) )    { $est=6; }
        return $est;
    }       

?>