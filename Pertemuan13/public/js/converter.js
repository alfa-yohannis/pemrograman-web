$(document).ready(function () {
    $("#reverse").click(function () {
        const fromSelect = $("#from");
        const toSelect = $("#to");
        const temp = fromSelect.val();
        fromSelect.val(toSelect.val());
        toSelect.val(temp);
    });
});
