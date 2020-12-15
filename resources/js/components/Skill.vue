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
		border-radius: 0.6rem;
		margin: 0.5rem 1rem 0rem 0rem;
		font-size: 1.3rem;
		width: fit-content;
		padding-left: 1rem;
		padding-right: 1rem;
		height: 2.5rem;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>
