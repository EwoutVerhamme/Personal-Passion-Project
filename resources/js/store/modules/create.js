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

    date: {
      day:"",
      month:"",
      year:""
    },

    skill_id: "",
    skill_name: "",
      
  },
  getters: {
    getCurrent: state => state.data,
    getCurrentDate: state => state.date,
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

      setCurrent(state, {data, date}){
      state.data = data,
      state.date = date
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

    SETCURRENT: ({ commit }, data ,date) => {
      commit('setCurrent', data, date)
  },

  RESETFIELDS: ({ commit }) => {
    commit('resetFields')
},


  SUBMITPOST: ({ commit }, data, image) => {

    return new Promise((resolve, reject) => {
      axios
        .post(`api/engagements`, data, image)
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