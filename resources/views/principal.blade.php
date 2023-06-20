<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conexion api</title>
    <link href="{{ asset('bootstrap-5.3.0-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('guardar')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correos">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                
                <div class="mb-3">
                    <label for="formFile" class="form-label">Cargar documento</label>
                    <input class="form-control" type="file" id="docs" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </form>
        </div>
      </div>
       
      
      <script type="text/javascript">
        window.mifiel.widget({
          widgetId: 'c8aa73d1-db06-4d18-9f56-196b00f6eb69',
          appendTo: 'id-of-the-element-to-append',
          successBtnText: 'Proceed to next step',
          onSuccess: {
            // here the code you want to execute after the signer successfully sign and click the button could be an url  'mifiel.com' or a function() {}
            callToAction: function() {
              alert('documento firmado');
            },
          }
          onError: {
            // here the code you want to execute after an error occurs, could be an url  'mifiel.com' or a function() {}
            callToAction: 'https://www.mifiel.com',
          },
        });
      </script>
      
      
      
    <script src="{{ URL::asset('bootstrap-5.3.0-dist/js/bootstrap.min.js')}}" type="text/javascript"></script>   
</body>
</html>