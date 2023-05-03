<?php
include 'template.php';
?>
<!-- START FORM -->
            <form>
                <div class="mt-1 my-1 p-3 bg-body rounded shadow-sm">

                    <h1 class="text-center">Presensi</h1>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input class="form-control" type="text" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="form-group">
                        <label for="jam_masuk">Jam Masuk</label>
                        <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" value="{{ $data2->jam_masuk }}">
                    </div>
                    <div class="form-group">
                        <label for="jam_keluar">Jam Keluar</label>
                        <input type="time" name="jam_keluar" id="jam_keluar" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
        <script>
            // Get the current time
            var currentTime = new Date();

            // Get the hours and minutes from the current time
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();

            // Add leading zeroes to the minutes if necessary
            if (minutes < 10) {
                minutes = '0' + minutes;
            }

            // mengatur jam_masuk waktu saat ini
            document.getElementById('jam_keluar').value = hours + ':' + minutes;
        </script>
        <!-- AKHIR FORM -->

        <?php
        include 'footer.php';
        ?>