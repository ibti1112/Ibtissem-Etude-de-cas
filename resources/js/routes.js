
//import Accueil from './components/accueil.vue';

//import Viewsalle from "./components/salles/ViewSalle.vue";
import Viewsalle from "./components/salle/Viewsalle.vue"
import AddSalle from "./components/salle/AddSalle.vue";
import Editsalle from "./components/salle/Editsalle.vue";
import addSpectacle from "./components/salle/addSpectacle.vue";
import Viewspectacle from "./components/salle/Viewspectacle.vue";
export const routes = [
    {path: '/api/salles' , component:Viewsalle},

{
    name:"Viewsalle",
    path:"/salles",
    component:Viewsalle
    },
   {
    name:"AddSalle",
    path:"/listart",
    component:AddSalle
    },

    {
        name:"Editsalle",
        path:"/editSalle/:id",
        component:Editsalle
        },
        {
            name:"addSpectacle",
            path:"/addSpectacle",
            component:addSpectacle
            },
            {
                name:"Viewspectacle",
                path:"/Viewspectacle",
                component:Viewspectacle
                }
];

