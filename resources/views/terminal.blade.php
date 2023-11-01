<!DOCTYPE html>
<html>
<head>
    <title>OAuth Client Management</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>OAuth Client Management</h1>

    <!-- Create a New OAuth Client Form -->
    <h2>Create a New OAuth Client</h2>
    <form id="createClientForm">
        <label for="name">Client Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="redirect">Redirect URI:</label>
        <input type="text" id="redirect" name="redirect"><br>
        <button type="submit">Create Client</button>
    </form>

    <!-- List of OAuth Clients -->
    <h2>List of OAuth Clients</h2>
    <ul id="clientList"></ul>

    <script>
        const createClientForm = document.getElementById('createClientForm');
        const clientList = document.getElementById('clientList');

        // Function to fetch the list of OAuth clients
        const fetchClientList = () => {
            axios.get('/oauth/clients')
                .then(response => {
                    clientList.innerHTML = '';
                    response.data.forEach(client => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `${client.id} - ${client.name} (${client.redirect})`;
                        clientList.appendChild(listItem);
                    });
                })
                .catch(error => {
                    console.error('Error retrieving OAuth clients:', error);
                });
        };

        // Event listener for form submission
        createClientForm.addEventListener('submit', event => {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const redirect = document.getElementById('redirect').value;

            axios.post('/oauth/clients', { name, redirect })
                .then(response => {
                    console.log('New OAuth client created:', response.data);
                    fetchClientList(); // Refresh the client list after creating a client
                })
                .catch(error => {
                    console.error('Error creating OAuth client:', error);
                });
        });

        // Initial fetch of OAuth clients
        fetchClientList();
    </script>
</body>
</html>
