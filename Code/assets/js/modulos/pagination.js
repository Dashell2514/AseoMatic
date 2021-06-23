//? paginacion

const liMostrar =document.getElementById('pagination');

let pagina = {
    pagina: 1,
    usuariosFila : 5,
    btnFila : 5
}


const paginationHtml = (count,pageBtn) =>{

    const fragment = document.createDocumentFragment();

    const liBtnPagination = document.createElement('LI');
    if(count == pageBtn)
    {
        liBtnPagination.classList.add('page-item','active');

    }else{
        liBtnPagination.classList.add('page-item');
    }

    const liBtnPaginationButtom = document.createElement('BUTTON');
    liBtnPaginationButtom.classList.add('page-link');
    liBtnPaginationButtom.textContent=`${count}`;
    liBtnPagination.append(liBtnPaginationButtom);

    fragment.append(liBtnPagination);

    return fragment;
}

function numbersButtoms(page,pageBtn)
{
    liMostrar.innerHTML='';

    const liPrev = document.createElement('LI');
    liPrev.id="pagination-prev";
    if(pageBtn == 1)
    {
        liPrev.classList.add('page-item','disabled');
    }else{
        liPrev.classList.add('page-item');
    }
    const liPrevBtn = document.createElement('BUTTON');
    liPrevBtn.classList.add('page-link');
    liPrevBtn.textContent="Anterior";
    liPrev.append(liPrevBtn);
    liMostrar.append(liPrev)


    //? Numero de Btn paginacion
    let maxLeft = (pagina.pagina - Math.floor(pagina.btnFila / 2))
    let maxRight = (pagina.pagina + Math.floor(pagina.btnFila / 2))

    if (maxLeft < 1) {
        maxLeft = 1;
        maxRight = pagina.btnFila;
    }

    if (maxRight > page) {
        maxLeft = page - (pagina.btnFila - 1)
        
        if (maxLeft < 1){
            maxLeft = 1
        }
        maxRight = page;
    }
    
    for (let i = maxLeft; i <= maxRight; i++) {
        liMostrar.append(paginationHtml(i,pageBtn)); 
    }

    const liNext = document.createElement('LI');
    liNext.id="pagination-next";
    if(pageBtn == page)
    {
        liNext.classList.add('page-item','disabled');
    }else{
        liNext.classList.add('page-item');
    }
    const liNextBtn = document.createElement('BUTTON');
    liNextBtn.classList.add('page-link');
    liNextBtn.textContent="Siguiente";
    liNext.append(liNextBtn);
    liMostrar.append(liNext)  

}

//! funcion que llama a toda la creacion de las tablas y tambien la paginacion
function TableAndpagination(pagina,usuariosFila,datos,functionHtml)
{
    const trimStart =(pagina-1) * usuariosFila;
    const trimEnd =trimStart + usuariosFila;
    const datosRecortados = datos.slice(trimStart,trimEnd);
    const numeroPaginas = Math.ceil(datos.length / usuariosFila);
    functionHtml(datosRecortados);
    numbersButtoms(numeroPaginas,pagina);
}



export{
    pagina,
    liMostrar,
    paginationHtml,
    numbersButtoms,
    TableAndpagination
}