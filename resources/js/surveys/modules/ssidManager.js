export function initSsidManager() {
    const ssidList = document.getElementById("ssidList");
    const addBtn = document.getElementById("addSsid");

    if (!ssidList || !addBtn) return;
    let ssidCount = 0;

    function addSsidRow(num = "", name = "", vlan = "") {
        ssidCount++;
        const idx = ssidCount;
        const div = document.createElement("div");
        div.className = "ss-subcard";
        div.innerHTML = `
            <div class="ss-subcard-header">
                <span>SSID-${String(idx).padStart(2, "0")}</span>
                <button type="button"
                    class="ss-remove-btn"
                    data-remove>
                    ✕ Eliminar
                </button>
            </div>
            <div class="ss-subcard-body grid grid-cols-1 md:grid-cols-3 gap-3">
                <div>
                    <label class="ss-label">#</label>
                    <input class="ss-input"
                        type="text"
                        name="ssid_num[]"
                        value="${num || idx}">
                </div>
                <div>
                    <label class="ss-label">SSID</label>
                    <input class="ss-input"
                        type="text"
                        name="ssid_name[]"
                        value="${name}">
                </div>
                <div>
                    <label class="ss-label">VLAN</label>
                    <input class="ss-input"
                        type="text"
                        name="ssid_vlan[]"
                        value="${vlan}">
                </div>
            </div>
        `;
        div.querySelector("[data-remove]").addEventListener("click", () =>
            div.remove()
        );
        ssidList.appendChild(div);
    }

    addBtn.addEventListener("click", () => addSsidRow());
    // iniciales
    addSsidRow(1, "datos", 52);
    addSsidRow(2, "guest", 10);
}
