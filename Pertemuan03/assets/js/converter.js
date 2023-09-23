const reverseButton = document.getElementById("reverse");
const convertButton = document.getElementById("convert");

reverseButton.addEventListener("click", function () {
  const fromSelect = document.getElementById("from");
  const toSelect = document.getElementById("to");
  const temp = fromSelect.value;
  fromSelect.value = toSelect.value;
  toSelect.value = temp;
});

convertButton.addEventListener("click", async function () {
  const fromSelect = document.getElementById("from");
  const toSelect = document.getElementById("to");
  const url = "https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_iq1WvbaON67X9adHTaJiqEszDhP6jtDz7IouUbWv&currencies=" + toSelect.value + "&base_currency=" + fromSelect.value;
  console.log(url);
  const options = {
    method: "GET",
  };

  try {
    const response = await fetch(url, options);
    const result = await response.text();
    console.log(result);
    const amount = document.getElementById("amount").value;
    const rate = result.split(":")[2].split("}")[0];
    const converted = (amount * rate).toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
    let fromCurrencySymbol;
    if (fromSelect.value === "IDR") {
      fromCurrencySymbol = "Rp. ";
    } else if (fromSelect.value === "USD") {
      fromCurrencySymbol = "$ ";
    } else if (fromSelect.value === "EUR") {
      fromCurrencySymbol = "€ ";
    } else if (fromSelect.value === "GBP") {
      fromCurrencySymbol = "£ ";
    }
    let toCurrencySymbol;
    if (toSelect.value === "IDR") {
      toCurrencySymbol = "Rp. ";
    } else if (toSelect.value === "USD") {
      toCurrencySymbol = "$ ";
    } else if (toSelect.value === "EUR") {
      toCurrencySymbol = "€ ";
    } else if (toSelect.value === "GBP") {
      toCurrencySymbol = "£ ";
    }
    const fromResult = document.getElementById("from-result");
    const fromCurrency = document.getElementById("from-currency");
    const toResult = document.getElementById("to-result");
    fromResult.textContent = fromCurrencySymbol + amount;
    fromCurrency.textContent = fromSelect.value;
    toResult.textContent = toCurrencySymbol + converted;
    document.getElementById("to-currency").textContent = toSelect.value;
    const exchangeRateLabel = document.getElementById("exchange-rate");
    const formattedRate = parseFloat(rate).toFixed(2);
    const exchangeRateText = `1 ${fromSelect.value} = ${formattedRate} ${toSelect.value}`;
    exchangeRateLabel.textContent = exchangeRateText;
  } catch (error) {
    console.error(error);
  }
});
