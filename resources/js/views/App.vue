<template>
	<NavBar v-if="isLoggedIn" class="navigation" />
	<router-view v-slot="{ Component }">
		<transition name="fade" mode="out-in">
			<component :is="Component" />
		</transition>
	</router-view>
</template>

<script>
	import NavBar from "../components/Navigation/NavBar";
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
		height: 100vh;
	}

	html {
	}

	.fade-enter,
	.fade-leave-to {
		opacity: 0;
		transform: translateX(2rem);
	}
	.fade-enter-active,
	.fade-leave-active {
		transition: all 0.3s ease;
	}

	#app {
		height: 100vh;
		display: grid;
		grid-template-rows: 4rem auto 4.5rem;
		width: 100vw;
	}

	.navigation {
		z-index: 1;
		position: sticky;
		grid-row: 3;
		align-self: flex-end;
		bottom: 0rem;
		left: 0rem;
	}

	.footer {
		display: none;
	}

	a {
		text-decoration: none;
		color: #434343;
	}

	.select-title {
		font-weight: 600;
		margin-top: 0.5rem;
		font-size: 1.3rem;
		font-weight: 500;
	}

	.input-form {
		margin: 0 auto;
	}

	.input-field {
		margin-top: 0.4rem;
		width: 95%;
		height: 1.4rem;
		font-size: 1.2rem;
		border: none;
		border-bottom: 0.2rem solid #f5f5f5;
		background-color: transparent;
	}

	textarea:focus,
	input:focus {
		outline: none;
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
