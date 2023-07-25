const headerNav = document.getElementById("header-nav");
const modeChangeIcon = document.getElementById("mode-change-icon");
// scroller reveal 
animateElement = (element,origin,delay) => {
    // Initialize ScrollReveal with options
    const sr = ScrollReveal({
        delay: delay,
        distance: '100px',
        duration: 1000,
        easing: 'ease',
        origin: origin
    });
  
    // Reveal the element
    sr.reveal(element);
}
// animate element 
animateElement(".main-img","bottom",500);
animateElement(".bg-img","right",100);
animateElement(".hero-content","left",500);
animateElement(".social-icon-list","bottom",500);
animateElement(".card-1","left",500);
animateElement(".card-2","right",500);
animateElement("#vid","right",400);

function vender(){
    window.location.href = "http://localhost/pruebaplayeras/?C=PrendaController&M=index"
  }
