
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
                fields: ['name', 'formatted_address', 'place_id', 'rating']
            };

            placesService.textSearch(request, displayResults);
        }
    }

    function displayResults(results, status) {
        const resultsList = document.getElementById('resultsList');
        resultsList.innerHTML = '';

        if (status === google.maps.places.PlacesServiceStatus.OK) {
            results.forEach(place => {
                const listItem = document.createElement('div');
                listItem.classList.add('card_lugares');
                listItem.innerHTML = `<strong>${place.name}</strong> </br> ${place.formatted_address} </br><strong>Classificação:</strong> ${place.rating}/5 </br>`;

                const detailsButton = document.createElement('button');
                detailsButton.classList.add('edit_card_button')
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
                placeDetails.div = place.div;
                placeDetails.name = place.name;
                placeDetails.formatted_address = place.formatted_address;
                placeDetails.website = place.website;
    
                // Adicione outros campos conforme necessário
    
                const detailsContainer = document.getElementById('placeDetails');
                detailsContainer.innerHTML = '';

                const divElement = document.createElement('div');
                divElement.className = 'titulo_descriptio_website_local'

                const nameElement = document.createElement('h2');
                nameElement.textContent = placeDetails.name;
                divElement.appendChild(nameElement);

                const addressElement = document.createElement('p');
                addressElement.textContent = placeDetails.formatted_address;
                divElement.appendChild(addressElement);

                if (placeDetails.website) {
                    const websiteElement = document.createElement('a');
                    websiteElement.href = placeDetails.website;
                    websiteElement.textContent = 'Website: ' + placeDetails.website;
                    divElement.appendChild(websiteElement);
                }

                detailsContainer.appendChild(divElement);
    
                if (place.photos && place.photos.length > 0) {
                    // Crie a div para as fotos
                    const photosDivElement = document.createElement('div');
                    photosDivElement.className = 'photos-container'; // Adicione uma classe para estilização, se desejar
        
                    place.photos.forEach(photo => {
                        if (photo && photo.hasOwnProperty('getUrl')) {
                            const photoUrl = photo.getUrl({ maxWidth: 250, maxHeight: 250 });
        
                            const photoElement = document.createElement('img');
                            photoElement.src = photoUrl;
                            photosDivElement.appendChild(photoElement);
                        } else {
                            console.error('Erro: Objeto de foto inválido na resposta da API.');
                        }
                    });
        
                    // Adicione a div das fotos ao divElement
                    divElement.appendChild(photosDivElement);
                } else {
                    console.error('Erro: Nenhuma foto encontrada para este lugar.');
                }
        
                // Adicione o divElement ao detailsContainer
                detailsContainer.appendChild(divElement);
    
                // Adiciona campos ocultos ao formulário
                for (const key in placeDetails) {
                    if (Object.hasOwnProperty.call(placeDetails, key)) {
                        addHiddenInput(`places[${key}]`, placeDetails[key]);
                    }
                }
            }
        });
    }    

    // let primeirafoto = place.photos[0];
    
    
    // Função para adicionar campos ocultos ao formulário
    function addHiddenInput(name, value) {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = name;
        hiddenInput.value = value;
        document.getElementById('placeDetails').appendChild(hiddenInput);
    }
    

    // initMap();