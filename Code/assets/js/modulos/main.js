$(".owl-carousel").owlCarousel({loop:!0,margin:10,nav:!0,autoplay:!0,autoplayTimeout:5e3,responsive:{0:{items:1},500:{items:2},800:{items:3},1000:{items:3},1400:{items:4},1800:{items:5}}}),$(".carousel").carousel({interval:4e3});$("#sidebarCollapse").click(function(){$("#sidebar, #content").toggleClass("active")});const toolbarOptions=[["bold","italic"],[{list:"ordered"},{list:"bullet"}],[{align:[]}]];async function payroll(t=1){try{const o=await fetch(`?c=AutomaticPayrolls&m=automaticPayroll&day=${t}`);let a=await o.json();return console.log(a),a}catch(t){return}}async function hora(){let t=new Date;if(console.log(`${t.getHours()}  ${t.getMinutes()}`),10==t.getHours()){await payroll()}}hora(),setInterval(()=>{hora()},3e5);export{toolbarOptions};





