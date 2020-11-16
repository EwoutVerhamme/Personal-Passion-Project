<template>
	<div class="home">
		<div class="container">
			<div class="subtitle">
				<h2 class="subtitle">Waar ben je naar opzoek?</h2>
			</div>
			<div class="boxes-wrapper">
				<div class="boxes">
					<div class="box">
						<img src="./assets/img/home/talents.svg" alt="" />
						<h3 class="box-title">Talenten</h3>
					</div>
					<div class="box">
						<img src="./assets/img/home/materials.svg" alt="" />
						<h3 class="box-title">Materiaal</h3>
					</div>
					<div class="box">
						<img src="./assets/img/home/engagements.svg" alt="" />
						<h3 class="box-title">Engagementen</h3>
					</div>
					<div class="box">
						<img src="./assets/img/home/youth_center.svg" alt="" />
						<h3 class="box-title">Jeugdhuizen</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "Home",
		components: {},
	};
</script>


<style>
	.subtitle {
		margin-left: 0.4rem;
		margin-top: 0.3rem;
		color: #40798C;
		font-family: "Poppins", sans-serif;
		font-weight: 600;
	}
	.boxes {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		margin-top: 2.5rem;
	}

	.box {
		width: 10.5rem;
		height: 10.5rem;
		margin: 0.7rem;
		box-shadow: 0px 0px 20px 6px #ccc;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		flex: 1;
		border-radius: 1rem;
	}
	.box-title {
		font-family: "Poppins", sans-serif;
		font-weight: 700;
		color: #40798C;
	}
</style>
