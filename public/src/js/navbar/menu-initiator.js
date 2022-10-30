const openMenuButton = document.getElementById('open-menu-button')
const menuList = document.getElementById('menu-list')
const closeMenuButton = document.getElementById('close-menu-button')


openMenuButton.addEventListener('click', (event) => {
  menuList.classList.toggle('hidden')  
})

closeMenuButton.addEventListener('click', () => {
  menuList.classList.toggle('hidden')
})

