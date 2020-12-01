export default {

  state: {
      addedSkills: {}
  },
  getters: {
    getAddedSkills: state => state.addedSkills,
  },
  mutations: {
    setSkill(state, added){
        state.addedSkills = added;
      },
  },
  actions: {

    SETSKILLS: ({ commit },added) => {
        commit('setSkill', added)
    }

  }
};