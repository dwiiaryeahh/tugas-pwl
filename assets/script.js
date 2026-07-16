$(document).ready(function () {
    $("#tanggal_input, #tanggal_edit").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true
    });
    
    $(".card").hide().fadeIn(500);

    function tampilData() {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    document.getElementById("dataPegawai").innerHTML = xmlHttp.responseText;
                } else {
                    alert("Terjadi masalah dalam mengakses server\n" + xmlHttp.statusText);
                }
            }
        };
        xmlHttp.open("GET", "ajax/tampil.php", true);
        xmlHttp.send(null);
    }

    tampilData();

    var formTambah = document.getElementById("formTambah");
    if (formTambah) {
        formTambah.addEventListener("submit", function (e) {
            e.preventDefault();
            
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        formTambah.reset();
                        tampilData();
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat menyimpan data</div>").hide().fadeIn();
                    }
                }
            };
            
            var formData = new FormData(this);
            xmlHttp.open("POST", "ajax/simpan.php", true);
            xmlHttp.send(formData);
        });
    }

    var formEdit = document.getElementById("formEdit");
    if (formEdit) {
        formEdit.addEventListener("submit", function (e) {
            e.preventDefault();
            
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 900);
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat mengupdate data</div>").hide().fadeIn();
                    }
                }
            };
            
            var formData = new FormData(this);
            xmlHttp.open("POST", "ajax/update.php", true);
            xmlHttp.send(formData);
        });
    }

    $(document).on("click", ".btn-hapus", function () {
        let id = $(this).data("id");

        if (confirm("Yakin ingin menghapus data pegawai ini?")) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        tampilData();
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat menghapus data</div>").hide().fadeIn();
                    }
                }
            };
            
            var params = "id=" + id;
            xmlHttp.open("POST", "ajax/hapus.php", true);
            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttp.send(params);
        }
    });

});
