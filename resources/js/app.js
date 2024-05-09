import Dropzone from "dropzone"

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube o arrastra tu imagen',
  acceptedFiles: '.png,.jpg,.jpeg,.gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Borrar archivo', 
  maxFiles: 1,
  updloadMultiple: false, 
});

// dropzone.on('sending', function(file, xhr, formData){
//   console.log(file)
// })

dropzone.on('success', function (file, response) {
  // console.log(response.imagen)
  // asignar el nombre de la imagen al input hidden, funcionalidad para mostrar el error
  document.querySelector('[name="imagen"]').value = response.imagen
})

// dropzone.on('error', function (file, message) {
//   console.log(message)
// })

dropzone.on('removedfile', function () {
  console.log('Archivo eliminado')
})