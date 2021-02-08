<?php

if(isset($_POST['btnPostMec100'])){  
          //numeroControl ,     post unidadtema,     post calificacion       comentario         ,   $opor             ,  $idgrupo           
    calificar($numeros2[0], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem100'])){  
          //numeroControl ,     post unidadtema,     post calificacion       comentario         ,   $opor             ,  $idgrupo  
    modificar($numeros2[0], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep100'])){
             //numeroControl ,  idgrupo,        comentario 
    promediar($numeros2[0], $dataRow2[5], $_POST["comentario"]); 
    
}
//=====================================================================================================================
if(isset($_POST['btnPostMec101'])){          
    calificar($numeros2[1], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem101'])){          
    modificar($numeros2[1], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep101'])){
    promediar($numeros2[1], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec102'])){          
    calificar($numeros2[2], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);;
}
if(isset($_POST['btnPostMem102'])){          
    modificar($numeros2[2], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep102'])){
    promediar($numeros2[2], $dataRow2[5], $_POST["comentario"]); 
}
//=====================================================================================================================
if(isset($_POST['btnPostMec103'])){          
    calificar($numeros2[3], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem103'])){          
    modificar($numeros2[3], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep103'])){
    promediar($numeros2[3], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec104'])){          
    calificar($numeros2[4], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem104'])){          
    modificar($numeros2[4], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep104'])){
    promediar($numeros2[4], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec105'])){          
    calificar($numeros2[5], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem105'])){          
    modificar($numeros2[5], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep105'])){
    promediar($numeros2[5], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec106'])){          
    calificar($numeros2[6], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem106'])){          
    modificar($numeros2[6], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep106'])){
    promediar($numeros2[6], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec107'])){          
    calificar($numeros2[7], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem107'])){          
    modificar($numeros2[7], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep107'])){
    promediar($numeros2[7], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec108'])){          
    calificar($numeros2[8], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem108'])){          
    modificar($numeros2[8],$_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep108'])){
    promediar($numeros2[8], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec109'])){          
    calificar($numeros2[9], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem109'])){          
    modificar($numeros2[9], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep109'])){
    promediar($numeros2[9], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec110'])){          
    calificar($numeros2[10], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem110'])){          
    modificar($numeros2[10], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep110'])){
    promediar($numeros2[10], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec111'])){          
    calificar($numeros2[11], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem111'])){          
    modificar($numeros2[11], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep111'])){
    promediar($numeros2[11], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec112'])){          
    calificar($numeros2[12], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem112'])){          
    modificar($numeros2[12], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep112'])){
    promediar($numeros2[12], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec113'])){          
    calificar($numeros2[13], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem113'])){          
    modificar($numeros2[13], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep113'])){
    promediar($numeros2[13], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec114'])){          
    calificar($numeros2[14], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem114'])){          
    modificar($numeros2[14], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep114'])){
    promediar($numeros2[14], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec115'])){          
    calificar($numeros2[15], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem115'])){          
    modificar($numeros2[15], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep115'])){
    promediar($numeros2[15], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec116'])){          
    calificar($numeros2[16], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem116'])){          
    modificar($numeros2[16], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep116'])){
    promediar($numeros2[16], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec117'])){          
    calificar($numeros2[17], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem117'])){          
    modificar($numeros2[17], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep117'])){
    promediar($numeros2[17], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec118'])){          
    calificar($numeros2[18], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem118'])){          
    modificar($numeros2[18], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep118'])){
    promediar($numeros2[18], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec119'])){          
    calificar($numeros2[19], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem119'])){          
    modificar($numeros2[19], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep119'])){
    promediar($numeros2[19], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec120'])){          
    calificar($numeros2[20], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem120'])){          
    modificar($numeros2[02], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep120'])){
    promediar($numeros2[20], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec121'])){          
    calificar($numeros2[21], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem121'])){          
    modificar($numeros2[21], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep121'])){
    promediar($numeros2[21], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec122'])){          
    calificar($numeros2[22], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem122'])){          
    modificar($numeros2[22], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep122'])){
    promediar($numeros2[22], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec123'])){          
    calificar($numeros2[23], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem123'])){          
    modificar($numeros2[23], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep123'])){
    promediar($numeros2[23], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec124'])){          
    calificar($numeros2[24], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem124'])){          
    modificar($numeros2[24], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep124'])){
    promediar($numeros2[24], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec125'])){          
    calificar($numeros2[25], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem125'])){          
    modificar($numeros2[25], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep125'])){
    promediar($numeros2[25], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec126'])){          
    calificar($numeros2[26], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem126'])){          
    modificar($numeros2[26], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep126'])){
    promediar($numeros2[26], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec127'])){          
    calificar($numeros2[27], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem127'])){          
    modificar($numeros2[27], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep127'])){
    promediar($numeros2[27], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec128'])){          
    calificar($numeros2[28], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem128'])){          
    modificar($numeros2[28], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep128'])){
    promediar($numeros2[28], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec129'])){          
    calificar($numeros2[29], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem129'])){          
    modificar($numeros2[29], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep129'])){
    promediar($numeros2[29], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec130'])){          
    calificar($numeros2[30], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem130'])){          
    modificar($numeros2[30], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep130'])){
    promediar($numeros2[30], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec131'])){          
    calificar($numeros2[31], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem131'])){          
    modificar($numeros2[31], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep131'])){
    promediar($numeros2[31], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec132'])){          
    calificar($numeros2[32], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem132'])){          
    modificar($numeros2[32], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep132'])){
    promediar($numeros2[32], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec133'])){          
    calificar($numeros2[33], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem133'])){          
    modificar($numeros2[33], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep133'])){
    promediar($numeros2[33], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec134'])){          
    calificar($numeros2[34], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem134'])){          
    modificar($numeros2[34], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep134'])){
    promediar($numeros2[34], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec135'])){          
    calificar($numeros2[35], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem135'])){          
    modificar($numeros2[35], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep135'])){
    promediar($numeros2[35], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec136'])){          
    calificar($numeros2[36], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem136'])){          
    modificar($numeros2[36], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep136'])){
    promediar($numeros2[36], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec137'])){          
    calificar($numeros2[37], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem137'])){          
    modificar($numeros2[37], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep137'])){
    promediar($numeros2[37], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec138'])){          
    calificar($numeros2[38], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem138'])){          
    modificar($numeros2[38], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep138'])){
    promediar($numeros2[38], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec139'])){          
    calificar($numeros2[39], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem139'])){          
    modificar($numeros2[39], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep139'])){
    promediar($numeros2[39], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec140'])){          
    calificar($numeros2[40], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem140'])){          
    modificar($numeros2[40], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep140'])){
    promediar($numeros2[40], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec141'])){          
    calificar($numeros2[41], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem141'])){          
    modificar($numeros2[41], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep141'])){
    promediar($numeros2[41], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec142'])){          
    calificar($numeros2[42], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem142'])){          
    modificar($numeros2[42], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep142'])){
    promediar($numeros2[42], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec143'])){          
    calificar($numeros2[43], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem143'])){          
    modificar($numeros2[43], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep143'])){
    promediar($numeros2[43], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec144'])){          
    calificar($numeros2[44], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem144'])){          
    modificar($numeros2[44], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep144'])){
    promediar($numeros2[44], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec145'])){          
    calificar($numeros2[45], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem145'])){          
    modificar($numeros2[45], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep145'])){
    promediar($numeros2[45], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec146'])){          
    calificar($numeros2[46], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem146'])){          
    modificar($numeros2[46], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep146'])){
    promediar($numeros2[46], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec147'])){          
    calificar($numeros2[47], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem147'])){          
    modificar($numeros2[47], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep147'])){
    promediar($numeros2[47], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec148'])){          
    calificar($numeros2[48], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem148'])){          
    modificar($numeros2[48], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep148'])){
    promediar($numeros2[48], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec149'])){          
    calificar($numeros2[49], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem149'])){          
    modificar($numeros2[49], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep149'])){
    promediar($numeros2[49], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec150'])){          
    calificar($numeros2[50], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem150'])){          
    modificar($numeros2[50], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep150'])){
    promediar($numeros2[50], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec151'])){          
    calificar($numeros2[51], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem151'])){          
    modificar($numeros2[51], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep151'])){
    promediar($numeros2[51], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec152'])){          
    calificar($numeros2[52], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem152'])){          
    modificar($numeros2[52], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep152'])){
    promediar($numeros2[52], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec153'])){          
    calificar($numeros2[53], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem153'])){          
    modificar($numeros2[53], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep153'])){
    promediar($numeros2[53], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec154'])){          
    calificar($numeros2[54], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem154'])){          
    modificar($numeros2[54], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep154'])){
    promediar($numeros2[54], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec155'])){          
    calificar($numeros2[55], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem155'])){          
    modificar($numeros2[55], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep155'])){
    promediar($numeros2[55], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec156'])){          
    calificar($numeros2[56], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem156'])){          
    modificar($numeros2[56], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep156'])){
    promediar($numeros2[56], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec157'])){          
    calificar($numeros2[57], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem157'])){          
    modificar($numeros2[57], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep157'])){
    promediar($numeros2[57], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec158'])){          
    calificar($numeros2[58], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem158'])){          
    modificar($numeros2[58], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep158'])){
    promediar($numeros2[58], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec159'])){          
    calificar($numeros2[59], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem159'])){          
    modificar($numeros2[59], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep159'])){
    promediar($numeros2[59], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec160'])){          
    calificar($numeros2[60], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem160'])){          
    modificar($numeros2[60], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep160'])){
    promediar($numeros2[60], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec161'])){          
    calificar($numeros2[61], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem161'])){          
    modificar($numeros2[61], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep161'])){
    promediar($numeros2[61], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec162'])){          
    calificar($numeros2[62], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem162'])){          
    modificar($numeros2[62], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep162'])){
    promediar($numeros2[62], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec163'])){          
    calificar($numeros2[63], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem163'])){          
    modificar($numeros2[63], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep163'])){
    promediar($numeros2[63], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec164'])){          
    calificar($numeros2[64], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem164'])){          
    modificar($numeros2[64], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep164'])){
    promediar($numeros2[64], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec165'])){          
    calificar($numeros2[65], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem165'])){          
    modificar($numeros2[65], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep165'])){
    promediar($numeros2[65], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec166'])){          
    calificar($numeros2[66], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem166'])){          
    modificar($numeros2[66], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep166'])){
    promediar($numeros2[66], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec167'])){          
    calificar($numeros2[67], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem167'])){          
    modificar($numeros2[67], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep167'])){
    promediar($numeros2[67], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec168'])){          
    calificar($numeros2[68], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem168'])){          
    modificar($numeros2[68], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep168'])){
    promediar($numeros2[68], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec169'])){          
    calificar($numeros2[69], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem169'])){          
    modificar($numeros2[69], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep169'])){
    promediar($numeros2[69], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================
if(isset($_POST['btnPostMec170'])){          
    calificar($numeros2[70], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMem170'])){          
    modificar($numeros2[70], $_POST["unidadTema"], $_POST["calificacion"], $_POST["comentario"], $_POST["oportunidad"], $dataRow2[5]);
}
if(isset($_POST['btnPostMep170'])){
    promediar($numeros2[70], $dataRow2[5], $_POST["comentario"]);  
}
//=====================================================================================================================

?>