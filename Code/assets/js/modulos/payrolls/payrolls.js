import { msgError,msgSuccess } from "../message.js";
import {  liMostrar, TableAndpagination, pagina} from "../pagination.js";

if( location.search =='?c=Nominas&m=index')
{


let arrayConceptos = [];
const btnCancelModal = document.getElementById('CancelarNomina');
const IconCancelModal = document.getElementById('cerrarModalNomina');
const ulConceptos = document.getElementById('lista_concepto');
const btnSaveArray = document.getElementById('guardarArray');
const thBody =document.getElementById('tablaAllNominas');
// const update_lista_concepto = getElementById('update_lista_concepto');

// const CancelModalNomina= document.querySelectorAll("button[data-class='nomina_cancel']").forEach(Element => {
//     Element.addEventListener('click',()=>{
        
//     })
// });

const limpiarArrayConceptos = () =>{
    arrayConceptos = [];
    ulConceptos.innerHTML="";
}
btnSaveArray.addEventListener('click',(e)=>{
    e.preventDefault();

    const description = document.getElementById('descripcion_nomina');
    const asientoContable = document.getElementById('contable');
    const valor = document.getElementById('valor');
    const tipo_concepto = document.getElementById('tipo_concepto');

    let validacion = validarConceptos(description,asientoContable,valor,tipo_concepto);

        if( validacion)
        {
            let form = {
                descripcion : description.value,
                asiento_contable :asientoContable[asientoContable.value].textContent,
                fk_asiento_contable :asientoContable.value,
                valor : valor.value,
                tipo_concepto:tipo_concepto[tipo_concepto.value].textContent,
                fk_tipo_concepto: tipo_concepto.value
             
                
               
               
                
            }


            arrayConceptos.push(form)

            renderizarConcepto(arrayConceptos);
            console.log(arrayConceptos.length);

            description.value="";
            asientoContable.value="";
            valor.value="";
        }

})

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

const validarInsertNomina = (var1,var2,var3,var4) => {

    if(var1.value == ""){
        var1.focus();
        const message = "Ingresar el usuario de la nomina";
        msgError(message);
    }
    else if(var2.value == "")
    {
        var2.focus();
        const message = "Ingresar la fecha de inicio de la nomina";
        msgError(message);
    }
    else if(var3.value == '')
    {
        var3.focus();
        const message = "Ingresar la fecha hasta de la nomina ";
        msgError(message);
    }
    else if(var4.length == 2)
    {
        const message = "Ingresar los Conceptos de la Nomina ";
        msgError(message);
    } 
    else{
        return true;
    }    
}

const htmlConceptos = (datos,count) =>{
    console.log(datos);
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


    fragment.append(trConcepto);
    return fragment;
}



const renderizarConcepto=(datos )=> {
    const fragment = document.createDocumentFragment();
    let count= 0;
    for (const concepto of datos) {
        count++;
        fragment.append(htmlConceptos(concepto,count));
    }
    ulConceptos.innerHTML='';
    ulConceptos.append(fragment);
}


const btnGuardarNomina = document.getElementById('GuardarNomina');

btnGuardarNomina.addEventListener('click',function(e){
    e.preventDefault();
    const fk_usuario = document.getElementById('usuario');
    const fecha_de = document.getElementById('fecha_de');
    const fecha_hasta = document.getElementById('fecha_hasta');
    const arrayConcep = JSON.stringify(arrayConceptos);

    let validar = validarInsertNomina(fk_usuario,fecha_de,fecha_hasta,arrayConcep);
    if(validar)
    {
        const formData = new FormData();
        formData.append('fk_usuario',fk_usuario.value);
        formData.append('fecha_de',fecha_de.value);
        formData.append('fecha_hasta',fecha_hasta.value);
        formData.append('arrayDatos',arrayConcep);

        fetch('?c=Nominas&m=store',
        {
            method: 'POST',
            body: formData
        })
        .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error al Crear Nomina')))
        .then(resp => resp.json())
        .then(data => {

            if(data.ok)
            {
                $("#ModalAddNomina").modal('hide');
                const msg ='La Nomina se ha creado';
                msgSuccess(msg);
                limpiarArrayConceptos();
                fk_usuario.value="";
                fecha_de.value="";
                fecha_hasta.value="";
                showNominas();
            }else{
                const msg ='Error Fallo';
                msgError(msg)
                setTimeout(() => {
                    location="?c=All&m=index";
                }, 1500);
            }

            
        })
    }
    


})

let allNominasData= [];

//? Funcion del html de td para mostrar en tabla en Admin.usuarios.php
const createTableNominas = (datos,count) =>{
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
    td2TableAllUsers.textContent = `${datos.numero_documento}`;

    trTableAllUsers.append(td2TableAllUsers);

    const td3TableAllUsers =document.createElement('TD');
    td3TableAllUsers.setAttribute('colspan', '2');
    td3TableAllUsers.classList.add('text-capitalize');
    td3TableAllUsers.textContent = `${datos.nombres} ${datos.apellidos}`;

    trTableAllUsers.append(td3TableAllUsers);

    const td4TableAllUsers =document.createElement('TD');
    td4TableAllUsers.textContent = `${datos.valor}`;

    trTableAllUsers.append(td4TableAllUsers);


    const td5TableAllUsers =document.createElement('TD');
    td5TableAllUsers.textContent = `${datos.fecha_de}`;
    
    trTableAllUsers.append(td5TableAllUsers);

    const td6TableAllUsers =document.createElement('TD');
    td6TableAllUsers.classList.add('text-capitalize');
    td6TableAllUsers.textContent = `${datos.fecha_hasta}`;
    
    trTableAllUsers.append(td6TableAllUsers);



    const td9TableAllUsers =document.createElement('TD');
    td9TableAllUsers.classList.add('i-separated');
    // td9TableAllUsers.id=`${datos.id_usuario}`;
    

    let iTd9 =document.createElement('I');
    iTd9.id= `${datos.id_nomina}`;
    iTd9.setAttribute('data-toggle','modal');
    iTd9.setAttribute('data-target','#ModalShowNomina');
    iTd9.classList.add('show-svg');
    td9TableAllUsers.append(iTd9);
    

    // let aTd9 =document.createElement('A');
    // aTd9.classList.add('edit-btn');

    let iATd9 =document.createElement('I');
    iATd9.id= `${datos.id_nomina}`;
    iATd9.classList.add('edit-svg');
    iATd9.setAttribute('data-toggle','modal');
    iATd9.setAttribute('data-target','#ModalUpdateNomina');

    td9TableAllUsers.append(iATd9);

   

    let i2Td9 =document.createElement('A');
    i2Td9.id=`${datos.id_nomina}`;
    i2Td9.classList.add('pdf-svg');
    i2Td9.setAttribute('href',`?c=Pdf&m=downloadpdf&id_nomina=${datos.id_nomina}`);
    i2Td9.setAttribute('target',`_blank`);
 
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
            TableAndpagination(pagina.pagina,pagina.usuariosFila,allNominasData,renderizarHtml);
        }
        
        else if(e.target.textContent == 'Siguiente')
        {
            let page =Math.ceil(allNominasData.length / pagina.usuariosFila);

            if(pagina.pagina < page)
            {
                pagina.pagina+=1;
                TableAndpagination(pagina.pagina,pagina.usuariosFila,allNominasData,renderizarHtml);
            }
            
  
        }
        else if(e.target.textContent == 'Anterior'  && pagina.pagina > 1 )
        {
            pagina.pagina-=1;
            TableAndpagination(pagina.pagina,pagina.usuariosFila,allNominasData,renderizarHtml);
        }
    
    }
 
})




