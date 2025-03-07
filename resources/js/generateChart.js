const { ChartJSNodeCanvas } = require('chartjs-node-canvas');

// Obtener los datos de la gráfica desde los argumentos de la línea de comandos
const data = JSON.parse(process.argv[2]);

// Configuración de la gráfica
const width = 800;
const height = 600;
const chartJSNodeCanvas = new ChartJSNodeCanvas({ width, height });

const configuration = {
    type: 'pie',
    data: {
        labels: data.labels,
        datasets: [{
            label: data.label,
            data: data.values,
            backgroundColor: data.backgroundColor,
        }],
    },
};

// Generar la gráfica y devolverla como una imagen en base64
chartJSNodeCanvas.renderToDataURL(configuration)
    .then((image) => {
        console.log(image); // Imprimir la imagen en base64
    })
    .catch((error) => {
        console.error(error);
        process.exit(1);
    });
