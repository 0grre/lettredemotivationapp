import './bootstrap';
import './theme'
import './favicon'
import 'flowbite';
import {createApp} from "vue";
import AppellationList from "./components/AppellationList.vue";

const app = createApp({})

app.component('appellation-list', AppellationList)
app.mount('#app')
