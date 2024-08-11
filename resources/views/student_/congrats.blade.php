<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congratulations Page Design By WebJourney - Html Template</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
        .congratulation-wrapper {
            max-width: 550px;
            margin-inline: auto;
            -webkit-box-shadow: 0 0 20px #f3f3f3;
            box-shadow: 0 0 20px #f3f3f3;
            padding: 30px 20px;
            background-color: #fff;
            border-radius: 10px;
            animation: fadeInUp 1s; /* Add fade-in-up animation */
        }

        .congratulation-contents.center-text .congratulation-contents-icon {
            margin-inline: auto;
            animation: bounceIn 1s; /* Add bounce-in animation */
        }

        .congratulation-contents-icon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100px;
            width: 100px;
            background-color: #65c18c;
            color: #fff;
            font-size: 50px;
            border-radius: 50%;
            margin-bottom: 30px;
        }

        .congratulation-contents-title {
            font-size: 32px;
            line-height: 36px;
            margin: -6px 0 0;
            animation: fadeInLeft 1s; /* Add fade-in-left animation */
        }

        .congratulation-contents-para {
            font-size: 16px;
            line-height: 24px;
            margin-top: 15px;
            animation: fadeInRight 1s; /* Add fade-in-right animation */
        }

        .btn-wrapper {
            display: block;
            animation: fadeInUp 1s; /* Add fade-in-up animation */
        }

        .cmn-btn.btn-bg-1 {
            background: #6176f6;
            color: #fff;
            border: 2px solid transparent;
            border-radius: 3px;
            text-decoration: none;
            padding: 5px;
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .cmn-btn.btn-bg-1:hover {
            background-color: #4154a4; /* Change color on hover */
        }
        html,
body {
  background-color: #101e35;
  font-size: 10px; /* Makes 1rem = 10px */
}

label {
  color: white;
  font-size: 1.5rem;
}
input {
  width: 4rem;
  height: 4rem;
  cursor: pointer;
}

.confetti-container {
  user-select: none;
  z-index: 10;
}
.confetti {
  position: fixed;
  left: 0;
  right: 0;
  display: flex;
  /* width: 600px; */
  /* height: 600px; */
  /* overflow: hidden; */
}

.confetti .square {
  width: 1rem;
  height: 1rem;
  background-color: var(--bg);
  transform: rotate(-140deg);
}

.confetti .rectangle {
  width: 1rem;
  height: 0.5rem;
  background-color: var(--bg);
}

.confetti .hexagram {
  width: 0;
  height: 0;
  border-left: 0.5rem solid transparent;
  border-right: 0.5rem solid transparent;
  border-bottom: 1rem solid var(--bg);
  position: relative;
}

.confetti .hexagram:after {
  content: "";
  width: 0;
  height: 0;
  border-left: 0.5rem solid transparent;
  border-right: 0.5rem solid transparent;
  border-top: 1rem solid var(--bg);
  position: absolute;
  top: 0.33rem;
  left: -0.5rem;
}

.confetti .pentagram {
  width: 0rem;
  height: 0rem;
  display: block;
  margin: 0.5rem 0;
  border-right: 1rem solid transparent;
  border-bottom: 0.7rem solid var(--bg);
  border-left: 1rem solid transparent;
  transform: rotate(35deg);
  position: relative;
}
.confetti .pentagram:before {
  content: "";
  width: 0;
  height: 0;
  display: block;
  border-bottom: 0.8rem solid var(--bg);
  border-left: 0.3rem solid transparent;
  border-right: 0.3rem solid transparent;
  transform: rotate(-35deg);
  position: absolute;
  top: -0.45rem;
  left: -0.65rem;
}
.confetti .pentagram:after {
  content: "";
  width: 0rem;
  height: 0rem;
  display: block;
  border-right: 1rem solid transparent;
  border-bottom: 0.7rem solid var(--bg);
  border-left: 1rem solid transparent;
  transform: rotate(-70deg);
  position: absolute;
  top: 0.03rem;
  left: -1.05rem;
}

.confetti .dodecagram {
  background: var(--bg);
  width: 0.8rem;
  height: 0.8rem;
  position: relative;
}

.confetti .dodecagram:before {
  content: "";
  height: 0.8rem;
  width: 0.8rem;
  background: var(--bg);
  transform: rotate(30deg);
  position: absolute;
  top: 0;
  left: 0;
}
.confetti .dodecagram:after {
  content: "";
  height: 0.8rem;
  width: 0.8rem;
  background: var(--bg);
  transform: rotate(60deg);
  position: absolute;
  top: 0;
  left: 0;
}

.confetti .wavy-line {
  position: relative;
}
.confetti .wavy-line::after,
.confetti .wavy-line::before {
  content: "";
  height: 1rem;
  width: 8rem;
  background-size: 2rem 1rem;
  position: absolute;
  left: -9rem;
  transform: rotate(90deg);
}

.confetti .wavy-line::before {
  background-image: linear-gradient(
    45deg,
    transparent,
    transparent 50%,
    var(--bg) 50%,
    transparent 60%
  );
  top: 1rem;
}
.confetti .wavy-line::after {
  background-image: linear-gradient(
    -45deg,
    transparent,
    transparent 50%,
    var(--bg) 50%,
    transparent 60%
  );
}

.confetti i {
  width: 3rem;
  height: 3rem;
  margin: 0 0.2rem;
  animation-name: confetti;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-duration: calc(70s / var(--speed));
}

.confetti i:nth-child(even) {
  transform: rotate(90deg);
}

@keyframes confetti {
  0% {
    transform: translateY(-100vh);
  }

  100% {
    transform: translateY(100vh);
  }
}

</style>
</head>

<body>
    <div class="confetti-container">
        <div class="confetti">
          <i style="--speed: 10; --bg: yellow" class="square"></i>
          <i style="--speed: 18; --bg: white" class="pentagram"></i>
          <i style="--speed: 29; --bg: green" class="rectangle"></i>
          <i style="--speed: 17; --bg: blue" class="hexagram"></i>
          <i style="--speed: 33; --bg: red" class="pentagram"></i>
          <i style="--speed: 26; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 24; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 5; --bg: blue" class="wavy-line"></i>
          <i style="--speed: 40; --bg: white" class="square"></i>
          <i style="--speed: 17; --bg: green" class="rectangle"></i>
          <i style="--speed: 25; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 15; --bg: yellow" class="wavy-line"> </i>
          <i style="--speed: 32; --bg: yellow" class="pentagram"></i>
          <i style="--speed: 25; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 37; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 23; --bg: pink" class="wavy-line"></i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 37; --bg: pink" class="wavy-line"></i>
          <i style="--speed: 36; --bg: white" class="hexagram"></i>
          <i style="--speed: 32; --bg: green" class="wavy-line"></i>
          <i style="--speed: 32; --bg: yellow" class="pentagram"></i>
          <i style="--speed: 29; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 23; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 30; --bg: pink" class="rectangle"></i>
          <i style="--speed: 30; --bg: red" class="square"></i>
          <i style="--speed: 18; --bg: red" class="pentagram"></i>
          <i style="--speed: 19; --bg: green" class="rectangle"></i>
          <i style="--speed: 16; --bg: blue" class="hexagram"></i>
          <i style="--speed: 23; --bg: red" class="pentagram"></i>
          <i style="--speed: 34; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 39; --bg: pink" class="wavy-line"></i>
          <i style="--speed: 40; --bg: purple" class="square"></i>
          <i style="--speed: 21; --bg: green" class="rectangle"></i>
          <i style="--speed: 14; --bg: white" class="square"></i>
          <i style="--speed: 38; --bg: green" class="rectangle"></i>
          <i style="--speed: 19; --bg: red" class="dodecagram"></i>
          <i style="--speed: 29; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 21; --bg: white" class="hexagram"></i>
          <i style="--speed: 17; --bg: purple" class="wavy-line"></i>
          <i style="--speed: 32; --bg: yellow" class="pentagram"></i>
          <i style="--speed: 23; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 48; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 38; --bg: pink" class="rectangle"></i>
          <i style="--speed: 13; --bg: red" class="pentagram"></i>
          <i style="--speed: 49; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 19; --bg: cyan" class="wavy-line"></i>
          <i style="--speed: 15; --bg: steelblue" class="square"></i>
          <i style="--speed: 10; --bg: yellow" class="square"></i>
          <i style="--speed: 18; --bg: white" class="pentagram"></i>
          <i style="--speed: 29; --bg: green" class="rectangle"></i>
          <i style="--speed: 17; --bg: blue" class="hexagram"></i>
          <i style="--speed: 33; --bg: red" class="pentagram"></i>
          <i style="--speed: 26; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 24; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 5; --bg: white" class="wavy-line"></i>
          <i style="--speed: 40; --bg: purple" class="square"></i>
          <i style="--speed: 17; --bg: green" class="rectangle"></i>
          <i style="--speed: 25; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 15; --bg: cyan" class="wavy-line"> </i>
          <i style="--speed: 32; --bg: yellow" class="pentagram"></i>
          <i style="--speed: 45; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 23; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 37; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 26; --bg: white" class="hexagram"></i>
          <i style="--speed: 32; --bg: cyan" class="wavy-line"></i>
          <i style="--speed: 32; --bg: yellow" class="pentagram"></i>
          <i style="--speed: 45; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 23; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 50; --bg: pink" class="rectangle"></i>
          <i style="--speed: 30; --bg: red" class="square"></i>
          <i style="--speed: 18; --bg: red" class="pentagram"></i>
          <i style="--speed: 19; --bg: green" class="rectangle"></i>
          <i style="--speed: 16; --bg: blue" class="hexagram"></i>
          <i style="--speed: 23; --bg: red" class="pentagram"></i>
          <i style="--speed: 33; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 39; --bg: white" class="wavy-line"></i>
          <i style="--speed: 40; --bg: orange" class="square"></i>
          <i style="--speed: 21; --bg: green" class="rectangle"></i>
          <i style="--speed: 14; --bg: white" class="square"></i>
          <i style="--speed: 38; --bg: green" class="rectangle"></i>
          <i style="--speed: 19; --bg: red" class="dodecagram"></i>
          <i style="--speed: 29; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 34; --bg: white" class="hexagram"></i>
          <i style="--speed: 17; --bg: indigo" class="wavy-line"></i>
          <i style="--speed: 32; --bg: yellow" class="pentagram"></i>
          <i style="--speed: 23; --bg: white" class="square"></i>
          <i style="--speed: 18; --bg: green" class="rectangle"></i>
          <i style="--speed: 37; --bg: red" class="dodecagram"></i>
          <i style="--speed: 48; --bg: pink" class="wavy-line"> </i>
          <i style="--speed: 38; --bg: pink" class="rectangle"></i>
          <i style="--speed: 13; --bg: red" class="pentagram"></i>
          <i style="--speed: 49; --bg: yellow" class="dodecagram"></i>
          <i style="--speed: 19; --bg: purple" class="wavy-line"></i>
          <i style="--speed: 15; --bg: cyan" class="square"></i>
        </div>
    </div>
    <!-- Congratulations area start -->

    <div class="congratulation-area text-center" style="margin-top: 250px;">
        <div class="container">
            <div class="congratulation-wrapper animate_animated animate_fadeInUp">
                <div class="congratulation-contents center-text">
                    <div class="congratulation-contents-icon animate_animated animate_bounceIn">
                        <i class="fas fa-check"></i>
                    </div>
                    <h4 class="congratulation-contents-title animate_animated animate_fadeInLeft">
                        Congrats on your new job
                    </h4>
                    <p class="congratulation-contents-para animate_animated animate_fadeInRight">
                        May you find the perfect balance between challenge and enjoyment, and may you feel valued and appreciated for all your hard work
                    </p>
                    <div class="btn-wrapper mt-4 animate_animated animate_fadeInUp">
                        <a href="{{url('')}}" class="cmn-btn btn-bg-1">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Congratulations area end -->

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
