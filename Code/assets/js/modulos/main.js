$(".owl-carousel").owlCarousel({loop:!0,margin:10,nav:!0,autoplay:!0,autoplayTimeout:5e3,responsive:{0:{items:1},500:{items:2},800:{items:3},1000:{items:4},1400:{items:6},1800:{items:7}}}),$(".carousel").carousel({interval:4e3});
$("#sidebarCollapse").click(function(){$("#sidebar, #content").toggleClass("active")});

//? Quill.js texto enriquecido
const toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],
  
    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction
  
    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  
    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'align': [] }],
  
    ['clean']                                         // remove formatting button
  ];


  //options quill.js
export{
    toolbarOptions
}




