<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<body>

    <h1>Control de Gastos Personales</h1>

    <h2>Registrar nuevo gasto</h2>

    <section id="registro">

        <form id="form-gastos" action="./PHP/enviar.php" method="POST">

           
            <div class="el">
                <label for="concepto">Concepto:</label>
                <input
                    type="text"
                    id="concepto"
                    name="concepto"
                    
                >
            </div>

            
            <div class="el">
                <label for="monto">Monto:</label>
                <input
                    type="number"
                    id="monto"
                    name="monto"
                   
                >
            </div>

          
            <div class="el">
                <label for="categoria">Categoría:</label>
              <input
                    id="categoria"
                    name="categoria"
                    
                >
                   
            
            </div>

          

           
                
          

        </form>

    </section>

</body>
</html>
