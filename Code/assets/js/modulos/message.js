const msgError=t=>{Swal.fire({icon:"error",html:`<p class="text-white h4 mb-3 text-capitalize">Error de validacion de datos en</p><p class="text-danger text-capitalize h6">${t}</p>`,focusConfirm:!0,background:"#343a40",confirmButtonText:"Entendido",confirmButtonColor:"#6C63FF"})},msgSuccess=t=>{Swal.fire({icon:"success",html:`<p class="text-white h4 mb-3 text-capitalize">Bien Hecho</p><p class="text-success text-capitalize h6">${t}</p>`,focusConfirm:!0,background:"#343a40",confirmButtonText:"Entendido",confirmButtonColor:"#6C63FF"})};export{msgError,msgSuccess};