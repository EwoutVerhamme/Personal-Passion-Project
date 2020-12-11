<template>
	<div class="engagement-block">
		<img class="engagement-img" :src="creator_img" alt="" />
		<p class="engagement-title">
			{{ first_name }} zoekt een
			<strong>{{ skill_alias }}</strong>
		</p>

		<div class="engagement-info">
			<div class="date-wrapper">
				<img width="20" height="20" src="/assets/img/calendar.png" alt="" />

				<p class="engagement-text">{{ date }}</p>
			</div>
			<div class="location-wrapper">
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
		width: 22rem;
		height: fit-content;
		margin: 0rem;
		margin-top: 1rem;
	}

	.engagement-title {
		font-size: 1.2rem;
		grid-column: 3;
		grid-row: 2;
		margin: 0;
		align-self: center;
	}

	.engagement-img {
		width: 3rem;
		height: 3rem;
		clip-path: circle(50% at center);
		grid-row: 2;
		grid-column: 2;
		align-self: center;
		justify-self: center;
		margin: 0;
	}

	.engagement-info {
		grid-row: 3;
		grid-column: 3;
		display: flex;
		flex-direction: column;
		margin: 0;
	}

	.date-wrapper {
		display: flex;
		align-items: center;
	}

	.location-wrapper {
		display: flex;
		align-items: center;
	}

	.engagement-text {
		margin: 0.2rem;
	}

	strong {
		color: #8ce4e3;
	}
</style>
