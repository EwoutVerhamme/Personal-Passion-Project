import axios from "axios";

export default {

  state: {
   
  },
  getters: {
    
  },
  mutations: {
    
  },
  actions: {
    SEARCH: async function () {
        try {
            const response = await axios.get(`/api/${this.slug}/${this.search}`);
            if (response.data.length == 0) {
                this.error = true;
            } else {
                this.matches = response.data;
                this.error = false;
            }
        } catch (error) {
            console.error(error);
        }
    },
  }
};