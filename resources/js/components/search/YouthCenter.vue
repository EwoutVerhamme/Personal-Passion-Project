<template>
	<img class="content-img" :src="profilepic" alt="" />
	<p class="content-title">{{ name }}</p>
</template>

<script>
	export default {
		name: "YouthCenter",

		props: ["id", "profilepic", "name"],
	};
</script>


<style scoped>
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
