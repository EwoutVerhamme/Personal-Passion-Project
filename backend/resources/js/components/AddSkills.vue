<template>
	<h1 class="title">Voeg skills toe</h1>
	<div class="skills">
		<div class="skill">
			<p class="skill-title">Boekhouden</p>
		</div>
	</div>

	<p class="noskill">
		Staat je skill er niet tussen? <strong>Voeg hem toe</strong>
	</p>

	<Button btnText="Voeg de skills toe" />
</template>

<script>
	import Button from "../components/Button";

	export default {
		name: "AddSkills",

		components: {
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

	.skills {
		margin-left: 0.5rem;
	}

	.skill-title {
		background-color: #8CE4E3;
		width: fit-content;
		padding: 0.5rem;
		border-radius: 0.5rem;
		color: white;
		font-family: "Poppins", sans-serif;
		font-size: 0.8rem;
	}
</style>
