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
  }

  }
};