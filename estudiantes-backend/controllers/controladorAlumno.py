from flask import Blueprint

controladorAlumnoBb= Blueprint('controladorAlumno',__name__) 

#ruta para arranque del servidor
@controladorAlumnoBb.route('/')
def inicio():
    return "hola soy el backend del alumno" 

# ruta para insert  
@controladorAlumnoBb.route('/guardarAlumno',methods=['POST'])
def guardar():
    return "se guardado el alumno"

# ruta para consultar todo 
@controladorAlumnoBb.route('/consultatodo')
def consultar():
    return "se consulto todo"

# ruta para actualizar 
@controladorAlumnoBb.route('/actualizarAlumno',methods=['PUT'])
def actualizar():
    return "se actualizo el alumno"

# ruta para eliminar 
@controladorAlumnoBb.route('/eliminaAlumno',methods=['DELETE'])
def eliminar():
    return "se elimino el alumno" 