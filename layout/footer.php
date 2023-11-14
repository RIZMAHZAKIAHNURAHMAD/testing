<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#example');
</script>
<script>
    function loadKab() {

        var provinsi = document.getElementById("provinsi");
        var kabupaten = document.getElementById("kabupaten");

        var selectedProvinces = provinsi.value;

        // Clear existing options in the city dropdown
        kabupaten.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';

        if (selectedProvinces) {
            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "wilayah/get_cities.php?province_code=" + selectedProvinces, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var cities = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched cities
                        cities.forEach(function(city) {
                            var cityOption = document.createElement("option");
                            cityOption.value = city.code;
                            cityOption.textContent = city.name;
                            kabupaten.appendChild(cityOption);
                        });
                    } else {}
                }
            };
            xhr.send();
        }
    }

    function loadKec() {
        console.log('#code', '#name kec 1');
        var kabupaten = document.getElementById("kabupaten");
        var kecamatan = document.getElementById("kecamatan");

        var selectedDistricts = kabupaten.value;

        // Clear existing options in the city dropdown
        kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

        if (selectedDistricts) {

            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "wilayah/get_kec.php?city_code=" + selectedDistricts, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var districts = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched districts
                        districts.forEach(function(kec) {
                            var kecOption = document.createElement("option");
                            kecOption.value = kec.code;
                            kecOption.textContent = kec.name;
                            kecamatan.appendChild(kecOption);
                        });
                    } else {

                    }
                }
            };
            xhr.send();
        }
    }

    function loadDesa() {
        var kecamatan = document.getElementById("kecamatan");
        var desa = document.getElementById("desa");

        var selectedDesa = kecamatan.value;

        // Clear existing options in the city dropdown
        desa.innerHTML = '<option value="">-- Pilih Desa --</option>';

        if (selectedDesa) {
            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "wilayah/get_desa.php?district_code=" + selectedDesa, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var villages = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched villages
                        villages.forEach(function(villa) {
                            var villaOption = document.createElement("option");
                            villaOption.value = villa.code;
                            villaOption.textContent = villa.name;
                            desa.appendChild(villaOption);
                        });
                    } else {}
                }
            }
        }
    }
</script>
</body>

</html>