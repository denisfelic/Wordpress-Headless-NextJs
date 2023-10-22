export default class Sidebar {

    constructor() {
        this.menuOpen = true;
    }

    openSidebar() {
        const Container = document.getElementById('sidebar')
        if(this.menuOpen) {
            Container.classList.add('active');
            Container.style.transform = "translateX(0px)"
            this.menuOpen = false;
            document.body.classList.add('overflow-hidden')
        }else {
            Container.classList.remove('active');
            Container.style.transform = "translateX(-100%)"
            this.menuOpen = true;
            document.body.classList.remove('overflow-hidden')
        }
    }

}