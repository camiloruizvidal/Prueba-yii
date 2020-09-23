export default [
	{ path: '/', component: () => import(/* webpackChunkName: "inicio" */ '../pages/Initial.vue') },
	{ path: '/productos', component: () => import(/* webpackChunkName: "productos" */ '../pages/Index.vue') },
	{ path: '/productos/crear', component: () => import(/* webpackChunkName: "crear-productos" */ '../pages/Create.vue') },
	{ path: '/productos/editar/:id', component: () => import(/* webpackChunkName: "editar-productos" */ '../pages/Edit.vue') },
	{ path: '/productos/ver/:id', component: () => import(/* webpackChunkName: "ver-productos" */ '../pages/Show.vue') }
]
