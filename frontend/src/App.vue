<template>
	<TopTile class="toptile" />
	<div class="container">
		<router-view />
	</div>
	<NavBar class="navigation" />
</template>

<script>
	import NavBar from "./components/NavBar.vue";
	import TopTile from "./components/TopTitle";
	export default {
		name: "App",
		components: {
			// Home,
			NavBar,
			TopTile,
		},
	};
</script>

<style>
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

	body {
		margin: 0;
		padding: 0;
	}

	#app {
		height: 100vh;
		width: 100vw;
		display: grid;
		grid-template-rows: 15% 75% 10%;
	}

	.toptile {
		grid-row: 1;
		position: sticky;
	}
	.container {
		grid-row: 2;
	}
	.navigation {
		position: sticky;
		grid-row: 3;
	}
</style>
