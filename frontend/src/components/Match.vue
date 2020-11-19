<template>
	<div class="match-box">
		<div class="title-wrapper">
			<img src="/assets/img/profile-pic.png" alt="" class="profile-pic-box" />
			<p class="title-text">Lien zoekt een <strong>DJ</strong></p>
		</div>
		<div class="info">
			<div class="info-date">
				<img
					width="25px"
					height="25px"
					src="/assets/img/calendar.png"
					alt=""
				/>
				<p class="info-text">Zaterdag 12 december</p>
			</div>
			<div class="info-youthcenter">
				<img width="25px" height="25px" src="/assets/img/place.svg" alt="" />
				<p class="info-text">Jeugdhuis Krak</p>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "Match",
		components: {},
	};
</script>


<style>
	.match-box {
		background-color: white;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 95vw;
		margin: 0 auto;
	}
	.title-wrapper {
		display: flex;
		align-items: center;
		flex-direction: row;
		margin-left: 1rem;
	}
	.profile-pic-box {
		width: 2.5rem;
		height: 2.5rem;
	}

	.title-text {
		margin-left: 1rem;
		font-family: "Poppins", sans-serif;
		font-size: 1.2rem;
	}
	.info-date {
		margin-left: 1rem;
		display: flex;
		align-items: center;
	}

	.info-youthcenter {
		margin-left: 1rem;
		margin-top: 0.5rem;
		padding-bottom: 0.5rem;
		display: flex;
		align-items: center;
	}

	.info-text {
		margin: 0 0 0 0.5rem;
		font-family: "Poppins", sans-serif;
	}
</style>