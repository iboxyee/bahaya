document.getElementById('shortenButton').addEventListener('click', function() {
    var url = document.getElementById('urlInput').value;
    if (url) {
        var shortenedUrl = generateShortUrl(url);
        document.getElementById('result').textContent = 'Shortened URL: ' + shortenedUrl;
    } else {
        document.getElementById('result').textContent = 'Please enter a URL.';
    }
});

function generateShortUrl(url) {
    // Sederhana untuk contoh ini: generate hash dari URL
    var hash = btoa(url).substring(0, 6); // Encode URL dan ambil 6 karakter pertama
    return 'https://short.url/' + hash;
}
