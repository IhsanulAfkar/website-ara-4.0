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
      const home = document.getElementById('home_nav')
      home.classList.add("text-yellow-500")
      document.getElementById('res_home_nav').classList.add("text-yellow-500")
      break
    case 'Olimpiade':
      const olimpiade = document.getElementById('olimpiade_nav')
      olimpiade.classList.add("text-yellow-500")
      document.getElementById('res_olimpiade_nav').classList.add("text-yellow-500")
      break
    case 'About':
      const about = document.getElementById('about_nav')
      about.classList.add("text-yellow-500")
      document.getElementById('res_about_nav').classList.add("text-yellow-500")
      break
    case 'CTF':
      const ctf = document.getElementById('ctf_nav')
      ctf.classList.add("text-yellow-500")
      document.getElementById('res_ctf_nav').classList.add("text-yellow-500")
      break
    case 'ExploIT':
      const exploit = document.getElementById('exploit_nav')
      exploit.classList.add("text-yellow-500")
      document.getElementById('res_exploit_nav').classList.add("text-yellow-500")
    //   break
    // case 'HMIT':
    //   const hmit = document.getElementById('hmit_nav')
    //   hmit.classList.add("text-yellow-500")
    //   document.getElementById('res_hmit_nav').classList.add("text-yellow-500")
    //   break
  }
}