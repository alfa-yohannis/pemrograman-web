// $(document).ready(function () {
//   $("#reverse").click(function () {
//     const fromSelect = $("#from");
//     const toSelect = $("#to");
//     const temp = fromSelect.val();
//     fromSelect.val(toSelect.val());
//     toSelect.val(temp);
//   });

//   $("#convert").click(function () {
//     const fromSelect = $("#from");
//     const toSelect = $("#to");
//     const apiKey = "fca_live_iq1WvbaON67X9adHTaJiqEszDhP6jtDz7IouUbWv";
//     const fromCurrency = fromSelect.val();
//     const toCurrency = toSelect.val();

//     // Encode the space character as "%20" in the currencies and base_currency parameters
//     const encodedFromCurrency = encodeURIComponent(fromCurrency);
//     const encodedToCurrency = encodeURIComponent(toCurrency);

//     const url = `https://api.freecurrencyapi.com/v1/latest?apikey=${apiKey}&currencies=${encodedToCurrency}&base_currency=${encodedFromCurrency}`;

//     $.ajax({
//       url: url,
//       method: "GET",
//       success: function (data) {
//         console.log(data); // For debugging purposes
//         const rate = data["data"][toSelect.val()]; // Get the rate value for the selected currency
//         const amount = $("#amount").val();
//         const converted = (amount * rate).toLocaleString(undefined, {
//           minimumFractionDigits: 2,
//           maximumFractionDigits: 2,
//         });
//         let fromCurrencySymbol;
//         if (fromSelect.val() === "IDR") {
//           fromCurrencySymbol = "Rp. ";
//         } else if (fromSelect.val() === "USD") {
//           fromCurrencySymbol = "$ ";
//         } else if (fromSelect.val() === "EUR") {
//           fromCurrencySymbol = "€ ";
//         } else if (fromSelect.val() === "GBP") {
//           fromCurrencySymbol = "£ ";
//         }
//         let toCurrencySymbol;
//         if (toSelect.val() === "IDR") {
//           toCurrencySymbol = "Rp. ";
//         } else if (toSelect.val() === "USD") {
//           toCurrencySymbol = "$ ";
//         } else if (toSelect.val() === "EUR") {
//           toCurrencySymbol = "€ ";
//         } else if (toSelect.val() === "GBP") {
//           toCurrencySymbol = "£ ";
//         }
//         $("#from-result").text(fromCurrencySymbol + amount);
//         $("#from-currency").text(fromSelect.val());
//         $("#to-result").text(toCurrencySymbol + converted);
//         $("#to-currency").text(toSelect.val());
//         const exchangeRateLabel = $("#exchange-rate");
//         const formattedRate = parseFloat(rate).toFixed(2);
//         const exchangeRateText = `1 ${fromSelect.val()} = ${formattedRate} ${toSelect.val()}`;
//         exchangeRateLabel.text(exchangeRateText);
//       },
//       error: function (xhr, status, error) {
//         console.error(error);
//       },
//     });
//   });
// });

$(document).ready(function () {
  $("#reverse").click(function () {
    const fromSelect = $("#from");
    const toSelect = $("#to");
    const temp = fromSelect.val();
    fromSelect.val(toSelect.val());
    toSelect.val(temp);
  });

  $("#convert").click(function (e) {
    e.preventDefault(); // Prevent the form from submitting
    const fromSelect = $("#from");
    const toSelect = $("#to");
    const amount = $("#amount").val();
    const fromCurrency = fromSelect.val();
    const toCurrency = toSelect.val();

    $.ajax({
      url: "converter.php",
      type: "POST",
      data: {
        amount: amount,
        from: fromCurrency,
        to: toCurrency,
      },
      success: function (result) {
        console.log(result);
        console.log(result.rate);
        const rate = result.rate;
        const convertedAmount = (rate * amount).toLocaleString(undefined, {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2,
        });
        let fromCurrencySymbol;
        if (fromCurrency === "IDR") {
          fromCurrencySymbol = "Rp. ";
        } else if (fromCurrency === "USD") {
          fromCurrencySymbol = "$ ";
        } else if (fromCurrency === "EUR") {
          fromCurrencySymbol = "€ ";
        } else if (fromCurrency === "GBP") {
          fromCurrencySymbol = "£ ";
        }
        let toCurrencySymbol;
        if (toCurrency === "IDR") {
          toCurrencySymbol = "Rp. ";
        } else if (toCurrency === "USD") {
          toCurrencySymbol = "$ ";
        } else if (toCurrency === "EUR") {
          toCurrencySymbol = "€ ";
        } else if (toCurrency === "GBP") {
          toCurrencySymbol = "£ ";
        }
        $("#from-result").text(fromCurrencySymbol + amount);
        $("#from-currency").text(fromCurrency);
        $("#to-result").text(toCurrencySymbol + convertedAmount);
        $("#to-currency").text(toCurrency);
        $("#exchange-rate").text(`1 ${fromCurrency} = ${rate} ${toCurrency}`);
      },
      error: function (error) {
        console.error(error);
      },
    });
  });
});
