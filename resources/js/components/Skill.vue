<template>
	<p class="skill">{{ skill }}</p>
</template>

<script>
	import { computed } from "vue";
	export default {
		name: "Skill",

		props: ["skill"],
	};
</script>


<style scoped >
	.skill {
		background-color: #8CE4E3;
		width: fit-content;
		color: white;
		padding: 0.3rem;
		border-radius: 0.6rem;
		margin: 0.5rem;
	}

	@media screen and (min-width: 768px) {
		.skill {
			font-size: 1.3rem;
			padding: 0.6rem;
		}
	}
</style>
