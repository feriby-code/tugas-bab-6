<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahasiswa</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.3.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="p-20 w-full flex justify-center">
    <div class="collapse bg-base-200">
      <input type="checkbox" />
      <div class="collapse-title text-xl font-medium">
        Nama Kelompok
      </div>
      <div class="collapse-content flex flex-col sm:text-4xl text-2xl">
        <span>1. Ananda Feri Setyawan</span>
        <span>2. Ananda Ageng Afrizal</span>
        <span>3. Anjas Restu Adhi Mulia</span>
        <span>4. Adella Maulana Annur Ramadhan</span>
      </div>
    </div>
  </div>
  <div class="container mx-auto w-full flex items-center justify-center">
    <div class="overflow-x-auto w-10/12">
      <button onclick="add_data.showModal()" class="btn btn-secondary mb-8 ms-4">Tambah Data</button>
      <table class="table bg-blue-800 text-black">
        <thead>
          <tr class="text-black text-sm">
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Fakultas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
                    if (empty($mahasiswa)) { ?>
          <tr>
            <td colspan="5">Tidak ada data</td>
          </tr>
          <?php } else {
                        $i = 1;
                        foreach ($mahasiswa as $a) { ?>

          <tr>
            <td><?= $i++; ?></td>
            <td><?= $a['nim']; ?></td>
            <td><?= $a['nama']; ?></td>
            <td><?= $a['prodi']; ?></td>
            <td><?= $a['fakultas']; ?></td>
            <td>
              <a href="/hapus/<?= $a['nim']; ?>"><button class="btn btn-sm bg-red-600 border-none hover:bg-red-800"
                  onclick="return confirm('Apakah Yakin Menghapus Mahasiswa Dengan <?= $a['nim'] ?>?')">Delete</button></a>
              <button onclick="edit_data_<?php echo ($a['nim']) ?>.showModal()"
                class="btn btn-sm bg-yellow-600 border-none hover:bg-yellow-800">Edit</button>
            </td>
          </tr>


          <!-- Modal edit-->

          <dialog id="edit_data_<?php echo ($a['nim']) ?>" class="modal">
            <form method="POST" action="/edit">
              <div class="modal-box mt-auto">
                <h3 class="font-bold text-lg">Ubah Data</h3>
                <button type="button" onclick="edit_data_<?php echo ($a['nim']) ?>.close()"
                  class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>


                                        <div class="mt-6 flex flex-col gap-6 pe-3 ps-3">
                                            <input hidden type="text" id="nim" name="nim" value="<?php echo ($a['nim']) ?>" class="w-full input input-bordered input-primary" />
                                            <div class="flex flex-col gap-2">
                                                <label for="nama" class="ms-2">Nama</label>
                                                <input type="text" id="nama" name="nama" value="<?php echo ($a['nama']) ?>" class="w-full input input-bordered input-primary" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label for="prodi" class="ms-2">Prodi</label>
                                                <input type="text" id="prodi" name="prodi" value="<?php echo ($a['prodi']) ?>" class="w-full input input-bordered input-primary" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label for="fakultas" class="ms-2">Fakultas</label>
                                                <input type="text" id="fakultas" name="fakultas" value="<?php echo ($a['fakultas']) ?>" class="w-full input input-bordered input-primary" />
                                            </div>
                                        </div>

                                        <div class="mt-10 flex justify-end me-3">
                                            <button class="btn btn-outline btn-success w-36">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </dialog>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
<div></div>                    
    <!-- Modal Add-->
    <dialog id="add_data" class="modal">
        <form method="POST" action="/tambah" class="modal-box">
            <h3 class="font-bold text-lg">Tambah Data</h3>
            <button type="button" onclick="add_data.close()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>

            <div class="mt-6 flex flex-col gap-6 pe-3 ps-3">
                <div class="flex flex-col gap-2">
                    <label for="nim" class="ms-2">NIM</label>
                    <input type="text" id="nim" name="nim" placeholder="Masukkan Nim" class="w-full input input-bordered input-primary" />
                </div>
                <div class="flex flex-col gap-2">

                <div class="mt-6 flex flex-col gap-6 pe-3 ps-3">
                  <input hidden type="text" id="nim" name="nim" value="<?php echo ($a['nim']) ?>"
                    class="w-full input input-bordered input-primary" />
                  <div class="flex flex-col gap-2">

                    <label for="nama" class="ms-2">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?php echo ($a['nama']) ?>"
                      class="w-full input input-bordered input-primary" />
                  </div>
                  <div class="flex flex-col gap-2">
                    <label for="prodi" class="ms-2">Prodi</label>
                    <input type="text" id="prodi" name="prodi" value="<?php echo ($a['prodi']) ?>"
                      class="w-full input input-bordered input-primary" />
                  </div>
                  <div class="flex flex-col gap-2">
                    <label for="fakultas" class="ms-2">Fakultas</label>
                    <input type="text" id="fakultas" name="fakultas" value="<?php echo ($a['fakultas']) ?>"
                      class="w-full input input-bordered input-primary" />
                  </div>
                </div>

                <div class="mt-10 flex justify-end me-3">
                  <button class="btn btn-outline btn-success w-36">Ubah</button>
                </div>
              </div>
            </form>
          </dialog>
          <?php }
                    } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>