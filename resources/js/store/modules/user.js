import axios from "axios";


export default {

  state: {
    status: '',
    token: localStorage.getItem('acces_token') || '',
    user : {},
    isLoggedIn: undefined,

    register: {
      email: "",
      password: "",
      password_confirmation: "",
      first_name: "",
      last_name: "",
      profilepic:"",
      birth:"",
      sex: "",
      town: "",
      youth_center: "",

    }
  },
  getters: {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status,
    registerStatus: state => state.register
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
      state.register.email = credentials.email,
      state.register.password = credentials.password,
      state.register.password_confirmation = credentials.password_confirmation
    },
    setUserInfo(state, info){
      state.register.first_name = info.first_name,
      state.register.last_name = info.last_name,
      state.register.birth = info.birth,
      state.register.sex = info.sex,
      state.register.town = info.town,
      state.register.youth_center = info.youth_center
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
    
    

    REGISTER: ({ commit }, payload) => {
      console.log(payload)
      return new Promise((resolve, reject) => {
        axios
          .post(`api/register`, payload)
          .then(({ data, status }) => {
            if (status === 200) {
              resolve(payload);
              console.log
            }
          })
          .catch(error => {
            commit('auth_error', error)
            localStorage.removeItem('user')
            reject(error);
          });
      });
      
    },
    
  }
};