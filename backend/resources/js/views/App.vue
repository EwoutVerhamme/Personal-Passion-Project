<template>
	<div class="container">
		<router-view />
	</div>
	<NavBar class="navigation" />
</template>

<script>
	import NavBar from "../components/NavBar";
	export default {
		name: "App",
		components: {
			NavBar,
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
		padding: 0;
		margin: 0;
		height: 100vh;
		background-color: #FCFEFF;
	}

	*,
	*::before,
	*::after {
		box-sizing: border-box;
	}

	#app {
		height: 100%;
		min-height: -webkit-fill-available;
		display: grid;
		grid-template-columns: 100vw;
	}

	.container {
		padding-bottom: 5rem;
	}

	.navigation {
		grid-row: 3;
		align-self: flex-end;
		overflow: hidden;
		position: fixed;
		bottom: 0;
		width: 100%;
	}
	router-link a {
		text-decoration: none;
	}
</style>
