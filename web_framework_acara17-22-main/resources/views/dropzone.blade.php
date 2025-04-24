<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
     <title>Dropzone Multiple Upload</title>
 </head>
 
 <body>
 
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="text-center">Dropzone Multiple Image Upload in Laravel</h1>
                 <form action="{{ route('dropzone.store') }}" method="post" class="dropzone" id="image-upload">
                     @csrf
                     <div class="dz-message">
                         <h3 class="text-center">Drag & Drop multiple images here</h3>
                     </div>
                 </form>
                 <button type="button" id="button" class="btn btn-primary mt-3">Upload</button>
             </div>
         </div>
     </div>
 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
         crossorigin="anonymous"></script>
 
     <script type="text/javascript">
         Dropzone.options.imageUpload = {
             url: "{{ route('dropzone.store') }}",
             maxFilesize: 10,
             acceptedFiles: ".jpeg,.jpg,.png,.gif",
             addRemoveLinks: true,
             autoProcessQueue: false,
             init: function () {
                 var myDropzone = this;
 
                 document.getElementById("button").addEventListener("click", function (e) {
                     e.preventDefault();
                     myDropzone.processQueue();
                 });
 
                 this.on("success", function (file, response) {
                     console.log(response.success);
                 });
 
                 this.on("error", function (file, response) {
                     console.log("Error uploading: ", response);
                 });
             }
         };
     </script>
 
 </body>
 
 </html>