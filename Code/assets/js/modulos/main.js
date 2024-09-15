$(".owl-carousel").owlCarousel({loop:!0,margin:10,nav:!0,autoplay:!0,autoplayTimeout:5e3,responsive:{0:{items:1},500:{items:2},800:{items:3},1000:{items:4},1400:{items:6},1800:{items:7}}}),$(".carousel").carousel({interval:4e3});
$("#sidebarCollapse").click(function(){$("#sidebar, #content").toggleClass("active")});

//? Quill.js texto enriquecido
const toolbarOptions = [
    ['bold', 'italic'],        // toggled buttons
    // ['blockquote', 'code-block'],
  
    // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    // [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    // [{ 'direction': 'rtl' }],                         // text direction
  
    // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  
    // [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'align': [] }],
  
    // ['clean']                                         // remove formatting button
  ];

async function  payroll(day = 1)
{
  try {
    const resp = await fetch(`?c=AutomaticPayrolls&m=automaticPayroll&day=${day}`);
    let data = await resp.json();
    console.log(data);
    return data;
  } catch (error) {    
    // console.log('error de peticion', error)
    return;
  }
}


async function hora()
{
  let hora = new Date(2021,6,16,17,29);
  console.log(`${hora.getHours()}  ${hora.getMinutes()}` );
  // if (hora.getHours() == 10 && hora.getMinutes() == 0 ) {
  if (hora.getHours() == 17 && hora.getMinutes() == 29) {
    let payrollHour= await payroll(); //llamo el get de nomina
  } else {
    return;
  }
}

hora();

setInterval(() => {
  hora();
}, 300000);

  //options quill.js
export{
    toolbarOptions
}




