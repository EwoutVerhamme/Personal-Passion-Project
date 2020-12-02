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

      skill_id: "",
     skill_name: "",
      
  },
  getters: {
    getAddedSkills: state => state.addedSkills,
    getCurrent: state => state.data,
    getSkillId: state => state.skill_id,
    getSkillName: state => state.skill_name
  },
  mutations: {
    setSkill(state, skillId, selectedSkillName){
        state.skill_id = skillId
        state.skill_name = selectedSkillName;
      },

      setCurrent(state, data){
      state.data = data
      },


      
  },
  actions: {

    SETSKILLS: ({ commit },skillId) => {

        commit('setSkill', skillId)
    },

    SETCURRENT: ({ commit }, data) => {
      commit('setCurrent', data)
  },


  SUBMITPOST: ({ commit }, data, image) => {
    console.log(data, image)
    return new Promise((resolve, reject) => {
      axios
        .post(`api/ads`, data, image)
        .then(({ data, status }) => {
          if (status === 200) {
            console.log(data);
            resolve(status);
          }
        })
        .catch((error) => {
          reject(error);
        });
    });
    
  },

  }
};