import axios from "axios";

export default {

  state: {
    status: '',
    token: localStorage.getItem('acces_token') || '',
    user : {},
    isLoggedIn: undefined,

    credentials: {
      email: "",
      password: "",
      password_confirmation: "",
    }
  

  
  },
  getters: {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status,
    registerStatus: state => state.credentials
  },
  mutations: {
    auth_success(state, token, user){
      state.status = 'success'
      state.token = token
      state.user = user
    },
    auth_error(state){
      state.status = 'error'
    },

    auth_logout(state){
      state.status = 'logged out'
      state.token = undefined
      state.user = undefined
    },

    setCredentials(state, credentials){
      state.credentials.email = credentials.email,
      state.credentials.password = credentials.password,
      state.credentials.password_confirmation = credentials.password_confirmation
    },

    setUserInfo(state, info){
    state.register = info
    console.log(state.register)
    },
  },
  actions: {
    
    LOGIN: ({ commit }, payload) => {
      return new Promise((resolve, reject) => {
        axios
          .post(`api/login`, payload)
          .then(({ data, status }) => {
            if (status === 200) {
              const token = data.access_token;
              const user = data.user
              localStorage.setItem('user', JSON.stringify(data));
              localStorage.setItem('token', token);
              commit('auth_success', token, user)
              resolve(payload);
            }
          })
          .catch(error => {
            commit('auth_error', error)
            localStorage.removeItem('user')
            reject(error);
          });
      });
      
    },

    LOGOUT: ({ commit }) => {
      commit('auth_logout')
      localStorage.removeItem('user')
      localStorage.removeItem('name')
      localStorage.removeItem('token')
      console.log(localStorage)
      
    },

    AUTOLOGIN: ({commit}) => {
      const token = localStorage.getItem('token')
      const user = localStorage.getItem('user')
      if (!token) {
        return
      }
      commit('auth_success', token, user)
    },

    SETCREDENTIALS: ({commit}, credentials) => {
      commit('setCredentials', credentials)
    },

    SETUSERINFO: ({commit}, info) => {
      commit('setUserInfo', info)
      
    },

    SETSKILLINFO: ({commit}) => {

    },
    
    

    REGISTER: ({ commit}, userInfo) => {
    //   for (let d of userInfo.entries()) {
    //     console.log(d); 
    //     // Do whatever with d
    // }
      return new Promise((resolve, reject) => {
        axios
          .post(`api/register`, userInfo)
          .then(({ data, status }) => {
            resolve(userInfo);
          })
          .catch(error => {
            reject(error);
          });
      });
      
    },
    
  }
};