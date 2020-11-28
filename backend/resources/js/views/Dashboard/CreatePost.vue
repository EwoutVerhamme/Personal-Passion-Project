<template>
	<div>
		<h1 class="title">Maak een zoekertje</h1>
		<InputField class="input" placeholder="Geef je zoekertje een titel" />
		<InputField class="input" placeholder="Geef wat extra informatie" />
	</div>
	<div class="select-skill">
		<p class="select-title">Naar welke skills ben je opzoek?</p>
		<div class="select-button_wrapper">
			<p class="select-button">Selecteer skills</p>
			<img class="select-img" src="/assets/img/select.svg" alt="" />
		</div>
	</div>
	<InputField class="input" placeholder="Waar zal dit plaatsvinden?" />
	<InputField class="input" placeholder="Uitvoeringsdatum" />

	<Button btnText="Plaats je zoekertje" />
</template>

<script>
	import InputField from "../../components/InputField";
	import Button from "../../components/Button";
	export default {
		name: "CreatePost",
		components: {
			InputField,
			Button,
		},
	};
</script>


<style scoped>
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}

	.input {
		margin-top: 0.5rem;
	}

	.select-skill {
		margin-left: 0.5rem;
		font-family: "Poppins", sans-serif;
	}

	.select-title {
		font-weight: 600;
		font-size: 0.9rem;
		margin-bottom: 0;
	}

	.select-button {
		color: #FF899E;
		margin-top: 0;
		margin-bottom: 0;
	}

	.select-img {
		margin-left: 0.5rem;
	}

	.select-button_wrapper {
		display: flex;
		align-items: center;
	}
</style>