const renderizarHtml=(datos )=> {
    const fragment = document.createDocumentFragment();
    let count= 0;
    for (const user of datos) {
        count++;
        fragment.append(createTableNominas(user,count));
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
        for (const name of allNominasData) {
           
            let documento = `${name.numero_documento}`;
           
            
            if(documento.indexOf(value) != -1)
            {
                thBody.appendChild(createTableNominas(name,count++));
            }
    
        }
        
    }

    if( value.trim() == '')
    {
        TableAndpagination(pagina.pagina,pagina.usuariosFila,allNominasData,renderizarHtml);
    }

})


const showNominas= ()=>{

    fetch( `?c=Nominas&m=allNominasJson`)
    .then(resp => resp.ok  ? Promise.resolve(resp)  : Promise.reject(new Error('Fallos la consulta')))
    .then(response => response.json())
    .then( data => {
        //? se guardar los datos en el array (esto es para detalles y actualizar)
        allNominasData = data;
       
        TableAndpagination(pagina.pagina, pagina.usuariosFila,data,renderizarHtml);  
    })
    .catch( error => console.log(error));
}


thBody.addEventListener('click',(e) =>{

    const id = e.target;
    if( id.getAttribute('id'))
    {
        const userId = id.getAttribute('id');
        // buscar el id que coincida con el id obtenido del evento
        const userIdFilter =allNominasData.filter( user => user.id_nomina ==userId)[0];
    
        if(id.getAttribute('data-target') == '#ModalUpdateNomina')
        {
            document.getElementById('update_nomina').value=userIdFilter.id_nomina;
            updateUserNomina(userIdFilter.id_nomina,'update');
        }
        // else if(id.getAttribute('data-target') == '#Delete')
        // {
        //     const message= `${userIdFilter.nombres} ${userIdFilter.apellidos} identificado con el documento ${userIdFilter.numero_documento}`
        //     msgQuestion(message, userIdFilter.id_usuario, userIdFilter.token);
        // }
        else if(id.getAttribute('data-target') == '#ModalShowNomina'){
            showUserNomina(userIdFilter);
            updateUserNomina(userIdFilter.id_nomina,'show');
        }
    
    }


})
const showUserNomina = (datos)=>{
    const show_user =document.getElementById('show_user').textContent=`${datos.nombres} ${datos.apellidos}`;
    const show_salario =document.getElementById('show_salario').textContent=`${datos.valor}`;
    const show_fecha_de =document.getElementById('show_fecha_de').textContent=`${datos.fecha_de}`;
    const show_fecha_hasta =document.getElementById('show_fecha_hasta').textContent=`${datos.fecha_hasta}`;

}


