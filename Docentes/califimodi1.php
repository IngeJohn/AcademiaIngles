<?php


if(isset($_POST['btnPostMe1'])){  
    //numeroControl , nivel, grupo, post parcial, periodo, post calificacion, 
                                                                              //ismaestro
                                                                                            //carrera, modalidad, comentario, conexión          
    calificar($numeros1[0], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
   // ($numcon, $niv, $grup, $parcipost, $peri, $califipost, $idmas, $carr, $moda, $comen, $link4)
}
if(isset($_POST['btnPostMe2'])){  
    //numeroControl , nivel, grupo, post parcial, periodo, post calificacion, 
                                                                              //ismaestro
                                                                                            //carrera, modalidad, comentario, conexión          
    modificar($numeros1[0], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe3'])){  
         
    calificar($numeros1[1], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe4'])){  
       
    modificar($numeros1[1], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================


if(isset($_POST['btnPostMe5'])){  
        
    calificar($numeros1[2], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe6'])){  
        
    modificar($numeros1[2], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe7'])){  
         
    calificar($numeros1[3], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe8'])){  
         
    modificar($numeros1[3], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe9'])){  
        
    calificar($numeros1[4], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe10'])){  
        
    modificar($numeros1[4], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe11'])){  
         
    calificar($numeros1[5], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe12'])){  
       
    modificar($numeros1[5], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe13'])){  
        
    calificar($numeros1[6], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe14'])){  
       
    modificar($numeros1[6], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe15'])){  
       
    calificar($numeros1[7], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe16'])){  
       
    modificar($numeros1[7], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe17'])){  
        
    calificar($numeros1[8], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe18'])){  
        
    modificar($numeros1[8], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe19'])){  
        
    calificar($numeros1[9], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe20'])){  
       
    modificar($numeros1[9], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe21'])){  
         
    calificar($numeros1[10], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe22'])){  
       
    modificar($numeros1[10], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe23'])){  
                             
    calificar($numeros1[11], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe24'])){  
        
    modificar($numeros1[11], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe25'])){  
        
    calificar($numeros1[12], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe26'])){  
         
    modificar($numeros1[12], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe27'])){  
        
    calificar($numeros1[13], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe28'])){  
        
    modificar($numeros1[13], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe29'])){  
        
    calificar($numeros1[14], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe30'])){  
       
    modificar($numeros1[14], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe31'])){  
        
    calificar($numeros1[15], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe32'])){  
        
    modificar($numeros1[15], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe33'])){  
         
    calificar($numeros1[16], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe34'])){  
        
    modificar($numeros1[16], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe35'])){  
        
    calificar($numeros1[17], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe36'])){  
         
    modificar($numeros1[17], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe37'])){  
       
    calificar($numeros1[18], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe38'])){  
          
    modificar($numeros1[18], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe39'])){  
        
    calificar($numeros1[19], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe40'])){  
         
    modificar($numeros1[19], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe41'])){  
         
    calificar($numeros1[20], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe42'])){  
        
    modificar($numeros1[20], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe43'])){  
         
    calificar($numeros1[21], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe44'])){  
         
    modificar($numeros1[21], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe45'])){  
         
    calificar($numeros1[22], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe46'])){  
        
    modificar($numeros1[22], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe47'])){  
        
    calificar($numeros1[23], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe48'])){  
       
    modificar($numeros1[23], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe49'])){  
     
    calificar($numeros1[24], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe50'])){  
      
    modificar($numeros1[24], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe51'])){  
       
    calificar($numeros1[25], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe52'])){  
        
    modificar($numeros1[25], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe53'])){  
         
    calificar($numeros1[26], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe54'])){  
         
    modificar($numeros1[26], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe55'])){  
         
    calificar($numeros1[27], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe56'])){  
         
    modificar($numeros1[27], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe57'])){  
         
    calificar($numeros1[28], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe58'])){  
        
    modificar($numeros1[28], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe59'])){  
        
    calificar($numeros1[29], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe60'])){  
       
    modificar($numeros1[29], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe61'])){  
      
    calificar($numeros1[30], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe62'])){  
      
    modificar($numeros1[30], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe63'])){  
         
    calificar($numeros1[31], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe64'])){  
       
    modificar($numeros1[31], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe65'])){  
        
    calificar($numeros1[32], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe66'])){  
       
    modificar($numeros1[32], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe67'])){  
        
    calificar($numeros1[33], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe68'])){  
        
    modificar($numeros1[33], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe69'])){  
         
    calificar($numeros1[34], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe70'])){  
        
    modificar($numeros1[34], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe71'])){  
        
    calificar($numeros1[35], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe72'])){  
        
    modificar($numeros1[35], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe73'])){  
         
    calificar($numeros1[36], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe74'])){  
        
    modificar($numeros1[36], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe75'])){  
         
    calificar($numeros1[37], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe76'])){  
       
    modificar($numeros1[37], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe77'])){  
        
    calificar($numeros1[38], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe78'])){  
       
    modificar($numeros1[38], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe79'])){  
        
    calificar($numeros1[39], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe80'])){  
       
    modificar($numeros1[39], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe81'])){  
        
    calificar($numeros1[40], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe82'])){  
        
    modificar($numeros1[40], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe83'])){  
        
    calificar($numeros1[41], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe84'])){  
       
    modificar($numeros1[41], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe85'])){  
         
    calificar($numeros1[42], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe86'])){  
        
    modificar($numeros1[42], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe87'])){  
       
    calificar($numeros1[43], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe88'])){  
        
    modificar($numeros1[43], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe89'])){  
        
    calificar($numeros1[44], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe90'])){  
        
    modificar($numeros1[44], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe91'])){  
        
    calificar($numeros1[45], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe92'])){  
        
    modificar($numeros1[45], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe93'])){  
         
    calificar($numeros1[46], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe94'])){  
         
    modificar($numeros1[46], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe95'])){  
        
    calificar($numeros1[47], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe96'])){  
       
    modificar($numeros1[47], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe97'])){  
      
    calificar($numeros1[48], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe98'])){  
        
    modificar($numeros1[48], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe99'])){  
        
    calificar($numeros1[49], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe100'])){  
         
    modificar($numeros1[49], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe101'])){  
       
    calificar($numeros1[50], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe102'])){  
        
    modificar($numeros1[50], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe103'])){  
        
    calificar($numeros1[51], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe104'])){  
        
    modificar($numeros1[51], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe105'])){  
        
    calificar($numeros1[52], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe106'])){  
       
    modificar($numeros1[52], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe107'])){  
        
    calificar($numeros1[53], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe108'])){  
       
    modificar($numeros1[53], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe109'])){  
        
    calificar($numeros1[54], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe110'])){  
      
    modificar($numeros1[54], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe111'])){  
        
    calificar($numeros1[55], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe112'])){  
        
    modificar($numeros1[55], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe113'])){  
        
    calificar($numeros1[56], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe114'])){  
        
    modificar($numeros1[56], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe115'])){  
         
    calificar($numeros1[57], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);

}
if(isset($_POST['btnPostMe116'])){  
        
    modificar($numeros1[57], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe117'])){  
        
    calificar($numeros1[58], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}
if(isset($_POST['btnPostMe118'])){  
        
    modificar($numeros1[58], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

//=====================================================================================================================

if(isset($_POST['btnPostMe119'])){  
        
    calificar($numeros1[59], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}
if(isset($_POST['btnPostMe120'])){  
                                                  //carrera, modalidad, comentario, conexión          
    modificar($numeros1[59], $dataRow1[0], $dataRow1[1], $_POST["parcial"], $dataRow1[4], $_POST["calificacion"], $_SESSION["idmaestro"], $dataRow1[2], $dataRow1[3], $_POST["comentario"], $link);
    
}

?>