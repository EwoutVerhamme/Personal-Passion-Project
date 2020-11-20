import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Dashboard/Home.vue';
import CreatePost from "../views/Dashboard/CreatePost.vue";
import Profile from "../views/Dashboard/Profile.vue";
import Search from "../views/Dashboard/Search.vue";
import Calendar from "../views/Dashboard/Calendar.vue"
import Register from "../views/Register/Register.vue";
import Login from "../views/Login/Login.vue"



const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: { title: 'Welkom Ewout!' }
  },
{
path: '/create',
name: 'CreatePost',
component: CreatePost,
meta: { title: 'Maak een zoekertje' }
},
{
path: '/profile',
name: 'Profile',
component: Profile,
meta: { title: 'Profiel' }
},
{
path: '/search',
name: 'Search',
component: Search,
},
{
path: '/calendar',
name: 'Calendar',
component: Calendar,
},
{
  path: '/register',
  name: 'Register',
  component: Register,
},
{
  path: '/login',
  name: 'Login',
  component: Login,
},
  

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
