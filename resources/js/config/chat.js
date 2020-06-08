import StartPage from "../components/pages/StartPage";
import Conference from "../components/pages/Conference";

require('../plugins/font-awesome.min.js');

const LaurelChat = {
    routes: [
        {
            path: '/',
            name : 'chat.main',
            component: StartPage,
        },
        {
            path: '/conference/:conferenceId',
            name : 'chat.conference',
            component: Conference,
            meta : {
                hasAppBar : true
            }
        },
    ]
}

export default LaurelChat;
