//===========================DOM=============================
const navbarCont = document.querySelector(".navbar_container");
const body = document.querySelector("body");
const Page = document.body.id;
const navbar_container_nav = document.querySelector(".navbar_container nav");
const navbar_menu = document.querySelector(".navbar_menu");
const navbar_box1_img = document.querySelector(".navbar_box1 img");
const navbar_search_I = document.querySelector(".navbar_search_box i");
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
const categoryBox = document.querySelectorAll(".category-box");
const categoryInputContainer = document.querySelectorAll(".category-input");
const beneficiaries = document.getElementById("beneficiaries");
const categories = document.getElementById("categories");
const locations = document.getElementById("locations");
const mainContainerEl = document.querySelector(".main-container");
const clearBtn = document.querySelector(".clearBtn");
const news_filter_bottom_header_box = document.querySelector(
    ".news_filter_bottom_header_box"
);
const news_filter_bottom_box_ul = document.querySelector(
    ".news_filter_bottom_box ul"
);


let startIndex = 0;
let endIndex = 30;
//=====================  import data.js  ===========================
import data from "./data.js";

//===========================FUNCTIONS-indexDB=============================
function scrollFunc() {
  navbarCont.classList.toggle("active", scrollY > 80);
  navbar_box1_img.classList.toggle("active", scrollY > 80);
  for (let i = 0; i < navbar_box2ULLI.length; i++) {
    navbar_box2ULLI[i].classList.toggle("active", scrollY > 80);
  }
  // navbar_search_Input.classList.toggle("active", scrollY > 80);
}

function NavsearchbaruClick() {
  if (window.scrollY > 80) {
    navbar_search_Input.classList.toggle("active1");
    if (navbar_search_Input.value.trim() != 0) {
      console.log(navbar_search_Input.value);
      navbar_search_Input.value = "";
    }
  } else if (navbar_search_Input.value.trim() != 0) {
    console.log(navbar_search_Input.value);
    navbar_search_Input.value = "";
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
/*
//online contact btn
function contactBtnclickOpen() {
    if (window.innerWidth <= 400) {
        contact_corner_box.classList.add("activemob");
    } else {
        contact_corner_box.classList.add("active");
    }
    chat_open_btn.classList.add("active");
    contact_corner_content.classList.remove("active");
}

function contactBtnclickClose() {
    if (window.innerWidth <= 400) {
        contact_corner_box.classList.remove("activemob");
        body.style.overflow = "hidden";
    } else {
        contact_corner_box.classList.remove("active");
    }
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
*/
switch (Page) {
  case "indexBD":
    //===========================EVENTLISTENERS=============================
    navbar_menu.addEventListener("click", navbarMenuClick);
    // navbar_search_I.addEventListener("click", NavsearchbaruClick);
    //contact_corner_box_i.addEventListener("click", contactBtnclickOpen);
    //message_box_remove_btn.addEventListener("click", contactBtnclickClose);
    //send_msg_btn.addEventListener("click", messageclickBtn);
    //contact_input.addEventListener("keyup", messageKeybindBtn);
    window.addEventListener("scroll", scrollFunc);

    //===========================sliders=============================
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
    //renderServices();

    //=========================== Variables After rendering =================

    //===========================EVENTLISTENERS=============================
    navbar_menu.addEventListener("click", navbarMenuClick);
    // navbar_search_I.addEventListener("click", NavsearchbaruClick);
    window.addEventListener("scroll", scrollFunc);
    categoryBox[0].addEventListener("click", beneficiariesClick);
    categoryBox[1].addEventListener("click", categoryClicks);
    categoryBox[2].addEventListener("click", locationsClicks);

    mainContainerEl.addEventListener("click", dropDownFunction);

    //clearBtn.addEventListener("click", clearFunction);
    // window.addEventListener("scroll", renderScroll);
    // document.addEventListener("click", (e) => {
    //     if (e.target.dataset.titlecontainer) {
    //         dropDownFunction(e.target.dataset.titlecontainer);
    //     }
    // });
    // contact_corner_box_i.addEventListener("click", contactBtnclickOpen);
    // message_box_remove_btn.addEventListener("click", contactBtnclickClose);
    // send_msg_btn.addEventListener("click", messageclickBtn);
    // contact_input.addEventListener("keyup", messageKeybindBtn);
    // document.addEventListener("DOMContentLoaded", filterFunction);

    break;

  case "contactBD":
    //===========================EVENTLISTENERS=============================
    navbar_menu.addEventListener("click", navbarMenuClick);
    // navbar_search_I.addEventListener("click", NavsearchbaruClick);
    window.addEventListener("scroll", scrollFunc);
    checkboxes.forEach((checkbox) =>
      checkbox.addEventListener("change", handleCheckboxChange)
    );

    // contact_corner_box_i.addEventListener("click", contactBtnclickOpen);
    // message_box_remove_btn.addEventListener("click", contactBtnclickClose);
    // send_msg_btn.addEventListener("click", messageclickBtn);
    // contact_input.addEventListener("keyup", messageKeybindBtn);

    break;

     case "newsDB":
        navbar_menu.addEventListener("click", navbarMenuClick);
        navbar_search_I.addEventListener("click", NavsearchbaruClick);
        window.addEventListener("scroll", scrollFunc);
        window.addEventListener("resize", handleResize);
        function toggleFilter() {
            news_filter_bottom_header_box.classList.toggle("active");
            news_filter_bottom_box_ul.classList.toggle("active");
        }

        function addClickListener() {
            news_filter_bottom_header_box.addEventListener(
                "click",
                toggleFilter
            );
        }

        function removeClickListener() {
            news_filter_bottom_header_box.removeEventListener(
                "click",
                toggleFilter
            );
        }

        var windowWidth = window.innerWidth;

        function handleResize() {
            var newWindowWidth = window.innerWidth;

            if (newWindowWidth <= 1200 && windowWidth > 1200) {
                addClickListener();
                news_filter_bottom_header_box.classList.add("active");
                news_filter_bottom_box_ul.classList.add("active");
            } else if (newWindowWidth > 1200 && windowWidth <= 1200) {
                removeClickListener();
                news_filter_bottom_box_ul.classList.remove("active");
            }

            windowWidth = newWindowWidth;
        }

        break;
}

//============================Functions for "servicesBD" ======

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
    categoriesContainer.classList.remove("overflowScrollBar");
  } else {
    categoriesContainer.classList.add("overflowScrollBar");
  }
}

