<template>
	<NavBar v-if="isLoggedIn" class="navigation" />
	<router-view />

	<footer class="footer">
		<img src="/assets/img/kollapp.svg" alt="" class="footer_logo" />
	</footer>
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
	@import "../styles/reset.css";
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

	* {
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}

	body {
		background-color: #FCFEFF;
		font-family: "Poppins", sans-serif;
		color: #434343;
		min-height: 100vh;
		min-height: -webkit-fill-available;
	}

	html {
		height: -webkit-fill-available;
	}

	#app {
		min-height: 100vh;
		height: -webkit-fill-available;
		display: grid;
		grid-template-rows: 4rem auto 4rem;
		width: 100vw;
	}

	.navigation {
		z-index: 1;
		grid-row: 3;
		align-self: baseline;
	}

	.footer {
		display: none;
	}

	a {
		text-decoration: none;
		color: #434343;
	}

	@media screen and (min-width: 768px) {
		.navigation {
			margin: 0 auto;
			grid-row: 1;
			width: 100vw;
		}

		.footer {
			grid-row: 3;
			display: flex;
			justify-content: center;
			align-items: center;
			border-top: 0.1rem solid #f5f5f5;
		}
	}
</style>
