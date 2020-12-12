<template>
	<div class="button-wrapper">
		<button class="button">{{ btnText }}</button>
	</div>
</template>

<script>
	export default {
		name: "Button",

		props: ["btnText"],
	};
</script>


<style scoped >
	.button {
		width: 15rem;
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
		margin-top: 1rem;
		display: flex;
		justify-content: center;
		flex-direction: column;
	}
</style>
