const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
//require('bootstrap');

require('../css/app.scss');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

import {MDCTextField} from '@material/textfield';
import {MDCSelect} from '@material/select';

if(document.querySelector('.homedist')) {
    const homedist = new MDCSelect(document.querySelector('.homedist'));
    const workdist = new MDCSelect(document.querySelector('.workdist'));
}
if(document.querySelector('.username')){
    const username = new MDCTextField(document.querySelector('.username'));
    const age = new MDCTextField(document.querySelector('.age'));
    const phone = new MDCTextField(document.querySelector('.phone'));
    const routeDesc = new MDCTextField(document.querySelector('.route-desc'));
    const timeDesc = new MDCTextField(document.querySelector('.time-desc'));
    const origin = new MDCTextField(document.querySelector('.origin'));
    const dest = new MDCTextField(document.querySelector('.destination'));
}

if(document.querySelector('.quick')){
    const quickOrigin = new MDCTextField(document.querySelector('.origin'));
    const quickDest = new MDCTextField(document.querySelector('.destination'));
}

