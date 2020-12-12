<template>
	<div class="youthcenter-block">
		<img class="content-img" :src="image" alt="" />
		<p class="content-title">{{ name }}</p>
	</div>
</template>

<script>
	export default {
		name: "YouthCenter",

		props: ["id", "image", "name"],
	};
</script>


<style scoped>
	.youthcenter-block {
		display: flex;
		align-items: center;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 95vw;
		height: 4rem;
		margin: 1rem 0.5rem 0rem 0.5rem;
	}
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

	@media screen and (min-width: 400px) {
		.youthcenter-block {
			width: 24rem;
			height: 5rem;
		}

		.content-title {
			font-size: 1.4rem;
		}

		.content-img {
			width: 4rem;
			height: auto;
		}
	}

	@media screen and (min-width: 768px) {
		.youthcenter-block {
			width: 19rem;
		}
	}

	@media screen and (min-width: 1024px) {
		.youthcenter-block {
			width: 21rem;
		}
	}
</style>
