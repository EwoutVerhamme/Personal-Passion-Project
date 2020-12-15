import axios from "axios";

export default {

  state: {
      personalAds: [],
      personalAdsAlternative: [],
      adDetail: {},
      adUserId: ""
      
  },
  getters: {
    getPersonalAds: state => state.personalAds,
    getPersonalAdsAlternative: state => state.personalAdsAlternative,
    getAdDetail: state => state.adDetail,
    getAdUserId: state => state.adUserId,
  },


  mutations: {
    setPersonalAds(state, data){
        state.personalAds = data
      },

      setPersonalAdsAlternative(state, data){
        state.personalAdsAlternative = data
      },

      setAdDetail(state, data){
        state.adDetail =  data
      },

      setadUserId(state, adUserId){
        state.adUserId =  adUserId
      },

      
  },
  actions: {

    // Get the personal ads for the loggin-in user.
    GETPERSONALADS: async function ({ commit } ) {
    const token = localStorage.getItem("token");
				try {
					const response = await axios.get("/api/matches", {
						headers: {
							Authorization: `Bearer ${token}`,
                        },
                    });
                    const data = response.data
 
                    commit('setPersonalAds', data)
                    
				} catch (error) {
					console.error(error);
        }

    },

    GETALTERNATIVE: async function ({ commit } ) {
      const token = localStorage.getItem("token");
          try {
            const response = await axios.get("/api/matches/alternative", {
              headers: {
                Authorization: `Bearer ${token}`,
                          },
                      });
                      const data = response.data
   
                      commit('setPersonalAdsAlternative', data)
                      
          } catch (error) {
            console.error(error);
          }
  
      },

    GETADDETAIL: async function ({ commit }, id ) {
    const token = localStorage.getItem("token");
				try {
					const response = await axios.get(`/api/engagement/${id}`, {
						headers: {
							Authorization: `Bearer ${token}`,
                        },
                    });
                    const data = response.data[0]
                    const adUserId = data.id
                    commit('setAdDetail', data)
                    commit('setadUserId', adUserId)
                    
				} catch (error) {
					console.error(error);
				}
    },
    DELETEAD: ({commit}, id )=> {
      const token = localStorage.getItem("token");
      return new Promise((resolve, reject) => {
        axios
          .delete(`/api/engagement/delete/${id}`, {
						headers: {
							Authorization: `Bearer ${token}`,
						},
					})
          .then(({ data, status }) => {
            if(status === 200) {
              resolve(data);
            }
           
          })
          .catch(error => {
            reject(error);
          });
      });
    },
  }
};