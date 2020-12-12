<template>
	<div class="engagement-block">
		<img class="engagement-img" :src="creator_img" alt="" />
		<p class="engagement-title">
			{{ first_name }} zoekt een
			<strong>{{ skill_alias }}</strong>
		</p>

		<div class="engagement-info">
			<div class="info-wrapper">
				<img width="20" height="20" src="/assets/img/calendar.png" alt="" />

				<p class="engagement-text">{{ date }}</p>
			</div>
			<div class="info-wrapper">
				<img width="20" height="20" src="/assets/img/location.svg" alt="" />

				<p class="engagement-text">{{ location }}</p>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "Engagement",

		props: ["first_name", "skill_alias", "creator_img", "date", "location"],
	};
</script>


<style scoped>
	.engagement-block {
		display: grid;
		grid-template-columns: 0.5rem 0.3fr 1fr 0.5rem;
		grid-template-rows: 0.5rem 1fr 1fr 0.5rem;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 95vw;
		height: fit-content;
		margin: 1rem 0.5rem 0rem 0.5rem;
	}

	.engagement-title {
		font-size: 1.2rem;
		grid-column: 3;
		grid-row: 2;
		align-self: center;
		margin-left: 1rem;
	}

	.engagement-img {
		max-width: 4rem;
		height: auto;
		clip-path: circle(50% at center);
		grid-row: 2 / span 3;
		grid-column: 2;
		align-self: center;
		justify-self: center;
		margin: 0.2rem;
	}

	.engagement-info {
		grid-row: 3;
		grid-column: 3;
		display: flex;
		flex-direction: column;
		margin-left: 1rem;
	}

	.info-wrapper {
		display: flex;
		align-items: center;
		margin-top: 0.3rem;
	}

	.engagement-text {
		margin-left: 0.5rem;
	}

	strong {
		color: #8ce4e3;
		font-weight: 600;
	}

	@media screen and (min-width: 400px) {
		.engagement-block {
			width: 24rem;
		}
	}

	@media screen and (min-width: 768px) {
		.engagement-block {
			width: 19rem;
		}
	}
</style>
