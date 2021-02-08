<?php

if(isset($_POST['btnPostMec300'])){  
          //numeroControl ,    nivel,       grupo,        post parcial,      periodo,      post calificacion      ismaestro                carrera,    modalidad,       comentario         
    calificar($numeros4[0], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem300'])){  
           //numeroControl ,   nivel,       grupo,        post parcial,      periodo,     post calificacion,        ismaestro             carrera,     modalidad,    comentario          
    modificar($numeros4[0], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep300'])){
             //numeroControl , nivel,       grupo,    modalidad,     carrera,       periodo,   idmaestro,    comentario,     conexión 
    promediar($numeros4[0], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec301'])){          
    calificar($numeros4[1], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem301'])){          
    modificar($numeros4[1], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep301'])){
    promediar($numeros4[1], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec302'])){          
    calificar($numeros4[2], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem302'])){          
    modificar($numeros4[2], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep302'])){
    promediar($numeros4[2], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec303'])){          
    calificar($numeros4[3], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem303'])){          
    modificar($numeros4[3], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep303'])){
    promediar($numeros4[3], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec304'])){          
    calificar($numeros4[4], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem304'])){          
    modificar($numeros4[4], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep304'])){
    promediar($numeros4[4], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec305'])){          
    calificar($numeros4[5], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem305'])){          
    modificar($numeros4[5], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep305'])){
    promediar($numeros4[5], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec306'])){          
    calificar($numeros4[6], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem306'])){          
    modificar($numeros4[6], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep306'])){
    promediar($numeros4[6], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec307'])){          
    calificar($numeros4[7], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem307'])){          
    modificar($numeros4[7], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep307'])){
    promediar($numeros4[7], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec308'])){          
    calificar($numeros4[8], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem308'])){          
    modificar($numeros4[8], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep308'])){
    promediar($numeros4[8], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec309'])){          
    calificar($numeros4[9], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem309'])){          
    modificar($numeros4[9], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep309'])){
    promediar($numeros4[9], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec310'])){          
    calificar($numeros4[10], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem310'])){          
    modificar($numeros4[10], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep310'])){
    promediar($numeros4[10], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec311'])){          
    calificar($numeros4[11], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem311'])){          
    modificar($numeros4[11], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep311'])){
    promediar($numeros4[11], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec312'])){          
    calificar($numeros4[12], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem312'])){          
    modificar($numeros4[12], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep312'])){
    promediar($numeros4[12], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec313'])){          
    calificar($numeros4[13], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem313'])){          
    modificar($numeros4[13], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep313'])){
    promediar($numeros4[13], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec314'])){          
    calificar($numeros4[14], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem314'])){          
    modificar($numeros4[14], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep314'])){
    promediar($numeros4[14], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec315'])){          
    calificar($numeros4[15], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem315'])){          
    modificar($numeros4[15], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep315'])){
    promediar($numeros4[15], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec316'])){          
    calificar($numeros4[16], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem316'])){          
    modificar($numeros4[16], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep316'])){
    promediar($numeros4[16], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec317'])){          
    calificar($numeros4[17], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem317'])){          
    modificar($numeros4[17], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep317'])){
    promediar($numeros4[17], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec318'])){          
    calificar($numeros4[18], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem318'])){          
    modificar($numeros4[18], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep318'])){
    promediar($numeros4[18], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec319'])){          
    calificar($numeros4[19], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem319'])){          
    modificar($numeros4[19], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep319'])){
    promediar($numeros4[19], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec320'])){          
    calificar($numeros4[20], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem320'])){          
    modificar($numeros4[20], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep320'])){
    promediar($numeros4[20], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec321'])){          
    calificar($numeros4[21], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem321'])){          
    modificar($numeros4[21], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep321'])){
    promediar($numeros4[21], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec322'])){          
    calificar($numeros4[22], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem322'])){          
    modificar($numeros4[22], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep322'])){
    promediar($numeros4[22], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec323'])){          
    calificar($numeros4[23], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem323'])){          
    modificar($numeros4[23], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep323'])){
    promediar($numeros4[23], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec324'])){          
    calificar($numeros4[24], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem324'])){          
    modificar($numeros4[24], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep324'])){
    promediar($numeros4[24], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec325'])){          
    calificar($numeros4[25], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem325'])){          
    modificar($numeros4[25], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep325'])){
    promediar($numeros4[25], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec326'])){          
    calificar($numeros4[26], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem326'])){          
    modificar($numeros4[26], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep326'])){
    promediar($numeros4[26], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec327'])){          
    calificar($numeros4[27], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem327'])){          
    modificar($numeros4[27], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep327'])){
    promediar($numeros4[27], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec328'])){          
    calificar($numeros4[28], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem328'])){          
    modificar($numeros4[28], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep328'])){
    promediar($numeros4[28], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec329'])){          
    calificar($numeros4[29], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem329'])){          
    modificar($numeros4[29], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep329'])){
    promediar($numeros4[29], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec330'])){          
    calificar($numeros4[30], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem330'])){          
    modificar($numeros4[30], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep330'])){
    promediar($numeros4[30], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec331'])){          
    calificar($numeros4[31], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem331'])){          
    modificar($numeros4[31], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep331'])){
    promediar($numeros4[31], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec332'])){          
    calificar($numeros4[32], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem332'])){          
    modificar($numeros4[32], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep332'])){
    promediar($numeros4[32], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec333'])){          
    calificar($numeros4[33], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem333'])){          
    modificar($numeros4[33], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep333'])){
    promediar($numeros4[33], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec334'])){          
    calificar($numeros4[34], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem334'])){          
    modificar($numeros4[34], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep334'])){
    promediar($numeros4[34], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec335'])){          
    calificar($numeros4[35], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem335'])){          
    modificar($numeros4[35], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep335'])){
    promediar($numeros4[35], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec336'])){          
    calificar($numeros4[36], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem336'])){          
    modificar($numeros4[36], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep336'])){
    promediar($numeros4[36], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec337'])){          
    calificar($numeros4[37], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem337'])){          
    modificar($numeros4[37], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep337'])){
    promediar($numeros4[37], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec338'])){          
    calificar($numeros4[38], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem338'])){          
    modificar($numeros4[38], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep338'])){
    promediar($numeros4[38], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec339'])){          
    calificar($numeros4[39], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem339'])){          
    modificar($numeros4[39], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep339'])){
    promediar($numeros4[39], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec340'])){          
    calificar($numeros4[40], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem340'])){          
    modificar($numeros4[40], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep340'])){
    promediar($numeros4[40], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec341'])){          
    calificar($numeros4[41], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem341'])){          
    modificar($numeros4[41], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep341'])){
    promediar($numeros4[41], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec342'])){          
    calificar($numeros4[42], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem342'])){          
    modificar($numeros4[42], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep342'])){
    promediar($numeros4[42], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec343'])){          
    calificar($numeros4[43], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem343'])){          
    modificar($numeros4[43], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep343'])){
    promediar($numeros4[43], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec344'])){          
    calificar($numeros4[44], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem344'])){          
    modificar($numeros4[44], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep344'])){
    promediar($numeros4[44], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec345'])){          
    calificar($numeros4[45], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem345'])){          
    modificar($numeros4[45], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep345'])){
    promediar($numeros4[45], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec346'])){          
    calificar($numeros4[46], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem346'])){          
    modificar($numeros4[46], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep346'])){
    promediar($numeros4[46], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec347'])){          
    calificar($numeros4[47], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem347'])){          
    modificar($numeros4[47], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep347'])){
    promediar($numeros4[47], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec348'])){          
    calificar($numeros4[48], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem348'])){          
    modificar($numeros4[48], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep348'])){
    promediar($numeros4[48], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec349'])){          
    calificar($numeros4[49], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem349'])){          
    modificar($numeros4[49], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep349'])){
    promediar($numeros4[49], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec350'])){          
    calificar($numeros4[50], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem350'])){          
    modificar($numeros4[50], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep350'])){
    promediar($numeros4[50], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec351'])){          
    calificar($numeros4[51], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem351'])){          
    modificar($numeros4[51], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep351'])){
    promediar($numeros4[51], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec352'])){          
    calificar($numeros4[52], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem352'])){          
    modificar($numeros4[52], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep352'])){
    promediar($numeros4[52], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec353'])){          
    calificar($numeros4[53], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem353'])){          
    modificar($numeros4[53], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep353'])){
    promediar($numeros4[53], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec354'])){          
    calificar($numeros4[54], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem354'])){          
    modificar($numeros4[54], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep354'])){
    promediar($numeros4[54], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec355'])){          
    calificar($numeros4[55], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem355'])){          
    modificar($numeros4[55], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep355'])){
    promediar($numeros4[55], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec356'])){          
    calificar($numeros4[56], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem356'])){          
    modificar($numeros4[56], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep356'])){
    promediar($numeros4[56], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec357'])){          
    calificar($numeros4[57], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem357'])){          
    modificar($numeros4[57], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep357'])){
    promediar($numeros4[57], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec358'])){          
    calificar($numeros4[58], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem358'])){          
    modificar($numeros4[58], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep358'])){
    promediar($numeros4[58], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec359'])){          
    calificar($numeros4[59], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem359'])){          
    modificar($numeros4[59], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep359'])){
    promediar($numeros4[59], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec360'])){          
    calificar($numeros4[60], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem360'])){          
    modificar($numeros4[60], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep360'])){
    promediar($numeros4[60], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec361'])){          
    calificar($numeros4[61], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem361'])){          
    modificar($numeros4[61], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep361'])){
    promediar($numeros4[61], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec362'])){          
    calificar($numeros4[62], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem362'])){          
    modificar($numeros4[62], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep362'])){
    promediar($numeros4[62], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec363'])){          
    calificar($numeros4[63], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem363'])){          
    modificar($numeros4[63], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep363'])){
    promediar($numeros4[63], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec364'])){          
    calificar($numeros4[64], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem364'])){          
    modificar($numeros4[64], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep364'])){
    promediar($numeros4[64], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec365'])){          
    calificar($numeros4[65], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem365'])){          
    modificar($numeros4[65], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep365'])){
    promediar($numeros4[65], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec366'])){          
    calificar($numeros4[66], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem366'])){          
    modificar($numeros4[66], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMep366'])){
    promediar($numeros4[66], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec367'])){          
    calificar($numeros4[67], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMem367'])){          
    modificar($numeros4[67], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep367'])){
    promediar($numeros4[67], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec368'])){          
    calificar($numeros4[68], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem368'])){          
    modificar($numeros4[68], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep368'])){
    promediar($numeros4[68], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec369'])){          
    calificar($numeros4[69], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"],  $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem369'])){          
    modificar($numeros4[69], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep369'])){
    promediar($numeros4[69], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================
if(isset($_POST['btnPostMec370'])){          
    calificar($numeros4[70], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"], $link);
}
if(isset($_POST['btnPostMem370'])){          
    modificar($numeros4[70], $dataRow4[0], $dataRow4[1], $_POST["parcial"], $dataRow4[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow4[2], $dataRow4[3], $_POST["comentario"], $_POST["oportunidad"],  $link);
}
if(isset($_POST['btnPostMep370'])){
    promediar($numeros4[70], $dataRow4[0], $dataRow4[1],$dataRow4[3], $dataRow4[2],$dataRow4[4], $_SESSION["idmaestro"] , $_POST["comentario"], $link);
}
//=====================================================================================================================



?>