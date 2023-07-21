import './bootstrap';
import './theme'
// import './favicon'
import 'flowbite';
import {createApp} from "vue";
import AppellationList from "./components/AppellationList.vue";

const app = createApp({})

app.component('appellation-list', AppellationList)
app.mount('#app')

const loading = () => {
    const spinner = document.getElementById('spinner');
    spinner.classList.remove('hidden')
    spinner.classList.add('flex')
}

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);
