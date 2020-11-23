import { createStore } from 'vuex';
import Vue from "vue";
import User from "./modules/user";


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
    user: User,
  }
})
