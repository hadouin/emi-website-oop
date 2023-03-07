const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = sidebar.querySelector(".toggle"),
    searchBtn = sidebar.querySelector(".search-box"),
    modeSwitch = sidebar.querySelector(".toggle-switch"),
    modeText = sidebar.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    console.info("toggling close");
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    console.info("switching theme")

    if( document.documentElement.getAttribute("data-theme") === "light"){
        modeText.innerText = "Light mode";
        document.documentElement.setAttribute("data-theme", "dark");
    }else{
        modeText.innerText = "Dark mode";
        document.documentElement.setAttribute("data-theme", "light");
    }
});