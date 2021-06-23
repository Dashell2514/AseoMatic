//? Funcion de Expresiones Regulares Para Email
const validateEmail = (email) => {
    const emailRegex = /^(([^<>()\[\]\\.,:\s@"]+(\.[^<>()\[\]\\.,:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if(emailRegex.test(email)) return true //console.log('email válido')
    else return false
    // console.log('email incorrecto')
}
const validateName =(name) =>{
    const nameRegex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,25}$/;
    if(nameRegex.test(name)) return true
    else return false
}
const validatePasswordModerate = (password) => {
    // Debe tener 1 letra minúscula, 1 letra mayúscula, 1 número y tener al menos 8 caracteres.
    const passwordRegex = /(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/;
    if(passwordRegex.test(password)) return true//console.log('password válido')
    else return false //console.log('password incorrecto')
}

const validateDocumentNumber = (documentNumber) => {
    const documentNumberRegex = /^((\d{8})|(\d{10}))?$/;
    if(documentNumberRegex.test(documentNumber)) return true//console.log('documento válido')
    else return false //console.log('documento incorrecto')
}

const validateAsunto =(asunto) =>{
    const asuntoRegex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,100}$/;
    if(asuntoRegex.test(asunto)) return true
    else return false
}


export {
    validateEmail,
    validateName,
    validatePasswordModerate,
    validateDocumentNumber,
    validateAsunto
}