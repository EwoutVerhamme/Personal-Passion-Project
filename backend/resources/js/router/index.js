import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Dashboard/Home.vue';
import CreatePost from "../views/Dashboard/CreatePost.vue";
import Profile from "../views/Dashboard/Profile.vue";
import Search from "../views/Dashboard/Search.vue";
import Register from "../views/Auth/Register/Register.vue";
import Login from "../views/Auth/Login/Login.vue";
import NotFound from "../components/NotFound.vue";
import ProfileInfo from "../views/Auth/Register/ProfileInfo.vue";
import AddSkills from "../components/AddSkills.vue";



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
  path: '/profile-info',
  name: 'ProfileInfo',
  component: ProfileInfo,
},
{
  path: '/login',
  name: 'Login',
  component: Login,
},
{
  path: '/addskills',
  name: 'AddSkills',
  component: AddSkills,
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
