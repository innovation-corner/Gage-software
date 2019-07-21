import ExampleComponent from './components/ExampleComponent';
import AdminHomeComponent from "./components/AdminHomeComponent";

//  Define some routes
const routes = [
    {path: '/admin', component: AdminHomeComponent},
    {path: '/admin/home', component: AdminHomeComponent},
    {path: '/admin/example', component: ExampleComponent},
];


export default routes;
