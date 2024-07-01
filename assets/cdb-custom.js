document.addEventListener('DOMContentLoaded', function() {
    var button = document.getElementById('customDayButton');
    if (button) {
        button.onclick = function() {
            var today = cdbObj.today;
            var activeDay = cdbObj.activeDay;
            if (today === activeDay) {
                window.open(cdbObj.buttonURL, "_blank");
            } else {
                alert(cdbObj.alertMessage + activeDay);
            }
        };
    }
});