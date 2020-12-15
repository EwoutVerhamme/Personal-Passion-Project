import axios from "axios";

export default {

  state: {
      youthCenter: {}
   
  },
  getters: {
    getYouthCenter: state => state.youthCenter,
  },
  mutations: {
    setYouthCenterProfile(state, data){
        state.youthCenter = data
      },
  },
  actions: {

    // Get all the youth_center and fetch them
    GETYOUTHCENTER: async function ({ commit }, route) {
        const url = `http://api.kollapp.test/api${route}`;
        try {
            const response = await fetch(url);
            const data = await response.json();
            commit('setYouthCenterProfile', data[0])

        } catch (error) {
            console.log(error);
        }
    },
  }
};