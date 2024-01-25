// ============================================================================
// chart.js(グラフ描画のライブラリ) 「index.php」
// ============================================================================

const ctx = document.getElementById("myChart");

if (ctx) {
    // [TODO] labelsに関してはJSで直近の7日の日付取得・dataの時間はデータベースから取得
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["1/1", "1/2", "1/3", "1/4", "1/5", "1/6"],
            datasets: [
                {
                    label: "学習時間",
                    data: [1, 4, 5, 2, 7, 5],
                    borderWidth: 1,
                    backgroundColor: "#3cb371",
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}


// ============================================================================
// ストップウォッチ機能 「quest-list-detail.php / self-study-detail.php」
// ============================================================================

const watch = document.getElementById("js-stopwatch");
if (watch) {
    const start = document.getElementById("js-stopwatchStart");
    const stop = document.getElementById("js-stopwatchStop");

    // 開始時間
    let startTime;
    // 停止時間
    let stopTime = 0;
    // タイムアウトID
    let timeoutID;

    // 時間を表示する関数
    const displayTime = () => {
        const currentTime = new Date(Date.now() - startTime + stopTime);
        const h = String(currentTime.getHours() - 9).padStart(2, "0");
        const m = String(currentTime.getMinutes()).padStart(2, "0");
        const s = String(currentTime.getSeconds()).padStart(2, "0");

        watch.textContent = `${h}:${m}:${s}`;
        timeoutID = setTimeout(displayTime, 1000);
    }

    // スタートボタンがクリックされたら時間を進める
    start.addEventListener("click", () => {
        start.classList.add('disabled');
        stop.classList.remove("disabled");
        startTime = Date.now();
        displayTime();
    });

    // ストップボタンがクリックされたら時間を止める
    stop.addEventListener("click", function () {
        start.classList.remove("disabled");
        stop.classList.add("disabled");
        clearTimeout(timeoutID);
        stopTime += Date.now() - startTime;
    });
}


// ============================================================================
// FullCalender(カレンダーのライブラリ) 「daily-report.php」
// ============================================================================

const calendarEl = document.getElementById("calendar");
if (calendarEl) {
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        dateClick: (e) => {
            // 日付マスのクリックイベント(日時取得)
            console.log("dateClick:", e);
        },
        // [TODO]マスをクリックした際に、日報詳細ページにクリックした日付を渡す
    });
    calendar.render();
}


// ============================================================================
// モーダルの挙動 「学習記録ページ(self-study.php)」
// ============================================================================

const modal = document.getElementById("easyModal");
if (modal) {
    const buttonOpen = document.getElementById("modalOpen");
    const buttonClose = document.getElementsByClassName("c-modalClose")[0];

    // ボタンがクリックされた時
    const modalOpen = () => {
        modal.style.display = "block";
    }
    buttonOpen.addEventListener("click", modalOpen);

    // バツ印がクリックされた時
    const modalClose = () => {
        modal.style.display = "none";
    }
    buttonClose.addEventListener("click", modalClose);

    // モーダルコンテンツ以外がクリックされた時
    const outsideClose = (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    }
    addEventListener("click", outsideClose);
}