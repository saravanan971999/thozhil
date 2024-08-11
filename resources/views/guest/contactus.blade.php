@include('layouts.index_page_header')
@include('layouts.alert')
<style>
    @media (max-width: 768px){
        form{
            margin-left: -20px;

        }
        .contact-col input,.contact-col textarea{
            width: 150px;
        }
    }
    .contact-col input,.contact-col textarea{
border-radius: 15px;
width: 500px;
        }
        .animate{
	/* color: #2e78fd;  */
	font-size: 45px;
	background: linear-gradient(to left,#e234b7 50%, rgb(0, 0, 0));
	background-size: 200% auto;
	-webkit-background-clip: text;
	color: transparent;
	animation: gradient 3s linear infinite;
}
@keyframes gradient{
	0%{
		background-position: 0% 75%;
	}
	50%{
		background-position: 100% 30%;
	}
	100%{
		background-position: 0% 70%;
	}
}
</style>
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h1 class="animate">Contact Us</h1>
                    <p>Have questions, suggestions, or just want to say hello? We'd love <br> to hear from you!.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                        @if (session('user_id') || session('employer_id'))

                        @else
                        <a href="{{url('login_register')}}" class="neon-button">Enroll Now <i class="fab fa-user"></i></a>
                        @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('asset/index_page/assets/images/contact_us.svg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
  <section class="contact-us">
    <div class="row">
        <div class="contact-col">

            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h5>+91 6379572800</h5>
                    <p>24*7 Support</p>
                </span>
            </div>

            <div>
                <i class="fa fa-envelope-o"></i>
                <span>
                    <h5>info@thozhil.co.in</h5>
                    <p>Email us your query</p>
                </span>
            </div>
        </div>
        <div class="contact-col">

            <form id="contactForm" action="{{url('contact_form_submission')}}" method="POST" novalidate>
                @csrf
                <h1 style="margin-left: 70px;">Reach Out to Us</h1><br>
                 <h6>We're here to assit you. Reach out via email,phone, or pay us a visit!</h6><br>
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <div id='Connamediv' style='color: #FF0000; font-size: 10px;'></div>

                <input type="email" name="email" id="email" placeholder="Enter your email">
                <div id='Conemaildiv' style='color: #FF0000; font-size: 10px;' class='mt-1'></div>

                <input type="text" name="subject" id="subject" placeholder="Enter your subject" >
                <div id="Consubjectdiv" style="color: #FF0000; font-size: 10px;" class="mt-1"></div>

                <textarea rows="8" name="message" id="message" placeholder="Message"></textarea>
                <div id="Conmessagediv" style="color: #FF0000; font-size: 10px;" class="mt-1"></div>

                <button type="submit" class="hero-btn red-btn">Send Message</button>
            </form>

            <script>
                const formCOn = document.querySelector('#contactForm');
                formCOn.addEventListener('submit', (e) => {
                    if (!Convali()) {
                        e.preventDefault();
                    }
                });

                function Convali() {
                    let s = true;
                    const username = document.getElementById('name').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const subject = document.getElementById('subject');
                    const message = document.getElementById('message');

                    // Message
                    if (message.value == "") {
                        s = false;
                        message.style.boxShadow = "0 0 1px 1px red";
                        document.getElementById('Conmessagediv').innerHTML = "Message is required";
                        // message.focus();
                    } else {
                        message.style.boxShadow = "none";
                        document.getElementById('Conmessagediv').innerHTML = "";
                    }

                    // Subject
                    if (subject.value == "") {
                        s = false;
                        subject.style.boxShadow = "0 0 1px 1px red";
                        document.getElementById('Consubjectdiv').innerHTML = "Subject is required";
                        // subject.focus();
                    } else {
                        subject.style.boxShadow = "none";
                        document.getElementById('Consubjectdiv').innerHTML = "";
                    }

                    // Email
                    if (email == "") {
    s = false;
    document.getElementById('email').style.boxShadow = "0 0 1px 1px red";
    document.getElementById('Conemaildiv').innerHTML = "Email is required";
} else if (!(/^[a-zA-Z0-9_%-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,}){1,2}$/.test(email))) {
    s = false;
    document.getElementById('email').style.boxShadow = "0 0 1px 1px red";
    document.getElementById('Conemaildiv').innerHTML = "please enter a valid email address";
} else {
    var allowedDomains = ["gmail.com", "yahoo.com", "hotmail.com", "outlook.com"];
    var domain = email.split('@')[1];

    if (allowedDomains.indexOf(domain) === -1) {
        s = false;
        document.getElementById('email').style.boxShadow = "0 0 1px 1px red";
        document.getElementById('Conemaildiv').innerHTML = "please enter a valid email address";
    } else {
        document.getElementById('email').style.boxShadow = "none";
        document.getElementById('Conemaildiv').innerHTML = "";
    }
}



                    // Username
                    if (username == "") {

                        document.getElementById('name').style.boxShadow = "0 0 1px 1px red";
                        document.getElementById('Connamediv').innerHTML = "Username is required";
                        // name.focus();
                        s = false;
                    }
                     else if (!(/^[A-Za-z][A-Za-z ]{2,29}$/.test(username))) {
                        s = false;
                        document.getElementById('name').style.boxShadow = "0 0 1px 1px red";
                        document.getElementById('Connamediv').innerHTML = "Minimum three characters and should be alphabets";
                        // name.focus();
                    } else {
                        document.getElementById('name').style.boxShadow = "none";
                        document.getElementById('Connamediv').innerHTML = "";
                    }

                    return s;
                }
            </script>

        </div>
    </div>
</section>

<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      loop: true, // Enable loop
      margin: 10, // Set margin between items
      responsive: {
        0: {
          items: 1 // Number of items to show on small screens
        },
        600: {
          items: 3 // Number of items to show on medium screens
        },
        1000: {
          items: 3 // Number of items to show on large screens
        }
      }
    });
  });
</script>

{{-- end body content --}}

@include('layouts.index_page_footer')
