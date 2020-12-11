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
import ProfileDetail from "../components/Detail/ProfileDetail.vue";
import Succes from "../components/Succes.vue";
import ProfileSkills from "../views/Auth/Register/ProfileSkills.vue";
import RegisterSkills from "../views/Auth/Register/RegisterSkills.vue";
import EngagementDetail from "../components/Detail/EngagementDetail.vue";
import YouthCenterDetail from "../components/Detail/YouthCenterDetail.vue";
import store from "../store/index";


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
  path: '/profile-skills',
  name: 'ProfileSkills',
  component: ProfileSkills,
},
{
  path: '/addskills',
  name: 'AddSkills',
  component: AddSkills,

},
{
  path: '/register-skills',
  name: 'RegisterSkills',
  component: RegisterSkills,

},
{
  path: '/editprofile',
  name: 'EditProfile',
  component: EditProfile,
  beforeEnter: ifAuthenticated,

},
{
  path: '/user/:id',
  name: 'ProfileDetail',
  component: ProfileDetail,
  beforeEnter: ifAuthenticated,

},

{
  path: '/engagement/:id',
  name: 'EngagementDetail',
  component: EngagementDetail,
  beforeEnter: ifAuthenticated,
  props: true,

},

{
  path: '/youth_center/:id',
  name: 'YouthCenterDetail',
  component: YouthCenterDetail,
  beforeEnter: ifAuthenticated,
  props: true,

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
