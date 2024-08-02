document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('stream').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('mes-step-2').style.display = 'block';
        } else {
            document.getElementById('mes-step-2').style.display = 'none';
            document.getElementById('mes-step-3').style.display = 'none';
            document.getElementById('mes-step-4').style.display = 'none';
        }
    });

    document.getElementById('year').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('mes-step-3').style.display = 'block';
        } else {
            document.getElementById('mes-step-3').style.display = 'none';
            document.getElementById('mes-step-4').style.display = 'none';
        }
    });

    document.getElementById('semester').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('mes-step-4').style.display = 'block';
        } else {
            document.getElementById('mes-step-4').style.display = 'none';
        }
    });

    document.getElementById('mes-form').addEventListener('submit', function(event) {
        event.preventDefault();
        var stream = document.getElementById('stream').value;
        var year = document.getElementById('year').value;
        var semester = document.getElementById('semester').value;
        var data = new FormData();
        data.append('action', 'mes_get_ebooks');
        data.append('stream', stream);
        data.append('year', year);
        data.append('semester', semester);
        fetch(mes_ajax_obj.ajax_url, {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            var results = document.getElementById('mes-results');
            results.innerHTML = '';
            if (data.length) {
                data.forEach(function(ebook) {
                    var ebookLink = document.createElement('a');
                    ebookLink.href = ebook.url;
                    ebookLink.textContent = ebook.title;
                    ebookLink.target = '_blank';
                    results.appendChild(ebookLink);
                    results.appendChild(document.createElement('br'));
                });
                results.style.display = 'block';
            } else {
                results.textContent = 'No eBooks found for the selected criteria.';
                results.style.display = 'block';
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
