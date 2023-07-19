function validarUsuario() {
  console.log("ingreso validar usuario")

  // SE ALMACENA EN LET USER EL ELEMENTO QUE TRAEMOS X ID
  let user=document.getElementById("user").value
  console.log(`user: ${user}`)

  console.log(user.includes("@"))

  if (!user.includes("@")) {
    //el usuario debe contener @
    document.getElementById("mensaje").innerHTML="El usuario debe contener @."
    document.getElementById("mensaje").className="text-danger fw-bold p-2 rounded"
  } else if (!user.toLowerCase().includes("codoacodo.edu.ar") && !user.toLowerCase().includes("gmail.com")) {
    document.getElementById("mensaje").innerHTML="El usuario debe contener el dominio codoacodo.edu.ar, gmail.com o hotmail.com"
    document.getElementById("mensaje").className="text-danger fw-bold p-2 rounded"
  } else {
    document.getElementById("mensaje").innerHTML=""
  }
}

// determina la fortaleza de una pass
// si teiene menos de 4 caracteres es baja, entre 4 y 8 media, y más de 8 es alta
function defFortaleza() {
  const baja=4
  const media=8
  
  let pass=document.getElementById("passw").value


  // const regex= new RegExp("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}")
  const regex= new RegExp("(?=.*[a-z])(?=.*[A-Z]).{8,}")
  console.log(regex.test(pass))
  if (!regex.test(pass)) {
      document.getElementById("mensaje").innerHTML="Password debe contener una  minúscula, una mayuscula y debe ser mayor a 8 caracteres"        
      document.getElementById("mensaje").className="bg-danger p-1 m-1 rounded"
  } else {
      document.getElementById("mensaje").innerHTML=""        
      document.getElementById("mensaje").className=""
  }
}

// verifica que la pass y la rep pass sean iguales
function compararPass() {
  let repPass=document.getElementById("comparaPassword").value
  let pass=document.getElementById("passw").value

  if (repPass!=pass) {
      document.getElementById("mensaje").innerHTML="La contraseñas no coinciden"        
      document.getElementById("mensaje").className="bg-danger p-1 m-1 rounded"
  } else {
      document.getElementById("mensaje").innerHTML="Las contraseñas coinciden"        
      document.getElementById("mensaje").className="bg-success p-1 m-1 rounded"
      
  }
}
