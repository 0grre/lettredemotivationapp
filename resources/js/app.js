import 'flowbite';
import './bootstrap';
import './theme'
import {createApp} from "vue";
import AppellationList from "./components/AppellationList.vue";

const app = createApp({})

app.component('appellation-list', AppellationList)
app.mount('#app')

function reveal() {
    let reveals = document.querySelectorAll(".reveal");

    for (let i = 0; i < reveals.length; i++) {
        let windowHeight = window.innerHeight;
        let elementTop = reveals[i].getBoundingClientRect().top;
        let elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);
