
    let placesService;
    let map;

    function initMap() {
        map = new google.maps.Map(document.createElement('div'));
        placesService = new google.maps.places.PlacesService(map);
    }

    function searchPlaces() {
        const searchInput = document.getElementById('searchInput').value;

        if (searchInput.trim() !== '') {
            const request = {
                query: searchInput,
                fields: ['name', 'formatted_address', 'place_id', 'types']
            };

            placesService.textSearch(request, displayResults);
        }
    }

    function displayResults(results, status) {
        const resultsList = document.getElementById('resultsList');
        resultsList.innerHTML = '';

        if (status === google.maps.places.PlacesServiceStatus.OK) {
            results.forEach(place => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<strong>${place.name}</strong> - ${place.formatted_address} (${place.types.join(', ')})`;

                const detailsButton = document.createElement('button');
                detailsButton.textContent = 'Detalhes';
                detailsButton.addEventListener('click', () => {
                    displayPlaceDetails(place.place_id);
                });

                listItem.appendChild(detailsButton);
                resultsList.appendChild(listItem);
            });
        } else {
            resultsList.innerHTML = '<li>Nenhum resultado encontrado.</li>';
        }
    }

    function displayPlaceDetails(placeId) {
        const placeDetailsRequest = {
            placeId,
            fields: ['name', 'formatted_address', 'website', 'photos']
        };
    
        const placeDetails = {}; // Inicializa um objeto vazio
    
        placesService.getDetails(placeDetailsRequest, async (place, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                // Preenche o objeto placeDetails com as informações do local
                placeDetails.name = place.name;
                placeDetails.formatted_address = place.formatted_address;
                placeDetails.website = place.website;
    
                // Adicione outros campos conforme necessário
    
                const detailsContainer = document.getElementById('placeDetails');
                detailsContainer.innerHTML = '';
    
                const nameElement = document.createElement('h2');
                nameElement.textContent = placeDetails.name;
                detailsContainer.appendChild(nameElement);
    
                const addressElement = document.createElement('p');
                addressElement.textContent = placeDetails.formatted_address;
                detailsContainer.appendChild(addressElement);
    
                if (placeDetails.website) {
                    const websiteElement = document.createElement('a');
                    websiteElement.href = placeDetails.website;
                    websiteElement.textContent = 'Website: ' + placeDetails.website;
                    detailsContainer.appendChild(websiteElement);
                }
    
                if (place.photos && place.photos.length > 0) {
                    place.photos.forEach(photo => {
                        if (photo && photo.hasOwnProperty('getUrl')) {
                            const photoUrl = photo.getUrl({ maxWidth: 300, maxHeight: 300 });
    
                            const photoElement = document.createElement('img');
                            photoElement.src = photoUrl;
                            detailsContainer.appendChild(photoElement);
                        } else {
                            console.error('Erro: Objeto de foto inválido na resposta da API.');
                        }
                    });
                } else {
                    console.error('Erro: Nenhuma foto encontrada para este lugar.');
                }
    
                // Adiciona campos ocultos ao formulário
                for (const key in placeDetails) {
                    if (Object.hasOwnProperty.call(placeDetails, key)) {
                        addHiddenInput(`places[${key}]`, placeDetails[key]);
                    }
                }
            }
        });
    }
    
    // Função para adicionar campos ocultos ao formulário
    function addHiddenInput(name, value) {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = name;
        hiddenInput.value = value;
        document.getElementById('placeDetails').appendChild(hiddenInput);
    }
    

    // initMap();