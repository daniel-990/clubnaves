import { functionData } from '../configjs/utils.js';

const { urlsalidas } = functionData.serverurl;
const { barcos, patrones, destino, enviarsalida, fechaout, fechain, socios, idsocio, sociosid } = functionData.objs;

export const tablaData = () => {

    const generarSalidas = (event) => {
        // event.preventDefault();
        if (barcos.val() == '' || destino.val() == '' || fechain.value == '' || fechaout.value == '' || sociosid.val() == '' || socios.val() == '') {
            alert("Datos sin llenar");
        } else {
            $.ajax({
                type: "POST",
                url: urlsalidas,
                data: {
                    barco: barcos.val(),
                    destino: destino.val(),
                    patron: patrones.val(),
                    fechaout: fechaout.value,
                    fechain: fechain.value,
                    socio: socios.val(),
                    sociosid: sociosid.val(),
                    idsocios: idsocio.val()
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

    }

    enviarsalida.on('click', generarSalidas);
}