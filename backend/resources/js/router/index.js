import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Dashboard/Home.vue';
import CreatePost from "../views/Dashboard/CreatePost.vue";
import Profile from "../views/Dashboard/Profile.vue";
import Search from "../views/Dashboard/Search.vue";
import Register from "../views/Register/Register.vue";
import Login from "../views/Login/Login.vue";
import NotFound from "../components/NotFound.vue";



const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,

  },
{
path: '/create',
name: 'CreatePost',
component: CreatePost,

},
{
path: '/profile',
name: 'Profile',
component: Profile,

},
{
path: '/search',
name: 'Search',
component: Search,
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
{
  path: '/:pathMatch(.*)*',
  name: 'NotFound',
  component: NotFound,
},
  

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
