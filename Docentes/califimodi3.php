<?php

if(isset($_POST['btnPostMec200'])){  
          //numeroControl ,     post unidadtema,     post calificacion       comentario         ,   $opor             ,  $idgrupo          
    calificar($numeros3[0], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow3[5]);
}
if(isset($_POST['btnPostMem200'])){  
           //numeroControl ,     post unidadtema,     post calificacion       comentario         ,   $opor             ,  $idgrupo        
    modificar($numeros3[0], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow3[5]);
}
if(isset($_POST['btnPostMep200'])){
             //numeroControl ,  idgrupo,        comentario 
    promediar($numeros3[0], $dataRow3[5], $_POST["comentario"]); 
}
//=====================================================================================================================
if(isset($_POST['btnPostMec201'])){          
    calificar($numeros3[1], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem201'])){          
    modificar($numeros3[1], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep201'])){
    promediar($numeros3[1], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec202'])){          
    calificar($numeros3[2], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem202'])){          
    modificar($numeros3[2], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep202'])){
    promediar($numeros3[2], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec203'])){          
    calificar($numeros3[3], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem203'])){          
    modificar($numeros3[3], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep203'])){
    promediar($numeros3[3], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec204'])){          
    calificar($numeros3[4], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem204'])){          
    modificar($numeros3[4], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep204'])){
    promediar($numeros3[4], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec205'])){          
    calificar($numeros3[5], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem205'])){          
    modificar($numeros3[5], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep205'])){
    promediar($numeros3[5], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec206'])){          
    calificar($numeros3[6], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem206'])){          
    modificar($numeros3[6], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep206'])){
    promediar($numeros3[6], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec207'])){          
    calificar($numeros3[7], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem207'])){          
    modificar($numeros3[7], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep207'])){
    promediar($numeros3[7], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec208'])){          
    calificar($numeros3[8], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem208'])){          
    modificar($numeros3[8], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep208'])){
    promediar($numeros3[8], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec209'])){          
    calificar($numeros3[9], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem209'])){          
    modificar($numeros3[9], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep209'])){
    promediar($numeros3[9], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec210'])){          
    calificar($numeros3[10], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem210'])){          
    modificar($numeros3[10], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep210'])){
    promediar($numeros3[10], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec211'])){          
    calificar($numeros3[11], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem211'])){          
    modificar($numeros3[11], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep211'])){
    promediar($numeros3[11], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec212'])){          
    calificar($numeros3[12], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem212'])){          
    modificar($numeros3[12], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep212'])){
    promediar($numeros3[12], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec213'])){          
    calificar($numeros3[13], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem213'])){          
    modificar($numeros3[13], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep213'])){
    promediar($numeros3[13], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec214'])){          
    calificar($numeros3[14], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem214'])){          
    modificar($numeros3[14], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep214'])){
    promediar($numeros3[14], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec215'])){          
    calificar($numeros3[15], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem215'])){          
    modificar($numeros3[15], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep215'])){
    promediar($numeros3[15], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec216'])){          
    calificar($numeros3[16], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem216'])){          
    modificar($numeros3[16], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep216'])){
    promediar($numeros3[16], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec217'])){          
    calificar($numeros3[17], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem217'])){          
    modificar($numeros3[17], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep217'])){
    promediar($numeros3[17], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec218'])){          
    calificar($numeros3[18], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem218'])){          
    modificar($numeros3[18], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep218'])){
    promediar($numeros3[18], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec219'])){          
    calificar($numeros3[19], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem219'])){          
    modificar($numeros3[19], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep219'])){
    promediar($numeros3[19], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec220'])){          
    calificar($numeros3[20], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem220'])){          
    modificar($numeros3[20], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep220'])){
    promediar($numeros3[20], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec221'])){          
    calificar($numeros3[21], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem221'])){          
    modificar($numeros3[21], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep221'])){
    promediar($numeros3[21], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec222'])){          
    calificar($numeros3[22], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem222'])){          
    modificar($numeros3[22], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep222'])){
    promediar($numeros3[22], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec223'])){          
    calificar($numeros3[23], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem223'])){          
    modificar($numeros3[23], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep223'])){
    promediar($numeros3[23], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec224'])){          
    calificar($numeros3[24], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem224'])){          
    modificar($numeros3[24], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep224'])){
    promediar($numeros3[24], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec225'])){          
    calificar($numeros3[25], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem225'])){          
    modificar($numeros3[25], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep225'])){
    promediar($numeros3[25], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec226'])){          
    calificar($numeros3[26], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem226'])){          
    modificar($numeros3[26], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep226'])){
    promediar($numeros3[26], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec227'])){          
    calificar($numeros3[27], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem227'])){          
    modificar($numeros3[27], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep227'])){
    promediar($numeros3[27], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec228'])){          
    calificar($numeros3[28], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem228'])){          
    modificar($numeros3[28], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep228'])){
    promediar($numeros3[28], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec229'])){          
    calificar($numeros3[29], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem229'])){          
    modificar($numeros3[29], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep229'])){
    promediar($numeros3[29], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec230'])){          
    calificar($numeros3[30], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem230'])){          
    modificar($numeros3[30], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep230'])){
    promediar($numeros3[30], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec231'])){          
    calificar($numeros3[31], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem231'])){          
    modificar($numeros3[31], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep231'])){
    promediar($numeros3[31], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec232'])){          
    calificar($numeros3[32], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem232'])){          
    modificar($numeros3[32], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep232'])){
    promediar($numeros3[32], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec233'])){          
    calificar($numeros3[33], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem233'])){          
    modificar($numeros3[33], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep233'])){
    promediar($numeros3[33], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec234'])){          
    calificar($numeros3[34], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem234'])){          
    modificar($numeros3[34], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep234'])){
    promediar($numeros3[34], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec235'])){          
    calificar($numeros3[35], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem235'])){          
    modificar($numeros3[35], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep235'])){
    promediar($numeros3[35], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec236'])){          
    calificar($numeros3[36], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem236'])){          
    modificar($numeros3[36], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep236'])){
    promediar($numeros3[36], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec237'])){          
    calificar($numeros3[37], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem237'])){          
    modificar($numeros3[37], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep237'])){
    promediar($numeros3[37], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec238'])){          
    calificar($numeros3[38], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem238'])){          
    modificar($numeros3[38], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep238'])){
    promediar($numeros3[38], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec239'])){          
    calificar($numeros3[39], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem239'])){          
    modificar($numeros3[39], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep239'])){
    promediar($numeros3[39], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec240'])){          
    calificar($numeros3[40], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem240'])){          
    modificar($numeros3[40], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep240'])){
    promediar($numeros3[40], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec241'])){          
    calificar($numeros3[41], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem241'])){          
    modificar($numeros3[41], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep241'])){
    promediar($numeros3[41], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec242'])){          
    calificar($numeros3[42], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem242'])){          
    modificar($numeros3[42], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep242'])){
    promediar($numeros3[42], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec243'])){          
    calificar($numeros3[43], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem243'])){          
    modificar($numeros3[43], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep243'])){
    promediar($numeros3[43], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec244'])){          
    calificar($numeros3[44], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem244'])){          
    modificar($numeros3[44], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep244'])){
    promediar($numeros3[44], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec245'])){          
    calificar($numeros3[45], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem245'])){          
    modificar($numeros3[45], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep245'])){
    promediar($numeros3[45], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec246'])){          
    calificar($numeros3[46], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem246'])){          
    modificar($numeros3[46], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep246'])){
    promediar($numeros3[46], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec247'])){          
    calificar($numeros3[47], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem247'])){          
    modificar($numeros3[47], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep247'])){
    promediar($numeros3[47], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec248'])){          
    calificar($numeros3[48], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem248'])){          
    modificar($numeros3[48], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep248'])){
    promediar($numeros3[48], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec249'])){          
    calificar($numeros3[49], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem249'])){          
    modificar($numeros3[49], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep249'])){
    promediar($numeros3[49], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec250'])){          
    calificar($numeros3[50], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem250'])){          
    modificar($numeros3[50], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep250'])){
    promediar($numeros3[50], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec251'])){          
    calificar($numeros3[51], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem251'])){          
    modificar($numeros3[51], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep251'])){
    promediar($numeros3[51], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec252'])){          
    calificar($numeros3[52], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem252'])){          
    modificar($numeros3[52], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep252'])){
    promediar($numeros3[52], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec253'])){          
    calificar($numeros3[53], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem253'])){          
    modificar($numeros3[53], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep253'])){
    promediar($numeros3[53], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec254'])){          
    calificar($numeros3[54], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem254'])){          
    modificar($numeros3[54], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep254'])){
    promediar($numeros3[54], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec255'])){          
    calificar($numeros3[55], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem255'])){          
    modificar($numeros3[55], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep255'])){
    promediar($numeros3[55], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec256'])){          
    calificar($numeros3[56], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem256'])){          
    modificar($numeros3[56], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep256'])){
    promediar($numeros3[56], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec257'])){          
    calificar($numeros3[57], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem257'])){          
    modificar($numeros3[57], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep257'])){
    promediar($numeros3[57], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec258'])){          
    calificar($numeros3[58], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem258'])){          
    modificar($numeros3[58], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep258'])){
    promediar($numeros3[58], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec259'])){          
    calificar($numeros3[59], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem259'])){          
    modificar($numeros3[59], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep259'])){
    promediar($numeros3[59], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec260'])){          
    calificar($numeros3[60], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem260'])){          
    modificar($numeros3[60], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep260'])){
    promediar($numeros3[60], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec261'])){          
    calificar($numeros3[61], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem261'])){          
    modificar($numeros3[61], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep261'])){
    promediar($numeros3[61], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec262'])){          
    calificar($numeros3[62], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem262'])){          
    modificar($numeros3[62], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep262'])){
    promediar($numeros3[62], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec263'])){          
    calificar($numeros3[63], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem263'])){          
    modificar($numeros3[63], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep263'])){
    promediar($numeros3[63], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec264'])){          
    calificar($numeros3[64], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem264'])){          
    modificar($numeros3[64], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep264'])){
    promediar($numeros3[64], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec265'])){          
    calificar($numeros3[65], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem265'])){          
    modificar($numeros3[65], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep265'])){
    promediar($numeros3[65], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec266'])){          
    calificar($numeros3[66], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem266'])){          
    modificar($numeros3[66], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep266'])){
    promediar($numeros3[66], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec267'])){          
    calificar($numeros3[67], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem267'])){          
    modificar($numeros3[67], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep267'])){
    promediar($numeros3[67], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec268'])){          
    calificar($numeros3[68], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem268'])){          
    modificar($numeros3[68], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep268'])){
    promediar($numeros3[68], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec269'])){          
    calificar($numeros3[69], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem269'])){          
    modificar($numeros3[69], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep269'])){
    promediar($numeros3[69], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

if(isset($_POST['btnPostMec270'])){          
    calificar($numeros3[70], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem270'])){          
    modificar($numeros3[70], $dataRow3[0], $dataRow3[1], $_POST["parcial"], $dataRow3[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow3[2], $dataRow3[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep270'])){
    promediar($numeros3[70], $dataRow3[0], $dataRow3[1],$dataRow3[3], $dataRow3[2],$dataRow3[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

?>