const openMenuButton = document.getElementById('open-menu-button')
const menuList = document.getElementById('menu-list')
const closeMenuButton = document.getElementById('close-menu-button')


openMenuButton.addEventListener('click', (event) => {
  menuList.classList.toggle('hidden')
})

closeMenuButton.addEventListener('click', () => {
  menuList.classList.toggle('hidden')
})

// active header
function activeHeader(title) {
  switch (title) {
    case 'Home':
      const home = document.getElementById('home_nav');
      home.classList.add("text-yellow-500");
      break;
    case 'Olimpiade':
      const olimpiade = document.getElementById('olimpiade_nav')
      olimpiade.classList.add("text-yellow-500");
      break;
    case 'CTF':
      const ctf = document.getElementById('ctf_nav')
      ctf.classList.add("text-yellow-500");
    case 'ExploIT':
      const exploit = document.getElementById('exploit_nav')
      exploit.classList.add("text-yellow-500");
    case 'HMIT':
      const hmit = document.getElementById('hmit_nav')
      hmit.classList.add("text-yellow-500");
  }
}