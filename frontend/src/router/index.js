import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue';
import CreatePost from "../views/CreatePost.vue";
import Profile from "../views/Profile.vue";
import Search from "../views/Search.vue"
import Calendar from "../views/Calendar.vue"

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
  

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
