<template>
	<div class="container">
		<router-view />
	</div>
	<NavBar v-if="isLoggedIn" class="navigation" />
</template>

<script>
	import NavBar from "../components/NavBar";
	export default {
		name: "App",
		components: {
			NavBar,
		},

		created() {
			this.$store.dispatch("AUTOLOGIN");
		},

		computed: {
			isLoggedIn: function () {
				return this.$store.getters.isLoggedIn;
			},
		},
	};
</script>

<style>
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

	body {
		height: 100vh;
		background-color: #FCFEFF;
		font-family: "Poppins", sans-serif;
	}

	* {
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}

	#app {
		height: 100%;
		min-height: -webkit-fill-available;
		display: grid;
		grid-template-columns: 100vw;
	}

	.container {
	}

	.navigation {
		overflow: hidden;
		position: fixed;
		bottom: 0;
		width: 100%;
	}
	a {
		text-decoration: none;
	}
</style>
