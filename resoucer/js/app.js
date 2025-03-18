// import {initializeMasks} from './helpers/maskUtils';
// import DateHelper from './helpers/dateHelper';
//
// window.DateHelper = DateHelper;
//
// document.addEventListener('DOMContentLoaded', () => {
//     initializeMasks();
// });
//
// window.loadModule = function (moduleName) {
//     if (moduleName === 'client') {
//         import('./modules/client.js')
//             .then((module) => {
//                 module.init();
//             })
//             .catch((error) => console.error(`Erro ao carregar o módulo ${moduleName}:`, error));
//     } else if (moduleName === 'user') {
//         import('./modules/user.js')
//             .then((module) => {
//                 module.init();
//             })
//             .catch((error) => console.error(`Erro ao carregar o módulo ${moduleName}:`, error));
//     } else if (moduleName === 'invoice') {
//         import('./modules/invoice.js')
//             .then((module) => {
//                 module.init();
//             })
//             .catch((error) => console.error(`Erro ao carregar o módulo ${moduleName}:`, error));
//     } else {
//         console.warn(`Nenhum módulo correspondente ao nome "${moduleName}" foi encontrado.`);
//     }
// };
//
// export default {
//     loadModule,
// };

import './bootstrap';
