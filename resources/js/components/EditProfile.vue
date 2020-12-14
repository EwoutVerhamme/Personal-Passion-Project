<template>
	<div class="edit-profile">
		<h1 class="title">Wijzig je profiel</h1>
		
		<Logout class="logout" />
	</div>
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
	.edit-profile {
		grid-row: 1 / span 2;
	}
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}

	.logout {
		width: 15rem;
	}

	@media screen and (min-width: 768px) {
		.edit-profile {
			grid-row: 2;
		}

		.title {
			margin-top: 2rem;
		}
	}
</style>
