import Vue from "vue";
import Vuetify from "vuetify";
import VueRouter, { Route } from "vue-router";
import "../scss/style.scss";
import App from "../vue/App.vue";
import Posts from "../vue/pages/Posts.vue";
import { RouteConfig } from "vue-router/types/router";

const routes: RouteConfig[] = [
  { path: "/", component: Posts }
]

Vue.use(Vuetify);
Vue.use(VueRouter);
const app = new Vue({
  el: "#app",
  router: new VueRouter({ routes }),
  render: r => r(App)
});