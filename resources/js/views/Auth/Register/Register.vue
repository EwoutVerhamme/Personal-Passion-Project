<template>
	<div class="login">
		<div class="register-welcome">
			<h1 class="register-title">Welkom bij <strong>Kollapp</strong></h1>
			<h2 class="register-subtitle">Jongeren en jeugdhuizen dichter bijeen</h2>
			<img src="/assets/img/logo.svg" alt="" class="register-img" />
		</div>
		<form autocomplete="off" action="" class="register-form">
			<h2 class="register-form-title">Aanmelden</h2>
			<p v-if="error" class="error">{{ error }}</p>
			<div class="input-form">
				<p class="select-title">Email</p>
				<input
					v-model="credentials.email"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Wachtwoord</p>
				<input
					v-model="credentials.password"
					type="password"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Herhaal wachtwoord</p>
				<input
					v-model="credentials.password_confirmation"
					type="password"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
		</form>
		<div class="button-wrapper">
			<button @click.prevent="setCredentials" class="register-button">
				Aanmelden
			</button>
			<router-link to="/login">
				<p class="login-text">Al een account? <strong>Inloggen</strong></p>
			</router-link>
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	import router from "../../../router/index";
	import store from "../../../store/index";
	export default {
		name: "Register",
		components: {},

		data() {
			return {
				credentials: {
					email: "",
					password: "",
					password_confirmation: "",
				},
				error: null,
			};
		},

		created() {
			this.registerStatus;
		},

		computed: {
			// Get the filled in user credentials
			registerStatus: function () {
				return this.$store.getters.registerStatus;
			},
		},

		methods: {
			// Set the user his credentials and check for errors
			setCredentials() {
				if (
					this.credentials.password === this.credentials.password_confirmation &&
					this.credentials.password.length >= 4
				) {
					this.$store
						.dispatch("SETCREDENTIALS", this.credentials)
						.then((success) => {
							this.$router.push("/profile-info");
						})
						.catch((error) => {
							console.log(error);
						});
				} else {
					this.error = "Je wachtwoorden komen niet overeen.";
				}
			},
		},
	};
</script>


<style scoped>
	.login {
		margin: 0 auto;
		grid-row: 1 / span 2;
	}

	.register-welcome {
		align-self: flex-start;
		display: flex;
		justify-content: center;
		flex-direction: column;
		text-align: center;
		margin-top: 1rem;
	}

	.register-form {
		width: 100%;
		margin: 0 auto;
		align-self: flex-start;
		margin-top: 1rem;
	}

	.register-form-title {
		font-weight: 600;
		font-size: 1.7rem;
	}

	.register-title {
		font-weight: 300;
		font-size: 2rem;
	}

	.register-subtitle {
		font-weight: 400;
		font-size: 0.9rem;
		margin-top: 0.5rem;
	}

	.register-img {
		margin-top: 3rem;
		height: 15vh;
	}

	.register-accept_text {
		font-weight: 300;
		font-size: 0.9rem;
	}

	.register-button {
		width: 17rem;
		height: 2.5rem;
		background-color: #8CE4E3;
		border: none;
		border-radius: 0.5rem;
		color: white;
		font-size: 1.2rem;
		margin: 0 auto;
	}

	.login-text {
		text-align: center;
		margin-top: 1rem;
		font-weight: 300;
		font-size: 0.9rem;
		color: #434343;
	}

	.button-wrapper {
		margin-top: 5rem;
		display: flex;
		justify-content: center;
		flex-direction: column;
	}

	strong {
		color: #FF899E;
		font-weight: 600;
	}

	.error {
		color: #FF3F60;
	}

	@media screen and (min-width: 500px) {
		.login {
			justify-content: center;
		}

		.register-title {
			font-size: 3rem;
		}

		.register-subtitle {
			margin: 0;
			font-weight: 400;
			font-size: 1.3rem;
			margin-top: 1rem;
		}

		.register-img {
			margin-top: 5rem;
			height: 8rem;
		}

		.register-form-title {
			font-size: 2rem;
		}

		.input-form {
			width: 100%;
			margin: 0;
			margin-top: 1rem;
		}

		.register-button {
			width: 25rem;
			height: 3rem;
			font-size: 1.6rem;
		}

		.login-text {
			font-size: 1.3rem;
		}
	}
</style>