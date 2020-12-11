import { createStore } from 'vuex';
import user from "./modules/user";
import create from './modules/create';
import ads from './modules/ads';
import youthCenter from "./modules/youthCenter"


export default createStore({

  state: {

  },

  // Mutations are functions that effect the STATE.
  mutations: {

  },

  // Actions are function that you call troughout your application that calls mutation.
  actions: {

  },

  modules: {
    user: user,
    create: create,
    ads: ads,
    youthCenter: youthCenter
  }
})
