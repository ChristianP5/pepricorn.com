const scrollDown = document.querySelector("#scroll");
const home = document.querySelector("#home");

const nextSection = document.querySelector("#itemsection");
const mainSection = document.querySelector("#mainsection");

const bestProducts = document.querySelector("#bestproducts");
const bestSection = document.querySelector("#bestsection");

scrollDown.addEventListener("click", function () {
  nextSection.scrollIntoView({ behavior: "smooth" });
});

home.addEventListener("click", function () {
  mainSection.scrollIntoView({ behavior: "smooth" });
});

bestProducts.addEventListener("click", function () {
  bestSection.scrollIntoView({ behavior: "smooth", block: "start" });
});

let isClicked = false;
const dropdownButton = document.querySelector("#dropdownDefault");
const dropdown = document.querySelector("#dropdown");
const body = document.querySelector("body");
dropdownButton.addEventListener("click", function () {
  if (!isClicked) {
    dropdown.classList.remove("hidden");
    isClicked = true;
  } else {
    dropdown.classList.add("hidden");
    isClicked = false;
  }
});

const loadMore = document.querySelector("#load-more");
const hidden1 = document.querySelector("#hidden-1");

loadMore.addEventListener("click", function () {
  hidden1.classList.remove("hidden");
  hidden1.classList.add("grid", "grid-cols-2", "px-4", "gap-3", "mt-4", "sm:grid-cols-4", "sm:px-8", "lg:grid-cols-6", "lg:px-16");
  hidden1.removeAttribute("hidden-1");
  loadMore.textContent = "See All";

  AOS.refresh();
});

//Language Functionality
const languageSelector = document.querySelector("#language-selector");
const contactUs = document.querySelector("#contact-us");
const aboutUs = document.querySelector("#about-us");
const faq = document.querySelector("#faq");
const navProduct = document.querySelector("#nav-product");
const navSearch = document.querySelector("#nav-search");
const bestOffers = document.querySelector("#best-offers");
const discover = document.querySelector("#discover");
const signIn = document.querySelector("#sign-in");
const signUp = document.querySelector("#sign-up");

languageSelector.addEventListener("change", function () {
  console.log(languageSelector.value);
  if (languageSelector.value == "english") {
    contactUs.textContent = "Contact us";
    aboutUs.textContent = "About us";
    navProduct.textContent = "Products";
    navSearch.setAttribute("placeholder", "Search . . .");
    bestOffers.textContent = "Best offers";
    discover.textContent = "Discover";
    signIn.textContent = "Sign in";
    signUp.textContent = "Sign up";
  } else if (languageSelector.value == "indonesia") {
    contactUs.textContent = "Hubungi kami";
    aboutUs.textContent = "Tentang kami";
    navProduct.textContent = "Produk";
    navSearch.setAttribute("placeholder", "Cari di Pepricorn. . .");
    bestOffers.textContent = "Penawaran terbaik";
    discover.textContent = "Temukan";
    signIn.textContent = "Masuk";
    signUp.textContent = "Daftar";
  }
});
