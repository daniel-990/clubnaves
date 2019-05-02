//utils

export const functionData = {
    "serverurl": {
        urlsocios: "./server/mostrardatos/mostrarsocios.php",
        urlbarcos: "./server/mostrardatos/mostrarbarcos.php",
        urlsalidasdata: "./server/mostrardatos/mostrarsalidas.php",
        urlsalidas: "./server/enviarsalidas.php"
    },
    "objs": {
        barcos: $("#barco"),
        patrones: $("#patron"),
        patron: $("select.patron"),
        patronid: $("select.patronid"),
        destino: $("#destino"),
        fechaout: document.getElementById("fecha-salida"),
        fechain: document.getElementById("fecha-llegada"),
        enviarsalida: $("#btn-enviar"),
        tabla: $("#tabla"),
        socios: $("#socio"),
        sociosid: $("#socioid"),
        idsocio: $("#idsocio"),
        modaltabla: $("#modal-tabla")
    },
    mostrarInformacion() {
        return this;
    }
}