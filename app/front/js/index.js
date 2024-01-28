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
    const buttonCloses = document.querySelectorAll(".c-modalClose");

    // ボタンがクリックされた時
    const modalOpen = () => {
        modal.style.display = "block";
    }
    buttonOpen.addEventListener("click", modalOpen);

    // バツ印がクリックされた時
    const modalClose = () => {
        modal.style.display = "none";
    }

    buttonCloses.forEach((buttonClose) => {
        buttonClose.addEventListener("click", modalClose);
    });

    // モーダルコンテンツ以外がクリックされた時
    const outsideClose = (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    }
    addEventListener("click", outsideClose);
}

// 学習記録一覧ページにてモーダルで教材を登録する挙動
    const materialSaveButton = document.getElementById("materialSaveButton"); // 登録ボタン

    if (materialSaveButton) {
        const materialNameInput = document.getElementById("materialName"); // 教材名input
        const materialImageInput = document.getElementById("materialImage"); // 教材イメージinput
        const materialList = document.getElementById("materialList"); // 教材一覧

        const registerMaterial = () => { // 教材一覧に情報を出力する関数
            const materialName = materialNameInput.value;
            const materialImage = materialImageInput.value;

            if (materialName && materialImage) {
                // 教材リストに追加
                const listItem = document.createElement("li");
                listItem.innerHTML = `
                    <div>
                        <img src="./img/icon/study-dummy.png" alt="">
                    </div>
                    <p>${materialName}</p>
                    <button type="submit" class="c-button">START</button>
                `;
                materialList.appendChild(listItem);

                // フォームをリセット
                materialNameInput.value = "";
                materialImageInput.value = "";
            } else {
                alert("教材名と画像を入力してください。");
            }
        }
        materialSaveButton.addEventListener("click", registerMaterial);
    }
