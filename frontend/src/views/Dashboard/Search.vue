<template>
	<div>
		<h1 class="title">{{ tabs[current] }} zoeken</h1>
		<div class="search-select_wrapper">
			<a
				v-for="(tab, i) in tabs"
				@click="current = i"
				class="search-select_text"
				v-bind:key="tab.index"
				:class="{ current: i == current }"
			>
				{{ tab }}
			</a>
		</div>
		<SearchInput :currentTab="tabs[current].toLowerCase()"> </SearchInput>
	</div>
</template>

<script>
	import SearchInput from "../../components/SearchInput";

	export default {
		name: "Search",
		components: {
			SearchInput,
		},

		data() {
			return {
				current: 0,
				tabs: ["Talent", "Materiaal", "Engagement", "Jeugdhuis"],
				isActive: true,
			};
		},
		// beforeMount() {
		// 	this.getYouthCenters();
		// },

		currentTab() {
			return this.tabs[this.current].toLowerCase();
		},

		// methods: {
		// 	async getYouthCenters() {
		// 		const res = await fetch("http://api.kollapp.test/api/youth_centers");
		// 		const data = await res.json();
		// 		this.loading = await false;
		// 		this.youth_centers = data;
		// 	},
		// },
	};
</script>


<style>
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}

	.search-select_wrapper {
		/* border-bottom: solid 0.2rem #8ce4e3; */
		display: flex;
		width: 100%;
		justify-content: space-around;
		flex-direction: ;
	}

	.search-select {
	}

	.search-select_text {
		font-family: "Poppins", sans-serif;
		font-size: 0.9rem;
		margin-bottom: 0.3rem;
	}

	.search-subtitle {
		font-family: "Poppins", sans-serif;
		font-size: 1.2rem;
		margin-left: 0.5rem;
		color: #434343;
		margin-bottom: -0.6rem;
	}

	.current {
		border-bottom: solid 0.2rem #8ce4e3;
	}

	.load-content {
		margin-top: 2rem;
	}

	.content-block {
		display: flex;
		align-items: center;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 95%;
		height: 4.5rem;
		margin: 0 auto;
		margin-top: 1rem;
	}

	.content-title {
		margin-left: 1rem;
		font-family: "Poppins", sans-serif;
		font-size: 1.2rem;
		font-weight: 600;
	}

	.content-img {
		margin-left: 0.5rem;
	}
	.loading {
		font-family: "Poppins", sans-serif;
		font-size: 1.2rem;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>