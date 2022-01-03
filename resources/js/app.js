require("./bootstrap");

require("alpinejs");

import { createApp } from "vue";
import router from "./router";
import CompaniesIndex from "./components/companies/CompaniesIndex";
import Navbar from "./components/portfolio/Navbar";
import BootstrapVue from "bootstrap-vue";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

createApp({
    components: { Navbar, CompaniesIndex },
})
    // .use(BootstrapVue)
    .use(router)
    .mount("#app");
