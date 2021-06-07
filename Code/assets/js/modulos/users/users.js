//! JS Modulo Administrar Usuarios
import { msgError,msgSuccess } from "../message.js";
import { validateEmail,validateName,validatePasswordModerate,validateDocumentNumber} from "../validation.js";
import {  liMostrar, TableAndpagination, pagina} from "../pagination.js";

if(location.search == '?c=Usuarios&m=show' )
// || location.search == 'Usuarios/show' || location.pathname =='/AseoMatic/AseoMatic/Usuarios/show
{

    //? Guarda todos los datos de la tabla Usuarios (DB) 
    let allUsersData= [];

    //? Selecciona el tr de la tabla donde se mostraran los campos (id,usuarios,etc);
    const thBody = document.getElementById('tablaAllUser');

    //? Obtener ID y ejecutar metodos POST para edit y delete
    thBody.addEventListener('click',(e) =>{

        const id = e.target;
        if( id.getAttribute('id'))
        {
            const userId = id.getAttribute('id');
            // buscar el id que coincida con el id obtenido del evento
            const userIdFilter =allUsersData.filter( user => user.id_usuario ==userId)[0];
        
            if(id.getAttribute('data-target') == '#ModalUpdateUser')
            {
                showUserId(userIdFilter);
            }
            else if(id.getAttribute('data-target') == '#Delete')
            {
                const message= `${userIdFilter.nombres} ${userIdFilter.apellidos} identificado con el documento ${userIdFilter.numero_documento}`
                msgQuestion(message, userIdFilter.id_usuario, userIdFilter.token);
            }
            else if(id.getAttribute('data-target') == '#ModalShowUser'){
                showUserInfo(userIdFilter);
            }
        
        }


    })


    //? Funcion del html de td para mostrar en tabla en Admin.usuarios.php
    const createAllUsersTable = (datos,count) =>{
        const fragment = document.createDocumentFragment();
        
        const trTableAllUsers =document.createElement('TR');
        trTableAllUsers.classList.add('table-light');  
        
        const tdTableAllUsers =document.createElement('TD');
        tdTableAllUsers.setAttribute('colspan', '1');
        
        tdTableAllUsers.textContent = `${count}`;

        trTableAllUsers.append(tdTableAllUsers);

        const td2TableAllUsers =document.createElement('TD');
        td2TableAllUsers.setAttribute('colspan', '2');
        td2TableAllUsers.classList.add('text-capitalize');
        td2TableAllUsers.textContent = `${datos.nombres}`;

        trTableAllUsers.append(td2TableAllUsers);

        const td3TableAllUsers =document.createElement('TD');
        td3TableAllUsers.setAttribute('colspan', '2');
        td3TableAllUsers.classList.add('text-capitalize');
        td3TableAllUsers.textContent = `${datos.apellidos}`;

        trTableAllUsers.append(td3TableAllUsers);

        const td4TableAllUsers =document.createElement('TD');
        td4TableAllUsers.textContent = `${datos.numero_documento}`;

        trTableAllUsers.append(td4TableAllUsers);


        const td5TableAllUsers =document.createElement('TD');
        td5TableAllUsers.textContent = `${datos.correo}`;
        
        trTableAllUsers.append(td5TableAllUsers);

        const td6TableAllUsers =document.createElement('TD');
        td6TableAllUsers.classList.add('text-capitalize');
        td6TableAllUsers.textContent = `${datos.nombre_rol}`;
        
        trTableAllUsers.append(td6TableAllUsers);

    

        const td9TableAllUsers =document.createElement('TD');
        td9TableAllUsers.classList.add('i-separated');
        // td9TableAllUsers.id=`${datos.id_usuario}`;
        
    
        let iTd9 =document.createElement('I');
        iTd9.id= `${datos.id_usuario}`;
        iTd9.setAttribute('data-toggle','modal');
        iTd9.setAttribute('data-target','#ModalShowUser');
        iTd9.classList.add('show-svg');
        td9TableAllUsers.append(iTd9);
        

        // let aTd9 =document.createElement('A');
        // aTd9.classList.add('edit-btn');

        let iATd9 =document.createElement('I');
        iATd9.id= `${datos.id_usuario}`;
        iATd9.classList.add('edit-svg');
        iATd9.setAttribute('data-toggle','modal');
        iATd9.setAttribute('data-target','#ModalUpdateUser');

        td9TableAllUsers.append(iATd9);

        // td9TableAllUsers.append(aTd9);

        let i2Td9 =document.createElement('I');
        i2Td9.id=`${datos.id_usuario}`;
        i2Td9.classList.add('delete-svg');
        i2Td9.setAttribute('data-toggle','modal');
        i2Td9.setAttribute('data-target','#Delete');
        
        td9TableAllUsers.append(i2Td9);

        trTableAllUsers.append(td9TableAllUsers);


        fragment.append(trTableAllUsers);
        return fragment;

    }

    //? Paginacion 


    liMostrar.addEventListener('click',function(e)
    {
        
        if(e.target.localName == 'button')
        {
            if(e.target.textContent != 'Siguiente' && e.target.textContent != 'Anterior')
            {
                let numero = e.target.textContent;
                pagina.pagina =(Number(numero));
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allUsersData,renderizarHtml);
            }
            
            else if(e.target.textContent == 'Siguiente')
            {
                let page =Math.ceil(allUsersData.length / pagina.usuariosFila);

                if(pagina.pagina < page)
                {
                    pagina.pagina+=1;
                    TableAndpagination(pagina.pagina,pagina.usuariosFila,allUsersData,renderizarHtml);
                }
                
      
            }
            else if(e.target.textContent == 'Anterior'  && pagina.pagina > 1 )
            {
                pagina.pagina-=1;
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allUsersData,renderizarHtml);
            }
        
        }
     
    })




    const renderizarHtml=(datos )=> {
        const fragment = document.createDocumentFragment();
        let count= 0;
        for (const user of datos) {
            count++;
            fragment.append(createAllUsersTable(user,count));
        }
        thBody.innerHTML='';
        thBody.append(fragment);
    }

    const searchName = document.getElementById('buscador');
    searchName.addEventListener('input', function(e)
    {
        let value=searchName.value.toLowerCase();
        thBody.innerHTML = '';
        if(value.trim() != '')
        {
            let count = 1;

            for (const name of allUsersData) {
                
                let nombre = `${name.nombres} ${name.apellidos}`;
                let documento = `${name.numero_documento}`;
                if(nombre.indexOf(value) != -1 || documento.indexOf(value) != -1)
                {
                    thBody.appendChild(createAllUsersTable(name,count++));
                }
        
            }
            
        }

        if( value.trim() == '')
        {
            TableAndpagination(pagina.pagina,pagina.usuariosFila,allUsersData,renderizarHtml);
        }

    })
    
    


    //? Peticion Ajax de usuarios de DB Admin.usuarios.php
    const showAllUsers = ()=> {
       
        // fetch( `${url}Usuarios/allUsersJson`)
        fetch( `?c=Usuarios&m=allUsersJson`)
        .then(resp => resp.ok  ? Promise.resolve(resp)  : Promise.reject(new Error('Fallos la consulta')))
        .then(response => response.json())
        .then( data => {
            //? se guardar los datos en el array (esto es para detalles y actualizar)
            allUsersData = data;
            TableAndpagination(pagina.pagina, pagina.usuariosFila,data,renderizarHtml);  
        })
        .catch( error => console.log(error));
    }

    //? funcion para mostrar los campos en el #ModalUpdate de Administrador.usuarios
    const showUserId= (user) => {
        const nombres = document.getElementById("update_nombres").value=`${user.nombres}`;
        const apellidos = document.getElementById("update_apellidos").value=`${user.apellidos}`;
        const correo = document.getElementById("update_correo").value=`${user.correo}`;
        const rol = document.getElementById("update_rol").value=`${user.fk_rol}`;
        const clave = document.getElementById("update_clave").value=``;
        const tipo_documento = document.getElementById("update_tipo_documento").value=`${user.fk_tipo_documento}`;
        const numero_documento = document.getElementById("update_numero_documento").value=`${user.numero_documento}`;
        const update_salario = document.getElementById("update_salario").value=`${user.salario}`;
        const cargo = document.getElementById("update_cargo").value=`${user.fk_cargo}`;
        // const eps = document.getElementById("update_eps").value=`${user.fk_eps}`;
        const update_tipo_contrato = document.getElementById("update_tipo_contrato").value=`${user.fk_tipo_contrato}`;
        const id =document.getElementById('update_id').value=`${user.id_usuario}`;
        const token =document.getElementById('token').value=`${user.token}`;
        const clave_antigua =document.getElementById('clave_antigua').value=`${user.clave}`;
        const updatePrevImgUser=document.getElementById('update_prev_user_img').src=`${user.img_usuario}`;
    
    }

    //? funcion para mostrar los campos en el #ModalShow de Administrador.usuarios
    const showUserInfo = (user)=>{
        const nombres = document.getElementById("show_nombres").textContent=`${user.nombres} ${user.apellidos}`;
        const correo = document.getElementById("show_correo").textContent=`${user.correo}`;
        const rol = document.getElementById("show_rol").value=`${user.fk_rol}`;
        const tipo_documento = document.getElementById("show_tipo_documento").value=`${user.fk_tipo_documento}`;
        const numero_documento = document.getElementById("show_numero_documento").textContent=`${user.numero_documento}`;
        const cargo = document.getElementById("show_cargo").value=`${user.fk_cargo}`;
        const salario = document.getElementById("show_salario").textContent=`${user.salario}`;
        const show_tipo_contrato = document.getElementById("show_tipo_contrato").value=`${user.fk_tipo_contrato}`;
        const img_usuario = document.getElementById("show_user_img").src=`${user.img_usuario}`;
    }

    //? Funcion de Seguridad del Formulario Show-edit 
    const formIsValid = {
        nombre: false,
        apellido: false,
        correo: false,
        clave: false,
        numeroDocumento: false,
        fkRol: false,
        tipoContrato: false,
        cargo : false,
        tipoDocumento : false
    };

    //? Resetear Funcion de Seguridad del Formulario Show-edit 
    const formIsValidReset = () =>{
        formIsValid.nombre = false;
        formIsValid.apellido= false;
        formIsValid.correo= false;
        formIsValid.clave= false;
        formIsValid.numeroDocumento= false;
        formIsValid.fkRol= false;
        formIsValid.tipoContrato= false;
        formIsValid.cargo = false;
        formIsValid.tipoDocumento = false;
       
    }

    //? Resetear valores en #ModalAddUsers
    const resetValueFormModal= () =>{
        const nombres = document.getElementById("nombres").value="";
        const apellidos = document.getElementById("apellidos").value="";
        const correo = document.getElementById("correo").value="";
        const clave = document.getElementById("clave").value="";
        const tipo_documento = document.getElementById("tipo_documento").value="";
        const numero_documento = document.getElementById("numero_documento").value="";
        const cargo = document.getElementById("cargo").value="";
        
        const tipoContrato = document.getElementById("tipo_contrato").value="";
        const fk_rol = document.getElementById('rol').value="";
        const prev_user_img = document.getElementById('prev_user_img').src ="";
        const user_img = document.getElementById('user_img').value="";
    }


    //? Funcion de Seguridad verificar el estado de la funcion formIsValid() 
    const validateForm = () => {
        //?  primero convierto a array el objeto formIsValid
        const formValues = Object.values(formIsValid);
        //? una vez hecho array busco con el metodo findIndex que el valor este en false
        const valid = formValues.findIndex(value => value == false);
        //? si el valor esta en false retorna el numero del array (0,1,2,3) etc pero si no encuentra ningun false retorna -1
        if(valid == -1) return true;
        else return false;
    }

     //? Validacion de alertas de Error de Formulario de Usuarios
     const validarFormUsers = (paramNombre,paramApellido,paramCorreo,paramNumeroDocumento,paramFkRol,paramTipoContrato,paramCargo,paramTipoDocumento) =>
     {
         // tiene que ser parametro id "#ejemplo"
         if(paramNombre.value == ""){
             paramNombre.focus();
             const message = "Ingresar nombres del usuario";
             msgError(message);
         }
         else if(validateName(paramNombre.value) == false)
         {
            paramNombre.focus();
            const message = "El nombre ingresado no es valido";
            msgError(message);
         }
         else if(paramApellido.value == ""){
             paramApellido.focus();
             const message = "Ingresar apellidos del usuario";
             msgError(message);
         }
         else if(validateName(paramApellido.value) == false){
            paramApellido.focus();
            const message = "El apellido ingresado no es valido";
            msgError(message);
        }
         else if(paramCorreo.value == ""){
             paramCorreo.focus();
             const message = "Ingresar correo del usuario";
             msgError(message);
         }
         else if(validateEmail(paramCorreo.value) == false)
         {
             paramCorreo.focus();
             const message = "El Correo Ingresado No es Valido";
             msgError(message);
         }   
         else if(paramNumeroDocumento.value == ""){
             paramNumeroDocumento.focus();
             const message = "Ingresar numero documento";
             msgError(message);
         }
         else if(validateDocumentNumber(paramNumeroDocumento.value) != true)
         {
            paramNumeroDocumento.focus();
            const message = "Numero documento no valido";
            msgError(message);
         }    
         else if(paramTipoDocumento.value == ""){
             paramTipoDocumento.focus();    
             const message = "Seleccionar el tipo de documento";
             msgError(message);
         }
         else if(paramCargo.value == ""){
            paramCargo.focus();     
            const message = "Seleccionar el cargo";
            msgError(message);
        }
        // else if(paramEps.value == ""){
        //     paramEps.focus();
        //     const message = "Seleccionar la eps";
        //     msgError(message);
        // }
        else if(paramTipoContrato.value == ""){
            paramTipoContrato.focus();            
            const message = "Seleccionar el Tipo de Contrato";
            msgError(message);
        }
        else if(paramFkRol.value == ""){
            paramFkRol.focus();          
            const message = "Seleccionar el tipo de Rol";
            msgError(message);
        }
        else{
             formIsValid.nombre = true;
             formIsValid.apellido= true;
             formIsValid.correo= true;
             formIsValid.numeroDocumento= true;
             formIsValid.fkRol= true;
             formIsValid.tipoContrato= true;
             formIsValid.cargo = true;
             formIsValid.tipoDocumento = true;
             return true;
         }
     };

     const validarFormUsersPass= (paramClave) =>
     {
        if(paramClave.value == ""){
            paramClave.focus();
            const message = "Ingresar clave del usuario";
            msgError(message);
        }
        else if(validatePasswordModerate(paramClave.value) == false)
        {
            paramClave.focus();
            const message = "Clave no valida Debe tener 1 letra minúscula, 1 letra mayúscula, 1 número y tener al menos 8 caracteres.";
            msgError(message);
        }else{
            formIsValid.clave= true;
            return true;
        }    
     }

         //? DOM de visualizar de img  y input file
    const userImg =document.getElementById('user_img');
    const prevUserImg =document.getElementById('prev_user_img');
    const updateImgUser=document.getElementById('update_user_img');
    const updatePrevImgUser=document.getElementById('update_prev_user_img');

    //? funcion que previsualiza la img selecciona y valida si es formato adecuado require la el INPUT(FILE) y un img(visualizar)
    const validarImgUsuariosForm= (imgNoticia,prevImgNew) =>{
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

    //? Ejecutar validarImgEventosForm() cuando se cambie de imagen en insertar Evento en #ModalAddEvents 
    userImg.addEventListener('change', () =>{
        validarImgUsuariosForm(userImg,prevUserImg);

    })

    //? Ejecutar validarImgEventosForm() cuando se cambie de imagen en actualizar Evento en #ModalUpdateEvents
    updateImgUser.addEventListener('change', () =>{
        validarImgUsuariosForm(updateImgUser,updatePrevImgUser,);
    })

    //? funcion para guardar el usuario en DB en dashboard-admin : usuarios.php modal #ModalAddUser
    const btnSubmitFormUsers = document.getElementById('GuardarUsuario');
    btnSubmitFormUsers.addEventListener('click',(e)=>{
        e.preventDefault();
        const nombres = document.getElementById("nombres");
        const apellidos = document.getElementById("apellidos");
        const correo = document.getElementById("correo");
        const tipo_documento = document.getElementById("tipo_documento");
        const clave = document.getElementById("clave");
        const numero_documento = document.getElementById("numero_documento");
        const cargo = document.getElementById("cargo");
        const fk_tipo_contrato = document.getElementById("tipo_contrato");
        const fondo_pension = document.getElementById("fondo_pension");
        const fk_rol = document.getElementById('rol');
        const salario = document.getElementById('salario');
        const img = userImg.files[0];
        
         const validarForm =  validarFormUsers(nombres,apellidos,correo,numero_documento,fk_rol,fk_tipo_contrato,cargo,tipo_documento);

         
         if(validarForm == true )
         {   
             const validarClave = validarFormUsersPass(clave);
             if(validarClave == true && validateForm() == true){
                const formData = new FormData();
                formData.append('nombres',nombres.value.toLowerCase());
                formData.append('apellidos',apellidos.value.toLowerCase());
                formData.append('correo',correo.value.toLowerCase());
                formData.append('clave',clave.value);
                formData.append('tipo_documento',tipo_documento.value);
                formData.append('numero_documento',numero_documento.value);
                formData.append('rol',fk_rol.value);
                formData.append('cargo',cargo.value);
                formData.append('fk_tipo_contrato',fk_tipo_contrato.value);
                formData.append('salario',salario.value);
                formData.append('user_img',img);
                

                fetch('?c=Usuarios&m=store' , 
                {
                    method : 'POST',
                    body : formData,

                })
                .then(resp => (resp.ok) ? Promise.resolve(resp) : Promise.reject(new Error('fallo la insercion')))
                .then(resp => resp.json())
                .then((data)=>{
                    if(data.error == 'correoExistente')
                    {
                        correo.focus();
                        const msg ='Ya hay otra persona que tiene esta dirección de correo electrónico.';
                        msgError(msg);
                    }
                    else if(data.error == 'errorAgregarUsuario')
                    {
                        const msg ='Fallo la creacion de usuario';
                        msgError(msg);
                    }
                    else if(data.ok){

                        $("#ModalAddUser").modal('hide');
                        let message = 'Usuario Agregado Correctamente';
                        // se llama la funcion de !=error
                        msgSuccess(message);
                        // se llama a la funcion de mostrar usuarios html
                        showAllUsers();
                    //  se reinicia a false el objeto formIsValid
                        formIsValidReset();
                    //  se reinician los  valores de los input solicitados 
                        resetValueFormModal();
                    }

                }).catch(error => console.log(error));
            }
        }
    })

    //? funcion para limpiar los input en cancelar ModalAddUser
    const btnCancelUser= document.getElementById('CancelarUsuario');
    btnCancelUser.addEventListener('click',() => {
        resetValueFormModal();
    })

    //? funcion para actualizar el usuario en DB en dashboard-admin : usuarios.php modal #ModalUpdateUser
    const btnSubmitFormUpdateUsers = document.getElementById('EditarUsuario');
    btnSubmitFormUpdateUsers.addEventListener('click',(e)=>
    {
        e.preventDefault();
        const update_nombres = document.getElementById("update_nombres");
        const update_apellidos = document.getElementById("update_apellidos");
        const update_correo = document.getElementById("update_correo");
        const update_clave = document.getElementById("update_clave");
        const update_tipo_documento = document.getElementById("update_tipo_documento");
        const update_numero_documento = document.getElementById("update_numero_documento");
        const update_salario = document.getElementById("update_salario");
        const update_cargo = document.getElementById("update_cargo");
    
        const update_tipo_contrato = document.getElementById("update_tipo_contrato");
        const update_fk_rol = document.getElementById('update_rol');
        const update_updated_at = document.getElementById('updated_at');
        const update_id = document.getElementById("update_id");
        const token = document.getElementById("token");
        const clave_antigua = document.getElementById("clave_antigua");
        const img = updateImgUser.files[0];

        let validar = validarFormUsers(update_nombres,update_apellidos,update_correo,update_numero_documento,update_fk_rol,update_tipo_contrato,update_cargo,update_tipo_documento);

        if(update_clave.value == '')
        {
            formIsValid.clave = true;
        }else{
            validarFormUsersPass(update_clave);
        }

        if(validar == true && validateForm() == true)
        {
            const formData = new FormData();
            formData.append('update_id',update_id.value);
            formData.append('update_nombres',update_nombres.value.toLowerCase());
            formData.append('update_apellidos',update_apellidos.value.toLowerCase());
            formData.append('update_correo',update_correo.value.toLowerCase());
            formData.append('update_clave',update_clave.value);
            formData.append('update_tipo_documento',update_tipo_documento.value);
            formData.append('update_numero_documento',update_numero_documento.value);
            formData.append('update_cargo',update_cargo.value);
            formData.append('update_tipo_contrato',update_tipo_contrato.value);
            formData.append('update_rol',update_fk_rol.value);
            formData.append('update_salario',update_salario.value);
            formData.append('updated_at',update_updated_at.value);
            formData.append('token',token.value);
            formData.append('clave_antigua',clave_antigua.value);
            formData.append('update_user_img',img);
    
            fetch('?c=Usuarios&m=update', 
            {
                method : 'POST',
                body : formData,
               
            })
            .then(resp => (resp.ok) ? Promise.resolve(resp) : Promise.reject(new Error('fallo la actualizacion')))
            .then(resp => resp.json())
            .then((data)=>{

                if(data.error == 'correoExistente')
                {
                    correo.focus();
                    const msg ='Ya hay otra persona que tiene esta dirección de correo electrónico.';
                    msgError(msg);
                }
                else if(data.error){ 
                    const msg ='Fallo la actualizacion del usuario';
                    msgError(msg);
                }
                else if(data.ok){
                    $("#ModalUpdateUser").modal('hide');
                    let message = 'Usuario Actualizado Correctamente';
                    // se llama la funcion de !=error
                    msgSuccess(message);
                    // se llama a la funcion de mostrar usuarios html
                    showAllUsers();
                //  se reinicia a false el objeto formIsValid
                    formIsValidReset();  
                }  
            })
            .catch(console.log);
        }

    })

    // //? funcion De Mensaje modal y callback de eliminar(deleteUser(id));
    // const msgQuestion = (message, id, token) => {
    //     Swal.fire({
    //         icon: 'warning',
    //         html: `<p class="text-white h4 mb-3 text-capitalize">Desea borrar al usuario</p><p class="text-danger text-capitalize h6">${message}</p>`,
    //         focusConfirm:true,
    //         background : '#343a40',
    //         confirmButtonText: 'Entendido',
    //         confirmButtonColor: '#6C63FF',
    //         showCancelButton: true,
    //         cancelButtonText: 'Cancelar',
    //         cancelButtonColor: '#6C63FF'
    //         }).then((result) => {
    //         if (result.value) {
    //             const msg = "El usuarios ha sido eliminado";
    //             msgSuccess(msg);
    //             deleteUser(id,token);
    
    //         };
    //     })
    // }

    //? peticion para eliminar usuario mediante id
    const deleteUser = (id,token) =>{
        fetch(`?c=Usuarios&m=destroy&delete_id=${id}&token=${token}`,{
        }).then( resp =>  (resp.ok) ? Promise.resolve(resp) : Promise.reject(new Error('fallo el delete')))
        .then( resp => resp.text())
        .then((data) =>{
            // se actualiza la tabla
            showAllUsers();
        })
    
    }

    //? Se ejecuta la para la creacion de los datos cuando acceda a Modulo Usuarios
    showAllUsers()



// ! Conceptos

let arrayConceptos = [];
let allconceptoUpdate = [];

const ulConceptos = document.getElementById('lista_concepto');
const show_lista_concepto= document.getElementById('show_lista_concepto');
const update_lista_concepto= document.getElementById('update_lista_concepto');
const btnSaveArray = document.getElementById('guardarArray');
const guardarArrayUpdate =document.getElementById('guardarArrayUpdate');


const limpiarArrayConceptos = () =>{
    arrayConceptos = [];
    ulConceptos.innerHTML="";
}

const validarConceptos = (var1,var2,var3) => {

    if(var1.value == ""){
        var1.focus();
        const message = "Ingresar la descripcion del concepto";
        msgError(message);
    }
    else if(var2.value == "")
    {
        var2.focus();
        const message = "Ingresar el Asiento Contable";
        msgError(message);
    }
    else if(var3.value == '')
    {
        var3.focus();
        const message = "Ingresar el valor del concepto ";
        msgError(message);
    } 
    else{
        return true;
    }    
}

//HTML CONCEPTOS <TD> ETC
const htmlConceptos = (datos,count, method) =>{
    const fragment = document.createDocumentFragment();

    const trConcepto = document.createElement('TR');
    trConcepto.classList.add('table-light');

    const tdTableConcepto = document.createElement('TD');
    tdTableConcepto.textContent = `${count}`;
    trConcepto.append(tdTableConcepto);

    const td2TableConcepto =document.createElement('TD');
    td2TableConcepto.textContent = `${datos.descripcion}`;
    td2TableConcepto.classList.add('text-capitalize');


    trConcepto.append(td2TableConcepto);

    const td3TableConcepto =document.createElement('TD');
    td3TableConcepto.textContent = `${datos.asiento_contable}`;

    trConcepto.append(td3TableConcepto);

    const td4TableConcepto = document.createElement('TD');
    td4TableConcepto.textContent = `${datos.tipo_concepto}`;

    trConcepto.append(td4TableConcepto);

    const td5TableConcepto =document.createElement('TD');
    td5TableConcepto.textContent = `${datos.valor}`;

    trConcepto.append(td5TableConcepto);


    if(method == "update" || method == "crear")
    {
        const td6TableConcepto =document.createElement('TD');
        td6TableConcepto.classList.add('i-separated');
        const itd6TableConcepto = document.createElement('I');
        itd6TableConcepto.setAttribute('data-target',"BorrarConcepto");
        itd6TableConcepto.setAttribute('data-id',`${datos.id_concepto}`);
        itd6TableConcepto.classList.add("delete-svg");
        td6TableConcepto.append(itd6TableConcepto);
        trConcepto.append(td6TableConcepto);
    }
    
    
    fragment.append(trConcepto);
    return fragment;
}


const renderizarConcepto=(datos,method = "crear" )=> {

    const fragment = document.createDocumentFragment();
    let count= 0;
    for (const concepto of datos) {
        count++;
        fragment.append(htmlConceptos(concepto,count,method));
    }

    if(method == 'update')
    {
        update_lista_concepto.innerHTML=``;
        update_lista_concepto.appendChild(fragment);
    }else if(method =='show'){
        show_lista_concepto.innerHTML='';
        show_lista_concepto.append(fragment);

    }else if(method =="crear")
    {
        ulConceptos.innerHTML='';
        ulConceptos.append(fragment);
    }
}

//Guardar Conceptos creados
btnSaveArray.addEventListener('click',(e)=>{
    e.preventDefault();
    const id = arrayConceptos.length;
    const description = document.getElementById('descripcion_nomina');
    const asientoContable = document.getElementById('contable');
    const valor = document.getElementById('valor');
    const tipo_concepto = document.getElementById('tipo_concepto');

    let validacion = validarConceptos(description,asientoContable,valor,tipo_concepto);

        if( validacion)
        {
            let form = {
                id_concepto: id,
                descripcion : description.value,
                asiento_contable :asientoContable[asientoContable.value].textContent,
                fk_asiento_contable :asientoContable.value,
                valor : valor.value,
                tipo_concepto:tipo_concepto[tipo_concepto.value].textContent,
                fk_tipo_concepto: tipo_concepto.value 
            }


            arrayConceptos.push(form)

            renderizarConcepto(arrayConceptos);
           

            description.value="";
            asientoContable.value="";
            valor.value="";
        }

})

guardarArrayUpdate.addEventListener('click',(e)=>{
    e.preventDefault();
    const description = document.getElementById('update_descripcion_nomina');
    const asientoContable = document.getElementById('update_contable');
    const valor = document.getElementById('update_valor');
    const tipo_concepto = document.getElementById('update_tipo_concepto');
    const fk_nomina = document.getElementById('update_nomina');
    

    let validacion = validarConceptos(description,asientoContable,valor,tipo_concepto);

        if( validacion)
        {
            let count = allconceptoUpdate.length;
            let form = {
                id_concepto: count,
                descripcion : description.value,      
                fk_asiento_contable :asientoContable.value,
                tipo_concepto:tipo_concepto[tipo_concepto.value].textContent,
                asiento_contable:asientoContable[asientoContable.value].textContent,
                valor : valor.value,
                fk_tipo_concepto: tipo_concepto.value,
                fk_nomina: fk_nomina.value
            }

            allconceptoUpdate.push(form)
            renderizarConcepto(allconceptoUpdate,'update');
            description.value="";
            asientoContable.value="";
            valor.value="";
        }
})

//Eliminar conceptos
ulConceptos.addEventListener('click',(e)=>{
    e.preventDefault();
    if(e.target.getAttribute('data-id'))
    {
        let idConcepto=e.target.getAttribute('data-id');
        const filtro = arrayConceptos.filter( user => user.id_concepto== idConcepto)[0];
        const msg = `${filtro.descripcion} con el valor ${filtro.valor}` 
        msgQuestion(msg, idConcepto,"crear");
    }
})

update_lista_concepto.addEventListener('click',(e)=>{
    e.preventDefault();
    if(e.target.getAttribute('data-id'))
    {
        let idConcepto=e.target.getAttribute('data-id');
        const filtro = allconceptoUpdate.filter( user => user.id_concepto == idConcepto)[0];
        const msg = `${filtro.descripcion} con el valor ${filtro.valor}` 
        msgQuestion(msg, idConcepto);
    }
})


//? funcion De Mensaje modal de eliminar concepto
const msgQuestion = (message, id, tipo = "actualizar") => {
    Swal.fire({
        icon: 'warning',
        html: `<p class="text-white h4 mb-3 text-capitalize">Desea borrar el concepto</p><p class="text-danger text-capitalize h6">${message}</p>`,
        focusConfirm:true,
        background : '#343a40',
        confirmButtonText: 'Entendido',
        confirmButtonColor: '#6C63FF',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#6C63FF'
        }).then((result) => {
        if (result.value) {
            if(tipo != "crear")
            {
                const filtro = allconceptoUpdate.filter( user => user.id_concepto != id);
                allconceptoUpdate = filtro;
                renderizarConcepto(allconceptoUpdate,'update'); 
            }else{
                const filtro = arrayConceptos.filter( user => user.id_concepto != id);
                arrayConceptos = filtro;
                //! borra los conceptos en crear
                renderizarConcepto(arrayConceptos)
            }
        };
    })
}

// ?? GET SE DEBE CAMBIAR POR LA QUE TRAE ESTADO 3
const updateUserNomina = (id,method) =>{

    fetch(`?c=Nominas&m=showConceptsID&id=${id}`)
    .then(resp => resp.ok  ? Promise.resolve(resp)  : Promise.reject(new Error('Fallos la consulta')))
    .then(response => response.json())
    .then( data => {
        allconceptoUpdate= [];
        allconceptoUpdate =data;
        renderizarConcepto(allconceptoUpdate,method);
    })
    .catch( error => console.log(error));
    
}

// ! End-Conceptos

}

// ! end JS Modulo Administrar Usuarios