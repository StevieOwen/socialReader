let book_id=localStorage.getItem("bookId");
let book_path=localStorage.getItem("book");

let customer_name=localStorage.getItem('customer_name');
let customer_id=localStorage.getItem('customer_id');
let token=localStorage.getItem('token');
if(!token){
    window.location.href="/login";
}


// Render the pdf to the user

const pdfPreview = document.getElementById('pdf-preview');
const container = document.getElementById('pdf-viewer-container');

// 3. Update the src and make the container visible
pdfPreview.setAttribute('src',book_path );
container.classList.remove('hidden');


// let pdfDoc = null;
// let totalPages = 0;

// const container = document.getElementById("pdf-container");
// const readerMain = document.querySelector(".reader-main");
// const pageLabel = document.getElementById("page_level");
// const progressBar = document.querySelector(".progress-bar div");


// const url=`/storage/${book_path}`
// pdfjsLib.GlobalWorkerOptions.workerSrc =
//     "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";
// // Load PDF
// pdfjsLib.getDocument(url).promise.then(pdf => {
//     pdfDoc = pdf;
//     totalPages = pdf.numPages;

//     // Set initial label
//     pageLabel.innerText = `Page 1 / ${totalPages}`;

//     renderAllPages();
// });

// // Render all pages
// async function renderAllPages() {
//     for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
//         const page = await pdfDoc.getPage(pageNum);

//         const canvas = document.createElement("canvas");
//         const context = canvas.getContext("2d");

//         // 👇 Scale to container width
//         const containerWidth = container.clientWidth;
//         const viewport = page.getViewport({ scale: 1 });

//         const scale = containerWidth / viewport.width;
//         const scaledViewport = page.getViewport({ scale });

//         canvas.width = scaledViewport.width;
//         canvas.height = scaledViewport.height;

//         canvas.style.display = "block";
//         canvas.style.margin = "0 auto 20px";
//         canvas.style.maxWidth = "100%";

//         container.appendChild(canvas);

//         await page.render({
//             canvasContext: context,
//             viewport: scaledViewport
//         }).promise;
//     }

//     // After rendering → enable scroll tracking
//     setupScrollTracking();
// }

// // Scroll tracking
// const pdfContainer = document.getElementById("pdf-container");
// const pageLevel = document.getElementById("page_level");


// function updateProgress() {
//     const pages = document.querySelectorAll(".pdf-page");
//     let current = 1;

//     pages.forEach((page, index) => {
//         const rect = page.getBoundingClientRect();

//         if (rect.top <= window.innerHeight / 2) {
//             current = index + 1;
//         }
//     });

//     const progress = current / pdfDoc.numPages;

//     pageLevel.textContent = `Page ${current} / ${pdfDoc.numPages}`;
//     progressBar.style.width = `${progress * 100}%`;
// }

// // Listen to scroll
// pdfContainer.addEventListener("scroll", updateProgress);




