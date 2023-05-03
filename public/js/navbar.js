function toggleSlideover(){
    document.getElementById('slideover-container').classList.toggle('invisible');
    document.getElementById('slideover-bg').classList.toggle('opacity-0');
    document.getElementById('slideover-bg').classList.toggle('opacity-50');
    document.getElementById('slideover').classList.toggle('translate-x-full');
}

function toggleSlideover2(){
    document.getElementById('slideover-container2').classList.toggle('invisible');
    document.getElementById('slideover-bg2').classList.toggle('opacity-0');
    document.getElementById('slideover-bg2').classList.toggle('opacity-50');
    document.getElementById('slideover2').classList.toggle('translate-y-full');
}

/* const navbar = document.querySelector("#navbar");
window.addEventListener("scroll", () =>{
    if (window.scrollY > 100) {
    // If the position is greater than 100 pixels, add a class to the navbar to change its color
    navbar.classList.add('bg-white');
  } else {
    // If the position is less than 100 pixels, remove the class that changes the navbar color
    navbar.classList.remove('bg-white');
  }
}) */