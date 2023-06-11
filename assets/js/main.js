/**
* Template Name: Medilab - v4.10.0
* Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  let selectTopbar = select('#topbar')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.add('topbar-scrolled')
        }
      } else {
        selectHeader.classList.remove('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.remove('topbar-scrolled')
        }
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Initiate glightbox 
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Gallery Lightbox 
   */
  const galelryLightbox = GLightbox({
    selector: '.galelry-lightbox'
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 2,
        spaceBetween: 20
      }
    }
  });

  /**
   * Initiate Pure Counter 
   */
  new PureCounter();

})()


$( function() {
  $( "#datepicker" ).datepicker({
    minDate: new Date()
  });
} );

$(document).ready(function(){
  $("#email-form").submit(function(e){
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "forms/contact.php",
          data: formData,
          success: function(data){
              if(data == "success"){
                  Swal.fire(
                      'Success!',
                      'Your message was successfully sent.',
                      'success'
                    ).then(function() {
                      window.location.href = "index.html";
                  });
                    
              }else if(data == "error"){
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Please fill in all fields and submit a valid form',
                    })
              } else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                    })
              }
          }
      });
  });
});

$(document).ready(function(){
  $("#appointment-form").submit(function(e){
      e.preventDefault();
      var formData = $(this).serialize();
      var phone = $("#phone").val();
      $.ajax({
          type: "POST",
          url: "forms/appointment.php",
          data: formData,
          success: function(data){
              if(data == "success"){
                  Swal.fire(
                      'Success!',
                      'Your appointment was successfully made.',
                      'success'
                    ).then(function() {
                      window.location.href = "sms.php";
                  });
                    
              }else if(data == "fail"){
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'You still have active appointment',
                    })
              }else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Please fill up all the field',
                    })
              }
          }
      });
  });
});

$(document).ready(function() {
  $("#save-button").click(function(e) {
    e.preventDefault();
      var formData = $("#submitmoto").serialize();
      $.ajax({
          type: "POST",
          url: "forms/edit.php",
          data: formData,
          success: function(data){
              if(data == "success"){
                  Swal.fire(
                      'Success!',
                      'Your profile was successfully change.',
                      'success'
                    ).then(function() {
                      window.location.href = "profile.php";
                  });
                    
              }else if(data == "error"){
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Please fill in all fields and submit a valid form',
                    })
              } else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                    })
              }
          }
      });
  });
});

$(document).ready(function() {
  // Listen for changes in the department, doctor, and date select fields
  $('#doctorSelect, #datepicker').on('change', function() {
    // Get the selected values
    var doctor = $('#doctorSelect').val();
    var date = $('#datepicker').val();
    
    // Make an AJAX call to the server to retrieve the booked appointments based on the selected values
    $.ajax({
      url: 'forms/get_booked_appointments.php',
      type: 'post',
      data: { doctor: doctor, date: date },
      success: function(booked_appointments) {
        // Clear the time select field
        $('#timeSelect').empty();
        
        // Populate the time select field with the available times
        var available_times = ['08:00am to 09:00am', '09:00am to 10:00am', '10:00am to 11:00am', '01:00pm to 02:00pm', '02:00pm to 03:00pm', '03:00pm to 04:00pm'];
        for (var i = 0; i < available_times.length; i++) {
          var disabled = '';
          if (booked_appointments.indexOf(available_times[i]) !== -1) {
            disabled = ' disabled';
          }
          $('#timeSelect').append('<option value="' + available_times[i] + '"' + disabled + '>' + available_times[i] + '</option>');
        }
      }
    });
  });
});


$(document).ready(function () {
  $('#dtHorizontalExample').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
});

////

window.onload = function() {
  document.getElementById("save-button").disabled = true;
  
  document.getElementById("edit-button").addEventListener("click", function() {
  document.getElementById("save-button").disabled = false;
  });
  
  var inputs = document.querySelectorAll("input[type=text]");
  for (var i = 0; i < inputs.length; i++) {
  inputs[i].readOnly = true;
  }
  
  document.getElementById("cancel-button").style.display = "none";
  document.getElementById("save-button").disabled = true;
  
  document.getElementById("edit-button").addEventListener("click", function() {
  for (var i = 0; i < inputs.length; i++) {
  inputs[i].readOnly = false;
  }
  document.getElementById("edit-button").style.display = "none";
  document.getElementById("cancel-button").style.display = "block";
  document.getElementById("save-button").disabled = false;
  });
  
  document.getElementById("cancel-button").addEventListener("click", function() {
  for (var i = 0; i < inputs.length; i++) {
  inputs[i].readOnly = true;
  }
  document.getElementById("edit-button").style.display = "block";
  document.getElementById("cancel-button").style.display = "none";
  document.getElementById("save-button").disabled = true;
  });
  };
  
  function printContent(el) {
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
  }
