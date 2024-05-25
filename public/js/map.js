var map = L.map('map', {
    center: [-3.734073330631159, 125.99983789744495],
    zoom: 5.6,
    // attributionControl: false,
    zoomControl: true
    });
    $( "#weber").prop('checked', true);
    $( "#biogegrafi").prop('checked', true);
    new L.bmSwitcher([
        {
          layer:  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
            detectRetina: true,
            attribution: 'Auriga Nusantara - Wallacea Terminal',
            maxNativeZoom: 17}),
          icon: '../assets/esri-satelit.png',
          name: ''
        },
        {
          layer: L.tileLayer('http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3'],
            attribution: 'Auriga Nusantara - Wallacea Terminal'
        }),
          icon: '../assets/dark.jpeg',
          name: ''
        },
        {
          layer: L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            detectRetina: true,
            attribution: 'Auriga Nusantara - Wallacea Terminal',
            maxNativeZoom: 17
        }).addTo(map),
          icon: '../assets/osm.png',
          name: ''
        },
      ], { position: 'bottomleft' }).addTo(map);



    // administrasi
    var adminkabkota = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Batas_Administrasi_Kabupaten',
        transparent: true,
        format: 'image/png'
    });

    var provinsi = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Batas_Administrasi_Provinsi',
        transparent: true,
        format: 'image/png'
    });

    var biogegrafi = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Garis Biogeografi Wallacea',
        transparent: true,
        format: 'image/png'
    }).addTo(map);

    var weber = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Garis Wallace and Weber',
        transparent: true,
        format: 'image/png'
    }).addTo(map);

    var pulaubesar = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Pulau_Besar_Wallacea',
        transparent: true,
        format: 'image/png'
    });
    var pulaukecil = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Pulau_Kecil_Wallacea',
        transparent: true,
        format: 'image/png'
    });



    // landstatus
    var kawasanhutan = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Kawasan Hutan Wallacea',
        transparent: true,
        format: 'image/png'
    });

    var adat = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:PetaIndikatifWilayahAdat',
        transparent: true,
        format: 'image/png'
    });


    // Biodiversity

    var ibba = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:IBBA Wallacea 2024',
        transparent: true,
        format: 'image/png'
    });


    // consession
    var iup = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:IUP Tambang Wallacea	',
        transparent: true,
        format: 'image/png'
    });

    var ppkh = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:PPKH Wallacea',
        transparent: true,
        format: 'image/png'
    });
    var smelter = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Smelter_Polygon',
        transparent: true,
        format: 'image/png'
    });

    var tambang = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Tambang 2000_2023',
        transparent: true,
        format: 'image/png'
    });

    var smelter = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Smelter_Polygon',
        transparent: true,
        format: 'image/png'
    });





    // checkbox section
    $('#adminkabkota:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(adminkabkota);
            document.getElementById("administrasikabkotalegend").style.display = 'block';
        } else {
            map.removeLayer(adminkabkota);
            document.getElementById("administrasikabkotalegend").style.display = 'none';

        }
    });
    $('#provinsi:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(provinsi);
            document.getElementById("provinsilegend").style.display = 'block';
        } else {
            map.removeLayer(provinsi);
            document.getElementById("provinsilegend").style.display = 'none';

        }
    });
    $('#biogegrafi:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(biogegrafi);
            document.getElementById("biogegrafilegend").style.display = 'block';
        } else {
            map.removeLayer(biogegrafi);
            document.getElementById("biogegrafilegend").style.display = 'none';

        }
    });
    $('#weber:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(weber);
            document.getElementById("weberlegend").style.display = 'block';
        } else {
            map.removeLayer(weber);
            document.getElementById("weberlegend").style.display = 'none';

        }
    });
    $('#pulaubesar:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(pulaubesar);
            document.getElementById("pulaubesarlegend").style.display = 'block';
        } else {
            map.removeLayer(pulaubesar);
            document.getElementById("pulaubesarlegend").style.display = 'none';

        }
    });
    $('#pulaukecil:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(pulaukecil);
            document.getElementById("pulaukecillegend").style.display = 'block';
        } else {
            map.removeLayer(pulaukecil);
            document.getElementById("pulaukecillegend").style.display = 'none';

        }
    });


    $('#kawasanhutan:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(kawasanhutan);
            document.getElementById("kawasanhutanlegend").style.display = 'block';
        } else {
            map.removeLayer(kawasanhutan);
            document.getElementById("kawasanhutanlegend").style.display = 'none';

        }
    });
    $('#adat:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(adat);
            document.getElementById("adatlegend").style.display = 'block';
        } else {
            map.removeLayer(adat);
            document.getElementById("adatlegend").style.display = 'none';

        }
    });


    $('#ibba:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(ibba);
            document.getElementById("ibbalegend").style.display = 'block';
        } else {
            map.removeLayer(ibba);
            document.getElementById("ibbalegend").style.display = 'none';

        }
    });

    $('#iup:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(iup);
            document.getElementById("iuplegend").style.display = 'block';
        } else {
            map.removeLayer(iup);
            document.getElementById("iuplegend").style.display = 'none';

        }
    });
    $('#ppkh:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(ppkh);
            document.getElementById("ppkhlegend").style.display = 'block';
        } else {
            map.removeLayer(ppkh);
            document.getElementById("ppkhlegend").style.display = 'none';

        }
    });
    $('#tambang:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(tambang);
            document.getElementById("tambanglegend").style.display = 'block';
        } else {
            map.removeLayer(tambang);
            document.getElementById("tambanglegend").style.display = 'none';

        }
    });

    $('#smelter:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            map.addLayer(smelter);
            document.getElementById("smelterlegend").style.display = 'block';
        } else {
            map.removeLayer(smelter);
            document.getElementById("smelterlegend").style.display = 'none';

        }
    });






