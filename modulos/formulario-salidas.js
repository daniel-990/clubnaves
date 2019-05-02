import { functionData } from '../configjs/utils.js';

const { urlsocios, urlbarcos, urlsalidasdata } = functionData.serverurl;
const { barcos, patrones, tabla, patron, patronid, socios, sociosid, idsocio, modaltabla } = functionData.objs;


export const salidas = () => {
    fetch(urlbarcos)
        .then(function (res) {
            return res.json();
        })
        .then(function (data) {
            data.map((items) => {
                let html = `
                    <option class="optionid" value="${items.numerodematricula}" socioid="${items.socio_id}">${items.nombre} - ${items.numerodematricula}</option>
                `;
                barcos.append(html);
            })
            const selectSocioid = () => {
                var valorOption = $('.optionid:selected', this).attr('socioid');
                sociosid.val(valorOption);
            }
            patronid.on('change', selectSocioid);
        })

    fetch(urlsocios)
        .then(function (res) {
            return res.json();
        })
        .then(function (data) {
            data.map((items) => {
                let html = `
                    <option class="option" value="${items.numerodedocumento}" ide="${items.id_socio}" socio="${items.socio}">${items.nombre} - ${items.numerodedocumento}</option>
                `;
                patrones.append(html);
            })

            const selectSocio = () => {
                var valorOption = $('.option:selected', this).attr('socio');
                socios.val(valorOption);
            }
            patron.on('change', selectSocio);

            const selectIdsocio = () => {
                var idsocio_ = $('.option:selected', this).attr('ide');
                idsocio.val(idsocio_);
            }
            patron.on('change', selectIdsocio);
            
        })

    fetch(urlsalidasdata)
        .then(function (res) {
            return res.json();
        })
        .then(function (data) {
            console.log(data);
            data.map((items) => {
                let html = `
                    <tr>
                        <td>${items.barco}</td>
                        <td>${items.patron}</td>
                        <td>${items.destino}</td>
                        <td>${items.fechaout}</td>
                        <td>${items.fechain}</td>
                        <div id="contenedor-socio"></div>
                    </tr>
                `;
                tabla.append(html);

                if(items.socio == 'si'){
                    $("#contenedor-socio").append(`
                        <td><span datasocio="${items.socio}" class="clase-${items.socio}"><i class="far fa-check-square" data-socio="${items.socio}"></i></span></td>
                    `)
                }else{
                    $("#contenedor-socio").append(`
                        <td><span datasocio="${items.socio}" class="clase-${items.socio}"><i class="far fa-window-close" data-socio="${items.socio}"></i></span></td>
                    `)
                }
            })
        })
}