import { createRouter, createWebHistory } from "vue-router";

import ProjectsIndex from "../components/projects/ProjectsIndex";
import ProjectsCreate from "../components/projects/ProjectsCreate";
import ProjectsEdit from "../components/projects/ProjectsEdit";
import Index from "../components/portfolio/Index";
import About from "../components/portfolio/About";
import Resume from "../components/portfolio/Resume";
import Portfolio from "../components/portfolio/Portfolio";
import Contact from "../components/portfolio/Contact";
import Temp from "../components/portfolio/temp";

const routes = [
    {
        path: "/dashboard",
        name: "projects.index",
        component: ProjectsIndex,
    },
    {
        path: "/projects/create",
        name: "projects.create",
        component: ProjectsCreate,
    },
    {
        path: "/projects/:id/edit",
        name: "projects.edit",
        component: ProjectsEdit,
        props: true,
    },
    {
        path: "/",
        name: "portfolio.index",
        component: Index,
    },
    {
        path: "/about",
        name: "about",
        component: About,
    },
    {
        path: "/resume",
        name: "resume",
        component: Resume,
    },
    {
        path: "/portfolio",
        name: "portfolio",
        component: Portfolio,
    },
    {
        path: "/contact",
        name: "contact",
        component: Contact,
    },
];

export default createRouter({
    history: createWebHistory(),
    mode: "history",
    routes,
});
