<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Registrasi AJAX</title>

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery Validation -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 400px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    label.error {
      color: red;
      font-size: 0.9em;
      margin-top: 5px;
    }
  </style>
</head>
<body>

<div class="register-box">
  <h4 class="text-center mb-4">Form Registrasi</h4>
  <form id="registerForm">
    <div class="form-group">
      <label for="fullname">Nama Lengkap</label>
      <input type="text" class="form-control" id="fullname" name="fullname">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
      <label for="password">Kata Sandi</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
      <label for="confirm_password">Konfirmasi Kata Sandi</label>
      <input type="password" class="form-control" id="confirm_password" name="confirm_password">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
  </form>
</div>

<script>
  $(document).ready(function () {
    $('#registerForm').validate({
      rules: {
        fullname: "required",
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6
        },
        confirm_password: {
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        fullname: "Nama wajib diisi",
        email: {
          required: "Email wajib diisi",
          email: "Format email tidak valid"
        },
        password: {
          required: "Password wajib diisi",
          minlength: "Password minimal 6 karakter"
        },
        confirm_password: {
          required: "Konfirmasi password wajib diisi",
          equalTo: "Password tidak cocok"
        }
      },
      submitHandler: function (form) {
        $.ajax({
          url: 'register.php',
          type: 'POST',
          data: $(form).serialize(),
          success: function (response) {
            let res = JSON.parse(response);
            if (res.status === 'success') {
              Swal.fire('Berhasil!', res.message, 'success');
              form.reset();
            } else {
              Swal.fire('Gagal!', res.message, 'error');
            }
          },
          error: function () {
            Swal.fire('Error!', 'Gagal terhubung ke server.', 'error');
          }
        });
        return false;
      }
    });
  });
</script>

</body>
</html>
<?php
// Respon sukses
echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil!']);
?>
