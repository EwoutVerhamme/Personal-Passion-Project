import axios from "axios";

export default {

  state: {
    data: {
      title: "",
      info: "",
      skill_id: "",
      location: "",
      date: "",
      file: "",
    },
 
     skill_name: ""
      
  },
  getters: {
    getAddedSkills: state => state.addedSkills,
    getCurrent: state => state.data,
    getSkillId: state => state.data.skill_id,
    getSkillName: state => state.skill_name
  },
  mutations: {
    setSkill(state, skill, skillId){
        state.skill_name = skill;
        state.data.skill_id = skillId
      },

      setCurrent(state, data){
      state.data = data
      },


      
  },
  actions: {

    SETSKILLS: ({ commit },skill, skillId) => {
        commit('setSkill', skill, skillId)
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