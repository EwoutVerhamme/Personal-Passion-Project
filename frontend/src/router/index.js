import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue';
import Matches from "../views/Matches.vue"
import CreatePost from "../views/CreatePost.vue"
import Profile from "../views/Profile.vue"

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
  path: '/Matches',
  name: 'Matches',
  component: Matches
},
{
path: '/CreatePost',
name: 'CreatePost',
component: CreatePost
},
{
path: '/Profile',
name: 'Profile',
component: Profile
},
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
