<template>
	<div class="engagement-detail">
		<div class="engagement-head">
			<img class="engagement-img" :src="getAdDetail.creator_img" alt="" />
			<p class="engagement-title">
				{{ getAdDetail.first_name }} zoekt een
				<strong>{{ getAdDetail.skill_alias }}</strong>
			</p>
			<div class="engagement-info">
				<div class="date-wrapper">
					<img width="20" height="20" src="/assets/img/calendar.png" alt="" />
					<p class="engagement-text">{{ getAdDetail.date }}</p>
				</div>
				<div class="location-wrapper">
					<img width="20" height="20" src="/assets/img/location.svg" alt="" />
					<p class="engagement-text">{{ getAdDetail.location }}</p>
				</div>
			</div>
		</div>

		<div class="more-info">
			<h2 class="subtitle">Meer info</h2>
			<p class="info-text"></p>
		</div>
		<div class="engagement-skill">
			<h2 class="subtitle">Meer info</h2>
			<p class="skill"></p>
		</div>

		<div class="contact-socials">
			<h2 class="subtitle">Contacteer {{ getAdDetail.first_name }}</h2>
			<img class="contact-social" src="/assets/img/profile/fb.svg" alt="" />
			<img
				class="contact-social"
				src="/assets/img/profile/messenger.svg"
				alt=""
			/>
			<img
				class="contact-social"
				src="/assets/img/profile/twitter.svg"
				alt=""
			/>
		</div>
	</div>
</template>

<script>
	export default {
		name: "EngagementsDetail",

		props: {
			id: Number,
		},

		data() {
			return {
				ad: {},
			};
		},

		created() {
			const id = this.$props.id;
			this.$store.dispatch("GETADDETAIL", id);
		},

		computed: {
			getAdDetail() {
				return this.$store.getters.getAdDetail;
			},
		},
	};
</script>


<style>
</style>
