import './bootstrap';
import * as bootstrap from 'bootstrap';

//Para el uso de popover (sacado de la documentación oficial de bootstrap 5)
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