function dropDownFunction(e) {
  if (
    e.target.classList.contains("title") ||
    e.target.classList.contains("plus-icon") ||
    e.target.classList.contains("main-info") ||
    e.target.classList.contains("more-info") ||
    e.target.classList.contains("title-text") ||
    e.target.classList.contains("span") ||
    e.target.classList.contains("small-section")
  ) {
    const dataValue = e.target.dataset.titlecontainer;
    document.getElementById(`${dataValue}`).classList.toggle("display");
    document
      .getElementById(`icon-${dataValue}`)
      .classList.toggle("rotatePlusIcon");
  }
}

function feedServiceTabs() {
  let maxIndex = startIndex + (endIndex - startIndex);
  if (data.length < maxIndex) {
    maxIndex = data.length;
  }
  for (let i = startIndex; i < maxIndex; i++) {
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
/*=========== COMMENTED FUNCTIONS============================ */
// function renderServices() {
//     feedServiceTabs();
// }

// function renderScroll() {
//     let innerContainerHeight = 0;
//     let innerContainerEl = document.querySelectorAll(".container-info");
//     for (let i = 0; i < innerContainerEl.length; i++) {
//         innerContainerHeight += innerContainerEl[i].offsetHeight;
//     }
//     const scrollPosition = window.scrollY || window.pageYOffset;
//     const scrollThreshold = innerContainerHeight - window.innerHeight - 100;
//     console.log(innerContainerHeight);
//     if (scrollPosition > scrollThreshold) {
//         renderServices();
//     }
// }

// function filterFunction() {
//     const checkboxes = document.querySelectorAll(
//         '#categories input[type="checkbox"]'
//     );
//     console.log(checkboxes);
//     checkboxes.forEach(function (checkbox) {
//         checkbox.addEventListener("change", function () {
//             const selectedCategories = getSelectedCategories();
//             filterInformation(selectedCategories);
//         });
//     });

//     function getSelectedCategories() {
//         const selectedCategories = [];
//         checkboxes.forEach(function (checkbox) {
//             if (checkbox.checked) {
//                 selectedCategories.push(checkbox.value);
//             }
//         });
//         return selectedCategories;
//     }

//     function filterInformation(categories) {
//         console.log(categories);
//         let findObjects = [];
//         let filterObjects;
//         findObjects = data.filter((obj) => {
//             for (let i = 0; i < categories.length; i++) {
//                 console.log(categories[i]);
//                 // console.log(obj.categories);
//                 return categories[i] === obj.categories;
//             }
//         });

//         console.log(findObjects);
//     }
// }
//===============Functions for "newsDB" ==================




//===============Functions for "contactBD" ==================
