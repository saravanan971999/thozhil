document.addEventListener('DOMContentLoaded', function () {

    var selectedCountryCode = 'IN'; // ISO2 code for India

    var stateSelect = document.getElementById('college_state');

    fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {'X-CSCAPI-KEY': config.ckey}})
        .then(response => response.json())
        .then(data => {
            data.forEach(state => {
                const option = document.createElement('option');
                option.value = state.iso2;
                option.textContent = state.name;
                stateSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error loading states:', error));

    });
    document.getElementById('college_state').addEventListener('change', function () {
        const citySelect = document.getElementById('college_district');
        citySelect.disabled = false;
        citySelect.style.pointerEvents = 'auto';

        const selectedCountryCode = "IN";
        const selectedStateCode = stateSelect.value;

        // Check if a state is selected
        if (selectedStateCode) {
            citySelect.innerHTML = '<option value="">Select City</option>'; // Clear existing city options

            fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {
                headers: {"X-CSCAPI-KEY": config.ckey}
            })
                .then(response => response.json())
                .then(data => {
                    data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.name;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error loading cities:', error));
        } else {
            // Handle the case when no state is selected
            citySelect.disabled = true;
            citySelect.style.pointerEvents = 'none';
        }
    });
