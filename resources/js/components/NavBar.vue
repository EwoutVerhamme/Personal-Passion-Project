<template>
	<div class="navigation-wrapper">
		<nav class="navigation">
			<img src="/assets/img/kollapp.svg" alt="" class="logo" />
			<router-link to="/">
				<div  class="menu-item_wrapper">
					<li class="menu-item">Home</li>
					<svg
						class="icon"
						width="43"
						height="39"
						viewBox="0 0 43 39"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M6.44714 19.6174V36.7651H17.448V23.8456H27.5127V37H38.2795V2.93945"
							:stroke="currentColor"
							stroke-width="2.4"
							stroke-miterlimit="10"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
						<path
							d="M2 16.094L22.1293 2L41.3223 15.1544"
							:stroke="currentColor"
							stroke-width="2.4"
							stroke-miterlimit="10"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
				</div>
			</router-link>

			<router-link to="/search">
				<div  class="menu-item_wrapper">
					<li class="menu-item">Zoeken</li>
					<svg
						class="icon"
						width="37"
						height="35"
						viewBox="0 0 37 35"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M0.753094 32.5391L9.31649 24.2443C6.86067 21.3575 5.51125 17.5539 5.89497 13.4467C6.56009 6.32886 12.5461 0.61105 19.9008 0.0473226C29.334 -0.671276 37.1427 6.89259 36.4009 16.0299C35.8189 23.154 29.9096 28.9523 22.5677 29.5966C18.3276 29.9683 14.4008 28.6612 11.4206 26.2824L2.85717 34.5772C2.27519 35.1409 1.33508 35.1409 0.759491 34.5772C0.177513 34.0135 0.177513 33.1028 0.753094 32.5391ZM12.4822 23.2159C17.2659 27.8496 25.0235 27.8496 29.8072 23.2159C34.591 18.5822 34.591 11.0679 29.8072 6.43417C25.0235 1.80045 17.2659 1.80045 12.4822 6.43417C7.69846 11.0679 7.69206 18.5822 12.4822 23.2159Z"
							fill="#7D7D7D"
						/>
					</svg>
				</div>
			</router-link>
			<router-link to="/create">
				<div  class="menu-item_wrapper">
					<li class="menu-item">Zoekertje aanmaken</li>
					<svg
						class="icon"
						width="38"
						height="39"
						viewBox="0 0 38 39"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M18.9501 10.75V28.25"
							stroke="#7D7D7D"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="bevel"
						/>
						<path
							d="M10.1997 19.5H27.6997"
							stroke="#7D7D7D"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="bevel"
						/>
						<circle
							cx="18.9497"
							cy="19.5"
							r="17.5"
							stroke="#7D7D7D"
							stroke-width="2.5"
						/>
					</svg>
				</div>
			</router-link>
			<router-link to="/profile">
				<div  class="menu-item_wrapper">
					<li class="menu-item">Profiel</li>
					<svg
						class="icon"
						width="38"
						height="38"
						viewBox="0 0 38 38"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					>
						<circle
							cx="18.4028"
							cy="11.2031"
							r="9.45312"
							stroke="#7D7D7D"
							stroke-width="2.5"
						/>
						<path
							d="M36.4497 38C36.4497 28.335 28.6147 20.5 18.9497 20.5C9.28472 20.5 1.44971 28.335 1.44971 38"
							stroke="#7D7D7D"
							stroke-width="2.5"
						/>
					</svg>
				</div>
			</router-link>
		</nav>
	</div>
</template>

<script>
	import router from "../router/index";
	export default {
		name: "Home",

		data() {
			return {
				current: 0,
				currentColor: "#FF899E",
			};
		},

		currentTab() {
			console.log(this.current);
		},

		methods: {
			setCurrentColor() {
				console.log(this.current);
			},
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
	.icon > svg {
		width: 2.5rem;
		height: auto;
		fill: #FF899E;
	}

	.active {
		width: 2.5rem;
		height: auto;
	}

	.logo {
		display: none;
	}

	.menu-item {
		display: none;
		color: #7d7d7d;
		font-weight: 300;
	}

	@media screen and (min-width: 768px) {
		.navigation-wrapper {
			border-bottom: 0.1rem solid #f5f5f5;
			width: 100vw;
		}
		.navigation {
			/* max-width: 70vw; */
			top: 0;
			border-radius: 0;
			box-shadow: none;
			background-color: transparent;
		}

		.icon {
			display: none;
		}

		.logo {
			display: inline;
		}

		.menu-item {
			display: inline;
			font-size: 1.2rem;
		}
	}
</style>
