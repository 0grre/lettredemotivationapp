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
