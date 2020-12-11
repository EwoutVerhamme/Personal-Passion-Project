import axios from "axios";

export default {

  state: {
      personalAds: {},
      addDetail: []
      
  },
  getters: {
    getPersonalAds: state => state.personalAds,
  },


  mutations: {
    setPersonalAds(state, data){
        state.personalAds = data
      },

      
  },
  actions: {

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
                    const data = response.data
                    console.log(data)
                    commit('setPersonalAds', data)
                    
				} catch (error) {
					console.error(error);
				}
    }

  }
};