//! JS Modulo Administrar Noticias
import { msgError,msgSuccess } from "../message.js";
import {  liMostrar, TableAndpagination, pagina} from "../pagination.js";
import { toolbarOptions } from "../main.js";

if(location.search =='?c=Noticias&m=showNews'){

    //? Guarda todos los datos de la tabla noticias (DB) 
    let allNewsData = [];

    //? Selecciona el tr de la tabla donde se mostraran los campos (id,noticia,etc);
    const thBodyNews= document.getElementById('tablaAllNews');

  
    //? Manda la id y muestra los datos por id sin hacer peticion SQL 
    thBodyNews.addEventListener('click', (e) =>{

        const id = e.target;
        
        if( id.getAttribute('id'))
        {
            const newId = id.getAttribute('id');
            // buscar el id que coincida con el id obtenido del evento
            const newIdFilter=allNewsData.filter( noticia => noticia.id_noticia == newId)[0];
            // console.log(newIdFilter);
        
            if(id.getAttribute('data-target') == '#ModalUpdateNews')
            {
                showNewId(newIdFilter);
            }
            else if(id.getAttribute('data-target') == '#ModalDeleteNews')
            {
                const message= `${newIdFilter.titulo_noticia} del autor ${newIdFilter.nombres} ${newIdFilter.apellidos}`
                msgQuestion(message, newIdFilter.id_noticia);
            }
            else if(id.getAttribute('data-target') == '#ModalShowNews'){
                showNewIdCard(newIdFilter);
            }
        
        }
        
    })

    
    //? Funcion del html de td para mostrar en tabla en Admin.noticias.php
    const createAllNewsTable = (datos,count) =>{

        const fragment = document.createDocumentFragment();

        const trTableAllNews = document.createElement('TR');
        trTableAllNews.classList.add('table-light');

        const tdTableAllNews = document.createElement('TD');
        tdTableAllNews.setAttribute('colspan','1');

        tdTableAllNews.textContent = `${count}`;
        trTableAllNews.append(tdTableAllNews);

        const td2TableAllNews =document.createElement('TD');
        td2TableAllNews.setAttribute('colspan', '2');
        td2TableAllNews.textContent = `${datos.titulo_noticia}`;
        td2TableAllNews.classList.add('text-capitalize');


        trTableAllNews.append(td2TableAllNews);

        const td3TableAllNews =document.createElement('TD');
        td3TableAllNews.setAttribute('colspan', '2');
        td3TableAllNews.textContent = `${datos.fecha_publicado}`;

        trTableAllNews.append(td3TableAllNews);

        const td4TableAllNews =document.createElement('TD');
        td4TableAllNews.textContent = `${datos.nombres} ${datos.apellidos}`;
        td4TableAllNews.classList.add('text-capitalize');

        trTableAllNews.append(td4TableAllNews);


        const td5TableAllNews =document.createElement('TD');
        td5TableAllNews.classList.add('i-separated');


        let iTd5 =document.createElement('I');
        iTd5.id= `${datos.id_noticia}`;
        iTd5.setAttribute('data-toggle','modal');
        iTd5.setAttribute('data-target','#ModalShowNews');
        iTd5.classList.add('show-svg');
        td5TableAllNews.append(iTd5);

        let i2Td5 =document.createElement('I');
        i2Td5.id= `${datos.id_noticia}`;
        i2Td5.classList.add('edit-svg');
        i2Td5.setAttribute('data-toggle','modal');
        i2Td5.setAttribute('data-target','#ModalUpdateNews');

        td5TableAllNews.append(i2Td5);

        let i3Td5 =document.createElement('I');
        i3Td5.id=`${datos.id_noticia}`;
        i3Td5.classList.add('delete-svg');
        // i3Td5.setAttribute('data-toggle','modal');
        i3Td5.setAttribute('data-target','#ModalDeleteNews');

        td5TableAllNews.append(i3Td5);
        trTableAllNews.append(td5TableAllNews);

        fragment.append(trTableAllNews);
        return fragment;

    }

    //?Funcion de  renderizar el html con los datos
    const renderizarHtmlNews=(datos )=> {
        const fragment = document.createDocumentFragment();
        let count= 0;
        for (const user of datos) {
            count++;
            fragment.append(createAllNewsTable(user,count));
        }
        thBodyNews.innerHTML='';
        thBodyNews.append(fragment);
    }

    
    liMostrar.addEventListener('click',function(e)
    {
        
        if(e.target.localName == 'button')
        {
            if(e.target.textContent != 'Siguiente' && e.target.textContent != 'Anterior')
            {
                let numero = e.target.textContent;
                pagina.pagina =(Number(numero));
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allNewsData,renderizarHtmlNews);
            }
            
            else if(e.target.textContent == 'Siguiente')
            {
                let page =Math.ceil(allNewsData.length / pagina.usuariosFila);

                if(pagina.pagina < page)
                {
                    pagina.pagina+=1;
                    TableAndpagination(pagina.pagina,pagina.usuariosFila,allNewsData,renderizarHtmlNews);
                }
                
      
            }
            else if(e.target.textContent == 'Anterior'  && pagina.pagina > 1 )
            {
                pagina.pagina-=1;
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allNewsData,renderizarHtmlNews);
            }
        
        }
     
    })


    //? Funcion AJAX de datos DB NoticiasController.php
    const showAllNews = () =>{
        fetch('?c=Noticias&m=allNewsJson')
        .then(response => response.ok ? Promise.resolve(response) : Promise.reject(new Error('Fallo la consulta News')))
        .then(response => response.json())
        .then(data => {
        //Se guardan los datos en el array vacio
        allNewsData = data;
   
        TableAndpagination(pagina.pagina, pagina.usuariosFila,data,renderizarHtmlNews);

        }).catch( console.log);
    }

    //? funcion de mostrar datos en la #ModalUpdateNews
    const showNewId= (noticia) => {
        const tituloNoticia= document.getElementById('update_titulo_noticia').value=`${noticia.titulo_noticia}`;
        const descripcionNoticia= quillUpdate.clipboard.dangerouslyPasteHTML(`${noticia.descripcion_noticia}`);
        const fkUsuario= document.getElementById('update_fk_usuario').value=`${noticia.fk_usuario}`;
        const prevImgNoticia= document.getElementById('update_prev-img').src=`${noticia.imagen_noticia}`;
        const idNoticia= document.getElementById('update_id_noticia').value=`${noticia.id_noticia}`;

    }

    //? funcion de mostrar datos en la #ModalShowNews
    const showNewIdCard= (noticia) => {
        const tituloNoticia= document.getElementById('show_titulo_noticia').textContent=`${noticia.titulo_noticia}`;
        const descripcionNoticia= document.getElementById('show_descripcion_noticia').innerHTML=`${noticia.descripcion_noticia}`;
        const fechaNoticia= document.getElementById('show_fecha_noticia').textContent=`${noticia.nombres} ${noticia.apellidos} ${noticia.fecha_publicado}`;
        const prevImgNoticia= document.getElementById('show_prev_img').src=`${noticia.imagen_noticia}`;
        // const idNoticia= document.getElementById('show_id_noticia').value=`${noticia.id_noticia}`;

    }

    const searchName = document.getElementById('buscador');
    searchName.addEventListener('input', function(e)
    {
        let value=searchName.value.toLowerCase();
        thBodyNews.innerHTML = '';
        if(value.trim() != '')
        {
            let count = 1;
            for (const name of allNewsData) {
                let nombre = `${name.titulo_noticia}`;
                // let documento = `${name.nombres}`;
                if(nombre.indexOf(value) != -1 )
                {              
                    thBodyNews.appendChild(createAllNewsTable(name,count++));
                }
        
            }
            
        }

        if( value.trim() == '')
        {
            TableAndpagination(pagina.pagina,pagina.usuariosFila,allNewsData,renderizarHtmlNews);
        }

    })


    //? DOM de visualizar de img  y input file
    const imgNew =document.getElementById('new_img');
    const prevImg =document.getElementById('prev-img');
    const updateImgNew=document.getElementById('update_new_img');
    const updatePrevImgNew=document.getElementById('update_prev-img');
    
    //? funcion que previsualiza la img selecciona y valida si es formato adecuado require la el INPUT(FILE) y un img(visualizar)
    const validarImgNoticiasForm= (imgNoticia,prevImgNew) =>{
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

    //? Ejecutar validarImgNoticiasFomr() cuando se cambie de imagen en insertar Noticia.
    imgNew.addEventListener('change', () =>{
        validarImgNoticiasForm(imgNew,prevImg);
    })

    //? Ejecutar validarImgNoticiasFomr() cuando se cambie de imagen en Actualizar Noticia.
    updateImgNew.addEventListener('change', () =>{
        validarImgNoticiasForm(updateImgNew,updatePrevImgNew,);
    })

    //? Validacion de alertar de Error de Formulario de Noticias
    const validarFormNews= (title,description,user,img) =>{

        if(title.value =="")
        {
            const msg = 'Ingrese el titulo de la Noticia';
            title.focus();
            msgError(msg);
        }else if(description.getLength()-1 == 0){
            const msg = 'Ingrese la descripcion de la Noticia';
            description.focus();
            msgError(msg);
        }else if(user.value ==''){
            const msg = 'Ingrese el autor de la Noticia';
            user.focus();
            msgError(msg);
        }else if(img.src =='' || img.alt == 'image not found'){
            const msg = 'Ingrese la imagen de la Noticia';
            img.focus();
            msgError(msg);
        }else{
            return true;
        }

    }

    //? Resetear valores en #ModalAddNews
    const resetValueForm= (titulo_noticia,descripcion_noticia,fk_usuario,img_noticia,prev_img_noticia) =>{
        const tituloNoticia= document.getElementById(titulo_noticia).value="";
        const descripcionNoticia= descripcion_noticia.container.firstChild.innerHTML="";
        const fkUsuario= document.getElementById(fk_usuario).value="";
        const imgNoticia= document.getElementById(img_noticia).value="";
        const PrevimgNoticia= document.getElementById(prev_img_noticia).src="";
    }
        
   

    //? funcion para guardar la noticia en DB en noticias.php modal #ModalAddNew
    const btnSubmitFormNews=document.getElementById('GuardarNoticia');
    btnSubmitFormNews.addEventListener('click',(e)=>{
           e.preventDefault();
           const tituloNoticia= document.getElementById('titulo_noticia');
           //    const descripcionNoticia= document.getElementById('descripcion_noticia');
           const descripcionNoticia=quill;
           const fkUsuario= document.getElementById('fk_usuario');
           const img=imgNew.files[0];
    
           let validar =validarFormNews(tituloNoticia,descripcionNoticia,fkUsuario,prevImg);
           if(validar ===  true)
           {
               const data = new FormData();
               data.append('titulo_noticia',tituloNoticia.value.toLowerCase());
               data.append('descripcion_noticia',descripcionNoticia.container.firstChild.innerHTML);
               data.append('new_img',img);
               data.append('fk_usuario',fkUsuario.value);   
               

   
               fetch('?c=Noticias&m=storeNew',{
                   method: 'POST',
                   body: data
               })
               .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Fallo la insercion')) )
               .then( resp => resp.json())
               .then(data => {
                   if(data.ok)
                   {
                        $("#ModalAddNew").modal('hide');
                        // se llama la funcion resetear valores del formulario y se les pasa la id
                        resetValueForm('titulo_noticia',descripcionNoticia,'fk_usuario','new_img','prev-img');
                        let message = 'Noticia Agregada Correctamente';
                        // se llama la funcion de !=error
                        msgSuccess(message);
                        // se llama a la funcion de mostrar usuarios html
                        showAllNews();
                   }else{
                        const msg ='Error ha modificado el html';
                        msgError(msg)
                        // setTimeout(() => {
                        //     location="?c=All&m=index";
                        // }, 1500);
                   }
          
               }).catch(console.log);
   
           }
        
   
       })
   
    //? funcion para resetear valores de modal #ModalAddNew
    const btnCancelNew =document.getElementById('CancelarNoticia');
    const btnCancelNewX =document.getElementById('cerrarModalNoticia');
    btnCancelNew.addEventListener('click',() => {
        resetValueForm('titulo_noticia',quill,'fk_usuario','new_img','prev-img');
    })
    btnCancelNewX.addEventListener('click',() => {
        resetValueForm('titulo_noticia',quill,'fk_usuario','new_img','prev-img');
    })

    //? funcion para Actualizar la noticia en DB en noticias.php modal #ModalAddNew
    const btnSubmitFormUpdateNews = document.getElementById('ActualizarNoticia');
    btnSubmitFormUpdateNews.addEventListener('click',(e) =>{
        e.preventDefault();
        const tituloNoticia= document.getElementById('update_titulo_noticia');
        // const descripcionNoticia= document.getElementById('update_descripcion_noticia');
        const descripcionNoticia= quillUpdate;
        const fkUsuario= document.getElementById('update_fk_usuario');
        const idNoticia= document.getElementById('update_id_noticia');

        const img=updateImgNew.files[0];
        let validar =validarFormNews(tituloNoticia,descripcionNoticia,fkUsuario,updatePrevImgNew);

        if(validar == true)
        {
            const data = new FormData();
            data.append('update_id_noticia',idNoticia.value);
            data.append('update_titulo_noticia',tituloNoticia.value.toLowerCase());
            data.append('update_descripcion_noticia',descripcionNoticia.container.firstChild.innerHTML);
            data.append('update_fk_usuario',fkUsuario.value);
            data.append('update_new_img',img);
            fetch('?c=Noticias&m=updateNews',
            {
                method: 'POST',
                body: data
            })
            .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error al actualizar noticia')))
            .then(resp => resp.json())
            .then(data => {
                if(data.ok)
                {
                    $("#ModalUpdateNews").modal('hide');
                    const msg ='La noticia se ha actualizado correctamente';
                    msgSuccess(msg);
                    showAllNews();
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

    //? funcion De Mensaje modal y callback de eliminar(deleteUser(id));
    const msgQuestion = (message, id) => {
        Swal.fire({
            icon: 'warning',
            html: `<p class="text-white h4 mb-3 text-capitalize">Desea borrar la noticia</p><p class="text-danger text-capitalize h6">${message}</p>`,
            focusConfirm:true,
            background : '#343a40',
            confirmButtonText: 'Entendido',
            confirmButtonColor: '#6C63FF',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#6C63FF'
            }).then((result) => {
            if (result.value) {
                const msg = "El usuarios ha sido eliminado";
                msgSuccess(msg);
                deleteNew(id);
    
            };
        })
    }

    //? funcion de eliminar noticia
    const deleteNew = (id) =>{
        fetch(`?c=Noticias&m=destroyNew&id=${id}`,{
        }).then( resp =>  (resp.ok) ? Promise.resolve(resp) : Promise.reject(new Error('fallo el delete')))
        .then( resp => resp.text())
        .then((data) =>{
            // se actualiza la tabla
            showAllNews();
        }).catch(console.log);
    
    }

    //? Se ejecuta la para la creacion de los datos cuando acceda a Modulo Noticias
    showAllNews();



    //! TEXTO JS

    var quill = new Quill('#descripcion_noticia', {
        modules: {
            toolbar: toolbarOptions
          },
        theme: 'snow'
      });

    var quillUpdate = new Quill('#update_descripcion_noticia', {
        modules: {
            toolbar: toolbarOptions
          },
        theme: 'snow'
      });

}

//! End JS Modulo Administrar Noticias