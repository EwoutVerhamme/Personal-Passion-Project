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
    auth_request(state){
      state.status = 'loading'
    },
    auth_success(state, token, user){
      state.status = 'success'
      state.token = token
      state.loggedIn = true
      state.user = user
    },
    auth_error(state){
      state.status = 'error'
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
              commit('auth_request')
              localStorage.setItem('user', JSON.stringify(data));
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