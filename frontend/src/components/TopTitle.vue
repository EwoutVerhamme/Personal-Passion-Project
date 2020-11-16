<template>
	<div class="toptitle">
		<h1 class="title">Welkom <strong>Ewout</strong></h1>
	</div>
</template>

<script>
	export default {
		name: "Home",
	};
</script>


<style>
	.navigation {
		border-top: 0.2rem solid #bbbec1;
		width: 100vw;
		display: flex;
		justify-content: space-around;
		align-items: center;
		bottom: 0;
	}

	.toptitle {
		background-color: #FF5666;
		border-radius: 0rem 0rem 2.5rem 2.5rem;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.title {
		color: white;
		font-family: "Poppins", sans-serif;
		font-weight: 300;
	}
</style>
