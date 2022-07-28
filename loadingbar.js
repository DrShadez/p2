var incrementer = 0;

  if (incrementer == 0) {
    incrementer = 1;
    var bar = document.getElementById("Bar");
    var width = 10;
    var id = setInterval(frame, 25);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        bar.style.width = width + "%";

      }
    }

    var relocateinterval=setInterval(relocate,3000);
    function relocate(){
      window.location.href = 'dropem.php';
    }
  }
