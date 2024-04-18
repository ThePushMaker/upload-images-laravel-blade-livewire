import Dropzone from "dropzone"

Dropzone.autoDiscover = false

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube o arrastra tu imagen', // Mensaje por defecto, por defecto esta en inglés, entonces tenemos que cambiarlo a español
  acceptedFiles: '.png, .jpg, .jpeg, .gif', // Tipos de archivos aceptados
  addRemoveLinks: true, // Permite quitar el archivo
  dictRemoveFile: 'Borrar archivo', // Texto para borrar archivo
  maxFiles: 1, // Cantidad maxima de archivos
  updloadMultiple: false, // Cantidad maxima de archivos
})