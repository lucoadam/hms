window.Vue =  require('vue');
window.VueResource = require('vue-resource');
window.Vuetify = require('vuetify');
window.VeeValidate = require('vee-validate');
window.Auth  = require('@websanova/vue-auth')
window.auth  = require('@websanova/vue-auth/drivers/auth/bearer.js')
window.authHttp  = require('@websanova/vue-auth/drivers/http/vue-resource.1.x.js')
window.authRouter  = require('@websanova/vue-auth/drivers/router/vue-router.2.x.js')

import 'vuetify/dist/vuetify.min.css';
import App from './App'
import router from './router'
import Utils from "./utils";
import store from './store/index'
import  Mixins  from  './mixins'
// import Auth from '@websanova/vue-auth';
//
// import auth from '@websanova/vue-auth/drivers/auth/bearer.js'
//
// import authHttp from '@websanova/vue-auth/drivers/http/vue-resource.1.x.js'
//
// import authRouter from '@websanova/vue-auth/drivers/router/vue-router.2.x.js'
//
window.Bus = new Vue();
Vue.prototype.$bus = Bus;
Vue.router=router
Vue.use(Vuetify)
Vue.use(VueResource)
Vue.use(VeeValidate)
Vue.use(Auth,{
    auth:auth,
    http:authHttp,
    router:authRouter,
    parseUserData: (data) => {

        Utils.sleep(100).then(() => {
            console.log('user',data)
            console.log(Bus);
            Bus.$emit('user.fetched', data)
        });
        return data;
    },
    refreshData: {
        url: '/api/auth/refresh',
        method: 'GET',
        enabled: true,
        interval: 40,
        error: (err) => {
            Bus.$emit('error.on.refresh', err)
        }
    },
    impersonateData: {
        url: 'v1/auth/impersonate',
        method: 'POST',

    },

    unimpersonateData:  {
        url: 'v1/auth/unimpersonate',
        method: 'POST',
        redirect: '/admin/dashboard',
        makeRequest: false
    },
    rolesVar: 'role',
    tokenStore: ['localStorage', 'cookie'],
});
Vue.http.options.root = window.location.origin+'/api';

Vue.config.productionTip = false;

const app=new  Vue({
    el:'#app',
    vuetify: new Vuetify(),
    template:  '<App/>',
    components: {App},
    router:router,
    store:store

});
