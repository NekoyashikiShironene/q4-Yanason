window.onresize = () => {
    // Auto close menu when resize to desktop size
    const w = window.innerWidth;
    if (w > 1024) {
        const menu = document.querySelector(".mobile-menu");
        const space = document.querySelector(".close-space");
        menu.style.animationName = "menu-slide-off"; 
        menu.style.display = "none";
        space.style.display = "none";
    }
}

function toggleBurger() {
    const menu = document.querySelector(".mobile-menu");
    const space = document.querySelector(".close-space");

    if (menu.classList.contains("visible")) {
        menu.classList.remove("visible");
        space.style.display = "none";
    }
    else {
        menu.classList.add("visible");
        space.style.display = "block";
    }

    
}