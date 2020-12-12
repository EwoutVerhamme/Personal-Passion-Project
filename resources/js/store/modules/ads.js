import axios from "axios";

export default {

  state: {
      personalAds: {},
      adDetail: {}
      
  },
  getters: {
    getPersonalAds: state => state.personalAds,
    getAdDetail: state => state.adDetail,
  },


  mutations: {
    setPersonalAds(state, data){
        state.personalAds = data
      },

      setAdDetail(state, data){
        state.adDetail =  data
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
					const response = await axios.get(`/api/ad/${id}`, {
						headers: {
							Authorization: `Bearer ${token}`,
                        },
                    });
                    const data = response.data[0]
                    commit('setAdDetail', data)
                    
				} catch (error) {
					console.error(error);
				}
    }

  }
};