<template>
	<div class="welcome">
		<h1 class="welcome-title">
			Welkom <br />
			<strong>Sebastiaan!</strong>
		</h1>
		<img src="../assets/img/profile-pic.png" alt="" class="profile-pic" />
	</div>
	<div class="matches">
		<h2 class="subtitle">
			Mensen zijn op zoek naar jouw <strong>talent!</strong>
		</h2>
		<Match class="match" />
		<Match class="match" />
		<Match class="match" />
		<Match class="match" />
		<Match class="match" />
	</div>
</template>

<script>
	import Match from "../components/Match.vue";
	export default {
		name: "Home",
		components: {
			Match,
		},
	};
</script>


<style>
	.welcome {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 6rem;
	}

	.welcome-title {
		font-family: "Poppins", sans-serif;
		font-weight: 400;
		font-size: calc(1.6rem + 10 * ((100vw - 100px) / 400));
		line-height: 2.3rem;
		width: 65%;
	}
	.subtitle {
		font-family: "Poppins", sans-serif;
		font-weight: 300;
		font-size: calc(1.2rem + 10 * ((100vw - 320px) / 680));
		margin-top: 1rem;
		margin-left: 0.5rem;
		margin-bottom: 0;
	}
	.boxes {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
	}

	.box {
		width: calc(8rem + 1.5vw);
		height: calc(8rem + 1.5vh);
		box-shadow: 0px 0px 30px 6px #ccc;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		flex: 1;
		border-radius: 1rem;
		margin: 0.5rem;
	}
	.box-title {
		font-family: "Poppins", sans-serif;
		font-weight: 700;
		font-size: 1rem;
		color: #40798C;
		margin: 0;
		margin-top: 0.5rem;
		text-decoration: none;
	}
	strong {
		color: #FF899E;
	}

	.profile-pic {
		width: 3.5rem;
		height: 3.5rem;
	}
	.match {
		margin-top: 1rem;
	}
	li {
		text-decoration: none;
	}
</style>
