import StartPage from "../components/pages/StartPage";
import Conference from "../components/pages/Conference";

require('../plugins/font-awesome.min.js');

const LaurelChat = {
    routes: [
        {
            path: '/',
            component: StartPage,

        },
        {
            path: '/conference/:userId',
            component: Conference,
            meta : {
                hasAppBar : true
            }
        },
    ]
}

export default LaurelChat;
