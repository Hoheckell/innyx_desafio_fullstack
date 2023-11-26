
import Dashboard from "./components/Dashboard.vue"
import LoginForm from "./components/LoginForm.vue"
import Editar from "./components/produto/Editar.vue"
import Novo from "./components/produto/Novo.vue"
import { createWebHistory, createRouter, type RouteRecordRaw } from "vue-router"; 

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    alias: "/home",
    name: "home",
    component: LoginForm,
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: Dashboard
  },
  {
    path: "/editar-produto/:id",
    name: "editar-produto",
    component: Editar,
    props: true
  },
  {
    path: "/novo-produto",
    name: "novo-produto",
    component: Novo
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;