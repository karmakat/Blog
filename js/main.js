const navItems = document.querySelector('.nav_items');
const openNavBtn = document.querySelector('#open_nav-btn');
const closeNavBtn = document.querySelector('#close_nav-btn');

// Opens nav dropdown

const openNav = () =>{
    navItems.style.display = 'flex';
    openNav.style.display = 'none';
    closeBtn.style.display = 'inline-block';
}

// Close nav dropdown

const closeNav = () =>{
    navItems.style.display = 'none';
    openNav.style.display = 'inline-block';
    closeBtn.style.display = 'none';
}

// Add event listener

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);