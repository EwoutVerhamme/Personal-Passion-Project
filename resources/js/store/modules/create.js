import axios from "axios";

export default {

  state: {
    data: {
      title: "",
      info: "",
      location: "",
      date: ""
    },
      addedSkills: {},
      
  },
  getters: {
    getAddedSkills: state => state.addedSkills,
    getCurrent: state => state.data,
  },
  mutations: {
    setSkill(state, added){
        state.addedSkills = added;
      },

      setCurrent(state, data){
        state.data = data;
      },

      
  },
  actions: {

    SETSKILLS: ({ commit },added) => {
        commit('setSkill', added)
    },

    SETCURRENT: ({ commit }, data) => {
      commit('setCurrent', data)
  },

  SUBMITPOST: ({ commit }, payload) => {
    console.log(payload )
    return new Promise((resolve, reject) => {
      axios
        .post(`api/ads`, payload)
        .then(({ data, status }) => {
          if (status === 200) {
            console.log(data)
            resolve(payload);
          }
        })
        .catch(error => {
          reject(error);
        });
    });
    
  },

  }
};