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
const contact_corner_box = document.querySelector(".contact_corner_box");
const contact_corner_box_i = document.querySelector(".chat_open_btn");
const contact_header_remove_btn = document.querySelector(
  ".contact_header .contact_corner_box"
);

const message_box_remove_btn = document.querySelector(
  ".message_box_remove_btn"
);
const contact_corner_content = document.querySelector(
  ".contact_corner_content"
);

const chat_open_btn = document.querySelector(".chat_open_btn");
const contact_input = document.querySelector(".contact_input_box input");
const send_msg_btn = document.querySelector(".send_msg_btn");
const contact_chat_box = document.querySelector(".contact_chat_box");
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

//online contact btn
function contactBtnclickOpen() {
  contact_corner_box.classList.add("active");
  chat_open_btn.classList.add("active");
  contact_corner_content.classList.remove("active");
}

function contactBtnclickClose() {
  contact_corner_box.classList.remove("active");
  chat_open_btn.classList.remove("active");
  contact_corner_content.classList.add("active");
}

function scrollToBottom() {
  contact_chat_box.scrollTop = contact_chat_box.scrollHeight;
}

function messageclickBtn() {
  let day = new Date();
  let hr = day.getHours();
  let mn = day.getMinutes();
  let sc = day.getSeconds();
  if (contact_input.value.trim() != 0) {
    let newmessage = document.createElement("div");
    newmessage.classList.add("message_box");
    newmessage.innerHTML = `
        <h3>${hr + ":" + mn}</h3>
        <div>
          <p>${contact_input.value}</p>
        </div>
`;
    contact_chat_box.appendChild(newmessage);
    scrollToBottom();
    contact_input.value = "";
  }
}

function messageKeybindBtn(e) {
  if (e.key == "Enter") messageclickBtn();
}

switch (Page) {
  case "indexBD":
    /*===========================EVENTLISTENERS=============================*/
    navbar_menu.addEventListener("click", navbarMenuClick);
    navbar_search_I.addEventListener("click", NavsearchbaruClick);
    contact_corner_box_i.addEventListener("click", contactBtnclickOpen);
    message_box_remove_btn.addEventListener("click", contactBtnclickClose);
    send_msg_btn.addEventListener("click", messageclickBtn);
    contact_input.addEventListener("keyup", messageKeybindBtn);
    window.addEventListener("scroll", scrollFunc);

    /*===========================sliders=============================*/
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].style.opacity = "0";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      slides[slideIndex - 1].style.display = "block";
      slides[slideIndex - 1].style.opacity = "1";
      setTimeout(showSlides, 5000);
    }

    break;

  case "servicesBD":
    break;
}
