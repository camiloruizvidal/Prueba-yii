export default [
	{ path: '/', redirect: '/productos' },
	{ path: '/productos', component: () => import('../pages/Index.vue') },
	{ path: '/productos/crear', component: () => import('../pages/Create.vue') },
	{ path: '/productos/editar/:id', component: () => import('../pages/Edit.vue') },
	{ path: '/productos/ver/:id', component: () => import('../pages/Show.vue') }
]
