<!DOCTYPE html>
<html>
 <head>
  <title>Tutorial Pakai Jquery Validation dengan Bootstrap 4</title>
 
  <!-- Get Bootstrap CDN in https://www.bootstrapcdn.com/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- load script package jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  <!-- load jquery validation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  <!-- load script package bootstrap.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </head>
  <body>
   <div class="container">
    <div class="row">
     <div class="col-sm-12">
      <form id="form">
       <div class="form-group">
        <label for="fullname">Nama Lengkap</label>
        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Ketikkan Nama Lengkap">
       </div>
       <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Ketikkan Email Anda">
       </div>
       <div class="form-group">
        <label for="fullname">Kontak</label>
        <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Ketikkan Kontak Anda">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
     </form>         
    </div>   
   </div>
  </div>
        
  <script>
    $(document).ready(function(){
      //#register adalah nama id form-nya
      $("#form").validate({
       ignore: [],
       //deklarasikan rules yang ingin di validasi
       //untuk rules selengkapnya bisa dicek di dokumentasi jquery validation ya
			 //https://jqueryvalidation.org/documentation/
       rules: {
               //artinya field dengan attr name=fullname wajib diisi
               fullname: "required",
               //artinya field dengan attr name=kontak wajib diisi berupa angka
               kontak: { 
                         required: true,
                         number: true
                       },
               //artinya field dengan attr name=email wajib diisi
               //dan harus sesuai dengan format email pada umumnya
               email: {
                        required: true,
                        email: true
                      }
               },
       //deklarasi pesan atau alert yang muncul pas value pada field form tidak sesuai rules
       messages:{
                 fullname: "Nama Lengkap Harus diisi",
                 kontak: {
                           required: "Kontak Harus diisi",
                           number: "Kontak hanya boleh diisi dengan angka"
                         },
                 email: {
                           required: "Email Harus diisi",
                           email: "Format Email Tidak Valid"
                        }
       },
       errorElement: "div",
       errorPlacement: function ( error, element ) {
              // Menyisipkan class invalid-feedback di element error
              error.addClass( "invalid-feedback" );
              if ( element.prop( "type" ) === "checkbox" ) {
                   error.insertAfter( element.parent( "label" ) );
              } else {
                   error.insertAfter( element );
              }
        },
        //menyisipkan class is-invalid pada element form yang valuenya error
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        //menyisipkan class is-valid pada element form yang valuenya sudah benar
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
       });
      });
  </script>
 </body>
</html>
