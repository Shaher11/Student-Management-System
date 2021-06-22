let Login = require("./components/auth/Login.vue").default;
// let Register = require("./components/auth/Register.vue").default;
let Forget = require("./components/auth/Forget.vue").default;
let Logout = require("./components/auth/Logout.vue").default;

let Home = require("./components/Home.vue").default;

// Students component
let allStudents = require("./components/student/Index.vue").default;
let addStudent = require("./components/student/Create.vue").default;
let editStudent = require("./components/student/Edit.vue").default;
let showStudent = require("./components/student/Show.vue").default;
// let addStudentCourse = require("./components/student/Addcourse.vue").default;

// Courses component
let allCourses = require("./components/course/Index.vue").default;
let addCourse = require("./components/course/Create.vue").default;
let editCourse = require("./components/course/Edit.vue").default;

// Peograms component
let allPrograms = require("./components/program/Index.vue").default;
let addProgram = require("./components/program/Create.vue").default;
let editProgram = require("./components/program/Edit.vue").default;

// Levels component
let allLevels = require("./components/level/Index.vue").default;
let addLevel = require("./components/level/Create.vue").default;
let editLevel = require("./components/level/Edit.vue").default;

export const routes = [
    { path: "/", component: Login, name: "/" },
    { path: "/forget", component: Forget, name: "Forget" },
    { path: "/logout", component: Logout, name: "Logout" },
    { path: "/home", component: Home, name: "Home" },

    // Students Routes
    { path: "/students", component: allStudents, name: "students" },
    { path: "/add-student", component: addStudent, name: "add-student" },
    { path: "/edit-student/:id", component: editStudent, name: "edit-student"},
    { path: "/student-profile/:id", component: showStudent, name: "student-profile"},
    // { path: "/student-course", component: addStudentCourse, name: "add-student-course"},

    // Courses Routes
    { path: "/courses", component: allCourses, name: "courses" },
    { path: "/add-course", component: addCourse, name: "add-course" },
    { path: "/edit-course/:id", component: editCourse, name: "edit-course" },
    
    // Programs Routes
    { path: "/programs", component: allPrograms, name: "programs" },
    { path: "/add-program", component: addProgram, name: "add-program" },
    { path: "/edit-program/:id", component: editProgram, name: "edit-program" },
    
    // Levels Routes
    { path: "/levels", component: allLevels, name: "levels" },
    { path: "/add-level", component: addLevel, name: "add-level" },
    { path: "/edit-level/:id", component: editLevel, name: "edit-level" },
];
