<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Calendar</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
        .event-container {
  font-family: "Roboto", sans-serif;
  max-width: 800px;
  margin: 0 auto;
}

.event-container h3.year {
  font-size: 40px;
  text-align: center;
  border-bottom: 1px solid #b1b1b1;
}

.event-container .event {
  box-shadow: 0 4px 16px -8px rgba(0, 0, 0, 0.4);
  display: flex;
  border-radius: 8px;
  margin: 32px 0;
}

.event .event-left {
  background: #222;
  min-width: 82px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #eee;
  padding: 8px 48px;
  font-weight: bold;
  text-align: center;
  border-radius: 8px 0 0 8px;
}

.event .event-left .date {
  font-size: 56px;
}

.event .event-left .month {
  font-size: 16px;
  font-weight: normal;
}

.event .event-right {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 24px;
}

.event .event-right h3.event-title {
  font-size: 24px;
  margin: 24px 0 10px 0;
  color: #218bbb;
  text-transform: uppercase;
}

.event .event-right .event-timing {
  background: #fff8ba;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100px;
  padding: 8px;
  border-radius: 16px;
  margin: 24px 0;
  font-size: 14px;
}

.event .event-right .event-timing img {
  height: 20px;
  padding-right: 8px;
}

@media (max-width: 550px) {
  .event {
    flex-direction: column;
  }

  .event .event-left {
    padding: 0;
    border-radius: 8px 8px 0 0;
  }

  .event .event-left .event-date .date,
  .event .event-left .event-date .month {
    display: inline-block;
    font-size: 24px;
  }

  .event .event-left .event-date {
    padding: 10px 0;
  }
}
    </style>
  </head>
  <body>
    <div class="event-container">
        @foreach($meetings as $meeting)
    @php
        $meetingYear = date('Y', strtotime($meeting->zoom_time));
        $monthAbbreviation = date('M', strtotime($meeting->zoom_time));
        $day = date('d', strtotime($meeting->zoom_time));
        $time = date('h:i a', strtotime($meeting->zoom_time));
        $isMeetingInProgress = strtotime($meeting->zoom_time) >= strtotime(now());
        $meetingLink = $meeting->zoom_meeting ;
    @endphp

    @if (!isset($currentYear) || $currentYear != $meetingYear)
        @if (isset($currentYear))
            </div> {{-- Close the previous year section --}}
        @endif
        <h3 class="year">{{ $meetingYear }}</h3>
        @php $currentYear = $meetingYear; @endphp
    @endif

    <div class="event">
        <div class="event-left">
            <div class="event-date">
                <div class="date">{{ $day }}</div>
                <div class="month">{{ $monthAbbreviation }}</div>
            </div>
        </div>

        <div class="event-right">
            <h3 class="event-title">{{ $meeting->internship_title ?? $meeting->job_title }}</h3>

            <div class="event-description">
                {{ $meeting->full_name }}
            </div>

            <div class="event-timing">
                <img src="images/time.png" alt="" /> {{ $time }}
            </div>

            <div class="meeting-status">
                @if ($isMeetingInProgress)
                <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{ $meetingLink }}')">Join Meeting</a>
                    {{-- <a href="{{ $meetingLink }}" target="_blank" class="join-meeting">Join Meeting</a> --}}
                @else
                    <span class="completed">Completed</span>
                @endif
            </div>
        </div>
    </div>
@endforeach

{{-- Close the last year section --}}
@if (isset($currentYear))
    </div>
@endif
<div class="">
    <iframe class="resume" id="meetingFrame" style="display: none;"></iframe>
</div>

      {{-- <h3 class="year">2020</h3>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">8</div>
            <div class="month">Nov</div>
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title">Some Title Here</h3>

          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 10:00 am
          </div>
        </div>
      </div>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">22</div>
            <div class="month">Dec</div>
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title">Some Title Here</h3>

          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 10:45 am
          </div>
        </div>
      </div>

      <h3 class="year">2021</h3>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">8</div>
            <div class="month">Jan</div>
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title">Some Title Here</h3>

          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 10:00 am
          </div>
        </div>
      </div>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">9</div>
            <div class="month">Mar</div>
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title">Some Title Here</h3>

          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 10:30 am
          </div>
        </div>
      </div>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">4</div>
            <div class="month">Apr</div>
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title">Some Title Here</h3>

          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 10:00 am
          </div>
        </div>
      </div>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">8</div>
            <div class="month">Jun</div>
          </div>
        </div>

        <div class="event-right">
          <h3 class="event-title">Some Title Here</h3>

          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 10:00 am
          </div>
        </div>
      </div> --}}
    </div>
    <script>
        function toggleMeetingFrame(zoomMeetingUrl) {
            var meetingFrame = document.getElementById("meetingFrame");

            // Toggle the visibility of the iframe
            if (meetingFrame.style.display === 'none') {
                // Set the iframe source to the Zoom meeting URL
                meetingFrame.src = zoomMeetingUrl;

                // Show the iframe
                meetingFrame.style.display = 'block';

                // Add a click event listener to close the iframe when clicking outside
                document.addEventListener('click', clickOutsidePopup);
            } else {
                // Hide the iframe
                meetingFrame.style.display = 'none';

                // Remove the click event listener
                document.removeEventListener('click', clickOutsidePopup);
            }
        }

        function clickOutsidePopup(event) {
            var meetingFrame = document.getElementById("meetingFrame");
            var resumeContent = document.getElementById("meetingFrame");

            // Check if the clicked element is outside the iframe
            if (!resumeContent.contains(event.target)) {
                // Close the iframe
                toggleMeetingFrame('');
            }
        }
    </script>
  </body>
</html>
