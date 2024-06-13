const JSCarousel = ({
    carouselSelector,
    slideSelector = null,
    enableAutoplay = true,
    autoplayInterval = 5000,
    enablePagination = true
  }) => {
    let currentSlideIndex = 0;
    let prevBtn, nextBtn;
    let autoplayTimer;
    let paginationContainer;
  
    const carousel = document.querySelector(carouselSelector);
  
    if (!carousel) {
      console.error("Specify a valid selector for the carousel.");
      return null;
    }
  
    const slides = carousel.querySelectorAll(slideSelector);
  
    if (!slides.length) {
      console.error("Specify a valid selector for slides.");
      return null;
    }
  
    
    const addElement = (tag, attributes, children) => {
      const element = document.createElement(tag);
  
      if (attributes) {
        Object.entries(attributes).forEach(([key, value]) => {
          element.setAttribute(key, value);
        });
      }
  
      if (children) {
        if (typeof children === "string") {
          element.textContent = children;
        } else {
          children.forEach((child) => {
            if (typeof child === "string") {
              element.appendChild(document.createTextNode(child));
            } else {
              element.appendChild(child);
            }
          });
        }
      }
  
      return element;
    };
  
    
    const tweakStructure = () => {
      carousel.setAttribute("tabindex", "0");
  
      const carouselInner = addElement("div", {
        class: "carousel-inner"
      });
      carousel.insertBefore(carouselInner, slides[0]);
  
      slides.forEach((slide) => {
        carouselInner.appendChild(slide);
      });
  
      prevBtn = addElement(
        "btn",
        {
          class: "carousel-btn carousel-btn--prev-next carousel-btn--prev",
          "aria-label": "Previous Slide"
        },
        "<"
      );
  
      nextBtn = addElement(
        "btn",
        {
          class: "carousel-btn carousel-btn--prev-next carousel-btn--next",
          "aria-label": "Next Slide"
        },
        ">"
      );
  
      carouselInner.appendChild(prevBtn);
      carouselInner.appendChild(nextBtn);
  
      if (enablePagination) {
        paginationContainer = addElement("nav", {
          class: "carousel-pagination",
          role: "tablist"
        });
        carousel.appendChild(paginationContainer);
      }

      slides.forEach((slide, index) => {
        slide.style.transform = `translateX(${index * 100}%)`;
        if (enablePagination) {
          const paginationBtn = addElement(
            "btn",
            {
              class: `carousel-btn caroursel-btn--${index + 1}`,
              role: "tab"
            },
            `${index + 1}`
          );
  
          paginationContainer.appendChild(paginationBtn);
  
          if (index === 0) {
            paginationBtn.classList.add("carousel-btn--active");
            paginationBtn.setAttribute("aria-selected", true);
          }
  
          paginationBtn.addEventListener("click", () => {
            handlePaginationBtnClick(index);
          });
        }
      });
    };
  
    const adjustSlidePosition = () => {
      slides.forEach((slide, i) => {
        slide.style.transform = `translateX(${100 * (i - currentSlideIndex)}%)`;
      });
    };
  
    const updatePaginationBtns = () => {
      const btns = paginationContainer.children;
      const prevActiveBtns = Array.from(btns).filter((btn) =>
        btn.classList.contains("carousel-btn--active")
      );
      const currentActiveBtn = btns[currentSlideIndex];
  
      prevActiveBtns.forEach((btn) => {
        btn.classList.remove("carousel-btn--active");
        btn.removeAttribute("aria-selected");
      });
      if (currentActiveBtn) {
        currentActiveBtn.classList.add("carousel-btn--active");
        currentActiveBtn.setAttribute("aria-selected", true);
      }
    };
  
    const updateCarouselState = () => {
      if (enablePagination) {
        updatePaginationBtns();
      }
      adjustSlidePosition();
    };
  
    const moveSlide = (direction) => {
      const newSlideIndex =
        direction === "next"
          ? (currentSlideIndex + 1) % slides.length
          : (currentSlideIndex - 1 + slides.length) % slides.length;
      currentSlideIndex = newSlideIndex;
      updateCarouselState();
    };
  
    const handlePaginationBtnClick = (index) => {
      currentSlideIndex = index;
      updateCarouselState();
    };
  
    const handlePrevBtnClick = () => moveSlide("prev");
  
    const handleNextBtnClick = () => moveSlide("next");
  
    const handleKeyboardNav = (event) => {
      if (!carousel.contains(event.target)) return;
      if (event.defaultPrevented) return;
  
      switch (event.key) {
        case "ArrowLeft":
          moveSlide("prev");
          break;
        case "ArrowRight":
          moveSlide("next");
          break;
        default:
          return;
      }
  
      event.preventDefault();
    };
  
    const startAutoplay = () => {
      autoplayTimer = setInterval(() => {
        moveSlide("next");
      }, autoplayInterval);
    };
  
    const stopAutoplay = () => clearInterval(autoplayTimer);
  
    const handleMouseEnter = () => stopAutoplay();
  
    const handleMouseLeave = () => startAutoplay();
  
    const attachEventListeners = () => {
      prevBtn.addEventListener("click", handlePrevBtnClick);
      nextBtn.addEventListener("click", handleNextBtnClick);
      carousel.addEventListener("keydown", handleKeyboardNav);
      if (enableAutoplay && autoplayInterval !== null) {
        carousel.addEventListener("mouseenter", handleMouseEnter);
        carousel.addEventListener("mouseleave", handleMouseLeave);
      }
    };
  
    const create = () => {
      tweakStructure();
      attachEventListeners();
      if (enableAutoplay && autoplayInterval !== null) {
        startAutoplay();
      }
    };
  
    const destroy = () => {
      if (enablePagination) {
        prevBtn.removeEventListener("click", handlePrevBtnClick);
        nextBtn.removeEventListener("click", handleNextBtnClick);
        carousel.removeEventListener("keydown", handleKeyboardNav);
      }
  
      if (enableAutoplay && autoplayInterval !== null) {
        carousel.removeEventListener("mouseenter", handleMouseEnter);
        carousel.removeEventListener("mouseleave", handleMouseLeave);
        stopAutoplay();
      }
    };
    return { create, destroy };
  };
  
  const carousel1 = JSCarousel({
    carouselSelector: "#carousel-1",
    slideSelector: ".slide",
    enablePagination: true
  });
  
  carousel1.create();
  
  const carousel2 = JSCarousel({
    carouselSelector: "#carousel-2",
    slideSelector: ".slide",
    enablePagination: false,
    enableAutoplay: false
  });
  
  carousel2.create();
  
  const carousel3 = JSCarousel({
    carouselSelector: "#carousel-3",
    slideSelector: ".slide"
  });
  
  carousel3.create();
  
  window.addEventListener("unload", () => {
    carousel1.destroy();
    carousel2.destroy();
  });