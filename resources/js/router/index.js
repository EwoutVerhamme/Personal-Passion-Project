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
import EditProfile from "../components/EditProfile.vue";
import OtherProfile from "../components/OtherProfile.vue";
import Succes from "../components/Succes.vue";
import ProfileSkills from "../views/Auth/Register/ProfileSkills.vue";
import ProfileInterests from "../views/Auth/Register/ProfileInterests.vue";
import store from "../store/index";

const ifNotAuthenticated = (to, from, next) => {
  if (!store.getters.isLoggedIn) {
    next()
    return
  }
  next('/')
}

const ifAuthenticated = (to, from, next) => {
  if (store.getters.isLoggedIn) {
    next()
    return
  }
  next('/login')
}



const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    beforeEnter: ifAuthenticated,

  },
{
path: '/create',
name: 'CreatePost',
component: CreatePost,
beforeEnter: ifAuthenticated,

},
{
path: '/profile',
name: 'Profile',
component: Profile,
beforeEnter: ifAuthenticated,


},
{
path: '/search',
name: 'Search',
component: Search,
beforeEnter: ifAuthenticated,

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
  path: '/profile-info',
  name: 'ProfileInfo',
  component: ProfileInfo,
},
{
  path: '/profile-interests',
  name: 'ProfileInterests',
  component: ProfileInterests,
},
{
  path: '/profile-skills',
  name: 'ProfileSkills',
  component: ProfileSkills,
},
{
  path: '/addskills',
  name: 'AddSkills',
  component: AddSkills,
  beforeEnter: ifAuthenticated,

},
{
  path: '/editprofile',
  name: 'EditProfile',
  component: EditProfile,
  beforeEnter: ifAuthenticated,

},
{
  path: '/user/:id',
  name: 'OtherProfile',
  component: OtherProfile,
  beforeEnter: ifAuthenticated,

},

{
  path: '/succes',
  name: 'Succes',
  component: Succes,
  beforeEnter: ifAuthenticated,

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
