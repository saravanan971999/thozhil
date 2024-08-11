window.onload = loadCountries


var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'MW5Bek5YSlQwcVA5aXVZcFhlVmE4alExZHlDZ1huclFvTXg0cXhlRA=='
}


var countrySelect = document.getElementById('country'),
    stateSelect = document.getElementById('state'),
    citySelect = document.getElementById('district')


//

function loadCountries() {

    let apiEndPoint = config.cUrl

    fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        // console.log(data);

        data.forEach(country => {
            const option = document.createElement('option')
            option.value = country.iso2
            option.textContent = country.name
            countrySelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))

    stateSelect.disabled = true
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'none'
    citySelect.style.pointerEvents = 'none'
}



document.getElementById('country').addEventListener('change', function () {
    stateSelect.disabled = false
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'auto'
    citySelect.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value
    // console.log(selectedCountryCode);
    stateSelect.innerHTML = '<option value="">Select State</option>' // for clearing the existing states
    citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        // console.log(data);

        data.forEach(state => {
            const option = document.createElement('option')
            option.value = state.iso2
            option.textContent = state.name
            stateSelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))
});


document.getElementById('state').addEventListener('change', function () {
    citySelect.disabled = false
    citySelect.style.pointerEvents = 'auto'

    const selectedCountryCode = countrySelect.value
    const selectedStateCode = stateSelect.value
    // console.log(selectedCountryCode, selectedStateCode);

    citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        // console.log(data);

        data.forEach(city => {
            const option = document.createElement('option')
            option.value = city.name
            option.textContent = city.name
            citySelect.appendChild(option)
        })
    })
});








































































document.addEventListener("DOMContentLoaded", (event) => {
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

// Event listener for collegestate selection
document.getElementById('college_state').addEventListener('click', function () {
    const citySelect = document.getElementById('college_district');
        citySelect.disabled = false;
        citySelect.style.pointerEvents = 'auto';

        const selectedCountryCode = "IN";
        const selectedStateCode = document.getElementById('college_state').value;

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
document.getElementById('college_state').addEventListener('change', function () {
    const countryDropdown = document.getElementById('college_district');
    const iid = document.getElementById('college_state').value;

    // Clear existing options
    countryDropdown.innerHTML = '';
    countryDropdown.innerHTML="<option value=''>Select </option>";

    fetch('https://geodata.phplift.net/api/index.php?type=getCities&countryId=101&stateId=' + iid)
    .then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
    })
    .then(data => {
    if (Array.isArray(data.result) && data.result.length > 0) {
        data.result.forEach(city => {
        const option = document.createElement('option');
        option.value = city.id;
        option.text = city.name;
        countryDropdown.appendChild(option);
        });
    } else {
        console.log('No cities found for the selected country and state.');
    }
    })
    .catch(error => {
    console.error('Fetch error:', error);
    });
});










//   qualification sellection
document.getElementById('qualification').addEventListener('click', function () {
    var firstDropdownValue = this.value;
    var xhr = new XMLHttpRequest();

    // Configure the AJAX request
    xhr.open('GET', '/get-second-dropdown-data/' + firstDropdownValue, true);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);
            // console.log(data);
            // Populate the second dropdown with the fetched data
            var secondDropdown = document.getElementById('degree');
            secondDropdown.innerHTML = ''; // Clear previous options

            data.forEach(function (item) {
                var option = document.createElement('option');
                option.value = item;
                option.text = item;
                secondDropdown.appendChild(option);
            });
        }

    };

    // Send the AJAX request
    xhr.send();
});
document.getElementById('qualification').addEventListener('change', function () {
    var firstDropdownValue = this.value;
    var xhr = new XMLHttpRequest();

    // Configure the AJAX request
    xhr.open('GET', '/get-second-dropdown-data/' + firstDropdownValue, true);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);
            // console.log(data);
            // Populate the second dropdown with the fetched data
            var secondDropdown = document.getElementById('degree');
            secondDropdown.innerHTML = ''; // Clear previous options

            data.forEach(function (item) {
                var option = document.createElement('option');
                option.value = item;
                option.text = item;
                secondDropdown.appendChild(option);
            });
        }

    };

    // Send the AJAX request
    xhr.send();
});


// major-subject
document.getElementById('degree').addEventListener('change', function () {
    var firstDropdownValue = this.value;
    var xhr = new XMLHttpRequest();

    // Configure the AJAX request
    xhr.open('GET', '/major/' + firstDropdownValue, true);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);
            // console.log(data);
            // Populate the second dropdown with the fetched data
            var secondDropdown = document.getElementById('major_subject');
            secondDropdown.innerHTML = ''; // Clear previous options

            data.forEach(function (item) {
                var option = document.createElement('option');
                option.value = item;
                option.text = item;
                secondDropdown.appendChild(option);
            });
        }

    };

    // Send the AJAX request
    xhr.send();
});
document.getElementById('degree').addEventListener('click', function () {
    var firstDropdownValue = this.value;
    var xhr = new XMLHttpRequest();

    // Configure the AJAX request
    xhr.open('GET', '/major/' + firstDropdownValue, true);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);
            // console.log(data);
            // Populate the second dropdown with the fetched data
            var secondDropdown = document.getElementById('major_subject');
            secondDropdown.innerHTML = ''; // Clear previous options

            data.forEach(function (item) {
                var option = document.createElement('option');
                option.value = item;
                option.text = item;
                secondDropdown.appendChild(option);
            });
        }

    };

    // Send the AJAX request
    xhr.send();
});
