
@if(session('Success'))

                <div>
                    <style>
                        .popup {
                            display: none;
                            background-color: rgba(0, 0, 0, 0.7);
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            z-index: 9999;
                        }

                        .popup-content {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                            text-align: center;
                        }

                        .popup-button {
                            background-color: #436d00;
                            color: #fff;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 16px;
                            margin-top: 10px;
                        }

                    </style>
                    <div class="popup" id="confirmationPopup">
                        <div class="popup-content">
                            <p class="align">
                            {{ session('Success') }}
                            </p>
                            <button class="popup-button" onclick="closePopup()">Close</button>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("confirmationPopup").style.display = "flex";
                    });
                    function closePopup() {
                        document.getElementById("confirmationPopup").style.display = "none";
                    }
                    </script>
@endif
@if(session('Deleted'))
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("confirmationPopup").style.display = "flex";
                });
                function closePopup() {
                    document.getElementById("confirmationPopup").style.display = "none";
                }
                </script>
                <div class="popup" id="confirmationPopup">
                    <div class="popup-content">
                        <p class="align">
                        {{ session('Deleted') }}
                        </p>
                        <button class="popup-button" onclick="closePopup()">Close</button>
                    </div>
                </div>

@endif
@if(session('Updated'))
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("confirmationPopup").style.display = "flex";
                });
                function closePopup() {
                    document.getElementById("confirmationPopup").style.display = "none";
                }
                </script>
                <div class="popup" id="confirmationPopup">
                    <div class="popup-content">
                        <p class="align">
                        {{ session('Updated') }}
                        </p>
                        <button class="popup-button" onclick="closePopup()">Close</button>
                    </div>
                </div>

@endif
@if(session('error'))
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("confirmationPopup").style.display = "flex";
                });
                function closePopupPP() {
                    document.getElementById("confirmationPopup").style.display = "none";
                }
                </script>
                <div>
                    <style>
                        .popup {
                            display: none;
                            background-color: rgba(0, 0, 0, 0.7);
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            z-index: 9999;
                        }

                        .popup-content {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                            text-align: center;
                        }

                        .popup-button {
                            background-color: #e98e25;
                            color: #fff;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 16px;
                            margin-top: 10px;
                        }

                    </style>
                    <div class="popup" id="confirmationPopup">
                        <div class="popup-content">
                            <p class="align">
                            {{ session('error') }}
                            </p>
                            <button class="popup-button" onclick="closePopupPP()">Close</button>
                        </div>
                    </div>
                </div>

@endif
@if(session('Approved'))
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("confirmationPopup").style.display = "flex";
                });
                function closePopup() {
                    document.getElementById("confirmationPopup").style.display = "none";
                }
                </script>
                <div class="popup" id="confirmationPopup">
                    <div class="popup-content">
                        <p class="align">
                        {{ session('Approved') }}
                        </p>
                        <button class="popup-button" onclick="closePopup()">Close</button>
                    </div>
                </div>

@endif
@if(session('Rejected'))
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("confirmationPopup").style.display = "flex";
                });
                function closePopup() {
                    document.getElementById("confirmationPopup").style.display = "none";
                }
                </script>
                <div class="popup" id="confirmationPopup">
                    <div class="popup-content">
                        <p class="align">
                        {{ session('Rejected') }}
                        </p>
                        <button class="popup-button" onclick="closePopup()">Close</button>
                    </div>
                </div>

@endif