let allconceptoUpdate = [];
const updateUserNomina = (id,method) =>{

    fetch(`?c=Nominas&m=showConceptsID&id=${id}`)
    .then(resp => resp.ok  ? Promise.resolve(resp)  : Promise.reject(new Error('Fallos la consulta')))
    .then(response => response.json())
    .then( data => {
        allconceptoUpdate= [];
        allconceptoUpdate =data;
        conceptsUpdateFor(method);
    })
    .catch( error => console.log(error));
    
}

const show_lista_concepto= document.getElementById('show_lista_concepto');
const update_lista_concepto= document.getElementById('update_lista_concepto');


const conceptsUpdateFor = (method) =>{
    if(method == 'update')
    {
        update_lista_concepto.innerHTML=``;
    }else if(method =='show'){
        show_lista_concepto.innerHTML='';
    }
    let count =0;
    for (const concepto of allconceptoUpdate) {
        count++;
        showUpdateConcepts(concepto,count,method);
        
    }
}


//eliminar 
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

  //? funcion De Mensaje modal y callback de eliminar(deleteUser(id));
  const msgQuestion = (message, id) => {
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
                const filtro = allconceptoUpdate.filter( user => user.id_concepto != id);
                allconceptoUpdate = filtro;
                conceptsUpdateFor('update'); 
        };
    })
}

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

const showUpdateConcepts = (datos,count,method) =>{
    let html=`<tr><th>${count}</th>
    <th class="text-capitalize" >${datos.descripcion}</th>
    <th class="text-capitalize" >${datos.asiento_contable}</th>
    <th class="text-capitalize" >${datos.tipo_concepto}</th>
    <th  >${datos.valor}</th>
    ${ (method=='update') ? `<th ><i data-target="BorrarConcepto" data-id="${datos.id_concepto}" class="delete-svg position-absolute"></i></th>` : '' }
    </tr>`;

    const meter =document.createElement('tr');
    meter.innerHTML=html;
    if(method == 'update'){
        update_lista_concepto.appendChild(meter);
    }else if(method =='show'){
        show_lista_concepto.appendChild(meter);
    }
}


const guardarArrayUpdate =document.getElementById('guardarArrayUpdate');


let countConcepto = 0;
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
            countConcepto++; 
            let form = {
                id_concepto: countConcepto,
                descripcion : description.value,      
                fk_asiento_contable :asientoContable.value,
                tipo_concepto:tipo_concepto[tipo_concepto.value].textContent,
                asiento_contable:asientoContable[asientoContable.value].textContent,
                valor : valor.value,
                fk_tipo_concepto: tipo_concepto.value,
                fk_nomina: fk_nomina.value

             
            }


            allconceptoUpdate.push(form)

            conceptsUpdateFor('update');
            console.log(allconceptoUpdate);

       
            description.value="";
            asientoContable.value="";
            valor.value="";
        }
})


const btnUpdateNomina=document.getElementById('UpdateNomina');

btnUpdateNomina.addEventListener('click',(e)=>{
    e.preventDefault();

    const fk_nomina = document.getElementById('update_nomina');
    const conceptoUpdate = JSON.stringify(allconceptoUpdate);
  
    if(conceptoUpdate.length != 2){
        const formData = new FormData();
        formData.append('fk_nomina',fk_nomina.value);
        formData.append('arrayDatos',conceptoUpdate);
        fetch('?c=Nominas&m=update',
        {
            method: 'POST',
            body: formData
        })
        .then( response => (response.ok) ? Promise.resolve(response) : Promise.reject(new Error('Error al Crear Nomina')))
        .then(resp => resp.json())
        .then(data => {

            if(data.ok)
            {
                $("#ModalUpdateNomina").modal('hide');
                const msg ='La Nomina se ha Actualizado';
                msgSuccess(msg);
                allconceptoUpdate = [];
                showNominas();
            
            }else{
                const msg ='Error Fallo';
                msgError(msg)
                setTimeout(() => {
                    location="?c=All&m=index";
                }, 1500);
            }

            
        })
    }else{
        const msg ='Debe haber minimo 1 concepto';
        msgError(msg);
    }

})

    showNominas();



}