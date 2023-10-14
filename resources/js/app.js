import { createApp } from 'vue';
import 'primevue/resources/themes/bootstrap4-light-blue/theme.css';
import PrimeVue from 'primevue/config';
import Button from "primevue/button";
import InputText from 'primevue/inputtext';
import App from './App.vue';

const app = createApp(App);
app.use(PrimeVue);
app.component('Button', Button);
app.component('InputText', InputText);
app.mount("#app");
