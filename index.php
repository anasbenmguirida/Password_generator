<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["btn"]))
    {
        if(!empty($_POST["choix"]) && !empty($_POST["length"])) // stocke les valeur 
        {
            $user_choise=$_POST["choix"] ; 
            $taille = $_POST["length"] ; 
            switch($user_choise){
                case "Un mot de passe numerique" : 
                    for($i=0 ; $i<$taille ; $i++)
                    {
                        $resultas[$i]=rand(0,9);
                    }
                    
                    break ; 
                    
                case "Un mot de passe alpha-numerique" : 
                    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $char_taille= strlen($caracteres) ; 
                    for($i=0 ; $i<$taille ; $i++)
                    {
                        $resultas[$i]=$caracteres[rand(0,$char_taille-1)]; 
                    }
                    
                break ; 

                case "Un mot de passe avec caracteres speciaux": 
                        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!/+*=+)@#&£$%§';
                        $path_taille=strlen($caracteres) ; 
                        for($i=0 ; $i<$taille ; $i++)
                        {
                            $resultas[$i]=$caracteres[rand(0,$path_taille-1)];
                        }
                        
                 break ; 
    
                    

                    
            }
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <div class="container">
    <h1>Generateur de mot de passe </h1>
    <h3> Entrer la longueur de votre mot de passe :</h3><br>
    <input class="input-number" type="number" name="length" value="<?php echo $user_choise ?>"><br>
    <h3>Vous voulez  : </h3>
    <input class="radio" type="radio" name="choix" id="choix1" value="Un mot de passe numerique">
    <label for="choix1">Un mot de passe numerique</label><br>
    <input class="radio" type="radio" name="choix" id="choix2" value="Un mot de passe alpha-numerique" >
    <label for="choix2">Un mot de passe alpha-numerique</label><br> 
    <input class="radio" type="radio" name="choix" id="choix3" value="Un mot de passe avec caracteres speciaux" >
    <label for="choix3">Un mot de passe avec caracteres speciaux</label><br>
    
    <input type="submit" name="btn" value="Generer" class="main-btn"><br>
    <h3>Votre mot de passe est :</h3><br>
    <input type="text" class="input-number" name="resultas" readonly value="<?php for($i=0 ; $i<$taille ; $i++)
                    {
                       echo $resultas[$i] ; 
                    }  ?> ">
    </form>
</div>
</body>
</html>
