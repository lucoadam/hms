import Vue  from 'vue';
import Router from 'vue-router';
import generalRoutes from './general'
import adminRoutes from './admin'
Vue.use(Router)

const router = new Router({
    routes: [
        ...generalRoutes,
        ...adminRoutes,
    ]
})

router.beforeEach((to, from, next) => {
    console.log(to.meta)
    // if (to.meta.middleware && to.meta.middleware.includes('changepassword')) {
    //     return changepassword(next)
    // }

    next()
})


export default router
