<template>
	<div class="match-box">
		<div class="title-wrapper">
			<img src="/assets/img/profile-pic.png" alt="" class="profile-pic-box" />
			<p class="title-text">Lien zoekt een <strong>DJ</strong></p>
		</div>
		<div class="info">
			<div class="info-date">
				<img width="25px" height="25px" src="/assets/img/calendar.png" alt="" />
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


<style scoped>
	.match-box {
		background-color: white;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 19rem;
		margin: 0 auto;
		margin-top: 1rem;
	}
	.title-wrapper {
		margin-top: 0.5rem;
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
		font-size: 1.2rem;
		font-weight: 300;
	}

	.info {
		margin-left: 3.5rem;
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
		font-weight: 300;
	}

	strong {
		color: #36C9C6;
	}

	@media screen and (min-width: 768px) {
		.match-box {
			width: 22rem;
			height: 8rem;
		}

		.profile-pic-box {
			width: 3rem;
			height: 3rem;
		}

		.title-text {
			font-size: 1.3rem;
		}

		.info-text {
			font-size: 1rem;
		}

		.info {
			margin-left: 4rem;
		}
	}
</style>