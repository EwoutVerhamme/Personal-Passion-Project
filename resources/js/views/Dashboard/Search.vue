<template>
	<div>
		<h1 class="title">{{ tabs[current] }} zoeken</h1>
		<div class="search-select_wrapper">
			<a
				v-for="(tab, i) in tabs"
				@click="[(current = i), checkCurrentTab()]"
				class="search-select_text"
				v-bind:key="tab.index"
				:class="{ current: i == current }"
			>
				{{ tab }}
			</a>
		</div>
		<div class="input">
			<div class="input-field_wrapper">
				<label class="search-label" for="">
					<input
						placeholder="Zoeken naar een"
						v-model="search"
						@input="onSearch"
						class="input-field"
						type="text"
					/>
				</label>
			</div>

			<svg
				width="40"
				height="35"
				viewBox="0 0 40 35"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M23.0602 3.74582H1.46321C0.643813 3.74582 0 4.38963 0 5.20903C0 6.02843 0.643813 6.67224 1.46321 6.67224H23.0602C23.704 8.83779 25.694 10.4181 28.0936 10.4181C30.4348 10.4181 32.4833 8.83779 33.0686 6.67224H38.3946C39.214 6.67224 39.8579 6.02843 39.8579 5.20903C39.8579 4.38963 39.214 3.74582 38.3946 3.74582H33.0686C32.4247 1.58027 30.4348 0 28.0936 0C25.694 0 23.704 1.58027 23.0602 3.74582ZM30.3177 5.20903C30.3177 6.49665 29.2642 7.49164 28.0351 7.49164C26.806 7.49164 25.7525 6.49665 25.7525 5.20903C25.7525 3.9214 26.806 2.92642 28.0351 2.92642C29.2057 2.92642 30.3177 3.9214 30.3177 5.20903Z"
					fill="#8CE4E3"
				/>
				<path
					d="M5.50167 15.4514H1.46321C0.643813 15.4514 0 16.0952 0 16.9146C0 17.734 0.643813 18.3778 1.46321 18.3778H5.50167C6.14548 20.5434 8.13545 22.1236 10.5351 22.1236C12.8763 22.1236 14.9247 20.5434 15.51 18.3778H38.3946C39.214 18.3778 39.8579 17.734 39.8579 16.9146C39.8579 16.0952 39.214 15.4514 38.3946 15.4514H15.51C14.8662 13.2858 12.8763 11.7056 10.5351 11.7056C8.13545 11.7056 6.14548 13.2858 5.50167 15.4514ZM12.7592 16.9146C12.7592 18.2022 11.7057 19.1972 10.4766 19.1972C9.24749 19.1972 8.19398 18.2022 8.19398 16.9146C8.19398 15.627 9.24749 14.632 10.4766 14.632C11.7057 14.632 12.7592 15.627 12.7592 16.9146Z"
					fill="#8CE4E3"
				/>
				<path
					d="M16.0368 28.3279H1.46321C0.643813 28.3279 0 28.9717 0 29.7911C0 30.6105 0.643813 31.2543 1.46321 31.2543H16.0368C16.6806 33.4198 18.6706 35.0001 21.0702 35.0001C23.4114 35.0001 25.4599 33.4198 26.0451 31.2543H38.3946C39.214 31.2543 39.8579 30.6105 39.8579 29.7911C39.8579 28.9717 39.214 28.3279 38.3946 28.3279H26.0451C25.4013 26.1623 23.4114 24.582 21.0702 24.582C18.6706 24.582 16.6806 26.1623 16.0368 28.3279ZM23.2943 29.7911C23.2943 31.0787 22.2408 32.0737 21.0117 32.0737C19.7826 32.0737 18.7291 31.0787 18.7291 29.7911C18.7291 28.5034 19.7826 27.5085 21.0117 27.5085C22.2408 27.5085 23.2943 28.5034 23.2943 29.7911Z"
					fill="#8CE4E3"
				/>
			</svg>
		</div>
		<div class="load-content">
			<h2 class="search-subtitle">
				Aanbevolen {{ tabs[current].toLowerCase() }}
			</h2>
			<p class="loading" v-if="loading">
				{{ tabs[current].toLowerCase() }} ophalen...
			</p>
			<p class="loading" v-if="found === false">
				geen {{ tabs[current].toLowerCase() }} gevonden...
			</p>

			<div>
				<router-link
					:to="`/user/${t.id}`"
					v-if="tabs[current] == 'Talent'"
					:key="t.id"
					v-for="t in tab"
					class="content-block"
				>
					<img width="40" class="content-img" :src="t.profilepic" alt="" />
					<p class="content-title">{{ t.first_name }} {{ t.last_name }}</p>
				</router-link>
				<div
					v-if="tabs[current] == 'Jeugdhuis'"
					:key="t.id"
					v-for="t in tab"
					class="content-block"
				>
					<img width="40" class="content-img" :src="t.profilepic" alt="" />
					<p class="content-title">{{ t.name }}</p>
				</div>
				<div
					class="engagement-block"
					v-if="tabs[current] == 'Engagement'"
					:key="t.id"
					v-for="t in tab"
				>
					<img width="40" class="engagement-img" :src="t.image" alt="" />
					<p class="engagement-title">
						{{ t.first_name }} zoekt een
						<strong>{{ t.skill_alias }}</strong>
					</p>

					<div class="engagement-info">
						<div class="date-wrapper">
							<img
								width="20"
								height="20"
								src="/assets/img/calendar.png"
								alt=""
							/>

							<p class="engagement-text">{{ t.date }}</p>
						</div>
						<div class="location-wrapper">
							<img
								width="20"
								height="20"
								src="/assets/img/location.svg"
								alt=""
							/>

							<p class="engagement-text">{{ t.location }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "Search",
		components: {},

		data() {
			return {
				current: 0,
				tabs: ["Talent", "Materiaal", "Engagement", "Jeugdhuis"],
				isActive: true,
				search: "",
				timeout: null,
				tab: {},
				loading: true,
				found: true,
				slug: "",
			};
		},

		created() {
			this.checkCurrentTab();
		},

		currentTab() {
			return this.tabs[this.current].toLowerCase();
		},

		methods: {
			checkCurrentTab() {
				let slug = "";
				const tab = this.tabs[this.current].toLowerCase();
				switch (tab) {
					case "talent":
						slug = "users";
						this.slug = slug;
						this.search = "";
						this.makeSearch();
						break;
					case "materiaal":
						console.log("Materiaal");
						break;
					case "engagement":
						slug = "ads";
						this.slug = slug;
						this.search = "";
						this.makeSearch();
						break;
					case "jeugdhuis":
						slug = "youth_centers";
						this.slug = slug;
						this.search = "";
						this.makeSearch();
						break;
					default:
						slug = "users";
						this.slug = slug;
						this.search = "";
						this.makeSearch();
				}
			},

			onSearch() {
				clearTimeout(this.timeout);
				this.timeout = setTimeout(() => {
					this.makeSearch();
				}, 500);
			},

			searchOnTab() {
				if (this.currentTab) {
					console.log(this.tabs[current]);
					this.makeSearch();
				}
			},
			makeSearch() {
				this.found = true;
				const url = `http://api.kollapp.test/api/${this.slug}/${this.search}`;
				console.log(url);
				fetch(url)
					.then((response) => response.json())
					.then((result) => {
						// this.$emit("youth-centers-fetched", result);
						// console.log(`${this.slug} fetched`, result);
						this.loading = false;
						this.tab = result;

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

	.search-select_wrapper {
		display: flex;
		width: 100%;
		justify-content: space-around;
		border-bottom: solid 0.2rem #D3FFFF;
		position: relative;
		z-index: 1;
		margin-top: 0.5rem;
	}
	.search-select_text {
		font-family: "Poppins", sans-serif;
		font-size: 0.9rem;
		margin-bottom: -0.25rem;
		z-index: 2;
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
		font-weight: 400;
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
	.input {
		display: flex;
		align-items: center;
		justify-content: space-around;
		margin-top: 1rem;
	}

	.input-field_wrapper {
		display: flex;
		border-bottom: 0.15rem #979797 solid;
		width: 80%;
	}

	.input-field {
		border: none;
		width: 100%;
		padding: 10px 30px;
		background-color: transparent;
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

	.content-img {
		width: 2rem;
		height: 3rem;
		border-radius: 50%;
	}

	.engagement-block {
		display: grid;
		grid-template-columns: 0.5rem 0.3fr 1fr 0.5rem;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 95%;
		height: fit-content;
		margin: 0 auto;
		margin-top: 1rem;
		font-family: "Poppins", sans-serif;
	}

	.engagement-title {
		font-size: 1.2rem;
		grid-column: 3;
		grid-row: 1;
		margin: 0;
	}

	.engagement-img {
		width: 3rem;
		height: 3rem;
		border-radius: 50%;
		grid-row: 1;
		grid-column: 2;
		align-self: center;
		justify-self: center;
		margin: 0;
	}

	.engagement-info {
		grid-row: 2;
		grid-column: 3;
		display: flex;
		flex-direction: column;
		margin: 0;
	}

	.date-wrapper {
		display: flex;
		align-items: center;
	}

	.location-wrapper {
		display: flex;
		align-items: center;
	}

	.engagement-text {
		margin: 0.2rem;
	}

	strong {
		color: #8ce4e3;
	}

	input:focus,
	textarea:focus,
	select:focus {
		outline: none;
	}
</style>