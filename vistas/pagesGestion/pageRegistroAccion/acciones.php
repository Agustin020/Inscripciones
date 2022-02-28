<?php
require('../../../modelo/m_consultas.php');
$accion = $_GET['accion'];
$dni = $_GET['dni'];
$co = new Consultas();
if ($accion == 'alta') {
    if ($co->altaEstudiante($dni)) {
        header('Location: ../../../index.php?accion=listarRegistros&alta=ok');
    }
}else if($accion == 'ignorar'){
    if($co->bajaEstudiante($dni)){
        header('Location: ../../../index.php?accion=listarRegistros&alta=ignorar');
    }
}
