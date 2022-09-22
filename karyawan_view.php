<?php

require("session_controller.php");


if (isset($_POST['submit'])) {
    insertkaryawan();
}
if (isset($_GET['delete'])) {
    foreach(indexrelasi() as $index =>$relasi){
        foreach(indexkaryawan() as $tesindex=>$karyawan){
            if($tesindex==$_GET['delete']){
                if($relasi->kid==$karyawan->kid){
           
                    deleterelasi($index);
                }
            }
        }
        
    }
    deletekaryawan($_GET['delete']);
}
if (isset($_POST['editindex'])) {
    editkaryawan($_POST['editindex']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <title>Document</title>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="karyawan_view.php" class="asia">
                <h1 style=font-size:50px><span style="color:#dc3545">Daftar</span><em>Yawan</em></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupported" aria-controls="navbarSupported" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupported">

                <div class="ms-auto">
                    <ul class=" navbar-nav ms-auto text-center">
                        <li class="nav-item text-center">
                            <a class="nav-link active font-weight-bold text-center" style="margin-top:5px" aria-current="page" href="karyawan_view.php">Daftar Karyawan</a>
                        </li>
                        <li class="nav-item text-center" style="margin-top:5px">
                            <a class="nav-link font-weight-bold text-center" href="kantor_view.php">Daftar Kantor</a>
                        </li>
                        <li class="nav-item text-center" style="margin-top:5px">
                            <a class="nav-link font-weight-bold text-center" href="relasi_view.php">Daftar Relasi Karyawan - Kantor </a>
                        </li>



                    </ul>
                </div>
            </div>
        </div>
    </nav>




    <h1 class="text-center">List Karyawan</h1>
    <table class="table table-dark mt-2 w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Usia</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>



        </thead>
        <tbody>
            <?php
            $a = 0;
            foreach (indexkaryawan() as $index => $karyawan) {
                $a = $a + 1;
                echo "
                <tr>
                    <td>" . $a . "</td>
                    <td>" . $karyawan->nama . "</td>
                    <td>" . $karyawan->jabatan . "</td>
                    <td>" . $karyawan->usia . "</td>                                 
                    <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit  </button>
                    <td><a href='karyawan_view.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></td>
                </tr>
               

                        <div class='modal fade text-dark' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='staticBackdropLabel'>Edit User</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            <form method='POST' action=''>
                            <div class='text-center'>
                                <div class='form-group text-start w-100 d-inline-block'>
                                    <label for='exampleInputEmail1'>Nama</label>
                                    <input type='text' name='nama' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Masukan nama' 
                                    value='" . $karyawan->nama . "' required>
                                </div>
                                <div class='form-group text-start w-100 d-inline-block'>
                                    <label for='exampleInputEmail1'>Jabatan</label>
                                    <input type='text' name='jabatan' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Masukan nama' 
                                    value='" . $karyawan->jabatan . "' required>
                                </div>
                                <div class='form-group text-start w-100 d-inline-block'>
                                    <label for='exampleInputEmail1'>Usia</label>
                                    <input type='text' name='usia' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Masukan nama' 
                                    value='" . $karyawan->usia . "' required>
                                </div>
                                <input type='hidden' name='kid' value='" . $karyawan->kid . "'>
                                <input type='hidden' name='editindex' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Masukan nama' 
                                value='" . $index . "' required>
                            </div>
                        
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button class='d-block w-75 mx-auto btn btn-primary ' name='edit' value='Submit'>Edit</button>
                            </div>
                            </div>
                        </div>
                        </form>
                        </div>
                 
               
                
                ";
            }

            ?>



        </tbody>





    </table>
    <h1 class="text-center mt-2">
        Tambah Karyawan
    </h1>
    <form method="POST" action="karyawan_view.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputName">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Masukkan Nama">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputJabatan">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" id="exampleInputJabatan" aria-describedby="nameJabatan" placeholder="Masukkan Jabatan">
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleInputUsia">Usia</label>
                <input type="text" name="usia" class="form-control" id="exampleInputUsia" aria-describedby="nameUsia" placeholder="Masukkan Usia">
            </div>
            <input type="text" name="kantor" hidden value="-">
            <?php
            $x = 0;
            $y = count($_SESSION['listkaryawan']);
            if ($y >= 1) {
                foreach (indexkaryawan() as $index => $karyawan) {
                    $x = (int)$karyawan->kid + 1;
                }
            } else {
                $x = 0;
            }

            ?>
            <input type="text" name="kid" hidden value="<?php echo $x ?>">
        </div>
        <button name="submit" type="submit" class="btn d-block mx-auto mt-2 btn-primary">Submit</button>
    </form>
</body>

</html>