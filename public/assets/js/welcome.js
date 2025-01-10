document.addEventListener('DOMContentLoaded', function () {
    // Configuration de Flatpickr pour les champs de date
    initializeDatePickers();
    
    // Chargement des données initiales
    loadDrivers();
    loadVehicles();
    
    // Gestionnaire de soumission du formulaire
    initializeFormSubmission();
});

function initializeDatePickers() {
    const datePickerConfig = {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    };
    
    const datePickerElements = document.querySelectorAll(".datepicker");
    datePickerElements.forEach(element => {
        flatpickr(element, datePickerConfig);
    });
}

function loadDrivers() {
    fetch('/api/drivers')
        .then(handleResponse)
        .then(populateDriverSelect)
        .catch(handleError);
}

function loadVehicles() {
    fetch('/api/voitures')
        .then(handleResponse)
        .then(populateVehicleSelect)
        .catch(handleError);
}

function handleResponse(response) {
    if (!response.ok) {
        throw new Error('Erreur réseau');
    }
    return response.json();
}

function populateDriverSelect(drivers) {
    const driverSelect = document.getElementById('driver');
    clearSelect(driverSelect);
    
    drivers.forEach(driver => {
        const option = new Option(driver.nomDriver, driver.idDriver);
        driverSelect.add(option);
    });
}

function populateVehicleSelect(vehicles) {
    const vehicleSelect = document.getElementById('voiture');
    clearSelect(vehicleSelect);
    
    vehicles.forEach(vehicle => {
        const option = new Option(vehicle.nomVoiture, vehicle.idVoiture);
        vehicleSelect.add(option);
    });
}

function clearSelect(selectElement) {
    while (selectElement.options.length > 1) {
        selectElement.remove(1);
    }
}

function initializeFormSubmission() {
    const form = document.getElementById('trajetForm');
    
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        
        const formData = {
            idDriver: document.getElementById('driver').value,
            idVoiture: document.getElementById('voiture').value,
            lieuDepart: document.getElementById('lieuDepart').value,
            lieuDestination: document.getElementById('lieuDestination').value,
            dateHeureDepart: document.getElementById('dateDepart').value,
            dateHeureArrivee: document.getElementById('dateArrivee').value,
            carburant: document.getElementById('carburant').value,
            recette: document.getElementById('recette').value,
            distance: document.getElementById('distance').value
        };

        submitForm(formData, form);
    });
}

function submitForm(formData, form) {
    fetch('/api/trajet', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData)
    })
    .then(handleResponse)
    .then(data => {
        showSuccess('Trajet enregistré avec succès !');
        form.reset();
    })
    .catch(error => {
        showError('Erreur lors de l\'enregistrement du trajet');
    });
}

function showSuccess(message) {
    alert(message);
}

function showError(message) {
    alert(message);
}

function handleError(error) {
    console.error('Erreur:', error);
    showError('Une erreur est survenue');
}