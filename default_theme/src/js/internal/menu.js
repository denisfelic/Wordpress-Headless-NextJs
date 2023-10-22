export default class Menu {
  constructor() {
    this.menuOpen = true;
  }

  openMainMenu() {
    const menu = document.getElementById("main-menu");
    const lineOne = document.getElementById("line-1");
    const lineTwo = document.getElementById("line-2");
    const middle = document.getElementById("middle");
    const toggle = document.getElementById("close-container");
    const FilterContainer = document.getElementById("filter-container");
    // const mob = document.getElementById("mobile-menu");
    const closeFilterButton = document.querySelector(
      "#filter-container #secondary > button"
    );

    /** If the filter is active in store page, then close the filter */
    this.handleFilterButtonInStorePage(closeFilterButton);

    if (this.menuOpen) {
      if (
        window.innerWidth < 1024 &&
        document.body.classList === "woocommerce-shop"
      ) {
        FilterContainer.style.transform = "translateX(100%)";
      }
      document.body.style.overflow = "hidden";
      menu.classList.remove("hidden");
      lineOne.style.transform = "rotate(46deg)";
      lineTwo.style.transform = " rotate( -46deg)";
      lineOne.style.width = "75%";
      lineTwo.style.width = "75%";
      lineTwo.style.marginTop = "-20px";
      middle.style.display = "none";
      //  mob.style.padding = "10px 20px 0 20px";
      //  mob.style.overflow = "auto;";
      toggle.style.border = "none";
      //toggle.style.position = "absolute";
      this.menuOpen = false;
    } else {
      document.body.style.overflow = "unset";
      menu.classList.add("hidden");
      lineOne.style.width = "100%";
      lineTwo.style.width = "100%";
      lineOne.style.transform = "unset";
      lineTwo.style.transform = "unset";
      lineTwo.style.marginTop = "unset";
      middle.style.display = "block";
      //   mob.style.padding = "0";
      toggle.style.position = "unset";
      this.menuOpen = true;
    }
  }

  handleFilterButtonInStorePage(closeFilterButton) {
    if (closeFilterButton) {
      closeFilterButton.click();
    }
  }
}
