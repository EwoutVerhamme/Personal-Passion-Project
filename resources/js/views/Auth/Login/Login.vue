<template>
	<div class="login">
		<div class="register-welcome">
			<h1 class="register-title">Welkom bij <strong>Kollapp</strong></h1>
			<h2 class="register-subtitle">Jongeren en jeugdhuizen dichter bijeen</h2>
			<img src="/assets/img/logo.svg" alt="" class="register-img" />
		</div>
		<form action="" class="register-form">
			<h2 class="register-form-title">Inloggen</h2>
			<p v-if="error == true" class="error">Je email/passwoord klopt niet.</p>
			<div class="input-form">
				<input
					v-model="email"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Email</span>
				</label>
			</div>
			<div class="input-form">
				<input
					v-model="password"
					type="password"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Wachtwoord</span>
				</label>
			</div>
		</form>
		<div class="button-wrapper">
			<button @click.prevent="login" class="register-button">Inloggen</button>
			<router-link to="/register">
				<p class="login-text">Nog geen account? <strong>Aanmelden</strong></p>
			</router-link>
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	import router from "../../../router/index";
	import store from "../../../store/index";
	import InputField from "../../../components/InputField";
	export default {
		name: "Login",
		components: {
			InputField,
		},

		data() {
			return {
				email: "",
				password: "",
				error: false,
			};
		},

		methods: {
			login() {
				this.$store
					.dispatch("LOGIN", {
						email: this.email,
						password: this.password,
					})
					.then((success) => {
						this.$router.push("/");
					})
					.catch((error) => {
						this.error = true;
					});
			},
		},
	};
</script>


<style scoped>
	.login {
		display: grid;
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
	}

	.register-form-title {
		font-weight: 600;
		font-size: 1.3rem;
	}

	.register-title {
		margin: 0;
		font-weight: 300;
		font-size: 1.8rem;
	}

	.register-subtitle {
		margin: 0;
		font-weight: 400;
		font-size: 0.9rem;
		margin-top: -0.3rem;
	}

	.register-img {
		margin-top: 5rem;
		height: 17vh;
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
		margin-top: 0.5rem;
		font-weight: 300;
		font-size: 0.9rem;
		color: #434343;
	}

	strong {
		color: #FF899E;
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
			margin-top: -0.3rem;
		}

		.register-img {
			margin-top: 5rem;
			height: 10rem;
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