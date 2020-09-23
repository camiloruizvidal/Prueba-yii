<template>
	<b-card
      header="Listado de Productos"
      class="mb-2">
      <b-card-text>
		<b-row>
			<b-col md="3" sm="12" lg="3" class="mt-1 mb-2">
				<b-button 
					size="md"
					variant="success"
					class="ml-2" 
					title="Editar"
					@click.stop="create_product"
					>
					Crear Producto
				</b-button>
			</b-col>
		</b-row>
		<b-row class="justify-content-md-end">
			<b-col md="3" sm="12" lg="3" class="mt-1 mb-2">
				<b-form-input
					placeholder="Buscar"
					type="text" 
					v-model="filter"
				></b-form-input>
			</b-col>
		</b-row>
		<b-row>
			<b-table 
				striped 
				hover
				responsive  
				:items="items" 
				:fields="fields"
				:busy="loading"
				:per-page="perPage"
				:current-page="currentPage"
				:filter="filter"
				@filtered="onFiltered"
				show-empty>
				<template v-slot:table-busy>
					<div class="text-center">
						<span class="fa fa-spinner fa-pulse fa-2x"></span>
						<div>
							<h5>Cargando...</h5>
						</div>
					</div>
				</template>
			<template v-slot:empty>
				<div class="text-center">
					<h5>No hay datos</h5>
				</div>
			</template>
			<template v-slot:cell(#)="row">
			{{row.index + 1}}
			</template>

			<template v-slot:cell(opciones)="row">
			<b-button 
			size="sm"
			variant="primary"
			class="ml-2" 
			title="Ver"
			@click.stop="show(row.item.id)"
			>
				Ver
			</b-button>
			<b-button 
			size="sm"
			variant="warning"
			class="ml-2" 
			title="Editar"
			@click.stop="edit(row.item.id)"
			>
				Editar
			</b-button>
			<b-button 
			size="sm"
			variant="danger"
			class="ml-2" 
			title="eliminar"
			@click.stop="del(row.item.id)"
			>
				Eliminar
			</b-button>
			</template>
			</b-table>
			
		</b-row>
		<b-row>
			<div v-if="items.length" class="text-center">
				<pagination 
					:totalRows="totalRows"
					:currentPage.sync="currentPage"
					:perPage.sync="perPage"
				/>
			</div>
		</b-row>
	</b-card-text>
	<delete v-if="productId != null" :productId="productId" />
</b-card>
</template>
<script>
// import axios from "axios"
// import * as config from '../config'
import EventBus from "../module/EventBus"

export default {
	components: {
		pagination: ()=>import('../components/Pagination'),
		delete: ()=>import('./Delete')
	},
	data() {
		return {
			items: [],
			fields: [
				'#',
				{ key: 'reference', label: 'Referencia', sortable: true },
				{ key: 'stock', label: 'Cantidad', sortable: true },
				{ key: 'currency', label: 'Moneda', sortable: true },
				{ key: 'price', label: 'Precio', sortable: true },
				'Opciones'
			],
			currentPage: 1,
			perPage: 10,
			loading: false,
			filter: null,
			totalRows: 0,
			productId: null
		}
	},
	methods: {
		index() {
			let products = sessionStorage.getItem('products');

			this.items = JSON.parse(products);
			this.totalRows = this.items.length
		},
		create_product() {
            this.$router.push('/productos/crear')
		},
		show(id) {
            this.$router.push('/productos/ver/' + id)
		},
		edit(id) {
            this.$router.push('/productos/editar/' + id)
		},
		del(id) {
			this.$root.$emit('bv::show::modal', 'delete-modal');
			this.productId = id
		},
		onFiltered(filteredItems) {
			this.totalRows = filteredItems.length
			this.currentPage = 1
		},
	},
	mounted() {
		let me = this
		me.index()

		EventBus.$on('getProducts', function () {
            me.index()
        })
	}
	
}
</script>
