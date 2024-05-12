import Dropzone from "dropzone"

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube o arrastra tu imagen',
  acceptedFiles: '.png,.jpg,.jpeg,.gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Borrar archivo', 
  maxFiles: 1,
  updloadMultiple: false,
  
  init: function() {
    // seleccionar el nombre de la imagen en el input 
    if(document.querySelector('[name="imagen"').value.trim()){
      // se entra aqui solo si hay un archivo previomente subido (un name asignado)
      const imagenPublicada = {}
      // el tamaño no importa mucho pero es necesario ponerlo, por eso ponemos 1234
      imagenPublicada.size = 1234
      // asignamos el nombre de la imagen publicada
      imagenPublicada.name =
        document.querySelector('[name="imagen"]').value
      
      // apartir de aqui usamos clases de dropzone
      // utilizamos call porque lo que queremos es que cuando se inicie esta función de init se mande a llamar a esto
      // le pasamos la imagen publicada
      this.options.addedfile.call(this, imagenPublicada)
      
      // le pasamos la ubicación donde se almacena la imagen
      this.options.thumbnail.call(
        this, 
        imagenPublicada, 
        `/uploads/${imagenPublicada.name}`
      )
      
      // esto asgina las clases que queremos que tenga la imagen a publicar
      // dz-success y dz-complete son clases de dropzone
      imagenPublicada.previewElement.classList.add(
        "dz-success", 
        "dz-complete"
      )

    }
  }
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

// reseteamos el input hidden al remover la imagen
dropzone.on('removedfile', function () {
  document.querySelector('[name="imagen"]').value = ""
})