<template>
	<div class="navigation">
		<router-link to="/">
			<img
				@click="checkCurrentRoute"
				class="icon"
				:src="this.tabs.home.currentIcon"
				alt=""
			/>
		</router-link>

		<router-link to="/search">
			<img
				@click="checkCurrentRoute"
				class="icon"
				:src="this.tabs.search.currentIcon"
				alt=""
			/>
		</router-link>
		<router-link to="/create">
			<img
				@click="checkCurrentRoute"
				class="icon"
				:src="this.tabs.create.currentIcon"
				alt=""
			/>
		</router-link>
		<router-link to="/profile">
			<img
				@click="checkCurrentRoute"
				class="icon"
				:src="this.tabs.profile.currentIcon"
				alt=""
			/>
		</router-link>
	</div>
</template>

<script>
	import router from "../router/index";
	export default {
		name: "Home",

		data() {
			return {
				tabs: {
					home: {
						currentIcon: "",
						active: "/assets/img/navbar/home/homeActive.svg",
						notActive: "/assets/img/navbar/home/home.svg",
					},
					search: {
						currentIcon: "",
						active: "/assets/img/navbar/search/searchActive.svg",
						notActive: "/assets/img/navbar/search/search.svg",
					},
					create: {
						currentIcon: "",
						active: "/assets/img/navbar/create/createActive.svg",
						notActive: "/assets/img/navbar/create/create.svg",
					},
					profile: {
						currentIcon: "",
						active: "/assets/img/navbar/profile/profileActive.svg",
						notActive: "/assets/img/navbar/profile/profile.svg",
					},
				},
			};
		},

		created() {
			this.checkCurrentRoute();
		},

		methods: {
			checkCurrentRoute() {
				let routeArray = [];

				setTimeout(() => {
					const route = this.$router.currentRoute._rawValue.fullPath;
					routeArray.push(route), 200;
					console.log(routeArray[0]);

					switch (routeArray[0]) {
						case "/":
							//Set selected route active
							this.tabs.home.currentIcon = this.tabs.home.active;

							// Set other routes notactive
							this.tabs.search.currentIcon = this.tabs.search.notActive;
							this.tabs.create.currentIcon = this.tabs.create.notActive;
							this.tabs.profile.currentIcon = this.tabs.profile.notActive;
							break;
						case "/search":
							//Set selected route active
							this.tabs.search.currentIcon = this.tabs.search.active;

							// Set other routes notactive
							this.tabs.home.currentIcon = this.tabs.home.notActive;
							this.tabs.create.currentIcon = this.tabs.create.notActive;
							this.tabs.profile.currentIcon = this.tabs.profile.notActive;
							break;
						case "/create":
							//Set selected route active
							this.tabs.create.currentIcon = this.tabs.create.active;

							// Set other routes notactive
							this.tabs.home.currentIcon = this.tabs.home.notActive;
							this.tabs.search.currentIcon = this.tabs.search.notActive;
							this.tabs.profile.currentIcon = this.tabs.profile.notActive;
							break;
						case "/profile":
							//Set selected route active
							this.tabs.profile.currentIcon = this.tabs.profile.active;

							// Set other routes notactive
							this.tabs.home.currentIcon = this.tabs.home.notActive;
							this.tabs.search.currentIcon = this.tabs.search.notActive;
							this.tabs.create.currentIcon = this.tabs.create.notActive;
							break;
						default:
					}
				});
			},
		},
		checkRouteTwice() {
			this.currentRoute();
		},
	};
</script>


<style>
	.navigation {
		width: 100%;
		height: 4rem;
		display: flex;
		justify-content: space-around;
		align-items: center;
		bottom: 0;
		background-color: white;
		box-shadow: 0rem 0rem 1.3rem 1rem rgba(0, 0, 0, 0.09);
		border-radius: 2.5rem 2.5rem 0rem 0rem;
	}
	.icon {
		width: 2.5rem;
		height: auto;
	}
</style>
