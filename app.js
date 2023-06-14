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
const categoryBox = document.querySelectorAll(".category-box");
const categoryInputContainer = document.querySelectorAll(".category-input");
const beneficiaries = document.getElementById("beneficiaries");
const categories = document.getElementById("categories");
const locations = document.getElementById("locations");
const mainContainerEl = document.querySelector(".main-container");

let startIndex = 0;
let endIndex = 30;
/*=====================  import data.js  ===========================*/
import data from "./data.js";

/*===========================FUNCTIONS-indexDB=============================*/
function scrollFunc() {
  navbarCont.classList.toggle("active", scrollY > 80);
  navbar_box1_img.classList.toggle("active", scrollY > 80);
  for (let i = 0; i < navbar_box2ULLI.length; i++) {
    navbar_box2ULLI[i].classList.toggle("active", scrollY > 80);
  }
  navbar_search_Input.classList.toggle("active", scrollY > 80);
  mainContainerEl.classList.toggle("active", scrollY > 80);
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
    renderServices();

    /*=========================== Variables After rendering =================*/

    /*===========================EVENTLISTENERS=============================*/
    navbar_menu.addEventListener("click", navbarMenuClick);
    navbar_search_I.addEventListener("click", NavsearchbaruClick);
    window.addEventListener("scroll", scrollFunc);
    categoryBox[0].addEventListener("click", beneficiariesClick);
    categoryBox[1].addEventListener("click", categoryClicks);
    categoryBox[2].addEventListener("click", locationsClicks);
    window.addEventListener("scroll", renderScroll);
    document.addEventListener("click", (e) => {
      if (e.target.dataset.titlecontainer) {
        dropDownFunction(e.target.dataset.titlecontainer);
      }
    });
    document.addEventListener("DOMContentLoaded", filterFunction);
    break;
}

/*============================Functions for "servicesBD" ======*/

function beneficiariesClick() {
  beneficiaries.classList.toggle("display");
  document.querySelector(".benef").classList.toggle("rotate");
  containerHeight(beneficiaries);
}
function categoryClicks() {
  categories.classList.toggle("display");
  document.querySelector(".category").classList.toggle("rotate");
  containerHeight(categories);
}
function locationsClicks() {
  locations.classList.toggle("display");
  document.querySelector(".locations").classList.toggle("rotate");
  containerHeight(locations);
}

function containerHeight(categoriesContainer) {
  let containerHeight = 0;
  for (let i = 0; i < categoryInputContainer.length; i++) {
    containerHeight += categoryInputContainer[i].offsetHeight;
  }
  if (containerHeight > 300) {
    console.log(containerHeight);
    categoriesContainer.classList.remove("overflowScrollBar");
  } else {
    console.log(containerHeight);
    categoriesContainer.classList.add("overflowScrollBar");
  }
}

function dropDownFunction(titleId) {
  const titleObj = data.filter(function (title) {
    return title.id == titleId;
  })[0];
  console.log(titleObj);
  document.getElementById(`${titleId}`).classList.toggle("display");
  document.getElementById(`icon-${titleId}`).classList.toggle("rotatePlusIcon");
}

function feedServiceTabs() {
  let maxIndex = startIndex + (endIndex - startIndex);
  if (data.length < maxIndex) {
    maxIndex = data.length;
  }
  for (let i = startIndex; i < maxIndex; i++) {
    console.log("MaxIndex", maxIndex);
    if (data.length >= maxIndex) {
      let dataInfo = data[i];
      let containerInfoDiv = document.createElement("div");
      containerInfoDiv.classList.add("container-info");
      containerInfoDiv.innerHTML = `<div class="title" data-titlecontainer="${dataInfo.id}">
                                            <div class="main-info" data-titlecontainer="${dataInfo.id}">
                                            <span data-titlecontainer="${dataInfo.id}">${dataInfo.title}</span>
                                            <span class="more-info" data-titlecontainer="${dataInfo.id}"><div data-titlecontainer="${dataInfo.id}"><span class="span" data-titlecontainer="${dataInfo.id}">კატეგორია:</span> ${dataInfo.categories}</div><div data-titlecontainer="${dataInfo.id}"> <span class="span" data-titlecontainer="${dataInfo.id}">ლოკაცია:</span> ${dataInfo.location}</span></div>
                                            </div>
                                            <i class="fa-solid fa-circle-plus plus-icon " id="icon-${dataInfo.id}" data-titlecontainer="${dataInfo.id}"></i>
                                          </div>
                                          <div class="description" id="${dataInfo.id}" data-titlecontainer="${dataInfo.id}">
                                            <p>
                                              ${dataInfo.description}
                                            </p>
                                            <br />
                                            <a
                                              class="seeMorelink"
                                              target="_blank"
                                              href="${dataInfo.link}"
                                              alt="დეტალურად ნახვა"
                                              >დეტალურად</a>
                                         </div>`;
      document.querySelector(".render-here").append(containerInfoDiv);
    }
  }
  startIndex = endIndex;
  endIndex += endIndex + 30;
}

function renderServices() {
  feedServiceTabs();
}

function renderScroll() {
  let innerContainerHeight = 0;
  let innerContainerEl = document.querySelectorAll(".container-info");
  for (let i = 0; i < innerContainerEl.length; i++) {
    innerContainerHeight += innerContainerEl[i].offsetHeight;
  }
  const scrollPosition = window.scrollY || window.pageYOffset;
  const scrollThreshold = innerContainerHeight - window.innerHeight - 100;
  console.log(innerContainerHeight);
  if (scrollPosition > scrollThreshold) {
    renderServices();
  }
}

function filterFunction() {
  const checkboxes = document.querySelectorAll(
    '#categories input[type="checkbox"]'
  );
  console.log(checkboxes);
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      const selectedCategories = getSelectedCategories();
      filterInformation(selectedCategories);
    });
  });

  function getSelectedCategories() {
    const selectedCategories = [];
    checkboxes.forEach(function (checkbox) {
      if (checkbox.checked) {
        selectedCategories.push(checkbox.value);
      }
    });
    return selectedCategories;
  }

  function filterInformation(categories) {
    console.log(categories);
    let findObjects = [];
    let filterObjects;
    findObjects = data.filter((obj) => {
      for (let i = 0; i < categories.length; i++) {
        console.log(categories[i]);
        // console.log(obj.categories);
        return categories[i] === obj.categories;
      }
    });

    console.log(findObjects);
  }
}
