import { createRouter, createWebHistory } from "vue-router";

import CompaniesIndex from "../components/companies/CompaniesIndex";
import CompaniesCreate from "../components/companies/CompaniesCreate";
import CompaniesEdit from "../components/companies/CompaniesEdit";
import Index from "../components/portfolio/Index";
import About from "../components/portfolio/About";
import Resume from "../components/portfolio/Resume";
import Portfolio from "../components/portfolio/Portfolio";
import Contact from "../components/portfolio/Contact";
import Temp from "../components/portfolio/temp";

const routes = [
    {
        path: "/dashboard",
        name: "companies.index",
        component: CompaniesIndex,
    },
    {
        path: "/companies/create",
        name: "companies.create",
        component: CompaniesCreate,
    },
    {
        path: "/companies/:id/edit",
        name: "companies.edit",
        component: CompaniesEdit,
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
    {
        path: "/test",
        name: "test",
        component: Temp,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
