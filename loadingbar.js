//defining incrementer variable
var incrementer = 0;

//if the incrementer is equal to zero, get the element with "bar" id and execute the function frame within a set interval time
  if (incrementer == 0) {
    incrementer = 1;
    var bar = document.getElementById("Bar");
    var width = 10;
    var id = setInterval(frame, 25);
    //function increases the width of the loading bar ever 25 ms
    function frame() {
      
      //if the loadingbar is already full
      if (width >= 100) {
       //do nothing pretty much, reset the incrementer and the interval var
        clearInterval(id);
        i = 0;
      } else {
        width++;
        bar.style.width = width + "%";

      }
    }
//after 3 seconds, redirect to dropem.php
    var relocateinterval=setInterval(relocate,3000);
    function relocate(){
      window.location.href = 'dropem.php';
    }
  }
