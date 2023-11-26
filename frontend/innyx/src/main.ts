import "./assets/main.css";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import Notifications from "@kyvg/vue3-notification";
import router from "./router";
import { createApp } from "vue"; 
import App from "./App.vue";
import VueAwesomePaginate from "vue-awesome-paginate";
import "vue-awesome-paginate/dist/style.css";
import { VueSpinnersPlugin } from 'vue3-spinners';

createApp(App).use(router).use(VueAwesomePaginate).use(Notifications).use(VueSpinnersPlugin).mount("#app");
