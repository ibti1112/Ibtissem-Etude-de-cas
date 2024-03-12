
//import Accueil from './components/accueil.vue';

//import editsalles from "./components/salles/editsalles.vue"

import Viewsalle from "./components/salle/ViewSalle.vue";
import AddSalle from "./components/salle/AddSalle.vue";

export const routes = [
/*{
name: 'accueil',
path: '/',
component: Accueil
},*/

{
    name:"ViewSalle",
    path:"/listart",
    component:Viewsalle
    },
    {
    name:"AddSalle",
    path:"/addsalle",
    component:AddSalle
    },

    /*{
        name:"editsalles",
        path:"/editsalles/:id",
        component:editsalles
        }*/
];