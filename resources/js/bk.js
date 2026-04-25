const pdfjsLib = window['pdfjsLib'];
pdfjsLib.GlobalWorkerOptions.workerSrc =
"https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";



let pdfDoc = null;
let scale = 1.2;
let pages = [];
let totalPages = 0;
const container = document.getElementById("pdf-container");
const containerWidth = container.clientWidth;



pdfjsLib.getDocument(url).promise.then(pdf => {
    totalPages = pdf.numPages;

    document.getElementById("page_level").innerText =
        `Page 1 / ${totalPages}`;

pdfDoc = pdf;
  console.log("container width:", container.clientWidth);
// Render all pages
for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
    renderPage(pageNum, container, containerWidth);
}

function renderPage(num, container, containerWidth) {

    pdfDoc.getPage(num).then(function (page) {

        const viewport = page.getViewport({ scale: 1 });

        const scale = (containerWidth / viewport.width) * 0.8;

        const scaledViewport = page.getViewport({ scale });

        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        canvas.width = scaledViewport.width;
        canvas.height = scaledViewport.height;

        container.appendChild(canvas);

        page.render({
            canvasContext: context,
            viewport: scaledViewport
        });
    });
}
})

const contain = document.querySelector('.reader-canvas');
const pageLabel = document.getElementById('page_level');
const progressFill = document.getElementById('progress_fill');

const canvases = document.querySelectorAll("#pdf-container canvas");

function updateCurrentPage() {
    let currentPage = 1;

    canvases.forEach((canvas, index) => {
        const rect = canvas.getBoundingClientRect();

        if (rect.top <= window.innerHeight / 2) {
            currentPage = index + 1;
        }
    });

    document.getElementById("page_level").innerText =
        `Page ${currentPage} / ${totalPages}`;
}
