window.onload = () => {
    const button = document.querySelector('button[data-action="change"]');
    button.innerText = '->';

    let places = staticLoadPlaces();
    renderPlaces(places);
};

function staticLoadPlaces() {
    return [
        {
            name: 'Pokèmon',
            
            location: {
                lat: 17.264916,
                lng: -97.6779120,
           },
        },
    ];
}

var models = [
    {
        url: './assets/quesillox.glb',
        scale: '0.5 0.5 0.5',
        info: 'El Quesillo, una variente del queso blanco Mexicano nacido en los valles centrales de Oaxaca',
        rotation: '0 180 0',
    },
    {
        url: './assets/casisom.glb',
        scale: '0.5 0.5 0.5',
        rotation: '0 180 0',
        info: 'Sombrero conocido como Charro 24, llegaron al itsmo hace muchos años y no se encuentran en ninguna parte de Mexico ',
    },
    {
        url: 'prueba2.glb',
        scale: '0.1 0.1 0.1',
        rotation: '0 180 0',
        info: 'Cesta tejida de mimbre, artesania multiusos puede usarse como decoracion o para almacenar y transportar diversos objetos',
    },
    {
        url: 'cemitagood.glb',
        scale: '0.9 0.9 0.9',
        rotation: '180 190 100',
        info: 'Cemita Tlaxiaqueña, sin duda, el pan mas emblematico y representativo de nuestra region',
    },
];

var modelIndex = 0;
var setModel = function (model, entity) {
    if (model.scale) {
        entity.setAttribute('scale', model.scale);
    }

    if (model.rotation) {
        entity.setAttribute('rotation', model.rotation);
    }

    if (model.position) {
        entity.setAttribute('position', model.position);
    }

    entity.setAttribute('gltf-model', model.url);

    const div = document.querySelector('.instructions');
    div.innerText = model.info;
};

function renderPlaces(places) {
    let scene = document.querySelector('a-scene');

    places.forEach((place) => {
        let latitude = place.location.lat;
        let longitude = place.location.lng;

        let model = document.createElement('a-entity');
        model.setAttribute('gps-entity-place', `latitude: ${latitude}; longitude: ${longitude};`);

        setModel(models[modelIndex], model);

        model.setAttribute('animation-mixer', '');

        document.querySelector('button[data-action="change"]').addEventListener('click', function () {
            var entity = document.querySelector('[gps-entity-place]');
            modelIndex++;
            var newIndex = modelIndex % models.length;
            setModel(models[newIndex], entity);
        });

        scene.appendChild(model);
    });
}
