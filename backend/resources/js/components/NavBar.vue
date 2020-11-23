<template>
	<div class="navigation">
		<router-link to="/"
			><svg
				width="43"
				height="39"
				viewBox="0 0 43 39"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M6.44714 19.6174V36.7651H17.448V23.8456H27.5127V37H38.2795V2.93945"
					stroke="#7D7D7D"
					stroke-width="2.4"
					stroke-miterlimit="10"
					stroke-linecap="round"
					stroke-linejoin="round"
				/>
				<path
					d="M20.2373 31.6561C20.8837 31.6561 21.4076 31.1303 21.4076 30.4816C21.4076 29.833 20.8837 29.3071 20.2373 29.3071C19.591 29.3071 19.067 29.833 19.067 30.4816C19.067 31.1303 19.591 31.6561 20.2373 31.6561Z"
					fill="#7D7D7D"
					stroke="#7D7D7D"
				/>
				<path
					d="M2 16.094L22.1293 2L41.3223 15.1544"
					stroke="#7D7D7D"
					stroke-width="2.4"
					stroke-miterlimit="10"
					stroke-linecap="round"
					stroke-linejoin="round"
				/>
			</svg>
		</router-link>

		<router-link to="/search"
			><svg
				width="37"
				height="35"
				viewBox="0 0 37 35"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M1.30339 32.5391L9.86678 24.2443C7.41096 21.3575 6.06154 17.5539 6.44526 13.4467C7.11038 6.32886 13.0964 0.611051 20.4511 0.0473226C29.8843 -0.671276 37.693 6.89259 36.9511 16.0299C36.3692 23.154 30.4599 28.9523 23.118 29.5966C18.8778 29.9683 14.9511 28.6612 11.9709 26.2824L3.40746 34.5772C2.82548 35.1409 1.88537 35.1409 1.30978 34.5772C0.727806 34.0135 0.727805 33.1028 1.30339 32.5391ZM13.0325 23.2159C17.8162 27.8496 25.5738 27.8496 30.3575 23.2159C35.1413 18.5822 35.1413 11.0679 30.3575 6.43417C25.5738 1.80045 17.8162 1.80045 13.0325 6.43417C8.24875 11.0679 8.24236 18.5822 13.0325 23.2159Z"
					fill="#7D7D7D"
				/>
			</svg>
		</router-link>
		<router-link to="/register"
			><svg
				width="39"
				height="39"
				viewBox="0 0 39 39"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M19.5004 10.75V28.25"
					stroke="#7D7D7D"
					stroke-width="2.5"
					stroke-linecap="round"
					stroke-linejoin="bevel"
				/>
				<path
					d="M10.75 19.5H28.25"
					stroke="#7D7D7D"
					stroke-width="2.5"
					stroke-linecap="round"
					stroke-linejoin="bevel"
				/>
				<circle
					cx="19.5"
					cy="19.5"
					r="17.5"
					stroke="#7D7D7D"
					stroke-width="2.5"
				/>
			</svg>
		</router-link>
		<router-link to="/profile"
			><svg
				width="39"
				height="38"
				viewBox="0 0 39 38"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<circle
					cx="18.9531"
					cy="11.2031"
					r="9.45312"
					stroke="#7D7D7D"
					stroke-width="2.5"
				/>
				<path
					d="M37 38C37 28.335 29.165 20.5 19.5 20.5C9.83502 20.5 2 28.335 2 38"
					stroke="#7D7D7D"
					stroke-width="2.5"
				/>
			</svg>
		</router-link>
	</div>
</template>

<script>
	export default {
		name: "Home",
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
