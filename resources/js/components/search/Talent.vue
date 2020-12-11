<template>
	<img class="content-img" :src="profilepic" alt="" />
	<p class="content-title">{{ first_name }} {{ last_name }}</p>
</template>

<script>
	export default {
		name: "Talent",

		props: ["id", "profilepic", "first_name", "last_name"],
	};
</script>


<style scoped >
	.content-title {
		margin-left: 1rem;
		font-size: 1.2rem;
		font-weight: 400;
	}

	.content-img {
		width: 3rem;
		height: auto;
		clip-path: circle(50% at center);
		margin-left: 0.5rem;
	}
</style>
