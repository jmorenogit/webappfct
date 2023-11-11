//******************************* GENERAR PDF  ************************************//
document.addEventListener("DOMContentLoaded", () =>{
  const $boton = document.querySelector("#btnCrearPdf");
  $boton.addEventListener("click", () =>{
      const $elementoParaConvertir = document.querySelector('.contentToPdf');
      html2pdf()
      .set({
        margin: 1,
        filename: 'documento.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 3,
          letterRendering: true,
        },
        jsPDF: {
          unit: "cm",
          format: "a4",
          orientation: 'landscape' // portrait
        }
      })
      .from($elementoParaConvertir)
      .save()
      .catch(err => console.log(err));
  });
});