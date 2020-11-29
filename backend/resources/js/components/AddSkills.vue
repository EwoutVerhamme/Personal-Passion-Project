<template>
	<h1 class="title">Voeg skills toe</h1>
	<div class="input-field_wrapper">
		<label class="search-label" for="">
			<input
				placeholder="Zoeken naar skills "
				v-model="search"
				@input="onSearch"
				class="input-field"
				type="text"
			/>
		</label>
	</div>
	<div class="skills">
		<div class="skill" v-for="skill in skills">
			<p class="skill-title">{{ skill.name }}</p>
		</div>
		<p class="loading" v-if="loading">Skills ophalen...</p>
		<p class="loading" v-if="found === false">Geen skills gevonden...</p>
	</div>

	<p class="noskill">
		Staat je skill er niet tussen? <strong>Voeg hem toe</strong>
	</p>

	<Button btnText="Voeg de skills toe" />
</template>

<script>
	import Button from "../components/Button";

	export default {
		name: "AddSkills",

		components: {
			Button,
		},

		data() {
			return {
				search: "",
				skills: {},
				loading: true,
				found: true,
			};
		},

		created() {
			this.makeSearch();
		},

		methods: {
			onSearch() {
				clearTimeout(this.timeout);
				this.timeout = setTimeout(() => {
					this.makeSearch();
				}, 500);
			},

			makeSearch() {
				this.found = true;
				const url = `http://api.kollapp.test/api/skills/${this.search}`;
				fetch(url)
					.then((response) => response.json())
					.then((result) => {
						// this.$emit("youth-centers-fetched", result);
						console.log("skills-fetched", result);
						this.loading = false;
						this.skills = result;

						if (result.length == 0) {
							this.found = false;
						}
					});
			},
		},
	};
</script>


<style scoped>
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}

	.skills {
		margin-left: 0.25rem;
		display: flex;
		flex-flow: wrap;
		width: 95%;
		margin-top: 1rem;
	}

	.skill-title {
		background-color: #8CE4E3;
		width: fit-content;
		padding: 0.5rem;
		border-radius: 0.5rem;
		color: white;
		font-family: "Poppins", sans-serif;
		font-size: 0.8rem;
		margin: 0.25rem;
	}
	.input-field_wrapper {
		display: flex;
		border-bottom: 0.15rem #979797 solid;
		width: 95%;
		margin: 0 auto;
	}

	.input-field {
		border: none;
		width: 100%;
		padding: 10px 30px;
	}

	.input-field::placeholder {
		font-family: "Poppins", sans-serif;
		font-size: 0.9rem;
	}

	.search-label {
		position: relative;
	}

	.search-label:before {
		content: "";
		position: absolute;
		width: 0.5rem;
		top: 0;
		bottom: 0;
		padding-right: 1rem;
		background: url("/assets/img/search.svg") center / contain no-repeat;
	}
</style>
