//! JS Modulo Administrar Eventos

import { msgError,msgSuccess } from "../message.js";
import {  liMostrar, TableAndpagination, pagina} from "../pagination.js";
import { toolbarOptions } from "../main.js";

if(location.search == '?c=Eventos&m=showEvents')
{

    //? Guarda todos los datos de la tabla Eventos (DB) 
    let allEventsData = [];

    //? Selecciona el tr donde se mostraran los campos (id,noticia,etc);
    const thBodyEvents= document.getElementById('tablaAllEvents');

    //? Funcion del HTML de la tabla ShowNews
    const createAllEventsTable = (datos,count) =>{

        const fragment = document.createDocumentFragment();

        const trTableAllEvents = document.createElement('TR');
        trTableAllEvents.classList.add('table-light');

        const tdTableAllEvents = document.createElement('TD');
        tdTableAllEvents.setAttribute('colspan','1');

        tdTableAllEvents.textContent = `${count}`;
        trTableAllEvents.append(tdTableAllEvents);

        const td2TableAllEvents =document.createElement('TD');
        td2TableAllEvents.setAttribute('colspan', '2');
        td2TableAllEvents.textContent = `${datos.titulo_evento}`;
        td2TableAllEvents.classList.add('text-capitalize');


        trTableAllEvents.append(td2TableAllEvents);

        const td3TableAllEvents =document.createElement('TD');
        td3TableAllEvents.setAttribute('colspan', '2');
        td3TableAllEvents.textContent = `${datos.fecha_publicado}`;

        trTableAllEvents.append(td3TableAllEvents);

        const td4TableAllEvents =document.createElement('TD');
        td4TableAllEvents.textContent = `${datos.nombres} ${datos.apellidos}`;
        td4TableAllEvents.classList.add('text-capitalize');

        trTableAllEvents.append(td4TableAllEvents);


        const td5TableAllEvents =document.createElement('TD');
        td5TableAllEvents.classList.add('i-separated');


        let iTd5 =document.createElement('I');
        iTd5.id= `${datos.id_evento}`;
        iTd5.setAttribute('data-toggle','modal');
        iTd5.setAttribute('data-target','#ModalShowEvents');
        iTd5.classList.add('show-svg');
        td5TableAllEvents.append(iTd5);

        let i2Td5 =document.createElement('I');
        i2Td5.id= `${datos.id_evento}`;
        i2Td5.classList.add('edit-svg');
        i2Td5.setAttribute('data-toggle','modal');
        i2Td5.setAttribute('data-target','#ModalUpdateEvents');

        td5TableAllEvents.append(i2Td5);

        let i3Td5 =document.createElement('I');
        i3Td5.id=`${datos.id_evento}`;
        i3Td5.classList.add('delete-svg');
        // i3Td5.setAttribute('data-toggle','modal');
        i3Td5.setAttribute('data-target','#ModalDeleteEvents');

        td5TableAllEvents.append(i3Td5);
        trTableAllEvents.append(td5TableAllEvents);

        fragment.append(trTableAllEvents);
        return fragment;

    }
    

    //?Funcion de  renderizar el html con los datos
    const renderizarHtmlEvents=(datos )=> {
        const fragment = document.createDocumentFragment();
        let count= 0;
        for (const user of datos) {
            count++;
            fragment.append(createAllEventsTable(user,count));
        }
        thBodyEvents.innerHTML='';
        thBodyEvents.append(fragment);
    }

    
    liMostrar.addEventListener('click',function(e)
    {
        
        if(e.target.localName == 'button')
        {
            if(e.target.textContent != 'Siguiente' && e.target.textContent != 'Anterior')
            {
                let numero = e.target.textContent;
                pagina.pagina =(Number(numero));
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allEventsData,renderizarHtmlEvents);
            }
            
            else if(e.target.textContent == 'Siguiente')
            {
                let page =Math.ceil(allEventsData.length / pagina.usuariosFila);

                if(pagina.pagina < page)
                {
                    pagina.pagina+=1;
                    TableAndpagination(pagina.pagina,pagina.usuariosFila,allEventsData,renderizarHtmlEvents);
                }
                
        
            }
            else if(e.target.textContent == 'Anterior'  && pagina.pagina > 1 )
            {
                pagina.pagina-=1;
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allEventsData,renderizarHtmlEvents);
            }
        
        }
        
    })
    
    //? Muestra los registros de Eventos de la DB en la tabla  Ajax
    const showAllEvents = ()=> {

        fetch('?c=Eventos&m=allEventsJson')
        .then(resp => resp.ok  ? Promise.resolve(resp)  : Promise.reject(new Error('Fallos la consulta')))
        .then(response => response.json())
        .then( data => {
            //? se guardar los datos en el array (esto es para detalles y actualizar)
            allEventsData = data;
            TableAndpagination(pagina.pagina,pagina.usuariosFila,data,renderizarHtmlEvents)
    
        })
        .catch( error => console.log(error));
    }

    //? funcion de mostrar datos en la #ModalUpdateEvents
     const showEventId= (evento) => {
        // console.log(evento);
        const tituloEvento= document.getElementById('update_titulo_evento').value=`${evento.titulo_evento}`;
        const descripcionEvento= quillEventUpdate.clipboard.dangerouslyPasteHTML(`${evento.descripcion_evento}`);
        const fkUsuario= document.getElementById('update_fk_usuario').value=`${evento.fk_usuario}`;
        const prevImgEvento= document.getElementById('update_prev-img').src=`${evento.imagen_evento}`;
        const idEvento= document.getElementById('update_id_evento').value=`${evento.id_evento}`;

    }

    //? funcion de mostrar datos en la #ModalShowEvents
    const showEventIdCard= (evento) => {
        // console.log(evento);
        const tituloEvento= document.getElementById('show_titulo_evento').textContent=`${evento.titulo_evento}`;
        const descripcionEvento= document.getElementById('show_descripcion_evento').innerHTML=`${evento.descripcion_evento}`;
        const fechaEvento= document.getElementById('show_fecha_evento').textContent=`${evento.nombres} ${evento.apellidos} ${evento.fecha_publicado}`;
        const prevImgEvento= document.getElementById('show_prev_img').src=`${evento.imagen_evento}`;
        // const idevento= document.getElementById('show_id_evento').value=`${evento.id_evento}`;

    }


    const searchName = document.getElementById('buscador');
    searchName.addEventListener('input', function(e)
    {
        let value=searchName.value.toLowerCase();
        thBodyEvents.innerHTML = '';

        if(value.trim() != '')
        {
            let count =1;
            for (const name of allEventsData) {
                let nombre = `${name.titulo_evento}`;
                // let documento = `${name.nombres}`;
                if(nombre.indexOf(value) != -1 )
                {
                    thBodyEvents.appendChild(createAllEventsTable(name,count++));
                }
        
            }
            
        }

        if( value.trim() == '')
        {
            TableAndpagination(pagina.pagina,pagina.usuariosFila,allEventsData,renderizarHtmlEvents);
        }

    })


    //? Validacion de alertas de Error de Formulario de Eventos
    const validarFormEvents= (title,description,user,img) =>{
   
        if(title.value =="")
        {
            const msg = 'Ingrese el titulo del Evento';
            title.focus();
            msgError(msg);
        }else if(description.getLength()-1 ==''){
            const msg = 'Ingrese la descripcion del Evento';
            description.focus();
            msgError(msg);
        }else if(user.value ==''){
            const msg = 'Ingrese el autor del Evento';
            user.focus();
            msgError(msg);
        }else if(img.src =='' || img.alt == 'image not found'){
            const msg = 'Ingrese la imagen del Evento';
            img.focus();
            msgError(msg);
        }else{
            return true;
        }

    }


    //? Resetear valores en #ModalAddEvents
    const resetValueForm= (titulo_evento,descripcion_evento,fk_usuario,img_evento,prev_img_evento) =>{
        const tituloEvento= document.getElementById(titulo_evento).value="";
        const descripcionEvento= descripcion_evento.container.firstChild.innerHTML="";
        const fkUsuario= document.getElementById(fk_usuario).value="";
        const imgEvento= document.getElementById(img_evento).value="";
        const PrevimgEvento= document.getElementById(prev_img_evento).src="";
    }

    //? DOM de visualizar de img  y input file
    const imgNew =document.getElementById('event_img');
    const prevImg =document.getElementById('prev-img');
    const updateImgEvent=document.getElementById('update_event_img');
    const updatePrevImgEvent=document.getElementById('update_prev-img');

    //? funcion que previsualiza la img selecciona y valida si es formato adecuado require la el INPUT(FILE) y un img(visualizar)
    const validarImgEventosForm= (imgNoticia,prevImgNew) =>{
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
    imgNew.addEventListener('change', () =>{
        validarImgEventosForm(imgNew,prevImg);

    })

    //? Ejecutar validarImgEventosForm() cuando se cambie de imagen en actualizar Evento en #ModalUpdateEvents
    updateImgEvent.addEventListener('change', () =>{
        validarImgEventosForm(updateImgEvent,updatePrevImgEvent,);
    })



   //? Obtener ID y ejecutar metodos POST para edit y delete
    thBodyEvents.addEventListener('click', (e) =>{
        const id = e.target;
        // console.log(id);
        if( id.getAttribute('id'))
        {
            const eventId = id.getAttribute('id');
            // buscar el id que coincida con el id obtenido del evento
            const eventIdFilter=allEventsData.filter( evento => evento.id_evento == eventId)[0];
            // console.log(eventIdFilter);
        
            if(id.getAttribute('data-target') == '#ModalUpdateEvents')
            {
                showEventId(eventIdFilter);
            }
            else if(id.getAttribute('data-target') == '#ModalDeleteEvents')
            {
                const message= `${eventIdFilter.titulo_evento} del autor ${eventIdFilter.nombres} ${eventIdFilter.apellidos}`
                msgQuestion(message, eventIdFilter.id_evento);
            }
            else if(id.getAttribute('data-target') == '#ModalShowEvents'){
                showEventIdCard(eventIdFilter);
            }
        
        }
        
    })

    

    //? Peticion AJAX de Agregar Evento 
    const btnSubmitFormEvent=document.getElementById('GuardarEvento');
    btnSubmitFormEvent.addEventListener('click',(e)=>{
        e.preventDefault();
        const tituloEvento= document.getElementById('titulo_evento');
        const descripcionEvento=quillEvent;
        const fkUsuario= document.getElementById('fk_usuario');
        const img=imgNew.files[0];
        //prevImg = es igual a img.src

        let validar =validarFormEvents(tituloEvento,descripcionEvento,fkUsuario,prevImg);
        if(validar ===  true)
        {
          
            const data = new FormData();
            data.append('titulo_evento',tituloEvento.value.toLowerCase());
            data.append('descripcion_evento',descripcionEvento.container.firstChild.innerHTML);
            data.append('event_img',img);
            data.append('fk_usuario',fkUsuario.value);

            fetch('?c=Eventos&m=storeEvents',{
                method: 'POST',
                body: data
            })
            .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Fallo la insercion')) )
            .then( resp => resp.json())
            .then(data => {

                if(data.ok)
                {
                    $("#ModalAddEvents").modal('hide');
                    // se llama la funcion resetear valores del formulario y se les pasa la id
                    resetValueForm('titulo_evento',descripcionEvento,'fk_usuario','event_img','prev-img');
                    let message = 'Evento Agregada Correctamente';
                    // se llama la funcion de !=error
                    msgSuccess(message);
                    // se llama a la funcion de mostrar usuarios html
                    showAllEvents();
                }else{
                    const msg ='Error ha modificado el html';
                    msgError(msg)
                    setTimeout(() => {
                        location="?c=All&m=index";
                    }, 1500);
                }
            }).catch(console.log);
        }
     

    })

    //? limpiar formulario Modal ADD EVENTO
    const btnCancelNew =document.getElementById('CancelarEvento');
    const btnCancelNewX =document.getElementById('cerrarModalNoticia');
    btnCancelNew.addEventListener('click',() => {
        resetValueForm('titulo_evento',quillEvent,'fk_usuario','event_img','prev-img');
    })
    btnCancelNewX.addEventListener('click',() => {
        resetValueForm('titulo_evento',quillEvent,'fk_usuario','event_img','prev-img');
    })

    //? Peticion AJAX para Actualizar Evento 
    const btnSubmitFormUpdateEvents = document.getElementById('ActualizarEvento');
    btnSubmitFormUpdateEvents.addEventListener('click',(e) =>{
        e.preventDefault();
        const tituloEvento= document.getElementById('update_titulo_evento');
        const descripcionEvento= quillEventUpdate;
        const fkUsuario= document.getElementById('update_fk_usuario');
        const idEvento= document.getElementById('update_id_evento');

        const img=updateImgEvent.files[0];
        let validar =validarFormEvents(tituloEvento,descripcionEvento,fkUsuario,updatePrevImgEvent);

        if(validar == true)
        {
            const data = new FormData();
            data.append('update_id_evento',idEvento.value);
            data.append('update_titulo_evento',tituloEvento.value.toLowerCase());
            data.append('update_descripcion_evento',descripcionEvento.container.firstChild.innerHTML);
            data.append('update_fk_usuario',fkUsuario.value);
            data.append('update_event_img',img);
            fetch('?c=Eventos&m=updateEvents',
            {
                method: 'POST',
                body: data
            })
            .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error al actualizar noticia')))
            .then(resp => resp.json())
            .then(data => {
                if(data.ok)
                {
                    $("#ModalUpdateEvents").modal('hide');
                    const msg ='El Evento se ha actualizado correctamente';
                    msgSuccess(msg);
                    showAllEvents();
                }else{
                    const msg ='Error ha modificado el html';
                    msgError(msg)
                    setTimeout(() => {
                        location="?c=All&m=index";
                    }, 1500);
                }

                
            })
        }

    })


    //? funcion De Mensaje modal y callback de eliminar(deleteUser(id));
    const msgQuestion = (message, id) => {
        Swal.fire({
            icon: 'warning',
            html: `<p class="text-white h4 mb-3 text-capitalize">Desea borrar el Evento</p><p class="text-danger text-capitalize h6">${message}</p>`,
            focusConfirm:true,
            background : '#343a40',
            confirmButtonText: 'Entendido',
            confirmButtonColor: '#6C63FF',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#6C63FF'
            }).then((result) => {
            if (result.value) {
                const msg = "El Evento ha sido eliminado";
                msgSuccess(msg);
                deleteEvent(id);
            };
        })
    }

    //? Peticion AJAX para Eliminar un Evento 
    const deleteEvent = (id) =>{
        fetch(`?c=Eventos&m=destroyEvents&id=${id}`,{
        }).then( resp =>  (resp.ok) ? Promise.resolve(resp) : Promise.reject(new Error('fallo el delete')))
        .then( resp => resp.text())
        .then((data) =>{
            // se actualiza la tabla
            showAllEvents();
        }).catch(console.log);
    
    }



    //? Se ejecuta la para la creacion de los datos cuando acceda a Modulo Eventos
    showAllEvents();


    //! TEXTO JS

    var quillEvent = new Quill('#descripcion_evento', {
        modules: {
            toolbar: toolbarOptions
          },
        theme: 'snow'
      });

    var quillEventUpdate = new Quill('#update_descripcion_evento', {
        modules: {
            toolbar: toolbarOptions
          },
        theme: 'snow'
      });
}

//! End JS Modulo Administrar Eventos