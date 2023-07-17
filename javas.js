var draggableElement = document.getElementById('draggableElement');
var dropZone = document.getElementById('dropZone');

// Evento de inicio de arrastre
draggableElement.addEventListener('dragstart', function(event) {
  event.dataTransfer.setData('text/plain', event.target.id);
});

// Evento de soltar
dropZone.addEventListener('drop', function(event) {
  event.preventDefault();
  var data = event.dataTransfer.getData('text/plain');
  var draggableElement = document.getElementById(data);
  dropZone.appendChild(draggableElement);
});

// Evitar el comportamiento predeterminado de los eventos dragover y dragenter
dropZone.addEventListener('dragover', function(event) {
  event.preventDefault();
});
dropZone.addEventListener('dragenter', function(event) {
  event.preventDefault();
});