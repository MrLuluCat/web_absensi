<?php 
include 'template.php';
?>
<div class="main-panel">
	<div class="content">
    <div class="card">
    <div class="card-body">
    <form>
        
        <div class=" p-6 bg-body rounded shadow-sm">
        
           <h1 class="mt-2 text-center">Tambah Presensi</h1>
            <div class="form-group">
                <label for="nim">NIM</label>
                <select class="form-select" aria-label="Default select example" value="nim" name="nim" id="nim">
                        <option></option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam_masuk">Jam Masuk</label>
                <input type="time" name="jam_masuk" id="jam_masuk" value="jam_masuk" class="form-control">
            </div>
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div></form>
    </div>
    </div>
    </div>
    </div>
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

        // Set the value of the jam_masuk input to the current time
        document.getElementById('jam_masuk').value = hours + ':' + minutes;
    </script>
   
    <!-- AKHIR FORM -->

    <?php 
include 'footer.php';
?>