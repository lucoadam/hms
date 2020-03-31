import Login  from './../views/auth/Login'
import Home from './../views/general/Home'

let routes = [
    {
        path:'/login',
        name:'login',
        component:Login
    },
    {
        path:'/',
        name:'home',
        component: Home
    }
];
export default routes;
