<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone PDF Upload in Laravel</h1><br>
                <form action="{{ route('pdf.store') }}" method="post" name="file" enctype="multipart/form-data" class="dropzone" id="pdf-upload">
                    @csrf
                    <div class="text-center">
                        <h3>Upload PDF Files</h3>
                    </div>
                </form>
                <button type="button" id="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    Dropzone.autoDiscover = false;  // Disable automatic Dropzone discovery

    var myDropzone = new Dropzone('#pdf-upload', {
        maxFilesize: 1,  // Max file size in MB
        acceptedFiles: ".pdf",  // Only accept PDF files
        addRemoveLinks: true,  // Add remove links for files
        autoProcessQueue: false,  // Disable automatic upload
        paramName: "file",  // Name of the file parameter
        init: function() {
            var submitButton = document.querySelector("#button");
            var myDropzone = this;  // Reference to Dropzone instance

            // Trigger file upload when button is clicked
            submitButton.addEventListener("click", function(e) {
                e.preventDefault();  // Prevent default behavior
                if (myDropzone.files.length === 0) {
                    alert("Please select a file before uploading!");
                    return;
                }
                myDropzone.processQueue();  // Start uploading files
            });

            // Handle "sending" event to append form data
            myDropzone.on('sending', function(file, xhr, formData) {
                var data = $('#pdf-upload').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
            });

            // Handle success response
            myDropzone.on("success", function(file, response) {
                alert("File uploaded successfully!");
            });

            // Handle errors
            myDropzone.on("error", function(file, errorMessage) {
                alert("Error uploading file: " + errorMessage);
            });
        }
    });
</script>
</body>
</html>