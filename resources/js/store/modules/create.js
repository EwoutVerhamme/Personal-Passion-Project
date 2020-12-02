import axios from "axios";

export default {

  state: {
    data: {
      title: "",
      info: "",
      location: "",
      date: "",
      file: "",
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

  SUBMITPOST: ({ commit }, title, info,location, date,image) => {
    console.log(title, info,location, date,image)
    return new Promise((resolve, reject) => {
      axios
        .post(`api/ads`,{
          title, info,location, date,image
        })
        .then(({ data, status }) => {
          if (status === 200) {
            console.log(data)
            resolve(status);
          }
        })
        .catch(error => {
          reject(error);
        });
    });
    
  },

  }
};