<template>
	<div class="register-welcome">
		<h1 class="register-title">Welkom bij <strong>Kollapp</strong></h1>
		<h2 class="register-subtitle">Jongeren en jeugdhuizen dichter bijeen</h2>
		<img src="/assets/img/logo.svg" alt="" class="register-img" />
	</div>
	<form action="" class="register-form">
		<h2 class="register-form-title">Aanmelden</h2>
		<input
			v-model="email"
			type="text"
			placeholder="Email"
			class="register-input"
		/>
		<input
			v-model="password"
			type="text"
			placeholder="Wachtwoord"
			class="register-input"
		/>
		<input
			v-model="password_confirmation"
			type="text"
			placeholder="Herhaal wachtwoord"
			class="register-input"
		/>

		<div class="register-accept">
			<input type="radio" class="register-accept_radio" />
			<p class="register-accept_text">
				Ik accepteer de <strong>algemene voorwaarden</strong>
			</p>
		</div>

		<div class="button-wrapper">
			<button @click="register" class="register-button">Inloggen</button>
			<router-link to="/login">
				<p class="login">Heb je al een account? <strong>Inloggen</strong></p>
			</router-link>
		</div>
	</form>
</template>

<script>
	import axios from "axios";

	const axiosInstance = axios.create({
		baseURL: "http://api.kollapp.test/api/",
		timeout: 1000,
		headers: { "Content-Type": "application/json" },
	});

	export default {
		name: "Register",
		components: {},

		data() {
			return {
				email: "",
				password: "",
				password_confirmation: "",
			};
		},
		methods: {
			register(e) {
				e.preventDefault();
				axiosInstance
					.post("/register", {
						email: this.email,
						password: this.password,
						password_confirmation: this.password_confirmation,
					})
					.then(function (response) {
						console.log(response);
					})
					.catch(function (error) {
						console.log(error);
					});
			},
		},
	};
</script>


<style>
	.register-welcome {
		display: flex;
		justify-content: center;
		flex-direction: column;
		text-align: center;
		margin-top: 1rem;
	}

	.register-title {
		margin: 0;
		font-family: "Poppins", sans-serif;
		font-weight: 300;
		font-size: 1.8rem;
	}

	.register-subtitle {
		margin: 0;
		font-family: "Poppins", sans-serif;
		font-weight: 400;
		font-size: 0.9rem;
		margin-top: -0.3rem;
	}

	.register-img {
		margin-top: 1rem;
		height: 5rem;
	}

	.register-form {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}

	.register-form-title {
		font-family: "Poppins", sans-serif;
		font-weight: 600;
		font-size: 1.3rem;
		margin: 1rem 0rem 0rem 0.5rem;
	}
	.register-label {
		margin: 0 auto;
		width: 90%;
	}

	.register-input {
		border: none;
		border-bottom: 0.1rem solid #434343;
		width: 95%;
		margin: 0 auto;
		margin-top: 1rem;
	}

	.register-input::placeholder {
		font-family: "Poppins", sans-serif;
		font-weight: 300;
		font-size: 1rem;
	}
	.register-accept {
		display: flex;
		align-items: center;
	}

	.register-accept_text {
		font-family: "Poppins", sans-serif;
		font-weight: 300;
		font-size: 0.9rem;
	}

	.register-button {
		width: 90%;
		margin: 0 auto;
		height: 2.5rem;
		background-color: #8CE4E3;
		border: none;
		border-radius: 0.5rem;
		color: white;
		font-family: "Poppins", sans-serif;
		font-size: 1.2rem;
	}
	.button-wrapper {
		display: flex;
		justify-content: center;
		flex-direction: column;
	}

	.login {
		text-align: center;
		margin: 0;
		margin-top: 0.5rem;
		font-family: "Poppins", sans-serif;
		font-weight: 300;
		font-size: 0.9rem;
	}
</style>