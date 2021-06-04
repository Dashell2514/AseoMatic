
// ! JS Login Verificacion Modal

import { msgError,msgSuccess } from "../message.js";
import {validateAsunto,validateName,validateEmail } from "../validation.js";

if(  location.search == '' || location.search == '?c=All&m=index')
{ 

    //? function para limpiar los campos del modal #loginModal
    const btnOpenLoginModal= document.getElementById('btn-login');
    btnOpenLoginModal.addEventListener('click',()=>{
        const nombre_usuario = document.getElementById('nombre_usuario');
        const password = document.getElementById('password');
        nombre_usuario.value="";
        password.value="";
    })


    //? Funcion para validar inputs del LoginModal
    const validateFormLogin= (user,pass) =>{
        if(user.value == "")
        {
            user.focus();
            const message = "Ingresar correo";
            msgError(message);
        }
        else if(validateEmail(user.value) != true)
        {
            pass.focus();
            const message = "El Correo ingresado no es valido";
            msgError(message);
        }
        else if(pass.value == "")
        {
            pass.focus();
            const message = "Ingresar clave";
            msgError(message);
        }
        else{
            return true;
        }
    }

    //? function para el login  modal #loginModal
    const  btnSubmitFormLogin = document.getElementById('loginBtn');
    btnSubmitFormLogin.addEventListener('click', (e)=>{
        e.preventDefault();
        const nombre_usuario = document.getElementById('nombre_usuario');
        const password = document.getElementById('password');
        let validar = validateFormLogin(nombre_usuario,password);
        if(validar == true)
        {
            const datos = new FormData();
            datos.append('nombre_usuario',nombre_usuario.value);
            datos.append('password',password.value);
            fetch('?c=Login&m=auth' ,{
                method : 'POST',
                body : datos
            }).then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error al Login')))
            .then(resp => resp.json())
            .then((data) => {
                
                if(data == "")
                {
                    const message = "Datos incorrectos";
                    msgError(message);
                }
                else if(data.error == 'incorrectoP')
                {
                    password.focus();
                    const message = "Contraseña incorrecta";
                    msgError(message);
                }
                else if(data.error =='incorrectoU&P'){
                    nombre_usuario.focus();
                    const message = "El usuario no existe";
                    msgError(message);
                }
                else if(data.fk_rol)
                {
                    if(data.fk_rol == '1')
                    {
                        location.href="?c=Administradores&m=index";
                    }
                    else if(data.fk_rol =='2')
                    {
                        location.href="?c=Empleados&m=index";
                    }
                }
                else{
                    location.href="?c=All&m=index";
                }
            }).catch(console.log);
        }
        
    })



    //! Index Form Contact

    const validateFormContact= (nombre_contact,apellido_contact,email_contact,asunto_contact,message_contact,terminos_contact) =>{

        if(nombre_contact.value == "")
        {
            nombre_contact.focus();
            const message = "Ingresar Nombre";
            msgError(message);
        }
        else if(validateName(nombre_contact.value) != true)
        {
            nombre_contact.focus();
            const message = "El Nombre ingresado no es valido";
            msgError(message);
        }
        else if(apellido_contact.value == "")
        {
            apellido_contact.focus();
            const message = "Ingresar Apellido";
            msgError(message);
        }
        else if(validateName(apellido_contact.value) == "")
        {
            apellido_contact.focus();
            const message = "El Apellido ingresado no es valido";
            msgError(message);
        }
        else if(email_contact.value == "")
        {
            email_contact.focus();
            const message = "Ingresar Correo";
            msgError(message);
        }
        else if(validateEmail(email_contact.value) == "")
        {
            email_contact.focus();
            const message = "El Correo ingresado no es valido";
            msgError(message);
        }
        else if(asunto_contact.value == "")
        {
            asunto_contact.focus();
            const message = "Ingresar Asunto";
            msgError(message);
        }
        else if(validateAsunto(asunto_contact.value) == "")
        {
            asunto_contact.focus();
            const message = "El Asunto ingresado no es valido";
            msgError(message);
        }
        else if(message_contact.value == "")
        {
            message_contact.focus();
            const message = "Ingresar Mensaje";
            msgError(message);
        }
        else if(!document.querySelector('input[name="genero_contact"]:checked'))
        {
            document.querySelector('input[name="genero_contact"]').focus();
            const message = "Ingresar genero";
            msgError(message);
        }
        else if(!document.querySelector('input[name="terminos_contact"]:checked'))
        {
            terminos_contact.focus();
            const message = "Acepte los terminos y condiciones";
            msgError(message);
        }   
        else{
            return true;
        }

    }

    const btnSubmitFormContact = document.getElementById('form_contacto');

    btnSubmitFormContact.addEventListener('click',(e)=>{
        
        e.preventDefault();

        const label_form_contacto = document.getElementById('label_form_contacto');
        const nombre_contact = document.getElementById('nombre_contact');
        const apellido_contact = document.getElementById('apellido_contact');
        const email_contact = document.getElementById('email_contact');
        const asunto_contact = document.getElementById('asunto_contact');
        const message_contact = document.getElementById('message_contact');
        const terminos_contact = document.getElementById('terminos_contact');
       

        const validate = validateFormContact(nombre_contact,apellido_contact,email_contact,asunto_contact,message_contact,terminos_contact);

        if(validate)
        {
            btnSubmitFormContact.setAttribute('disabled','');
            label_form_contacto.textContent="Espere";
            const datos = new FormData();
            const genero_contact =document.querySelector('input[name="genero_contact"]:checked').value;
            
            datos.append('nombre_contact',nombre_contact.value);
            datos.append('apellido_contact',apellido_contact.value);
            datos.append('email_contact',email_contact.value);
            datos.append('asunto_contact',asunto_contact.value);
            datos.append('message_contact',message_contact.value);
            datos.append('terminos_contact',terminos_contact.value);
            datos.append('genero_contact',genero_contact);
            fetch('?c=All&m=formContact' ,{
                method : 'POST',
                body : datos
            }).then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error al Login')))
            .then((data) => {

                if(data.ok)
                {
                    const msg = "Enviado Correctamente";
                    msgSuccess(msg)
                    resetValueFormContact(nombre_contact,apellido_contact,email_contact,asunto_contact,message_contact,terminos_contact);
                    btnSubmitFormContact.removeAttribute('disabled');
                    label_form_contacto.textContent="Enviar"
                }else{
                    const message = "Error No se puedo enviar";
                    msgError(message);
                }
                
            
            }).catch(console.log);

        }

    })

    const resetValueFormContact = (nombre_contact,apellido_contact,email_contact,asunto_contact,message_contact,terminos_contact)=>{
        nombre_contact.value='';
        apellido_contact.value='';
        email_contact.value='';
        asunto_contact.value='';
        message_contact.value='';
        // terminos_contact.value='';
        // genero_contact.value='';
    }


    // show news and events
    

    const noticiasRow= document.getElementById('noticias_row');
    noticiasRow.addEventListener('click',(e)=>{

        const id=e.target.getAttribute('data-id');
        if( id && e.target.getAttribute('data-tipo')=='noticia')
        {
            showModal('noticias','id_noticia','noticia',id)
        }
      
    })

    const eventosRow =document.getElementById('eventos_row');
    eventosRow.addEventListener('click',(e)=>{
        const id=e.target.getAttribute('data-id');
        if( id && e.target.getAttribute('data-tipo')=='evento')
        {
            showModal('eventos','id_evento','evento',id)
        }
    })

    const showModalEN = (data)=>{
        const showModal = document.getElementById('showModal').textContent=`${(data.titulo_noticia) ? 'Noticias':'Eventos'}`;
        const showTitle = document.getElementById('show_title').textContent=`${(data.titulo_noticia) ? data.titulo_noticia : data.titulo_evento}`;
        const showDescription = document.getElementById('show_description').innerHTML=`${(data.descripcion_noticia) ? data.descripcion_noticia : data.descripcion_evento}`;
        const showDate = document.getElementById('show_date').textContent=`${data.nombres} ${data.apellidos} ${data.fecha_publicado}`;
        const showImg = document.getElementById('show_prev_img').src=`${(data.imagen_noticia)? data.imagen_noticia : data.imagen_evento}`;
    }

    const showModal = (tabla,campo,tipo,id) =>{
        fetch(`?c=All&m=showModal&tabla=${tabla}&campo=${campo}&tipo=${tipo}&id=${id}`)
        .then(response => response.ok ? Promise.resolve(response) : Promise.reject(new Error('Fallo la consulta News')))
        .then(response => response.json())
        .then(data => {
 
        showModalEN(data);
   
        }).catch( console.log);
    }
    
}




// ! End JS Login