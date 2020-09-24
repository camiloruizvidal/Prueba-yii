<template>
	<b-card
      header="Editar producto"
      class="mb-2">
      <b-card-text>
	<b-form @submit.prevent="save">

		<input-form :form="form"></input-form>

		<b-form-group>
			<small class="text-danger">
				{{errors}}
			</small>
		</b-form-group>
		<b-form-group>
			<b-button 
				type="submit" 
				variant="danger"
				@click="back"
			>Volver</b-button>
			<b-button 
				type="submit" 
				class="ml-2"
				variant="primary">Guardar</b-button>
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
			validated: false,
			errors: null
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
		save() {

			if(!this.validated) {
				return
			}

			/* Temporal */
			let products = JSON.parse(sessionStorage.getItem('products'))
			
			let index = products.findIndex(res => {
				return res.id == this.id
			})

			if(index > -1) {
				products.splice(index, 1)
			}

			products.push(this.form)
			sessionStorage.setItem('products', JSON.stringify(products))

			/* Temporal */

			// axios.post(config.apipath + '' + id)
			// .then(response => {
				// console.log(response)
			// })
			// .catch(error => {
				// console.log(error)
			// })
			this.$bvToast.toast('Producto Editado correctamente', {
				title: 'Editar Producto',
				variant: 'success',
				solid: true
			})

			this.$router.push('/productos')
		},
		back() {
			this.$router.go(-1)
		}
	},
	beforeRouteEnter (to, from, next) { 
		next(vm => {
			vm.index()
		});
	},
	watch: {
		form: {
			deep: true,
			handler(val) {
				if(val.reference.length > 30) {
					this.errors = 'La referencia no puede pasar de 30 caracteres'
					this.validated = false
				} else {
					this.validated = true
					this.errors = null
				}
			}
		}
	}
	
}
</script>
