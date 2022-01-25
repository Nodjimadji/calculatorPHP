<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <title>Calculatrice</title>
</head>
<body>
    <!-- PHP code beginning -->
    <?php
        if(array_key_exists('textArea', $_POST)){
          $resp = $_POST['textArea'];
        }
        else{
            $resp = "";
        }

        if(array_key_exists('clavier', $_POST)){
                $resp = $resp . $_POST['clavier'];
        }
        /** for reset operation*/
        if(array_key_exists('reset',$_POST)){
            $resp = "";
        }
        /**Display the result of operation */
        if(array_key_exists('result',$_POST)){
            if($resp == ""){
                /**if resp is empty */
                eval("\$resp = '';");
            }else{
                eval("\$resp = $resp;");
            }
        }
    ?>
    <!-- container  -->
    <div id="container">
        <h1> Calculatrice </h1>
        <div id="calculatrice">
            <form method="post" >
                <div id="header">
                    <input type="text" name="textArea" class="textArea" value="<?php echo $resp ?>" readonly/>
                </div>
                        <!-- key create -->
                <div id="body">
                    <input type="submit" name="clavier" class="clavier" value="7"/>
                    <input type="submit" name="clavier" class="clavier" value="8"/>
                    <input type="submit" name="clavier" class="clavier" value="9"/>
                    <input type="submit" name="clavier" class="clavier" value="+"/>
                    <input type="submit" name="clavier" class="clavier" value="4"/>
                    <input type="submit" name="clavier" class="clavier" value="5"/>
                    <input type="submit" name="clavier" class="clavier" value="6"/>
                    <input type="submit" name="clavier" class="clavier" value="-"/>
                    <input type="submit" name="clavier" class="clavier" value="1"/>
                    <input type="submit" name="clavier" class="clavier" value="2"/>
                    <input type="submit" name="clavier" class="clavier" value="3"/>
                    <input type="submit" name="clavier" class="clavier" value="*"/>
                    <input type="submit" name="clavier" class="clavier" value="0"/>
                    <input type="submit" name="reset"   class="clavier reset" value="CE"/>
                    <input type="submit" name="result"  class="clavier" value="="/>
                    <input type="submit" name="clavier" class="clavier" value="/"/>
                    <input type="submit" name="clavier" class="clavier" value="%"/>
                </div>

            </form>
        </div>
    </div>


    
</body>
</html>