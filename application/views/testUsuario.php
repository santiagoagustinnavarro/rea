<html>
    <head><title>Test Usuario</title></head>
    <body>
        Probando 
        <br>
        <?php 
            foreach($usuarios as $unUser){
                echo $unUser->nombre;
            }
        
        ?>
    </body>
</html>