<?php
require("session_controller.php");



if (isset($_POST['submit'])) {
    $z=false;
    foreach(indexrelasi() as $index =>$relasi){
        if($relasi->kid==$_POST['kid']){
            $z=true;
            editrelasi($index);
        }
    }
    if($z==false){
        insertrelasi();
    }
    
}
if (isset($_GET['delete'])) {
    deleterelasi($_GET['delete']);
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
                            <a class="nav-link font-weight-bold text-center" style="margin-top:5px" aria-current="page" href="karyawan_view.php">Daftar Karyawan</a>
                        </li>
                        <li class="nav-item text-center" style="margin-top:5px">
                            <a class="nav-link font-weight-bold text-center" href="kantor_view.php">Daftar Kantor</a>
                        </li>
                        <li class="nav-item text-center" style="margin-top:5px">
                            <a class="nav-link active font-weight-bold text-center" href="relasi_view.php">Daftar Relasi Karyawan - Kantor </a>
                        </li>



                    </ul>
                </div>
            </div>
        </div>
    </nav>




    <h1 class="text-center">List Relasi Karyawan-Kantor</h1>
    <table class="table table-dark mt-2 w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kantor</th>
                <th scope="col">Delete</th>
            </tr>



        </thead>
        <tbody>
            <?php
           
            $a=0;
                             foreach(indexrelasi() as $index =>$relasi){
                                 $a=$a+1;
                                 echo"
                                 <tr>
                                     <td>".$a."</td>
                                     <td>". $_SESSION['listkaryawan'][$relasi->kid]->nama ."</td>
                                     <td>". $_SESSION['listkantor'][$relasi->kaid]->store ."</td>
                                     <td><a href='relasi_view.php?delete=".$index."'><button class='btn btn-primary'>Delete</button></td>
                 
                                 </tr>
                                 
                                 ";
                             }
            ?>


        </tbody>





    </table>

    <div class="row align-items-center justify-content-center">
        <div class="col-6">
            <div class="w-100">
                <h1 class="text-center mt-2">
                    Tambah/Ubah Relasi
                </h1>
                <form method="POST" action="">
                    <div>
                        <select class="w-1 form-select form-select-lg mb-3 text-start" name="kid" id="color" required>
                            <option value="">--- Pilih Karyawan ---</option>
                            <?php
                            foreach (indexkaryawan() as $index => $karyawan) {
                                echo "
                        <option name ='kid' value=" . $karyawan->kid . ">" . $karyawan->nama . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <select class="w-1 form-select form-select-lg mb-3 text-start" name="kaid" id="color" required>
                            <option value="">--- Pilih Kantor ---</option>
                            <?php
                             
                            foreach (indexkantor() as $index => $kantor) {
                                echo "
                        <option name ='kaid' value=" . $kantor->kaid . ">" . $kantor->store . " </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button class="d-block mx-auto btn btn-primary " name="submit" value="submit">Submit</button>
                </form>
                
            </div>

        </div>
</body>

</html>