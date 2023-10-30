<?php
function convertRate($fromCurrency, $toCurrency)
{
  $apiKey = "fca_live_iq1WvbaON67X9adHTaJiqEszDhP6jtDz7IouUbWv";
  $url = "https://api.freecurrencyapi.com/v1/latest?apikey=$apiKey&currencies=$toCurrency&base_currency=$fromCurrency";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($response, true);
  return $data['data'][$toCurrency];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $amount = $_POST['amount'];
  $fromCurrency = $_POST['from'];
  $toCurrency = $_POST['to'];

  $rate = convertRate($fromCurrency, $toCurrency);

  $response = array(
    'rate' => $rate
  );

  header('Content-Type: application/json');
  $temp = json_encode($response);
  echo json_encode($response);
  exit;
}
?>
