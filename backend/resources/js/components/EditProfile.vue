<template>
	<h1 class="title">Wijzig je profiel</h1>
	<Logout />
</template>

<script>
	import Logout from "../views/Auth/Logout/Logout";
	export default {
		name: "EditProfile",

		components: {
			Logout,
		},
	};
</script>


<style scoped >
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}
</style>
