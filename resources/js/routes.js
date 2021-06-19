

let Login = require('./components/auth/Login.vue').default;
// let Register = require("./components/auth/Register.vue").default;
let Forget = require("./components/auth/Forget.vue").default;
let Logout = require("./components/auth/Logout.vue").default;

let Home = require("./components/Home.vue").default;

// Students component
let addStudent = require("./components/student/Create.vue").default;
let allStudent = require("./components/student/Index.vue").default;





export const routes = [
           { path: "/", component: Login, name: "/" },
           { path: "/forget", component: Forget, name: "Forget" },
           { path: "/logout", component: Logout, name: "Logout" },
           { path: "/home", component: Home, name: "Home" },
           
           // Students Routes
           { path: "/add-student", component: addStudent, name: "add-student" },
           { path: "/students", component: allStudent, name: "students" }
       ];
