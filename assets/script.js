$(document).ready(function () {
    if ($.fn.datepicker) {
        $("#tanggal_input, #tanggal_edit").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        });
    }
    
    $(".card").hide().fadeIn(500);

    function tampilData() {
        if (!document.getElementById("dataPegawai")) {
            return;
        }

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

    function tampilJabatan() {
        if (!document.getElementById("dataJabatan")) {
            return;
        }

        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    document.getElementById("dataJabatan").innerHTML = xmlHttp.responseText;
                } else {
                    alert("Terjadi masalah dalam mengakses server\n" + xmlHttp.statusText);
                }
            }
        };
        xmlHttp.open("GET", "ajax/tampil_jabatan.php", true);
        xmlHttp.send(null);
    }

    tampilJabatan();

    

    var formTambahJabatan = document.getElementById("formTambahJabatan");
    if (formTambahJabatan) {
        formTambahJabatan.addEventListener("submit", function (e) {
            e.preventDefault();
            
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        formTambahJabatan.reset();
                        tampilJabatan();
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat menyimpan data</div>").hide().fadeIn();
                    }
                }
            };
            
            var formData = new FormData(this);
            xmlHttp.open("POST", "ajax/simpan_jabatan.php", true);
            xmlHttp.send(formData);
        });
    }

    var formEditJabatan = document.getElementById("formEditJabatan");
    if (formEditJabatan) {
        formEditJabatan.addEventListener("submit", function (e) {
            e.preventDefault();
            
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        setTimeout(function () {
                            window.location.href = "jabatan.php";
                        }, 900);
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat mengupdate data</div>").hide().fadeIn();
                    }
                }
            };
            
            var formData = new FormData(this);
            xmlHttp.open("POST", "ajax/update_jabatan.php", true);
            xmlHttp.send(formData);
        });
    }

    $(document).on("click", ".btn-hapus-jabatan", function () {
        let id = $(this).data("id");

        if (confirm("Yakin ingin menghapus data jabatan ini?")) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        tampilJabatan();
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat menghapus data</div>").hide().fadeIn();
                    }
                }
            };
            
            var params = "id=" + id;
            xmlHttp.open("POST", "ajax/hapus_jabatan.php", true);
            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttp.send(params);
        }
    });

    function tampilUnit() {
        if (!document.getElementById("dataUnit")) {
            return;
        }

        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    document.getElementById("dataUnit").innerHTML = xmlHttp.responseText;
                } else {
                    alert("Terjadi masalah dalam mengakses server\n" + xmlHttp.statusText);
                }
            }
        };
        xmlHttp.open("GET", "ajax/tampil_unit.php", true);
        xmlHttp.send(null);
    }

    tampilUnit();

    var formTambahUnit = document.getElementById("formTambahUnit");
    if (formTambahUnit) {
        formTambahUnit.addEventListener("submit", function (e) {
            e.preventDefault();
            
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        formTambahUnit.reset();
                        tampilUnit();
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat menyimpan data</div>").hide().fadeIn();
                    }
                }
            };
            
            var formData = new FormData(this);
            xmlHttp.open("POST", "ajax/simpan_unit.php", true);
            xmlHttp.send(formData);
        });
    }

    var formEditUnit = document.getElementById("formEditUnit");
    if (formEditUnit) {
        formEditUnit.addEventListener("submit", function (e) {
            e.preventDefault();
            
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        setTimeout(function () {
                            window.location.href = "unit_kerja.php";
                        }, 900);
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat mengupdate data</div>").hide().fadeIn();
                    }
                }
            };
            
            var formData = new FormData(this);
            xmlHttp.open("POST", "ajax/update_unit.php", true);
            xmlHttp.send(formData);
        });
    }

    $(document).on("click", ".btn-hapus-unit", function () {
        let id = $(this).data("id");

        if (confirm("Yakin ingin menghapus data unit kerja ini?")) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        $("#notif").html("<div class='success'>" + xmlHttp.responseText + "</div>").hide().fadeIn();
                        tampilUnit();
                    } else {
                        $("#notif").html("<div class='error'>Terjadi kesalahan saat menghapus data</div>").hide().fadeIn();
                    }
                }
            };
            
            var params = "id=" + id;
            xmlHttp.open("POST", "ajax/hapus_unit.php", true);
            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttp.send(params);
        }
    });

});
