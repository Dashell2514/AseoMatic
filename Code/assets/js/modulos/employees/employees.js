//! Show Perfil
import { msgError,msgSuccess } from "./../message.js";
import { validatePasswordModerate} from "./../validation.js";
if( location.search == '?c=Empleados&m=showPerfil')
{
    console.log('xd');
    const ShowProfile = () =>{
        fetch('?c=Empleados&m=show')
        .then( (response) => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error Show Empleado')))
        .then(resp => resp.json())
        .then(data =>  {
            ShowVista(data);
        })
    }


    const ShowVista= (datos)=>{        
        const nombrePerfil = document.getElementById('nombre_perfil').value=`${datos.nombres}`;
        const apellidosPerfil = document.getElementById('apellidos_perfil').value=`${datos.apellidos}`;
        const emailPerfil = document.getElementById('email_perfil').value=`${datos.correo}`;
        const tokenPerfil = document.getElementById('token_perfil').value=`${datos.token}`;
        const imgPerfil = document.getElementById('img_perfil').src=`${datos.img_usuario}`;
        const imgHeaderProfile = document.getElementById('imgAvatarProfile').src=`${datos.img_usuario}`;

    }


       //? DOM de visualizar de img  y input file
       const imgNew =document.getElementById('change_img');
       const prevImg =document.getElementById('img_perfil');

   
       //? funcion que previsualiza la img selecciona y valida si es formato adecuado require la el INPUT(FILE) y un img(visualizar)
       const validarImgPerfil= (imgNoticia,prevImgNew) =>{
           const img=imgNoticia.files[0];
           if(img["type"] != "image/jpeg" && img["type"] != "image/png" && img["type"] != "image/jpeg")
           {
               imgNoticia.value="";
               const msg ='la imagen debe ser png o jpeg';
               msgError(msg);
               prevImgNew.src='';
               prevImgNew.alt ='image not found';
               return false;
           }
           else if(img["size"] > 2000000)
           {
               imgNoticia.value="";
               const msg='la imagen debe ser menor a 2mb';
               msgError(msg);
               prevImgNew.src="";
               prevImgNew.alt ='image not found';
               return false;
           
           }
           else{
                   prevImgNew.src='';
                   const datosImagen = new FileReader; 
                   datosImagen.readAsDataURL(img);
               //  cuando cargue el archivo que lo muestre
                   datosImagen.addEventListener('load', (e) =>{
                       //obtiene la img en formato base64
                   prevImgNew.src=e.target.result;
                   });
                   return true;         
           }
       }
   
       //? Ejecutar validarImgPerfil() cuando se cambie de imagen en insertar Evento en #ModalAddEvents 
       imgNew.addEventListener('change', () =>{
           validarImgPerfil(imgNew,prevImg);
   
       })


       const validatePassProfile= (paramClave,passConfirm,img) =>
       {
            if(paramClave.value == ""){
                paramClave.focus();
                const message = "Ingresar la contraseña";
                msgError(message);
            }
            else if(validatePasswordModerate(paramClave.value) == false)
            {
                paramClave.focus();
                const message = "Clave no valida Debe tener 1 letra minúscula, 1 letra mayúscula, 1 número y tener al menos 8 caracteres.";
                msgError(message);
            }
            else if(passConfirm.value == "")
            {
                passConfirm.focus();
                const message = "Ingresar la Confirmacion de contraseña";
                msgError(message);
            }
            else if(passConfirm.value != paramClave.value)
            {
                passConfirm.focus();
                const message = "Las contraseñas no coinciden ";
                msgError(message);
            } 
            else if(img.src =='' || img.alt == 'image not found'){
                const msg = 'Ingrese la imagen';
                
                msgError(msg);
            }
            else{
                return true;
            }    
       }


   


       const btnSubmitProfile = document.getElementById('updateProfile');



       const updateProfile  = () =>{

            const tokenPerfil = document.getElementById('token_perfil');
            const passPerfil = document.getElementById('password_perfil');
            const ConfirmPerfil = document.getElementById('confirm_password_perfil');
            const imgProfile=imgNew.files[0];

            const validate = validatePassProfile(passPerfil,ConfirmPerfil,prevImg)
        

            if(validate == true)
            {
                const data = new FormData();
                data.append('token_perfil', tokenPerfil.value);
                data.append('password_perfil', passPerfil.value);
                data.append('confirm_password_perfil', ConfirmPerfil.value);
                data.append('change_img', imgProfile);
                fetch('?c=Empleados&m=update',{
                    method: 'POST',
                    body : data
                })
                .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('fallo actualizacion Profile')))
                .then(data => data.json())
                .then(data => {

                    if(data.error){ 
                        const msg ='Fallo la actualizacion del usuario';
                        msgError(msg);
                    }
                    else if(data.ok){

                        let message = 'Contraseña Actualizada';

                        msgSuccess(message);
                        ShowProfile();
                        passPerfil.value="";
                        ConfirmPerfil.value="";
                        
                        
                    }  
                })
            }

       }

       btnSubmitProfile.addEventListener('click',(e)=>{
           e.preventDefault();
           updateProfile();

       })

  


       

    ShowProfile();
}