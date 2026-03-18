// 预约时间段数据（假设每小时一个时间段）
const timeSlots = [
    "9:00 AM - 10:00 AM",
    "10:00 AM - 11:00 AM",
    "11:00 AM - 12:00 PM",
    "1:00 PM - 2:00 PM",
    "2:00 PM - 3:00 PM",
    "3:00 PM - 4:00 PM"
];

document.addEventListener("DOMContentLoaded", function () {
    const calendar = document.getElementById("calendar");
    const successMessage = document.getElementById("successMessage");

    timeSlots.forEach((slot, index) => {
        const slotButton = document.createElement("button");
        slotButton.textContent = slot;
        slotButton.classList.add("slot-button");

        slotButton.addEventListener("click", () => {
            if (!slotButton.classList.contains("booked")) {
                slotButton.classList.add("booked");
                successMessage.style.display = "block";
                successMessage.textContent = `成功预约时间段：${slot}`;
            } else {
                successMessage.style.display = "none";
            }
        });

        calendar.appendChild(slotButton);
    });
});
