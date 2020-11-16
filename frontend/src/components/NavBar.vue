<template>
	<div class="navigation">
		<router-link to="/"
			><img alt="Vue logo" src="./assets/img/navbar/home.svg"
		/></router-link>

		<router-link to="/Matches"
			><img alt="Vue logo" src="./assets/img/navbar/matches.svg"
		/></router-link>
		<router-link to="/CreatePost"
			><img alt="Vue logo" src="./assets/img/navbar/createPost.svg"
		/></router-link>
		<router-link to="/Profile"
			><img alt="Vue logo" src="./assets/img/navbar/profile.svg"
		/></router-link>
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
</style>
