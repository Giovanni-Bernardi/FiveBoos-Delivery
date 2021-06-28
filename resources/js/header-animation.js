// Funzione di animazione header a scroll verticale
function scrolledHeader(){
    // Px scroll verticale
    let scrollValueY = window.scrollY;
    let header = document.getElementById('scrolledHeader');
    if (scrollValueY > 0) {
        header.classList.add('scrolled');
    }else{
        header.classList.remove('scrolled');
    }
}

// Funzione animazione hamburger e apertura menu
function hambugerClick(){
    let hambuger = document.getElementsByClassName('ham-container')[0];
    let hamburgerMenu = document.getElementsByClassName('menulist')[0];
    hambuger.addEventListener('click', function(){
        hambuger.classList.toggle('active');
        hamburgerMenu.classList.toggle('active');
    });
}

// Funzione animazione user menu
function userClick(){
    let userBtn = document.getElementById('user-icon');
    let userMenu = document.getElementsByClassName('user-popup')[0];
    let menuListItem = userMenu.children;
    userBtn.addEventListener('click', function(){
        userMenu.classList.toggle('active');
        for (let i = 0; i < menuListItem.length; i++) {
            menuListItem[i].children[0].classList.toggle('active');
        }
    });
}

function init(){
    console.log('JS header attivo');
    window.addEventListener('scroll', scrolledHeader);
    hambugerClick();
    userClick();
}

document.addEventListener('DOMContentLoaded', init);