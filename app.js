/*===========================DOM=============================*/
const navbarCont = document.querySelector(".navbar_container");
const Page = document.body.id;
const navbar_container_nav = document.querySelector(".navbar_container nav");
const navbar_menu = document.querySelector(".navbar_menu");
const navbar_box1_img = document.querySelector(".navbar_box1 img");
const navbar_search_I = document.querySelector(".navbar_search_box ");
const navbar_search_Input = document.querySelector(".navbarsearch_input");
const closed_dropdown_bar = document.querySelectorAll(".closed_dropdown_bar");
const spn2 = document.querySelectorAll(".spn2");
const navbar_box2ULLI = document.querySelectorAll(".navbar_box2 ul li");
const opened_dropdown_bar = document.querySelectorAll(".opened_dropdown_bar");
const closed_dropdown_bar_h1 = document.querySelectorAll(
    ".closed_dropdown_bar h1"
);
const coursesNav_boxULLI = document.querySelectorAll(".coursesNav_box ul li");
const courses_cards = document.querySelectorAll(".courses_image_box");
const counters = document.querySelectorAll(".counter");

/*===========================FUNCTIONS-indexDB=============================*/
function scrollFunc() {
    navbarCont.classList.toggle("active", scrollY > 80);
    navbar_box1_img.classList.toggle("active", scrollY > 80);
    for (let i = 0; i < navbar_box2ULLI.length; i++) {
        navbar_box2ULLI[i].classList.toggle("active", scrollY > 80);
    }
    navbar_search_Input.classList.toggle("active", scrollY > 80);
}

function NavsearchbaruClick() {
    navbar_search_Input.value = "";
    if (scrollFunc() > 80) {
    } else {
        navbar_search_Input.classList.toggle("active1");
    }
}

function navbarMenuClick() {
    document.querySelector(".responsive_navbar_box").classList.toggle("active");
    navbar_menu.classList.toggle("active");
}

function navbarMenuClick() {
    document.querySelector(".responsive_navbar_box").classList.toggle("active");
    navbar_menu.classList.toggle("active");
}

for (let i = 0; i < closed_dropdown_bar.length; i++) {
    closed_dropdown_bar[i].addEventListener("click", () => {
        opened_dropdown_bar[i].classList.toggle("active");
        closed_dropdown_bar_h1[i].classList.toggle("active");
        spn2[i].classList.toggle("active");
    });
}

navbar_box2ULLI.forEach((tab) => {
    tab.addEventListener("click", () => {
        navbar_box2ULLI.forEach((tab) => {
            tab.classList.remove("active");
        });

        tab.classList.add("active");
    });
});

coursesNav_boxULLI.forEach((tab) => {
    tab.addEventListener("click", () => {
        //filter
        const value = tab.textContent;
        courses_cards.forEach((filteritems) => {
            filteritems.classList.add("active");
            if (
                filteritems.getAttribute("value") == value.toLowerCase() ||
                value == "Show All"
            ) {
                filteritems.classList.remove("active");
            }
        });
    });
});

//static counter
let speed = 200;
for (let i = 0; i < counters.length; i++) {
    function staticTimer() {
        const datasetnumber = +counters[i].dataset.target;
        const currentnumber = +counters[i].innerText;
        const incPercount = datasetnumber / speed;
        if (currentnumber < datasetnumber) {
            counters[i].innerText = Math.ceil(incPercount + currentnumber);
            setTimeout(staticTimer, 60);
        }
    }
    staticTimer();
}

switch (Page) {
    case "indexBD":
        /*===========================EVENTLISTENERS=============================*/
        navbar_menu.addEventListener("click", navbarMenuClick);
        navbar_search_I.addEventListener("click", NavsearchbaruClick);
        window.addEventListener("scroll", scrollFunc);

        /*===========================sliders=============================*/

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            speed: 2000,
            opacity: 0,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
        });
        break;

    case "servicesBD":
        break;
}
