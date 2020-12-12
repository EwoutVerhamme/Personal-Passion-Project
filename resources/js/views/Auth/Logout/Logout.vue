<template>
	<Button @click.prevent="logout" btnText="Uitloggen" />
</template>

<script>
	import Button from "../../../components/Buttons/Button";
	import router from "../../../router/index";
	import store from "../../../store/index";
	export default {
		name: "Logout",
		components: {
			Button,
		},

		methods: {
			logout() {
				this.$store
					.dispatch("LOGOUT")
					.then((success) => {
						this.$router.push("/login");
					})
					.catch((error) => {
						this.error = true;
					});
			},
		},
	};
</script>


<style scoped>
</style>