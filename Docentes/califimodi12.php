<?php

if(isset($_POST['btnPostMec1100'])){  
          //numeroControl ,    nivel,       grupo,        post parcial,      periodo,      post calificacion      ismaestro                carrera,    modalidad,       comentario         
    calificar($numeros12[0],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1100'])){  
           //numeroControl ,   nivel,       grupo,        post parcial,      periodo,     post calificacion,        ismaestro             carrera,     modalidad,    comentario          
    calificar($numeros12[0],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1100'])){
             //numeroControl , nivel,       grupo,    modalidad,     carrera,       periodo,   idmaestro,    comentario,     conexión 
    promediar($numeros12[0], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1101'])){          
    calificar($numeros12[1],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1101'])){          
    calificar($numeros12[1],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1101'])){
    promediar($numeros12[1], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1102'])){          
    calificar($numeros12[2],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1102'])){          
    calificar($numeros12[2],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1102'])){
    promediar($numeros12[2], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1103'])){          
    calificar($numeros12[3],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1103'])){          
    calificar($numeros12[3],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1103'])){
    promediar($numeros12[3], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1104'])){          
    calificar($numeros12[4],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1104'])){          
    calificar($numeros12[4],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1104'])){
    promediar($numeros12[4], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1105'])){          
    calificar($numeros12[5],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1105'])){          
    calificar($numeros12[5],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1105'])){
    promediar($numeros12[5], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1106'])){          
    calificar($numeros12[6],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1106'])){          
    calificar($numeros12[6],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1106'])){
    promediar($numeros12[6], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1107'])){          
    calificar($numeros12[7],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1107'])){          
    calificar($numeros12[7],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1107'])){
    promediar($numeros12[7], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1108'])){          
    calificar($numeros12[8],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1108'])){          
    calificar($numeros12[8],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1108'])){
    promediar($numeros12[8], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1109'])){          
    calificar($numeros12[9],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1109'])){          
    calificar($numeros12[9],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1109'])){
    promediar($numeros12[9], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1110'])){          
    calificar($numeros12[10],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1110'])){          
    calificar($numeros12[10],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1110'])){
    promediar($numeros12[10], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1111'])){          
    calificar($numeros12[11],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1111'])){          
    calificar($numeros12[11],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1111'])){
    promediar($numeros12[11], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1112'])){          
    calificar($numeros12[12],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1112'])){          
    calificar($numeros12[12],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1112'])){
    promediar($numeros12[12], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1113'])){          
    calificar($numeros12[13],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1113'])){          
    calificar($numeros12[13],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1113'])){
    promediar($numeros12[13], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1114'])){          
    calificar($numeros12[14],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1114'])){          
    calificar($numeros12[14],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1114'])){
    promediar($numeros12[14], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1115'])){          
    calificar($numeros12[15],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1115'])){          
    calificar($numeros12[15],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1115'])){
    promediar($numeros12[15], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1116'])){          
    calificar($numeros12[16],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1116'])){          
    calificar($numeros12[16],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1116'])){
    promediar($numeros12[16], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1117'])){          
    calificar($numeros12[17],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1117'])){          
    calificar($numeros12[17],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1117'])){
    promediar($numeros12[17], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1118'])){          
    calificar($numeros12[18],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1118'])){          
    calificar($numeros12[18],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1118'])){
    promediar($numeros12[18], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1119'])){          
    calificar($numeros12[19],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1119'])){          
    calificar($numeros12[19],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1119'])){
    promediar($numeros12[19], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1120'])){          
    calificar($numeros12[20],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1120'])){          
    calificar($numeros12[20],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1120'])){
    promediar($numeros12[20], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1121'])){          
    calificar($numeros12[21],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1121'])){          
    calificar($numeros12[21],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1121'])){
    promediar($numeros12[21], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1122'])){          
    calificar($numeros12[22],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1122'])){          
    calificar($numeros12[22],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1122'])){
    promediar($numeros12[22], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1123'])){          
    calificar($numeros12[23],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1123'])){          
    calificar($numeros12[23],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1123'])){
    promediar($numeros12[23], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1124'])){          
    calificar($numeros12[24],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1124'])){          
    calificar($numeros12[24],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1124'])){
    promediar($numeros12[24], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1125'])){          
    calificar($numeros12[25],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1125'])){          
    calificar($numeros12[25],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1125'])){
    promediar($numeros12[25], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1126'])){          
    calificar($numeros12[26],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1126'])){          
    calificar($numeros12[26],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1126'])){
    promediar($numeros12[26], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1127'])){          
    calificar($numeros12[27],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1127'])){          
    calificar($numeros12[27],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1127'])){
    promediar($numeros12[27], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1128'])){          
    calificar($numeros12[28],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1128'])){          
    calificar($numeros12[28],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1128'])){
    promediar($numeros12[28], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1129'])){          
    calificar($numeros12[29],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1129'])){          
    calificar($numeros12[29],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1129'])){
    promediar($numeros12[29], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1130'])){          
    calificar($numeros12[30],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1130'])){          
    calificar($numeros12[30],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1130'])){
    promediar($numeros12[30], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1131'])){          
    calificar($numeros12[31],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1131'])){          
    calificar($numeros12[31],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1131'])){
    promediar($numeros12[31], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1132'])){          
    calificar($numeros12[32],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1132'])){          
    calificar($numeros12[32],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1132'])){
    promediar($numeros12[32], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1133'])){          
    calificar($numeros12[33],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1133'])){          
    calificar($numeros12[33],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1133'])){
    promediar($numeros12[33], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1134'])){          
    calificar($numeros12[34],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1134'])){          
    calificar($numeros12[34],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1134'])){
    promediar($numeros12[34], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1135'])){          
    calificar($numeros12[35],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1135'])){          
    calificar($numeros12[35],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1135'])){
    promediar($numeros12[35], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1136'])){          
    calificar($numeros12[36],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1136'])){          
    calificar($numeros12[36],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1136'])){
    promediar($numeros12[36], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1137'])){          
    calificar($numeros12[37],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1137'])){          
    calificar($numeros12[37],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1137'])){
    promediar($numeros12[37], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1138'])){          
    calificar($numeros12[38],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1138'])){          
    calificar($numeros12[38],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1138'])){
    promediar($numeros12[38], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1139'])){          
    calificar($numeros12[39],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1139'])){          
    calificar($numeros12[39],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1139'])){
    promediar($numeros12[39], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1140'])){          
    calificar($numeros12[40],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1140'])){          
    calificar($numeros12[40],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1140'])){
    promediar($numeros12[40], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1141'])){          
    calificar($numeros12[41],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1141'])){          
    calificar($numeros12[41],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1141'])){
    promediar($numeros12[41], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1142'])){          
    calificar($numeros12[42],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1142'])){          
    calificar($numeros12[42],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1142'])){
    promediar($numeros12[42], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1143'])){          
    calificar($numeros12[43],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1143'])){          
    calificar($numeros12[43],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1143'])){
    promediar($numeros12[43], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1144'])){          
    calificar($numeros12[44],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1144'])){          
    calificar($numeros12[44],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1144'])){
    promediar($numeros12[44], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1145'])){          
    calificar($numeros12[45],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1145'])){          
    calificar($numeros12[45],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1145'])){
    promediar($numeros12[45], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1146'])){          
    calificar($numeros12[46],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1146'])){          
    calificar($numeros12[46],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1146'])){
    promediar($numeros12[46], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1147'])){          
    calificar($numeros12[47],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1147'])){          
    calificar($numeros12[47],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1147'])){
    promediar($numeros12[47], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1148'])){          
    calificar($numeros12[48],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1148'])){          
    calificar($numeros12[48],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1148'])){
    promediar($numeros12[48], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1149'])){          
    calificar($numeros12[49],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1149'])){          
    calificar($numeros12[49],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1149'])){
    promediar($numeros12[49], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1150'])){          
    calificar($numeros12[50],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1150'])){          
    calificar($numeros12[50],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1150'])){
    promediar($numeros12[50], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1151'])){          
    calificar($numeros12[51],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1151'])){          
    calificar($numeros12[51],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1151'])){
    promediar($numeros12[51], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1152'])){          
    calificar($numeros12[52],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1152'])){          
    calificar($numeros12[52],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1152'])){
    promediar($numeros12[52], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1153'])){          
    calificar($numeros12[53],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1153'])){          
    calificar($numeros12[53],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1153'])){
    promediar($numeros12[53], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1154'])){          
    calificar($numeros12[54],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1154'])){          
    calificar($numeros12[54],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1154'])){
    promediar($numeros12[54], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1155'])){          
    calificar($numeros12[55],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1155'])){          
    calificar($numeros12[55],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1155'])){
    promediar($numeros12[55], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1156'])){          
    calificar($numeros12[56],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1156'])){          
    calificar($numeros12[56],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1156'])){
    promediar($numeros12[56], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1157'])){          
    calificar($numeros12[57],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1157'])){          
    calificar($numeros12[57],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1157'])){
    promediar($numeros12[57], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1158'])){          
    calificar($numeros12[58],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1158'])){          
    calificar($numeros12[58],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1158'])){
    promediar($numeros12[58], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1159'])){          
    calificar($numeros12[59],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1159'])){          
    calificar($numeros12[59],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1159'])){
    promediar($numeros12[59], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1160'])){          
    calificar($numeros12[60],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1160'])){          
    calificar($numeros12[60],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1160'])){
    promediar($numeros12[60], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1161'])){          
    calificar($numeros12[61],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem1161'])){          
    calificar($numeros12[61],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1161'])){
    promediar($numeros12[61], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1162'])){          
    calificar($numeros12[62],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1162'])){          
    calificar($numeros12[62],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1162'])){
    promediar($numeros12[62], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1163'])){          
    calificar($numeros12[63],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1163'])){          
    calificar($numeros12[63],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1163'])){
    promediar($numeros12[63], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1164'])){          
    calificar($numeros12[64],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1164'])){          
    calificar($numeros12[64],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1164'])){
    promediar($numeros12[64], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1165'])){          
    calificar($numeros12[65],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1165'])){          
    calificar($numeros12[65],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep1165'])){
    promediar($numeros12[65], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1166'])){          
    calificar($numeros12[66],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1166'])){          
    calificar($numeros12[66],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1166'])){
    promediar($numeros12[66], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1167'])){          
    calificar($numeros12[67],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1167'])){          
    calificar($numeros12[67],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1167'])){
    promediar($numeros12[67], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1168'])){          
    calificar($numeros12[68],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1168'])){          
    calificar($numeros12[68],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1168'])){
    promediar($numeros12[68], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1169'])){          
    calificar($numeros12[69],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1169'])){          
    calificar($numeros12[69],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1169'])){
    promediar($numeros12[69], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec1170'])){          
    calificar($numeros12[70],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem1170'])){          
    calificar($numeros12[70],$dataRow12[0],$dataRow12[1],$_POST["parcial"],$dataRow12[4],$_POST["calificacion"],$_SESSION["idmaestro"],$dataRow12[2],$dataRow12[3],$_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep1170'])){
    promediar($numeros12[70], $dataRow12[0], $dataRow12[1],$dataRow12[3], $dataRow12[2], $dataRow12[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================

?>