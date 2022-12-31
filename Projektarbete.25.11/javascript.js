
// https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";

  } else {
    mybutton.style.display = "none";
    
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


var rectangle = $("#Rectangle");
var speechBubble = $("#SpeechBubble");

// The the user hovers the mouse over
// the rectangle the "expand-bounce"
//animation is called and the duration
// is set to 250 miliseconds.
// When the user moves the mouse away
// the "shrink" animation gets called
// and the duration is set to 100
// miliseconds.
rectangle.hover(
  function() {
    speechBubble.css({
      "animation-name": "expand-bounce",
      "animation-duration": "0.25s"
    });
  },
  function() {
    speechBubble.css({
      "animation-name": "shrink",
      "animation-duration": "0.1s"
    });
  }
);

