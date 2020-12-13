import axios from "axios";

export default {

  state: {
      personalAds: {},
      adDetail: {},
      adUserId: ""
      
  },
  getters: {
    getPersonalAds: state => state.personalAds,
    getAdDetail: state => state.adDetail,
    getAdUserId: state => state.adUserId,
  },


  mutations: {
    setPersonalAds(state, data){
        state.personalAds = data
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

    DELETEAD: async function ( id ) {
      const token = localStorage.getItem("token");
          try {
            const response = await axios.delete(`/api/engagement/${id}`, {
              headers: {
                Authorization: `Bearer ${token}`,
                          },
                      });

                      
          } catch (error) {
            console.error(error);
          }
      }
  

  }
};