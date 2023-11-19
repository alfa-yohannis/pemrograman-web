<?php

namespace App\Models;

class Converter_
{
  // Change the path to the converters.json file
  private static $filePath = 'C:\xampp7\htdocs\pemrograman web\Pertemuan 10\app\Models\converters.json';
  public static function all()
  {
    $jsonData = file_get_contents(self::$filePath);
    return collect(json_decode($jsonData, true));
  }

  public static function find(string $id)
  {
    $converters = self::all();
    return $converters->firstWhere('id', $id);
  }

  public static function insert(array $data)
  {
    $converters = self::all();
    $newConverter = [
      'id' => count($converters) + 1,
      'from_currency' => $data['from_currency'],
      'from_currency_description' => $data['from_currency_description'],
      'to_currency' => $data['to_currency'],
      'to_currency_description' => $data['to_currency_description'],
      'conversion_rate' => $data['conversion_rate'],
    ];

    $convertersArray = $converters->toArray();
    array_push($convertersArray, $newConverter);
    self::saveData($convertersArray);

    return $newConverter;
  }

  public static function update(array $data, int $id)
  {
    $converters = self::all();
    $index = collect($converters)->search(function ($item) use ($id) {
      return $item['id'] === $id;
    });

    if ($index !== false) {
      $updatedConverter = [
        'id' => $id,
        'from_currency' => $data['from_currency'],
        'from_currency_description' => $data['from_currency_description'],
        'to_currency' => $data['to_currency'],
        'to_currency_description' => $data['to_currency_description'],
        'conversion_rate' => $data['conversion_rate'],
      ];

      $converters[$index] = $updatedConverter;
      self::saveData($converters);

      return $updatedConverter;
    }

    return null;
  }

  public static function delete(int $id)
  {
    $converters = self::all();
    $index = collect($converters)->search(function ($item) use ($id) {
      return $item['id'] === $id;
    });

    if ($index !== false) {
      $convertersArray = $converters->toArray();
      array_splice($convertersArray, $index, 1);
      self::saveData($convertersArray);
    }
  }

  private static function saveData($data)
  {
    file_put_contents(self::$filePath, json_encode($data, JSON_PRETTY_PRINT));
  }
}
