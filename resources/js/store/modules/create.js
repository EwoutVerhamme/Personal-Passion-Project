import axios from "axios";

export default {

  state: {
    data: {
      creator_name:"",
      creator_img:"",
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
    getCurrent: state => state.data,
    getSkillId: state => state.skill_id,
    getSkillName: state => state.skill_name
  },
  mutations: {
    setSkillId(state, skillId){
        state.skill_id = skillId
      },
      setSkillName(state, skillName){
        state.skill_name = skillName
      },

      setCurrent(state, data){
      state.data = data
      },
      
      resetFields(state){
        state.data = {}
        state.skill_name = ""
        },


      
  },
  actions: {

    SETSKILLID: ({ commit },skillId) => {
        commit('setSkillId', skillId)
    },

    SETSKILLNAME: ({ commit },skillName) => {
      commit('setSkillName', skillName)
  },

    SETCURRENT: ({ commit }, data) => {
      commit('setCurrent', data)
  },

  RESETFIELDS: ({ commit }) => {
    commit('resetFields')
},


  SUBMITPOST: ({ commit }, data, image) => {

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