<template>
	<NavBar v-if="isLoggedIn" class="navigation" />
	<router-view />
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

	* {
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}

	body {
		height: 100vh;
		background-color: #FCFEFF;
		font-family: "Poppins", sans-serif;
		color: #434343;
	}

	#app {
		min-height: -webkit-fill-available;
		display: grid;
		grid-template-rows: 4rem auto 4rem;
		height: 100vh;
		width: 100vw;
	}

	.navigation {
		z-index: 1;
		grid-row: 3;
		align-self: baseline;
	}

	a {
		text-decoration: none;
		color: #434343;
	}

	@media screen and (min-width: 768px) {
		.navigation {
			margin: 0 auto;
			grid-row: 1;
			max-width: 70rem;
		}
	}
</style>
