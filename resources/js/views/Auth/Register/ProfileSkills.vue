<template>
	<h1>RegisterField</h1>
</template>

<script>
	import router from "../../../router/index";
	import store from "../../../store/index";
	import InputField from "../../../components/InputField";
	export default {
		name: "ProfileSkills",
		components: {
			InputField,
		},

		data() {
			return {
				error: false,
			};
		},

		created() {
			this.registerStatus;
		},

		computed: {
			registerStatus: function () {
				console.log(this.$store.getters.registerStatus);
			},
		},
	};
</script>


<style scoped>
</style>