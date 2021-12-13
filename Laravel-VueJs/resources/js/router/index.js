
import { createWebHistory, createRouter } from "vue-router";
import Register from "SrcComponent/views/Register.vue";
import Login from "SrcComponent/views/Login.vue";
import Home from "SrcComponent/views/Home.vue";
import EditUser from "SrcComponent/views/EditUser.vue";
import Design from "SrcComponent/views/Pages/Design/Design.vue";
import CarsHome from "SrcComponent/views/Cars/CarsHome.vue";
import Innovation from "SrcComponent/views/Pages/Innovation/Innovation.vue";

import Events from "SrcComponent/views/Pages/Events/Events.vue";
import MuseumsHistory from "../views/Pages/Museums_History/Museums_History.vue"
import Company from "../views/Pages/Company/Company.vue"
import AdminFooter from '../components/Admin/Layouts/Footer/ListFooter.vue'
import AdminFooterAdd from '../components/Admin/Layouts/Footer/AddFooter.vue'
import AdminFooterUpdate from '../components/Admin/Layouts/Footer/UpdateFooter.vue'
//Admin
// import Innovation from "SrcComponent/components/Admin/Layouts/Innovation.vue";
import Header from "SrcComponent/components/Admin/Layouts/Header/Header.vue";
import AddHeader from "SrcComponent/components/Admin/Layouts/Header/AddHeader.vue";
import UpdateHeader from "SrcComponent/components/Admin/Layouts/Header/UpdateHeader.vue";
import AdminSlides from "../components/Admin/Layouts/Slides/ListSlides.vue"

import AdminSlidesAdd from '../components/Admin/Layouts/Slides/AddSlides.vue'

import AdminSlidesUpdate from '../components/Admin/Layouts/Slides/UpdateSlides.vue'
// import MuseumsHistory from "../views/Pages/Museums_History/Museums_History.vue";
// import Company from "../views/Pages/Company/Company.vue";
//Admin
// import Innovation_admin from "SrcComponent/components/Admin/Layouts/Innovation/Innovation_admin.vue";
// import Addpost from "SrcComponent/components/Admin/Layouts/Innovation/Addpost.vue";
const routes = [
    {
        /* Tạo routes trong vuejs */
        name: "regsiter",
        path: "/register",
        component: Register,
    },
    {
        //tạo router /login
        name: "login",
        path: "/login",
        component: Login,
    },
    {
        name : "home",
        path : "/home",
        component : Home
    },
     {
        name : "edit",
        path : "/edit/:id",
        component : EditUser
    },
    {
        name : "home-page",
        path : "/cars-home",
        component : CarsHome
    },
     {
        name : "innovation",
        path : "/innovation",
        component : Innovation,
    },
     {
        name : "company",
        path : "/company",
        component : Company
    },
    {
        name : "design",
        path : "/design",
        component : Design,
    },
    {
        name : "museums-history",
        path : "/museums-history",
        component : MuseumsHistory,
    },
    {
        name : "events",
        path : "/events",
        component : Events
    },
    {
        name : "lifestyle",
        path : "/lifestyle",
        // component : Innovation
    },

    //Admin router (Nếu f12 mà nó thông báo already component thì khỏi import đường dẫn nhé)
      {
        name : "admin-innovation",
        path : "/admin/innovation",
        component : Innovation
    },

    {
        name : "admin-header",
        path : "/admin/header",
        component : Header,
    },

    {
        name : "admin-addheader",
        path : "/admin-addheaderr",
        component : AddHeader,
    },
    {
        name : "admin-updateheader",
        path : "/admin-updateheader/:id",
        component : UpdateHeader,
        name: "admin-footer",
        path: "/admin/footer",
        component : AdminFooter,
    },
    {
        name : "admin-footer-add",
        path : "/footer/add-footer",
        component : AdminFooterAdd
    },
    {
        name : "admin-footer-update",
        path : "/update-footer/:id",
        component : AdminFooterUpdate
    },
    // Admin Slides
    {
        name : "admin-slides",
        path : "/admin/slides",
        component : AdminSlides
    },
    {
        name : "admin-slides-add",
        path : "/slides/add-slides",
        component : AdminSlidesAdd
    },
    {
        name : "admin-slides-update",
        path : "/update-slides/:id",
        component : AdminSlidesUpdate
    },
    {
        name: "admin-innovation",
        path: "/admin/innovation",
        component: Innovation,
    },
    // {
    //     name: "admin-addpost",
    //     path: "/admin/add-post",
    //     component: Addpost,
    // },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: 'active',
});

export default router;
