const toggle_icon = document.querySelector('.menu-toggle-btn');
const toggle_content = document.querySelector('.navigation-menu');

toggle_icon.addEventListener('click', function (){
    toggle_icon.classList.toggle("fa-times");

    if (toggle_content.classList.contains('active')) {
        toggle_content.classList.remove("active");
    }else{
        toggle_content.classList.add("active");
    }
});