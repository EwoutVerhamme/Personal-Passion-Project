<template>
	<div class="add-skils">
		<Back class="back" />
		<div class="title-wrapper">
			<h1 class="title">Voeg skills toe</h1>
		</div>
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
			<div class="skill" v-for="skill in skills" :key="skill.id">
				<p @click="addSkill((id = skill.id))" class="skill-title">
					{{ skill.skill_name }}
				</p>
			</div>
			<p class="loading" v-if="loading">Skills ophalen...</p>
			<p class="loading" v-if="found === false">Geen skills gevonden...</p>
		</div>

		<p class="noskill">
			Staat je skill er niet tussen? <br />
			<strong>Voeg hem toe</strong>
		</p>

		<Button @click="setSkills" btnText="Voeg de skills toe" />
	</div>
</template>

<script>
	import Button from "../../../components/Buttons/Button";
	import Back from "../../../components/Buttons/Back";
	import axios from "axios";
	export default {
		name: "RegisterSkills",

		components: {
			Button,
			Back,
		},

		data() {
			return {
				search: "",
				skills: {},
				addedSkills: [],
				loading: true,
				found: true,
				isActive: undefined,
			};
		},

		created() {
			this.makeSearch();
		},

		methods: {
			addSkill(id) {
				this.addedSkills.push(id);

				if (this.addedSkills.indexOf(id) !== -1) {
					this.addedSkills.splice(id, 1);
					console.log(this.addedSkills);
				} else {
					this.addedSkills.push(id);
					console.log(this.addedSkills);
				}
			},

			onSearch() {
				clearTimeout(this.timeout);
				this.timeout = setTimeout(() => {
					this.makeSearch();
				}, 500);
			},

			makeSearch: async function () {
				try {
					const response = await axios.get(`/api/skills/${this.search}`);
					this.skills = response.data;
					console.log(this.skills);
				} catch (error) {
					console.error(error);
				}
			},
		},
	};
</script>


<style scoped>
	.add-skils {
		width: 95%;
		grid-row: 1 / span 2;
		margin: 0 auto;
	}

	.title-wrapper {
		width: 95%;
		display: flex;
		justify-content: center;
	}
	.title {
		text-align: center;
		font-size: 1.8rem;
		color: #FF899E;
		margin-top: 2rem;
		font-weight: 600;
	}

	.back {
		position: absolute;
		top: 2.1rem;
		left: 0.5rem;
	}

	.skills {
		margin-left: 0.25rem;
		display: flex;
		flex-flow: wrap;
		width: 95%;
		margin-top: 1rem;
	}

	.skill-title {
		background-color: transparent;
		border: 0.2rem solid #8CE4E3;
		color: #434343;
		width: fit-content;
		padding: 0.5rem;
		border-radius: 0.5rem;
		font-size: 0.8rem;
		margin: 0.25rem;
		cursor: pointer;
	}

	.active {
		background-color: #8CE4E3;
		color: white;
	}

	.input-field_wrapper {
		display: flex;
		border-bottom: 0.15rem #979797 solid;
		width: 95%;
		margin: 0 auto;
		margin-top: 1rem;
	}

	.input-field {
		border: none;
		width: 100%;
		padding: 10px 30px;
	}

	.input-field::placeholder {
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

	.noskill {
		margin-top: 0.5rem;
	}

	@media screen and (min-width: 768px) {
		.add-skils {
			width: 40rem;
			grid-row: 2;
			margin: 0 auto;
		}

		.input-field_wrapper {
			display: flex;
			border-bottom: 0.15rem #979797 solid;
			width: 40rem;
			margin: 0 auto;
			margin-top: 1rem;
		}

		.back {
			position: absolute;
			top: 6rem;
			left: 2rem;
		}
	}
	@media screen and (min-width: 1024) {
	}
</style>
