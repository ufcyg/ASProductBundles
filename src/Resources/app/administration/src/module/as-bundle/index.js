Shopware.Module.register('as-bundle', {
    color: '#ff3d58',
    icon: 'default-shopping-paper-bag-product',
    title: 'Bundles',
    description: 'Manage bundles here.',

    routes: {
        list: {
            component: 'as-bundle-list',
            path: 'list'
        },
        detail: {
            component: 'as-bundle-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'as.bundle.list'
            }
        },
        create: {
            component: 'as-bundle-create',
            path: 'create',
            meta: {
                parentPath: 'as.bundle.list'
            }
        },
    },

    navigation: [{
        label: 'Bundle',
        color: '#ff3d58',
        path: 'as.bundle.list',
        icon: 'default-shopping-paper-bag-product',
        position: 100
    }]
});