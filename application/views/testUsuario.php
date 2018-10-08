<html>
    <head><title>Test Usuario</title></head>
    <body>
        Probando 
        <br>
        <?php 
        if(count($usuarios)>0){
            print_r($usuarios);
            foreach($usuarios as $unUser){
                echo $unUser->nombre;
            }
        }else{
            echo "Usuario o clave incorrecto";
        }
        ?>
    </body>
</html>