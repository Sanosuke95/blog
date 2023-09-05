console.log('Hello');

let image = document.getElementById('inputFile')
image.onchange = evt => {
    preview = document.getElementById('preview');
    preview.style.display = 'block';
    const [file] = image.files
    if (file) {
        preview.src = URL.createObjectURL(file)
    }
}
