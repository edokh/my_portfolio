require("./bootstrap");

require("alpinejs");

import { createApp } from "vue";
import router from "./router";
import ProjectsIndex from "./components/projects/ProjectsIndex";
import Navbar from "./components/portfolio/Navbar";
import BootstrapVue from "bootstrap-vue";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import vClickOutside from "click-outside-vue3";

createApp({
    components: { Navbar, ProjectsIndex },
})
    // .use(BootstrapVue)
    .use(router)
    .use(vClickOutside)
    .mount("#app");
