<template>
	<div>
		<h1 class="title">Jeugdhuis zoeken</h1>
		<div class="search-select_wrapper">
			<div class="search-select">
				<p class="search-select_text">Talent</p>
				<p class="search-select_text">Materiaal</p>
				<p class="search-select_text">Engagement</p>
				<p class="search-select_text active">Jeugdhuis</p>
			</div>
		</div>
		<SearchInput />
		<div class="load-content">
			<h2 class="search-subtitle">Aanbevolen jeugdhuizen</h2>
			<p class="loading" v-if="loading">Jeugdhuizen ophalen...</p>
			<div v-for="youth_center in youth_centers" v-bind:key="youth_center.id">
				<div class="content-block">
					<img class="content-img" src="../assets/img/jctg.png" alt="" />
					<p class="content-title">{{ youth_center.name }}</p>
				</div>
			</div>
		</div>
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
				youth_centers: {},
				loading: true,
			};
		},
		beforeMount() {
			this.getYouthCenters();
		},
		methods: {
			async getYouthCenters() {
				const res = await fetch("http://api.kollapp.test/api/youth_centers");
				const data = await res.json();
				this.loading = await false;
				this.youth_centers = data;
			},
		},
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
	}

	.search-select {
		display: flex;
		width: 100%;
		justify-content: space-around;
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

	.active {
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