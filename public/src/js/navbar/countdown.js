const event_time = new Date("Jan 1, 2023 00:00:00").getTime();

const hari = document.getElementById('hari')
const jam = document.getElementById('jam')
const menit = document.getElementById('menit')
const detik = document.getElementById('detik')

if((event_time - new Date().getTime()) >0 ){
  setInterval(() => {
    let distance = event_time - new Date().getTime()
    hari.innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
    jam.innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    menit.innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    detik.innerText = Math.floor((distance % (1000 * 60)) / 1000);
  }, 1000);
}

