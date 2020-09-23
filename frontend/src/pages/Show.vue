<template>
	<b-card
      header="Detalle de producto"
      class="mb-2">
      <b-card-text>
	<b-form>

		<input-form :form="form" :disabled="disabled"></input-form>

		<b-form-group>
			<b-button 
				type="submit" 
				variant="danger"
				@click.prevent="back"
			>Volver</b-button>
		</b-form-group>
    </b-form>
	</b-card-text>
</b-card>
</template>
<script>
// import axios from "axios"
// import * as config from '../config'

export default {
	components: {
		'input-form': () => import('../components/Form')
	},
	data() {
		return {
			form: {
				id: "",
				reference: "",
				description: "",
				stock: "",
				currency: null,
				price: ""
			},
			disabled: true
		}
	},
	methods: {
		index() {
			this.id = this.$route.params.id

			/* Temporal */

			let products = JSON.parse(sessionStorage.getItem('products'))

			this.form = products.find(p => {
				return p.id == this.id
			})

			/* Temporal */


			// axios.post(config.apipath + '' + this.id)
			// .then(response => {
				// console.log(response)
			// })
			// .catch(error => {
				// console.log(error)
			// })
		},
		back() {
			this.$router.go(-1)
		}
	},
	beforeRouteEnter (to, from, next) { 
		next(vm => {
			vm.index()
		});
	}
}
</script>
