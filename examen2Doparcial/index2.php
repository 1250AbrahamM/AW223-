


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     

     <h1> Control de Gastos Personales </h1> 

    <h2>Registrar nuevo gasto </h2>  
       
   

    <section id="Contacto">

        
      <form id="form-contacto" action="./PHP/enviar.php" method="POST">
        <div class="el"> 

          <label for="comsepto">Concepto</label> 
          <input 
          
            type="text"
            id="concepto"
            name="concepto" >

        </div> 
        
        <div class="el">
          <label for="text">Monto</label>
          <input
            type="number"
                    id="monto"
                    name="monto"
            />
        </div>

      <div class="el"> 

          <label for="comsepto">Categoria</label> 
          <input 
          id="categoria"
                    name="categoria"
        />

        </div> 

        <button type="submit"> Registrar Gasto </button>
      </form>



</body>
</html>  

// corrigeme ese formulario 