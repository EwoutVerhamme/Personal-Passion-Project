import axios from "axios";


export default {

  state: {
    status: '',
    token: localStorage.getItem('acces_token') || '',
    user : {},
    isLoggedIn: undefined
  },
  getters: {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status,
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

    LOGOUT: ({ commit }, payload) => {
      commit('auth_logout')
      localStorage.removeItem('user')
      localStorage.removeItem('name')
      localStorage.removeItem('token')
      console.log(localStorage)
      
    },

    AUTOLOGIN ({commit}) {
      const token = localStorage.getItem('token')
      const user = localStorage.getItem('user')
      if (!token) {
        return
      }
      commit('auth_success', token, user)
    }
    // REGISTER: ({ commit }, { username, email, password }) => {
    //   return new Promise((resolve, reject) => {
    //     axios
    //       .post(`register`, {
    //         username,
    //         email,
    //         password
    //       })
    //       .then(({ data, status }) => {
    //         if (status === 201) {
    //           resolve(true);
    //         }
    //       })
    //       .catch(error => {
    //         reject(error);
    //       });
    //   });
    // },
    // REFRESH_TOKEN: () => {
    //   return new Promise((resolve, reject) => {
    //     axios
    //       .post(`token/refresh`)
    //       .then(response => {
    //         resolve(response);
    //       })
    //       .catch(error => {
    //         reject(error);
    //       });
    //   });
    // }
  }
};