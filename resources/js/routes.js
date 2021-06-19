

let Login = require('./components/auth/Login.vue').default;
// let Register = require("./components/auth/Register.vue").default;
let Forget = require("./components/auth/Forget.vue").default;
// let logout = require("./components/auth/logout.vue").default;

let Home = require("./components/Home.vue").default;





export const routes = [
           { path: "/", component: Login, name: "/" },
           //    { path: "/register", component: Register, name: "register" }
           { path: "/forget", component: Forget, name: "Forget" },
           { path: "/home", component: Home, name: "Home" }
       ];
