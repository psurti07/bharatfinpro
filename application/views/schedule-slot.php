<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Slot</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    body {
        margin: 0;
        font-family: "DM Sans", sans-serif;
    }

    .main {
        max-width: 420px;
        margin: auto;
        background: #fff;
        min-height: 100vh;

    }


    .container {
        width: 100%;
        padding: 15px;


    }

    .header h1 {
        font-weight: 600;
        font-size: 24px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        padding: 0;
        align-items: center;
        margin-bottom: 30px;
        margin-top: 35px;

    }

    .banner-main {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f1f1f1;
        margin-bottom: 20px;
        padding: 0;
        border-radius: 12px;
    }

    .banner-main .banner-text {
        padding: 17px 0 0 17px;

        text-align: start;
    }

    .banner-main .banner-text .fa {
        font-size: 20px;
    }

    .fa {
        font-size: 20px;
        margin-right: 5px;
    }

    .banner-main img {
        width: 150px;
        height: 120px;
    }

    .banner-main .banner-text h2 {
        font-size: 20px;
        line-height: 25px;
        color: #212529;
        font-weight: 400;
        margin-top: 15px;

    }

    .banner-main .banner-text .tag {
        background: #144835;
        color: #fff;
        padding: 7px 17px;
        border-radius: 6px;
        font-size: 12px;
    }

    .banner-main .banner-text .tag svg {
        vertical-align: middle;
    }

    p {
        font-size: 15px;
        line-height: 24px;
        color: #212529;
        margin-top: 0;
        margin-bottom: 0;
    }



    #form h4 {
        font-size: 18px;
        line-height: 24px;
        margin: 10px 0 5px 0;
        font-weight: 600;
        color: #2E2E2E;

    }

    #form .select-languge {
        margin-bottom: 35px;
    }

    #form .tabs-main {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
        margin-top: 16px;
    }

    #form .tabs-main .item {
        padding: 6px 6px;
        border: 1px solid #144835;
        border-radius: 6px;
        cursor: pointer;
        width: 22.3%;
        text-align: center;
    }

    #slots .item {
        width: 31.96% !important;
    }

    #form .tabs-main .item.tabs-item {
        width: 32%;
    }

    #form .active {
        background: #e4f7f0;
        color: #212529;
    }

    #form .tabs {
        display: flex;
        margin-top: 10px;
        background: #f3f3f3;
        margin-bottom: 20px;
    }

    #form .tab {
        flex: 1;
        text-align: center;
        padding: 8px;
        border: none;
        cursor: pointer;
    }

    #form .tab.active {
        background: #144835;
        color: #fff;
        border: 1px solid #144835;
        border-radius: 9px;
    }

    #form .tabs-main .item.active {
        background: #e4f7f0;
    }

    .footer {
        text-align: center;
        border-top: 1px solid #e4e4e7;
        position: sticky;
        bottom: 0;
        z-index: 999;
        background: #fff;
    }

    .footer button.btn-submit {
        min-width: 290px;
        padding: 16px;
        margin-top: 20px;
        background: #144835;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 20px;
        text-transform: uppercase;
        margin: auto;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .footer button.btn-submit:hover {
        background-color: #336e59;
    }

    .footer .item {
        text-align: center;
        line-height: 1.4;
    }

    .box-agent {
        background: #f1f1f1;
        border-radius: 12px;
        display: flex;
        gap: 15px;
        align-items: center;
        margin-bottom: 60px;
        padding: 25px 10px;
    }

    .box-agent .agent-img-list .agent-img-item {
        height: 50px;
        width: 50px;
        border: 1px solid #144835;
        border-radius: 50px;
        padding: 4px;
        background-color: #fff;
        margin-right: -15px;
        text-align: center;
    }

    .box-agent .agent-img-list {
        display: flex;
        align-items: center;
        padding-left: 0;

    }

    .box-agent .agent-img-list li {
        list-style: none;
    }

    .box-agent .agent-img-list .agent-img-item img {
        width: 100%;
    }

    .box-agent span {
        font-size: 22px;
        padding-left: 10px;
        color: #144835;

    }

    .slot-days {
        font-weight: 600;
        font-size: 15px;
        line-height: 24px;
        margin-bottom: 8px;
    }

    .slot-date {
        font-weight: normal;
        font-size: 13px;
        line-height: 12px;
        margin-top: 5px;
        color: #585d69;
    }

    @media screen and (max-width:767px) {
        .slot-days {
            font-size: 13px;
        }
    }
    </style>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <h1>Hi, <?php echo $userdata->first_name ?> 👋</h1>
                <span class="phone"><i class="fa fa-mobile-alt "></i> <?php echo $userdata->mobile ?></span>
            </div>
            <div class="banner-main">
                <div class="banner-text">
                    <span class="tag"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-telephone" viewBox="0 0 16 16">
                            <path
                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg> FREE CALL</span>
                    <h2>Talk to a Hair expert and clear your hair doubts</h2>
                </div>
                <img src="<?php echo base_url() ?>assets/images/img-2.png" alt="expert">
            </div>



            <form id="form" action="<?php echo base_url() ?>Schedule_Slot/schedule" method="post" name="frmsubmit">
                <input type="hidden" id="userid" name="user_id" value="<?php echo $userdata->id ?>">
                <input type="hidden" id="language" name="language">
                <input type="hidden" id="date" name="date">
                <input type="hidden" id="time" name="time">
                <!-- Language Tabs -->
                <div class="select-languge">
                    <h4>Choose Preferred Language</h4>
                    <p>We will try to arrange your call in your preferred language</p>
                    <div class="tabs-main" id="languageTabs">
                        <div class="item active" data-value="1">Gujarati</div>
                        <div class="item" data-value="2">Hindi</div>
                        <div class="item" data-value="3">English</div>
                    </div>

                </div>
                <!-- Date -->
                <div class="select-languge">
                    <h4>Choose Date</h4>
                    <div class="tabs-main" id="dates"></div>
                </div>
                <!-- Time -->
                <div class="select-languge">
                    <h4>Choose Time Slot</h4>
                    <div class="tabs">
                        <div class="tab active" data-type="morning">Morning</div>
                        <div class="tab" data-type="afternoon">Afternoon</div>
                        <div class="tab" data-type="evening">Evening</div>
                    </div>

                    <div class="tabs-main" id="slots"></div>
                </div>
                <div class="select-languge">
                    <div class="box-agent">
                        <ul class="agent-img-list">
                            <li class="agent-img-item">
                                <img src="<?php echo base_url() ?>assets/images/schedule_slots/coach-dp-1.png" alt="">
                            </li>
                            <li class="agent-img-item">
                                <img src="<?php echo base_url() ?>assets/images/schedule_slots/coach-dp-2.png" alt="">
                            </li>
                            <li class="agent-img-item">
                                <img src="<?php echo base_url() ?>assets/images/schedule_slots/coach-dp-3.png" alt="">
                            </li>

                        </ul>
                        <span>
                            20L+
                        </span>

                        <div class="rate">
                            <p>
                                Indians have trusted Fittoss, now it's your time.
                            </p>

                        </div>
                    </div>
                </div>



        </div>
    </div>
    <footer class="footer">
        <div class="">
            <button type="submit" class="btn-submit">Book Now</button>
        </div>
        </div>


    </footer>



    </form>


    <script>
    let selectedDate = null;

    // ------------------ LANGUAGE ------------------
    document.querySelectorAll('#languageTabs .item').forEach(el => {
        el.onclick = () => {
            document.querySelectorAll('#languageTabs .item').forEach(i => i.classList.remove('active'));
            el.classList.add('active');
            document.getElementById('language').value = el.dataset.value;
        };
    });

    // ------------------ DATES ------------------
    function generateDates() {
        let count = 0;
        let i = 0;
        let isFirst = true; // 👈 track first selectable date

        const today = new Date();

        while (count < 4) {
            let d = new Date();
            d.setDate(d.getDate() + i);

            if (d.getDay() !== 0) { // skip Sunday

                let line1 = '';
                let day = d.getDate();
                let month = d.toLocaleString('en-US', {
                    month: 'short'
                }).toUpperCase();
                let line2 = `${day} ${month}`;

                let diffDays = Math.floor((d - today) / (1000 * 60 * 60 * 24));

                if (diffDays === 0) {
                    line1 = '<span class="slot-days">Today</span>';
                } else if (diffDays === 1) {
                    line1 = '<span class="slot-days">Tomorrow</span>';
                } else {
                    line1 = '<span class="slot-days">' + d.toLocaleString('en-US', {
                        weekday: 'short'
                    }) + '</span>';
                }

                let div = document.createElement('div');
                div.className = 'item';
                div.innerHTML = `${line1}<br><div class="slot-date">${line2}</div>`;

                div.onclick = () => {
                    document.querySelectorAll('#dates .item').forEach(e => e.classList.remove('active'));
                    div.classList.add('active');

                    selectedDate = new Date(d);
                    document.getElementById('date').value = selectedDate.toISOString().split('T')[0];

                    generateSlots(getActiveTab());
                };

                document.getElementById('dates').appendChild(div);

                // 🔥 Auto select first date (Today)
                if (isFirst) {
                    div.click();
                    isFirst = false;
                }

                count++;
            }
            i++;
        }
    }

    // ------------------ TIME SLOTS ------------------
    function getActiveTab() {
        return document.querySelector('.tab.active').dataset.type;
    }

    function generateSlots(type) {
        const container = document.getElementById('slots');
        container.innerHTML = '';

        if (!selectedDate) return;

        let start, end;

        if (type === 'morning') {
            start = 10;
            end = 11.75;
        } else if (type === 'afternoon') {
            start = 12;
            end = 15.75;
        } else {
            start = 16;
            end = 18.5;
        }

        let now = new Date();

        for (let t = start; t <= end; t += 0.25) {
            let h = Math.floor(t);
            let m = (t % 1) * 60;

            let slotDate = new Date(selectedDate);
            slotDate.setHours(h);
            slotDate.setMinutes(m);
            slotDate.setSeconds(0);

            // 🔥 IMPORTANT: Skip past time for TODAY
            if (
                selectedDate.toDateString() === now.toDateString() &&
                slotDate <= now
            ) {
                continue;
            }

            let hour12 = h % 12 || 12; // convert 0 → 12
            let ampm = h < 12 ? 'AM' : 'PM';

            let formatted = hour12 + ':' + (m === 0 ? '00' : m) + ' ' + ampm;

            let div = document.createElement('div');
            div.className = 'item';
            div.innerText = formatted;

            div.onclick = () => {
                document.querySelectorAll('#slots .item').forEach(s => s.classList.remove('active'));
                div.classList.add('active');
                document.getElementById('time').value = formatted;
            };

            container.appendChild(div);
        }
    }

    // ------------------ TABS ------------------
    document.querySelectorAll('.tab').forEach(tab => {
        tab.onclick = () => {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            generateSlots(tab.dataset.type);
        };
    });

    // ------------------ SUBMIT ------------------
    /* document.getElementById('form').addEventListener('submit', function (e) {
         e.preventDefault();

         let data = {
             language: document.getElementById('language').value,
             date: document.getElementById('date').value,
             time: document.getElementById('time').value
         };

         if (!data.language || !data.date || !data.time) {
             alert('Please select all fields');
             return;
         }

         console.log("Submitted:", data);

         alert("Slot booked successfully!");
     });*/

    // INIT
    generateDates();
    generateSlots('morning');
    </script>

</body>

</html>