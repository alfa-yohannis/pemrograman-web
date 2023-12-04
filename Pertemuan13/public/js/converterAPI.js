$(document).ready(function () {
    $("#convert").click(async function () {
        const fromSelect = $("#from");
        const toSelect = $("#to");
        const apiKey = "fca_live_iq1WvbaON67X9adHTaJiqEszDhP6jtDz7IouUbWv";
        const fromCurrency = fromSelect.val();
        const toCurrency = toSelect.val();

        // Encode the space character as "%20" in the currencies and base_currency parameters
        const encodedFromCurrency = encodeURIComponent(fromCurrency);
        const encodedToCurrency = encodeURIComponent(toCurrency);

        const url = `https://api.freecurrencyapi.com/v1/latest?apikey=${apiKey}&currencies=${encodedToCurrency}&base_currency=${encodedFromCurrency}`;
        const options = {
            method: "GET",
        };
        try {
            const response = await fetch(url, options);
            const data = await response.json(); // Parse the response body as JSON
            console.log(data); // For debugging purposes
            const rate = data["data"][toSelect.val()]; // Get the rate value for the selected currency
            const amount = $("#amount").val();
            const converted = (amount * rate).toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });
            let fromCurrencySymbol;
            if (fromSelect.val() === "IDR") {
                fromCurrencySymbol = "Rp. ";
            } else if (fromSelect.val() === "USD") {
                fromCurrencySymbol = "$ ";
            } else if (fromSelect.val() === "EUR") {
                fromCurrencySymbol = "€ ";
            } else if (fromSelect.val() === "GBP") {
                fromCurrencySymbol = "£ ";
            }
            let toCurrencySymbol;
            if (toSelect.val() === "IDR") {
                toCurrencySymbol = "Rp. ";
            } else if (toSelect.val() === "USD") {
                toCurrencySymbol = "$ ";
            } else if (toSelect.val() === "EUR") {
                toCurrencySymbol = "€ ";
            } else if (toSelect.val() === "GBP") {
                toCurrencySymbol = "£ ";
            }
            $("#from-result").text(fromCurrencySymbol + amount);
            $("#from-currency").text(fromSelect.val());
            $("#to-result").text(toCurrencySymbol + converted);
            $("#to-currency").text(toSelect.val());
            const exchangeRateLabel = $("#exchange-rate");
            const formattedRate = parseFloat(rate).toFixed(2);
            const exchangeRateText = `1 ${fromSelect.val()} = ${formattedRate} ${toSelect.val()}`;
            exchangeRateLabel.text(exchangeRateText);
        } catch (error) {
            console.error(error);
        }
    });
});
