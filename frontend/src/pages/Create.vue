<template>
	<b-card
		header="Crear nuevo producto"
		class="mb-2">
		<b-card-text>
			<b-form @submit.prevent="save">
				<input-form :form="form" ></input-form>
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
	import axios from "axios"
	import * as config from '../config'
	export default {
		components: {
			'input-form': () => import('../components/Form')
		},
		data() {
			return {
				form: {
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
			save() {
	
				if(!this.validated) {
					return
				}
	
				axios.post(config.apipath + 'tblproductos/create',this.form)
				.then(response => {
					if(response.data.validate)
					{
						this.$bvToast.toast('Producto Creado correctamente', {
							title: 'Crear Producto',
							variant: 'success',
							solid: true
						})
					}
				})
				.catch(error => {
				})
				this.$router.push('/productos')
			},
			back() {
				this.$router.go(-1)
			}
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