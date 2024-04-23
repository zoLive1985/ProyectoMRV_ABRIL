document.getElementById('csv-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);

    try {
        const response = await fetch('http://localhost/esteveza/wp-content/plugins/cargar_archivo/upload_archivo.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
      /*       const message = await response.text();
            alert(message); */
            document.getElementById('result').textContent = await response.text();
        } else {
            alert('Hubo un error al cargar el archivo CSV.');
        }
    } catch (error) {
        //console.error('Error:', error);
        alert('Hubo un error al cargar el archivo CSV.');
    }
});