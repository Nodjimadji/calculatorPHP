<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/stylesMode.css" rel="stylesheet">
    <title>Mode Scientifique</title>
</head>
<body>
<!-- begin of script php -->
<?php
    if(array_key_exists('textArea', $_POST)){
        $res = $_POST['textArea'];
        $lastValue = "rien";
    }
    else{
        $res = "";
        $lastValue='';
    }

    if(array_key_exists('clavier', $_POST)){
        if($lastValue == "rien"){
            $res = $res. $_POST['clavier'];
        }else{
            $res = $res.'*'.$_POST['clavier'];
        }
        
        $lastValue = $_POST['clavier'];

    }

    if(array_key_exists('reset',$_POST)){
        $res = "";
        $lastValue = "rien";
    }

    if(array_key_exists('clavierSpe',$_POST)){
        
        if($lastValue == "rien"){
            
            $res = $res.$_POST['clavierSpe'].'(';
        }else{
            
            $res = $res.'*'.$_POST['clavierSpe'].'(';
        }
        

        $lastValue = '(';
        
    }

    if(array_key_exists('result',$_POST)){
        if($res == ""){
            eval("\$res = '';");
        }else{
            try {
                eval("\$res = $res;");
            } catch (ParseError $th) {
                $error ='<div class ="erreur">Erreur syntaxe </div>';
            }
        } 

        $lastValue = $res;
    }  
?>

<!-- end of script php -->

<div id="container">
    <h1>Mode scientifique</h1>
    <div id="calculatrice">
        <form method="post" >
            <div id="header">
                <input type="text" name="textArea" class="textArea" value="<?php echo $res ?>" readonly/>
            </div>
            <!-- Redirection ->simple mode -->
            <a class="clavier reset" href="../index">simple</a>

            <div id="body">
                <input type="submit" name="clavier" class="clavier" value="7"/>
                <input type="submit" name="clavier" class="clavier" value="8"/>
                <input type="submit" name="clavier" class="clavier" value="9"/>
                <input type="submit" name="clavier" class="clavier" value="+"/>
                <input type="submit" name="clavierSpe" class="clavier log" value="log"/>

                <input type="submit" name="clavier" class="clavier" value="4"/>
                <input type="submit" name="clavier" class="clavier" value="5"/>
                <input type="submit" name="clavier" class="clavier" value="6"/>
                <input type="submit" name="clavier" class="clavier" value="-"/>
                <input type="submit" name="clavierSpe" class="clavier exp" value="exp"/>

                <input type="submit" name="clavier" class="clavier" value="1"/>
                <input type="submit" name="clavier" class="clavier" value="2"/>
                <input type="submit" name="clavier" class="clavier" value="3"/>
                <input type="submit" name="clavier" class="clavier" value="*"/>
                <input type="submit" name="clavierSpe" class="clavier cos" value="cos"/>

                <input type="submit" name="clavier" class="clavier" value="0"/>
                <input type="submit" name="clavier"  class="clavier" value="("/>
                <input type="submit" name="clavier"  class="clavier" value=")"/>
                <input type="submit" name="clavier" class="clavier" value="/"/>
                <input type="submit" name="clavierSpe" class="clavier sin" value="sin"/>
                
                <input type="submit" name="clavier"  class="clavier" value="."/>
                <input type="submit" name="reset"   class="clavier reset" value="CE"/>
                <input type="submit" name="result"  class="clavier result" value="="/>
            </div>
            <?php 
                if (isset($error)){
                    echo $error;
                }
            ?>
        </form>
        <!-- end of form -->
    </div>
    <!-- end of div calculatrice -->
</div>
<!-- end of div container -->



</body>
</html>